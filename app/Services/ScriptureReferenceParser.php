<?php

namespace App\Services;

class ScriptureReferenceParser
{
    /**
     * Parse a scripture reference string into structured data
     *
     * @param string $reference Example: "Giăng 3:12-16" or "Sáng Thế Ký 1:1-5"
    * @return array Parsed reference data
    * @throws Exception if reference format is invalid
    */
    public function parse(string $reference): array
    {
        // Step 1: Clean the input
        $reference = trim($reference);

        // Step 2: Extract components using regex
        // Pattern explanation:
        // ^             - Start of string
        // (.+?)         - Book name (non-greedy, captures everything until space+number)
        // \s+           - One or more spaces
        // (\d+)         - Chapter number (one or more digits)
        // :             - Colon separator
        // (\d+)         - Starting verse (one or more digits)
        // (?:-(\d+))?   - Optional: dash and ending verse
        // $             - End of string
        $pattern = '/^(.+?)\s+(\d+):(\d+)(?:-(\d+))?$/u';

        if (!preg_match($pattern, $reference, $matches)) {
            throw new \Exception(
                'Định dạng câu Kinh Thánh không hợp lệ. ' .
                'Vui lòng sử dụng định dạng: "Tên Sách Chương:Câu-Câu" ' .
                '(ví dụ: "Giăng 3:12-16" hoặc "Rô-ma 8:28-32")'
            );
        }

        // Step 3: Extract matched components
        $bookName = trim($matches[1]);  // "Giăng"
        $chapter = (int) $matches[2];    // 3
        $verseStart = (int) $matches[3]; // 12
        $verseEnd = isset($matches[4]) ? (int) $matches[4] : $verseStart; // 16 or same as start

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
        $count = $parsedReference['verse_count'];

        if ($count < $minimumVerses) {
            throw new \Exception(
                "Vui lòng nhập ít nhất {$minimumVerses} câu Kinh Thánh để đảm bảo ngữ cảnh đầy đủ. " .
                "Bạn đã nhập {$count} câu. " .
                "Ví dụ: '{$parsedReference['book_vi']} {$parsedReference['chapter']}:{$parsedReference['verse_start']}-" .
                ($parsedReference['verse_start'] + $minimumVerses - 1) . "'"
            );
        }

        return true;
    }
}