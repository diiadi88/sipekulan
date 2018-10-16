<script src="<?php echo base_url("assets/vendor/jquery.min.js")?>" type="text/javascript"></script>
<script src="<?php echo base_url("assets/vendor/jquery-ui.js")?>" type="text/javascript"></script>
<link href="<?php echo base_url("assets/vendor/jquery-ui.css")?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url("assets/vendor/bootstrap.min.js")?>" type="text/javascript"></script>
<link href="<?php echo base_url("assets/vendor/bootstrap.min.css")?>" rel="stylesheet" type="text/css">

<style>

body {font-family: "Lato", sans-serif;}

ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}

@-webkit-keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}
</style>
</head>
<body onload="openTipe(event, 'bl')">
	<div class="container">	

		<ul class="tab">
			<li><a href="#" class="tablinks" onclick="openTipe(event, 'bl')">Bentuk luka</a></li>
			<li><a href="#" class="tablinks" onclick="openTipe(event, 'dl')">Daerah luka</a></li>
			<li><a href="#" class="tablinks" onclick="openTipe(event, 'ka')">Kondisi anjing</a></li>
			<li><a href="#" class="tablinks" onclick="openTipe(event, 'ldk')">Luka di kulit</a></li>
			<li><a href="#" class="tablinks" onclick="openTipe(event, 'lk')">Lingkungan</a></li>

		</ul>
		<form <?php echo form_open_multipart(site_url('Sispak/working_memory')); ?>
			
		<div id="bl" class="tabcontent">
			<h3>Bentuk luka</h3>
			<?php
			if(isset($hasil_bl))
			{
				if(count($hasil_bl)>0)
				{
					$i=0;
					echo "<table class='table table-striped'>";
					foreach($hasil_bl as $h)
					{		
						echo "<tr><td>".($i+1)."</td><td><input type='checkbox' name='".$h->id_gejala."'></td><td><p>".$h->nama_gejala."</p></td></tr>\n";
						$i++;
					}
					echo "</table>";
				}
			}
			?> 			
		</div>

		<div id="dl" class="tabcontent">
			<h3>Daerah Luka</h3>
			<?php
			if(isset($hasil_dl))
			{
				if(count($hasil_dl)>0)
				{
					$i=0;
					echo "<table class='table table-striped'>";
					foreach($hasil_dl as $h)
					{		
						echo "<tr><td>".($i+1)."</td><td><input type='checkbox' name='".$h->id_gejala."'></td><td><p>".$h->nama_gejala."</p></td></tr>\n";
						$i++;
					}
					echo "</table>";
				}
			}
			?> 		 			
		</div>

		<div id="ka" class="tabcontent">
			<h3>Kondisi Anjing</h3>
			<?php
			if(isset($hasil_ka))
			{
				if(count($hasil_ka)>0)
				{
					$i=0;
					echo "<table class='table table-striped'>";
					foreach($hasil_ka as $h)
					{		
						echo "<tr><td>".($i+1)."</td><td><input type='checkbox' name='".$h->id_gejala."'></td><td><p>".$h->nama_gejala."</p></td></tr>\n";
						$i++;
					}
					echo "</table>";
				}
			}
			?> 	 			
		</div>
		<div id="ldk" class="tabcontent">
			<h3>Luka di kulit</h3>
			<?php
			if(isset($hasil_ldk))
			{
				if(count($hasil_ldk)>0)
				{
					$i=0;
					echo "<table class='table table-striped'>";
					foreach($hasil_ldk as $h)
					{		
						echo "<tr><td>".($i+1)."</td><td><input type='checkbox' name='".$h->id_gejala."'></td><td><p>".$h->nama_gejala."</p></td></tr>\n";
						$i++;
					}
					echo "</table>";
				}
			}
			?> 				
		</div>
		<div id="lk" class="tabcontent">
			<h3>Lingkungan</h3>
			<?php
			if(isset($hasil_lk))
			{
				if(count($hasil_lk)>0)
				{
					$i=0;
					echo "<table class='table table-striped'>";
					foreach($hasil_lk as $h)
					{		
						echo "<tr><td>".($i+1)."</td><td><input type='checkbox' name='".$h->id_gejala."'></td><td><p>".$h->nama_gejala."</p></td></tr>\n";
						$i++;
					}
					echo "</table>";
				}
			}
			?> 	
				<input type='submit' name='btnSubmit' value='Diagnosa'>
			
		</div>
		
		</form>

		<script>
		function openTipe(evt, tipeName) {
			var i, tabcontent, tablinks;
			tabcontent = document.getElementsByClassName("tabcontent");
			for (i = 0; i < tabcontent.length; i++) {
				tabcontent[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablinks");
			for (i = 0; i < tablinks.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" active", "");
			}
			document.getElementById(tipeName).style.display = "block";
			evt.currentTarget.className += " active";
		}
		</script>
	</div>
</body>