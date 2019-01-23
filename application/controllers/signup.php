<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

	public function index(){
		$data['title']="Sign Up";
		$data['current']="4";
		$this->load->view('templates/appheader',$data);
		$this->load->view('templates/closeappheader');
		$this->load->view('templates/menulinks',$data);
		$this->load->view('public/signup');
		$this->load->view('templates/appfooter');
		$this->load->view('templates/footerscripts');
	}
}
