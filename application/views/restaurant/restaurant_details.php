<div class="container-fluid image-full-section restaurant-photo">
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-xs">
			<div class="col-xs-12 restaurant-detail">
					
				<h2 style="display:inline;"><?php echo $restaurant->username.' ' ?></h2>
				<span class="rating">
					<h3 class="label label-info" style="font-size:12px;display:inline;line-height:15px;">3 / 5</h3><p style="font-size:10px;display:inline;margin-left:2px;">100 votes</p>
				</span>
				<p><?php echo $restaurant->cuisine.' ' ?></p>
				<p><?php echo $restaurant->opendays.' '.$restaurant->opentime.' - '.$restaurant->closetime?></p>
				<p><?php echo $restaurant->phone.' ' ?></p>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
		  <ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
		    <li><a data-toggle="tab" href="#menu1">Reviews</a></li>
		    <li><a data-toggle="tab" href="#menu2">Photos</a></li>
		  </ul>
		  
		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		    	<div class="row">
		    		<div class="col-md-8">
		    			<div class="panel-body"><h3 style="display:inline;" >Menu</h3><input type="number" name="" class="food-number pull-right" placeholder=" 0">
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.AAAAAAAAAAAAAAAAAAAAAAA</p>
					      <p>Price : $9</p>
					    </div>
		    			<div class="panel-body"><h3 style="display:inline;" >Menu</h3><input type="number" name="" class="food-number pull-right" placeholder=" 0">
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.AAAAAAAAAAAAAAAAAAAAAAA</p>
					      <p>Price : $9</p>
					    </div>
					    <div class="panel-body"><h3 style="display:inline;" >Menu</h3><input type="number" name="" class="food-number pull-right" placeholder=" 0">
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.AAAAAAAAAAAAAAAAAAAAAAA</p>
					      <p>Price : $9</p>
					    </div>
					    <p class="btn btn-warning pull-right">Add to Cart</p>
		    		</div>
		    		<div class="col-md-4">
		    			<div class="panel-body"><h3>Cart</h3>
					      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p></div>
					      <p class="btn btn-danger pull-right">Order Now</p>
		    		</div>
		    	</div>		
		    </div>

		    <div id="menu1" class="tab-pane fade">
		      <h3>Reviews</h3>
		      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
		    </div>

		    <div id="menu2" class="tab-pane fade">
		      <h3>Photos</h3>
		      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
		    </div>
		  </div>
		 </div>
	</div>
</div>

