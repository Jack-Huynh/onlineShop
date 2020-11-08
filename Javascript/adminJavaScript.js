function loadPage(){
	/* LOAD PAGE*/
	var object={
		url:"/onlineShop/onlineShop/Controller/adminController.php?action=loadPage",
		type: "post",
		dataType:"json",
		data:{

		},
		success:function(result){
			var a = 1;
			var save='';
			for(var i=0; i<result.length; i++){
				save+='<tr>';
				save+='<td>'+result[i].ID+'</td>';
				save+='<td>'+result[i].Email+'</td>';
				save+='<td>'+result[i].Password+'</td>';
				save+='<td>'+result[i].Status+'</td>';
				if( result[i].Status==1 ) {
					save+='<td><button class="btn btn-primary sentMail" value="'+result[i].ID+'" disabled>SENT</button></td>';
				}else {
					save+='<td><button class="btn btn-info sentMail" value="'+result[i].ID+'">SEND MAIL</button></td>';
				}	
				save+='</tr>';
			}
			$('tbody').html(save);
		}
	}
	$.ajax(object);
}
$(document).ready(function(){
	loadPage();
	$(document).on("click",".sentMail",function() {
    	$emailID = $(this).val();
	    var object = {
			url:"/onlineShop/onlineShop/Controller/adminController.php?action=sentMail",
			type: "post",
			dataType:"text",
			data:{
				emailID : $emailID
			},
			success:function(result){
				alert(result);
			}
		};
		$.ajax(object);
	})
});