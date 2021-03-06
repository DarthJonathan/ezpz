<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $page_title; ?> - EZPZ</title>
    
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/restaurant-custom.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    
	<link href="<?php echo base_url() ?>font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>css/multi-select.css" rel="stylesheet">



    <!-- Begin Scripts -->
    <script src="<?php echo base_url() ?>js/jquery-3.1.0.js"></script>
	<script src="<?php echo base_url() ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url() ?>js/flat-ui.min.js"></script>
    
    <script src="<?php echo base_url() ?>js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url() ?>js/jquery.multi-select.js"></script>


    
    <style>
		@import url(https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,700);
		@import url(https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css);
		@import url(https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css);
	
		body
		{
			
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
	
	</style>
    
</head>

<body>
<header>
<!--NavBar-->
<div class="container-fluid">
	<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span> 
	      </button>
	      <a class="navbar-brand" href="<?php echo base_url('main') ?>">EZPZ</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-left">
	        <li><a href="<?php echo base_url('main') ?>" class="nav-link">Home</a></li>
	        <li><a href="<?php echo base_url('main/about/') ?>" class="nav-link">About Us</a></li>
	        <li><a href="<?php echo base_url('restaurant/cuisine/') ?>" class="nav-link">Restaurants</a></li> 
	        
	        <!-- Menu Available available in diffrent login types -->
	        <?php if($this->session->userdata('type') == 'user'): ?>
	        	<li><a href="#" class="nav-link">Top Up Wallet</a></li>
	        <?php elseif($this->session->userdata('type') == 'driver'): ?>
				<li><a href="#" class="nav-link">Top Up Wallet</a></li>
	    	<?php endif; ?>
	        
	      	<li role="separator" class="divider" style="background-color: white; height: 1px"></li>
	      </ul>

	      <?php if(!$this->session->userdata('user_id')) : ?>		
	      <ul class="nav navbar-nav navbar-right">
	      
	        <li><a href="<?php echo base_url('accounts/signup') ?>"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
	        <li><a href="<?php echo base_url('accounts/') ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
	      </ul>
		  <?php else : ?>
		  <ul class="nav navbar-nav navbar-right">
		  	<li></li>
	        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $this->session->userdata('username') ?>
        	<span class="caret"></span></a>
		        <ul class="dropdown-menu" style="background-color: #000;">

		        <?php if($this->session->userdata('type') == 'user' || $this->session->userdata('type') == 'driver' || $this->session->userdata('type') == 'clients'): ?>
		          <li><a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/complete_data" class="nav-link">Edit Profile</a></li>
				<?php endif; ?>
				  <?php echo $this->session->userdata('type') == 'clients' ? '<li><a href="'.base_url().$this->session->userdata('type').'/menu">Edit Menu</a></li>' : '';  ?>

		          <li><a href="#">Top Up Wallet</a></li>
		        </ul>
	        </li>
	        <li><a href="<?php echo base_url('accounts/logout') ?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>

	      </ul>
	  	  <?php endif; ?>

	    </div>
	  </div>
	</nav>
</div>
</header>

<div id="main">
<?php echo $body ?>
</div>

<!--Navbar End-->
				<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

    <script>
    	var waypoint = new Waypoint({
		  element: document.getElementById('main'),
		  handler: function(direction) {
		  	document.getElementById('navbar').style.backgroundColor = "black";
		 
		   	
		  }
		});

		
    </script>
	
	<script>
		var waypoint2 = new Waypoint({
		  element: document.getElementById('top'),
		  handler: function(direction) {
		  	document.getElementById('navbar').style.backgroundColor = "transparent";
		 
		   
		  },
		  offset: '-20%'
		});
	</script>
	</body>
	</html>