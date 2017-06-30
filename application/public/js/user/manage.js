$(document).ready(function(){
	
	
	/**
	 * 修改密码，保存
	 */
	$('.li-add-user').on('click', '.a-modify-password-save', function(){
		
		var $password = $('#input-password').val();

		//alert($password);
		$password = $.md5($password);
		$.post(
				"/user/modifypassword/",
				{
					action:'modifypassword',
					password: $password
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret !== false)
					{
						alert('修改成功！')
						$li_add_user.empty();
					}
					else
					{
						alert('修改失败..');
					}
		  });
		
	});
	
	/**
	 * 修改密码，显示输入框
	 */
	$('#a-modify-password').bind('click', function(){
	
		$li_add_user = $(this).parent().siblings('.li-add-user');
		//alert($li_add_user.attr('class'))
		var html = '<ul>';
		html += '<li>';
		html+= '<span class="span-title">密码：</span>' + '<input type="text" id="input-password">';
		html += '</li>';

 
		html += '</li>';

		html += '<a class="a-modify-password-save button-grey" id="a-add-user-save" href="javascript:void(0);">保存</a>';
		html += '<li>';
		html += '</ul>';
		$li_add_user.empty();
		$li_add_user.append(html);
	});
	
	
	/**
	 * 删除用户
	 */
	$('.ul-user').on('click', '.a-delete-user', function(){
		
 
		if(!confirm('确定要删除该用户吗？'))
		{
			return false;
		}
		$li = $(this).parent();
		$job_id = $(this).siblings('.job_id').text();

		//alert($job_id);return;
		$.post(
				"/user/deleteuser/",
				{
					action:'deleteuser',
					job_id: $job_id
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret !== false)
					{

						$li.remove();
					}
					else
					{
						alert('删除失败..');
					}
		  });
		
	});
	
	/**
	 * 添加用户，保存
	 */
	$('.li-add-user').on('click', '.a-add-user-save', function(){
		
		var $li_add_user = $(this).parent();
		var $name = $('#input-name').val();
		var $job_id = $('#input-job_id').val();
		var $password = $('#input-password').val();
		var $level = $('#select-level').val();
		var $telephone = $('#input-telephone').val();
		var $department = $('#input-department').val();
		
		//alert($li_add_user.attr('class'));

		$password = $.md5($password);
		$.post(
				"/user/adduser/",
				{
					action:'adduser',
					name: $name,
					job_id: $job_id,
					password: $password, 
					level: $level,
					telephone: $telephone,
					department: $department
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret !== false)
					{
						$user_id = data.ret;
						var html = '';
						html+= '<span class="span-title">姓名：</span><span class="span-value">' + $name + '</span>' ;
						html+= '<span class="span-title">工号：</span><span class="span-value">' + $job_id + '</span>' ;
						html+= '<span class="span-title">级别：</span>';
						if($level === '0')
						{
							html+= '<span class="span-value">管理员</span>' ;
						}
						else
						{
							html+= '<span class="span-value">普通用户</span>' ;
						}
						html+= '<span class="span-title">电话：</span><span class="span-value">' + $telephone +  '</span>' ;
						html+= '<span class="span-title">所在部门：</span><span class="span-value">' + $department +  '</span>';
						$li_add_user.empty();
						$li_add_user.after(html);
					}
					else
					{
						alert('添加失败..');
					}
		  });
		
	});
	
	
	/**
	 * 添加用户，显示输入框
	 */
	$('#a-add-user').bind('click',function(){
	
			
		$li_add_user = $(this).parent().siblings('.li-add-user');
		//alert($li_add_user.attr('class'))
		var html = '';
		html += '<li>';
		html+= '<span class="span-title">姓名：</span>' + '<input type="text" id="input-name">';
		html+= '<span class="span-title">工号：</span>' + '<input type="text" id="input-job_id">';


		html+= '<span class="span-title">密码：</span>' + '<input type="text" id="input-password">';
		html += '</li>';
		html += '<li>';
		html+= '<span class="span-title">级别：</span>';

		html+= '<select id="select-level">';
			html+= '<option value="0">管理员</option>';
			html+= '<option value="1">普通用户</option>';
		html+= '</select>';

		html+= '<span class="span-title">电话：</span>' + '<input type="text" id="input-telephone">';
		html+= '<span class="span-title">所在部门：</span>' + '<input type="text" id="input-department">';
		html += '</li>';
		html += '</li>';

		html += '<a class="a-add-user-save button-grey" id="a-add-user-save" href="javascript:void(0);">保存</a>';
		html += '<li>';
		$li_add_user.empty();
		$li_add_user.append(html);
	});
	
	
	
	

});








