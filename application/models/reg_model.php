<?php
class Reg_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function create_user($data)
	{
		$this->db->insert('register',$data);
	}
	public function add_mid_table($usr,$psw,$email,$md5)
	{
		$data=array(
			'User'=>$user,
			'Password'=>$psw,
			'Email'=>$email,
			'Md5'=>$md5
		);
		$this->db->insert('mid_table',$data);
	}
	public function get_md5($user)
	{
		$query=$this->db->get_where('mid_table',array('User'=>$user));
		if(count($query)==0)
		{
			return 0;
		}
		else
		{
			return $query->row_array()['Md5'];
		}
	}
	public function del_mid_table($usr)
	{
		$query=$this->db->get_where('mid_table',array('User'=>$user));

		$this->db->query("DELETE FROM mid_table WHERE User='".$usr."'");
		$query=$query->row_array();
		unset($query['Md5']);
		return $query;
	}


}
?>
