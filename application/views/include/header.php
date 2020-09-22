<!DOCTYPE html>
<html>
    <head>
       <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title><?= $title; ?></title>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('_resources/stylesheets/bootstrap.min.css');?>">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('_resources/stylesheets/owl.carousel.min.css');?>">
      
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('_resources/stylesheets/themify-icons.css');?>">
      <!-- <link rel="stylesheet" type="text/css" href="css/base.css"> -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('_resources/stylesheets/style.css');?>">
    </head>
  <body>
                                        

                                         <!--START_NAVBAR -->

<div class="row">
  <div class="col-lg-12 col-md-12 col-sm-12">

    <div class="main_navbar">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="<?php echo base_url('main/index');?>">BARBARIAN NATION</a>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('main/index');?>">HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">BOOKS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('main/profile');?>">PROFILE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-info" href="<?php echo base_url('main/login');?>">SIGN IN</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-warning" href="<?php echo base_url('main/creataccount') ?>">CREATE ACCOUNT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-outline-danger" href="#">LOGOUT</a>
              </li>   
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
          </div>

        </nav>

    </div>
  </div>
</div>
                                      <!-- END_NAVBAR -->