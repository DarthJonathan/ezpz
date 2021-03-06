<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid" style="padding-top:4%;">
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
<div class="row" style="padding-top:10px;">
		<!--Side Navigation-->
		<div class="col-sm-2 hidden-xs">
			<ul class="nav nav-pills nav-stacked">
				<li class="profile-pills" class="active"> <a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/complete_data"> Update Restaurant Page </a> </li>
				<li class="profile-pills"> <a href="<?php echo base_url(); echo $this->session->userdata('type'); ?>/change_login"> Update Login Details </a> </li>
			</ul>
		</div>
		<!--The content tabs-->
		<div class="col-sm-10">
			<ul class="nav nav-tabs">
			    <li class="active"><a data-toggle="tab" href="#info">Update Restaurant Info</a></li>
			    <li><a data-toggle="tab" href="#menu">Update Menu</a></li>
			    <li><a data-toggle="tab" href="#time">Update Business Time</a></li>
		  	</ul>
		  	<!--Restaurant Detail Tab-->
		  	<div class="tab-content">
				<div id="info" class="login tab-pane fade in active" style="margin-top:0px;">
					<?php echo form_open_multipart('clients/complete_data/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Update Restaurant Info</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
					    <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <label for="username">Username</label>
							        <input type="text" name ="username" class="form-control" value="<?php echo $userdata->username; ?>">
							    </div>
							</td>
						</tr>
						<tr>
							<td>
							    <div class="input-group input-group-lg">
							    	<label for="email">E-mail</label>
							        <input type="text" name = "email" class="form-control" value="<?php echo $userdata->email; ?>">
							    </div>
							</td>
						</tr>
						<tr>
							<td>
							    <div class="input-group input-group-lg">
							        <label for="tel">Telephone</label>
							        <input type='tel' pattern='[\+]\d{4}\d{4}\d{4}' title='Phone Number (Format: +9999-9999-9999)' class="form-control" name="telephone" value="<?php echo $userdata->phone; ?>">
							        <!-- <input type="text" name = "telephone" class="form-control"> -->
							    </div>
							</td>
						</tr>
						<tr>
							<td>
							    <div class="input-group input-group-lg">
							        <label for="address">Address</label>
							        <div class="col-sm-13">
									<textarea name="address" class="form-control" rows="3" cols="30" style="padding-left:20px;"><?php echo $userdata->address; ?></textarea></div>					      
							    </div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="input-group input-group-lg">
									<div id="map" style="height:400px; margin-top:1em; margin-bottom:1em;"></div>
									<div id="latlong">
									    <input size="20" type="hidden" id="latbox" name="lat" >
									    <input size="20" type="hidden" id="lngbox" name="lng" >
									  </div>
	 								<script>
								      var map;
								      function initMap() {
								      	

								        var myLatlng = new google.maps.LatLng(<?php if($userdata->latitude == NULL || $userdata->longitude == NULL){
								      		echo '-6.152402510005295,106.89429051052855';
								      		}else{
								      			echo $userdata->latitude.','.$userdata->longitude;
								      		}?>);

										var myOptions = {
										     zoom: 15,
										     center: myLatlng,
										     mapTypeId: google.maps.MapTypeId.ROADMAP
										     }
										  map = new google.maps.Map(document.getElementById("map"), myOptions); 

  										var marker = new google.maps.Marker({
										  draggable: true,
										  position: myLatlng, 
										  map: map,
										  title: "Your Restaurant"
										  });

										  google.maps.event.addListener(marker, 'dragend', function (event) {
											    document.getElementById("latbox").value = this.getPosition().lat();
											    document.getElementById("lngbox").value = this.getPosition().lng();
											    update_location();
											});
										 
								      }

								      function update_location(){

								      	lat = document.getElementById("latbox").value;
								      	lng = document.getElementById("lngbox").value;
								      	
										$.ajax({		                
											url: "<?php echo base_url(); ?>" + 'client/update_location/' + encodeURIComponent(lat) + '/' + encodeURIComponent(lng),
											type: 'GET',
											success: function(data) 
											{
									 			//location.reload();
											},
										});

								      }		
									
								    </script>
								    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmTsHuYy6fLCGmHRPZs20KRkEnfLE4anA&callback=initMap"
								    async defer></script>
								</div>
								
							</td>
						</tr>
						 <tr>
							<td>
							    <div class="input-group input-group-lg">
							        <label for="cuisine">Cuisine</label>
							        <input type="text" name ="cuisine" class="form-control" value="<?php echo $userdata->cuisine; ?>">
							    </div>
							</td>
						</tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="photo">Photo</label>
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
					            	<h3>Change Password</h3>
					            	<hr>
					            </div>
					        </td>
					    </tr>
						<tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="old_password">Old Password</label>
					            <input type="password" name ="old_password" class="form-control" placeholder="Old Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="new_password">New Password</label>
					            <input type="password" name ="new_password" class="form-control" placeholder="New Password" required="required">
					        </div>
					    </td>
					    </tr>
					    <tr>
					    <td>
					    	<div class="input-group input-group-lg">
					            <label for="conf_password">Confirm Password</label>
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
				</div><!--End of Restaurant info update-->
				<!--Menu Tab-->
				<div id="menu" class="tab-pane fade">
					<div class="row">
						<div class="col-xs-12"><?php echo form_open() ?>
							<div class="panel panel-default">
							  <div class="panel-heading">
							    <h3 class="panel-title">List Menu</h3>
							  </div>
							  <div class="panel-body">
							    	<table class="table table-striped">
							    		<thead>
							    			<tr>
							    				<th>No.</th>
							    				<th>Photo</th>
							    				<th>Name</th>
							    				<th>Price</th>
							    				<th>Action</th>
							    			</tr>
							    		</thead>
							    		<tbody>
							    			<?php $i = 1 ?>
							    			<?php foreach($dishes as $dish): ?>
							    			<tr>
							    				<td><?php echo $i ?></td>
							    				<td><img src="<?php echo base_url($dish->photo) ?>" width="50" alt=""></td>
							    				<td><?php echo $dish->name ?></td>
							    				<td><?php echo price($dish->price) ?></td>
							    				<td><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							    				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							    				</td>
							    			</tr>
							    			<?php $i++; ?>
							    			<?php endforeach; ?>
							    		</tbody>
							    	</table>
							  </div>
							</div>
						</div>
						<?php echo form_close() ?>
						<div class="col-xs-5">
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_menu">Add menu</button>
						</div>
					</div>
					<!--Menu Table end-->
					<!-- Modal -->
					<div class="modal fade" id="add_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					  <div class="modal-dialog" role="document">
					    <div class="modal-content login">
					      <div class="modal-header heading">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Add Menu</h4>
					      </div>
					      <?php echo form_open_multipart('clients/add_menu') ?>
					      <div class="modal-body">
					        	<div class="form-group">
					        		<label for="name">Name</label>
					        		<input type="text" class="form-control" name="name" value="" placeholder="Dish's Name" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="price">Price</label>
					        		<input type="number" class="form-control" name="price" value="" placeholder="Dish's Price" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="photo">Photo</label>
					        		<input type="file" class="form-control" name="photo" value="" placeholder="Dish's Photo" required="1">
					        	</div>
					        	<div class="form-group">
					        		<label for="description">Description</label>
					        		<textarea class="form-control" name="price" value="" placeholder="Dish's Description" rows="3" cols="35" style="font-size: 1.1em;border: 1px solid #5bc0de;border-radius: 3px;"></textarea>
					        	</div>
					      </div>
					      <div class="modal-footer">
					        <input type="submit" value="Save changes" name="submit" class="btn btn-primary">
					        <input type="submit" class="btn btn-danger" data-dismiss="modal" value="Close">
					      </div>
					      <?php echo form_close() ?>
					    </div>
					  </div>
					</div>
				</div><!--End of menu tab-->
				<!--Update Restaurant Time-->
				<div id="time" class="login tab-pane fade">
					<?php echo form_open('dashboard/change_password/submit') ?>
					<table align="center">
						<tr>
					    	<td>
					        	<div class="heading">
					            	<h3>Change Password</h3>
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
			</div><!--End of tab content-->
		</div>
</div>
</div>