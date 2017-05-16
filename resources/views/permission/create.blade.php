@extends('layouts.app')
@section('title', '新增权限')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    {!! Form::open(['url' => 'permission', 'method' => 'post']) !!}
                    <div class="col-md-8">
                        <div class="box-body">
                            <!-- Name Field -->
                            <div class="form-group">
                                {!! Form::label('name', '权限名(英文):') !!}
                                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                            </div>
                            <!-- Display_name Field -->
                            <div class="form-group">
                                {!! Form::label('display_name', '权限名称:') !!}
                                {!! Form::text('display_name', null, ['class'=>'form-control', 'placeholder'=>'名称']) !!}
                            </div>
                            <!-- Description Field -->
                            <div class="form-group">
                                {!! Form::label('description', '权限描述:') !!}
                                {!! Form::textarea('description', null, ['class'=>'form-control', 'placeholder'=>'描述...', 'rows'=>'3']) !!}
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">提交</button>
                            <a href="{{ route('role.index') }}" class="btn">取消</a>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection