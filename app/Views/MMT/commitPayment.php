<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Payment</h4>

            <form action="/ManageMyTask/Payment/<?= $artikel['id_artikel']; ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="mb-3 row">
                    <label for="artikel" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <?= $artikel['judul']; ?>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="value" class="col-sm-2 col-form-label">Value</label>
                    <div class="col-sm-10">
                        <?= $artikel['commission']; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="filename" class="col-sm-2 col-form-label">Upload Receipt</label>
                    <div class="col-sm-10">
                        <input type="file" name="filename" id="filename" cols="30" rows="10" class="form-control <?= ($validation->hasError('filename')) ? 'is-invalid' : ''; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('filename'); ?>
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
<a href="/ManageMyTask/home"><button type="button" class="btn btn-primary">Back</button></a>
<?= $this->endSection(); ?>