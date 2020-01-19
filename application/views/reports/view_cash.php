<div class="container" style=" padding: 15px 15px 15px 15px; height: 700px;">
	<div class="table-primary" style="padding: 10px 10px 10px 10px; border: 1.5px solid darkgray;">
		<h2><b><?= $title; ?></b></h2>
	</div>

	<div class="table-light" style="padding: 10px 10px 10px 10px; border: 1.5px solid darkgray;">

		<div class="container" style="overflow: auto; padding: 0px 0px 0px 0px; height: 360px; margin-bottom: 15px; border: 2px solid darkgray;">
			<table class="table table-primary">
				<tr class="table-dark">
					<th>Item Name</th>
				    <th>Description</th>
					<th>Quantity</th>
					<th>Price</th>
				</tr>

				<?php $t_qty = 0; $t_amt = 0; 
					foreach ($ol_d as $key) : 
					$t_qty += $key['ol_qty'];	
					$t_amt += $key['price']*$key['ol_qty'];	
				?>
					<tr class="table-light">
						<th><?php echo $key['item_name']; ?></th>
						<th><?php echo $key['item_description']; ?></th>
						<th><?php echo $key['ol_qty']; ?></th>
						<th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $key['price']; ?></th>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
		
		<div style="padding: 10px 10px 10px 10px; border: 2px solid darkgray;">
				<table class="table table-secondary">
					<tr>
						<th>Total Quantity: </th>
						<th><?php echo $t_qty; ?></th>
						<th>Total Amount: </th>
						<th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $t_amt; ?></th>
					</tr>
					<tr>
						<th>Placed By: </th>
						<th><?php echo $o_d['user_fname']; ?></th>
						<th>Placed On: </th>
						<th><?php echo $o_d['order_date']; ?></th>
					</tr>
				</table>
		</div>

		</div>
		<div style=" background-color: darkgray; border: 2px solid darkgray; padding: 10px 10px 10px 10px; text-align: right;">
			<a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>orders/cash_transaction">Close</a>	
		</div>
</div>