$(document).ready(function(){
		var object={
			url:"/onlineShop/onlineShop/Controller/productsController.php?action=search",
			type: "post",
			dataType:"json",
			data:{
			},
			success:function(result){
				var save='';
				for(var i=0; i<result.length; i+=3){
					save+='<div class="row">';
						save+='<div class="col-sm-4 product">';
							save+='<img src="http://localhost/onlineShop/onlineShop/Image/products/'+result[i].Image+'">';
							save+='<br>';
							save+=result[i].ProductName+'<br>';
							save+=result[i].Price+'<br>';
							save+='<button type="button" class="btn btn-primary button">Add to cart</button>';
						save+='</div>';
						if ((i+1)<result.length) {
						save+='<div class="col-sm-4 product pic">';
							save+='<img src="http://localhost/onlineShop/onlineShop/Image/products/'+result[i+1].Image+'">';
							save+='<br>';
							save+=result[i+1].ProductName+'<br>';
							save+=result[i+1].Price+'<br>';
							save+='<button type="button" class="btn btn-primary button">Add to cart</button>';
						save+='</div>';
						}
						if ((i+2)<result.length) {
						save+='<div class="col-sm-4 product">';
							save+='<img src="http://localhost/onlineShop/onlineShop/Image/products/'+result[i+2].Image+'">';
							save+='<br>';
							save+=result[i+2].ProductName+'<br>';
							save+=result[i+2].Price+'<br>';
							save+='<button type="button" class="btn btn-primary button">Add to cart</button>';
						save+='</div>';
						}
					save+='</div>';	
				}
				
				$('.PLP').html(save);
			}
		}
		$.ajax(object);
});