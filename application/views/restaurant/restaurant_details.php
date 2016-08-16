<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-xs-12 restaurant-detail">
					
				<h2 style="display:inline;"><?php echo $restaurant->username.' ' ?></h2>
				<span class="rating">
					<h3 class="label label-info" style="font-size:12px;display:inline;line-height:15px;">3 / 5</h3><p style="font-size:10px;display:inline;margin-left:2px;">100 votes</p>
				</span>
				
				
				<p><?php echo $restaurant->telephone.' ' ?></p>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
		  <ul class="nav nav-tabs">
		    <li class="active"><a data-toggle="tab" href="#home">Menu</a></li>
		    <li><a data-toggle="tab" href="#review">Reviews</a></li>
		    <li><a data-toggle="tab" href="#menu2">Photos</a></li>
		  </ul>
		  <div class="tab-content">
		    <div id="home" class="tab-pane fade in active">
		    	<?php foreach($dishes as $dish): ?>
		    	<?php echo form_open('cart/add') ?>
		    	<div class="row">
		    		<div class="col-xs-2 hidden-xs" style="margin-bottom:5px; ">
		    			<img class="img-responsive" width="60" src="<?php echo base_url().$dish->photo ?>" alt="">
		    		</div>
		    		<div class="col-xs-10" style="padding-left:0px">
		    			<div class="panel-body"><h3 style="display:inline;" ><?php echo $dish->name ?></h3><input type="number" name="quantity" class="food-number pull-right" required placeholder=" 0">
					      <p><?php echo $dish->description ?></p>
					      <p>Price : $<?php echo $dish->price ?></p>
					    </div>
					    
					    <!-- Get Dishes Ids -->
					    <input type="hidden" value="<?php echo $dish->id ?>" name="dish_id">
					    <input type="hidden" value="<?php echo $dish->restaurant_id ?>" name="resto_id">
					    
					    <!-- Get URL -->
					    <input type="hidden" value="<?php echo uri_string(); ?>" name="url">
		    			
		    			<input type="submit" value="Add to Cart" class="btn btn-primary pull-right">
		    		</div>
		    	</div>
		    	<?php echo form_close() ?>					    	
		    	<?php endforeach; ?>
		    </div>

		    <div id="review" class="tab-pane fade">
		      <h3>Reviews</h3>
		      <div class="row">
		      	<div class="col-md-1"></div>
		      	<div class="col-md-11">
		      		<div class="row">
		      			<ul id="rating">
						   <li><a href="#">This is just a piece of crap</a></li>
						   <li><a href="#">Nothing too new or interesting</a></li>
						   <li><a href="#">Not bad, I like it</a></li>
						   <li><a href="#">I would like to see more of this</a></li>
						   <li><a href="#">This is the best thing I've seen</a></li>
						</ul>
		      		</div>
		      		<div class="row">
		      			<textarea></textarea>
		      		</div>
		      	</div>
		      	
		      </div>
		    </div>

		    <div id="menu2" class="tab-pane fade">
		      <h3>Photos</h3>
		      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
		    </div>
		  </div>
		 </div>
	</div>
</div>
<script type="text/javascript">
	// Variable to set the duration of the animation
	var animationTime = 500;
	   
	// Variable to store the colours
	var colours = ["bd2c33", "e49420", "ecdb00", "3bad54", "1b7db9"];
	// Add rating information box after rating
	var ratingInfobox = $("<div />")
	   .attr("id", "ratinginfo")
	   .insertAfter($("#rating"));
	 
	// Function to colorize the right ratings
	var colourizeRatings = function(nrOfRatings) {
	   $("#rating li a").each(function() {
	      if($(this).parent().index() <= nrOfRatings) {
	         $(this).stop().animate({ backgroundColor : "#" + colours[nrOfRatings] } , animationTime);
	      }
	   });
	};
 
// Handle the hover events
$("#rating li a").hover(function() {
      
   // Empty the rating info box and fade in
   ratingInfobox
      .empty()
      .stop()
      .animate({ opacity : 1 }, animationTime);
      
   // Add the text to the rating info box
   $("<p />")
      .html($(this).html())
      .appendTo(ratingInfobox);
      
   // Call the colourize function with the given index
   colourizeRatings($(this).parent().index());
}, function() {
      
   // Fade out the rating information box
   ratingInfobox
      .stop()
      .animate({ opacity : 0 }, animationTime);
      
   // Restore all the rating to their original colours
   $("#rating li a").stop().animate({ backgroundColor : "#333" } , animationTime);
});
   
// Prevent the click event and show the rating
$("#rating li a").click(function(e) {
   e.preventDefault();
   alert("You voted on item number " + ($(this).parent().index() + 1));
</script>