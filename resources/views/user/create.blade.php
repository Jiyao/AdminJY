@extends('layouts.app')
@section('title', '新增账户')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    {!! Form::open(['url' => 'user', 'method' => 'post']) !!}
                    <div class="col-md-6">
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('name', '账号名称:') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'账号名称']) !!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', '邮箱:') !!}
                                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'邮箱']) !!}
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">提交</button>
                            <a href="{{ route('role.index') }}" class="btn">取消</a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>是否启用:</label>
                            <div class="form-other-control">
                                <div class="radio radio-inline">
                                    <input type="radio" name="radio2" id="radio5" value="option1">
                                    <label for="radio5">
                                        启用
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="radio2" id="radio6" value="option2" checked="">
                                    <label for="radio6">
                                        不启用
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>分配角色</label>
                            <div>
                                <select name="role_id" class="form-select">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection