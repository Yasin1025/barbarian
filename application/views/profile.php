<div class="row">
	 <?php
		 if($result->num_rows()>0)
		 {
		 	foreach ($result->result() as  $row) 
		 	{

	?> 
	<!-- profile picture ---------------------------------------------------------->
	<div class="col-lg-3 col-md-3 col-sm-12">
		
		<div class="card" style="width: 15rem;">
			<img src="<?=base_url('upload/').$row->photo;?>" class="card-img-top" alt="...">
		</div>

	</div>
	<!-- profile info ------------------------------------------------------------->
	<div class="col-lg-6 col-md-6 col-sm-12">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Username: <?php echo $row->username;?> </li>
			<li class="list-group-item">Email: <?php echo $row->email;?> </li>
			<li class="list-group-item">Address: <?php echo $row->address;?> </li>
			<li class="list-group-item">Country: <?php echo $row->country;?> </li>
			<li class="list-group-item">Contact No: <?php echo $row->mobile;?> </li>
			
		</ul>
	</div>
	<br>
	<br>
	<br>
	<div class="col-12" style="text-align:center;">
			
			<a href='<?php echo base_url("Main/updateprofile/").$row->id;?>' class="btn btn-info btn-sm"> Edit Profile </a>
			<a href='<?php echo base_url("Main/delete_account/").$row->id;?>' class="btn btn-danger btn-sm"> DELETE ACCOUNT </a>
		
	</div>
	 <?php
			}
		}
	?>
</div>
<br>
<br>
