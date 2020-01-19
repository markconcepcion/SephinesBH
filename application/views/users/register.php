<style type="text/css">
	div.container{

	}

	body{
			background-image: url('<?php echo base_url();?>assets/img/Background.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}

	div.inside_con{
		margin: 10px 0px 0px 375px;
		width: 650px;
		height: 460px;
		border: 1px solid black;
		background-color: lightgray;
	}
	div.slice{
		height: 7px;
		background-color: rgb(255, 104, 143);
	}

	table.info{
		margin: 4px 0px 0px 5px;
		width: 655px;
		height: 30px;
	}

	h3.cat3{
		font-family: monospace;
		font-size: 17px;
		margin: 0px 0px 2px 7px;
	}
	tr.info{
		background-color: white;
	}
	.scroll{
		overflow: auto;
		overflow-x: hidden;
	}

	a{
		text-decoration: none;
		color: black;
	}
	h3.cat3:hover, a:hover{
		cursor: auto;
		color: blue;
	}
	input, select{
		height: 30px;
		width: 450px;
	}
</style>
<div class="container">
	<div class="inside_con">
		<div style="height: 50px;"><h1 class="head1" style="color: black; margin-top: 10px;"><?= $title; ?>
			<?php echo validation_errors(); ?>
		<?php echo form_open_multipart('users/register'); ?>
		</h1></div>
		<div class="slice"><?php echo  validation_errors(); ?></div>
		<div class="scroll">
		<table class="info">
			<tr class="info">
				<td><label><h3 class="cat3">Name</h3></label></td>
				<td><input type="text" name="user_name" placeholder="Name"></h3></td>
				<td><input type="hidden" class="form-control" name="accountStatus" value="Active"></h3></td>
			</tr>
			<tr class="info">
				<td><label><h3 class="cat3">Email</h3></label></td>
				<td><input type="text" name="user_email" placeholder="Email"></td>
			</tr>
			<tr class="info">
				<td><label><h3 class="cat3">Gender</label></td>
				<td><select id="user_gender" name="user_gender">
					<option value="M">Male</option>
					<option value="F">Female</option></td>
				</select></td>
			</tr>
			<tr class="info">
				<td><label><h3 class="cat3">Contact No.</h3></label></td>
				<td><input type="text" class="form-control" name="user_contactNo" placeholder="Contact No.">
			</tr>
			<tr class="info">
				<td><label><h3 class="cat3">Address</label></td>
				<td><input type="text" class="form-control" name="user_address" placeholder="Address"></td>
			</tr>
		
			<tr class="info">
				<td><label><h3 class="cat3">User Name</h3></label></td>
				<td><input type="text" class="form-control" name="userName" placeholder="User Name"></td>
			</tr>
			<tr class="info">
				<td><label><h3 class="cat3">Password</h3></label></td>
				<td><input type="password" class="form-control" name="password" placeholder="Password"></td>
			</tr>
			<tr class="info">
				<td><label><h3 class="cat3">Confirm Password</h3></label></td>
				<td><input type="password" class="form-control" name="password2" placeholder="Confirm Password"></td>
			</tr>
		</table>
		<div class="slice"></div>

			



				<td><button type="submit"><h3 class="cat3">Submit</h3></button></td>
			<a href="<?php echo base_url(); ?>" style="text-decoration: none;"><button><h3 class="cat3">Cancel<h3</button></a>
			<?php echo form_close(); ?> 
		</div>
	</div>
</div>

