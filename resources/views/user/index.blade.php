@extends('layouts.app')
@section('title', '用户列表')
@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header card-header-btn">
                    <a href="{{ route('user.create') }}" class="btn btn-xs btn-default btn-toolbar"><i class="fa fa-plus"></i> 新增</a>
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
                                        <th>用户名</th>
                                        <th>邮箱</th>
                                        <th>角色</th>
                                        <th>最近登录时间</th>
                                        <th>创建时间</th>
                                        <th>更新时间</th>
                                        <th>操作</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="status-circle{{ $user->status ? '-on': '' }}">
                                                <i class="fa fa-circle-o"></i>
                                                {{ $user->name }}
                                            </td>
                                            <td>{{ $user->email }}</td>
                                            <td>@foreach ($user->roles as $role)
                                                    {{ $role->display_name }}
                                                @endforeach
                                            </td>
                                            <td></td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>{{ $user->updated_at }}</td>
                                            <td>
                                                <a href="#" class="btn btn-xs btn-success">启用</a>
                                                <a href="#" class="btn btn-xs btn-primary">编辑</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-center">{!! $users->links() !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection