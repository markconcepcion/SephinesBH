<h3><?= $title; ?></h3>

<?php echo  validation_errors(); ?>

<?php echo form_open_multipart('items/update'); ?>
	<input type="hidden" name="item_id" value="<?php echo $items['item_id']; ?>">
		
	<div class="form-group">
		<label>Item Name:</label>
		<input type="text" class="form-control" name="item_name" placeholder="Item Name" value="<?php echo $items['item_name']; ?>">
	</div>
		
	<div class="form-group">
		<label>Item Description:</label>
		<input type="text" class="form-control" name="item_description" placeholder="Item Description" value="<?php echo $items['item_description']; ?>">
	</div>
			
	<div class="form-group">
		<label>Retail Price:</label>
		<input type="text" class="form-control" name="retailPrice" placeholder="price" value="<?php echo $items['price']; ?>">
	</div>

	<div class="form-group">
		<label>Category:</label>
		<select name="category_id" class="form-control">
			<?php foreach ($categories as $category): ?>
				<option value="<?php echo $category['cat_id']; ?>">
					<?php echo $category['cat_name']; ?></option>
			<?php endforeach; ?>
		</select>
	</div>
	
	<div class="form-group">
		<button type="submit" class="btn btn-success">Submit</button>
		<a class="btn btn-warning" href="<?php echo base_url(); ?>categories">Close</a>
	</div>


	