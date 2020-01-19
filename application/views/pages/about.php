<div class="container" style="padding: 15px 15px 15px 15px;">
  <div class="table-primary" style="padding: 10px 0px 10px 10px; border: 1.5px solid darkgray; margin-right: 15px;">
    <h2><b>Sephine's Beaty Hub</b></h2>
  </div>
  <div class="container row" style=" padding: 10px 0px 0px 15px; ">
    <div class="col-md-5" style="border: 2px solid gray; height: 563px; padding: 0px 0px 0px 0px;">
      <div class="table-primary" style="padding: 10px 0px 10px 10px; border: 1.5px solid darkgray;">
        <h4><b>Users List</b></h4>
      </div>
      <div>
        <table class="table table-striped">
          <tr class="table-warning" style="border: 2px solid gray;">
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
                  <li class="nav-item">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#users_details">View</button>
                  </li>
                  <li class="nav-item"><a href="<?php echo base_url('users/deactivate/'.$key['user_id']); ?>" class="btn btn-danger btn-sm">      Deactivate</a></li>
                </ul>
              </th>
            </tr>          
          <?php endforeach; ?>
          </table>
        </div>
        <div class="table-primary" style="padding: 10px 0px 10px 10px; border: 1.5px solid darkgray;">
        <h4><a href="" class="btn btn-danger btn-sm">Inactives</a></h4>
        </div>
    </div>
  
    <div class="col-md-7"  style="padding: 0px 0px 0px 10px;">
       <div class="table-primary" style="padding: 10px 0px 10px 10px; border: 1.5px solid darkgray;">
          <h4><b>User's Information</b></h4>
        </div>  
        <div style="border: 2px solid darkgray; height: 505px;">
          <div class="container">
            
          </div>
        </div>
    </div>
  </div>

</div>