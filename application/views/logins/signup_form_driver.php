<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container padding-top-five">
<div class="row">
<?php if($this->session->flashdata('error')): ?>
  	<div class="alert alert-danger">
  		<?php echo $this->session->flashdata('error'); ?>
  	</div>
<?php endif; ?>		
	<div class="col-md-2"></div>
	<div class="col-md-8 col-xs-12">
		<div class="login">
		<div class="row">
			<div class="heading">
			    <h3>Register as Freelancer</h3>
			    <hr>
		    </div>
		</div>
		<div class="row">
			<?php echo form_open('accounts/signup_submit/driver', array('name'=>'signup_driver_form', 'id'=>'signUpDriverForm', 'onSubmit' => 'form_validation(); return false;')) ?>
				<div class="col-md-6">
					<div class="input-group input-group-lg">
				        <label for="username">Username</label>
				        <input type="text" name ="username" class="form-control">
				    </div>
			        <div class="input-group input-group-lg">
				        <label for="password">Password</label>
				        <input type="password" name = "password" class="form-control">
				    </div>
				    <div class="input-group input-group-lg">
				    	<label for="email">E-mail</label>
				        <input type="text" name = "email" class="form-control">
				    </div>
				    <div class="input-group input-group-lg">
				        <label for="telephone">Telephone</label>
				        <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-9999-9999)' class="form-control" name="telephone">
				        <!-- <input type="text" name = "telephone" class="form-control"> -->
				    </div>
				    <div class="input-group input-group-lg">
				        <label for="address">Address</label>
				        <div class="col-sm-13">
						<textarea name="address" class="form-control" rows="3" cols="30" style="font-size: 1.1em;border: 1px solid #5bc0de;border-radius: 3px;"></textarea></div>					      
				    </div>
			    </div>
			    <div class="col-md-6">
			    	<div class="input-group input-group-lg">
				        <label for="ird_number">IRD Number</label>
				        <input type="text" name = "ird_number" class="form-control">
				    </div>
				    <div class="input-group input-group-lg">
				        <label for="driver_license">Driver License</label>
				        <input type="text" name = "driver_license" class="form-control">
				    </div>
				    <div class="input-group input-group-lg">
				        <label for="license_type">License Type</label>
				        <select class="form-control" name="license_type" style="font-size: 1.1em;border: 1px solid #5bc0de;border-radius: 3px;">
				            <option value="learner">Learner</option>
				            <option value="restricted">Restricted</option>
				            <option value="full">Full License</option>
				        </select>
				    </div>
			    </div>
		</div>
			
			<table align="center">
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					    
					</td>
				</tr>
				<tr>
					<td>
					<input type="submit" name="submit" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;" value="Sign Up">
					</td>
				</tr>
			</table>
			</form>
		</div>
		</div>
	</div>
	
	<div class="col-md-2">	</div>
</div>
</div>
<script type="text/javascript">

	function validateEmail(email) {
	  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	  return re.test(email);
	}

	function form_validation(){

		var username = document.forms["signup_driver_form"]["username"].value;
		var password = document.forms["signup_driver_form"]["password"].value;
		var email = document.forms["signup_driver_form"]["email"].value;
		var telephone = document.forms["signup_driver_form"]["telephone"].value;
		var address = document.forms["signup_driver_form"]["address"].value;
		var ird_number = document.forms["signup_driver_form"]["ird_number"].value;
		var driver_license = document.forms["signup_driver_form"]["driver_license"].value;
		if(username == null || username == ""){
			alert("Username must be filled");
			return false;
		}
		else if(password == null || password == ""){
			alert("Password must be filled");
			return false;
		}
		else if(!validateEmail(email)){
			alert("Invalid email address");
			return false;
		}
		else if(telephone == null || telephone == ""){
			alert("Telephone must be filled");
			return false;
		}
		else if(address == null || address == ""){
			alert("Address must be filled");
			return false;
		}
		else if(ird_number == null || ird_number == ""){
			alert("IRD Number must be filled");
			return false;
		}
		else if(driver_license == null || driver_license == ""){
			alert("Driver License must be filled");
			return false;
		}
		else{
			document.getElementById('signUpDriverForm').submit();
		}

	}

</script>