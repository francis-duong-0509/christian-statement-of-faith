<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Log;

class DictionaryService
{
    /**
     * Service dependencies
     */
    private ScriptureReferenceParser $parser;
    private BibleApiService $bibleApi;
    private OpenAiExegesisService $openAi;

    /**
     * Constructor - inject dependencies
     */
    public function __construct(
        ScriptureReferenceParser $parser,
        BibleApiService $bibleApi,
        OpenAiExegesisService $openAi
    ) {
        $this->parser = $parser;
        $this->bibleApi = $bibleApi;
        $this->openAi = $openAi;
    }

    /**
     * Perform a complete dictionary lookup
     *
     * This is the main method that orchestrates the entire lookup flow:
     * 1. Parse the scripture reference
     * 2. Validate verse count (minimum 4)
     * 3. Fetch Vietnamese Bible text
     * 4. Generate AI exegesis
     * 5. Return all data for the view
     *
     * @param string $testament 'old' or 'new'
     * @param string $reference User input like "Giăng 3:12-16"
     * @return array Complete lookup data for the view
     * @throws Exception if any step fails
     */
    public function lookup(string $testament, string $reference): array
    {
        try {
            // ============================================
            // STEP 1: Parse and validate the reference
            // ============================================
            Log::info('Dictionary Lookup Started', [
                'testament' => $testament,
                'reference' => $reference,
            ]);

            // Parse the reference string
            $parsed = $this->parser->parse($reference);

            // Validate testament matches book testament
            if ($parsed['testament'] !== $testament) {
                throw new Exception(
                    "Sách '{$parsed['book_vi']}' thuộc về " .
                    ($parsed['testament'] === 'old' ? 'Cựu Ước' : 'Tân Ước') .
                    ", không phải " .
                    ($testament === 'old' ? 'Cựu Ước' : 'Tân Ước') .
                    ". Vui lòng chọn Giao Ước đúng."
                );
            }

            // Validate verse count (minimum 4 verses)
            $this->parser->validateVerseCount($parsed, 4);

            Log::info('Reference Parsed Successfully', $parsed);

            // ============================================
            // STEP 2: Fetch Vietnamese Bible text
            // ============================================
            $vietnameseResult = $this->bibleApi->getVietnameseText(
                $parsed['book_id'],
                $parsed['chapter'],
                $parsed['verse_start'],
                $parsed['verse_end']
            );

            $vietnameseText = $vietnameseResult['text'];
            $actualVerseCount = $vietnameseResult['verse_count'];
            $actualVerseEnd = $vietnameseResult['actual_end'];

            // Update parsed reference with actual verse count from API
            $parsed['verse_end'] = $actualVerseEnd;
            $parsed['verse_count'] = $actualVerseCount;

            Log::info('Vietnamese Text Fetched', [
                'length' => strlen($vietnameseText),
                'actual_verse_count' => $actualVerseCount,
                'actual_verse_end' => $actualVerseEnd,
            ]);

            // ============================================
            // STEP 3: Generate AI exegesis
            // ============================================
            $exegesis = $this->openAi->generateExegesis(
                $parsed,
                $vietnameseText
            );

            Log::info('Exegesis Generated', [
                'length' => strlen($exegesis),
            ]);

            // ============================================
            // STEP 4: Prepare data for the view
            // ============================================
            $result = [
                // Original inputs
                'testament' => $testament,
                'reference' => $reference,

                // Parsed reference data
                'book' => $parsed['book_vi'],
                'book_en' => $parsed['book_en'],
                'chapter' => $parsed['chapter'],
                'verseStart' => $parsed['verse_start'],
                'verseEnd' => $parsed['verse_end'],
                'verseCount' => $parsed['verse_count'],

                // Bible text
                'vietnameseText' => $vietnameseText,

                // AI-generated exegesis
                'exegesis' => $exegesis,

                // Metadata
                'timestamp' => now()->toIso8601String(),
            ];

            Log::info('Dictionary Lookup Completed Successfully', [
                'reference' => $reference,
            ]);

            return $result;

        } catch (Exception $e) {
            // Log the error with full context
            Log::error('Dictionary Lookup Failed', [
                'testament' => $testament,
                'reference' => $reference,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            // Re-throw the exception to be handled by controller
            throw $e;
        }
    }

    /**
     * Get a preview/summary of what the lookup will do
     *
     * Useful for showing user what will be looked up before calling OpenAI
     * (to save API costs during testing)
     *
     * @param string $testament 'old' or 'new'
     * @param string $reference Scripture reference
     * @return array Preview data
     * @throws Exception if parsing fails
     */
    public function preview(string $testament, string $reference): array
    {
        // Parse and validate
        $parsed = $this->parser->parse($reference);

        if ($parsed['testament'] !== $testament) {
            throw new Exception(
                "Sách '{$parsed['book_vi']}' thuộc về " .
                ($parsed['testament'] === 'old' ? 'Cựu Ước' : 'Tân Ước')
            );
        }

        $this->parser->validateVerseCount($parsed, 4);

        // Return preview without calling APIs
        return [
            'valid' => true,
            'book' => $parsed['book_vi'],
            'book_en' => $parsed['book_en'],
            'chapter' => $parsed['chapter'],
            'verse_start' => $parsed['verse_start'],
            'verse_end' => $parsed['verse_end'],
            'verse_count' => $parsed['verse_count'],
            'testament' => $parsed['testament'],
        ];
    }
}
