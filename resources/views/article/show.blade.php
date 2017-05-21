@extends('layouts.app')
@section('title', '文章内容')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>{{ $article->title }}
                    <a href="{{ route('article.index') }}"><i class="fa fa-level-up"></i></a>
                </h3>
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