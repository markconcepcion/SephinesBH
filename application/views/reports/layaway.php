<style type="text/css">
	.data-table{
		border: thin solid #ddd;
		max-height: 420px;
		height: 420px;
		overflow-x: hidden;
	}
</style>

<div class="container" style="padding: 15px 15px 15px 15px;">
	<div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
		<h2><b><?= $title; ?></b></h2>
	</div>
	<div>
		<table class="table table-striped">
			<tr class="table-warning" style="border: thin solid #ddd;">
				<th>Placed By</th>
		      <th style="max-width: 220px; width: 220px;">Total Amount</th>
		      <th style="max-width: 300px; width: 300px;">Date</th>
				<th style="max-width: 300px; width: 300px;">Option</th>
			</tr>
		</table>
	</div>
	<div class="data-table" style="padding: 10px 10px 10px 10px;background-color: white;">
		<table class="table table-hover table-sm">
			<?php foreach ($layaways as $key) : if (!($key->tprice-$key->tpaid)>0) : ?>
				<tr class="table-light">
					<th style="max-width: 300px; width: 300px;"><?php echo "Hey Joe"; ;?></th>
					<th><?php echo $key->tprice; ;?></th>
					<th style="max-width: 320px; width: 320px;"><?php echo $key->order_date; ;?></th>
					<th><ul class="nav">
						<li class="nav-item"><button class="btn btn-primary">View</button></li><?php echo form_close(); ?>
						<li class="nav-item"><a href="<?php echo site_url('/orders/void_order/'.$key->order_id); ?>" class="btn btn-warning">Void</a></li>
					</ul></th>
				</tr>
			<?php endif; endforeach; ?>
		</table>
	</div>
</div>



