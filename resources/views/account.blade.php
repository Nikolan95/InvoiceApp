@extends('layouts.layout')
@section('containerr')
<div id="page-content">
	<div id='wrap'>
		<div id="page-heading">
			<ol class="breadcrumb">
				<li><a href="/home	">Kontrolna tabla</a></li>
			</ol>
			<h1>Korisnički Profil</h1>			
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-midnightblue">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-6">
									<img src="/img/admin.jpg" alt="" class="pull-left" style="margin: 0 20px 20px 0">
									<div class="table-responsive">
										<table class="table table-condensed">
											<h3><strong>{{ Auth::user()->name }}</strong></h3>
											<tbody>
												<tr>
													<td>Web adresa</td>
													<td><a href="#">//</a></td>
												</tr>
												<tr>
													<td>Email</td>
													<td><a href="">{{ Auth::user()->email }}</a></td>
												</tr>
												<tr>
													<td>Telefon</td>
													<td>//</td>
												</tr>
												<tr>
													<td>Poticija</td>
													<td>Administrator</td>
												</tr>
												<tr>
													<td>Status</td>
													<td>Admin</td>
												</tr>
												<tr>
													<td>Mreže</td>
													<td>
														<a href="#" class="btn btn-xs"><i class="fa fa-skype"></i></a>
														<a href="#" class="btn btn-xs"><i class="fa fa-facebook"></i></a>
														<a href="#" class="btn btn-xs"><i class="fa fa-twitter"></i></a>
														<a href="#" class="btn btn-xs"><i class="fa fa-dribbble"></i></a>
														<a href="#" class="btn btn-xs"><i class="fa fa-tumblr"></i></a>
														<a href="#" class="btn btn-xs"><i class="fa fa-linkedin"></i></a>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-md-6">
									<h3>O firmi</h3>
									<p>
										Preduzetnička radnja za računarsko programiranje Krooya Novi Sad osnovana 2012 sa sedištem u Novom Sadu. Preduzetnička radnja se sastoji od preduzetnika Borislava Jagodića i jednog zaposlenog. Oblasti programiranja koje su zastupljene su HTML CSS Javascrtipt PHP.
									</p>
									<p>
										Firma se prevashodno bavi web programiranjem ali takođe i razvojom mobilnih aplikacija.
									</p>
								</div>
							</div>
							<hr>							
						</div> 
					</div> 
				</div>  
			</div>	
		</div>	
	</div>
</div>
@endsection