
<div class="left">
	<div class="div-item">
		<a href="<?php echo HOST;?>" >创建会议组织</a>
	</div>
	<div class="div-item">
		<ul>
			<li ><h2>我创建过的会议组织</h2></li>
			
			
			<?php 
			
				//print_varable($_data);
				//print_varable($_SESSION);
				//if(is_array($var))
				$myorg = $_data['myorg'];
				//print_varable($myorg);
				foreach ($myorg as $key=>$val)
				{
					echo '<li >';
						echo '<a href="' . HOST. 'organization/manage/orgi/'. $val['id'] . '" >' . $val['name'] . '</a>';
						echo ' ' . get_time($val['create_time']);
					echo '</li>';
				}
			
			
			?>

		</ul>
	</div>
	<div class="div-item">
		<ul>
			<li ><h2>我所在的会议组织</h2></li>
			<li ><a href="<?php echo HOST;?>" >会议组织一</a></li>
			<li ><a href="<?php echo HOST . 'user/home';?>" >会议组织二</a></li>
			
			
			<li ><a href="<?php echo HOST . 'user/home';?>" >会议组织三</a></li>
		</ul>
	</div>
	
	
</div>

<div class="right">
	<div class="div-item">
		<h2>个人信息</h2>
	</div>

</div>



	
	
















