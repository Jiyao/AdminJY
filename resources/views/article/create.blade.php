@extends('layouts.app')
@section('title', '新增文章')
@section('style')
    <link rel="stylesheet" href="{{ asset('assets/css/simplemde.min.css') }}">
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {!! Form::open(['url' => 'article', 'method' => 'post', 'enctype' => "multipart/form-data"]) !!}
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('title')?'has-error':'' }}">
                                <label for="title">文章标题:</label>
                                <span class="error-tip">必填，30字以内</span>
                                <input class="form-control" name="title" value="{{ old('title') }}" id="title" type="text" placeholder="标题">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group {{ $errors->has('is_posted')?'has-error':'' }}">
                            <label>是否发布</label>
                            <span class="error-tip">必填</span>
                            <div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="is_posted" id="radio5" value="1">
                                    <label for="radio5">
                                        直接发布
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="is_posted" id="radio6" value="2" checked>
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
                        <div class="box-body">
                            <div class="form-group">
                                <label for="tagged">标签:</label>
                                <input name="tagged" id="tagged" class="tagsinput tagsinput-typeahead" value="Alabama"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box-body">
                            <div class="form-group {{ $errors->has('cover')?'has-error':'' }}">
                                <label for="title">封面图片:</label>
                                <span class="error-tip">格式不支持</span>
                                <input id="lefile" type="file" name="cover" style="display:none">
                                <div class="input-append">
                                    <a class="btn btn-xs btn-primary" onclick="$('input[id=lefile]').click();">上传图片</a>
                                    <span id="photoCover"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="form-group {{ $errors->has('summary')?'has-error':'' }}">
                            {!! Form::label('summary', '简介:') !!}
                            <span class="error-tip">255字以内</span>
                            {!! Form::textarea('summary', old('summary'), ['class'=>'form-control', 'placeholder'=>'内容简介','rows'=>'2']) !!}
                        </div>
                        <div class="form-group {{ $errors->has('summary')?'has-error':'' }}">
                            <textarea name="content" rows="" cols="" id="editor">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">提交</button>
                            <a href="{{ route('role.index') }}" class="btn">取消</a>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script src="{{ asset('assets/js/simplemde.min.js') }}"></script>
    <script type="text/javascript">
        $('input[id=lefile]').change(function() {
            $('#photoCover').html($(this).val());
        });
        // Most options demonstrate the non-default behavior
        var simplemde = new SimpleMDE({
            autofocus: true,
            autosave: {
                enabled: true,
                uniqueId: "editor01",
                delay: 1000,
            },
            blockStyles: {
                bold: "__",
                italic: "_"
            },
            element: document.getElementById("editor"),
            forceSync: true,
            hideIcons: ["guide", "heading"],
            indentWithTabs: false,
            initialValue: "Markdown...",
            insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
            },
            lineWrapping: false,
            parsingConfig: {
                allowAtxHeaderWithoutSpace: true,
                strikethrough: false,
                underscoresBreakWords: true,
            },
            placeholder: "placeholder",
//            previewRender: function(plainText) {
//                console.log(plainText);
//                return customMarkdownParser(plainText); // Returns HTML from a custom parser
//            },
//            previewRender: function(plainText, preview) { // Async method
//                setTimeout(function(){
//                 preview.innerHTML = customMarkdownParser(plainText);
//                 }, 250);
//
//                return "Loading...";
//            },
            promptURLs: true,
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            },
            shortcuts: {
                drawTable: "Cmd-Alt-T"
            },
            showIcons: ["code", "table"],
            spellChecker: false,
            status: false,
            status: ["autosave", "lines", "words", "cursor"], // Optional usage
            status: ["autosave", "lines", "words", "cursor", {
                className: "keystrokes",
                defaultValue: function(el) {
                    this.keystrokes = 0;
                    el.innerHTML = "0 Keystrokes";
                },
                onUpdate: function(el) {
                    el.innerHTML = ++this.keystrokes + " Keystrokes";
                }
            }], // Another optional usage, with a custom status bar item that counts keystrokes
            styleSelectedText: false,
            tabSize: 4,
            //toolbar: flase,
            //toolbarTips: false,
        });

//        function mk_submit(){
//            $('#editor').val(simplemde.value());
//            return true;
//        }
    </script>
@endsection