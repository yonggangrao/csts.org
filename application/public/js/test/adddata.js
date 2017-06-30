$(document).ready(function(){
	$('#buttonUpload').bind('click',function(){
		//alert(123)
	//return;
	var $li = $(this).parent();
	if($('#file').val() == '')
	{
		return;
	}
	$.ajaxFileUpload
	(
	    {
	        url: '/test/uploadfile', //用于文件上传的服务器端请求地址
	        secureuri: false,           //一般设置为false
	        fileElementId: 'file', //文件上传控件的id属性  <input type="file" id="file" name="file" /> 注意，这里一定要有name值   
	                                                //$("form").serialize(),表单序列化。指把所有元素的ID，NAME 等全部发过去
	        dataType: 'JSON',//返回值类型 一般设置为json
	        /*这个dataType的值一定要大写，否则，会报错。*/
	        complete: function () {//只要完成即执行，最后执行
	        	
	        },
	        success: function (data, status)  //服务器成功响应处理函数
	        {        
	        	data = json_decode(data);
	        	//alert(data)
	        	//da
	        	var html = '<span class="filename" filename="' + data['fullname'] + '">' + data['shortname'] + '</span>';
	        	$li.empty();
	        	$li.append(html);
	        },
	        error: function (data, status, e)//服务器响应失败处理函数
	        {
	            alert(e);
	        }
	    }
	)
});
	
	
	$('#ul-insert-item').on('click', '#a-save-test', function(){
	//$('#a-save-test').bind('click',function(){
		
		var $test_id = $('#input-test-id').val();
		var $test_type = $('#input-test-type').val();
		var $file_url = $('.filename').attr('filename');
		//alert($file_url)
		//return;	
		$temp = get_test_data($test_type);
		
		var $data = {};
		var test = '';
		for(item in $temp)
		{
			$val = $temp[item];
			id = '#input-test-data-' + $val;
			$data[$val] = $(id).val();
			$data[$val] = $.trim($data[$val])
			//alert($data[$val]);return;
			if( $data[$val] == '')
			{
				//alert($val)
				$('.li-last').find('.tips').remove();
				$('.li-last').append('<span class="tips">还有未填的选项！</span>');
				return false;
			}
		}

		$.post(
				"/test/adddata",
				{
					action:'adddata', 
					test_id:$test_id,
					test_type:$test_type,
					file_url: $file_url,
					data:$data
				},
				function(data){
					data = json_decode(data);
					if(data.ret !== false)
					{
						alert('创建成功');
						var url = window.location.href;
						redirect(url);
					}
					else
					{
						alert('创建失败');
					}
		  });
		
		
		
		
	});
});

 

function verify_name($name)
{
	if($name == '')
	{
		$('#tips').text('请填写用户名!');
		return false;
	}
	if($name.length < 2)
	{
		$('#tips').text('用户名太短！');
		return false;
	}
	return true;
}
function verify_profile($profile)
{
	if($profile.length==0)
	{
		$('#tips').text('请填写组织简介!');
		return false;
	}
	return true;
}
function verify_password($password, $repassword)
{
	if($password =='' || $repassword=='')
	{
		$('#tips').text('请填写密码！');
		return false;
	}
	if($password.length < 6)
	{
		$('#tips').text('密码太短！');
		return false;
	}
	if($password != $repassword)
	{
		$('#tips').text('密码不匹配！');
		return false;
	}
	return true;
}


function verify_phone($phone)
{
	if($phone == '')
	{
		$('#tips').text('请填写电话！');
		return false;
	}
	
	$regexp = /^1\d{10}$/g;
	if(!$regexp.exec($phone))
	{
		$('#tips').text('电话格式不对！');
		return false;
	}
	
	return true;
}

function verify_section($section)
{
	if($section == 'unselected')
	{
		$('#tips').text('请填写校区！');
		return false;
	}
	
	return true;
}


