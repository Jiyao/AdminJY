@extends('layouts.app')
@section('title', '新增文章类别')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ $category->id ? route('category.update', ['id'=>$category->id]): route('category.store') }}" method="POST" accept-charset="UTF-8">
                @if($category->id > 0)
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{ $category->id }}">
                @endif
                {!! Form::open(['url' => 'category', 'method' => 'post']) !!}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('cover')?'has-error':'' }}">
                                <label for="icon">Google 图标代码:</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon1">
                                        <i class="fa fa-gear" aria-hidden="true"></i>
                                    </span>
                                    <input class="form-control" type="text" id="icon" name="icon" aria-describedby="basic-addon1" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group {{ $errors->has('is_posted')?'has-error':'' }}">
                            <label for="is_show">是否展示</label>
                            <span class="error-tip">必填</span>
                            <div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="is_show" id="radio1" value="1" checked>
                                    <label for="radio1">展示</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="is_show" id="radio2" value="0">
                                    <label for="radio2">隐藏</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-5">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('name')?'has-error':'' }}">
                                <label for="name">类别名称:</label>
                                <span class="error-tip">{{ $errors->first('name') }}</span>
                                <input class="form-control" name="name" value="{{ old('name')?:$category->name }}" id="name" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('slug')?'has-error':'' }}">
                                <label for="slug">类别缩写:</label>
                                <span class="error-tip">{{ $errors->first('slug') }}</span>
                                <input class="form-control" name="slug" value="{{ old('slug')?:$category->slug }}" id="slug" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
                                <label for="description">描述:</label>
                                <span class="error-tip">{{ $errors->first('description') }}</span>
                                <input class="form-control" name="description" value="{{ old('description')?:$category->description }}" id="description" type="text" >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">提交</button>
                            <a href="{{ route('category.index') }}" class="btn">取消</a>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection