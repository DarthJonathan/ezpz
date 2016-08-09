<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<br><br><br><br><br>
<!-- Buttons for New Clients -->
<div class="container">
	<div class="row">

	<!-- Alert Messages -->
	<?php if($this->session->flashdata('error')): ?>
		<div class="alert alert-danger">
			<?php echo $this->session->flashdata('error') ?>
		</div>
	<?php endif; ?>
	<?php if($this->session->flashdata('success')): ?>
		<div class="alert alert-success">
			<?php echo $this->session->flashdata('success') ?>
		</div>
	<?php endif; ?>

		<h1>DASHBOARD</h1>
	</div>
</div>