<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Sign Up Your Account</h4>

            <form action="/Home/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= old('name'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('name'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= old('email'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('email'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="expertise" class="col-sm-2 col-form-label">Expertise (for reviewer only)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('expertise')) ? 'is-invalid' : ''; ?>" id="expertise" name="expertise" value="<?= old('expertise'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('expertise'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control <?= ($validation->hasError('Password')) ? 'is-invalid' : ''; ?>" id="Password" name="Password">
                        <div class="invalid-feedback">
                            <?= $validation->getError('Password'); ?>
                        </div>
                    </div>
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
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>