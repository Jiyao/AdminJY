<?php

namespace App\Http\Controllers;

use App\Markdown\Markdown;
use App\Models\Article;
use App\Services\ImageService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public static $img_dir = 'article/cover/';
    public static $img_type = 'cover';

    public function index()
    {
        $articles = Article::paginate(10);
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(Request $request, ImageService $imageService)
    {
        $article = new Article;
        $article->title = $request->input('title');
        $article->summary = $request->input('summary');
        $article->content = $request->input('content');
        $article->cover = $imageService->uploadImages($request->file('cover'), self::$img_dir, self::$img_type);
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
