<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class BibleApiService
{
    private const API_BASE_URL = 'https://bolls.life';
    private const VIETNAMESE_TRANSLATION = 'VI1934';
    private const HEBREW_TRANSLATION = 'WLC';
    private const GREEK_TRANSLATION = 'TISCH';
    
    private function fetchVerses(int $bookId, int $chapter, int $verseStart, int $verseEnd, string $translation): array
    {
        // Build array of verse numbers
        // Example: verseStart=12, verseEnd=16 -> [12, 13, 14, 15, 16]
        $verses = range($verseStart, $verseEnd);

        // Prepare API request payload
        $payload = [
            [
                'translation' => $translation,
                'book' => $bookId,
                'chapter' => $chapter,
                'verses' => $verses
            ]
        ];

        try {
            // Make POST request to Bolls.life API
            $response = Http::timeout(10)->post(self::API_BASE_URL . '/get-verses/', $payload);

            // Check if request was successful
            if (!$response->successful()) {
                throw new \Exception("Bible API returned error: " . $response->status());
            }

            // Get response data
            $data = $response->json();

            // Bolls API returns nested array: [[verse1, verse2,....]]
            // We want just the inner array
            if (!isset($data[0]) || !is_array($data[0])) {
                throw new \Exception("Unexpected API response format");
            }

            return $data[0];
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Bible API Error', [
                'translation' => $translation,
                'book_id' => $bookId,
                'chapter' => $chapter,
                'verses' => $verses,
                'error' => $e->getMessage()
            ]);

            // Throw user-friendly error
            throw new \Exception("Có lỗi trong quá trình phân tích Kinh Thánh. Vui lòng thử lại !");
        }
    }

    public function getVietnameseText(int $bookId, int $chapter, int $verseStart, int $verseEnd): array
    {
        $verses = $this->fetchVerses($bookId, $chapter, $verseStart, $verseEnd, self::VIETNAMESE_TRANSLATION);

        // Combine verses into single text
        // Example format: "12 [verse text] 13 [verse text] 14 [verse text]"
        return [
            'text' => $this->formatVerses($verses, true),
            'verse_count' => count($verses),
            'actual_start' => $verses[0]['verse'] ?? $verseStart,
            'actual_end' => $verses[count($verses) - 1]['verse'] ?? $verseEnd,
        ];
    }

    public function getOriginalText(string $testament, int $bookId, int $chapter, int $verseStart, int $verseEnd): string
    {
        // Choose translation based on testament
        $translation = ($testament == 'old') ? self::HEBREW_TRANSLATION : self::GREEK_TRANSLATION;

        $verses = $this->fetchVerses($bookId, $chapter, $verseStart, $verseEnd, $translation);

        // Original text includes Strong's numbers (e.g., [H1234])
        // We'll keep them for now - might be useful for exegesis
        return $this->formatVerses($verses, true);
    }

    private function formatVerses(array $verses, bool $includeVerseNumbers = true): string
    {
        $formatted = [];

        foreach ($verses as $verse) {
            // Each verse object has: pk, translation, book, chapter, verse, text
            $verseNumber = $verse['verse'];
            $verseText = $verse['text'];

            if ($includeVerseNumbers) {
                // Format: "12 [text] 13 [text] 14 [text]"
                $formatted[] = "{$verseNumber} {$verseText}";
            } else {
                // Format: "[text] [text] [text]"
                $formatted[] = $verseText;
            }
        }

        // Join with space
        return implode(' ', $formatted);
    }

    public function getOriginalLanguageName(string $testament): string
    {
        return ($testament === 'old') ? 'Tiếng Do Thái' : 'Tiếng Hy Lạp';
    }
}
