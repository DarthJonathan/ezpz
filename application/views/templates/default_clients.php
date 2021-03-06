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
	<link href='https://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>



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
		
		<nav class="navbar navbar-default navbar-fixed-top" id="navbar" style="background-color:#5bc0de;">
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

<div class="cart">
	<a href="<?php echo base_url('cart/overview') ?>"><?php echo $this->cart->total_items() ?><i class="fa fa-shopping-cart fa-2x" aria-hidden="true" style="font-size:1.7em"></i></a>
</div>

<div id="main">
	<?php echo $body ?>
</div>

<!--Navbar End-->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?php echo base_url(); ?>js/jquery-1.11.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

<script>
	var waypoint = new Waypoint({
	  element: document.getElementById('search'),
	  handler: function(direction) {
	  	document.getElementById('navbar').style.backgroundColor = '#5bc0de';
	 
	   	
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

<script>

	var test = [""];
	<?php $i = 0; ?>

	<?php foreach ($restaurants as $restaurant): ?>
		test[<?php echo $i ?>] = "<?php echo $restaurant['username'] ?>"
		<?php $i++; ?>
	<?php endforeach; ?>

	$("#restaurant-search").typeahead({

	                        minLength: 0,
	                        items: 9999,
	                        source: test,   
	                    });


</script>


<script>

	function submit(){

		$("#search").submit();
}

</script>

</body>
</html>