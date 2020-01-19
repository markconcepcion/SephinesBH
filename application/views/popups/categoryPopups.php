<div class="modal fade" id="rename_cat_modal">
 <?php echo form_open('categories/rename_cat'); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header"> 
        <h5 class="modal-title navbar-brand"><b>Rename Category</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div></nav>
      <div class="modal-body">
      	<div class="form-group">
      		<label style="padding-left: 5px;"><b>Enter New Name</b></label>
          <input type="hidden" class="form-control" name="cat_id" id="catId" value="">
      		<input type="text" class="form-control" name="cat_name" id="catName" value="">
      	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </form>
</div>

<div class="modal fade" id="createCategory">
 <?php echo form_open('categories/create'); ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h5 class="modal-title navbar-brand"><b>Create Category</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div></nav>
      <div class="modal-body">
        <div class="form-group">
          <label style="padding-left: 5px;"><b>Enter Name</b></label>
          <input type="text" class="form-control" name="cat_name" placeholder="Category Name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </form>
</div>