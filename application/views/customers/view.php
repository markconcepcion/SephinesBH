	<style type="text/css">
		div.container{
		}

		div.inside_con{
			margin: 10px 0px 0px 10px;
			width: 1340px;
			height: 580px;
			border: 1px solid black;
			background-color: lightgray;
		}
		div.slice{
			height: 7px;
			background-color: rgb(255, 104, 143);
		}

		table.info{
			margin: 4px 0px 0px 5px;
			width: 700px;
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
			height: 460px;
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
	<div class="container" >
		<div class="inside_con">
			<div style="height: 50px;">
				<h1 class="head1" style="color: black; margin-top: 10px;"><?php echo $title; ?></h1>
				<h1 class="head1" style="color: black; margin: 10px 0px 0px 650px;">Ordered Date: </h1>
			</div>
			<div class="slice"></div>
			<div class="scroll" style="display: inline-flex;" >
				<div class="half">
					<table class="info" style="width: 600px;">

				    	<tr ">
					        <td><h3 class="cat3">Contact No.</h3></td>
					        <td><h3 class="cat3"><?php echo $number; ?></h3></td>
					    </tr><tr ">
					        <td><h3 class="cat3">Address</h3></td>
					        <td><h3 class="cat3"><?php echo $address; ?></h3></td>
					    </tr><tr ">
					        <td><h3 class="cat3">Placed By</h3></td>
					        <td><h3 class="cat3"><?php echo $users['user_name']; ?></h3></td>
					    </tr> 
					    
				  	</table>
					    <div class="list">
					    	<table>
					    		
						    <tr class="info">
						    	<th>Name</th>
						    	<th>Quantity</th>	
						    	<th>Price</th>
						    </tr>
						    <?php $qty=0; $t_itemprice = 0; ?>
						    <?php foreach ($orderlists as $r) : ?>
						    	<?php $qty += $r['ol_qty']; $t_itemprice += $r['price']; ?>
						    	<tr>
						    	<th><?php echo $r['item_name']; ?></th>
						    	<th><?php echo $r['ol_qty']; ?></th>
						    	<th><?php echo $r['price']; ?></th>
						    	</tr>
						    <?php endforeach; ?>
					    <tr>
					        <td><h3 class="cat3">Total</h3></td>
					        <td><h3 class="cat3"><?php echo $qty ?></h3></td>
					        <td><h3 class="cat3"><?php echo $t_itemprice ?></h3></td>
					    </tr>
					    <tr class="info">
					        <td><h3 class="cat3">Payment Amount</h3></td>
					        <td><h3 class="cat3"><?php echo $amount; ?></h3></td>
					    </tr>
					    	</table>
					    </div>	
				</div>
				    
				<div class="scroll">
					<table class="info">
				    <thead>
			    		<tr class="info">
			    			<th>Amount Paid</th>
			    			<th>Received By</th>
			    			<th>Date: </th>
			    		</tr>
				    </thead>

				    <tbody>
				    	<?php foreach ($payments as $p) : ?>
						    <tr class="info">
								<td><h3 class="cat3"><?php echo $p['pay_amount']; ?></h3></td>
								<td><h3 class="cat3"></h3></td>
								<td><h3 class="cat3"><?php echo $p['pay_date']; ?></h3></td>
						    </tr>
						<?php endforeach; ?>
				    </tbody>
				</table>
					
				</div>
			</div>
			<div class="slice" ></div>
			<div class="create">
			
		  	   	<?php echo validation_errors();  ?>
						<li><a href="<?php echo base_url(); ?>" style="margin-left: 920px;"><button type="submit"><h3 class="cat3">Close</h3></button></a></li>
					</ul>	
		  	</div>	
		</div>
	 </div>
