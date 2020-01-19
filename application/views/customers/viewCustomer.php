
<style type="text/css">
  .scroll{
    overflow: auto;
    overflow-x: hidden;
    height: 310px;
  }
</style>
  
  <div class="container" style=" padding: 10px 10px 10px 10px; height: 670px;">
    <div class="table-primary" style="padding: 10px 10px 10px 10px; border: 1.5px solid darkgray;">
      <h2><b><?= $title; ?></b></h2>
    </div>
    <div style="padding: 10px 10px 10px 10px; border: 2px solid darkgray;">
      <table class="table table-secondary">
        <tr>
          <th>Contact No: </th>
          <th><?php echo $number; ?></th>
          <th>Address: </th>
          <th><?php echo $address; ?></th>
        </tr>
        <tr>
          <th>Placed By: </th>
          <th></th>
          <th>Placed On: </th>
          <th><?php echo $users['user_fname']; ?></th>
        </tr>
      </table>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="container" style="overflow: auto; padding: 0px 0px 0px 0px; height: 300px; margin-bottom: 15px; border: 2px solid darkgray;">
          <div class="table-light" style="padding: 10px 10px 10px 10px; height: 300px; border: 1.5px solid darkgray;">
            <table class="table table-primary table-sm">
              <tr class="table-dark">
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
              </tr>
              <?php
                $qty=0; $t_itemprice = 0; 
                foreach ($orderlists as $r):
                $qty += $r['ol_qty']; $t_itemprice += $r['price']; 
              ?>
                <tr class="table-light">
                  <th style="max-width: 50px; overflow: hidden;"><?php echo $r['item_name']; ?></th>
                  <th><?php echo $r['ol_qty']; ?></th>
                  <th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $r['price']; ?></th>
                </tr>
              <?php endforeach; ?>
            </table>
          </div>
        </div>
        <div class="">
          <table class="table table-dark ">
              <tr>
                <th>Total Item Quantity</th>
                <th><?php echo $qty ?></th>
              </tr>
              <tr>
                <th>Total Order Amount</th>
                <th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $amount; ?></th>
              </tr>
          </table>
        </div>
      </div>
    
      <div class="col-md-6">
        <div class="container" style="overflow: auto; padding: 10px 10px 10px 10px; height: 300px; margin-bottom: 10px; border: 2px solid darkgray;">
          <table class="table table-striped table-sm">
            <tr class="table-dark">
              <th>Amount Paid</th>
              <th>Pay Date</th>
            </tr>
            <?php $amt_pd = 0;
              foreach ($payments as $pay): 
              $amt_pd += $pay['pay_amount']; ?>
              <tr class="table-primary">
                <th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $pay['pay_amount']; ?></th>
                <th><?php echo $pay['pay_date']?></th>
              </tr>
            <?php endforeach; ?>
          </table>

      </div>
        <div class="">
          <table class="table table-dark ">
              <tr>
                <th>Total Amount Paid</th>
                <th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"><?php echo $amt_pd?></th>
              </tr>
              <tr>
                <th>Remaining Balance</th>
                <th><img class="thumnail" style="max-height: 26px;" src="<?php echo base_url();?>assets/img/peso.jpg"></th>
              </tr>
          </table>
        </div>
    </div>

  </div>
    <div style=" background-color: darkgray; border: 2px solid darkgray; padding: 10px 10px 10px 10px; text-align: right;">
      <a type="button" class="btn btn-warning" href="<?php echo base_url(); ?>">Close</a> 
    </div>
  </div>
      