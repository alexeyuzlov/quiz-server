<?php declare(strict_types=1);

namespace App\DataAccess;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionRepository
{
    public function getAll()
    {
        return Question::all();
    }

    public function find(Question $question)
    {
//        return Question::find($question);
        return $question;
    }

    public function create(Request $request): Question
    {
        $question = new Question();
        $question->question = $request->question;
        $question->answer = $request->answer;

        $question->save();

        return $question;
    }

    public function edit(Request $request, Question $question)
    {
        $question->question = $request->question;
        $question->answer = $request->answer;

        $question->save();

        return $question;
    }

    public function remove(Question $question)
    {
        $question->delete();
    }
}
