<div class="container padding-top-five">
	<div class="row">
		<?php if($this->session->flashdata('error')): ?>
		  	<div class="alert alert-danger">
				<?php echo $this->session->flashdata('error'); ?>
			</div>
		<?php endif; ?>	
		<div class="col-md-6">
				<div class="login">
					<?php echo form_open_multipart('accounts/signup_submit/client', array ("id" => "loginForm", 'name' => 'loginForm', 'onSubmit' => 'formValidate(); return false')) ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Partner Registration</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="name">Restaurant Name</label>
					            <input type="text" name ="name" class="form-control" required>
					        </div>
					    </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="address">Address</label>
					            <textarea name="address" class="form-control" rows="3" cols="30" style="font-size: 1.1em;border: 1px solid #5bc0de;border-radius: 3px;"></textarea>			
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="telephone">Telephone</label>
					            <input type="text" name = "telephone"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="email">E-mail</label>
					            <input type="text" name = "email"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="opendays">Open Days</label>
					            <select class="form-control" id="multiDays" multiple="multiple" name="opendays[]">
						            <option value="Monday">Monday</option>
						            <option value="Tuesday">Tuesday</option>
						            <option value="Wednesday">Wednesday</option>
						            <option value="Thursday">Thursday</option>
						            <option value="Friday">Friday</option>
						            <option value="Saturday">Saturday</option>
						            <option value="Sunday">Sunday</option>
						        </select>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="opentime">Open Time</label>
					            <input type="time" name = "opentime"  class="form-control" height="20px" required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="closetime">Close Time</label>
					            <input type="time" name = "closetime"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="cuisine">Cuisine</label>
					            <select class="form-control" id="multi" multiple="multiple" name="cuisine[]">
						            <option value="Asian">Asian</option>
						            <option value="Italian">Italian</option>
						            <option value="Indonesian">Indonesian</option>
						        </select>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="photo">Restaurant Photo</label>
					            <input type="file" name = "photo"  class="form-control" required >
					        </div>
					    </td>
					    </tr>
					    <tr>
					    	<td><input type="submit" name="submit" value="Login"  id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;"></td>
						</tr>
							
					   	 
					</table>
					</form>
					
					
				</div>

		</div>

		<div class="col-md-6">	</div>
		<div id="map" style="height:600px"></div>
    
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmTsHuYy6fLCGmHRPZs20KRkEnfLE4anA&callback=initMap">
    </script>
    
	<script>
		$('#multi').multiSelect();
		$('#multiDays').multiSelect();
	</script>
	
	</div>
</div>

