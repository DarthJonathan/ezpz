<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign Up - EZPZ</title>
    
    <!-- Stylesheet -->
    <link href="<?php echo base_url() ?>css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/flat-ui.min.css" type="text/css" rel="stylesheet">
    
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

			background:#F2F4F5;
			padding-top:4em;
			border-radius:10px;
			padding: 20px;
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
			  font-size: 2em;
			  font-weight: 200;
			  color: black;
			  display: inline-block;
			  font-weight: bold;
			  padding-bottom: 5px;
			  
			}
			.login form .input-group {
				width: 100%;
			  border-bottom: 1px solid #AAA;
			  border-top: 1px solid rgba(255, 255, 255, 0.1);
			}
			.login form .input-group:last-of-type {
			  border-top: none;
			}
			.login form .input-group span {
			  background: transparent;
			  min-width: 53px;
			  width: 240px;
			  border: none;
			  text-align: left;
			}
			.login form .input-group span i {
			  font-size: 1.5em;
			  width: 100px;
			  
			}
			.login form input.form-control {
			  display: block;
			  width: auto;
			  height: auto;
			  border: none;
			  outline: none;
			  box-shadow: none;
			  background: none;
			  border-radius: 5px;
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

<div id="row">
	<div class="col-xs-12 col-md-1"></div>

	<div class="col-xs-12 col-md-10">
          
          <nav class="navbar navbar-inverse">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url() ?>">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Rate</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#">Log In</a></li>
                    <li role="separator" class="divider"></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>

		<?php if($this->session->flashdata('failed')): ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('failed') ?>
			</div>
		<?php endif; ?>

		<div class="col-md-1"></div>

			<div class="col-md-10">
				<div class="login">
					<?php echo form_open('main/signup_submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Register as Freelancer</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Username</span>
					            <input type="text" name ="username" class="form-control" placeholder="Username">
					        </div>
					    </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Password</span>
					            <input type="password" name = "password" class="form-control" placeholder="Password">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">E-mail</span>
					            <input type="text" name = "email" class="form-control" placeholder="Email">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Telephone</span>
					            <input type="text" name = "telephone" class="form-control" placeholder="Telephone">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Address</span>
					            <div class="col-sm-13">
								<textarea name="address" class="form-control" placeholder="Address" rows="3" cols="35"></textarea></div>					      
					        </div>
					    </td></tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">IRD Number</span>
					            <input type="text" name = "ird_number" class="form-control" placeholder="IRD Number">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    	<td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Driver License</span>
					            <input type="text" name = "driver_license" class="form-control" placeholder="E-mail">
					        </div>
					    	</td>
					    </tr>
					    <tr>
					    	<td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">License Type</span>
					            <select class="form-control" name="license_type">
					            	<option value="learner">Learner</option>
					            	<option value="restricted">Restricted</option>
					            	<option value="full">Full License</option>
					            </select>
					        </div>
					    	</td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Photo License (Front)</span>
					            <input type="file" name = "front-license" class="form-control" placeholder="Photo">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Photo License (Back)</span>
					            <input type="file" name = "back-license" class="form-control" placeholder="Photo">
					        </div>
					    </td>
					    </tr>
					   	<tr>
					    	<td><a href="<?php echo base_url('main/signup_submit')?>" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;">Sign Up</a></td>
						</tr>
					</table>
					</form>
				</div>
			</div>
		</div>


	<div class="col-xs-12 col-md-1"></div>

</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

</body>
</html>