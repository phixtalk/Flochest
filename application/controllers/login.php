<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index(){
		$data['title']="Login";
		$data['current']="3";
		$this->load->view('templates/appheader',$data);
		$this->load->view('templates/closeappheader');
		$this->load->view('templates/menulinks',$data);
		$this->load->view('public/login');
		$this->load->view('templates/appfooter');
		$this->load->view('templates/footerscripts');
	}
}
