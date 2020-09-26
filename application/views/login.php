<br>
<div class="header" style="text-align:center;">
  <h3><b>welcome to Barbarian Nation</b></h3>
  <hr>
</div> 

<div class="container">
    
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- blank -------------------------------------------------------------------------->
      </div>

      <!-- login form ------------------------------------------------------------------------>

      <div class="col-lg-4 col-md-4 col-sm-12">

        <?php 
          if (isset($error)) 
          {
        ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> <?=$error;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

        <?php
          }
          else if(isset($success))
          {
        ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congrats!</strong> <?=$success;?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php
          }
        ?>

      <div class="login-form">
        <h5 style="text-align:center; color:blue;">Please login!<hr></h5>
        <form method="post" action="<?php echo base_url('Main/logininsart');?>">
          <div class="form-group">
            <label>Username</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Username...">
            <span class="text-danger"><?php echo form_error('username'); ?></span>

          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Password...">
            <span class="text-danger"><?php echo form_error('password');?></span> 
          </div>
         <div class="row">
          <div class="col-6">
            <button type="submit" class="btn btn-info">Submit</button>
          </div>
          
         </div>
         <div class="col-12" style="text-align:center;">
          <a class="text-info" style="text-align:center;" href="<?php echo base_url('main/creataccount') ?>">Creat account</a>   
          </div> 
         
          

          
        </form>
        </div>
      </div>
      <!-- end login form -------------------------------------------------------------->
      <div class="col-lg-4 col-md-4 col-sm-12">
        <!-- blank ---------------------------------------------------------------------->
      </div> 
    </div>
  </div>
</div>

    