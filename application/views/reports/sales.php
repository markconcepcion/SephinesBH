<div class="container" style="padding: 15px 15px 15px 15px;">
	<div class=" container table-primary" style="padding: 10px 0px 10px 10px; border: 1.5px solid darkgray;">
		<h2><b><?= $title; ?></b></h2>
	</div>

	<div>
		<table class="table table-striped">
			<tr class="table-dark" style="border: 2px solid gray;">
				<th>Placed By</th>
				<th>Customer</th>
				<th>Pay Type</th>
				<th>Order Amount</th>
				<th>Placed On</th>
			</tr>
		</table>
	</div>

	<div style="max-height: 550px; height: 550px; border: 2px solid darkgray;">
		<table class="table table-hover" >
			<?php $ta = 0; 
			foreach ($orders as $key) :
			$ta += $key->total_amt; ?>
				<tr class="table-light">
					<th style="width: 210px; max-width: 210px;"><?php echo $key->user_fname; ?></th>
					<th style="width: 200px; max-width: 200px;"><?php echo $key->cus_name; ?></th>
					<th style="width: 200px; max-width: 200px;"><?php echo $key->order_method; ?></th>
					<th style="width: 250px; max-width: 250px;"><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $key->total_amt; ?></th>
					<th><?php echo $key->order_date; ?></th>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div class=" container table-dark" style="padding: 10px 10px 10px 10px; border: 1.5px solid darkgray; text-align: right;">
		<div class="row">
			<div class="col-md-6"><h1 style="color: white;"></h1></div>
			<div class="col-md-6"><a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>">Close</a></div>
		</div>
	</div>
</div>