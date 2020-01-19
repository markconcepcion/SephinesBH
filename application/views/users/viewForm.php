<style type="text/css">
	div.container{
		}

		div.inside_con{
			margin: 10px 0px 0px 10px;
			width: 515px;
			height: 380px;
			border: 1px solid black;
			background-color: lightgray;
		}
		div.slice{
			height: 7px;
			background-color: rgb(255, 104, 143);
		}

		table.info{
			margin: 4px 0px 0px 5px;
			width: 500px;
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
			height: 260px;
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

		body{
			background-image: url('<?php echo base_url();?>assets/img/Background.jpg');
			background-repeat: no-repeat;
			background-size: cover;
		}

</style>
<div class="container">
	<div class="inside_con">
		<div style="height: 50px;"><h1 class="head1" style="color: black; margin-top: 10px;"><?= $title; ?></h1></div>
		<div class="slice"></div>

		<div class="scroll">
			<table class="info">
				<tr class="info">
					<td><h3 class="cat3">Name:</h3></td>
					<td><h3 class="cat3"><?php echo $user_info['user_name'];?></h3></td>
				</tr>

				<tr class="info">
					<td><h3 class="cat3">Gender:</h3></td>
					<td><h3 class="cat3" id="gender"><?php echo $user_info['user_gender']; ?></h3></td>
				</tr>

				<tr class="info">
					<td><h3 class="cat3">Email: </h3></td>
					<td><h3 class="cat3"><?php echo $user_info['user_email'];?></h3></td>
				</tr>

				<tr class="info">
					<td><h3 class="cat3">Address: </h3></td>
					<td><h3 class="cat3"><?php echo $user_info['user_address'];?></h3></td>
				</tr>		

				<tr class="info">
					<td><h3 class="cat3">Contact No.: </h3></td>
					<td><h3 class="cat3"><?php echo $user_info['user_contactNo'];?></h3></td>
				</tr>

				<tr class="info">
					<td><h3 class="cat3">Username: <h3></td>
					<td><h3 class="cat3"><?php echo $user_info['userName'];?></h3></td>
				</tr>

				<tr class="info">
					<td><h3 class="cat3">Recent Login: </h2></td>
					<td><h3 class="cat3"><?php echo $user_info['recentLoggedIn'];?></h3></td>
				</tr>		
			</table>	
		</div>
		<div class="slice"></div>		
		<div class="edit">
			<a href="<?php echo base_url('/users/edit/'.$user_info['user_id']);?>"><button>
				<h3 class="cat3">Edit</h3></button></a>
			<a href="<?php echo base_url(); ?>homepage"><button><h3 class="cat3">Close</h3></button></a>
		</div>
	</div>
	

</div>

<script>
    var g = document.getElementById("gender").innerHTML;
	if (g === 'M') {
    	document.getElementById("gender").innerHTML = "Male";
	} else {
    	document.getElementById("gender").innerHTML = "Female";
	}
</script>