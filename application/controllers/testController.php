<?php 

	require_once  MODEL_PATH . 'testModel.php';

	
	class testController extends controller
	{
		
		public function deleteTestAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'delete':
						
					$test_id = get_response('test_id');
		
					$select_tb = 6;
					$o_test = new test_model($select_tb);
					$ret = $o_test->delete_test($test_id);
						
					$data['ret'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
		
					echo json_encode($data);
						
					break;
						
				default:
			}
		}
		
		public function uploadfileAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				default:
						
					$file = get_file('file');
					$o_test = new test_model(0);
					$ret = $o_test->upload_file($file);
					
					$data = $ret;
					//$data = array('a'=>1);
					echo json_encode($data);
					
					break;
			}
		}
		
		public function searchAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'search':
					
					$begin = get_response('begin');
					$end = get_response('end');
					$test_type = get_response('test_type');
						
					$select_tb = $test_type;
					$o_test = new test_model($select_tb);
					$ret = $o_test->search($begin, $end);
					
					$map = CONFIGURE::GET_TEST_DATA($test_type);
					//$temp = array('dangwei' => '档位：', 'shuruzhuansu' => '输入转速：', 'shiyanniuju' => '实验扭距：',
						//	'youwen' => '油温：', 'shuchuniuju' => '输出扭距：', 'chuandongxiaolv' => '传动效率：');
					foreach ($ret as $index=>$item)
					{
						$ret[$index]['test_time'] = get_time($ret[$index]['test_time']);
					}
					$data['ret'] = $ret;
					$data['map'] = $map;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
						
					echo json_encode($data);
					
					break;
					
				default:
			}
		}
		
		public function showdataAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				default:
					$param = $this->fc->getParams();
					$test_id = $param[1];
					$test_type = $param[3];

					$select_tb = 6;
					$o_test = new test_model($select_tb);
					$ret = $o_test->get_test_test_id($test_id);
					$data['test_com'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
					
					
					$select_tb = $test_type;
					$o_test = new test_model($select_tb);
					$ret = $o_test->get_test_data_test_id($test_id);
					$data['test_data'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
						
						
					$data['test_id'] = $test_id;
					$data['test_type'] = $test_type;
						
					$this->render('test', 'showdata', $data);
			}
		}
		
		public function adddataAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'adddata':
					
					$test_id = get_response('test_id');
					$data = get_response('data');
					$test_type = get_response('test_type');
					$file_url = get_response('file_url');
					
					$select_tb = $test_type;
					$o_test = new test_model($select_tb);
					$ret = $o_test->add_test_data($test_id, $data, $file_url);
					$data['ret'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
					
					echo json_encode($data);
					break;
				default:
					$param = $this->fc->getParams();
					$test_id = $param[1];
					$test_type = $param[3];
					
					$select_tb = 6;
					$o_test = new test_model($select_tb);
					$ret = $o_test->get_test_test_id($test_id);
					$data['ret'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
					
					
					$data['test_id'] = $test_id;
					$data['test_type'] = $test_type;
					
					$this->render('test', 'adddata', $data);
			}
		}
		
		
		public function manageAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'showdata':
						
					$test_type = get_response('test_type');
					$select_tb = 6;
					$o_test = new test_model($select_tb);
					$ret = $o_test->get_tests_type($test_type);
					
					foreach ($ret as $key=>$val)
					{
						$ret[$key]['create_time'] = get_time($ret[$key]['create_time']);
					}	
					$data['ret'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
					

					echo json_encode($data);
					break;
				
				default:
						
					if(!is_login())
					{
						$this->render('user', 'login');
						return false;
					}
					//获取所有测试
					$test_type = 0;
					$select_tb = 6;
					$o_test = new test_model($select_tb);
					$ret = $o_test->get_tests_type($test_type);
					$data['ret'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
						
					$this->render('test', 'manage', $data);
			}
		}
		
		public function createTestAction()
		{
			$model_number = get_response('model_number');
			$equipment_number = get_response('equipment_number');
			$test_location = get_response('test_location');
			$test_type = get_response('test_type');
			$action = get_response('action');
				
			switch ($action)
			{
				case 'createTest':
					
					$select_tb = 6;
					$o_test = new test_model($select_tb);
					$ret = $o_test->createTest($model_number, $equipment_number, $test_location, $test_type);
						
					$data['ret'] = $ret;
					$data['errno'] = $o_test->get_errno();
					$data['msg'] = $o_test->get_msg();
		
					echo json_encode($data);
					break;
		
				default:
						
					$this->render('error', 'error');
			}
		}
		
	}
?>