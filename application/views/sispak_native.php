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
			$table = "aturan";
		
			error_reporting(0);			
			$filter=$_POST["filter"]; //contoh isian: 1,7,3,
			$pfilter=strlen($filter);
			$conn = new mysqli($servername, $username, $password, $dbname);
			$query = "SELECT distinct(if(trim(coalesce(substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1),''))='','-1',substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1))) as pilih FROM $table where substr(path,1,$pfilter)='$filter'";
			echo "SELECT distinct(if(trim(coalesce(substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1),''))='','-1',substr(path,$pfilter+1,locate(',',substr(path,$pfilter+1,length(path)-$pfilter))-1))) as pilih FROM $table where substr(path,1,$pfilter)='$filter'";
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
				$hasil="<font color='red'>Program tidak bisa mendeteksi penyakit pada anjing anda...";
				$i=0;
				while($r = $result->fetch_assoc())
				{
					if($i==0)
					{
						$hasil="<font color='green'>Anjing anda terdeteksi mengalami penyakit/gangguan: <br>"."- ".$r["nama_penyakit"];

					}
					else
					{
						$hasil.="<br>"."- ".$r["nama_penyakit"];					
					}
					$i++;
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
				$hasil.="<form action='".base_url("sispak/diagnosa")."' method='post' accept-charset='UTF-8'>";
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