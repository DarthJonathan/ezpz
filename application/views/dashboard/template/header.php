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

			background:#CCC;
			padding-top:4em;
			max-width:500px;
			min-height:250px;
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
			  
			}
			.login form input.form-control {
			  display: block;
			  width: auto;
			  height: auto;
			  border: none;
			  outline: none;
			  box-shadow: none;
			  background: none;
			  border-radius: 0px;
			  padding: 10px;
			  font-size: 1.6em;
			  width: 100%;
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