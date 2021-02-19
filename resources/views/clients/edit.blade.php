@extends('layouts.layout')
@section('containerr')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Kontrolna tabla</a></li>
                <li>Izmeni klijenta</li>
            </ol>
            <h1>Izmena klijenta</h1>
        </div>
        <div class="session">
            @if(Session::has('success'))
            <div class="alert alert-success">
                <strong>Success:</strong> {{ Session::get('success') }}
            </div> 
            @endif
            @if(count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Error:</strong>
                <ul>
                @foreach($errors->all() as $error) 
                    <li>{{ $error }}</li>     
                @endforeach
                </ul>
            </div> 
            @endif
        </div>  
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h4>Izmeni klijenta {{ $client->name }}</h4>
                        </div>
                    </div>  
                    <div class="panel-body">
                        <hr>
                            <form action="{{route('clients.update', [$client->id]) }}" method='POST' class="form-horizontal">
                            {{ csrf_field() }}  
                            <input type="hidden" name='_method' value='PUT'>
                        <div class="form-group">
                            <label for="client" class="col-sm-3 control-label">Klijentovo ime</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="name" value='{{ $client->name }}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-sm-3 control-label">Klijentov grad</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="city" value='{{ $client->city }}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="adress" class="col-sm-3 control-label">Klijentova adresa</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="address" value='{{ $client->address }}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pib" class="col-sm-3 control-label">Klijentov PIB</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="pib" value='{{ $client->pib }}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tel" class="col-sm-3 control-label">Klijentov telefon</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="tel" value='{{ $client->tel }}'>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="fax" class="col-sm-3 control-label">Klijentov faks</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="fax" value='{{ $client->fax }}'>
                            </div>
                        </div>              
                    </div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <button class="btn-primary btn" type="Submit">Snimi</button>
                                    <a href="/clients" class="btn-default btn">Nazad</a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
@endsection