<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->library('grocery_CRUD');
	}

	public function _admin_output($output = null)
	{
		$session_data = $this->session->userdata('logged_in');
		if($session_data["role"]=="Administrator")
		{
			$this->load->view('admin.php',(array)$output);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		$this->_admin_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function penyakit()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('penyakit');
			$crud->set_field_upload('foto','assets/uploads/penyakit');
			$output = $crud->render();			
			$this->_admin_output($output);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function aturan()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('knowladge_base');
			$crud->set_relation("id_penyakit","penyakit","nama_penyakit");
			$crud->display_as("id_penyakit","Penyakit");
			$crud->callback_add_field('path',array($this,'format_path_column'));
			$crud->callback_edit_field('path',array($this,'format_path_column'));
			$output = $crud->render();
			$this->_admin_output($output);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
	
	public function format_path_column($value, $primary_key)
	{
		return "<input type='text' name='path' id='path' value='".$value."' /><a class='btn btn-info' href=\"javascript:openModal('Daftar Gejala', 'admin', 'gejala_tampil', '')\" >Daftar Gejala</a>";
	}

	public function gejala_tampil()
	{
		echo "<!DOCTYPE html><html lang='en' moznomarginboxes mozdisallowselectionprint><head>";
		echo "<link href='".base_url("assets/vendor/bootstrap/css/bootstrap.min.css")."' rel='stylesheet' type='text/css'></head>";
		echo "<div>";
		echo "<h3><center>Daftar Gejala</center></h3>";		
		$query=$this->db->query("select * from gejala")->result();
		echo "<table class='table table-striped small'>";
		echo "<tr><th>#</th><th>ID Gejala</th><th>Nama Gejala</th></tr>";
		$i=0;
		foreach($query as $row)
		{
			$i++;
			echo "<tr><td>$i</td><td>".$row->id_gejala."</td><td>".$row->nama_gejala."</td></tr>";
		}
		echo "</table>";
		echo "</div>";	
	}
	
	public function gejala()
	{
		try{
			$crud = new grocery_CRUD();
			$crud->set_table('gejala');
			$output = $crud->render();
			$this->_admin_output($output);
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}
	}
}
