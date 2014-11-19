<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {


	public function feed()
	{
		$this->load->view('layouts/header');
        $this->load->view('feed');
        $this->load->view('layouts/footer');
	}
}

