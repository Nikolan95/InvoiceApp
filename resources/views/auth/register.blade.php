<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Krooya</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Krooya">
        <meta name="author" content="The Red Team">

        <!-- <link href="assets/less/styles.less" rel="stylesheet/less" media="all"> -->
        <link rel="stylesheet" href="assets/css/styles.css">
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
        
        <!-- <script type="text/javascript" src="assets/js/less.js"></script> -->
    </head>

    <body class="focusedform">
        <div class="verticalcenter">
            <a href="/home"><img src="/img/logo-main.png" alt="Logo" class="brand" /></a>
            <div class="panel panel-primary">
                <div class="panel-bodyform">
                <h4 class="text-center" style="margin-bottom: 25px;">Registracija</h4>
                <form method="POST" action="{{ route('register') }}" class="form-horizontal" style="margin-bottom: 0px !important;">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="email"  required>
                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="ime"  required autofocus>
                                @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="šifra" required>
                                @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="ponovite šifru" name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix">
                        <div class="pull-left">
                            <small><a href="/login"> &nbsp; &nbsp; &nbsp; Već imate nalog kliknite ovde da se ulogujete </a></small>
                        </div>
                    </div>                     
                </div>
                <div class="panel-footer">
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Snimi') }}
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </body>
</html>