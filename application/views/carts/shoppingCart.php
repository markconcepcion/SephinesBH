<style type="text/css">
		.pad{
			padding-top: 10px;
		}
		.btn span.icon {
		    background: url('<?php echo base_url();?>assets/img/addtocart.png') no-repeat;
		    float: left;
		    width:500px;
		    height: 570px;
		}
	.containers{
		margin-top: 15px;
		background-color: #f7f7f9;
		border: thin solid #ddd;
	}
	.mirow{
		max-width: 1600px;
		margin-left: 5px;
		max-height: 200px;
	}
	.thumnail{
		max-width: 31.5px;
		max-height: 31.5px
	}
	.thumbnail{
		max-width: 20px;
		max-height: 20px;
	}
	.img-thumbnail{
		border: 1px solid gray;
		max-width: 111px;
		max-height: 111px;
		margin-left: 3.5px;
		margin-right: 3.5px;
	}
	.cat{
		margin: 0px 0px 15px 0px; 
		height: 40px; 
		max-width: 350px; 
		border: 2px solid darkblue;
		border-left: 0px;
		text-indent: 100px;
	}
	.scroll{
		border: thin solid #ddd;
		padding-top: 4px;
		background-color: #ddd;
		overflow: auto;
		max-width: 850px;
 		overflow-x: hidden;
 		max-height: 500px;
		margin-left: 15px;
	}
</style>

<div class="row mirow pad"  style="padding 100px 20px 20px 20px; ">

	<div class="col-md-7">
		<div class="containers pad" style="height: 650px; background-color: #f7f7f9" >
			<div class="containers cat" style="margin-top: 15px;
    background-color: #4d87c5;
    border: thin solid #ddd;">
				<h4 style="color: white;margin-top: 10px;font-size: 14;">Available items</h4>
			</div>
			<div class="scroll" style="background-color: #ddd;">
				<ul class="nav">
					<?php foreach ($items as $item) :?>
							<li class="nav-item">
								<img class="img-thumbnail" style="max-height:114px; min-height:114px;" src="<?php echo site_url(); ?>assets/images/items/<?php echo $item['item_image']; ?>"></br>
								<?php echo form_open('carts/addtoCart'); ?>
									<div class="containers" style=" width: 111px; text-align: center; margin: 0px 3.5px 5px 3.5px; overflow: hidden;">
										<b><?php echo $item['item_name']; ?></b></br>
										<ul class="nav">
											<li class="nav-item">
												<input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
							   					<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
												<input type="number"  style="max-width: 59px; height: 38px; padding: 0px 0px 0px 6px;" class="form-control" name="quantity" placeholder="Qty" required="">
											</li>
											<li class="nav-item">
												<button type="submit" ><img class="thumnail" src="<?php echo base_url();?>assets/img/addtocart.png"></button>
											</li>
										</ul>
									</div>
								</form>
							</li>
					<?php endforeach; ?>
				</ul>
			</div>
			<?php if ($this->session->userdata('user_type') === "Admin") : ?>
			<div class="container table-secondary" style=" padding: 10px 10px 10px 17px; margin: 10px 10px 15px 15px; border: thin solid #ddd; max-width: 850px;">

			</div>
			<?php endif; ?>
		</div>
	</div>
	
	<div class="col-md-5" >
		
		<div class="containers pad" style="height: 650px; background-color: #f7f7f9">
			<div class="containers cat" style="background-color: #4d87c5;">
				<h4 style="color: white; margin-top: 3px;">Shopping Lists</h4>
			</div>

			<div style=" padding: 0px 10px 10px 10px">
				<div  class=" col-md-12" style="padding: 0px; height: 500px; max-height: 500px; overflow: hidden; border: thin solid #ddd">
					<div class="scroll" style=" padding: 0px; height: 500px; max-height: 500px; overflow: hidden; border: thin solid #ddd; background-color: #f7f7f9">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<?php echo form_open('/orderlists/deleteAll/'.$order_id); ?>
										<th style="max-width: 40px;"><b>										
											<button type="submit" class="btn btn-danger btn-sm" ><img class="thumbnail" src="<?php echo base_url();?>assets/img/trashcan.jpg">
										</button></b></th>
									</form>
									<th><h6><b>Item Name</b></h6></th>
									<th><h6><b>Qty</b></h6></th>
									<th><h6><b>Price</b></h6></th>
									<th><h6><b>Total Price</b></h6></th>
								</tr>
							</thead>	
							
							<tbody style="background-color: white; ">
								<?php $total_price = 0; ?>
								<?php foreach ($orderLists as $ol) : ?>
									<?php
										$total_price = $total_price + ($ol['ol_qty']*$ol['price']);
									?>
									<tr>
										<?php echo form_open('/orderlists/delete/'. $ol['ol_id']); ?>
										<th style="max-width: 40px;"><b>										
											<button type="submit" class="btn btn-warning btn-sm" ><img class="thumbnail" src="<?php echo base_url();?>assets/img/trashcan.jpg">
										</button></b></th>
										</form>
										<th style="max-width: 110px; overflow: hidden;"><b><?php echo $ol['item_name']; ?></b></th>
										<th style="text-indent: 10px;"><b><?php echo $ol['ol_qty']; ?></b></th>
										<th><b><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $ol['price']; ?></b></th>
										<th><b><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $ol['ol_qty']*$ol['price']; ?></b></th>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-13" style="margin: 5px 0px 0px 0px;">
					<h5 align="right"><b>Total Amount: <img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $total_price; ?></b></h5>
					<ul class="nav justify-content-end">
						<li class="nav-item">
								<button type="submit" class="btn btn-secondary" data-toggle="modal" data-target="#layawayModal">Lay Away</button>
						</li>
						 <li class="nav-item">
								<button class="btn btn-success" data-toggle="modal" data-target="#payModal">Receive Payment</button>	
							</form>
						</li>
						<li class="nav-item">
							<?php echo form_open('/orderlists/deleteAll/'. $order_id); ?>
									<button type="submit" class="btn btn-danger" >Cancel</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
 $data['id'] = $order_id;
	$data['total_price'] = $total_price;
	$this->load->view('popups/cartPopups', $data);

	if($this->session->flashdata('errMsg_input')): ?>
		<script type="text/javascript"> $(document).ready(function(){ $("#errMsg_NoInput").modal("show"); }); </script>
<?php endif; ?>
<?php if($this->session->flashdata('cfMsg_change')): ?>
	<script type="text/javascript"> $(document).ready(function(){ $("#cfMsg_Change").modal("show"); }); </script>
<?php endif; ?>
<?php if($this->session->flashdata('cfMsg_placed')): ?>
	<script type="text/javascript"> $(document).ready(function(){ $("#cfMsg_Placed").modal("show"); }); </script>
<?php endif; ?>
<?php if($this->session->flashdata('errMsg_lack')): ?>
	<script type="text/javascript"> $(document).ready(function(){ $("#errMsg_LackMoney").modal("show"); }); </script>
<?php endif; ?>

