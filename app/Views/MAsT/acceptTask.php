<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Accept Task</h4>

            <form action="#" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author</label>
                    <div class="col-sm-10">


                    </div>
                </div>
                <div class="row mb-3">
                    <label for="abstract" class="col-sm-2 col-form-label">Abstract</label>
                    <div class="col-sm-10">


                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Accept Task?</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="option" id="yes" value="yes" checked>
                            <label class="form-check-label" for="yes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="option" id="no" value="no">
                            <label class="form-check-label" for="no">
                                No
                            </label>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</br>
</br>
<a href="/ManageAssignedTask/home"><button type="button" class="btn btn-primary">Back</button></a>
<?= $this->endSection(); ?>