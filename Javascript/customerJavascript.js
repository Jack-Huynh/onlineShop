function addressesListing(myArray){
	var addressesArray=JSON.parse(myArray);
	var save='';
	for(var i=0; i<addressesArray.length; i++){
		save+='<tr>';
		save+='<td>'+addressesArray[i].AddressName+'</td>';
		save+='<td>'+addressesArray[i].Addresses+'</td>';
		save+='<td>'+addressesArray[i].Phone+'</td>';
		save+='</tr>';
	}
	$('tbody').html(save);
}
$(document).ready(function(){
	var json='[{"AddressName":"a", "Addresses": "b", "Phone": "c", "isDefault":true},{"AddressName":"a", "Addresses": "b", "Phone": "c", "isDefault":true}]';
	var addressesArray=JSON.parse(json);
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
});