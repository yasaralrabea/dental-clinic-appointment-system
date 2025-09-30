<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Repositories\QuestionRepository;

class QuestionService
{
    protected $questionRepo;

    public function __construct(QuestionRepository $questionRepo)
    {
        $this->questionRepo = $questionRepo;
    }

    public function getMyQuestionsAndAnswers()
    {
        $userId = Auth::id();
        $questions = $this->questionRepo->getUserAnswers($userId);
        $answers = $this->questionRepo->getUserAnswers($userId);

        return compact('questions', 'answers');
    }

    public function storeQuestion($request)
    {
        $data = [
            'name' => $request->name,
            'subject' => $request->subject,
            'message' => $request->message,
            'user_id' => Auth::id(),
        ];

        return $this->questionRepo->createQuestion($data);
    }

    public function storeAnswer($request)
    {
        $question = $this->questionRepo->findQuestion($request->question_id);

        $answerData = [
            'doctor_name' => $request->doctor_name,
            'answer' => $request->answer,
            'message' => $request->message,
            'user_id' => $request->user_id,
            'subject' => $request->subject,
        ];

        $this->questionRepo->createAnswer($answerData);
        $this->questionRepo->markQuestionDone($question);

        return $question;
    }

    public function getAllQuestions()
    {
        return $this->questionRepo->getAllQuestions();
    }
}
