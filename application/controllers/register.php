<?php
class Register extends CI_Controller{
	public function submit()
	{

		$this->load->helper('form');
		$this->load->library("form_validation");
		$data['title']='submit';
		$this->load->view('header',$data);
		$this->load->view('register');
		$this->load->view('fooder');
	}
}
?>
