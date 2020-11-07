<?php

namespace App\Http\Controllers;

use App\DataAccess\QuestionRepository;
use App\Http\Requests\StoreQuestion;
use App\Models\Question;
use App\Response;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
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
     * @param StoreQuestion $request
     * @return JsonResponse
     */
    public function store(StoreQuestion $request)
    {
        return Response::success(
            $this->questions->create($request->validated()),
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
     * @param StoreQuestion $request
     * @param Question $question
     * @return JsonResponse
     */
    public function update(StoreQuestion $request, Question $question)
    {
        return Response::success(
            $this->questions->edit($request->validated(), $question),
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
