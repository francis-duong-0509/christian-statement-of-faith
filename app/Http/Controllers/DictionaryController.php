<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DictionaryController extends Controller
{
    /**
     * Display a listing of the resource.
     
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
     * @return View
     */
    public function lookup(Request $request): View
    {
        // Validate the input
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

        // TODO: Parse the reference (e.g., "Giăng 3:12-16" -> book, chapter, verses)
        // TODO: Validate verse count (must be 4-6 verses)
        // TODO: Call Bible API to get Vietnamese text + Original text
        // TODO: Call OpenAI API for exegesis
        // TODO: Save to database (optional caching)

        // For now, just pass the data to the view with mock data
        return view('dictionary.show', [
            'testament' => $validated['testament'],
            'reference' => $validated['reference'],
            // Mock data for testing the UI
            'book' => 'Giăng',
            'chapter' => '3',
            'verseStart' => '12',
            'verseEnd' => '16',
            'verseCount' => 5,
            'vietnameseText' => 'Mock Vietnamese text will go here...',
            'originalText' => 'Mock Hebrew/Greek text will go here...',
            'exegesis' => 'Mock AI-generated exegesis will go here...',
        ]);
    }
}
