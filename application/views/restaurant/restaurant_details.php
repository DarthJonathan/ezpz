<div class="container-fluid image-full-section">
	<div class="row">
		<form role="form">
		<div class="form-group center-block">
			<div class="input-group">
				<input type="text" name="restaurant-search" class="form-control" id="restaurant-search" placeholder="Search for restaurant name">
				<span class="input-group-btn">
 				<button class="btn btn-default" type="submit">
          		<span class="glyphicon glyphicon-search"></span>
			</div>
		</div>
	</form>
	</div>
</div>
<div class="container-fluid padding-top-five">
	<h2 style="margin-left:1%;"><?php echo $restaurant->username ?></h2>
	<hr></hr>
	<div class="col-md-4 col-xs-12">
		<div class="panel panel-default panel-horizontal">
		    <div class="panel-body">
		        <p class="brand">Restaurant Brand</p>
				<p>Address</p>
				<p>Open Hour : <?php echo date('H:i',strtotime($restaurant->opentime)).' - '.date('H:i',strtotime($restaurant->closetime))  ?></p>
		    </div>
		    <div class="panel-heading">
		        <p>Image</p>
		    </div>
		</div>
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="panel panel-default panel-horizontal">
		    <div class="panel-body">
		        <p class="brand">Restaurant Brand</p>
				<p>Address</p>
				<p>Open</p>
		    </div>
		    <div class="panel-heading">
		        <p>Image</p>
		    </div>
		</div>
	</div>
	<div class="col-md-4 col-xs-12">
		<div class="panel panel-default panel-horizontal">
		    <div class="panel-body">
		        <p class="brand">Restaurant Brand</p>
				<p>Address</p>
				<p>Open</p>
		    </div>
		    <div class="panel-heading">
		        <p>Image</p>
		    </div>
		</div>
	</div>
</div>
