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
        // Build the prompt
        $prompt = $this->buildPrompt($parsedReference, $vietnameseText);

        try {
            // Make API request
            $response = Http::timeout(60)
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type' => 'application/json',
                ])
                ->post(self::API_BASE_URL . '/chat/completions', [
                    'model' => $this->model,
                    'messages' => [
                        [
                            'role' => 'system',
                            'content' => $this->getSystemPrompt(),
                        ],
                        [
                            'role'=> 'user',
                            'content' => $prompt,
                        ],
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 2000,
                ]);

                if (!$response->successful()) {
                    $error = $response->json()['error']['message'] ?? 'Unknown error';
                    throw new \Exception("OpenAI API error: {$error}");
                }

                $data = $response->json();

                // Extract the generated text
                $exegesis = $data['choices'][0]['message']['content'] ?? '';

                if (empty($exegesis)) {
                    throw new \Exception('OpenAI returned empty response.');
                }

                // Log token usage for cost tracking
                $this->logTokenUsage($data, $parsedReference);

                return trim($exegesis);
        } catch (\Exception $e) {
            Log::error('OpenAI API Error', [
                'reference' => $parsedReference['original_reference'],
                'error' => $e->getMessage(),
            ]);

            throw new \Exception('Không thể tạo giải thích từ AI. Vui lòng thử lại sau.');
        }
    }

    private function getSystemPrompt(): string
    {
        return <<<PROMPT
                Bạn là một học giả Kinh Thánh chuyên sâu với kiến thức về tiếng Do Thái, tiếng
                Hy Lạp, và thần học Cơ Đốc giáo.

                NHIỆM VỤ CỦA BẠN:
                - Giải thích ý nghĩa thuần túy của đoạn Kinh Thánh từ ngôn ngữ gốc (Do Thái 
                hoặc Hy Lạp)
                - Phân tích ngữ cảnh lịch sử, văn hóa, và thần học
                - Làm rõ những từ ngữ quan trọng trong ngôn ngữ gốc
                - Chỉ ra ý nghĩa thần học chính xác, tránh hiểu sai
                - Giải thích bằng tiếng Việt, dễ hiểu, chi tiết

                QUAN TRỌNG:
                - Đây KHÔNG phải là bản dịch, mà là GIẢI THÍCH ngữ cảnh và ý nghĩa thần học
                - Tập trung vào ý nghĩa gốc từ tiếng Do Thái/Hy Lạp
                - Chỉ ra những chỗ bản dịch tiếng Việt có thể chưa truyền đạt đầy đủ
                - Sử dụng học thuật Kinh Thánh chính thống (Reformed theology)

                ĐỊNH DẠNG TRÌNH BÀY:
                1. Giới thiệu ngữ cảnh của đoạn văn
                2. Phân tích từng phần quan trọng
                3. Giải thích ý nghĩa thần học sâu sắc
                4. Kết luận tóm tắt

                Hãy viết chi tiết, rõ ràng, và sâu sắc.
                PROMPT;
    }

    private function buildPrompt(array $parsedReference, string $vietnameseText): string
      {
        $reference = $parsedReference['original_reference'];
        $testament = $parsedReference['testament'] === 'old' ? 'Cựu Ước' : 'Tân Ước';
        $language = $parsedReference['testament'] === 'old' ? 'tiếng Do Thái' : 'tiếng Hy Lạp';

        return <<<PROMPT
                Hãy giải thích đoạn Kinh Thánh sau:

                📖 THAM CHIẾU: {$reference} ({$testament})

                📝 BẢN TIẾNG VIỆT (Kinh Thánh 1934):
                {$vietnameseText}

                Hãy phân tích và giải thích đoạn này dựa trên ý nghĩa gốc từ {$language},
                ngữ cảnh lịch sử, và ý nghĩa thần học thuần túy.
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