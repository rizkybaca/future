    <!-- Begin Page Content -->
    <div class="container-fluid">

    	<!-- Page Heading -->
    	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    	<div class="row">
    		<div class="col-lg-6">
    			<?= $this->session->flashdata('message'); ?>
    		</div>
    	</div>

    	<div class="card mb-3 col-lg-6">
    		<div class="row no-gutters d-flex align-items-center">
    			<div class="col-md-4">
    				<img style="max-width:100%; border-radius: 3px" src="<?= base_url('assets/img/candidate/') . $candidate['image']; ?>">
    			</div>
    			<div class="col-md-8">
    				<div class="card-body">
    					<h5 class="card-title"><?= $candidate['name']; ?></h5>
    					<p class="card-text"> Visi :</br> <?= nl2br($candidate['vision']); ?></p>
    					<p class="card-text"> Misi :</br> <?= nl2br($candidate['mission']); ?></p>

    					<a href="<?= base_url('voting'); ?>" class="btn btn-secondary mr-5">Back</a>
    					<?php if ($user['status'] == 0) : ?>
    						<a href="<?= base_url('voting/voting/') . $candidate['id']; ?>" class="btn btn-primary float-">Coblos</a>
    					<?php endif; ?>
    				</div>
    			</div>
    		</div>
    	</div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->