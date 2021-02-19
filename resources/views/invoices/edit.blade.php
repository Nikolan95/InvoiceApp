@extends('layouts.layout')
@section('containerr')
<div id="page-content">
    <div id='wrap'>
        <div id="page-heading">
            <ol class="breadcrumb">
                <li><a href="{{ url('/home') }}">Kontrolna tabla</a></li>
                <li>Izmeni fakturu
            </ol>
            <h1>Izmena fakture</h1>
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
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h4>Izmena fakture {{ $invoice->name }}</h4>
                            </div>
                        </div>  
                        <div class="panel-body">
                            <form action="{{ route('invoices.update', [$invoice->id]) }}" method='POST'>
                            {{ csrf_field() }}
                                <input type="hidden" name="_method" value='PUT'>
                                <div class="form-group">
                                    <h5>id fakture:</h5>
                                    <input type="text" name="name" class="form-control name" value="{{ $invoice->name }}">
                                    <hr>
                                    <table class="table table-bordered tabela">
                                        <thead>
                                            <th>deskripcija</th>
                                            <th>količina</th>
                                            <th>cena</th>
                                            <th>ukupno</th>
                                            <th style="text-align:center;background:#eee"><a href="#" class="addRow" id="addRow">Dodaj</a></th>
                                        </thead>
                                        <tbody id="dynamic_field">
                                        @foreach($invoice->items as $invoice->item)
                                            <tr>
                                                <td><input type="hidden" name="items[{{$invoice->item}}][id]" value="{{ $invoice->item->id }}">
                                                <input type="text" name="items[{{$invoice->item}}][desc]"  class="form-control desc" value="{{ $invoice->item->desc }}"></td>
                                                <td><input type="text" name="items[{{$invoice->item}}][amount]"  class="form-control amount" value="{{ $invoice->item->amount }}"> </td>
                                                <td><input type="text" name="items[{{$invoice->item}}][price]" class="form-control input-sm price"  value="{{ $invoice->item->price }}"></td>
                                                <td><input type="text" class="form-control input-sm totalRow" name="items[{{$invoice->item}}][total]" value="{{$invoice->item->total}}" readonly> </td>
                                                <td>
                                                <button type="button" class="btn btn-danger deleteItem" data-id="{{ $invoice->item->id }}">X</button> 
                                                </td>  
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td style="border:none"></td>
                                                <td style="border:none"></td>
                                                <td style="border:none" align="right"> Total</td>
                                                <td><output class="total" name="result" readonly id="result"></output></td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="form-group">   
                                        <input type="hidden" class="form-control" name="client_id" value='{{ $invoice->client_id }}'>
                                    </div>
                                    <button type="submit" class="btn btn-success">Snimi</button>
                                    <a href="/invoices/" class="btn btn-primary">Nazad</a>
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