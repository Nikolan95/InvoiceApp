@extends('layouts.layout')
@section('containerr')
<div id="page-content">
	<div id='wrap'>
		<div id="page-heading">
            <ol class="breadcrumb">
                <li class='active'><a href="/home">Komandna tabla</a></li>
            </ol>
            <h1>Komandna tabla</h1>
            <div class="container">  
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 col-xs-12 col-sm-6">
                                <a class="info-tiles tiles-toyo" href="/invoices">
                                    <div class="tiles-heading">Ukupno fakturisano (din)</div>
                                    <div class="tiles-body-alt">
                                        <div class="text-center"><span class="text-top"></span><small>{{ number_format(($items->sum('total'))) }} </small></div>
                                        <small></small>
                                    </div>
                                    <div class="tiles-footer">info</div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-6">
                                <a class="info-tiles tiles-success" href="/invoices/unpaid">
                                    <div class="tiles-heading">dugovanja (din)</div>
                                    <div class="tiles-body-alt">
                                        <div class="text-center"><span class="text-top"></span><small>{{ number_format(($unpaiditems->sum('total'))) }}</small><span class="text-smallcaps"></span></div>
                                        <small></small>
                                    </div>
                                    <div class="tiles-footer">info</div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-6">
                                <a class="info-tiles tiles-orange" href="/invoices">
                                    <div class="tiles-heading">Fakture</div>
                                    <div class="tiles-body-alt">
                                        <i class="fa fa-envelope"></i>
                                        <div class="text-center">{{ $invoices->count() }}</div>
                                        <small></small>
                                    </div>
                                    <div class="tiles-footer">vidi fakture</div>
                                </a>
                            </div>
                            <div class="col-md-3 col-xs-12 col-sm-6">
                                <a class="info-tiles tiles-alizarin" href="/invoices/unpaid">
                                    <div class="tiles-heading">Neplaćene fakture</div>
                                    <div class="tiles-body-alt">
                                        <i class="fa fa-ban"></i>
                                        <div class="text-center">{{ $unpaids->count() }}</div>
                                        <small></small>
                                    </div>
                                    <div class="tiles-footer">vidi fakture</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>      
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4>Line Chart</h4>
                            </div>
                            <div class="panel-body">
                                <small>Naplacene fakture</small><div class="foo blue">  </div><div class="pull-right"><select class="btn btn-default dropdown-toggle" id="selectFirstId" onchange="changeFirstChart()"><option value="jedan">proslih 12 meseci</option><option value="dva">od pocetka godine</option></select></div><br>
                                <small>Nenaplacene fakture</small><div class="foo grey"></div><br>
                                <canvas id="line-chart" height="300" width="500"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div class="panel panel-inverse">
                            <div class="panel-heading">
                                <h4>Bar Chart</h4>
                            </div>
                            <div class="panel-body">
                                <small>Naplacene fakture</small><div class="foo blue">  </div><div class="pull-right"><select class="btn btn-default dropdown-toggle" id="selectSecondId" onchange="changeSecondChart()"><option value="tri">proslih 12 meseci</option><option value="cetiri">od pocetka godine</option></select></div><br>
                                <small>Nenaplacene fakture</small><div class="foo grey"></div><br>
                                <canvas id="bar-chart" height="300"  width="500"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div> 
</div>   
@endsection