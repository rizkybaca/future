<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="row">
    <div class="col-lg-8">
      <?php if (!empty($community)) : ?>
        <?= form_open('community/edit'); ?>
        <div class="form-group row">
          <label for="community" class="col-sm-2 col-form-label">Community Name</label>
          <div class="col-sm-10">
            <?= $this->session->flashdata('message'); ?>
            <input type="text" class="form-control" id="community" name="community" value="<?= $community['community'] ?>">
            <?= form_error('community', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </div>
        </form>
      <?php else : ?>
        <?= form_open('community/index'); ?>
        <div class="form-group row">
          <label for="community" class="col-sm-2 col-form-label">Community Name</label>
          <div class="col-sm-10">
            <?= $this->session->flashdata('message'); ?>
            <input type="text" class="form-control" id="community" name="community">
            <?= form_error('community', '<small class="text-danger pl-3">', '</small>'); ?>
          </div>
        </div>
        <div class="form-group row justify-content-end">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
        </div>
        </form>
      <?php endif; ?>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->