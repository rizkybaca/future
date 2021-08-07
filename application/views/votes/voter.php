<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<?php if ($user['role_id'] == 1) : ?>
		<div class="row">
			<div class="col-lg-3 mb-3">
				<?= form_open_multipart('votes/import'); ?>
				<div class="custom-file mb-2">
					<input type="file" class="custom-file-input" id="file" name="file" accept=".xlsx, .xls">
					<label class="custom-file-label" for="file">Upload csv voter</label>
				</div>
				<button class="btn btn-primary" type="submit" name="upload">Upload</button>
				</form>
			</div>
		</div>
	<?php endif; ?>

	<div class="row">
		<div class="col-lg-6">
			<?= $this->session->flashdata('message'); ?>
			<div class="table-responsive-xl">
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Email</th>
							<th scope="col">Name</th>
							<th scope="col">Created At</th>
							<th scope="col">Last Modified</th>
							<?php if ($user['role_id'] == 1) : ?>
								<th id="act" scope="col">Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php if (!empty($voter)) : ?>
							<?php $i = 1;
							foreach ($voter as $v) : ?>
								<tr>
									<th scope="row"><?= $i++; ?></th>
									<td><?= $v['email']; ?></td>
									<td><?= $v['name']; ?></td>
									<td><?= date("Y-m-d", $v['date_created']); ?></td>
									<td><?= date("Y-m-d", $v['date_modified']); ?></td>
									<?php if ($user['role_id'] == 1) : ?>
										<td id="act">
											<a href="<?= base_url('votes/voteredit/') . $v['id']; ?>" class="badge badge-success">edit</a>
											<a onclick="return confirm('Are you sure?');" href="<?= base_url('votes/voterdelete/') . $v['id']; ?>" class="badge badge-danger">delete</a>
										</td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						<?php else : ?>
							<tr>
								<td colspan="5">No voter(s) found..</td>
							</tr>
						<?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.container-fluid -->