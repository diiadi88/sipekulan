<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
		<link href="bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url("assets/font-awesome-4.6.3/css")?>/font-awesome.min.css" rel="stylesheet" type="text/css">
	</head>
	<body style="padding: 10px">
		<?php
		echo form_open('login/verify'); 		
		?>
		<div class="container col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-3 col-md-6 col-lg-offset-4 col-lg-4">
			<br />
			<div class="panel panel-default">
				<div class="panel-heading">
					<h1><img src="<?php echo base_url(); ?>assets/images/keys.ico" height="100" width="100" alt=""> Login</h1>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-user" style="width: auto"></i>
							</span>
							<input id="username" runat="server" type="text" class="form-control" name="username" placeholder="Username" required />
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fa fa-lock" style="width: auto"></i>
							</span>
							<input id="password" runat="server" type="password" class="form-control" name="password" placeholder="Password" required />
						</div>
					</div>
					<button id="btnLoginClassic" runat="server" class="btn btn-default" style="width: 100%">LOGIN <i class="fa fa-check-square-o"></i></button>
				</div>
			</div>
		</div>
		<?php
		$string="<div style='clear: both'>";
		echo form_close($string);
		?>
</body>
</html>
