<?php

namespace App\Http\Controllers;

use App\CursorPagingModel;
use App\DataAccess\ArticleRepository;
use App\Http\Requests\ArticleRequest;
use App\Http\Requests\CursorPagingRequest;
use App\Http\Requests\PagingRequest;
use App\Models\Article;
use App\Response;
use Illuminate\Http\JsonResponse;

class ArticleController extends Controller
{
    /**
     * @var ArticleRepository
     */
    public $articles;

    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articles = $articleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @param PagingRequest $request
     * @return JsonResponse
     */
    public function search(CursorPagingRequest $request)
    {
        $model = new CursorPagingModel($request->validated());

        $response = $this->articles->search($model);

        return Response::success($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $request
     * @return JsonResponse
     */
    public function store(ArticleRequest $request)
    {
        return Response::success(
            $this->articles->create($request->validated()),
            'Article created'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticleRequest $request
     * @param \App\Models\Article $article
     * @return JsonResponse
     */
    public function update(ArticleRequest $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
