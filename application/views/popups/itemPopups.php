
<div class="modal fade" id="view_item_modal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h5 class="modal-title navbar-brand" ><b>Item Details</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    	</nav>
      <div class="modal-body">
        	<div class="row">
        		<div class="col-md-5">
              <div style="text-align: center; max-height: 260px;">
                <img style="height: 260px;" class="img-thumbnail" src="<?php echo site_url(); ?>assets/images/items/<?php echo $item; ?>"></br></br>
              </div>
        		</div>
        		<div class="col-md-7">
              <div class="form-group">
                <label><b>Name</b></label>
                <input type="hidden" id="itemId" value="">
                <input type="hidden" id="catId" value="">
                <input type="hidden" id="image" value="">
                <input type="text" class="form-control" placeholder="Item name" id="itemName" value="" disabled="">
              </div>
              <div class="form-group">
                <label><b>Description</b></label>
                <input type="text" class="form-control" placeholder="Item description" id="description" value="" disabled="">
              </div>
              <div class="form-group">
  		        	<label><b>Price</b></label>
                <input type="number" class="form-control" placeholder="Item price" id="price" value="" disabled="">
              </div>
        		</div>
        </div></form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" id="close_view_modal" data-toggle="modal" data-target="#edit_item_modal">Edit</button></li>
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="edit_item_modal">
  <div class="modal-dialog" role="document">
    <?php echo form_open_multipart('items/update'); ?>
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h5 class="modal-title navbar-brand">Edit Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </nav>
      <div class="modal-body">
        <div class="form-group">
          <label><b>Name</b></label>
          <input type="hidden" name="cat_id" id="editCat_id" value="">
          <input type="hidden" name="item_id" id="editItem_id" value="">
          <input type="text" name="item_name" class="form-control" id="editName" value="">
        </div>
        <div class="form-group">
          <label><b>Description</b></label>
          <input type="text" name="item_description" class="form-control" id="editDescription" value="">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-5">
              <label><b>Price</b></label>
              <input type="number" name="price" class="form-control" id="editPrice" value="" >
              
            </div>
            <div class="col-md-7">
    
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save Changes</button>
    <?php echo form_close(); ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="add_item_modal">
  <div class="modal-dialog" role="document">
    <?php echo form_open_multipart('items/create/'.$cat_id); ?>
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header">
        <h5 class="modal-title navbar-brand">Add Item (<?= $title; ?>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </nav>
      <div class="modal-body">
        <div class="form-group">
          <label><b>Name</b></label>
          <input type="text" class="form-control" name="item_name" placeholder="Item name">
        </div>
        <div class="form-group">
          <label><b>Description</b></label>
          <input type="text" class="form-control" name="item_description" placeholder="Item description">
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-md-5">
              <label><b>Price</b></label>
              <input type="number" class="form-control" name="price" placeholder="Item price">
              
            </div>
            <div class="col-md-7">
              <label><b>Upload Image: </b></label>
              <input type="file" name="userfile" class="form-control">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>

<script type="text/javascript"> 
  $(document).ready(function(){
    
    var name = $('#itemName').val();
    $('#titleName').val(name);

    $("#close_view_modal").click(function(){
      $("#view_item_modal").modal("hide");
        var edit_catId = $('#catId').val();
        var edit_item_id = $('#itemId').val();
        var edit_item_name = $('#itemName').val();
        var edit_description =$('#description').val();
        var edit_price = $('#price').val();
        var edit_img = $('#image').val();

        $("#editItem_id").val( edit_item_id );
        $("#editTitleName").val( edit_item_name );
        $("#editName").val( edit_item_name );
        $("#editDescription").val( edit_description );
        $("#editPrice").val( edit_price );
        $("#editImg").val( edit_img );
        $("#editCat_id").val( edit_catId );
    }); 
  }); 
</script>
