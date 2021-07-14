<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
  <div class="row">
  	<div class="col-lg">
  		<?= $this->session->flashdata('message'); ?>
  	</div>
  </div>

  <div class="row">
		<div class="card mr-3 mb-3" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Activate Committees</h5>				    
		    <?php if ($committees) : ?>
		    <?php if ($committees[0]['is_active']==="0") : ?>
		    	<p class="card-text">Button for activate comittee(s)</p>
		    	<a href="<?= base_url('admin/activatecommittees'); ?>" class="btn btn-outline-primary">Activate</a>
		    <?php else : ?>
		    	<a href="<?= base_url('admin/nonactivatecommittees'); ?>" class="btn btn-outline-secondary">Nonactivate</a>
		    <?php endif; ?>
		    <?php else : ?>
		    	<p class="card-text">No comittee(s) found..</p>
		    	<?php endif; ?>
		  </div>
		</div>
		<div class="card mr-3 mb-3" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Activate Voter PTI</h5>				    
		    <?php if ($voterpti) : ?>
		    <?php if ($voterpti[0]['is_active']==="0") : ?>
		    	<p class="card-text">Button for activate voter(s) prodi PTI</p>
		    	<a href="<?= base_url('admin/activatevoterpti'); ?>" class="btn btn-outline-primary">Activate</a>
		    <?php else : ?>
		    	<a href="<?= base_url('admin/nonactivatevoterpti'); ?>" class="btn btn-outline-secondary">Nonactivate</a>
		    <?php endif; ?>
		    <?php else : ?>
		    	<p class="card-text">No voter(s) found..</p>
		    	<?php endif; ?>
		  </div>
		</div>
		<div class="card mr-3 mb-3" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Activate Voter PBI</h5>				    
		    <?php if ($voterpbi) : ?>
		    <?php if ($voterpbi[0]['is_active']==="0") : ?>
		    	<p class="card-text">Button for activate voter(s) prodi PBI</p>
		    	<a href="<?= base_url('admin/activatevoterpbi'); ?>" class="btn btn-outline-primary">Activate</a>
		    <?php else : ?>
		    	<a href="<?= base_url('admin/nonactivatevoterpbi'); ?>" class="btn btn-outline-secondary">Nonactivate</a>
		    <?php endif; ?>
		    <?php else : ?>
		    	<p class="card-text">No voter(s) found..</p>
		    	<?php endif; ?>
		  </div>
		</div>
		<div class="card mr-3 mb-3" style="width: 18rem;">
		  <div class="card-body">
		    <h5 class="card-title">Activate Voter BK</h5>				    
		    <?php if ($voterbk) : ?>
		    <?php if ($voterbk[0]['is_active']==="0") : ?>
		    	<p class="card-text">Button for activate voter(s) prodi BK</p>
		    	<a href="<?= base_url('admin/activatevoterbk'); ?>" class="btn btn-outline-primary">Activate</a>
		    <?php else : ?>
		    	<a href="<?= base_url('admin/nonactivatevoterbk'); ?>" class="btn btn-outline-secondary">Nonactivate</a>
		    <?php endif; ?>
		    <?php else : ?>
		    	<p class="card-text">No voter(s) found..</p>
		    	<?php endif; ?>
		  </div>
		</div>
  </div>
</div>
</div>
<!-- /.container-fluid -->