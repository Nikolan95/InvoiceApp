@extends('layouts.layout')
@section('containerr')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Komandna tabla</a></li>
                <li>Novi klijent</li>
            </ol>
            <h1>Novi klijent</h1>
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
                            <h4>Krejiraj klijenta</h4>
                        </div>
                    </div>  
                    <div class="panel-body">
                        <form action="{{route('clients.store')}}" method='POST' class="form-horizontal">
                            {{ csrf_field() }}  
                            <div class="form-group">
                                <label for="client" class="col-sm-3 control-label">Klijentovo ime</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="city" class="col-sm-3 control-label">Klijentov grad</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="city" value="{{old('city')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="adress" class="col-sm-3 control-label">Klijentova adresa</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="address" value="{{old('address')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="pib" class="col-sm-3 control-label">Klijentov PIB</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="pib" value="{{old('pib')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tel" class="col-sm-3 control-label">Klijentov telefon</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="tel" value="{{old('tel')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fax" class="col-sm-3 control-label">Klijentov faks</label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" name="fax" value="{{old('fax')}}">
                                </div>
                            </div>
                            <div class="col-sm-6 col-sm-offset-3">
                                <div class="btn-toolbar">
                                    <button class="btn-primary btn" type="submit">Snimi</button>
                                    <a href="/clients" class="btn-default btn">Nazad</a>
                                </div>
                            </div>
                       </form>
                    </div>                                        
                </div>
            </div>
        </div>
    </div>
</div> <!-- container -->
@endsection