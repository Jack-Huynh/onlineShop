function addressesListing(myArray){
	var addressesArray=JSON.parse(myArray);
	var save='';
	for(var i=0; i<addressesArray.length; i++){
		save+='<tr>';
		save+='<td>'+addressesArray[i].AddressName+'</td>';
		save+='<td>'+addressesArray[i].Addresses+'</td>';
		save+='<td>'+addressesArray[i].Phone+'</td>';
		save+='<td><button type="button" class="btn btn-danger delete" data-id="'+i+'">DELETE</button>';
		if(addressesArray[i].isDefault){
			save+='<button type="button" class="btn btn-warning isDefault" disabled>DEFAULT</button></td>';
		}else{
			save+='<button type="button" class="btn btn-success isDefault" data-id="'+i+'">DEFAULT</button></td>';
		}
		save+='</tr>';
	}
	$('tbody').html(save);
}
$(document).ready(function(){
	//var json='[{"AddressName":"a", "Addresses": "b", "Phone": "c", "isDefault":true},{"AddressName":"a", "Addresses": "b", "Phone": "c", "isDefault":true}]';
	//var addressesArray=JSON.parse(json);
	var object={
			url:"/onlineShop/onlineShop/Controller/userController.php?action=getAddresses",
			type: "post",
			dataType:"text",
			data:{
			},
			success:function(result){
				addressesListing(result);
			}
		}
		$.ajax(object);
		
	$(document).on('click','.delete', function(){
		var index=$(this).attr("data-id");
		var object={
			url:"/onlineShop/onlineShop/Controller/userController.php?action=deleteAddresses",
			type: "post",
			dataType:"text",
			data:{
				index:index
			},
			success:function(result){
				addressesListing(result);
				$('#closeButton').trigger("click");
			}
		}
		$.ajax(object);
	});

	$('.add').click(function(){
		var addressName=$('#addressName').val();
		var addresses=$('#addresses').val();
		var phone=$('#phone').val();
		var object={
			url:"/onlineShop/onlineShop/Controller/userController.php?action=addAddresses",
			type: "post",
			dataType:"text",
			data:{
				addressName: addressName,
				addresses: addresses,
				phone: phone
			},
			success:function(result){
				addressesListing(result);
				$('#closeButton').trigger("click");
			}
		}
		$.ajax(object);
	});

	$(document).on('click','.isDefault', function(){
		var index=$(this).attr("data-id");
		var object={
			url:"/onlineShop/onlineShop/Controller/userController.php?action=changeDefaultAddresses",
			type: "post",
			dataType:"text",
			data:{
				index:index
			},
			success:function(result){
				addressesListing(result);
				$('#closeButton').trigger("click");
			}
		}
		$.ajax(object);
	});
});