</div>
<div class="modal fade" id="createModal">
 <?php echo form_open('users/createAcc'); ?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-primary">
        <h4 class="modal-title navbar-brand"><b>Create an Account</b></h4>
        <button type="button" class="close navbar-brand" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> First Name</b></label>
            <input type="text" class="form-control" name="user_fname" placeholder="First Name" required="">
          </div>
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> Middle Name</b></label>
            <input type="text" class="form-control" name="user_mname" placeholder="Middle Name" required="">
          </div>
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> Last Name</b></label>
            <input type="text" class="form-control" name="user_lname" placeholder="Last Name" required="">
          </div>
        </div>
        <div class="form-group">
          <label style="padding-left: 5px; color: darkgray;"><b> Address</b></label>
          <input type="text" class="form-control" name="user_add" placeholder="Address" required="">
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label style="padding-left: 5px; color: darkgray;"><b> Email</b></label>
              <input type="email" class="form-control" name="email_add" placeholder="Email" required=""> 
            </div>
            <div class="row form-group">
              <div class="form-group col-md-5">
                <label style="padding-left: 5px; color: darkgray;"><b>Gender</b></label>
                <select name="user_gender" class="form-control">
              <option value="Male">Male</option>
              <option value="Female">Female</option></td>
            </select>
              </div>
              <div class="form-group col-md-7">
                <label style="padding-left: 5px; color: darkgray;"><b>Mobile Number</b></label>
                <input type="text" class="form-control" name="user_number" placeholder="#" required="">
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label style="padding-left: 5px; color: darkgray;"><b>Username</b></label>
              <input type="text" class="form-control" name="username" placeholder="Username" required="">
            </div>
            <div class="form-group">
              <div class="row form-group">
                <div class="form-group col-md-6">
                  <label style="padding-left: 5px; color: darkgray;"><b>Password</b></label>
                  <input type="password" class="form-control" name="password" placeholder="********" required="">
                </div>
                <div class="form-group col-md-6">
                  <label style="padding-left: 5px; color: darkgray;"><b>Confirm Password</b></label>
                  <input type="password" class="form-control table-warning" name="password2" placeholder="********" required="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <nav class="navbar-dark bg-w"><div class="modal-footer">
        <button type="submit" class="btn btn-primary">Create</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div></nav>
    </div>
  </div>
 </form>
</div>
  </body>
</html>

<div class="modal fade" id="detail_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-primary">
        <h4 class="modal-title navbar-brand"><b><?php echo $userInfo['user_fname'].'`s Information'; ?></b></h4>
        <button type="button" class="close navbar-brand" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> First Name</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_fname']; ?>" disabled="" >
          </div>
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> Middle Name</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_mname']; ?>" disabled="">
          </div>
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> Last Name</b></label>
            <input type="text" class="form-control" placeholder="<?php echo $userInfo['user_lname']; ?>" disabled="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <label style="padding-left: 5px; color: darkgray;"><b>Gender</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_gender']; ?>" disabled="">
          </div>
          <div class="form-group col-md-3">
            <label style="padding-left: 5px; color: darkgray;"><b>Mobile Number</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_contactNo']; ?>" disabled="">
          </div>
          <div class="form-group col-md-6">
            <label style="padding-left: 5px; color: darkgray;"><b>Username</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['userName']; ?>" disabled="">
          </div>
        </div>
        <div class="form-group">
          <label style="padding-left: 5px; color: darkgray;"><b> Address</b></label>
          <input type="text" class="form-control"  value="<?php echo $userInfo['user_address']; ?>" disabled="">
        </div>
         <div class="form-group">
          <label style="padding-left: 5px; color: darkgray;"><b> Email</b></label>
          <input type="email" class="form-control" value="<?php echo $userInfo['user_email']; ?>" disabled="">
        </div>
        
      </div>
      <nav class="navbar-dark bg-w"><div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div></nav>
    </div>
  </div>
</div>

<div class="modal fade" id="user_detail_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-primary">
        <h4 class="modal-title navbar-brand"><b><?php echo $userInfo['user_fname'].'`s Information'; ?></b></h4>
        <button type="button" class="close navbar-brand" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> First Name</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_fname']; ?>" disabled="" >
          </div>
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> Middle Name</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_mname']; ?>" disabled="">
          </div>
          <div class="form-group col-md-4">
            <label style="padding-left: 5px; color: darkgray;"><b> Last Name</b></label>
            <input type="text" class="form-control" placeholder="<?php echo $userInfo['user_lname']; ?>" disabled="">
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-3">
            <label style="padding-left: 5px; color: darkgray;"><b>Gender</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_gender']; ?>" disabled="">
          </div>
          <div class="form-group col-md-3">
            <label style="padding-left: 5px; color: darkgray;"><b>Mobile Number</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['user_contactNo']; ?>" disabled="">
          </div>
          <div class="form-group col-md-6">
            <label style="padding-left: 5px; color: darkgray;"><b>Username</b></label>
            <input type="text" class="form-control" value="<?php echo $userInfo['userName']; ?>" disabled="">
          </div>
        </div>
        <div class="form-group">
          <label style="padding-left: 5px; color: darkgray;"><b> Address</b></label>
          <input type="text" class="form-control"  value="<?php echo $userInfo['user_address']; ?>" disabled="">
        </div>
         <div class="form-group">
          <label style="padding-left: 5px; color: darkgray;"><b> Email</b></label>
          <input type="email" class="form-control" value="<?php echo $userInfo['user_email']; ?>" disabled="">
        </div>
        
      </div>
      <nav class="navbar-dark bg-w"><div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div></nav>
    </div>
  </div>
</div>
  </body>
</html>