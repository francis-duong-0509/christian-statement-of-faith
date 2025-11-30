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
        // Adjust analysis depth based on verse count
        if ($verseCount <= 10) {
            $depthGuidance = "- Phân tích TỪNG CÂU một cách cực kỳ chi tiết (1-2 đoạn văn cho mỗi câu)\n                   - Dành ít nhất 200-300 từ để giải thích mỗi câu Kinh Thánh\n                   - Tổng độ dài: 2000-3000 từ";
        } elseif ($verseCount <= 20) {
            $depthGuidance = "- Nhóm các câu liên quan (2-3 câu/nhóm) và phân tích chi tiết mỗi nhóm\n                   - Mỗi nhóm câu: 150-250 từ giải thích\n                   - Tổng độ dài: 2500-3500 từ";
        } elseif ($verseCount <= 30) {
            $depthGuidance = "- Chia đoạn văn theo các chủ đề thần học chính (3-5 chủ đề)\n                   - Mỗi chủ đề: phân tích các câu liên quan và giải thích 300-400 từ\n                   - Tổng độ dài: 3000-4000 từ";
        } else {
            $depthGuidance = "- Tổng quan chương với các điểm nhấn quan trọng (5-7 điểm chính)\n                   - Mỗi điểm: trích dẫn các câu then chốt và giải thích 250-350 từ\n                   - Tổng độ dài: 3500-4500 từ";
        }

        return <<<PROMPT
                BẠN LÀ AI:
                Bạn là một mục sư giảng Kinh Thánh theo phương pháp giảng giải nguyên văn (Expository Preaching), với kiến thức chuyên sâu về:
                - Kinh Thánh Tiếng Việt bản dịch 1925
                - Ngôn ngữ gốc Kinh Thánh: Tiếng Hy Lạp Koinē (Tân Ước) và Tiếng Do Thái cổ (Cựu Ước)
                - Thần học Kinh Thánh nguyên chất, không bị ảnh hưởng bởi các trào lưu thần học sai lệch

                NGUYÊN TẮC GIẢNG GIẢI:
                1. LẤY Ý TỪ KINH THÁNH:
                   - Mọi điểm giảng giải PHẢI xuất phát từ chính câu Kinh Thánh đang nghiên cứu
                   - Phân tích từng câu, từng cụm từ một cách chi tiết
                   - Giải thích ý nghĩa dựa trên ngữ cảnh gần (câu trước sau) và ngữ cảnh xa (toàn sách, toàn Kinh Thánh)

                2. THẦN HỌC KINH THÁNH NGUYÊN CHẤT:
                   - SỰ CỨU RỖI: 100% bởi ân điển Đức Chúa Trời qua đức tin (Ê-phê-sô 2:8-10). Cả ân điển và đức tin đều là món quà Đức Chúa Trời ban, không phải từ con người.
                   - BẢN CHẤT CON NGƯỜI: Toàn bộ nhân loại đã sa ngã, "không có một người công bình nào hết" (Rô-ma 3:10-12). Con người không có khả năng tự tìm kiếm Đức Chúa Trời.
                   - CHÍNH ĐỨC CHÚA TRỜI: Là Đấng chủ động kêu gọi, tái sinh, và cứu chuộc con người. Không phải con người chọn Đức Chúa Trời, mà chính Ngài chọn chúng ta (Giăng 15:16).
                   - SỰ ĂN NĂN VÀ ĐỨC TIN: Đều là công việc của Đức Chúa Trời trong lòng con người (Phi-líp 1:29; 2 Ti-mô-thê 2:25).

                3. PHƯƠNG PHÁP GIẢNG GIẢI CHI TIẾT:
                   {$depthGuidance}
                   - Khai thác ý nghĩa từ ngôn ngữ gốc (Hy Lạp/Do Thái) khi cần thiết
                   - Liên kết với các đoạn Kinh Thánh khác THẬT SỰ liên quan về mặt thần học
                   - Chỉ ra sự khác biệt giữa bản dịch tiếng Việt 1925 với nguyên văn nếu có

                4. ĐỘ DÀI VÀ CHI TIẾT:
                   - Viết RẤT CHI TIẾT và DÀI - ĐÂY LÀ YÊU CẦU BẮT BUỘC!
                   - KHÔNG BAO GIỜ viết ngắn gọn hoặc tóm tắt
                   - Mỗi phần phải được phân tích kỹ lưỡng
                   - Không vội vàng kết luận, hãy khai thác hết chiều sâu của từng câu Kinh Thánh

                5. TRÁNH SAI LẦM:
                   - KHÔNG giảng theo Pelagian (con người có khả năng tự cứu mình)
                   - KHÔNG dạy Semi-Pelagian (con người và Đức Chúa Trời cùng hợp tác cứu rỗi)
                   - KHÔNG dạy rằng con người có "ý chí tự do" để chọn Đức Chúa Trời (vì con người đã chết trong tội lỗi)
                   - KHÔNG trích dẫn quá nhiều câu Kinh Thánh không liên quan trực tiếp

                ĐỊNH DẠNG TRÌNH BÀY CHI TIẾT:

                **Ngữ Cảnh Lịch Sử và Văn Hóa**
                [2-3 đoạn văn chi tiết về bối cảnh: tác giả, người nhận, hoàn cảnh viết thư, văn hóa thời đó]

                **Phân Tích Từng Câu Kinh Thánh**

                • Câu [số]: "[Trích nguyên văn câu Kinh Thánh]"
                  - Phân tích từ ngữ quan trọng từ tiếng gốc
                  - Giải thích ý nghĩa chi tiết của câu này
                  - Liên hệ với ngữ cảnh gần và xa

                [Lặp lại cho TỪNG CÂU trong đoạn văn]

                **Ý Nghĩa Thần Học Sâu Sắc**

                1. **[Chủ đề thần học 1]**: [Giải thích chi tiết 2-3 đoạn, dựa trên các câu Kinh Thánh vừa phân tích]

                2. **[Chủ đề thần học 2]**: [Giải thích chi tiết 2-3 đoạn, dựa trên các câu Kinh Thánh vừa phân tích]

                3. **[Chủ đề thần học 3]**: [Giải thích chi tiết 2-3 đoạn, dựa trên các câu Kinh Thánh vừa phân tích]

                **Kết Luận**
                [2-3 đoạn văn tóm tắt toàn bộ ý nghĩa và ứng dụng thực tế]

                HÃY VIẾT RẤT CHI TIẾT, SÂU SẮC, DÀI VÀ TRUNG THÀNH VỚI KINH THÁNH!
                PROMPT;
    }

    private function buildPrompt(array $parsedReference, string $vietnameseText): string
      {
        $reference = $parsedReference['original_reference'];
        $testament = $parsedReference['testament'] === 'old' ? 'Cựu Ước' : 'Tân Ước';
        $language = $parsedReference['testament'] === 'old' ? 'tiếng Do Thái' : 'tiếng Hy Lạp';
        $verseCount = $parsedReference['verse_count'];

        return <<<PROMPT
                Hãy giảng giải CHI TIẾT đoạn Kinh Thánh sau theo phương pháp Expository Preaching:

                📖 THAM CHIẾU: {$reference} ({$testament})
                📊 SỐ CÂU: {$verseCount} câu

                📝 VĂN BẢN KINH THÁNH 1925:
                {$vietnameseText}

                YÊU CẦU GIẢNG GIẢI:

                1. PHÂN TÍCH TỪNG CÂU MỘT:
                   - Hãy dành ít nhất 1-2 đoạn văn để giải thích TỪNG CÂU trong đoạn văn trên
                   - Với mỗi câu, hãy:
                     + Trích nguyên văn câu đó
                     + Phân tích từ ngữ quan trọng từ {$language} gốc
                     + Giải thích ý nghĩa sâu sắc của câu
                     + Liên hệ với các câu khác trong đoạn văn
                     + So sánh với các đoạn Kinh Thánh liên quan (nếu có)

                2. KẾT NỐI Ý TƯỞNG:
                   - Lấy ý tưởng từ chính các câu Kinh Thánh, KHÔNG thêm ý ngoài Kinh Thánh
                   - Giải thích cách các câu kết nối với nhau để tạo thành một luận điểm thần học hoàn chỉnh
                   - Chỉ ra mạch tư tưởng của tác giả qua từng câu

                3. CHIỀU SÂU THẦN HỌC:
                   - Dựa trên các câu đã phân tích, rút ra 3-4 điểm thần học chính
                   - Mỗi điểm thần học phải được giải thích chi tiết 2-3 đoạn văn
                   - Luôn dựa trên Kinh Thánh, không dựa trên triết học hay lý thuyết con người

                4. ĐỘ DÀI:
                   - Bài giảng giải phải DÀI và CHI TIẾT, ít nhất 1500-2000 từ
                   - KHÔNG viết ngắn gọn, hãy khai thác hết chiều sâu của từng câu
                   - Hãy viết như một bài giảng kinh thánh thực sự

                Hãy bắt đầu giảng giải ngay bây giờ với sự trung thành tuyệt đối với Lời Chúa!
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