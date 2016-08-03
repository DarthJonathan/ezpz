<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">

			<div class="col-lg-1"></div>

			<div class="col-lg-10" style="background-color:gray;">
				
					<h2><?php echo $this->session->userdata('type'); ?></h2>
					<a href="<?php echo base_url('dashboard/logout') ?>"><h1> Logout </h1></a>
					
					<div class="col-md-3" style="background-color:black; height:200px" ></div>
					<div class="col-md-3" style="background-color:grey; height:200px" >	</div>
					<div class="col-md-3" style="background-color:red; height:200px" >	</div>
					<div class="col-md-3" style="background-color:green; height:200px" >	</div>
					
					<a href="<?php echo base_url('dashboard/restaurants') ?>"><h2>Restaurant</h2></a>

			</div>

			<div class="col-lg-1"></div>
</div>


