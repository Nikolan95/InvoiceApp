<div class="modal fade kesa" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">       
                </div>
            </div>
            <form action="{{ route('clients.destroy','test') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">     
                <div class="modal-body">
                    <h1 align="center">Da li ste sigurni?</h1>
                    <input type="hidden" name="deleteClient" id="delId" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss = "modal">Zatvori</button>
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </div>
            </form>
        </div>
    </div>
</div>    
<div class="modal fade delete" id="deleteInv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                </div>
            </div>
            <form action="{{ route('invoices.destroy','test') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="delete">
                <div class="modal-body">
                    <h1 align="center">Da li ste sigurni?</h1>
                    <input type="hidden" name="deleteInvoice" id="delId" value>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss = "modal">Zatvori</button>
                    <button type="submit" class="btn btn-danger">Obriši</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="pay" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                    <output align="center" type = "text" id="title"></output>
                </div>
            </div>
            <form action="{{ route('items.update','test') }}" method="POST">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <input type="hidden"  name="newInvoiceId" id="inv_id" value="">
                    <input type="hidden" name="createInvoiceDate" id="inv_date" value="">
                    <input type="hidden" class="datumm" name="todayDate" id="tdy_date" value="">
                    <input style="margin-left: 30%;" type="text" name="form" class="form-control datepicker" id="polje" required min/ max/  autocomplete="off">
                    <span class="text-danger" id="poljeError"></span>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss = "modal">Zatvori</button>
                    <button type="submit" class="btn btn-success" id="submit">Plati</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="viewDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role = "document">
        <div class="modal-content" style=" width:1000px; margin-left: -25%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss = "modal" aria-label="close"><span aria-hidden = "true">&times;</span></button>
                <div class="modal-title">
                    <output align="center" type = "text" id="title"></output>
                </div>
            </div>   
            <div class="modal-body">
                <input type="hidden" name="nesto" id="ajaxid" value="">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td style="width: 70%;" align="left"><strong> Deskripcija </strong></th>
                            <td align="left"><strong> Cena </strong></th>
                            <td align="left"><strong> Količina </strong></th>
                            <td align="left"><strong> Ukupno </strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="odd gradeX">                                 
                        </tr>
                    </tbody>
                </table><!--end table-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss = "modal" id="mClose">Zatvori</button>
            </div>   
        </div>
    </div>
</div> 