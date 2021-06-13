$(document).ready(function(){
	$(".quantity").change(function(){
		var id=$(this).data("id");
		var quantity=$(this).val();
		var object={
			url:"/onlineShop/onlineShop/Controller/cartController.php?action=quantityChange",
			type: "post",
			dataType:"json",
			data:{
				id:id,
				quantity: quantity
			},
			success:function(result){

				$(".sum-"+id).html(result.sum);
				$(".total").html("Total :" + result.total);
			}
		}

		if(parseInt(quantity) < 1){
			$(this).val(1);
		}else{
			$.ajax(object);
		}
	});
});