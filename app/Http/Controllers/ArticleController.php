<?php

namespace App\Http\Controllers;

use App\Exceptions\ImageException;
use App\Http\Requests\ArticleStoreRequest;
use App\Jy\Markdown\Markdown;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::paginate(10);
        $title = '所有文章列表';
        return view('article.index', compact('articles', 'title'));
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

    public function listByCategory($category_id)
    {
        $articles = Article::where('category_id', $category_id)->paginate();
        $title = Category::select('name')->find($category_id);
        return view('article.index', compact('articles','title'));
    }

    public function listByTag($tag)
    {
        $tag = Tag::where('name', $tag)->first();
        $title = "标签：#".$tag->name;
        $articles = Article::whereRaw("FIND_IN_SET($tag->id, tagged)")->paginate();
        return view('article.index', compact('articles', 'title'));
    }
}
