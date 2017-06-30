<?php
	require_once MODEL_PATH . 'model_base.php';

	//变速器传动效率测试
	class test_model extends model_base
	{
		private $db = 'csts';
		private $tb = '';
		private $tb_map = array('BSQZST', 'BSQCDXLT', 'BSQHDXNT', 'BSQJNQDT', 'BSQGST', 'BSQDTMFT', 'test');
		
		public function __construct($select_tb)
		{
			$this->tb = $this->tb_map[$select_tb];
			parent::__construct($this->db, $this->tb);
		}

		
		public function delete_test($test_id)
		{
			$set = array('is_deleted');
			$values = array('1');
			$where = array('id');
			$where_value = array($test_id);
			return $this->update($set, $values, $where, $where_value);
		}
		
		public function search($begin, $end)
		{
			$begin = strtotime($begin);
			$end = strtotime($end);
			
			$sql = 'select * from '. $this->tb . ' where test_time >= ' . $begin . ' and test_time <= '. $end;
			$values = array();
			$type = CONFIGURE::SQL_QUERY_LIST;
			return $this->execute($sql, $values, $type);
		}
		
		public function get_test_data_test_id($test_id)
		{
			$select = array('*');
			$where = array('test_id');
			$where_value = array($test_id);
			return $this->get_list($select, $where, $where_value);
		}
		
		public function upload_file($file)
		{
				
				
				
				$img= $file;
				$filename=$img['name'];
				$file_tmp_name=$img['tmp_name'];
				$file_size=$img['size'];
				$file_type=$img['type'];
					
				if(is_uploaded_file($file_tmp_name))
				{
					//创建一个以用户id为名的目录  //实际上传的时候要修改
					$usr_folder=$_SERVER['DOCUMENT_ROOT'] . '/application/public/images/upload_img' ;
						
					if(!is_dir($usr_folder))
					{
						mkdir($usr_folder);
					}
						
					//将文件名该为当前的unix时间戳，这样就不会混淆和覆盖
					$filename=time() . substr($filename, strpos($filename, '.'));
					$file_to=$usr_folder . '/' . $filename;
					if(!move_uploaded_file($file_tmp_name, iconv('utf-8', 'gb2312', $file_to)))
					{
						return false;
					}
					else
					{
						//上传成功后
						$file_address='application/public/images/upload_img' .  '/' . $filename;
						return array('fullname'=>$file_address,'shortname'=>$filename);
					}
				}
				else
				{
					return false;
				}
		}
		public function add_test_data($test_id, $data, $file_url)
		{
			$insert = array('test_id');
			$values = array($test_id);
			
			foreach ($data as $key=>$val)
			{
				array_push($insert, $key);
				array_push($values, $val);
			}
			$test_time = time();
			array_push($insert, 'test_time');
			array_push($values, $test_time);
			array_push($insert, 'file_url');
			array_push($values, $file_url);
			
			
			return $this->insert($insert, $values);
		}
		
 		
		/**
		 * 获得测试，通过id
		 * @param unknown $test_id
		 * @return Ambigous <string, boolean>
		 */
		public function get_test_test_id($test_id)
		{
			$select = array('*');
			$where = array('id');
			$where_value = array($test_id);
			return $this->get_one($select, $where, $where_value);
		}
		
		/**
		 * 获取某类实验
		 * @param unknown $test_type
		 * @return Ambigous <unknown, string>
		 */
		public function get_tests_type($test_type)
		{
			$tester_id = get_session('user_id');
			if(empty($tester_id))
			{
				return false;
			}
			$select = array('*');
			$where = array('test_type', 'tester_id', 'is_deleted');
			$where_value = array($test_type, $tester_id, '0');
			$others = array('order_by'=>'create_time', 'order'=>'desc');
			return $this->get_list($select, $where, $where_value, $others);
		}
		
		/**
		 * 创建测试
		 * @param unknown $model_number
		 * @param unknown $equipment_number
		 * @param unknown $test_location
		 * @param unknown $test_type
		 * @return boolean|Ambigous <boolean, string>
		 */
		public function createTest($model_number, $equipment_number, $test_location, $test_type)
		{
			$tester_id = get_session('user_id');
			if(empty($tester_id))
			{
				$this->set_errno(CONFIGURE::PARAM_ILLEGAL_ERRNO);
				$msg = CONFIGURE::PARAM_ILLEGAL . ', Method: '  . __METHOD__;
				$this->set_msg($msg);
				return false;
			}
		
			$create_time = time();
			$insert = array("model_number", "equipment_number", "test_location", 'tester_id', 'create_time', 'test_type');
			$values = array($model_number, $equipment_number, $test_location, $tester_id, $create_time, $test_type);
				
			return $this->insert($insert, $values);
		}
		
		
		/*
		public function get_organization_member_confi($conf_id)
		{
			$sql = 'select user.id as user_id, user.name as user_name from user, organization_user, conference ';
			$sql .= 'where user.id=organization_user.user_id and conference.organization_id=organization_user.organization_id and conference.id=?;';
			$values = array($conf_id);
			$type = CONFIGURE::SQL_QUERY_LIST;
			return $this->execute($sql, $values, $type);
		}
		
		public function get_conference_confi($conf_id)
		{
			$select = array('*');
			$where = array('id');
			$where_value = array($conf_id);
			return $this->get_one($select, $where, $where_value);
		}
	*/
	}
?>
