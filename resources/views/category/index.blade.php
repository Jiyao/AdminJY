@extends('layouts.app')
@section('title', '文章类别管理')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header card-header-btn">
                <a href="{{ route('category.create') }}" class="btn btn-xs btn-default btn-toolbar"><i class="fa fa-plus"></i> 新增</a>
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
                                    <th>序号</th>
                                    <th>名称</th>
                                    <th>缩写</th>
                                    <th>描述</th>
                                    <th>文章数</th>
                                    <th>权重</th>
                                    <th>更新日期</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ str_limit($category->description, 30) }}</td>
                                        <td>{{ $category->article_count }}</td>
                                        <td>{{ $category->weight }}</td>
                                        <td>{{ $category->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', ['id' => $category->id]) }}"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="#"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('category.destroy', ['id' => $category->id]) }}"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">{!! $categories->links() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection