<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
	<script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<link href="<?php echo base_url("assets/vendor/jquery-ui.css")?>" rel="stylesheet" type="text/css">
<script src="<?php echo base_url("assets/vendor/jquery-ui.js")?>" type="text/javascript"></script>
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
<body onload="openTipe(event, 'penyakit')">
	<div class="container">
	<ul class="tab">
		<li><a href='<?php echo site_url('admin/penyakit')?>'>Penyakit</a></li> 
		<li><a href='<?php echo site_url('admin/gejala')?>'>Gejala</a></li> 
		<li><a href='<?php echo site_url('admin/aturan')?>'>Aturan</a></li> 
		<li><a href='<?php echo site_url('login/logout')?>' style="margin-left : 1180%">Logout</a></li> 
	</ul>
	</div>
	<div style='height:20px;'></div>  
    <div>
		<?php echo $output; ?>
    </div>
</body>
</html>
