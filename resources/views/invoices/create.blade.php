@extends('layouts.layout')
@section('containerr')
<div id="page-content">
	<div id='wrap'>
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="{{ url('/home') }}">Kontrolna tabla</a></li>
				<li>Nova faktura</li>
			</ol>
			<h1>Nova Faktura</h1>			
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
							<h4>Krejiraj fakturu</h4>
						</div>
					</div>	
					<div class="panel-body">           				
						<form action="{{ route('invoices.store') }}" method="POST">
							{{ csrf_field() }}
							<div class="col-sm-6">
								<select class="form-control" name="clientId">
									@foreach($clients as $client)
									<option value="{{ $client->id }}">{{ $client->name }}</option>
									@endforeach
								</select>
							</div>							
							<input style="text-align: center;" type="text" class="form-control fa fa-calendar datepicker" name="issuedAt" max/ value="{{old('invoiceDate')}}" autocomplete="off">	<hr>
							<div class="col-sm-6"> 
								<h5>id fakture:</h5>
								<input type="text" name="name" class="form-control name" value="{{ old('name') }}">
							</div>
							<div class="col-sm-6">
								<h5>Avansno uplaceno</h5>
								<input type="text" name="avans" class="form-control avans" value="{{ old('avans') }}">
							</div>
							<hr> &nbsp;
							<table class="table table-bordered">
								<thead>
									<th>deskripcija</th>
									<th>količina</th>
									<th>cena</th>
									<th>ukupno</th>
									<th style="text-align:center;background:#eee"><a href="#" class="addRow" id="addRow">dodaj</a></th>
								</thead>
								<tbody id="dynamic_field">
									<tr>
										<td><input type="text" name="items[0][desc]"  class="form-control desc" value="{{ old('items.0.desc')}}"> </td>
										<td><input type="text" name="items[0][amount]"  class="form-control amount" value="{{ old('items.0.amount') }}"> </td>
										<td><input type="text" name="items[0][price]" class="form-control input-sm price" value="{{ old('items.0.price') }}"> </td>
										<td><input type="text" class="form-control input-sm totalRow" name="items[0][total]" id="total" readonly  value="{{ old('items.0.total') }}"> </td>
										<td></td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td style="border:none"></td>
										<td style="border:none"></td>
										<td style="border:none" align="right"> Ukupno</td>
										<td><output class="total" name="result" readonly id="result"></output></td>
										<td style="border:none"></td>
									</tr>
								</tfoot>
							</table>	                 
							<button type="submit" class="btn btn-primary">Snimi</button>
						</form>	
					</div>
				</div>
			</div>    <!-- container -->
		</div> <!--wrap -->
	</div>
</div>
@endsection