<html>
<head>
  <title>Sephine's Beauty Hub User Login  </title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bs/bootstrap.min.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">
  	body{
  		color: #4d87c5;
  		background-image: url('<?php echo base_url(); ?>assets/img/hey.jpg');

  	}
  	.row{
  		background-image: url('<?php echo base_url(); ?>assets/img/mini.jpg');
  		margin: 25px 0px 0px 5px;
  		filter:drop-shadow(8px 8px 10px #4d87c5);
  	}

  </style>
</head>

	<body>
		<?php if($this->session->flashdata('login_failed')): ?>
	      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
	    <?php endif; ?>
		
		<div class="container">;
			<?php echo form_open('users/login'); ?>
				<div class="row whole img-thumbnail">
					<div class="col-md-4  col-md-offset-4" style="border: 2px solid gray; height: 650px; padding-top: 50px; width: 300px;">
						<div class="table-primary" style="border-radius: 10px;"><h1 class="text-center" style="margin-bottom: 30px;"><b><?php echo $title; ?></b></h1></div>
						<div class="form-group table-primary"  style="border-radius: 10px;">
							<label style="margin-left: 15px;"><b>Username</b></label>
							<input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
						</div>
						<div class="form-group table-primary"  style="border-radius: 10px;">
							<label style="margin-left: 15px;"><b>Password</b></label>
							<input type="password" name="password" class="form-control" placeholder="********" required autofocus>
						</div>
						<button type="submit" class="btn btn-primary ">Login</button>
					</div>
				</div>
			<?php echo form_close(); ?>
		</div>
	
	</body>
</html>