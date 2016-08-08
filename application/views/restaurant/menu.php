<?php echo form_open() ?>
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
				<p><?php echo $restaurant->opendays.' '.date('H:i',strtotime($restaurant->opentime)).' - '.date('H:i',strtotime($restaurant->closetime)) ?></p>
				<p><?php echo $restaurant->phone.' ' ?></p>
			</div>
		</div>
	</div>
</div>

<?php echo form_close() ?>