<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
		
		<div class="col-md-1"></div>

			<div class="col-md-10">
				
					<h2><?php echo $this->session->userdata('type'); ?></h2>
					<a href="<?php echo base_url('dashboard/logout') ?>"><h1> Logout </h1></a>

			</div>
		</div>
</div>