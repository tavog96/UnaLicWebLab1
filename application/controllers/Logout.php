<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->has_userdata('id'))
        {
                redirect("/");
        }
        $this->session->sess_destroy();
    }

    public function index ()
    {
        redirect("/");
    }
}
