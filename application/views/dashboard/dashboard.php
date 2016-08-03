<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container-fluid">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="#">WebSiteName</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="#">Home</a></li>
	        <li><a href="#">Page 1</a></li>
	        <li><a href="#">Page 2</a></li> 
	        <li><a href="#">Page 3</a></li> 
	      </ul>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>
</div>
<div class="container fluid">
	<div class="row">
		<div class="col-sm-12">
			
		</div>
	</div>
</div>
		<div class="col-lg-1"></div>

			<div class="col-lg-10" style="background-color:gray;">
				
					<h2><?php echo $this->session->userdata('type'); ?></h2>
					<a href="<?php echo base_url('dashboard/logout') ?>"><h1> Logout </h1></a>
					
					<div class="col-md-3" style="background-color:black; height:200px" >	</div>
					<div class="col-md-3" style="background-color:grey; height:200px" >	</div>
					<div class="col-md-3" style="background-color:red; height:200px" >	</div>
					<div class="col-md-3" style="background-color:green; height:200px" >	</div>


			</div>

			<div class="col-lg-1"></div>
</div>


