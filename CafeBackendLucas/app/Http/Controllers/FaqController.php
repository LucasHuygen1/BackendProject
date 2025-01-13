<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{

    //for everyone 
    public function index()
    {
        $faqs = Faq::paginate(10);
        return view('admin.faq.index', compact('faqs'));
    }
    /**
     * Display the public FAQ page.
     *
     */
    public function publicIndex()
    {
        // If you're grouping FAQs by category, load categories with FAQs
        $categories = FaqCategory::with('faqs')->get();
        return view('faq.public', compact('categories'));
    }

    //----------------- for admin from here on
    /**
     * Display a listing of FAQs for the admin.
     *
     * 
     */
    public function adminIndex()
    {
        $faqs = Faq::paginate(10);
        return view('admin.faq.index', compact('faqs'));
    }

    
    /**
     * Show the form for creating a new FAQ.
     */
    public function create()
    {
        $categories = FaqCategory::all();
        return view('admin.faq.create', compact('categories'));
    }

    /**
     * Store a newly created FAQ in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question'         => 'required|string',
            'answer'           => 'required|string',
            'category_ids'     => 'required|array', 
            'category_ids.*'   => 'exists:faq_categories,id',
            'user_id'          => 'required|exists:users,id',
        ]);

        $faq = Faq::create([
            'question' => $validated['question'],
            'answer'   => $validated['answer'],
            'user_id'  => $validated['user_id'],
        ]);

        $faq->categories()->attach($validated['category_ids']);

        return redirect()->route('admin.faq.index')
                         ->with('status', 'FAQ created successfully.');
    }

    /**
     * Display the specified FAQ.
     */
    public function show($id)
    {
        $faq = Faq::findOrFail($id);
        return view('faq.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified FAQ.
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $categories = FaqCategory::all();

        return view('admin.faq.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified FAQ in storage.
     */
    public function update(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $validated = $request->validate([
            'question'         => 'required|string',
            'answer'           => 'required|string',
            'category_ids'     => 'required|array',
            'category_ids.*'   => 'exists:faq_categories,id',
        ]);

        $faq->update([
            'question' => $validated['question'],
            'answer'   => $validated['answer'],
        ]);

        $faq->categories()->sync($validated['category_ids']);

        return redirect()->route('admin.faq.index')
                         ->with('status', 'FAQ updated successfully.');
    }

    /**
     * Remove the specified FAQ from storage.
     */
    public function destroy($id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faq.index')
                         ->with('status', 'FAQ deleted successfully.');
    }
}
