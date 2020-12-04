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

        if (isset($model->lastValue)) {
            $request->where($model->sort->field, '>', $model->lastValue);
        }

        return $request
            ->limit($model->pageSize)
            ->get();
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
