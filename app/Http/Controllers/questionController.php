<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\QuestionService;

class QuestionController extends Controller
{
    protected $questionService;

    public function __construct(QuestionService $questionService)
    {
        $this->questionService = $questionService;
    }

    public function my_q()
    {
        $data = $this->questionService->getMyQuestionsAndAnswers();
        return view('my_q', $data);
    }

    public function send()
    {
        return view('send');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $this->questionService->storeQuestion($request);

        return redirect()->back()->with('success', 'تم إرسال الجواب بنجاح');
    }

    public function show()
    {
        $questions = $this->questionService->getAllQuestions();
        return view('show_Q', compact('questions'));
    }

    public function store_A(Request $request)
    {
        $this->questionService->storeAnswer($request);

        return view('sucss_Q', ['message' => 'تم إرسال الإجابة بنجاح']);
    }
}
