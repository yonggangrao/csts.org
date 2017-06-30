$(document).ready(function(){
	
	
	var test_type = 0;
	/************************/
	
	
	/**
	 * 删除实验
	 */
	$('#li-func-show').on('click', '.a-delete-test', function(){
	
		//alert(test_type);
		$li = $(this).parents('.li-test');
		
		$test_id = $li.attr('test_id');
		//alert($li.attr('test_id'));
		
		//return;
		$.post(
				"/test/deleteTest",
				{
					action:'delete',
					test_id: $test_id
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret != false)
					{

						$li.remove();
					}
					else
					{
						alert('删除失败。。');
					}
		  });
	});
	
	
	/**
	 * 搜索，提交
	 */
	$('#li-func-search').on('click', '#a-search', function(){
	
		//alert(test_type);
		
		var $begin = $('.input-begin').val();
		var $end = $('.input-end').val();
		
		$begin = $.trim($begin);
		$end = $.trim($end);
		if($begin == '' || $end == '')
		{
			alert('输入不能为空！');
		}
		//alert(test_type );
		
		//return;
		$.post(
				"/test/search",
				{
					action:'search',
					begin: $begin,
					end: $end,
					test_type: test_type
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret !== false)
					{
						//alert('创建成功');
						var res = data.ret;
						var map = data.map;

						$('#li-func-search').remove('.ul-search-show');
						var html = '<ul class="ul-search-show">';
						for(index in res)
						{
							item = res[index];
							html += '<li>';
							for(i in item)
							{
								if(i == 'id' || i == 'test_id')
								{
									continue;
								}
								if(i == 'test_time')
								{
									html += '<span>测试时间： </span><span>' + item[i] + '</span>'
									continue;
								}
								if(i == 'file_url')
								{
									//html += '<span>测试时间： </span><span>' + item[i] + '</span>'
									continue;
								}
								html += '<span>' + map[i] + '</span><span>' + item[i] + '</span>'
							}
							html += '</li>';
						}
						html += '</ul>';
						$('#li-func-search').append(html);
					}
					else
					{
						alert('查询失败。。');
					}
		  });
	});
	
	
	/**
	 * 搜索，显示输入框
	 */
	$('#a-func-search').bind('click',function(){
		
		$('#li-func-show').hide();
		$('#li-func-insert').hide();
		$('#li-func-search').empty().show();
		
		var html = '<ul class="ul-search" id="ul-search">';
			html += '<li>';
				html += '<span class="span-title">起始时间： </span>';
				html += '<input class="input-begin">';
			html += '</li>';
			html += '<li>';
				html += '<span class="span-title">终止时间： </span>';
				html += '<input class="input-end">';
			html += '</li>';
			html += '<li class="li-tips">';
			html += '输入格式：2016-05-22 15:00:00， 或： 2016-05-22';
			html += '</li>';
				
			html += '<li>';
			html += '<a class="a-search button-grey" id="a-search" href="javascript:void(0);">搜索</a>';
			html += '</li>';
			html += '</ul>';
			
			$('#li-func-search').append(html);
			
	});
	
	
	/**
	 * 显示实验
	 */
	$('#a-func-show').bind('click',function(){
	
		//alert(test_type);
		
		$('#li-func-show').show();
		$('#li-func-search').hide();
		$('#li-func-insert').hide();
		
		$.post(
				"/test/manage",
				{
					action:'showdata',
					test_type: test_type
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret !== false)
					{
						$('#li-func-show').empty();
						$data = data.ret;
						var html = '';
						html+= '<ul class="ul-show-test">';
						//$test = $_data['ret'];
						
						//print_varable($test);
						for (index in $data)
						{
							$item = $data[index];
							html+= '<li class="li-test" test_id="'+ $item['id'] + '">';
							html+= '<div>';
								html+= '<span class="span-title">样品型号： </span><span class="span-value">' + $item['model_number'] + '</span>';
								html+= '<span class="span-title">设备号： </span><span class="span-value">' + $item['equipment_number'] + '</span>';
								html+= '<span class="span-title">测试地点： </span><span class="span-value">' + $item['test_location'] + '</span>';
								html+= '<span class="span-title">创建时间： </span><span class="span-value">' + $item['create_time'] + '</span>';
								html+= '</div>';
								html+= '<div>';
								html+= '<a class="a-link" href="/test/showdata/testi/' + $item['id'] + '/test_type/' + $item['test_type'] +'">显示实验数据</a>';
								html+= '<a class="a-link" href="/test/adddata/testi/' + $item['id'] + '/test_type/'+ $item['test_type'] +'">录入实验数据</a>';
								html+= '<a class="a-delete-test a-button" href="javascript:void(0);">删除</a>';
								html+= '</div>';
							html+= '</li>';
						}		
						html+= '</ul>';
						
						$('#li-func-show').append(html);
					}
					else
					{
						alert('查询失败');
					}
		  });
	});
	
	
	/**
	 * 保存实验
	 */
	$('#li-func-insert').on('click', '#a-create-test', function(){
	
		//alert(test_type);
		
		var model_number = $('#model_number').val();
		var equipment_number = $('#equipment_number').val();
		var test_location = $('#test_location').val();
		
		//alert(model_number + ' ' + equipment_number + ' ' +  test_location + '' );
		
		//return;
		$.post(
				"/test/createTest",
				{
					action:'createTest',
					model_number: model_number,
					equipment_number: equipment_number,
					test_location: test_location,
					test_type: test_type
				},
				function(data){
					//alert(3444);
					data = json_decode(data);
					if(data.ret != false)
					{
						alert('创建成功');
						$('#model_number').val('');
						$('#equipment_number').val('');
						$('#test_location').val('');
					}
					else
					{
						alert('创建失败');
					}
		  });
	});
	
	/**
	 * 创建实验
	 */
	$('#a-func-insert').bind('click',function(){
		
		$('#li-func-show').hide();
		$('#li-func-search').hide();
		$('#li-func-insert').empty().show();
	
		var tmp = {'model_number': '样品型号：', 'equipment_number': '设备号：', 
			'test_location': '测试地点：', }
		var html = '<ul class="ul-insert-com" id="ul-insert-com">';
				for(i in tmp)
				{
					html += '<li>';
					html += '<span class="span-title">' + tmp[i] + '</span>';
					html += '<input class="input-title" id="' + i + '">';
					html += '</li>';
				}
				html += '<li class="li-create">';
				html += '<a class="a-create-test button-grey" id="a-create-test" href="javascript:void(0);">保存</a>';
				html += '</li>';
			html += '</ul>';
			$('#li-func-insert').append(html);
			
	});

	/**
	 * 选择实验类别
	 */
	$('.a-test').bind('click',function(){
		
		test_type = $(this).attr('type');
		//alert(test_type);
		$a_func = $(this).siblings('a');
		$a_func.each(function(index, item){ //each遍历以后，返回dom对象
			
			$class = item.getAttribute('class');
			if( $class.indexOf('checked') >= 0)
			{
				item.setAttribute('class', 'a-test');
			}
		});
		$(this).addClass('checked');
		
		//alert(test_type);
	});
	
	
	/**
	 * 选择功能
	 */
	$('.a-func').bind('click',function(){
		
		$a_func = $(this).siblings('a');
		$a_func.each(function(index, item){ //each遍历以后，返回dom对象
			
			$class = item.getAttribute('class');
			if( $class.indexOf('checked') >= 0)
			{
				item.setAttribute('class', 'a-func');
			}
		});
		$(this).addClass('checked');
	});
	

});








