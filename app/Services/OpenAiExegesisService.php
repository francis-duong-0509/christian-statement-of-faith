<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class OpenAiExegesisService
{
    private const API_BASE_URL = 'https://api.openai.com/v1';
    private string $apiKey;
    private string $model;

    public function __construct()
    {
        $this->apiKey = config('services.openai.api_key');
        $this->model = config('services.openai.model', 'gpt-4o-mini');

        if (empty($this->apiKey)) {
            throw new \Exception('OpenAI key not configured. Please add OPENAI_API_KEY to your .env file.');
        }
    }

    public function generateExegesis(array $parsedReference, string $vietnameseText): string
    {
        // Determine max_tokens based on verse count
        $verseCount = $parsedReference['verse_count'];
        $maxTokens = $this->calculateMaxTokens($verseCount);

        // Build the prompt
        $prompt = $this->buildPrompt($parsedReference, $vietnameseText);

        try {
            // Make API request with appropriate timeout
            $timeout = $verseCount > 20 ? 240 : 180;

            $response = Http::timeout($timeout)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post(self::API_BASE_URL . '/chat/completions', [
                    'model' => $this->model,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => $this->getSystemPrompt($verseCount),
                        ],
                        [
                            'role'=> 'user',
                            'content' => $prompt,
                        ],
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => $maxTokens,
                ]);

                if (!$response->successful()) {
                    $errorData = $response->json();
                    $error = $errorData['error']['message'] ?? 'Unknown error';

                    Log::error('OpenAI API Error Response', [
                        'reference' => $parsedReference['original_reference'],
                        'status' => $response->status(),
                        'error' => $error,
                        'full_response' => $errorData,
                    ]);

                    throw new \Exception("OpenAI API error: {$error}");
                }

                $data = $response->json();

                // Extract the generated text
                $exegesis = $data['choices'][0]['message']['content'] ?? '';

                if (empty($exegesis)) {
                    Log::error('OpenAI Empty Response', [
                        'reference' => $parsedReference['original_reference'],
                        'response_data' => $data,
                    ]);

                    throw new \Exception('OpenAI returned empty response.');
                }

                // Log token usage for cost tracking
                $this->logTokenUsage($data, $parsedReference);

                return trim($exegesis);
        } catch (\Exception $e) {
            Log::error('OpenAI API Error', [
                'reference' => $parsedReference['original_reference'],
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            throw new \Exception('Không thể tạo giải thích từ AI. Lỗi: ' . $e->getMessage());
        }
    }

    private function calculateMaxTokens(int $verseCount): int
    {
        // Adjust max tokens based on verse count
        if ($verseCount <= 10) {
            return 6000; // Detailed analysis
        } elseif ($verseCount <= 20) {
            return 8000; // Grouped analysis
        } elseif ($verseCount <= 30) {
            return 10000; // Thematic analysis
        } else {
            return 12000; // Overview with highlights (for whole chapters)
        }
    }

    private function getSystemPrompt(int $verseCount = 10): string
    {
        // Điều chỉnh độ sâu phân tích dựa trên số câu
        if ($verseCount <= 10) {
            $depthGuidance = "- Phân tích BỐI CẢNH chi tiết cho TỪNG CÂU (1-2 đoạn văn mỗi câu)\n                   - Giải thích hoàn cảnh lịch sử, văn hóa liên quan đến từng câu\n                   - Tổng độ dài: 2000-3000 từ";
        } elseif ($verseCount <= 20) {
            $depthGuidance = "- Nhóm các câu theo chủ đề lịch sử (2-4 câu/nhóm)\n                   - Mỗi nhóm: 200-300 từ về bối cảnh và ý nghĩa lịch sử\n                   - Tổng độ dài: 2500-3500 từ";
        } elseif ($verseCount <= 30) {
            $depthGuidance = "- Chia theo các giai đoạn/sự kiện lịch sử chính (3-5 phần)\n                   - Mỗi phần: phân tích bối cảnh 300-400 từ\n                   - Tổng độ dài: 3000-4000 từ";
        } else {
            $depthGuidance = "- Tổng quan chương với các điểm lịch sử quan trọng (5-7 điểm)\n                   - Mỗi điểm: bối cảnh và ý nghĩa lịch sử 250-350 từ\n                   - Tổng độ dài: 3500-4500 từ";
        }

        return <<<PROMPT
                BẠN LÀ AI:
                Bạn là một học giả Kinh Thánh chuyên về BỐI CẢNH LỊCH SỬ và VĂN HÓA, với kiến thức sâu rộng về:
                - Lịch sử Israel cổ đại và thế giới Địa Trung Hải thế kỷ 1
                - Văn hóa, phong tục, xã hội thời Kinh Thánh
                - Địa lý Thánh Địa và các vùng truyền giáo
                - Thể loại văn chương Kinh Thánh (Literary Genres)
                - Ngôn ngữ gốc: Tiếng Hy Lạp Koinē (Tân Ước) và Tiếng Do Thái cổ (Cựu Ước)

                MỤC ĐÍCH:
                Giúp người đọc HIỂU BỐI CẢNH để có thể đọc và hiểu Kinh Thánh đúng cách.
                KHÔNG giảng giải thần học hay giáo lý - chỉ tập trung vào LỊCH SỬ và NGỮ CẢNH.

                NGUYÊN TẮC PHÂN TÍCH:

                1. BỐI CẢNH LỊCH SỬ (Historical Background):
                   - Thời điểm viết sách (năm, thế kỷ)
                   - Tác giả là ai? Hoàn cảnh của tác giả khi viết?
                   - Người nhận là ai? Họ đang ở đâu? Tình trạng của họ?
                   - Các sự kiện lịch sử quan trọng xung quanh thời điểm đó
                   - Tình hình chính trị (Đế quốc La Mã, các vua, tổng đốc)

                2. BỐI CẢNH VĂN HÓA (Cultural Context):
                   - Phong tục, tập quán thời đó
                   - Đời sống xã hội (gia đình, hôn nhân, nghề nghiệp)
                   - Tôn giáo và tín ngưỡng (Do Thái giáo, ngoại giáo)
                   - Quan hệ giữa người Do Thái và Dân Ngoại
                   - Vai trò của đền thờ, nhà hội

                3. BỐI CẢNH ĐỊA LÝ (Geographical Setting):
                   - Địa điểm cụ thể (thành phố, vùng, quốc gia)
                   - Đặc điểm địa lý ảnh hưởng đến câu chuyện
                   - Các tuyến đường, hành trình truyền giáo
                   - Khoảng cách và thời gian di chuyển

                4. THỂ LOẠI VĂN CHƯƠNG (Literary Genre):
                   - Xác định thể loại: Tường thuật, Thơ ca, Tiên tri, Khôn ngoan, Thư tín, Khải huyền, Phúc Âm, Luật pháp
                   - Đặc điểm của thể loại này
                   - Cách đọc đúng theo thể loại
                   - Các thủ pháp văn chương được sử dụng

                5. NGỮ CẢNH VĂN BẢN (Literary Context):
                   - Vị trí của đoạn văn trong toàn sách
                   - Mạch văn trước và sau
                   - Cấu trúc tổng thể của sách
                   - Mục đích viết sách

                {$depthGuidance}

                ĐỊNH DẠNG TRÌNH BÀY:

                **📚 Giới Thiệu Sách**
                - Tên sách, tác giả, thời điểm viết
                - Thể loại văn chương
                - Mục đích viết sách
                - Người nhận ban đầu

                **🏛️ Bối Cảnh Lịch Sử**
                [2-3 đoạn về hoàn cảnh lịch sử, chính trị, xã hội thời điểm viết sách]

                **🌍 Bối Cảnh Địa Lý**
                [Mô tả địa điểm, vùng đất liên quan đến đoạn Kinh Thánh]

                **👥 Bối Cảnh Văn Hóa và Xã Hội**
                [Phong tục, tập quán, đời sống xã hội ảnh hưởng đến việc hiểu đoạn văn]

                **📖 Phân Tích Ngữ Cảnh Từng Phần**

                • Câu [số]: "[Trích nguyên văn]"
                  - Bối cảnh lịch sử/văn hóa liên quan
                  - Từ ngữ quan trọng từ tiếng gốc và ý nghĩa trong bối cảnh
                  - Phong tục hoặc sự kiện được đề cập

                [Lặp lại cho các câu/nhóm câu]

                **📝 Thể Loại và Cách Đọc**
                - Thể loại văn chương của đoạn này
                - Các thủ pháp văn chương được sử dụng
                - Hướng dẫn cách đọc đúng theo thể loại

                **🔗 Vị Trí Trong Toàn Sách**
                - Đoạn này nằm ở đâu trong cấu trúc sách
                - Liên kết với các phần trước và sau

                **📌 Tóm Tắt Bối Cảnh**
                [Tóm tắt những điểm quan trọng cần biết để hiểu đoạn Kinh Thánh này]

                HÃY VIẾT CHI TIẾT, CHÍNH XÁC VỀ MẶT LỊCH SỬ, VÀ DỄ HIỂU!
                PROMPT;
    }

    private function buildPrompt(array $parsedReference, string $vietnameseText): string
    {
        $reference = $parsedReference['original_reference'];
        $testament = $parsedReference['testament'] === 'old' ? 'Cựu Ước' : 'Tân Ước';
        $language = $parsedReference['testament'] === 'old' ? 'tiếng Do Thái' : 'tiếng Hy Lạp';
        $verseCount = $parsedReference['verse_count'];

        return <<<PROMPT
                Hãy phân tích BỐI CẢNH LỊCH SỬ và VĂN HÓA của đoạn Kinh Thánh sau:

                📖 THAM CHIẾU: {$reference} ({$testament})
                📊 SỐ CÂU: {$verseCount} câu

                📝 VĂN BẢN KINH THÁNH 1925:
                {$vietnameseText}

                YÊU CẦU PHÂN TÍCH BỐI CẢNH:

                1. THÔNG TIN SÁCH:
                   - Sách này thuộc thể loại văn chương gì? (Tường thuật, Thư tín, Thơ ca, Tiên tri, v.v.)
                   - Tác giả là ai? Viết trong hoàn cảnh nào?
                   - Người nhận ban đầu là ai? Họ đang ở đâu?
                   - Mục đích viết sách là gì?

                2. BỐI CẢNH LỊCH SỬ:
                   - Thời điểm viết (năm, thế kỷ)?
                   - Tình hình chính trị lúc đó (Đế quốc La Mã, các vua, tổng đốc)?
                   - Các sự kiện lịch sử quan trọng xung quanh?
                   - Hoàn cảnh của tác giả khi viết?

                3. BỐI CẢNH ĐỊA LÝ:
                   - Địa điểm cụ thể được đề cập?
                   - Đặc điểm địa lý ảnh hưởng đến câu chuyện?
                   - Khoảng cách, hành trình nếu có?

                4. BỐI CẢNH VĂN HÓA:
                   - Phong tục, tập quán liên quan?
                   - Đời sống xã hội thời đó?
                   - Quan hệ Do Thái - Dân Ngoại?
                   - Vai trò đền thờ, nhà hội?

                5. PHÂN TÍCH TỪ NGỮ:
                   - Các từ quan trọng từ {$language} gốc
                   - Ý nghĩa trong bối cảnh văn hóa thời đó
                   - KHÔNG giải thích thần học, chỉ giải thích ngữ nghĩa lịch sử

                6. THỂ LOẠI VĂN CHƯƠNG:
                   - Đoạn này thuộc thể loại gì?
                   - Các thủ pháp văn chương được sử dụng?
                   - Cách đọc đúng theo thể loại?

                LƯU Ý QUAN TRỌNG:
                - KHÔNG giảng giải thần học hay giáo lý
                - CHỈ tập trung vào LỊCH SỬ, VĂN HÓA, ĐỊA LÝ
                - Mục đích: Giúp người đọc HIỂU BỐI CẢNH để đọc Kinh Thánh đúng cách
                - Viết CHI TIẾT, ít nhất 1500-2000 từ

                Hãy bắt đầu phân tích bối cảnh ngay bây giờ!
                PROMPT;
    }

    private function logTokenUsage(array $response, array $parsedReference): void
      {
        $usage = $response['usage'] ?? [];

        Log::info('OpenAI Token Usage', [
            'reference' => $parsedReference['original_reference'],
            'model' => $this->model,
            'prompt_tokens' => $usage['prompt_tokens'] ?? 0,
            'completion_tokens' => $usage['completion_tokens'] ?? 0,
            'total_tokens' => $usage['total_tokens'] ?? 0,
        ]);
    }
}