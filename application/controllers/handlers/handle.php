<?php

class Handle extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->form_validation->set_error_delimiters('', '<br>');		
	}	
	var $nextURL = NULL;
	
    public function getNextURL() {
        return $this->nextURL;
    }

    public function setNextURL($nextURL) {
        $this->nextURL = $nextURL;
    }
	
	public function register(){//HANDLES ACCOUNT CREATION
		
		$this->setNextURL(base_url("signup"));
		
		$this->form_validation->set_rules('fullnames', 'Full Names', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'trim|required|is_unique[userbase.phone]');
		$this->form_validation->set_rules('email', 'User Email', 'trim|required|valid_email|is_unique[userbase.email]');
		$this->form_validation->set_rules('birthday', 'Birthday', 'trim|required');
		$this->form_validation->set_rules('pasword', 'Password', 'trim|required|min_length[5]|max_length[20]|matches[confirmpass]');
		
		$this->form_validation->set_rules('subscription', 'Subscription', 'trim|required');
		$this->form_validation->set_rules('deliverydate', 'Delivery Date', 'trim|required');
		$this->form_validation->set_rules('deliveryaddress', 'Delivery Address', 'trim|required');
		
		$this->session->set_flashdata('accountpost', $this->input->post());
		
		if ($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('flag','alert');
			$this->session->set_flashdata('message',validation_errors());
		} else {
			$this->load->library('email');
			
			$fullnames = $this->input->post('fullnames');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$birthday = $this->input->post('birthday');
			$pasword = sha1($this->input->post('pasword'));
			$subscription = $this->input->post('subscription');
			$deliverydate = $this->input->post('deliverydate');
			$deliveryaddress = $this->input->post('deliveryaddress');
			$brands = $this->input->post('brands');
			$count = count($brands);
			$mybrands = "";
			if($this->input->post('brands')!=""){
				for($e=0; $e < $count; $e++){
					$mybrands.=$brands[$e].(($count-$e)>1?",":"");	
				}
				//echo $count;exit;
				//next create user account
				$data = array(
				   'fullnames' => $fullnames ,
				   'phone' => $phone ,
				   'email' => $email ,
				   'pass' => $pasword ,
				   'birthday' => $birthday ,
				   'subscription' => $subscription ,
				   'deliverydate' => $deliverydate ,
				   'deliveryaddress' => $deliveryaddress ,
				   'brands' => $mybrands ,
				   'createdon' => date("Y-m-d H:i:s") ,
				   'modifiedon' => date("Y-m-d H:i:s")
				);
				
				if($this->db->insert('userbase', $data)){
					
					$body = "Hello ".$fullnames.", <br>Thank you for signing up to Flochest, Your number one period box delivery service.<br>Please complete your subscription to enjoy all of our services.";
					$message = $this->utilities->custom_email_template($body,$email);
					@$this->email->from('info@flochest.com', 'Flochest');
					@$this->email->to($email);
					$this->email->cc("hope.presenter@gmail.com");
					$this->email->bcc("ofoefule.c@gmail.com");
					@$this->email->subject('Flochest Registration');
					@$this->email->message($message);				
					@$this->email->send();
					
					$this->session->set_flashdata('flag','success');
					$this->session->set_flashdata('message','Your subscription was successful. Please complete by adding a payment method');
					
					$uid = $this->db->insert_id();
					$newdata = array(
					   'id'  		=> $uid,
					   'usernames'  => $fullnames,
					   'email'  	=> $email,
					   'status'  	=> 1,
					   'phone'   => $phone,
					   'birthday'=> $birthday,
					   'subscription'=> $subscription,
					   'deliverydate'   => $deliverydate,
					   'deliveryaddress' => $deliveryaddress,
					   'brands' => $mybrands,
					   'createdon'=> date("Y-m-d H:i:s"),
					   'modifiedon'=> date("Y-m-d H:i:s"),
					   'logged_in' => TRUE
					);
					$this->session->set_userdata($newdata);
					$this->setNextURL(base_url("user/"));
				}else{
					$this->session->set_flashdata('flag','failure');
					$this->session->set_flashdata('message','Something went wrong. Please try again later');
				}
			}else{
				$this->session->set_flashdata('flag','alert');
				$this->session->set_flashdata('message','Please select a brand for your subscription.');
			}
		}
		redirect($this->getNextURL());	
	}
	public function login(){//HANDLES LOGIN ACTION
		$this->load->model(array('user'));
		
		//$this->load->library(array('mobile_detect'));
		 
		if($this->input->post('redir')!=""&&$this->input->post('nxturl')!=""){			
			$this->setNextURL(base_url('?redir=true&nxturl='.$this->input->post('nxturl')));
		}else{
			$this->setNextURL(base_url("login"));
		}

		if(trim($this->input->get_post('loginid'))==""||trim($this->input->get_post('password'))==""){
			$this->session->set_flashdata('flag','alert');
			//$this->session->set_flashdata('message',validation_errors());
			$this->session->set_flashdata('message','Please enter all required fields to login');
			$this->session->set_flashdata('loginpost', $this->input->post());
		}else{
			$userid = "";
			$userpass = "";
			$userid = $this->input->get_post('loginid');
			$userpass = sha1($this->input->get_post('password'));
			//echo $userid." - ".$userpass; exit;
			$userlogin = $this->user->get_login_user($userid,$userpass);
			$layout="";			
			if (count($userlogin) > 0){
				foreach ($userlogin as $row){
					$newdata = array(
					   'id'  		=> $row->id,
					   'usernames'  => $row->fullnames,
					   'email'  	=> $row->email,
					   'status'  	=> $row->astatus,
					   'phone'   => $row->phone,
					   'birthday'=> $row->birthday,
					   'subscription'=> $row->subscription,
					   'deliverydate'   => $row->deliverydate,
					   'deliveryaddress' => $row->deliveryaddress,
					   'brands' => $row->brands,
					   'createdon'=> $row->createdon,
					   'modifiedon'=> $row->modifiedon,
					   'logged_in' => TRUE
					);
				}
				$this->session->set_userdata($newdata);
				//check if remember me is set			
			   	if($this->input->post('remember')!=""){
					$exp=time()+60*60*24*365;
					$this->input->set_cookie('fcuser', $this->input->post('loginid'), $exp);
					$this->input->set_cookie('fcpass', $this->input->post('password'), $exp);
				}
				
				//check if redir url is set
				if($this->input->post('redir')!=""&&$this->input->post('nxturl')!=""){
					$this->setNextURL($this->input->post('nxturl'));
				}else{
					$this->setNextURL(base_url("user/"));
				}
			}else{
				$this->session->set_flashdata('flag','alert');
				$this->session->set_flashdata('message','Email or Password is incorrect.<br>If you forgot your password, <a title="request for a password reset" href="#" id="password_reset_show" style="color:#000;text-decoration:underline">Click Here</a> to reset it.');
				$this->session->set_flashdata('loginpost', $this->input->post());
			}
		}
		redirect($this->getNextURL());
	}/* End of login Method */
	public function logout(){
		//log users as loggedout in db
		/*
		$updata = array('loggedin' => 0);
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('users', $updata);
		*/
		$this->session->sess_destroy();
		session_destroy();//Then destroy all sessions
		$this->setNextURL(base_url("login"));
		redirect($this->getNextURL());
	}
}