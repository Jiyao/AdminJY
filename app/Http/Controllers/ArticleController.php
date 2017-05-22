<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadFileTrait;
use App\Markdown\Markdown;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use UploadFileTrait;

    public function index()
    {
        $articles = Article::paginate(10);
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->summary = $request->input('summary');
        $article->content = $request->input('content');
        $article->cover_url = $this->QiniuUpload('cover', $request);
        $article->created_at = time();
        $article->save();
        \Flashy::success('文章添加成功');
        return redirect()->route('article.index');
    }

    public function show($id, Markdown $markdown)
    {
        $article = Article::findOrFail($id);
        $article->html = $markdown->markdownToHtml($article->content);
        return view('article.show', compact('article'));
    }
}
