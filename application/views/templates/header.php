<html>
<head>
  <title>Sephine's Beauty Hub</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bs/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bs/font-awesome.css">
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <style type="text/css">
    .dropdown-menu{ filter:drop-shadow(3px 3px 5px #4d87c5); 
      border: 1px solid darkblue;
    }
    .thumnail{
      max-width: 31.5px;
      max-height: 31.5px
    }
    div.modal-dialog{
      padding-top: 100px;
    }
    .hey{
      color: #4d87c5;
      background-image: url('<?php echo base_url(); ?>assets/img/hey.jpg');
    }
  </style>
</head>

<nav class="navbar navbar-expand-lg navbar-primary bg-light " style="border-bottom: 2px solid #ddd; padding-right: 50px;">
  <a class="navbar-brand" href="<?php echo base_url(); ?>"><p class="text-primary"><h1>Sephine's Beauty Hub</h1>Your ONE STOP beauty shop.</p></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse justify-content-end" id="navbarColor01" ">
    <ul class="nav justify-content-center">
      <?php if ($this->session->userdata('user_type') === "Admin") : ?><li class="nav-item active">
        <a class="navbar-brand" href="<?php echo base_url(); ?>"><small><b>Home</b></small><span class="sr-only">(current)</span></a>
      </li><?php endif; ?> 
      <li class="nav-item active">
        <a class="navbar-brand" href="<?php echo base_url(); ?>carts"><small><b>Place Order</b></small><span class="sr-only">(current)</span></a>
      </li>
      <?php if ($this->session->userdata('user_type') === "Employee") : ?><li class="nav-item active">
        <a class="navbar-brand" href="<?php echo base_url(); ?>customers/cusLists"><small><b>Customers</b></small><span class="sr-only">(current)</span></a>
      </li><?php endif; ?> 
      <?php if ($this->session->userdata('user_type') === "Admin") : ?><li class="nav-item">
        <div class="dropdown">
          <a href="" class="navbar-brand toggle" data-toggle="dropdown"><small><b>Manage</b></small></a>
            <div class="dropdown-menu" style="margin-top: 10px;">
              <a class="dropdown-item" href="<?php echo base_url(); ?>customers/cusLists"><b>Customers</b></a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>categories"><b>Items & Categories</b></a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a href="" class="navbar-brand" data-toggle="dropdown"><small><b>Reports</b></small></a>
            <div class="dropdown-menu" style="margin-top: 10px;">
              <a class="dropdown-item" href="<?php echo base_url(); ?>orders/all_transaction"><b>Sales Reports</b></a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>orderlists/rankings"><b>Items Report</b></a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a href="" class="navbar-brand" data-toggle="dropdown"><small><b>Transactions</b></small></a>
            <div class="dropdown-menu" style="margin-top: 10px;">
              <a class="dropdown-item" href="<?php echo base_url(); ?>orders/cash_transaction"><b>By Cash Transactions</b></a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>orders/layaway_transaction"><b>Layaway Transactions</b></a>
            </div>
          </div>
        </li>
        <li class="nav-item">
          <div class="dropdown">
            <a href="" class="navbar-brand" data-toggle="dropdown"><small><img class="thumnail" src="<?php echo base_url();?>assets/img/admin.jpg"><b><?php echo $this->session->userdata('user_fname'); ?></b></small></a>
            <div class="dropdown-menu" style="margin-top: 9px; width: 10px; max-width: 10px;">
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#createModal"><b>Add Account</b></a>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#detail_modal"><b>Account</b></a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout"><b>Logout</b></a>
            </div>
          </div>
      </li><?php endif; ?>

      <?php if ($this->session->userdata('user_type') === "Employee") : ?>
      <li class="nav-item">
        <div class="dropdown">
          <a href="" class="navbar-brand" data-toggle="dropdown"><small><img class="thumnail" src="<?php echo base_url();?>assets/img/emp.jpg"><b><?php echo $this->session->userdata('user_fname'); ?></b></small></a>
          <div class="dropdown-menu" style="margin-top: 9px; min-width: 130px;">
              <a class="dropdown-item" href="<?php echo base_url(); ?>orders/layaway_transaction"><b>Account</b></a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout"><b>Logout</b></a>
            </div>
        </div>
      </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
  
<body>
  


  <div class="container">
    
    
    <?php if($this->session->flashdata('item_added')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('item_added').'</p>'; ?>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('item_updated')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('item_updated').'</p>'; ?>
    <?php endif; ?>
    
    <?php if($this->session->flashdata('category_created')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('category_updated')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_updated').'</p>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('user_loggedout')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
    <?php endif; ?>

    <?php if ($this->session->flashdata('unfilled_categoryName')): ?>
      <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('unfilled_categoryName').'</p>'; ?>
    <?php endif; ?>
  </div>
   <?php if($this->session->flashdata('item_deleted')): ?>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('item_deleted').'</p>'; ?>
</div>
    <?php endif; ?>
    
    
<div class="hey" >