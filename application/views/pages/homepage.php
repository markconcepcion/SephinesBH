<div class="container" style="padding: 15px 15px 15px 15px;">
  <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd; margin-right: 15px;">
    <h2>Home</h2>
  </div>
  <div class="container row" style=" padding: 10px 0px 0px 15px; ">
    <div class="col-md-5" style="border: thin solid #ddd; height: 563px; padding: 0px; background-color: white;">
      <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
        <h4>Users List</h4>
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
                  <li class="nav-item" >
                    <a href="<?php echo base_url('/users/details/'.$key['user_id']); ?>" class="btn btn-primary btn-sm" >View</a>
                  </li>
                  <li class="nav-item" style="padding-left: 5px;"><a href="<?php echo base_url('users/deactivate/'.$key['user_id']); ?>" class="btn btn-danger btn-sm">      Deactivate</a></li>
                </ul>
              </th>
            </tr>          
          <?php endforeach; ?>
          </table>
        </div>
        <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
        <h4><a href="<?php echo base_url(); ?>users/inactives" class="btn btn-danger btn-sm">Inactives</a></h4>
        </div>
    </div>
  
    <div class="col-md-7"  style="padding: 0px 0px 0px 10px; background-color:white;">
       <div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid #ddd;">
        <h4>User's Information</h4>
      </div>  
      </div>
    </div>
  </div>

</div>