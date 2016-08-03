<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
		
<?php if($this->session->flashdata('error')): ?>
	<div class="alert alert-danger">
		<?php echo $this->session->flashdata('error') ?>
	</div>
<?php endif; ?>

<script>

function formValidate ()
{
	var firstname = document.forms["loginForm"]["firstname"].value;
	var lastname = document.forms["loginForm"]["lastname"].value;
	var photoF = document.forms["loginForm"]["photo_front"].value;
	var photoB = document.forms["loginForm"]["photo_back"].value;
	var photoP = document.forms["loginForm"]["photo"].value;

	if(firstname == null || firstname == '' && lastname == null || lastname == '' && photoF == null || photoF == '' && photoB == null || photoB == '' && photoP == null || photoP == '')
	{
		alert('Please Fill All Login Form');
		return false;
	}
	else
	{
		document.getElementById('loginForm').submit();
	}
}

</script>

		<div class="col-md-6"></div>

		<div class="col-md-6">	
		
				<div class="login">
					<?php echo form_open_multipart('dashboard/complete_data/submit/driver') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Update Driver Account</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="text" name ="firstname" class="form-control" placeholder="First Name" required="required">
					        </div>
					    </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="text" name = "lastname" class="form-control" placeholder="Last Name" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="file" name = "photo_front" class="form-control" placeholder="Licence Photo Front" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="file" name = "photo_back" class="form-control" placeholder="Licence Photo Behind" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
					            <input type="file" name = "photo" class="form-control" placeholder="Profile Photo" required="required">
					        </div>
					    </td>
					    </tr>
					   	<tr>
					    	<td>
					    	<input type="submit" name="submit" value="Update" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;">
					    	</td>
						</tr>
					</table>
					</form>

					<?php echo form_open('dashboard/change_password/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Update Driver Password</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="password" name ="old_password" class="form-control" placeholder="Old Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="password" name ="new_password" class="form-control" placeholder="New Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon"><i class="fa fa-user"></i></span>
					            <input type="password" name ="conf_password" class="form-control" placeholder="Confirm Password" required="required">
					        </div>
					    </td>
					    </tr>
					   	<tr>
					    	<td>
					    	<input type="submit" name="submit" value="Update" class="btn btn-block btn-lg btn-primary float" id="loginButton" style="display: block; margin-top:1em; width: 100%;">
					    	</td>
						</tr>
					</table>
					</form>
				</div>

		</div>

</div>