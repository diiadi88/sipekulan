<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<link href="<?php echo base_url("assets/bootstrap.min.css")?>" rel="stylesheet" type="text/css">
	</head>
	<body style="padding: 10px">
		
		<?php
			$servername = $this->db->hostname;
			$username = $this->db->username;
			$password = $this->db->password;
			$dbname = $this->db->database;
			$table = "aturan_dinamis";
		
			error_reporting(0);			
			$filter=$_POST["filter"]; //contoh isian: 1,7,3,
			$pfilter=strlen($filter);
			if(isset($_POST["prioritas"]))
			{
				$prioritas=$_POST["prioritas"]; //contoh isian: 1,7,3,
			}
			else
			{
				$prioritas=1;
			}
			$conn = new mysqli($servername, $username, $password, $dbname);
			$query = "SELECT distinct(if(trim(coalesce(substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1),''))='','-1',substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1))) as pilih FROM $table where prioritas=$prioritas and substr(path,1,$pfilter)='$filter' ";
			echo "SELECT distinct(if(trim(coalesce(substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1),''))='','-1',substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1))) as pilih FROM $table where prioritas=$prioritas and substr(path,1,$pfilter)='$filter'";
			$result = $conn->query($query);
			$rows = array();
			while($r = $result->fetch_assoc())
			{
				$rows[] = $r;
			}
			
			
			echo "<pre>Path: $filter</pre>";
			if(strpos($filter,"-1")!==false || $rows[0]["pilih"]=="-1")
			{
				$filter=str_replace("-1,", "", $filter);
				$filter.="0";
				$query = "SELECT * from penyakit where id_penyakit in (select id_penyakit from $table where path='$filter')";			
				$result = $conn->query($query);
				$hasil="<form action='".base_url("sispak/diagnosa_awal")."' method='post' accept-charset='UTF-8'><input type='hidden' name='prioritas' value='".($_POST["prioritas"]+1)."'><button class='btn btn-success' type='submit' value='Submit'>Lanjut Prioritas ".($_POST["prioritas"]+1)."</button></form>";
				while($r = $result->fetch_assoc())
				{
					$query2 =  $this->db->query("SELECT acuan from aturan_dinamis where prioritas=$prioritas")->result();								
					$hasil="<form action='".base_url("sispak/diagnosa_stage2")."' method='post' accept-charset='UTF-8'><input type='hidden' name='acuan' value='".$query2[0]->acuan."'><button class='btn btn-success' type='submit' value='Submit'>Lanjut Stage 2, acuan ".$query2[0]->acuan."</button></form>";
				}
				echo $hasil."</font><br><a class='btn btn-info' href='".base_url("sispak")."'>Reset</a>";
				return;
			}
			else
			{
				$hasil="";
				if(count($rows)==2)
				{
					if($rows[0]["pilih"]>$rows[1]["pilih"])
					{
						$pertanyaan=$rows[0]["pilih"];
					}
					else
					{
						$pertanyaan=$rows[1]["pilih"];
					}
				}
				else
				{
					$pertanyaan=$rows[0]["pilih"];
				}
				
				$query = "SELECT * from gejala where id_gejala=".$pertanyaan;
				$result = $conn->query($query);
				while($r = $result->fetch_assoc())
				{
					$hasil.="Apakah: ".$r["nama_gejala"]."?";
				}
				if(count($rows)==2)
				{
					if($rows[0]["pilih"]>$rows[1]["pilih"])
					{
						$pYa=$rows[0]["pilih"];
						$pTidak=$rows[1]["pilih"];						
					}
					else
					{
						$pYa=$rows[1]["pilih"];
						$pTidak=$rows[0]["pilih"];						
					}
				}
				else
				{
					$pYa=$rows[0]["pilih"];
					$pTidak="-1";
				}
				echo "<pre>Ya: $pYa, Tidak: $pTidak</pre>";
				$hasil.="<form action='".base_url("sispak/diagnosa_awal")."' method='post' accept-charset='UTF-8'>";
				$hasil.="<input type='hidden' name='prioritas' value='$prioritas'>";					
				$hasil.="<br><input type='radio' name='filter' value='".$filter.$pYa.",' checked> Ya";
				$hasil.="<br><input type='radio' name='filter' value='".$filter.$pTidak.",'> Tidak";
				if($filter!==null)
				{
					$hasil.="<br><a class='btn btn-danger' href='javascript: history.go(-1)'>Kembali</a> <button class='btn btn-success' type='submit' value='Submit'>Lanjut</button> <a class='btn btn-info' href='".base_url("sispak/diagnosa")."'>Reset</a>";
				}
				else
				{
					$hasil.="<br><a class='btn btn-danger' href='".base_url()."'>Kembali</a> <button class='btn btn-success' type='submit' value='Submit'>Lanjut</button> <a class='btn btn-info' href='".base_url("sispak/diagnosa")."'>Reset</a>";					
				}
				$hasil.="</form>";
				echo $hasil;				
			}
		?>
	</body>
</html>