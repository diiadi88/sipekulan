<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Diagnosa Penyakit Kulit pada anjing</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url("assets/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url("assets/css/creative.min.css")?>" rel="stylesheet">

  </head>


      <div class="container">
        <div class="row">
          <div style='margin-bottom: 10%'class="col-lg-8 mx-auto">
		  <?php 
			foreach($hasil as $row){
			 
			?>
            <h2 class="section-heading text-center">Anjing anda di duga mengalami penyakit kulit <?php echo $row-> nama_penyakit ?> </h2>
            <hr class="my-4">
            <p >
			ini adalah contoh dari solusi dan gimana caranya masukin ke img ini adalah contoh dari solusi dan gimana caranya masukin ke img ini adalah contoh dari solusi dan gimana caranya masukin ke img
			
			
			<?php 
			
			}
			?>
						
			</p>
			
          </div>
        </div>
        <div class="row">
		 <h1>Dengan Gejala yang anjing anda alami sebagai berikut : </h1>
		<?php 
		foreach($gejala_terpilih as $row){
		
		?>
          <div class="col-lg-6 mx-auto ml-auto">
           
            <li><?php echo $row->nama_gejala ?></li>
          </div>
	     <?php 
		   }
		  
		 ?>
          
        </div>
      </div>
   
	</html>
