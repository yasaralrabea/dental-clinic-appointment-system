<?php

namespace App\Repositories;

use App\Models\Send;
use App\Models\Answer;

class QuestionRepository
{
    public function getUserAnswers($userId)
    {
        return Answer::where('user_id', $userId)->get();
    }

    public function getAllQuestions()
    {
        return Send::withTrashed()->get();
    }

    public function createQuestion($data)
    {
        return Send::create($data);
    }

    public function findQuestion($id)
    {
        return Send::withTrashed()->findOrFail($id);
    }

    public function createAnswer($data)
    {
        return Answer::create($data);
    }

    public function markQuestionDone($question)
    {
        $question->condition = 'done';
        $question->delete();
        $question->save();
    }
}
