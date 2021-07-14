<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <?php if (validation_errors()) : ?>
		<div class="alert alert-danger" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?>
  <?= $this->session->flashdata('message'); ?>

  <div class="row">
  	<div class="col-lg">
  		<div class="card mr-2 mb-3" style="width: 18rem;">
	  		<div class="card-body">
			    <h5 class="card-title">Export Data Voting</h5>
					<?php if ($voting) : ?>			    					
			    	<p class="card-text">Button for export data voting .pdf</p>
			    	<a href="<?= base_url('votes/exportvoting'); ?>" class="btn btn-outline-danger">Export</a>
					<?php else : ?>
						<p class="card-text">No voting(s) found..</p>
					<?php endif; ?>  	
			  </div>
		  </div>
		  <div class="card mr-2 mb-3" style="width: 18rem;">
	  		<div class="card-body">
			    <h5 class="card-title">Export Data Voter</h5>
					<?php if ($voter) : ?>			    					
			    	<p class="card-text">Button for export data voter .pdf</p>
			    	<a href="<?= base_url('votes/exportvoter'); ?>" class="btn btn-outline-danger">Export</a>
					<?php else : ?>
						<p class="card-text">No voter(s) found..</p>
					<?php endif; ?>  	
			  </div>
		  </div>   
  	</div>

  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->