@extends('layouts.layout')
@section('containerr')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="/home">Tabla</a></li>
                <li>Lista klijenata</li>
            </ol>
            <h1>Klijenti</h1>
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
        <div class="row">
            <div class="container">
                <div class="col-md-12">
                    <div class="panel panel-indigo">
                        <div class="panel-heading">
                            <h4>Tabela klijenata</h4>
                            <div class="options">   
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>
                        <div class="panel-body collapse in">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="editable">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;">id</th>
                                        <th>Ime</th>    
                                        <th>Tel</th>
                                        <th style="width: 11%;">Izmeni</th>
                                        <th style="width: 11%;">Pogledaj</th>
                                        <th style="width: 11%;">Obriši</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr class="odd gradeX">
                                        <td align="center">{{$client->id}}</td>
                                        <td align="center">{{$client->name}}</td>
                                        <td align="center">{{$client->tel}}</td>
                                        <td align="center"><a href="{{ route('clients.edit', ['clients'=>$client->id]) }}" ><i class=" fa fa-pencil"></i></a></td>
                                        <td align="center"><a href= "{{ route('clients.show', ['clients'=>$client->id]) }}"><i class="fa fa-search opacity-control"></i></a></td>
                                        <td align="center"><a class="delete"  data-toggle = "modal" data-target ="#delete" data-id  ="{{ $client->id }}"><i class="fa fa-trash-o"></i></a></td>                        
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>    
</div> 
@endsection



