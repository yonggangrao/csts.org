$(document).ready(function(){
	$('#submit').bind('click',function(){
		
		var $email = $('#input_email').val();
		var $password = $('#input_password').val();
		//alert($password + $email)
		if($email == '')
		{
			$('#email_span').text('请填写邮箱!');
			return false;
		}
		if($password =='')
		{
			$('#password_span').text('请填写密码!');
			return false;
		}
		
		
		$password = $.md5($password);
		var url = '/user/login';
		$.post(
				url,
				{
					action:'login', 
					job_id:$email, 
					password:$password
				},
				function(data){
					$data = eval('(' + data + ')');
					
					if($data.ret == true)
					{
						//alert('登录成功');
						//window.location.href='/';
						redirect('/test/manage')
					}
					else
					{
						alert('登录失败');
					}
		  });
		
		
		
		
	});
});








