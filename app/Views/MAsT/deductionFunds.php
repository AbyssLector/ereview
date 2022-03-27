<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Withdraw Your Funds</h4>

            <form action="/ManageAssignedTask/Withdraw" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="value" class="col-sm-2 col-form-label">Value</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="value" name="value">
                        <?php if (session()->getFlashdata('msg')) : ?>
                            <div id="emailHelp" class="form-text" style="color:red">*<?= session()->getFlashdata('msg'); ?></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="bank" class="col-sm-2 col-form-label">Bank</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="bank" name="bank">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="acc" class="col-sm-2 col-form-label">Account Number</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="acc" name="acc">

                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Withdraw</button>
            </form>
        </div>
    </div>
</div>
</br>
</br>
<a href="/ManageAssignedTask/Balance"><button type="button" class="btn btn-primary">Back</button></a>
<?= $this->endSection(); ?>