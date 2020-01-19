<div class="container" style="padding: 15px 15px 15px 15px;">
  <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd; margin-right: 15px;">
    <h2>User Information</h2>
  </div>
  <div class="container row" style="padding: 10px 0px 0px 15px; ">
    <div class="col-md-5" style="border: thin solid lightgray; height: 563px; padding: 0px;background-color: white">
      <div class="table-primary" style="padding: 10px 0px; border: thin solid #ddd;">
        <h4 style="text-align:center;">Users List</h4>
      </div>
      <div>
        <table class="table table-striped">
          <tr class="table-warning" style="border: thin solid #ddd;">
            <th>UserName</th>
            <th style="padding-left: 10px;">Actions</th>
          </tr>
        </table>  
      </div>
        <div style="padding: 0px 10px 0px 10px; height: 373px; max-height: 372px; overflow: auto;">
          <table class="table table-hover table-sm">
          <?php foreach ($users as $key) : ?>
            <tr class="table-light">
              <th  style="max-width: 250px; width: 250px;"><?php echo $key['userName']; ?></th>
              <th>
                <ul class="nav">
                  <li class="nav-item" style="padding-right: 5px;">
                    <a href="<?php echo base_url('/users/details/'.$key['user_id']); ?>" class="btn btn-primary btn-sm" >View</a>
                  </li>
                  <li class="nav-item"><a href="<?php echo base_url('users/deactivate/'.$key['user_id']); ?>" class="btn btn-danger btn-sm">      Deactivate</a></li>
                </ul>
              </th>
            </tr>          
          <?php endforeach; ?>
          </table>
        </div>
        <div class="table-primary" style="padding: 10px 0px 10px 10px; border-top: thin solid #ddd;">
        <h4><a href="<?php echo base_url(); ?>users/inactives" class="btn btn-danger btn-sm">Inactives</a></h4>
        </div>
    </div>
  
    <div class="col-md-7"  style="padding: 0px 0px 0px 10px;background-color: white">
       <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid lightgray;">
          <h4>User's Information</h4>
        </div>  
        <div style="border: thin solid lightgray; height: 505px; padding: 10px 0px 10px 0px;">
          <div  style="height: 428px;">
            
          <div class="container row">
            <div class="form-group col-md-4">
              <label><b>First Name</b></label>
              <input class="form-control" value="<?php echo $user_info['user_fname']; ?>" disabled="">
            </div>
            <div class="form-group col-md-4">
              <label><b>Middle Name</b></label>
              <input class="form-control" value="<?php echo $user_info['user_mname']; ?>" disabled="">
            </div>
            <div class="form-group col-md-4">
              <label><b>Last Name</b></label>
              <input class="form-control" value="<?php echo $user_info['user_lname']; ?>" disabled="">
            </div>
            <div class="container row">
               <div class="form-group col-md-5">
                  <label><b>Gender</b></label>
                  <input class="form-control" value="<?php echo $user_info['user_gender']; ?>" disabled="">
                </div> 
                <div class="form-group col-md-7">
                  <label><b>User Name</b></label>
                  <input class="form-control" value="<?php echo $user_info['userName']; ?>" disabled="">
                </div>
            </div>
            <div class="container row">
               <div class="form-group col-md-4">
                  <label><b>Contact No.</b></label>
                  <input class="form-control" value="<?php echo $user_info['user_contactNo']; ?>" disabled="">
                </div> 
                <div class="form-group col-md-8">
                  <label><b>Email Address</b></label>
                  <input class="form-control" value="<?php echo $user_info['user_email']; ?>" disabled="">
                </div>
            </div>
            <div class="form-group col-md-8">
                  <label><b>Address</b></label>
                  <input class="form-control" value="<?php echo $user_info['user_address']; ?>" disabled="">
                </div>
                <div class="form-group col-md-8">
                  <label><b>Password</b></label>
                  <input class="form-control" value="<?php echo $user_info['password']; ?>" disabled="">
                </div>
          </div>
          </div>


          <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
            <h4><a href="<?php echo base_url(); ?>" class="btn btn-danger btn-sm">Close</a></h4>
          </div>
        </div>
    </div>
  </div>

</div>