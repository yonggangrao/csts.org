

<?php 
	$test_name = array('变速器噪声测试', '变速器传动效率测试表', '变速器换档性能测试',
			 '变速器静扭强度测试', '变速器高速测试', '变速器动态密封测试');
	//print_varable($_data);
	
?>
<ul class="ul-test-data">
	<li >
		<h1><?php echo $test_name[$_data['test_type']];?></h1>
	</li>

	<li class="li-head">
 		<?php 
 			$item = $_data['ret'];
	 		//echo '<div>';
	 		echo '<span class="span-title">样品型号： </span><span class="span-value">' . $item[model_number] . '</span>';
	 		echo '<span class="span-title">设备号： </span><span class="span-value">' . $item[equipment_number] . '</span>';
	 		echo '<span class="span-title">测试地点： </span><span class="span-value">' . $item[test_location] . '</span>';
	 		echo '<span class="span-title">创建时间： </span><span class="span-value">' . get_time($item[create_time]) . '</span>';
	 		//echo '</div>';
 		?>
	</li>
	<li class="li-insert-item">
		<?php 
		$temp = array();
		$test_type = $_data['test_type'];
 
		//print_varable($temp);
		echo '<ul class="ul-insert-item" id="ul-insert-item">';
			$temp = CONFIGURE::GET_TEST_DATA($test_type);
			//print_varable($temp);
			foreach ($temp as $index=>$item)
			{
				echo '<li >';
				echo '<span class="span-title">' . $item . '</span>';
				echo '<input class="input-title" id="input-test-data-' . $index . '">';
				echo '</li>';
			}
			echo '<li>';
				echo '<span class="span-title">上传文件：</span>';
				echo '<input type="file" class="input-title" id="file" name="file">';
				echo '<a class="buttonUpload button-grey" id="buttonUpload" href="javascript:void(0);">上传</a>';
				
				//echo '<button id="buttonUpload" >上传</button>';
			echo '</li>';
			
			echo '<li class="li-last">';
			echo '<a class="a-save-test button-grey" id="a-save-test" href="javascript:void(0);">保存</a>';
			echo '</li>';
		echo '</ul>';
		
		?>
	</li>
</ul>

<input type="hidden" id="input-test-id" value="<?php echo $_data['test_id'];?>">
<input type="hidden" id="input-test-type" value="<?php echo $_data['test_type'];?>">
	


