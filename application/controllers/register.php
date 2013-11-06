<?php
class Register extends CI_Controller{
	public function index()
	{

		$this->load->helper('form');
		$this->load->library("form_validation");
		$this->load->model('register');
		if($this->form_validation->run()==FALSE)
		{
			$data['title']='submit';
			$this->load->view('header',$data);
			$this->load->view('register');
			$this->load->view('fooder');
		}
		else
		{
			$username=$this->input->post('username');
			$email=$this->input->post('email');
			$url='http//localhost/unique/index.php/register/validate/';
			$rand=rand(100,1000);
			$md5=md5($username.$email.$rand);
			$url=$url.$username.'/'.$md5;

			$this->register->add_mid_table($username,$email,$url,$md5);

			$data['title']='success';
			$data['password']=$this->input->post('password');
			$this->load->view('header',$data);
			$this->load->view('success',$data);
			$this->load->view('fooder');
		}	
	}
	public function validate($user,$md5)
	{
		$md5_db=$this->register->get_md5($user);
		if($md5_db==0||$md5_db!=$md5)
		{
			return FALSE;
		}
		else
		{
			$user_mes=$this->register->del_mid_table($user);
			$this->register->create_user($user_mes);
		}


}
?>
