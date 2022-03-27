<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <h4 class="my-3">Login</h4>

    <form action="\Home\Auth" method="POST">
        <?= csrf_field(); ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" name="email" id="email" aria-describedby="emailHelp">

        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
            <?php if (session()->getFlashdata('msg')) : ?>
                <div id="emailHelp" class="form-text" style="color:red">*<?= session()->getFlashdata('msg'); ?></div>
            <?php endif; ?>
        </div>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Account Type</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option" id="reviewer" value="reviewer" checked>
                    <label class="form-check-label" for="reviewer">
                        Reviewer
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option" id="editor" value="editor">
                    <label class="form-check-label" for="editor">
                        Editor
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="option" id="makelar" value="makelar">
                    <label class="form-check-label" for="makelar">
                        Makelar
                    </label>
                </div>
            </div>
        </fieldset>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?= $this->endSection(); ?>