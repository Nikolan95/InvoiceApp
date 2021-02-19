@extends('layouts.layout')
@section('containerr')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="/home">Kontrolna tabla</a></li>
                <li>Naplaćene fakture</li>
            </ol>
            <h1>Fakture</h1>   
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
                <div class="col-md-12">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4>Tabela naplaćenih faktura</h4>
                            <div class="options"> 
                                <a href="javascript:;" class="panel-collapse"><i class="fa fa-chevron-down"></i></a>
                            </div>
                        </div>  
                        <div class="panel-body collapse in">
                        @if (count($invoices) > 0)
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered datatables" id="editable">
                                <thead>
                                    <tr>
                                        <th style="width: 7%;">id</th>
                                        <th>ime klijenta</th>
                                        <th>faktura</th>
                                        <th>izdato</th>
                                        <th>plaćeno</th>
                                        <th>ukupno</th>
                                        <th style="width: 8%;">obriši</th>
                                        <th style="width: 8%;">pogledaj</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr class="odd gradeX">
                                        <td align="center">{{$invoice->id}}</td>
                                        <td align="center">{{$invoice->client->name}}</td>
                                        <td align="center">{{$invoice->name}}</td>
                                        <td align="center">{{Carbon\Carbon::parse($invoice->date)->format('d.m.Y.')}}</td>
                                        <td align="center">{{Carbon\Carbon::parse($invoice->paid_at)->format('d.m.Y.')}}</td>
                                        <td align="center">{{ number_format($invoice->items->sum('total'),2) }}</td>
                                        <td align="center"><a class="delete"  data-toggle = "modal" data-target ="#deleteInv" data-id  ="{{ $invoice->id }}"><i class="fa fa-trash-o"></i></a></td>
                                        <td align="center"><a class="modallista"  data-my-title="{{ $invoice->name }}" data-toggle = "modal" data-target ="#viewDetails" data-id  ="{{ $invoice->id }}" data-date="{{$invoice->date}}"><i class="fa fa-search opacity-control"></i></a></td>
                                    </tr>
                                @endforeach   
                                </tbody>
                            </table><!--end table-->
                        @endif
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection