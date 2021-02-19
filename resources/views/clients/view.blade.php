@extends('layouts.layout')
@section('containerr')
<div id="page-content">
	<div id='wrap'>
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="/home">Kontrolna tabla</a></li>
				<li>Detalji klijenta</li>
			</ol>
			<h1>Detalji klijenta</h1>			
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="clearfix">
								<div class="pull-left">
									<h4>Klijentov id:{{ $client->id }}<br>
										<strong>{{ $client->name }}</strong>
									</h4>
								</div>
								<div class="pull-right">
									<h4 class="text-right"><img src="/img/logo.jpg" alt="Krooya"></h4>
								</div>
							</div>
						</div>
					</div>		
					<div class="row">
						<div class="col-md-12">
							<h3 style="background: #85c744; padding: 5px 10px; color: #fff; border-radius: 1px; margin: 20px 0 20px; text-align:center">Detalji klijenta</h3>
							<div class="pull-left">
								<address>
									<strong>{{ $client->name }}</strong><br>
									{{ $client->address }}<br>
									{{ $client->city }}<br>
								</address>
							</div>
							<div class="pull-right">
								<ul class="text-right list-unstyled">
									<li><strong>Datum kreiranja klijenta &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{Carbon\Carbon::parse($client->created_at)->format('d.m.Y.')}}</strong></li>											
								</ul>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="table-responsive">
								@if(count($client->invoices) > 0)
								<table class="table table-bordered table-striped table-hover">
									<thead>
										<th>id</th>
										<th>Faktura</th>
										<th>Datum izdavanja fakture</th>
										<th>Plaćeno</th>
										<th>Kasni</th>
										<th>Pogledaj</th>
									</thead>
									@foreach($client->invoices as $client->invoice)
									<tbody>
										<tr>
											<td align="center">{{ $client->invoice->id }}</td>
											<td align="center">{{ $client->invoice->name }}</td>
											<td align="center">{{ Carbon\Carbon::parse($client->invoice->date)->format('d.m.Y.') }}</td>
											<td align="center">
												@if($client->invoice->paid_at)
												{{ Carbon\Carbon::parse($client->invoice->paid_at)->format('d.m.Y.') }}
												@else
												nenaplaćeno
												@endif
											</td>
											<td align="center">
												@if(!$client->invoice->paid_at)
												{{Carbon\Carbon::now()->diffInDays($client->invoice->date)}} dana
												@else
												plaćeno nakon {{ $client->invoice->diff  }} dana
												@endif
											</td>
											<td align="center"><a class="modallista"  data-my-title="{{ $client->invoice->name }}" data-toggle = "modal" data-target ="#viewDetails" data-id  ="{{ $client->invoice->id }}" data-date="{{$client->invoice->date}}"><i class="fa fa-search opacity-control"></i></a></td>
										</tr>
										@endforeach
										@else
										<h3 align="center" style="font-style: italic;"><strong>Ovaj kljijent nema racuna</strong></h3>
										@endif
									</tbody>
								</table>										
							</div>
						</div>
					</div>							
				</div>				
			</div>
		</div> <!-- container -->
	</div> <!--wrap -->
</div> <!-- page-content -->
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role = "document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
				<div class="modal-title">
					<output align="center" type = "text" id="title"></output>
				</div>
			</div>
			<div class="modal-body">
				<table>
					<thead>       	
					</thead>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss = "modal">close</button>
			</div>
		</form>
	    </div>
	</div>
</div>
@endsection