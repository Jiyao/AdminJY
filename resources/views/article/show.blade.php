@extends('layouts.app')
@section('title', '文章内容')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="box-body">
                            <div class="form-group">
                                {!! Form::label('title', '文章标题:') !!}
                                {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'标题']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>是否发布</label>
                            <div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="is_posted" id="radio5" value="1">
                                    <label for="radio5">
                                        直接发布
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="is_posted" id="radio6" value="2" checked="">
                                    <label for="radio6">
                                        暂不发布
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group">
                            {!! Form::label('summary', '简介:') !!}
                            {!! Form::textarea('summary', null, ['class'=>'form-control', 'placeholder'=>'内容简介','rows'=>'2']) !!}
                        </div>
                        <textarea name="content" rows="" cols="" id="editor"></textarea>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success" onclick="return mk_submit()">提交</button>
                            <a href="{{ route('role.index') }}" class="btn">取消</a>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection