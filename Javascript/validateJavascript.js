function checkRequired(data){
	if(data==''){
		return false;
	}else{
		return true;
	}
}
function checkNumber(data){
	/*
	for(var i=0; i<data.length; i++){
		var num=data.charCodeAt(i);
		if(num<48||num>57){
			return false;
		}
	}
	return true;
	*/
	return /^[0-9]+$/g.test(data);
}

// ...@... + .com
// test1 :  abc@gmail.com -> true
// test2 :  abc           -> false
// test3 :  abc@          -> false
// test4 :  abc.com       -> false
// test5 :  abc.com@      -> false
function checkEmail(data) {
	/*
	if(data.indexOf('.com')==(data.length-4)&&data.indexOf('@')>0&&data.indexOf('@')<(data.indexOf('.com')-1)){
		return true;
	}
	else{
		return false;
	}
	*/
	return /[a-z0-9]+@[a-z]+\.com$|[a-z0-9]+@[a-z]+\.net$|[a-z0-9]+@[a-z]+\.edu$/g.test(data);
}
function checkPwd(data){
	//(^[A-Z]+)&([a-z]+)&([0-9]+$)
	var checkPwd = /[^a-zA-Z0-9]/g.test(data);
	if(/[A-Z]+/i.test(data) && /[0-9]+/g.test(data) && !checkPwd){
		return true;
	}
	else{
		return false;
	}
	
}
$(document).ready(function(){
	$('.phoneValidate').focusout(function(){
		var data=$(this).val();
		if(!checkRequired(data)){
			$('.phoneValidate').parent().find('.errMess').html("Please enter phone number!");
			$('.phoneValidate').parent().find('.errMess').addClass("showErrMess");
		}
		else {
			if(!checkNumber(data)){
				$('.phoneValidate').parent().find('.errMess').html("Please enter number for phone");
				$('.phoneValidate').parent().find('.errMess').addClass("showErrMess");
			} else {
				$('.phoneValidate').parent().find('.errMess').html("");
				$('.phoneValidate').parent().find('.errMess').removeClass("showErrMess");
			}
		}
		/*
		if(!checkRequired(data)){
			$('.phoneValidate').parent().find('.errMess').html("Please enter email!");
			$('.phoneValidate').parent().find('.errMess').addClass("showErrMess");
		}
		else {
			if(!checkEmail(data)){
				$('.phoneValidate').parent().find('.errMess').html("Please enter email correctly");
				$('.phoneValidate').parent().find('.errMess').addClass("showErrMess");
			} else {
				$('.phoneValidate').parent().find('.errMess').html("");
				$('.phoneValidate').parent().find('.errMess').removeClass("showErrMess");
			}
		}
		*/
	});
	$('.emailValidate').focusout(function(){
		var data=$(this).val();
		if(!checkRequired(data)){
			$('.emailValidate').parent().find('.errMess').html("Please enter email!");
			$('.emailValidate').parent().find('.errMess').addClass("showErrMess");
		}
		else {
			if(!checkEmail(data)){
				$('.emailValidate').parent().find('.errMess').html("Please enter email correctly");
				$('.emailValidate').parent().find('.errMess').addClass("showErrMess");
			} else {
				$('.emailValidate').parent().find('.errMess').html("");
				$('.emailValidate').parent().find('.errMess').removeClass("showErrMess");
			}
		}
	});

	$('.pwdValidate').focusout(function(){
		var data=$(this).val();
		if(!checkRequired(data)){
			$('.pwdValidate').parent().find('.errMess').html("Please enter password!");
			$('.pwdValidate').parent().find('.errMess').addClass("showErrMess");
		}
		else {
			if(!checkPwd(data)){
				$('.pwdValidate').parent().find('.errMess').html("Please enter password correctly");
				$('.pwdValidate').parent().find('.errMess').addClass("showErrMess");
			} else {
				$('.pwdValidate').parent().find('.errMess').html("");
				$('.pwdValidate').parent().find('.errMess').removeClass("showErrMess");
			}
		}
	});


	$('.btn-save2').click(function(){
		if($('.showErrMess').length > 0){
			alert("Wrong");
		} else {
			$("#formLogin").submit();
		}
	});
});

