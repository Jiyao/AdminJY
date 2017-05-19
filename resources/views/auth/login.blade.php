<!DOCTYPE html>
<html>
<head>
    <title>Flat Admin V.3 - Free flat-design bootstrap administrator templates</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/flat-admin.css') }}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/blue-sky.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/blue.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/red.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/css/theme/yellow.css') }}">

</head>
<body>
<div class="app app-default">
<div class="app-container app-login">
    <div class="flex-center">
        <div>
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul style="color:red;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="app-body">
                <div class="app-block">
                    <div class="app-form">
                        <div class="form-header">
                            <div class="app-brand"><span class="highlight">Admin</span> JY</div>
                        </div>
                        <form action="{{ URL::route('login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon" id="basic-addon1">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                                <input type="text" name="email" class="form-control" placeholder="Email" aria-describedby="basic-addon1" value="{{ old('email') }}">
                            </div>
                            <div class="input-group {{ $errors->has('password') ? ' has-error' : '' }}">
                        <span class="input-group-addon" id="basic-addon2">
                            <i class="fa fa-key" aria-hidden="true"></i>
                        </span>
                                <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="basic-addon2">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success btn-submit" >登录</button>
                            </div>
                        </form>

                        <div class="form-line">
                            <div class="title">OR</div>
                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-default btn-sm btn-social __facebook">
                                <div class="info">
                                    <i class="icon fa fa-facebook-official" aria-hidden="true"></i>
                                    <span class="title">Login with Facebook</span>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-footer">
        </div>

        </div>
    </div>
</div>
</div>
@include('vendor.flashy.message')
<script type="text/javascript" src="{{ URL::asset('assets/js/vendor.js') }}"></script>

</body>
</html>