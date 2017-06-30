<?php 
	$test_name = array('变速器噪声测试', '变速器传动效率测试表', '变速器换档性能测试',
			 '变速器静扭强度测试', '变速器高速测试', '变速器动态密封测试');
	
?>
<ul class="ul-test-data">
	<li>
		<h1><?php echo $test_name[$_data['test_type']];?></h1>
	</li>

	<li>
 		<?php 
 			$item = $_data['test_com'];
	 		echo '<span class="span-title">样品型号： </span><span class="span-value">' . $item[model_number] . '</span>';
	 		echo '<span class="span-title">设备号： </span><span class="span-value">' . $item[equipment_number] . '</span>';
	 		echo '<span class="span-title">测试地点： </span><span class="span-value">' . $item[test_location] . '</span>';
	 		echo '<span class="span-title">创建时间： </span><span class="span-value">' . get_time($item[create_time]) . '</span>';
 		?>
	</li>
	<li class="test_data">
		<?php 
		$temp = array();
		$test_type = $_data['test_type'];
 		$test_data = $_data['test_data'];
 		$temp = CONFIGURE::GET_TEST_DATA($test_type);
		
		
		//print_varable($test_data);
		foreach ($test_data as $index=>$item)
		{
			echo '<ul>';
			foreach ($item as $key=>$val)
			{
				if(empty($temp[$key])) continue; //test_id 和 id
				echo '<li>';
				echo '<span class="span-title">' . $temp[$key] . '</span>';
				echo '<span class="span-value">' . $val . '</span>';
				echo '</li>';
			}
			echo '<li>';
			echo '<span class="span-title">' . $temp[$key] . '</span>';
			echo '<span class="span-title">测试时间： </span><span class="span-value">' . get_time($item['test_time']) . '</span>';
			//echo '<span class="span-value">' . $val . '</span>';
			echo '</li>';
			
			if(!empty($item['file_url']))
			{
				echo '<li class="li-file-display">';
					echo '<img src="'. HOST . $item['file_url'] . '">';
				echo '</li>';
			}
			echo '</ul>';
		}
		
	
		
		?>
	</li>
</ul>

<input type="hidden" id="input-test-id" value="<?php echo $_data['test_id'];?>">
<input type="hidden" id="input-test-type" value="<?php echo $_data['test_type'];?>">
	


