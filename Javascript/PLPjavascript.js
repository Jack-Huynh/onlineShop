function ProductListingPage(myArray){
	var save='';
		for(var i=0; i<myArray.length; i+=3){
			save+='<div class="row">';
				save+='<div class="col-sm-4 product">';
					save+='<img src="http://localhost/onlineShop/onlineShop/Image/products/'+myArray[i].Image+'">';
					save+='<br>';
					save+=myArray[i].ProductName+'<br>';
					save+=myArray[i].Price+'<br>';
					save+='<a href="http://localhost/onlineShop/onlineShop/View/PDP/index.php?id='+myArray[i].ProductID+'" <button type="button" class="btn btn-primary button">View Details</button></a>';
					save+= '<br>';
				save+='</div>';
				if ((parseInt(i+1))<myArray.length) {
				save+='<div class="col-sm-4 product pic">';
					save+='<img src="http://localhost/onlineShop/onlineShop/Image/products/'+myArray[parseInt(i+1)].Image+'">';
					save+='<br>';
					save+=myArray[parseInt(i+1)].ProductName+'<br>';
					save+=myArray[parseInt(i+1)].Price+'<br>';
					save+='<a href="http://localhost/onlineShop/onlineShop/View/PDP/index.php?id='+myArray[parseInt(i+1)].ProductID+'" <button type="button" class="btn btn-primary button">View Details</button></a>';
					save+= '<br>';
				save+='</div>';
				}
				if ((parseInt(i+2))<myArray.length) {
				save+='<div class="col-sm-4 product">';
					save+='<img src="http://localhost/onlineShop/onlineShop/Image/products/'+myArray[parseInt(i+2)].Image+'">';
					save+='<br>';
					save+=myArray[parseInt(i+2)].ProductName+'<br>';
					save+=myArray[parseInt(i+2)].Price+'<br>';
					save+='<a href="http://localhost/onlineShop/onlineShop/View/PDP/index.php?id='+myArray[parseInt(i+2)].ProductID+'" <button type="button" class="btn btn-primary button">View Details</button></a>';
					save+= '<br>';
				save+='</div>';
				}
			save+='</div>';	
		}
		$('.PLP').html(save);
}

$(document).ready(function(){
		var object={
			url:"/onlineShop/onlineShop/Controller/productsController.php?action=search",
			type: "post",
			dataType:"json",
			data:{
			},
			success:function(result){
				ProductListingPage(result);
			}
		}
		$.ajax(object);	

	$('.search').click(function(){
		var productName = $("#productName").val();
		var categoryName = $("#categoryName").val();
		var fromPrice = $("#fromPrice").val();
		var toPrice = $("#toPrice").val();
		var object={
			url:"/onlineShop/onlineShop/Controller/productsController.php?action=search",
			type: "post",
			dataType:"json",
			data:{
				productName: productName,
				categoryName: categoryName,
				fromPrice: fromPrice,
				toPrice: toPrice
			},
			success:function(result){
					ProductListingPage(result);
			}
		}
		$.ajax(object);
	});
	$('.categories').click(function(event){
		var categoryName = (this.getAttribute('data-type'));//value only for input
		event.preventDefault();
		var object={
			url:"/onlineShop/onlineShop/Controller/productsController.php?action=search",
			type: "post",
			dataType:"json",
			data:{
				categoryName: categoryName
			},
			success:function(result){
				ProductListingPage(result);
			}
		}
		$.ajax(object);
	});
});
