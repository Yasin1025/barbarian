<br>
<div class="header" style="text-align:center;">
  <h3><b>welcome to Barbarian Nation</b></h3>
 
 </div>

<div class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12">

			<?php
				if(isset($success))
				{
					?>
						<div class="alert alert-danger">
							<?=$success;?>
						</div>
					<?php
				}
			?>
			
			<?php
				if(isset($error))
				{
					?>
						<div class="alert alert-danger">
							<?=$error;?>
						</div>
					<?php
				}
			?>
			<hr>
			<h5 style="text-align:center; color:green;">Create Account</h5><br>


         <?php 
              if (isset($profile_id)) 
              {
                foreach ($profile_id as $row) 
                {
                  $id = $row->id;
                  $username = $row->username;
                  $email = $row->email;
                  $mobile = $row->mobile;
                  $country = $row->country;
                  $address = $row->address;
                  $password = $row->password;
                
                }
              }
              if (isset($update_profile) && $update_profile == "ok") 
              {
            ?>
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Main/profile_up_validation');?>">

            <?php

              }
              else
              {
            ?>
              <form method="post" enctype="multipart/form-data" action="<?php echo base_url('Main/creataccount_val');?>">
            <?php

              }
            ?>
       	

			

			  <div class="form-row">
			    <div class="form-group col-md-6">
			      
			      <input type="text" class="form-control" name="username"  placeholder="Set Username..." <?php if(isset($username)){echo 'value="'.$username.'"';}?>>
			      <span class="text-danger"><?php echo form_error('username');?></span>
			      
			    </div>
			    <div class="form-group col-md-6">
			      
			      <input type="email" class="form-control" name="email" placeholder="Enter Email..." <?php if(isset($email)){echo 'value="'.$email.'"';}?>>

			      <span class="text-danger"><?php echo form_error('email');?></span>

			    </div>
			  </div>
			  <div class="form-group">
			   
				<textarea placeholder="Write your address..." name="address" class="form-control" rows="3" <?php if(isset($address)){echo 'value="'.$address.'"';}?>> </textarea>
				<span class="text-danger"><?php echo form_error('address');?></span>
				<br/>
			  </div>
			  <div class="form-row">
			    <div class="form-group col-md-6">
			      <input placeholder="country" type="text" name="country" class="form-control" <?php if(isset($country)){echo 'value="'.$country.'"';}?>>
			      <span class="text-danger"><?php echo form_error('country');?></span>
			    </div>
			    <div class="form-group col-md-6">
			     	<span class="text-right">Profile Picture</span>
					<input name="photo" type="file" <?php if(isset($photo)){echo 'value="'.$photo.'"';}?>>
					<span class="text-danger"><?php echo form_error('photo');?></span>
			    </div>
			   
			   </div>

			   		<input type="text" name="mobile" class="form-control"  placeholder="Mobile No."><br>
			   	
			      	<input type="password" name="password" class="form-control"  placeholder="Password">

			    	<small class="form-text text-muted"> [Note: Don't Forget Your Password!]  </small>
			     <br>
			 <input type="hidden" name="id" <?php if(isset($id)){echo 'value="'.$id.'"';}?>>
			  <button type="submit" class="btn btn-info">Sign in</button>
			</form>
		</div>
	</div>
</div>