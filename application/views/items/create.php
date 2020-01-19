<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/recordForm/layawayForm.css">
<style type="text/css">
	body{
		background-image: url('<?php echo base_url();?>assets/img/Background.jpg');
		background-repeat: no-repeat;
		background-size: cover;
	}

		div.modal-be-like{
		margin: 100px 200px 100px 335px;
		width: 685px; 
	}

	div.inside-mi-modal{
		text-align: center;
		background-color: lightgray;
		border: 2px solid black;
	}

	div.slice{
		height: 5px;
		background-color: rgb(255, 104, 143);
		margin: 10px 0px 10px 0px;
	}

	h2{
		color: black;
		font-size: 17px;	
		margin-left: 5px;
		font-family: monospace;
		padding-top: 7px;
	}

	input.choco{
		text-indent: 10px;
		font-size: 17px;
		height: 40px;
		width: 500px;
	}

	ul.but, li.but{
		display: inline-flex;
		height: 40px;
	}

	h3.cat3{
		font-family: monospace;
		font-size: 17px;
		margin: 0px 0px 2px 7px;
	}
	
	h3.cat3:hover, a:hover{
		cursor: auto;
		color: blue;
	}

	#close
	{
		margin-left: 20px;
	}


</style>

<?php echo  validation_errors(); ?>
<div class="modal-be-like">
	<div class="inside-mi-modal">

		<div style="height: 35px;"><h1 class="head1" style="color: black; margin-top: 8px;"><?= $title.' ('.$categories->cat_name.')'; ?></h1></div>
			<div class="slice"></div>
	<?php echo form_open_multipart('/items/create/' .$categories->cat_id); ?>
		<table>
			<input type="hidden" name="cat_id" value="<?php $categories->cat_id; ?> ">
			<tr>
				<td><h2><label>Item Name:</label></h2></td>
				<td><input type="text" class="form-control" name="item_name" placeholder="Item Name" required=""></td>
			</tr>
				
			<tr>
				<td><h2><label>Item Description:</label></h2></td>
				<td><input type="text" class="form-control" name="item_description" placeholder="Item Description" required=""></td>
			</tr>
					
			<tr>
				<td><h2><label>Retail Price:</label></h2></td>
				<td><input type="text" class="form-control" name="price" placeholder="Retail Price" required=""></td>
			</tr>


			<tr>
				<td><h2><label>Upload Image: </label></h2></td>
				<td><input type="file" name="userfile"></td>
			</tr>

			<tr>
				<td></td>
				<td>
					<ul class="but">
					<li class="but" style="margin-left: 360px;"><button type="submit" style="height: 40px;"><h3 class="click">Submit</h3></button></li>
					<li class="but"><a style="text-decoration: none;" href="<?php echo base_url(); ?>categories">
										<h2 class="close">Close</h2>
									</a>
					</li>
					</ul>
				</td>
			</tr>
		</table>
	<?php echo form_close(); ?>		
	</div>
</div>