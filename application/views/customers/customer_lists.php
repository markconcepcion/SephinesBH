<style type="text/css">
	.thumnail{
		max-width: 31.5px;
		max-height: 26px
	}
	.name{
		overflow: hidden;
		max-width: 270px;
		width: 270px;
		min-width: 100px;
		overflow: hidden;
	}
	.amount{
		max-width: 180px;
		width: 180px;
		min-width: 110px;
		text-align: center;

	}
	.view{
		max-width: 320px;
		width: 320px;
		min-width: 160px;
		text-align: center;
		border-right-color:
		
	}
</style>

<div class="container" style="padding: 15px 15px 15px 15px;">
			<div class="table-primary " style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
				<div class="row"> 
					
				<div class="col-md-4" >
					<h1><?= $title; ?></h1>
				</div>
				<div class="col-md-8">
					<?php echo form_open('customers/searchLists'); ?>
					<div class="form-inline my-2 my-lg-0" style="padding-right: 30px; float: right;">
				      <input class="form-control mr-sm-2" type="text" id="inputsearch" name="inputsearch" placeholder="Search" />
				      <button class="btn btn-success my-2 my-sm-0"  type="submit" id="buttonsearch">Search</button>
				    </div></form>
				</div>
				</div>
			</div>
	 	
	 	<div>
					<table class="table table-striped">
						<tr class="table-success" style="border: thin solid #ddd;">
						    <th class="name">Name</th>
						    <th class="amount">Amount Needed</th>
						    <th class="amount">Amount Paid</th>
						    <th class="amount">Remaining Balance</th>
						    <th class="view">Action</th>
						</tr>
					</table>
			</div>

			<div style="height: 465px;  margin-bottom: 15px;">
				<div class="scroll" style="overflow-x: hidden; max-height: 465px; margin-bottom: 15px; height: 465px; background-color: white; border: thin solid #ddd;">
					<table class="table table-hover table-sm">
						<tbody>
							<?php foreach($cus_array as $r): ?>
								<?php if (($r->tprice-$r->tpaid)>0) : ?>
								<tr class="table-light">
								  <?php echo form_open('customers/view_record/'. $r->cus_id); ?>
							    <th class="name"><?php echo $r->cus_name; ?></th>
							    <th class="amount"><img class="thumnail" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $r->tprice; ?></th>
							    <th class="amount"><img class="thumnail" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $r->tpaid; ?></th>
							    <th class="amount"><img class="thumnail" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $r->tprice-$r->tpaid; ?></th>
									 <th class="view">
									  <input type="hidden" name="cus_name" value="<?php echo $r->cus_name; ?>">
										<input type="hidden" name="cus_number" value="<?php echo $r->cus_contactNo; ?>">
										<input type="hidden" name="cus_address" value="<?php echo $r->cus_address; ?>">
										<input type="hidden" name="cus_amount" value="<?php echo $r->tprice; ?>">
										<ul class="nav">
										  <li class="nav-item"><?php if ($this->session->userdata('user_type') === "Admin") : ?>
										  	<button type="submit" class="btn btn-primary">View Records</button><?php endif; ?>&nbsp;
										  </li>
								  		</form>
											<li class="nav-item">
												<button class="pay_bal btn btn-success" data-toggle="modal" data-target="#payModal"
												data-id="<?php echo $r->order_id; ?>" data-amt="<?php echo $r->tprice; ?>" data-pd="<?php echo $r->tpaid; ?>"
 												>Receive Payment</button>
											</li>
									  </ul>
								  </th>
							 </tr>
							 <?php endif; ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
			<div style=" background-color: darkgray; border: 2px solid darkgray; padding: 10px 10px 10px 10px; text-align: right;">
			<a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>">Close</a>	
		</div>

</div>

<script type="text/javascript"> 
  $(document).ready(function(){ 
    $(".pay_bal").click(function(){
      var cat_id = $(this).data('id');
      var amt = $(this).data('amt');
      var price = $(this).data('pd');
      var total = amt-price;

      document.getElementById("p1").innerHTML = total;
      $('#catId').val( cat_id )
      $('#ttl_amt').val( total )
    }); 
  }); 
</script>


<div class="modal fade" id="payModal">
 <?php echo form_open('payments/add_payment'); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
        <div class="modal-header">
          <h4 class="modal-title navbar-brand"><b>Add Payment (Layaway)</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </nav>
        <div class="modal-body">
        	<div>
        		<ul class="nav">
        			<li class="nav-item"><h5 align="right"><b>Remaining Balance: </b></h5></li>
        			<li class="nav-item"><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"></li>
        			<li class="nav-item"><h5><b><p id="p1"></p></b></b></h5></li>
        		</ul>
        	</div>
          <div class="form-group">
         		
         		<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
         		<input type="hidden" name="re_bal" id="ttl_amt" value="">
         		<input type="hidden" name="order_id" id="catId" value="">
     		    <input type="number" name="amount" class="form-control" placeholder="Enter Payment Amount"> 	
       	  </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
 </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>


<!-- <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="line-height:4;">
	  <a class="navbar-brand" href="<?php echo base_url(); ?>Main/Home">BUDGET ALLOCATOR SYSTEM</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarColor02">
	    <ul class="navbar-nav mr-auto" style="margin-left: auto !important; ">
	      <li class="nav-item active">
	        <a class="nav-link" href="<?php echo base_url('Main/Home'); ?>"><i class="fa fa-home fa-fw"></i>
					&nbsp;Home<span class="sr-only">(current)</span></a>
	      </li>
				<li class="nav-item">
					<a class="nav-link"><i class="fa fa-user fa-fw" aria-hidden="true"></i>&nbsp;
					<?php echo $this->session->userdata('user_name'); ?></a>
				</li>
				<li class="nav-item">
					<a class="nav-link"><i class="fa fa-edit fa-fw" aria-hidden="true"></i>&nbsp;
					<?php echo $this->session->userdata('level'); ?></a>
				</li>

				<?php if ($this->session->userdata('level') === "BUDGET HEAD") : ?>
					<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Main/Database_view'); ?>">
						<i class="fa fa-database fa-fw"></i>&nbsp;Database<span class="sr-only">(current)</span></a>
					</li><?php endif; ?> 

				<li class="nav-item">
	      	<a class="nav-link" href="<?php echo base_url('Main/Logout'); ?>">&nbsp;Logout<span class="sr-only">(current)</span></a>
	      </li>
				
	    </ul>
	  </div>
	</nav> -->