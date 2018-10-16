<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $this->load->view('login');
  }
  
  public function verify()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('username', 'Username', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
    if($this->form_validation->run() == FALSE)
    {
      //$this->load->view('login');
      redirect('login', 'refresh');
    }
    else
    {
      redirect('admin', 'refresh');
    }
  }  

  function check_database($password)
  {
    $username = $this->input->post('username');
    $query = $this->db->query("select * from user where username='$username' and password=md5('$password')");
    $row = $query->result();
    if($row)
    {
		$sess_array = array();
		$sess_array = array('username' => $row[0]->username, 'fullname' => $row[0]->fullname, 'password' => md5($password), 'role' => $row[0]->role);
		$this->session->set_userdata('logged_in', $sess_array);
		return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Username dan Password salah...');
      return FALSE;
    }
  }
  
  function logout()
  {
    $this->session->unset_userdata('logged_in');
    redirect('login', 'refresh');
  }
}
?>