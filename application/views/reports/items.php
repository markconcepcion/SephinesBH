<style type="text/css">
	.data-table{
		border: 2px solid darkgray;
		max-height: 470px;
		overflow-x: hidden;
	}
</style>
<div class="container" style="padding: 15px 15px 15px 15px;">
	<div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd">
		<h2><b><?= $title; ?></b></h2>
	</div>
	<div>
		<table class="table table-striped">
			<tr class="table-warning" style="border: 2px solid gray;">
				<th>Item Name</th>
				<th>Sold Quantity</th>
				<th>Recent Date</th>
			</tr>
		</table>
		
		<div class="data-table">
			<table class="table table-hover table-sm">
				<?php foreach ($items as $key) :   ?>
					<tr class="table-light">
						<th style="max-width: 100px; overflow: hidden;"><?php echo $key->item_name; ?></th>
						<th style="width: 350px; margin-left: 20px;"><?php echo $key->sold_qty; ?></th>
						<th>Christmas</th>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>	
	<div class="container" style="padding: 10px 10px 10px 10px; border: thin solid #ddd background-color: darkgray">
		<div class="row">
			<div class="col-md-6">
				
			</div>
			<div class="col-md-6" style="text-align: right;"><a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>">Close</a></div>
		</div>
	</div>
</div>
