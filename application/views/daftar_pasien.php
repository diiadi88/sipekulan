<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Silahkan daftar terlebih dahulu</div>
                <div class="panel-body">
                    <form method="post" <?php echo form_open_multipart(site_url('Sispak/daftar_pasien')); ?>
						<div class="form-group">
							<label for="fname">Nama Pemilik</label>
							<input type="text" id="fname" class="form-control" name="nama" placeholder="Nama Pemilik">
						</div>
                        <div class="form-group">
							<label for="lname">Jenis Anjing</label>
							<input type="text" id="lname" class="form-control" name="jenis" placeholder="Jenis anjing">
                        </div>
						
                        <div class="form-group">
							<label for="gender">Jenis Kelamin Anjing</label>
							<select id="gender" class="form-control" name="gender">
								<option value="Jantan">Jantan</option>
								<option value="Betina">Betina</option>
								
							</select>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="keluhan" placeholder="Keluhan yang di derita" rows="15"></textarea>
                        </div>
					
						<div class="form-group text-center">
							<button type="submit" class="btn btn-primary btn-lg" id="submitbtn" name="submit">Diagnosa sekarang!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>