<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index(){
		$data['title']="About Flochest";
		$data['current']="2";
		$this->load->view('templates/appheader',$data);
		$this->load->view('templates/closeappheader');
		$this->load->view('templates/menulinks',$data);
		$this->load->view('public/about');
		$this->load->view('templates/appfooter');
		$this->load->view('templates/footerscripts');
	}
}
