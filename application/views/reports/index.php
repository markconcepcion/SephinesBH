<div class="container" style="padding: 15px 15px 15px 15px;">
	<div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
		<h2><?= $title; ?></h2>
	</div>
	<div>
		<table class="table table-striped">
			<tr class="table-danger" style="border: thin solid #ddd">
				<th style="max-width: 80px;">Placed By</th>
				<th style="width: 170px; max-width: 140px;">Item Quantity</th>
				<th style="width: 200px; max-width: 140px;">Price Amount</th>
				<th style="width: 300px; max-width: 140px;">Placed Date</th>
				<th>Action</th>
			</tr>
		</table>			
	</div>

	<div style="max-height: 530px; overflow: auto; border: thin solid #ddd; height: 530px; padding: 10px 10px 10px 10px;background-color: white;">
		<table class="table table-hover table-sm">
			<?php $total_amts = 0; foreach ($orders as $order) :
				$total_amts += $order->total_amt;
			?>
					<tr class="table-light">
						<th style="max-width: 160px;"><?php echo $order->user_fname.' '.$order->user_lname;	?></th>
						<th style="width: 150px; max-width: 100px;"><?php echo $order->total_qty;	?></th>
						<th style="width: 170px; max-width: 100px;"><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $order->total_amt;	?></th>
						<th style="width: 300px; max-width: 100px;"><?php echo $order->order_date; ?></th>
						<?php echo form_open('/orderlists/view_cash/'.$order->order_id); ?>
						<th>
							<ul class="nav">
								<li class="nav-item"><button class="btn btn-primary">View</button></li><?php echo form_close(); ?>
								<li class="nav-item"><a href="<?php echo site_url('/orders/void_order/'.$order->order_id); ?>" class="btn btn-warning">Void</a></li>
							</ul>
						</th>	
					</tr>
			<?php endforeach; ?>
		</table>
	</div>
	<div>
	
	</div>
 </div>



<div class="modal fade" id="view_detail_cash">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-primary">
        <h4 class="modal-title navbar-brand"><b>Order Details</b></h4>
        <button type="button" class="close navbar-brand" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </form>
</div>