<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php if($this->session->flashdata('success')): ?>
  	<div class="alert alert-success">
  		<?php echo $this->session->flashdata('success'); ?>
  	</div>
<?php endif; ?>

		<div class="col-md-6">

		
		</div>

		<div class="col-md-6">	
		
				<div class="login">
					<?php echo form_open('main/signup_submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Register User Account</h3>
					            	<hr>
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
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
					            <input type="text" name = "email" class="form-control" placeholder="Email">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
					            <input type="text" name = "telephone" class="form-control" placeholder="Telephone">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-home"></i></span>
					            <div class="col-sm-13">
								<textarea name="address" class="form-control" placeholder="Address" rows="3" cols="35"></textarea>
								</div>	
					        </div>
					    </td>
					    </tr>
					   	<tr>
					    	<td>
					    	<input type="submit" name="submit" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;">
					    	</td>
						</tr>
					</table>
					</form>
				</div>

		</div>

	</div>

</div>