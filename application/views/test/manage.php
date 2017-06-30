
<div class="body-left">
	<ul class="ul-test">
		<li >
			<a class="a-test checked" type="0" href="javascript:void(0);">噪声测试</a>
			<a class="a-test" type="1" href="javascript:void(0);">传动效率测试</a>
			<a class="a-test" type="2" href="javascript:void(0);">换档性能测试</a>
			<a class="a-test" type="3" href="javascript:void(0);">静扭强度测试</a>
			<a class="a-test" type="4" href="javascript:void(0);">高速测试</a>
			<a class="a-test" type="5" href="javascript:void(0);">动态密封测试</a>
		</li>
	</ul>
</div>
<div class="body-right">

	<ul class="ul-func">
		<li class="li-func-head">
			<a class="a-func checked" id="a-func-show" href="javascript:void(0);">显示</a>
			<a class="a-func" id="a-func-insert" href="javascript:void(0);">创建实验</a>
			<a class="a-func" id="a-func-search" href="javascript:void(0);">搜索</a>
		</li>
		<li class="li-func-show" id="li-func-show">
			<?php 
				echo '<ul class="ul-show-test">';
				$test = $_data['ret'];
				
				//print_varable($test);
				foreach($test as $item)
				{
					echo '<li class="li-test" test_id="' . $item['id'] . '">';
						echo '<div>';
							echo '<span class="span-title">样品型号： </span><span class="span-value">' . $item[model_number] . '</span>';
							echo '<span class="span-title">设备号： </span><span class="span-value">' . $item[equipment_number] . '</span>';
							echo '<span class="span-title">测试地点： </span><span class="span-value">' . $item[test_location] . '</span>';
							echo '<span class="span-title">创建时间： </span><span class="span-value">' . get_time($item[create_time]) . '</span>';
						echo '</div>';
						echo '<div>';
							echo '<a class="a-link"  href="' . HOST. 'test/showdata/testi/' . $item['id'] . '/test_type/' . $item['test_type'] .'">显示实验数据</a>';
							echo '<a class="a-link"  href="' . HOST . 'test/adddata/testi/' . $item['id'] . '/test_type/0">录入实验数据</a>';
							echo '<a class="a-delete-test a-button" href="javascript:void(0);">删除</a>';
						echo '</div>';
					echo '</li>';
				}		
				echo '</ul>';
			?>
			
		</li>
		
		<li class="li-func-insert" id="li-func-insert">
			
		</li>
		<li class="li-func-search" id="li-func-search">
	
		</li>
	</ul>

</div>
