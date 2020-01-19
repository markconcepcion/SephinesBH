<style type="text/css">
  .thumbnailed{
    max-width: 43px;
    max-height: 43px
  }
</style>

<!-- MODAL for Cash Payment -->
<div class="modal fade" id="payModal">
 <?php echo form_open('carts/recordCash'); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php if($total_price > 0): ?>
      <nav class="navbar-dark bg-primary">
        <div class="modal-header">
          <h4 class="modal-title navbar-brand"><b>Receive Payment (Cash)</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </nav>
        <div class="modal-body">
          <h5 align="right"><b>Total Amount: <img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $total_price; ?></b></h5>
          <div class="form-group">
         		<input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
						<input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
     		    <input type="number" name="amount" class="form-control" placeholder="Enter Payment Amount"> 	
       	  </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      <?php endif; ?>
      <?php if($total_price < 1): ?>
      <nav class="navbar-dark bg-primary">
        <div class="modal-header">
          <h4 class="modal-title navbar-brand"><b>Order Needed!!</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      </nav>
        <div class="modal-body">
          <h1>Sorry, You Still Haven't Order Anything!!</h1>
        </div>
      <?php endif; ?>
    </div>
  </div>
 </form>
</div>

<!-- MODAL for Layaway Form-->
<div class="modal fade" id="layawayModal">
 <?php echo form_open('carts/recordLayAway'); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <?php if($total_price > 0): ?>
        <nav class="navbar-dark bg-primary">
        <div class="modal-header">
          <h4 class="modal-title navbar-brand"><b>Lay Away Payment</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        </nav>
        <div class="modal-body">
          <div class="form-group">
            <label><b>Name</b></label>
            <input type="text" name="cus_name" class="form-control" placeholder="Enter Name" required="">   
          </div>
          <div class="form-group">
            <label><b>Contact NO.</b></label>
            <input type="number" name="cus_no" class="form-control" placeholder="Enter Contact Number" required="">   
          </div>
          <div class="form-group">
            <label><b>Address</b></label>
            <input type="text" name="cus_add" class="form-control" placeholder="Enter Address" required="">   
          </div>
          <h5 align="right"><b>Total Amount: <img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $total_price; ?></b></h5>
          <div class="form-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="user_id" value="<?php echo $this->session->userdata('user_id'); ?>">
            <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
            <input type="number" name="amount" class="form-control" placeholder="Enter Payment Amount">   
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      <?php endif; ?>
      <?php if($total_price < 1): ?>
        <nav class="navbar-dark bg-primary">
        <div class="modal-header">
          <h4 class="modal-title navbar-brand"><b>Order Needed!!</b></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        </nav>
        <div class="modal-body">
          <h1>Sorry, You Still Haven't Order Anything!!</h1>
        </div>
      <?php endif; ?>
    </div>
  </div>
 </form>
</div>

<!-- MODAL for Errors -->
<div class="modal fade" id="cfMsg_Change">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h4 class="modal-title navbar-brand"><b>Change</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </nav>
      <div class="modal-body">
        <?php  if($this->session->flashdata('cfMsg_change')) { ?>
        <h1>Your Change is <img class="thumbnailed" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $this->session->flashdata('cfMsg_change'); ?></h1>
        <?php } ?>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<div class="modal fade" id="errMsg_LackMoney">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h4 class="modal-title navbar-brand"><b>Insufficient Money!!</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </nav>
      <div class="modal-body">
        <h1>Your Money is not Enough!!</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="errMsg_NoInput">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h4 class="modal-title navbar-brand"><b>Payment Needed!!</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </nav>
      <div class="modal-body">
        <h1>You Need to Pay!!</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cfMsg_Placed">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h4 class="modal-title navbar-brand"><b>Order Placed!!</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </nav>
      <div class="modal-body">
        <h1>Thank You for Shopping in Sephine's Beauty Hub</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>