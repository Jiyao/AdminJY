@extends('layouts.app')
@section('title', '新增文章')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

    <style type="text/css">
        body{
            background: #eaebec;
        }
        h1{
            font-size: 50px;
            text-align: center;
        }
    </style>
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
                        <input type="file" name="cover" />
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
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
    <script type="text/javascript">
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