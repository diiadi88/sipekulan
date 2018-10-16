<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sispak extends CI_Controller {

	public function index()
	{
		
		$this->load->view('home');		
	}
	
	public function diagnosa()
	{
		$this->load->view('sispak_native');		
	}
	public function pasien(){
		$this->load->view('daftar_pasien');
	}	
	
	
		
	public function diagnosa_dinamis()
	{
		$query = $this->db->query("SELECT * from gejala where kategori='bentuk luka'")->result();
		$data["hasil_bl"]=$query;
		$query = $this->db->query("SELECT * from gejala where kategori='kondisi anjing'")->result();
		$data["hasil_ka"]=$query;
		$query = $this->db->query("SELECT * from gejala where kategori='daerah'")->result();
		$data["hasil_dl"]=$query;
		$query = $this->db->query("SELECT * from gejala where kategori='lingkungan'")->result();
		$data["hasil_lk"]=$query;
		$query = $this->db->query("SELECT * from gejala where kategori='luka di kulit'")->result();
		$data["hasil_ldk"]=$query;
		$this->load->view('diagnosa_dinamis',$data);
	}
	
	public function working_memory()
	{
		ksort($_POST);
		$working_memory=array();		
		$i=0;
		foreach(array_keys($_POST) as $r)
		{
			if($i>0)
			{
				$working_memory[$i]=$r;
			}
			$i++;
		}
		$hasil=implode(",", $working_memory);
		$query = $this->db->query("truncate table working_memory");
		$query = $this->db->query("INSERT INTO working_memory(path) VALUES ('".$hasil."')");
		
		
		if($query){
			//$this->diagnosa_dinamis();
			
				$hasil_pisah=explode(",",$hasil);
				$filter="1<>1";
				for($i=0;$i<count($hasil_pisah);$i++)
				{
				$filter.=" or id_gejala=".$hasil_pisah[$i];
				}
				$query_hasil = $this->db->query("SELECT id_penyakit,count(id_kb) as hasil_filter from knowladge_base where $filter group by id_penyakit")->result();
				$hasil_akhir=array();
				$i=0;
				foreach($query_hasil as $r)
				{
				$query_cek_jumlah = $this->db->query("SELECT id_penyakit,count(id_kb) as hasil_asli from knowladge_base where id_penyakit=".$r->id_penyakit)->result();
					if($query_cek_jumlah[0]->hasil_asli<=$r->hasil_filter)
					{
					$hasil_akhir[$i]=$r->id_penyakit;
					$i++;
					}
				}
			
				//EXACT//$query_hasil = $this->db->query("SELECT a.*,p.nama_penyakit,p.cara_penanganan,p.foto FROM aturan a,penyakit p WHERE a.id_penyakit=p.id_penyakit and instr('$hasil',path)")->result();
				//EXACT//$jumlah = $this->db->query("SELECT a.*,p.nama_penyakit,p.cara_penanganan,p.foto FROM aturan a,penyakit p WHERE a.id_penyakit=p.id_penyakit and instr('$hasil',path)")-> num_rows();
		    
				$penyakit_terpilih=implode(",",$hasil_akhir);
				

				if(count($hasil_akhir)>0)
				{
				$query_hasil = $this->db->query("SELECT * from penyakit where id_penyakit in ($penyakit_terpilih)")->result();
				$data["hasil"]=$query_hasil;
				$query_gejala_terpilih = $this->db->query("SELECT * from gejala where id_gejala in ($hasil)")->result();
				$data["gejala_terpilih"]=$query_gejala_terpilih;
				$this->load->view('diagnosa_hasil',$data);				
				}
				else 
				{
				echo "Maaf sistem tidak dapat mendiagnosa penyakit kulit pada anjing anda";
				}
			
			
			

			
			
		}
		
		
	}	
	public function daftar_pasien()
	{
		$nama =  $this->input->post('nama');
		$jenis =  $this->input->post('jenis');
		$gender =  $this->input->post('gender');
		$keluhan =  $this->input->post('keluhan');
		$date = date("Y/m/d");
		
		$query = $this->db->query("INSERT INTO pasien(nama_pemilik,jenis_anjing,jenis_kelamin,keluhan,tanggal_diagnosa) VALUES ('".$nama."','".$jenis."','".$gender."','".$keluhan."','".$date."')");
		if($query){
			$this->diagnosa_dinamis();
			
			
		}
	}
}

	
