@extends('layouts.app')
@section('title', '标签管理')
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header card-header-btn">
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
                                    <th>描述</th>
                                    <th>使用数</th>
                                    <th>更新日期</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td>{{ $tag->description }}</td>
                                        <td>{{ $tag->use_times }}</td>
                                        <td>{{ $tag->updated_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="text-center">{!! $tags->links() !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection