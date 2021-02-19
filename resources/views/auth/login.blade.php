<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Krooya</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Krooya">
        <meta name="author" content="The Red Team">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600' rel='stylesheet' type='text/css'>
    </head>
    <body class="focusedform">

        <div class="verticalcenter">
            <a href="/home"><img src="/img/logo-main.png" alt="Logo" class="brand" /></a>
            <div class="panel panel-primary">
                <div class="panel-bodyform">
                    <h4 class="text-center" style="margin-bottom: 25px;">Ulogujte se da bi ste počeli</h4>
                    <form method="POST" action="{{ route('login') }}" class="form-horizontal" style="margin-bottom: 0px !important;">
                    @csrf
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>                            
                                <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>
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
                    <div class="clearfix">
                        <div class="pull-left">
                            <small><a href="/register">&nbsp; &nbsp; &nbsp; Nemate nalog kliknite ovde</a></small>
                        </div>
                        <div class="pull-right"><input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Zapamti me') }}
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">                
                    <div class="pull-right">                    
                        <button type="submit" class="btn btn-primary">
                            {{ __('Uloguj se') }}
                        </button>
                    </div>
                </div>
             </div></form>    
        </div>
    </body>
</html>
