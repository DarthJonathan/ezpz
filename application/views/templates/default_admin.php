<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?> - EZPZ</title>
    
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/flat-ui.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.css" type="text/css" rel="stylesheet">
    <!-- Begin Scripts -->
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>js/flat-ui.min.js"></script>
    
    <style>
		@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700);
		@import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css);
		@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);
	
		
		body
		{
			background-image: url("images/login/display.jpg");
			background-size:100% 100%;
			background-repeat: no-repeat;
    		background-attachment: fixed;
		}
		
		.login{

			background:#F0F0F2;
			padding-top:4em;
			border-radius:10px;
			padding: 15px;
			margin: 1% auto 0 auto;
		}

		
		#logoBig{
			margin-top:20%;
			max-height:400px;
			max-width:400px;	
		}
			
			.login .heading {
			  text-align: center;
			  margin-top: 1%;
			}
			.login .heading h3 {
			  font-size: 3em;
			  font-weight: 300;
			  color: black;
			  display: inline-block;
			  font-weight: bold;
			  padding-bottom: 5px;
			  
			}
			.login form .input-group {
			  border-bottom: 1px solid #AAA;
			  border-top: 1px solid rgba(255, 255, 255, 0.1);
			  width: 100%;
			}
			.login form .input-group:last-of-type {
			  border-top: none;
			}
			.login form .input-group span {
			  background: transparent;
			  min-width: 53px;
			  border: none;
			}
			.login form .input-group span i {
			  font-size: 1.5em;
			  width: 50px;
			}
			.login form input.form-control {
			  display: block;
			  height: auto;
			  border: none;
			  outline: none;
			  box-shadow: none;
			  background: none;
			  border-radius: 0px;
			  padding: 10px;
			  font-size: 1.6em;
			  background: transparent;
			  color: black;
			}
			.login form input.form-control:focus {
			  border: none;
			}
			.login form button {
			  margin-top: 20px;
			  background: #27AE60;
			  border: none;
			  font-size: 1.6em;
			  font-weight: 300;
			  padding: 5px 0;
			  width: 100%;
			  border-radius: 3px;
			  color: #b3eecc;
			  border-bottom: 4px solid #1e8449;
			}
			.login form button:hover {
			  background: #30b166;
			  -webkit-animation: hop 1s;
			  animation: hop 1s;
			}
			
			.float {
			  display: inline-block;
			  -webkit-transition-duration: 0.3s;
			  transition-duration: 0.3s;
			  -webkit-transition-property: transform;
			  transition-property: transform;
			  -webkit-transform: translateZ(0);
			  transform: translateZ(0);
			  box-shadow: 0 0 1px transparent;
			}
			
			.float:hover, .float:focus, .float:active {
			  -webkit-transform: translateY(-3px);
			  transform: translateY(-3px);
			}

			/* The side navigation menu */
			.sidenav {
			    height: 100%; /* 100% Full-height */
			    width: 0; /* 0 width - change this with JavaScript */
			    position: fixed; /* Stay in place */
			    z-index: 1; /* Stay on top */
			    top: 0;
			    left: 0;
			    background-color: #111; /* Black*/
			    overflow-x: hidden; /* Disable horizontal scroll */
			    padding-top: 60px; /* Place content 60px from the top */
			    transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
			}

			/* The navigation menu links */
			.sidenav a {
			    padding: 8px 8px 8px 32px;
			    text-decoration: none;
			    font-size: 25px;
			    color: #818181;
			    display: block;
			    transition: 0.3s
			}

			/* When you mouse over the navigation links, change their color */
			.sidenav a:hover, .offcanvas a:focus{
			    color: #f1f1f1;
			}

			/* Position and style the close button (top right corner) */
			.sidenav .closebtn {
			    position: absolute;
			    top: 0;
			    right: 25px;
			    font-size: 36px;
			    margin-left: 50px;
			}

			/* Style page content - use this if you want to push the page content to the right when you open the side navigation */
			#main {
			    transition: margin-left .5s;
			    padding: 20px;
			}

			/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
			@media screen and (max-height: 450px) {
			    .sidenav {padding-top: 15px;}
			    .sidenav a {font-size: 18px;}
			}

			#menu-button{
			
			background-color: transparent;
			border : 1px solid #CCC;
			border-radius: 5px;
			

			}

			#menu-button:hover{
				background-color: #FFF12C;
				-webkit-transition: all 1s ease;
				-moz-transition: all 0.6s ease;
				-ms-transition: all 0.6s ease;
				-o-transition: all 0.6s ease;
				transition: all 0.6s ease;
			}

			#background-btn{

				padding-top: 50px;

			}

			
			.bottom-align-text {
			    position: absolute;
			    bottom: 0;
			    width: 100%;
			    font-size: 10px;
		    }

		    .sidenav a{
		    	font-size: 18px;
		    	border-bottom: 1px solid black;
		    }
	
	</style>
    
</head>

<body>

<div id="mySidenav" class="sidenav">
<div class="company_logo" style="margin-bottom: 30px; padding-left: 32px">
	  	<h2>EZPZ</h2>
	  </div>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="#">Drivers</a>
  <a href="#">Users</a>
  <a href="#">Partners</a>
  <a href="#">Unapproved Partners</a>
  <a href="<?php echo base_url('admin/logout') ?>"><span class="glyphicon glyphicon-log-in"></span> Logout</a>
</div>

<!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<div id="main">
	<div class="row">
	  	<div class="col-xs-2">
	  		<div id="background-btn" class="col-xs-4">
				<button id="menu-button" onclick="openNav()"><img src="<?php echo base_url() ?>assets/menu.png" width="30" alt="">
				</button>
			</div>
	  	</div>
	  	<div class="col-xs-8">
		  	<div class="row">
		  		<div class="col-sm-4"></div>
		  		<div class="col-sm-4 text-center">
		  			<a href="<?php echo base_url('home') ?>"><img src="<?php echo base_url() ?>assets/rwlogo.jpg" style="margin-bottom:10px; padding-top: 20px;width:100%" class="img img-responsive" alt="">
		  			</a>
		  		</div>
		  		<div class="col-sm-4">
		  			
		  		</div>
	  		</div>
	  	</div>
	  	<div class="col-xs-2"><h5 style="padding-top: 50px" class="pull-right">Welcome, <?php echo $this->session->userdata('admin_username') ?></h5></div>
	  </div>
	  <hr>
	  <div class="row">
			<div class="col-xs-12">
				<?php echo $body ?>
			</div>
		</div>
	</div>
</div>

<script>
	/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
}
</script>
				


<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>