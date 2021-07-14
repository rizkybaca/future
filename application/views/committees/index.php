<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg-3 mb-3">
			<?= form_open_multipart('committees/import'); ?>
			<div class="custom-file mb-2">
				<input type="file" class="custom-file-input" id="file" name="file" accept=".xlsx, .xls">
				<label class="custom-file-label" for="file">Upload xlsx committees</label>
			</div>
			<button class="btn btn-primary" type="submit" name="upload">Upload</button>
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-6">

			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive-xl">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">NIM</th>
							<th scope="col">Name</th>
							<th scope="col">Prodi</th>
							<th id="act" scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($committee)) : ?>
							<?php $i = 1;
							foreach ($committee as $c) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $c['nim']; ?></td>
									<td><?= $c['name']; ?></td>
									<td><?= $c['prodi']; ?></td>
									<td id="act">
										<a href="<?= base_url('committees/edit/') . $c['id']; ?>" class="badge badge-success">edit</a>
										<a onclick="return confirm('Are you sure?');" href="<?= base_url('committees/delete/') . $c['id']; ?>" class="badge badge-danger">delete</a>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="4">No committee(s) found..</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->