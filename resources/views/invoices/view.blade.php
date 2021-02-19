@extends('layouts.layout')
@section('containerr')
<div id="page-content">
  <div id='wrap'>
    <div id="page-heading">
     <div class=different_header>
      <div id="nesto">
        <h6><font size="5px"><strong>KROOYA</strong></font><br>
          <strong> BORISLAV JAGODIĆ PR RADNJA ZA RAČUNARSKO PROGRAMIRANJE<br>
            KROOYA NOVI SAD<br>
            Pasterova 10/5<br>
          21000 Novi Sad</strong><br>
          <div id="levo"><span>PIB :&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;107762703</div><div id="sredina">A.P.R.broj: BP 101271/2012</div><div id="desno">Matični broj firme: <strong>62972157</strong></div><div id="levo">Tekući račun</div><div id="sredina"><strong>325-9500700029495-77 OTP BANKA SRBIJA A.D. NOVI SAD</strong></div><div id="desno">&nbsp; &nbsp; &nbsp;&nbsp;</div><div id="levo1">Telefon:</div><div id="levo1"><strong>0603845266</strong></div><div id="levo">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;Fax:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;</div><div id="sredina">&nbsp;E-mail: &nbsp; office@krooya.com</div><br><br><font size="0.5px" style="font-style: italic; font-weight: 900;">*izdavalac računa nije obaveznik pdv-a</font><br><font size="0.5px" style="font-style: italic; font-weight: 900;">*izdavalac računa je paušalni obaveznik poreza</font></span></h6>
        </div> 
      </div> 
    </div>
    <div class="container">
      <div class="stampa">
        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">  
            <div class="clearfix">
              <div class="pull-left">
                <h4><strong>RAČUN</strong> broj:&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <u><strong>{{ $invoice->name }}</strong>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</u>
                  <h6><spam>Datum izdavanja računa &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<strong>{{ Carbon\Carbon::parse($invoice->date)->format('d.m.Y.') }}</strong>&nbsp; &nbsp; &nbsp; godine<br>
                    Mesto izdavanja računa &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;  <strong> Novi Sad</strong><br>
                    Datum prometa dobara i usluga &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;<strong>{{ Carbon\Carbon::parse($invoice->date)->format('d.m.Y.') }}</strong>&nbsp; &nbsp; &nbsp; godine<br>
                    Mesto prometa dobara i usluge &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;  <strong> &nbsp;Novi Sad</strong><br>
                    Rok plaćanja <br> 
                    Nacin plaćanja  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  <strong>virmanski</strong></span></h6> 
                  </h4>
                </div>
                <div class="pull-right">
                  <font size="1px" style="font:italic">kupac - klijent:</font>
                  <div class="panel-body">
                    <address>
                      <span><p align="center"><strong>{{ $invoice->client->name }}</strong><p>
                        <p align="center"> <strong>{{ $invoice->client->city }}</strong><br>
                          <strong>  {{ $invoice->client->address }} </strong></p>
                          <p align left>Pib: &nbsp; &nbsp; <strong> {{ $invoice->client->pib }} </strong>&nbsp; &nbsp; &nbsp;<br>
                            Tel:  &nbsp; &nbsp; <strong> {{ $invoice->client->tel }}</strong>&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                            Fax: &nbsp;   {{ $invoice->client->fax }}&nbsp;  &nbsp;  &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; <p></span>    
                            </address>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="pull-left">
                          </div>
                          <div class="pull-right">
                            <ul class="text-right list-unstyled">
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                              <thead>
                                <td width='5.5%;' style="padding: 6px; vertical-align: middle;"  align="center" >r. br.</td>
                                <td style="padding: 6px; vertical-align: middle;"  align="center" > VRSTA - NAZIV DOBARA I USLUGA</td>
                                <td width="5%" style="padding: 6px; vertical-align: middle;"  align="center" > jed. mere</td> 
                                <td width='6%;' style="padding: 6px; vertical-align: middle;"  align="center" > KOLIČINA</td>
                                <td width='10%;' style="padding: 6px; vertical-align: middle;"  align="center" > CENA</td>
                                <td width='10%;' style="padding: 6px; vertical-align: middle;"  align="center" > VREDNOST</td>
                                <td width='10%;' style="padding: 6px; vertical-align: middle;"  align="center" > UKUPNO VREDNOST</td>
                              </thead>
                              <tbody>
                                <tr style="padding: 1px;">
                                  <td style="padding: 1px;"></td>
                                  <td style="padding: 1px;"></td>
                                  <td style="padding: 1px;"></td>
                                  <td style="padding: 1px;"></td>
                                  <td align="center" style="padding: 1px;"><font size="1px">din.</font></td>
                                  <td align="center" style="padding: 1px;"><font size="1px">din.</font></td>
                                  <td align="center" style="padding: 1px;"><font size="1px">din.</font></td>
                                </tr>
                                @if(count($invoice->items) > 0)
                                @foreach($invoice->items as $invoice->item)                       
                                <tr>
                                  <td align="right" style="padding: 3px;"> {{ $loop->iteration }} </td>
                                  <td style="padding: 3px;"> {{ $invoice->item->desc }} </td>
                                  <td align="center" style="padding: 3px;"> kom </td>
                                  <td align="center" style="padding: 3px;">{{$invoice->item->amount}}</td>
                                  <td align="right" style="padding: 3px;">{{ number_format($invoice->item->price, 2) }}</td>
                                  <td align="right" style="padding: 3px;">{{ number_format($invoice->item->price, 2) }}</td>
                                  <td align="right" style="padding: 3px;">{{ number_format($invoice->item->total, 2) }}</td>
                                </tr>
                                @endforeach
                                @endif
                              </tbody>
                              <tfoot>
                                <tr> 
                                  <td colspan="4" style="border-bottom:hidden; border-left: hidden;"></td>   
                                  <td align="right" col="5" style="padding: 3px;"> Ukupno:</td>
                                  <td align="right" col="6" style="padding: 3px;"><strong>{{ number_format($invoice->items->sum('total'), 2) }}</strong></td>
                                  <td align="right" col="7" style="padding: 3px;"><strong>{{ number_format($invoice->items->sum('total'), 2) }}</strong></td>
                                </tr>
                              </tfoot>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="levitekst">
                  <br><font size="1px"><strong>Slovima: {{ NumConvert::word(($invoice->items->sum('total'))-($invoice->avans)) }}&nbsp; dinara </strong></font>
                </div>
                <div class="desnitekst">
                 <div class="desnostampa">
                  <h5><span><font size="2px"><strong>UKUPNO VREDNOST</strong></font>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2px"><strong>{{ number_format($invoice->items->sum('total'), 2) }}</strong></font><br>&nbsp;&nbsp;&nbsp;<font size="2px"><strong>Uplaćeno avansno &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ number_format($invoice->avans,2) }}</strong></font><br><font size="2px"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Razlika za uplatu &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ number_format(($invoice->items->sum('total'))-($invoice->avans), 2) }}</strong></font></span></h5>
                </div>
              </div>
            </div>
            <div class="different_footer">
              <div id="flevo"><br><br>
                <span><strong>Račun izdao</strong></div> <div id="fdesno"><strong>Račun primio &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</strong></div></span>
                <div id="flevo">
                  <br><span><p>_________________</p></div><div id="fdesno"><p>_________________</p></div></span>
                  <div id="flevo">
                    <span><font size="1px">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;potpis</font></div><div id="fdesno"><font size="1px">potpis&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</font></div></span>
                    <span><br><br><font size="0.5px" style="font-style: italic; font-weight: 900;"> Prilikom uplate upisati broj računa u poziv na broj odobrenja na nalogu za prenos {{ $invoice->name }}</font></span>
                  </div>
                  <div class="panel-footer hidden-print">
                    <div class="pull-right">
                      <a class="btn btn-inverse" id="print_button"><i class="fa fa-print"></i></a>
                      <button class="btn btn-primary pay" data-myTitle="{{ $invoice->name }}" data-toggle = "modal" data-target ="#pay" data-id  ="{{ $invoice->id }}" data-date="{{ $invoice->date }}">Plati</button>
                    </div>
                  </div>
                </div>
              </div> <!-- container -->
            </div> <!--wrap -->
          </div> <!-- page-content -->
        </div>
      </div>
    </div>
  </div>          
</div>
@endsection