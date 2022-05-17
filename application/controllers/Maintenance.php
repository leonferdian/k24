<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends MY_Controller 
{

	public function __construct()
    {
        parent::__construct();
	}
	
	public function index()
	{
		$data = [
            'page_title' => 'Creative Digiads',
			'parent_title' => ''
		];
        $this->render($data);
	}
}
