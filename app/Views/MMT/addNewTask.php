<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Add Task</h4>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('success'); ?>
                    <a href="/ManageMyTask/Dashboard"> View Task</a>
                </div>

            <?php endif; ?>
            <form action="\ManageMyTask\SaveArtikel" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('title')) ? 'is-invalid' : ''; ?>" id="title" name="title" value="<?= old('title'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('title'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('author')) ? 'is-invalid' : ''; ?>" id="author" name="author" value="<?= old('author'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('author'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="filename" class="col-sm-2 col-form-label">Upload File</label>
                    <div class="col-sm-10">
                        <input type="file" name="filename" id="filename" cols="30" rows="10" class="form-control <?= ($validation->hasError('filename')) ? 'is-invalid' : ''; ?>"></textarea>
                        <div class="invalid-feedback">
                            <?= $validation->getError('filename'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="keyword" class="col-sm-2 col-form-label">Keywords</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keyword" name="keyword" value="<?= old('keyword'); ?>">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="commission" class="col-sm-2 col-form-label">Commission</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('commission')) ? 'is-invalid' : ''; ?>" id="commission" name="commission" value="<?= old('commission'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('commission'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="deadline" class="col-sm-2 col-form-label">Deadline</label>
                    <div class="col-sm-10">
                        <input type="datetime-local" class="form-control <?= ($validation->hasError('deadline')) ? 'is-invalid' : ''; ?>" id="deadline" name="deadline" value="<?= old('deadline'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('deadline'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
            </form>
        </div>
    </div>
</div>
</br>
</br>
<a href="/ManageMyTask/home"><button type="button" class="btn btn-primary">Back</button></a>

<?= $this->endSection(); ?>