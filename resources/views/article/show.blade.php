@extends('layouts.app')
@section('title', '文章内容')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-line">
                <h2 class="header-block">
                    {{ $article->title }}
                    <a href="{{ route('article.index') }}"><i class="fa fa-level-up"></i></a>
                </h2>
                <div class="row">
                    <div class="col-md-8">
                        <ul class="taglist taglist-inline header-block">
                            @foreach($article->tagged_name as $tagged_name)
                                <li class="tagpop"><a class="tag" href="">{{ $tagged_name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <span class="header-info pull-right mr-top-8">
                            <a href="#"><i class="fa fa-folder"></i>{{ $article->category_name }}</a>
                            <i title="{{ $article->updated_at }}">更新于: {{ $article->updated_at->diffForHumans() }}</i>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <blockquote class="summary">
                            <p>{{ $article->summary }}</p>
                        </blockquote>
                        <div>
                            {!! $article->html !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection