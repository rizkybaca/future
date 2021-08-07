<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
	<?= $this->session->flashdata('message'); ?>
	<div class="row">
		<?php foreach ($candidate as $c) : ?>
			<div class="card mr-3 mb-3" style="width: 18rem;">
				<img src="<?= base_url('assets/img/candidate/') . $c['image']; ?>" class="card-img-top img-fluid" style="height: 250px;object-fit: cover;">
				<div class="card-body">
					<h5 class="card-title"><?= $c['name']; ?></h5>
					<a href="<?= base_url('voting/detailcandidate/') . $c['id']; ?>" class="btn btn-outline-primary">Detail Candidate</a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
<!-- /.container-fluid -->



</div>
<!-- End of Main Content -->