@extends('layouts.app')
@section('title', '新增角色')
@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-7">
                    {!! Form::open(['url' => 'role', 'method' => 'post']) !!}
                    <div class="box-body">
                        <!-- Name Field -->
                        <div class="form-group">
                            {!! Form::label('name', '角色名(英文):') !!}
                            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                        </div>
                        <!-- Display_name Field -->
                        <div class="form-group">
                            {!! Form::label('display_name', '角色名称:') !!}
                            {!! Form::text('display_name', null, ['class'=>'form-control', 'placeholder'=>'名称']) !!}
                        </div>
                        <!-- Description Field -->
                        <div class="form-group">
                            {!! Form::label('description', '角色描述:') !!}
                            {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'描述...', 'rows'=>'3']) !!}
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">提交</button>
                        <a href="{{ route('role.index') }}" class="btn">取消</a>
                    </div>
                    {!! Form::close() !!}
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>是否启用</label>
                        <div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection