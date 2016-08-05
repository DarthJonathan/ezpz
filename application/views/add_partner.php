<div class="container-fluid" style="padding-top:5%;">
		
		<div class="col-md-6">

				<div class="login">
					<?php echo form_open('main/add_partner/submit', array ("id" => "loginForm", 'name' => 'loginForm', 'onSubmit' => 'formValidate(); return false')) ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Partner Registration</h3>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Restaurant's Brand</span>
					            <input type="text" name ="name" class="form-control" required>
					        </div>
					    </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Address</span>
					            <input type="text" name = "address"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Telephone</span>
					            <input type="text" name = "telephone"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Cuisine</span>
					            <select multiple="multiple" id="cuisine-select" name="cuisine-select[]">
								  <option value='elem_1'>Asian</option>
								  <option value='elem_2'>Italian</option>
								  <option value='elem_3'>Indonesian</option>
								  <option value='elem_4'>African</option>
								</select>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Open time</span>
					            <input type="time" name = "opentime"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Close time</span>
					            <input type="time" name = "closetime"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Open Days</span>
					            <select multiple="multiple" id="cuisine-select" name="cuisine-select[]">
								  <option value='day_1'>Monday</option>
								  <option value='day_2'>Tuesday</option>
								  <option value='day_3'>Wednesday</option>
								  <option value='day_4'>Thursday</option>
								  <option value='day_2'>Friday</option>
								  <option value='day_3'>Saturday</option>
								  <option value='day_4'>Sunday</option>
								</select>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <span class="input-group-addon">Photo</span>
					            <input type="file" name = "photo"  class="form-control"  required>
					        </div>
					    </td>
					    </tr>
					    <tr>
					    	<td><input type="submit" name="submit" value="Login" onClick="submitForm ()" id="loginButton" class="btn btn-block btn-lg btn-primary float" style="display: block; margin-top:1em; width: 100%;"></td>
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

	

</div>

