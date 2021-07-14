    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

        <div class="row">
        	<div class="col-lg-8">
        		<form action="" method="POST">
        			<input type="hidden" name="id" value="<?= $committee['id']; ?>">

        			<div class="form-group row">
						    <label for="nim" class="col-sm-2 col-form-label">NIM</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="nim" name="nim" value="<?= $committee['nim']; ?>">
						      <?= form_error('nim', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="name" name="name" value="<?= $committee['name']; ?>">
						      <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
						    </div>
						  </div>

						  <div class="form-group row justify-content-end">
						  	<div class="col-sm-10">
						  		<a type="button" href="<?= base_url('committees'); ?>" class="btn btn-secondary" >Cancel</a>
						  		<button type="submit" class="btn btn-primary">Edit</button>
						  	</div>
						  </div>

        		</form>
        	</div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

            