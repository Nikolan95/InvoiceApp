$(document).ready(function(){
		var i = 0;
	$('#addRow').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'">'+
				
				'<td><input type="text" name="items['+i+'][desc]" class="form-control desc"> </td>'+
				'<td><input type="text" name="items['+i+'][amount]" class="form-control amount"> </td>'+
				'<td><input type="text" name="items['+i+'][price]" id="price" class="form-control price"> </td>'+
				'<td><button name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>'+
			'</tr>')
	});

	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id");
		$("#row" +button_id+"").remove();
	});

});
   $(document).ready(function(){
   $("input").change(function(){
           var sum = 0;
           $("input[id=price").each(function(){
           	var amount = $(this).val()-0;
           sum +=amount;
     })
     $("output[name=result]").val(sum+ ".00 rsd");
   	});
     
   })

   