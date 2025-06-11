<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('q');

        $faqsQuery = Faq::query();

        if ($search) {
            $faqsQuery->where(function ($query) use ($search) {
                $query->where('question', 'like', '%' . $search . '%')
                    ->orWhere('answer', 'like', '%' . $search . '%')
                    ->orWhere('category', 'like', '%' . $search . '%');
            });
        }

        $faqs = $faqsQuery->get()->groupBy('category');

        return view('pages.faq', compact('faqs', 'search'));
    }
}
