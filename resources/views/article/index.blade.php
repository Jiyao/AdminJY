@extends('layouts.app')
@section('title', '文章列表')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header card-header-btn">
                <a href="{{ route('article.create') }}" class="btn btn-xs btn-default btn-toolbar"><i class="fa fa-plus"></i> 新增</a>
            </div>
            <div class="card-body">
                <div class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                    <div class="top">
                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>
                                <input type="search" class="form-control input-sm" placeholder="Search..." aria-controls="DataTables_Table_0">
                            </label>
                        </div>
                        <div class="clear">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>文章名</th>
                                    <th>类别</th>
                                    <th>描述</th>
                                    <th>浏览数</th>
                                    <th>更新日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td>
                                            <a href="{{ route('article.show', ['id' => $article->id]) }}" title="{{ $article->title }}">
                                                {{ str_limit($article->title, 30) }}
                                            </a>
                                        </td>
                                        <td></td>
                                        <td>{{ str_limit($article->summary, 30) }}</td>
                                        <td>{{ $article->view_num }}</td>
                                        <td>{{ $article->updated_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-xs btn-primary">编辑</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">{!! $articles->links() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection