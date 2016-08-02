<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
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