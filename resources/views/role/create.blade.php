@extends('layouts.app')
@section('content')
<div class="col-lg-10">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">新建角色</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        {!! Form::open(['url' => 'role', 'method' => 'post']) !!}
            <div class="box-body">
                <!-- Name Field -->
                <div class="form-group">
                    {!! Form::label('name', '角色名(英文):') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <!-- Display_name Field -->
                <div class="form-group">
                    {!! Form::label('display_name', '角色名称:') !!}
                    {!! Form::text('display_name', null, ['class'=>'form-control']) !!}
                </div>
                <!-- Description Field -->
                <div class="form-group">
                    {!! Form::label('description', '角色描述:') !!}
                    {!! Form::text('description', null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">提交</button>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection