<?php

namespace App\Http\Controllers;

use App\Services\DictionaryService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Dictionary service instance
     */
    private DictionaryService $dictionaryService;

    /**
     * Constructor - inject DictionaryService
     */
    public function __construct(DictionaryService $dictionaryService)
    {
        $this->dictionaryService = $dictionaryService;
    }

    /**
     * Display dictionary lookup page
     * Route: GET /dictionary
     *
     * @return View
     */
    public function index(): View
    {
        return view('dictionary.index');
    }

    /**
     * Process lookup request and show results
     * Route: POST /dictionary/lookup
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function lookup(Request $request): View|RedirectResponse
    {
        // ============================================
        // STEP 1: Validate basic input
        // ============================================
        $validated = $request->validate([
            'testament' => 'required|in:old,new',
            'reference' => 'required|string|min:3|max:100',
        ], [
            'testament.required' => 'Vui lòng chọn Giao Ước (Cựu Ước hoặc Tân Ước).',
            'testament.in' => 'Giao Ước không hợp lệ.',
            'reference.required' => 'Vui lòng nhập câu Kinh Thánh cần tra cứu.',
            'reference.min' => 'Câu Kinh Thánh phải có ít nhất 3 ký tự.',
            'reference.max' => 'Câu Kinh Thánh không được vượt quá 100 ký tự.',
        ]);

        try {
            // ============================================
            // STEP 2: Call DictionaryService to do the lookup
            // ============================================
            $result = $this->dictionaryService->lookup(
                $validated['testament'],
                $validated['reference']
            );

            // ============================================
            // STEP 3: Return success view with data
            // ============================================
            return view('dictionary.show', $result);

        } catch (Exception $e) {
            // ============================================
            // STEP 4: Handle errors gracefully
            // ============================================

            // Redirect back to form with error message
            return redirect()
                ->route('dictionary.index')
                ->withInput() // Keep user's input
                ->withErrors([
                    'lookup_error' => $e->getMessage()
                ]);
        }
    }
}
