@extends('layouts.app')
@section('style')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/static/nestable.css') }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Basic Elements
                </div>
                <div class="card-body">
                    <div class="cf nestable-lists">
                        <div class="dd" id="nestable">
                            <ol class="dd-list">
                            @foreach($menus as $menu)
                                <li class="dd-item" data-id="{{ $menu['id'] }}">
                                    <div class="dd-handle">{{ $menu['name'] }}</div>
                                    @if(is_array($menu['child']))
                                        <ol class="dd-list">
                                            @foreach($menu['child'] as $child)
                                            <li class="dd-item" data-id="{{ $child['id'] }}">
                                                <div class="dd-handle">{{ $child['name'] }}</div>
                                            </li>
                                            @endforeach
                                        </ol>
                                    @endif
                                </li>
                            @endforeach
                            </ol>
                        </div>
                        <textarea id="nestable-output" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="{{ URL::asset('js/static/jquery.nestable.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            var updateOutput = function(e)
            {
                var list   = e.length ? e : $(e.target),
                    output = list.data('output');
                if (window.JSON) {
                    output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
                } else {
                    output.val('JSON browser support required for this demo.');
                }
            };

            // activate Nestable for list 1
            $('#nestable').nestable({
                group: 1
            })
                .on('change', updateOutput);

            // activate Nestable for list 2
            $('#nestable2').nestable({
                group: 1
            })
                .on('change', updateOutput);

            // output initial serialised data
            updateOutput($('#nestable').data('output', $('#nestable-output')));
            updateOutput($('#nestable2').data('output', $('#nestable2-output')));

            $('#nestable-menu').on('click', function(e)
            {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#nestable3').nestable();

        });
    </script>
@endsection