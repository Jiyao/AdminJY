@extends('layouts.app')
@section('title', '角色列表')
@section('content')
<div class="col-xs-12">
    <div class="card">
        <div class="card-header card-header-btn">
            <a href="{{ route('role.create') }}" class="btn btn-xs btn-default btn-toolbar"><i class="fa fa-plus"></i> 新增</a>
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
                                <th>角色名</th>
                                <th>角色名称</th>
                                <th>描述</th>
                                <th>添加日期</th>
                                <th>更新日期</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td>
                                        <a href="#" class="btn btn-xs btn-success">启用</a>
                                        <a href="#" class="btn btn-xs btn-primary">编辑</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection