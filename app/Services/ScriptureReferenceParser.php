<?php

namespace App\Services;

class ScriptureReferenceParser
{
    /**
     * Parse a scripture reference string into structured data
     *
     * @param string $reference Example: "Giăng 3:12-16" or "Sáng Thế Ký 1:1-5" or "Giăng 3" (entire chapter)
    * @return array Parsed reference data
    * @throws Exception if reference format is invalid
    */
    public function parse(string $reference): array
    {
        // Step 1: Clean the input
        $reference = trim($reference);

        // Step 2: Try two patterns
        // Pattern 1: Chapter only (e.g., "Giăng 3")
        $patternChapterOnly = '/^(.+?)\s+(\d+)$/u';

        // Pattern 2: Chapter with verses (e.g., "Giăng 3:12-16")
        // Pattern explanation:
        // ^             - Start of string
        // (.+?)         - Book name (non-greedy, captures everything until space+number)
        // \s+           - One or more spaces
        // (\d+)         - Chapter number (one or more digits)
        // :             - Colon separator
        // (\d+)         - Starting verse (one or more digits)
        // (?:-(\d+))?   - Optional: dash and ending verse
        // $             - End of string
        $patternWithVerses = '/^(.+?)\s+(\d+):(\d+)(?:-(\d+))?$/u';

        // Try chapter-only pattern first
        if (preg_match($patternChapterOnly, $reference, $matches)) {
            // Chapter only format: "Giăng 3"
            $bookName = trim($matches[1]);  // "Giăng"
            $chapter = (int) $matches[2];    // 3
            $verseStart = 1;                 // Start from verse 1
            $verseEnd = 999;                 // Fetch all verses (API will return only what exists)
            $isChapterOnly = true;
        } elseif (preg_match($patternWithVerses, $reference, $matches)) {
            // Verse range format: "Giăng 3:12-16"
            $bookName = trim($matches[1]);  // "Giăng"
            $chapter = (int) $matches[2];    // 3
            $verseStart = (int) $matches[3]; // 12
            $verseEnd = isset($matches[4]) ? (int) $matches[4] : $verseStart; // 16 or same as start
            $isChapterOnly = false;
        } else {
            throw new \Exception(
                'Định dạng câu Kinh Thánh không hợp lệ. ' .
                'Vui lòng sử dụng định dạng: "Tên Sách Chương:Câu-Câu" hoặc "Tên Sách Chương" ' .
                '(ví dụ: "Giăng 3:12-16", "Rô-ma 8:28-32", hoặc "Giăng 1" cho cả chương)'
            );
        }

        // Step 4: Look up book in config
        $bookData = config("bible_books.{$bookName}");

        if (!$bookData) {
            throw new \Exception(
                "Không tìm thấy sách '{$bookName}' trong Kinh Thánh. " .
                "Vui lòng kiểm tra lại tên sách (ví dụ: 'Giăng', 'Sáng Thế Ký', 'Rô-ma')"
            );
        }

        // Step 5: Calculate verse count
        $verseCount = $verseEnd - $verseStart + 1;

        // Step 6: Basic validations
        if ($chapter < 1) {
            throw new \Exception('Số chương phải lớn hơn 0');
        }

        if ($verseStart < 1) {
            throw new \Exception('Số câu phải lớn hơn 0');
        }

        if ($verseEnd < $verseStart) {
            throw new \Exception('Câu kết thúc phải lớn hơn hoặc bằng câu bắt đầu');
        }

        // Step 7: Return parsed data
        return [
            'original_reference' => $reference,
            'book_vi' => $bookName,
            'book_en' => $bookData['english'],
            'book_id' => $bookData['id'],
            'chapter' => $chapter,
            'verse_start' => $verseStart,
            'verse_end' => $verseEnd,
            'verse_count' => $verseCount,
            'testament' => $bookData['testament'],
            'is_chapter_only' => $isChapterOnly ?? false,
        ];
    }

    /**
     * Validate that the verse count meets minimum requirement
     *
     * @param array $parsedReference Result from parse()
     * @param int $minimumVerses Minimum required verses (default: 4)
     * @return bool
     * @throws Exception if verse count is less than minimum
     */
    public function validateVerseCount(array $parsedReference, int $minimumVerses = 4): bool
    {
        // Skip validation for chapter-only lookups (they fetch entire chapters)
        if ($parsedReference['is_chapter_only'] ?? false) {
            return true;
        }

        $count = $parsedReference['verse_count'];

        if ($count < $minimumVerses) {
            throw new \Exception(
                "Vui lòng nhập ít nhất {$minimumVerses} câu Kinh Thánh để đảm bảo ngữ cảnh đầy đủ. " .
                "Bạn đã nhập {$count} câu. " .
                "Ví dụ: '{$parsedReference['book_vi']} {$parsedReference['chapter']}:{$parsedReference['verse_start']}-" .
                ($parsedReference['verse_start'] + $minimumVerses - 1) . "' hoặc tra cứu cả chương: '{$parsedReference['book_vi']} {$parsedReference['chapter']}'"
            );
        }

        return true;
    }
}