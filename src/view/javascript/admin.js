// Login js
$(document).ready(function(){
	$('#eye').click(function(){
		$(this).toggleClass('open');
		$(this).children('i').toggleClass('fa-eye-slash fa-eye');	
		if($(this).hasClass('open')){
			$(this).prev().attr('type', 'text');
		}else{
			$(this).prev().attr('type', 'password');
		}
	});
});

function login(form) {
	var user = form.tk.value;
	var password = form.mk.value;
	if(user == 'Admin' && password == '01203879524')
	{
		window.location.href = './dashboard.html';
	}else{
		alert("Login fail");
	}
	return false;
}