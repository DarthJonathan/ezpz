<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->flashdata('failed')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('failed') ?>
	</div>
<?php endif; ?>


<?php if($this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error') ?>
	</div>
<?php endif; ?>

		<div class="col-md-4">	</div>

		<div class="col-md-4">

				<div class="login">
					<?php echo form_open('main/login', array ("id" => "loginForm")) ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Sign In</h3>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="text" name ="username" class="form-control" placeholder="Username">
					        </div>
					    </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="password" name = "password" class="form-control" placeholder="Password">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    	<td><input type="submit" name="submit" value="Login" onClick="submitForm ()" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;"></td>
						</tr>
					   	 <tr>
					    	<td><a href="<?php echo base_url('main/signup')?>" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;">Sign Up</a></td>
						</tr>
						<tr>
					    	<td><a href="<?php echo base_url('main/signup/driver')?>" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;">Sign Up as Driver</a></td>
						</tr>
						<tr>
					    	<td><a href="<?php echo base_url('main/forget')?>" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;">Forget Password</a></td>
						</tr>
					</table>
					</form>
				</div>

		</div>

		<div class="col-md-4">	</div>




		