$(document).ready(function(){
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
				//alert(result);
				var save='';
				for(var i=0; i<result.length; i++){
					save+='<tr>';
					save+='<td>'+result[i].ProductID+'</td>';
					save+='<td>'+result[i].ProductName+'</td>';
					save+='<td>'+result[i].SupplierID+'</td>';
					save+='<td>'+result[i].CategoryName+'</td>';
					save+='<td>'+result[i].Price+'</td>';
				
					save+='<td><img src="http://localhost/onlineShop/onlineShop/Image/products/'+result[i]['Image']+'" width="120" height="110"><td>';
					save+='<td class="actionButton">'+'<a href="http://localhost/onlineShop/onlineShop/View/product/update.php?id='+result[i]['ProductID']+'"><button type="button" style="" class="btn btn-info btn-update">UPDATE</button></a>';
                	save+='<a style="margin-left: 2px" href="http://localhost/onlineShop/onlineShop/Controller/productsController.php?action=delete&id='+result[i]['ProductID']+'"><button type="button" class="btn btn-danger btn-del">DELETE</button></a>'+"</td>";
                	save+='</tr>';
				}
				
				$('tbody').html(save);
			}
		}
		$.ajax(object);
	});
});