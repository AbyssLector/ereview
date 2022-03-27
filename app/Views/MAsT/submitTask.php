<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <a href="/ManageAssignedTask/Dashboard" class="btn btn-primary">Back</a>
            <h4 class="my-3">Submit Review</h4>

            <form action="/ManageAssignedTask/UploadResult/<?= $artikel['id_artikel']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <?= $artikel['judul']; ?>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <?= $email; ?>

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="comment" class="col-sm-2 col-form-label">Komentar</label>
                    <div class="col-sm-10">
                        <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" value="<?= old('comment'); ?>"></textarea>

                    </div>
                </div>

                <div class="row mb-3">
                    <label for="review" class="col-sm-2 col-form-label">Upload Review</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control <?= ($validation->hasError('review')) ? 'is-invalid' : ''; ?>" id="review" name="review">
                        <div class="invalid-feedback">
                            <?= $validation->getError('review'); ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</br>
</br>

<?= $this->endSection(); ?>