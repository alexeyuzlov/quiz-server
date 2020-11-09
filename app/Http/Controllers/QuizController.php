<?php

namespace App\Http\Controllers;

use App\DataAccess\QuestionRepository;
use App\Http\Requests\QuizCheckRequest;
use App\Response;

class QuizController extends Controller
{
    /**
     * @var QuestionRepository
     */
    private $questions;

    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
    }

    public function index()
    {
        $questions = $this->questions->getAll()->load('answers');
        return Response::success($questions);
    }

    public function check(QuizCheckRequest $request)
    {
        $validatedData = $request->validated();
        $results = collect($validatedData['questions']);

        return Response::success(
            $this->questions->checkAnswers($results)
        );
    }
}
