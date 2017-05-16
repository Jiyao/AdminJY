@extends('layouts.app')
@section('title', '「'.$role->name.'」权限设置')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            {!! Form::open(['url' => '/role/permissions', 'method' => 'post']) !!}
                            {{ csrf_field() }}
                            <div class="box-body">
                                <div>
                                    @foreach($perms as $key => $perm)
                                    <div class="checkbox checkbox-inline">
                                        <input type="checkbox" name="perms[]" {{ in_array('1', $rolePerms) ? 'checked': '' }} id="checkbox{{ $key }}" value="{{ $perm->id }}">
                                        <label for="checkbox{{ $key }}">
                                            {{ $perm->display_name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <input name="role_id" type="hidden" value="{{ $role->id }}" />

                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">提交</button>
                                <a href="{{ route('role.index') }}" class="btn">取消</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection