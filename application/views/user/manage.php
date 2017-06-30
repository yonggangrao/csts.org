
<div class="body-left">

	
	<ul class="ul-user">
		<li class="li-head">
			用户列表
			<a class="a-modify-password button-grey" id="a-modify-password" href="javascript:void(0);">修改密码</a>
		</li>
		<?php 
		
		if($level === '0')
		{
			echo '<li >';
			echo '<a class="a-add-user button-grey" id="a-add-user" href="javascript:void(0);">添加用户</a>';
			echo '</li>';
		}
		?>
		
		<li class="li-add-user">

		</li>
		<?php 
			$user = $_data['all_user'];
			//print_varable($_data);
			foreach($user as $index=>$item)
			{
				echo '<li>';
					echo '<span class="span-title">姓名：</span>'.'<span class="span-value">' . $item['name'] . '</span>' ;
					echo '<span class="span-title">工号：</span>'.'<span class="span-value job_id" >' . $item['job_id'] . '</span>' ;
					echo '<span class="span-title">级别：</span>';
					if($item['level'] === '0')
					{
						echo '<span class="span-value">管理员</span>' ;
					}
					else 
					{
						echo '<span class="span-value">普通用户</span>' ;
					}
					echo '<span class="span-title">电话：</span>'.'<span class="span-value">' . $item['telephone'] . '</span>' ;
					echo '<span class="span-title">所在部门：</span>'.'<span class="span-value">' . $item['department'] . '</span>' ;
					
					$level = get_session('level');
					if($level === '0')
					{
						echo '<a class="a-delete-user a-button" id="a-delete-user" href="javascript:void(0);">删除</a> ';
					}
				echo '</li>';
			}
		?>
	</ul>
</div>
<div class="body-right">

</div>



	
















