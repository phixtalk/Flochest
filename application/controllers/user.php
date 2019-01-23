<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$data['title']="User profile";
		$data['current']="2";
		$this->utilities->check_login_status();
		$this->load->view('templates/appheader',$data);
		$this->load->view('templates/closeappheader');
		$this->load->view('templates/menulinks',$data);
		$this->load->view('user/profile');
		$this->load->view('templates/appfooter');
		$this->load->view('templates/footerscripts');
	}
}