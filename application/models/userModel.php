<?php
	require_once MODEL_PATH . 'model_base.php';

	class user_model extends model_base
	{
		private $db = 'csts';
		private $tb = 'user';
		
		public function __construct()
		{
			
			parent::__construct($this->db, $this->tb);
		}
		
		
		
		public function delete_user($job_id)
		{
			$where = array('job_id');
			$where_value = array($job_id);
			
			return $this->delete($where, $where_value);
		}
		
		public function modify_password($password)
		{
			$job_id = get_session('user_id');
			
			if(empty($job_id))
			{
				$this->set_errno(CONFIGURE::PARAM_ILLEGAL_ERRNO);
				$msg = CONFIGURE::PARAM_ILLEGAL . ', Method: '  . __METHOD__;
				$this->set_msg($msg);
				return false;
			}
			
			$set = array('password');
			$values = array($password);
			$where = array("job_id");
			$where_value = array($job_id);
		
			return $this->update($set, $values, $where, $where_value);
		}
		
		
		public function add_user($name, $job_id, $password, $level, $telephone, $department)
		{
			$insert = array("name", "job_id", "password", "level","telephone", "department");
			$values = array($name, $job_id, $password, $level, $telephone, $department);
				
			return $this->insert($insert, $values);
		}
		
		
		public function get_all_user()
		{
			$select = array("*");
			$where = array();
			$where_value = array();
				
			return $this->get_list($select, $where, $where_value);
		}
		
		public function login($job_id, $password)
		{
			$select = array("*");
			$where = array("job_id");
			$where_value = array($job_id);
			
			$ret = $this->get_one($select, $where, $where_value);
			$pass = $ret['password'];
			$user_id = $ret['job_id'];
			$level = $ret['level'];
			$name = $ret['name'];
			if($pass === $password)
			{
				set_login($user_id, $name, $level);
				return true;
			}
			else 
			{
				return false;
			}
		}
		
		public function sign($name, $password, $title, $profile)
		{
			$insert = array("name", "password", "title", "profile");
			$values = array($name, $password, $title, $profile);
			
			return $this->insert($insert, $values);
		}
	}


?>
