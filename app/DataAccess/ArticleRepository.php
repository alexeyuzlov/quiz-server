<?php declare(strict_types=1);

namespace App\DataAccess;

use App\CursorPagingModel;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleRepository
{
    public function search(CursorPagingModel $model)
    {
        $request = Article
            ::orderBy($model->sort->field, $model->sort->direction())
            ->orderBy('id', $model->sort->direction());

        if (isset($model->cursor)) {
            $operator = $model->sort->asc ? '>' : '<';

            $request
                ->where($model->sort->field, $operator, $model->cursor->nextValue)
                ->orWhere(function ($query) use ($model, $operator) {
                    $query
                        ->where($model->sort->field, '=', $model->cursor->nextValue)
                        ->where('id', $operator . '=', $model->cursor->nextId);
                });
        }

        $result = $request
            ->limit($model->pageSize + 1)
            ->get()
            ->toArray();

        return $model->toResponse($result);
    }

    public function create($body): Article
    {
        return $this->save($body, new Article());
    }

    private function save($body, Article $article): Article
    {
        $article->title = $body['title'];
        $article->text = $body['text'];

        Auth::user()->articles()->save($article);

        return $article;
    }
}
