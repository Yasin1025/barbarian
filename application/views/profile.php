<div class="row">
	 <?php
		 // if(isset($result))
		 // {
		 // 	foreach ($result as  $data) 
		 // 	{

	?> 
	<!-- profile picture ---------------------------------------------------------->
	<div class="col-lg-3 col-md-3 col-sm-12">
		
		<div class="card" style="width: 18rem;">
			<img src="<?=base_url('upload/').$data->photo;?>" class="card-img-top" alt="...">
		</div>

	</div>
	<!-- profile info ------------------------------------------------------------->
	<div class="col-lg-6 col-md-6 col-sm-12">
		<ul class="list-group list-group-flush">
			<li class="list-group-item">Username: <?php echo $data->username;?> </li>
			<li class="list-group-item">Email: <?php echo $data->email;?> </li>
			<li class="list-group-item">Address: <?php echo $data->address;?> </li>
			<li class="list-group-item">Country: <?php echo $data->country;?> </li>
			
		</ul>
	</div>
	<br>
	<br>
	<div class="col-12" style="text-align:center;">
		<button type="button" class="btn btn-info btn-sm">Update profile</button>
		<button type="button" class="btn btn-danger btn-sm">Delete Account</button>
	</div>
	 <?php
		// 	}
		// }
	?>
</div>
