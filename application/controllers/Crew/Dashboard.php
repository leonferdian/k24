<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller 
{

	public function __construct()
    {
        parent::__construct();
        // if (!$this->ion_auth->logged_in())
		// {
		// 	redirect('crew/login', 'refresh');
		// }
	}
	
	public function index()
	{
		$data = [
			'parent_title' => '',
			'page_title' => 'Dashboard'
		];
		$this->render($data);
	}
}
