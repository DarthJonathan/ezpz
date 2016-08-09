<?php echo form_open() ?>
<div class="container-fluid image-full-section restaurant-photo">
</div>
	
		
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 restaurant-detail">
					
				<h2 style="display:inline;"><?php echo $restaurant->username.' ' ?></h2>
				<span class="rating">
					<h3 class="label label-info" style="font-size:12px;display:inline;line-height:15px;">3 / 5</h3><p style="font-size:10px;display:inline;margin-left:2px;">100 votes</p>
				</span>
				<p><?php echo $restaurant->cuisine.' ' ?></p>
				<p><?php echo $restaurant->opendays.' '.date('H:i',strtotime($restaurant->opentime)).' - '.date('H:i',strtotime($restaurant->closetime)) ?></p>
				<p><?php echo $restaurant->phone.' ' ?></p>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-7">
			<div class="panel panel-default">
			  <div class="panel-heading">
			    <h3 class="panel-title">List Menu</h3>
			  </div>
			  <div class="panel-body">
			    	<table class="table table-striped">
			    		<thead>
			    			<tr>
			    				<td>No.</td>
			    				<td>Photo</td>
			    				<td>Name</td>
			    				<td>Price</td>
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
			    			</tr>
			    			<?php $i++; ?>
			    			<?php endforeach; ?>
			    		</tbody>
			    	</table>
			  </div>
			</div>
		</div>
		<div class="col-xs-5">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_menu">Add menu</button>
		</div>
	</div>
</div>

<?php echo form_close() ?>


<!-- Modal -->
<div class="modal fade" id="add_menu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Menu</h4>
      </div>
      <?php echo form_open_multipart('clients/add_menu') ?>
      <div class="modal-body">
        	<div class="form-group">
        		<label for="">Name :</label>
        		<input type="text" class="form-control" name="name" value="" placeholder="Dish's Name" required="1">
        	</div>
        	<div class="form-group">
        		<label for="">Price :</label>
        		<input type="number" class="form-control" name="price" value="" placeholder="Dish's Price" required="1">
        	</div>
        	<div class="form-group">
        		<label for="">Photo :</label>
        		<input type="file" class="form-control" name="photo" value="" placeholder="Dish's Photo" required="1">
        	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" value="Save changes" name="submit" class="btn btn-primary">
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>