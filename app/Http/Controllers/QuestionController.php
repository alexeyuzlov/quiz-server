<?php

namespace App\Http\Controllers;

use App\DataAccess\QuestionRepository;
use App\Models\Question;
use App\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // todo create QuestionRequest
    protected $rules = [
        'question' => 'required|max:255',
        'answer' => 'required|max:255'
    ];

    private $questions;


    public function __construct(QuestionRepository $questions)
    {
        $this->questions = $questions;
    }

    public function index()
    {
        return Response::success($this->questions->getAll());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate($this->rules);

        return Response::success(
            $this->questions->create($request),
            'Question created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function show(Question $question)
    {
        return Response::success($this->questions->find($question));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Question $question
     * @return JsonResponse
     */
    public function update(Request $request, Question $question)
    {
        $request->validate($this->rules);

        return Response::success(
            $this->questions->edit($request, $question),
            'Question updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Question $question
     * @return JsonResponse
     */
    public function destroy(Question $question)
    {
        $this->questions->remove($question);

        return Response::success(null, 'Question deleted');
    }
}
