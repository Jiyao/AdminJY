<?php

namespace App\Http\Controllers;

use App\Exceptions\ImageException;
use App\Http\Requests\ArticleStoreRequest;
use App\Jy\Markdown\Markdown;
use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(10);
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(ArticleStoreRequest $request)
    {
        $article = new Article;
        try {
            $request->commonUpdate($article);
            \Flashy::success('文章添加成功');
        }catch (ImageException $e){
            \Flashy::error($e->getMessage());
            return redirect()->back()->withInput($request->input());
        }
        return redirect()->route('article.index');
    }

    public function show($id, Markdown $markdown)
    {
        $article = Article::findOrFail($id);
        $article->html = $markdown->markdownToHtml($article->content);
        return view('article.show', compact('article'));
    }
}
