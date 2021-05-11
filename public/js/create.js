$(document).ready(function(){
    var i = 0;
    $('#addRow').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'">'+
            '<td><input type="hidden" name="items['+i+'][id]" value=""><input type="text" name="items['+i+'][desc]" class="form-control desc"> </td>'+
            '<td><input type="text" name="items['+i+'][amount]"  class="form-control amount"> </td>'+
            '<td><input type="text" name="items['+i+'][price]" class="form-control price"> </td>'+
            '<td><input type="text" class="form-control input-sm totalRow" name="items['+i+'][total]" id="total" readonly> </td>'+
            '<td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'+
            '</tr>'
        )
    });

    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $("#row" +button_id+"").remove();
    });

    $('tbody').on('keyup','.price,.amount',function(){
        var tr =$(this).parent().parent();
        var amount = tr.find('.amount').val();
        var price = tr.find('.price').val();
        var mul =(amount*price);
        tr.find('.totalRow').val(mul);
        result();
    });

    function result(){
    
    var sum = 0;
    $('.totalRow').each(function(i,e){
        var mul = $(this).val()-0;

        sum += mul;
    })
     
    $('#result').html(accounting.formatMoney(sum,"", 2, ".", ","));
        console.log(sum);
    };
    //on keyup dinamicko dodavanje 


    $(document).on('click', '.deleteItem', function(){
        var element = $(this);
        var id = element.data('id');
        
        if (confirm("Da li ste sigurni?")) {
         
            $.ajax({
                url:"/items/"+id,
                method:"DELETE",
          		// to[ken:csrf_field,
          		data:{_token:csrf},
          		success:function(data)
          		{
          			element.parents('tr').remove();
          		}
          	})
        }
        else {
      
            return false;
        }
    });

});

$('#pay').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var title = button.data('mytitle')
    var invId = button.data('id')
    var invDt = button.data('date')

    var modal = $(this)

    modal.find('.modal-title #title').val('Confirm payment for '+ title);
    modal.find('.modal-body #inv_id').val(invId);
    modal.find('.modal-body #inv_date').val(invDt);

})

$(document).on('click', '.modallista', function(){
    var button = $(this);
    var id = button.data('id');
    var title = button.data('myTitle');
  
    $('.modal-body tbody').html('');
    $.ajax({
        url:"/invoices/"+id+"/items",
        method:"GET",      // to[ken:csrf_field,
        dataType: 'json',
        success:function(data){
            $('.modal-title #title').val(title);  
            $.each(data, function(key, item){

                $('.modal-body tbody').append('<tr class="odd gradeX">'+
                    '<td align="left">'+item.desc+'</td>'+
                    '<td align="left">'+accounting.formatMoney(item.price,"", 2, ".", ",")+'</td>'+
                    '<td align="left">'+item.amount+'</td>'+
                    '<td align="left">'+accounting.formatMoney(item.total,"",2,".",",")+'</td>'+
                    '</tr>'
                )    
            })
        }
    });
});


$('#delete').on('show.bs.modal', function(event) {

    var button = $(event.relatedTarget)
    var delId = button.data('id')
    var modal = $(this)

    modal.find('.modal-title #title').val('Confirm payment for ');
    modal.find('.modal-body #delId').val(delId);
})


$(function() {
    //var dtToday = new Date();
    $('#pay').on('show.bs.modal', function(event) {   
        var minDate = new Date(document.getElementById("inv_date").value); 
        $('.datepicker').datepicker( "option", "minDate", minDate);
    });

    $('.datepicker').datepicker({
        maxDate: 0,
        onSelect:function(e){
            var date = new Date(e);      
            var formated_display_date = moment(date.toISOString()).format('DD-MM-YYYY');

            // var year = date.getFullYear();
            // var month = date.getMonth() + 1;
            // var day = date.getDate();
            var hiddenDateField = $('#dbDate')

            $('.datepicker').attr('value', formated_display_date);
            $(this).val( formated_display_date);      
        }
    });

    //$('.datum').val('Datum prometa dobara i usluga'+'\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0'+dtToday.toLocaleDateString("fr-CA"));
    //$('.datumm').val(dtToday.toLocaleDateString("fr-CA"));
});


$("#print_button").click(function(){
    var mode = 'iframe';
    var close = mode == "popup";
    var options = {mode:mode,popClose:close};
    $("div#page-content").printArea(options);
});
