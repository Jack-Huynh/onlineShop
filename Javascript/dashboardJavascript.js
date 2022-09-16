$(document).ready(function(){
	$('.orderStatus').change(function(){
		var status=$(this).val();
		var object={
			url:"/onlineShop/onlineShop/Controller/dashboardController.php?action=statistics",
			type: "post",
			dataType:"json",
			data:{
				status:status
			},
			success:function(result){
				$(".statusQuantity").html(result);
			}
		}
		$.ajax(object);
	});
});