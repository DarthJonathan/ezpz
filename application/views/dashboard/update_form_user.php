<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid padding-top-five">
<?php if($this->session->flashdata('success')): ?>
  	<div class="alert alert-success">
  		<?php echo $this->session->flashdata('success'); ?>
  	</div>
<?php endif; ?>

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
	var photo = document.forms["loginForm"]["photo"].value;

	if(firstname == null || firstname == '' && lastname == null || lastname == '' && photo == null || photo == '')
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
					<?php echo form_open_multipart('dashboard/complete_data/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Update User Account</h3>
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
						            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
						            <input type="text" name = "email" class="form-control" placeholder="Email">
						        </div>
						    </td>
						    </tr>
						    <tr>
						    <td>
						    	<div class="input-group input-group-lg">
						            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
						            <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-999-9999)' class="form-control" name="telephone" placeholder="Telephone">
						            <!-- <input type="text" name = "telephone" class="form-control" placeholder="Telephone"> -->
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
						            <input type="file" name = "photo" class="form-control" placeholder="Photo" required="required">
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
</div></div>