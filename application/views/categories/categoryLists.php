<div class="container" style="padding: 15px 15px 15px 15px;">
	<div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid darkgray;">
		<div class="row">
			<div class="col-md-6">
					<h2><?= $title; ?></h2>
			</div>
			<div class="col-md-6">
				<?php echo form_open('categories/search_cat'); ?>
				<div class="form-inline my-2 my-lg-0" style="padding-right: 5px; float: right;">
				    <input class="form-control mr-sm-2" type="text" id="inputsearch" name="inputsearch" placeholder="Search">
				    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
			    </div></form>
			</div>
		</div>
	</div>
	<div>
		<table class="table table-striped">
			<tr class="table-warning" style="border: 2px solid #ddd;">
				<th>Name</th>
				<th style="padding-left: 10px;">Actions</th>
			</tr>
		</table>
	</div>
	<div style="overflow-y: hidden; min-width: 250px; max-width: 1400px;">
		<div class="scroll" style="overflow-x: hidden; max-height: 450px; height: 450px; border: thin solid darkgray; margin-bottom: 15px;background-color: white;">
			<table class="table table-hover table-sm">
				<tbody>
					<?php
		      		$this->load->view('popups/categoryPopups'); 
					foreach ($categories as $category) : ?>
					  <tr class="table-light">
					   	<th style=" max-width: 200px; overflow: hidden; padding-left: 11px;"><?php echo $category['cat_name']; ?></th>
							<th style="text-align: center;">
								<ul class="nav">
									<li class="nav-item"><a class="btn btn-primary" href="<?php echo site_url('/categories/items/' .$category['cat_id']); ?>">Items</a></li>
									<li class="nav-item" style="margin-left: 5px;">
										<button 
											data-id="<?php echo $category['cat_id']; ?>" 
											data-name="<?php echo $category['cat_name']; ?>" 
											class="rename btn btn-secondary" data-toggle="modal" data-target="#rename_cat_modal">Rename
										</button>
									</li>
								</ul>
							</th>
						</tr>
				  <?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container" style="padding: 10px 10px 10px 10px; border:thin solid #ddd; background-color: #eee">
		<div class="row"><div class="col-md-6"><button class="btn btn-primary" data-toggle="modal" data-target="#createCategory">Create Category</button></div><div class="col-md-6" style="text-align: right;"><a class="btn btn-warning" href="<?php echo base_url(); ?>">Close</a></div></div>
			
	</div>
</div>
  <?php if($this->session->flashdata('Msg')): ?>
    <script type="text/javascript"> $(document).ready(function(){ $("#errMsgs").modal("show"); }); </script>
  <?php endif; ?>


  <div class="modal fade" id="#errMsgs">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <nav class="navbar-dark bg-primary">
      <div class="modal-header"> 
        <h5 class="modal-title navbar-brand"><b></b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div></nav>
      <div class="modal-body">
          <?php echo $this->session->flashdata('user_registered'); ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
 </form>
</div>  
<script type="text/javascript"> 
  $(document).ready(function(){ 
    $(".rename").click(function(){
      var cat_id = $(this).data('id');
      var cat_name = $(this).data('name');
      $("#catName").val( cat_name );
      $("#catId").val( cat_id );
    }); 
  }); 
</script>
