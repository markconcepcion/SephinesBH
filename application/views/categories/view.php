<div class="container" style="padding: 15px 15px 15px 15px;">
	<div class="table-primary" style="padding: 10px 0px 10px 10px; border: thin solid darkgray;">
		<div class="row">
			<div class="col-md-6">
				<h2><b><?= $title; ?></b></h2>
			</div>
			<div class="col-md-6">
				<?php echo form_open('categories/search_items/'.$cat_id); ?>
				<div class="form-inline my-2 my-lg-0" style="float: right; padding-right: 5px;">
			      <input class="form-control mr-sm-2" type="text" name="inputsearch" placeholder="Search">
			      <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
			    </div></form>
			</div>
		</div>
	</div>
	<div>
		<table class="table table-striped">
			<tr class="table-warning" style="border: thin solid gray;">
				<th>Name</th>
				<th style="padding-left: 10px;">Actions</th>
			</tr>
		</table>
	</div>
	<div style="overflow-y: hidden; min-width: 250px; max-width: 1400px;">
		<div class="scroll" style="overflow-x: hidden; max-height: 450px; height: 450px; border: thin solid #ddd; margin-bottom: 15px; background-color: white;">
			<table class="table table-hover table-sm">
				<tbody>
					<?php $data['item_id'] = 0; $data['cat_id'] = $cat_id; 
					foreach ($items as $item) : 
						$data['item'] = $item['item_image'];
					?>
  				    <tr class="table-light">
				    <th style=" max-width: 500px; width: 500px; overflow: hidden; padding-left: 11px;"><?php echo $item['item_name']; ?></th>
						<th style="text-align: center;">
							<ul class="nav">
								<li class="nav-item">
									<button class="view_details btn btn-primary" 
									data-id="<?php echo $item['item_id']; ?>" data-name="<?php echo $item['item_name']; ?>"
									data-description="<?php echo $item['item_description']; ?>" data-price="<?php echo $item['price']; ?>"
									data-image="<?php echo $item['item_image']; ?>" data-catID="<?php echo $item['category_id']; ?>"
									data-toggle="modal" data-target="#view_item_modal">View Details</button>
								</li>
							</ul>
						</th>
					  </tr>
				  <?php endforeach; 
					$this->load->view('popups/itemPopups', $data);
				  ?>
				</tbody>
			</table>
		</div>
	</div>
	<div class="container" style="padding: 10px 10px 10px 10px; border:thin solid gray; background-color: darkgray">
		<div class="row">
			<div class="col-md-11">
				<button class="btn btn-primary" data-id="$" data-toggle="modal" data-target="#add_item_modal">Add Item</button>
			</div>
			<div class="col-md-1">
				<a href="<?php echo base_url(); ?>categories" class="btn btn-warning">Close</a>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript"> 
  $(document).ready(function(){ 
    $(".view_details").click(function(){
      var cat_id = $(this).data('catId');
      var item_id = $(this).data('id');
      var item_name = $(this).data('name');
      var description = $(this).data('description');
      var price = $(this).data('price');
      var img = $(this).data('image');

      $('#catId').val( cat_id )
      $('#itemId').val( item_id )
      $("#itemName").val( item_name );
      $("#description").val( description );
      $("#price").val( price );
      $("#image").val( img );
    }); 
  }); 
</script>
