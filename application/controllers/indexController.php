<?php

	class indexController extends controller
	{
		public function indexAction()
		{
			
			$action = get_response('action');
			switch ($action)
			{
				default:
					
					
					$this->render('index', 'index');
			}
		}
		
	}