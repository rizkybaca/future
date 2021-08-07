<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="row">
		<div class="col-lg">

			<?php if (validation_errors()) : ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php endif; ?>

			<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newCandidateModal">Add New Candidate</a>
			<div class="table-responsive-xl">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Profile Image</th>
							<th scope="col">Name</th>
							<th scope="col">Vision</th>
							<th scope="col">Mision</th>
							<th scope="col" id="act">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($candidate)) : ?>
							<?php $i = 1;
							foreach ($candidate as $c) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td>
										<img style="max-width:150px" src="<?= base_url('assets/img/candidate/') . $c['image']; ?>">
									</td>
									<td><?= $c['name']; ?></td>
									<td><?= nl2br($c['vision']); ?></td>
									<td><?= nl2br($c['mission']); ?></td>
									<td id="act">
										<a href="<?= base_url('votes/editcandidate/') . $c['id']; ?>" class="badge badge-success">edit</a>
										<a onclick="return confirm('Are you sure?');" href="<?= base_url('votes/deletecandidate/') . $c['id']; ?>" class="badge badge-danger">delete</a>
									</td>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="6">No candidate(s) found..</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal -->
<div class="modal fade" id="newCandidateModal" tabindex="-1" aria-labelledby="newCandidateModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="newCandidateModalLabel">Add New Candidate</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<?= form_open_multipart('votes/candidate'); ?>
			<div class="modal-body">
				<div class="form-group">
					<input type="text" class="form-control" id="name" name="name" placeholder="candidate full name">
				</div>
				<div class="form-group">
					<div class="custom-file">
						<input type="file" class="custom-file-input" id="image" name="image">
						<label class="custom-file-label" for="image">choose image</label>
					</div>
				</div>
				<div class="form-group">
					<textarea class="form-control" id="vision" name="vision" rows="3" placeholder="candidate's vision"></textarea>
				</div>
				<div class="form-group">
					<textarea class="form-control" id="mission" name="mission" rows="3" placeholder="candidate's mission"></textarea>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Add</button>
			</div>
			</form>
		</div>
	</div>
</div>