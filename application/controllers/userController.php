<?php 

	require_once  MODEL_PATH . 'userModel.php';
	//require_once  MODEL_PATH . 'organizationModel.php';

	class userController extends controller
	{
		public function modifypasswordAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'modifypassword':
		
		
					$password = get_response('password');
		
		
		
					$o_user = new user_model();
					$ret = $o_user->modify_password($password);
		
					$data['ret'] = $ret;
					$data['errno'] = $o_user->get_errno();
					$data['msg'] = $o_user->get_msg();
		
					echo json_encode($data);
		
					break;
		
				default:
		
		
			}
		}
		
		
		public function deleteuserAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'deleteuser':
						
						
					$job_id = get_response('job_id');
						
						
						
					$o_user = new user_model();
					$ret = $o_user->delete_user($job_id);
	 
					$data['ret'] = $ret;
					$data['errno'] = $o_user->get_errno();
					$data['msg'] = $o_user->get_msg();
		
					echo json_encode($data);
		
					break;
		
				default:
		
		
			}
		}
		
		
		public function adduserAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'adduser':
					
					
					$name = get_response('name');
					$job_id = get_response('job_id');
					$level = get_response('level');
					$password = get_response('password');
					$telephone = get_response('telephone');
					$department = get_response('department');
					
					
					
					$o_user = new user_model();
					$ret = $o_user->add_user($name, $job_id, $password, $level, $telephone, $department);
					if(ret !== false)
					{
						$data['user_id'] = $ret;
						$data['ret'] = true;
					}
					else
					{
						$data['ret'] = false;
					}
						
					$data['errno'] = $o_user->get_errno();
					$data['msg'] = $o_user->get_msg();
		
					echo json_encode($data);
		
					break;
		
				default:
		
		
			}
		}
		
		public function manageAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				default:
					if(!is_login())
					{
						$this->render('user', 'login');
						return false;
					}
					
					
					$user = new user_model();
					$ret = $user->get_all_user();
					$data['all_user'] = $ret;
					//$data['ret'] = $ret;
					$data['errno'] = $user->get_errno();
					$data['msg'] = $user->get_msg();
					
					$this->render('user', 'manage', $data);
						
			}
		}
		
		public function logoutAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				default:
					
					logout();
						
					$this->render('user', 'login');
			}
		}
		
		public function loginAction()
		{	
			$action = get_response('action');
			switch ($action)
			{
				case 'login':
					$job_id = get_response('job_id');
					$password = get_response('password');
					$o_user = new user_model();
					$ret = $o_user->login($job_id, $password);
					
					$data['ret'] = $ret;
					$data['errno'] = $o_user->get_errno();
					$data['msg'] = $o_user->get_msg();
					
					echo json_encode($data);
					
					break;
					
				default:
					
					$this->render('user', 'login');
			}
		}
		
		public function signAction()
		{
			$action = get_response('action');
			switch ($action)
			{
				case 'sign':
					$name = get_response('name');
					$title = get_response('title');
					$profile = get_response('profile');
					$password = get_response('password');
					$o_user = new user_model();
					$ret = $o_user->sign($name, $password, $title, $profile);
					if(ret !== false)
					{
						$data['user_id'] = $ret;
						$data['ret'] = true;
					}
					else 
					{
						$data['ret'] = false;
					}
					
					$data['errno'] = $o_user->get_errno();
					$data['msg'] = $o_user->get_msg();
						
					echo json_encode($data);
						
					break;
						
				default:
						
					$this->render('user', 'sign');
						
			}
		}
	}
?>