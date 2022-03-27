<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h4 class="my-3">Confirm Task</h4>

            <form action="#" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="name" class="col-sm-2 col-form-label">Editor Name</label>
                    <div class="col-sm-10">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Task</label>
                    <div class="col-sm-10">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="reviewer" class="col-sm-2 col-form-label">Reviewer's Name</label>
                    <div class="col-sm-10">

                    </div>
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-sm-2 col-form-label">Date Completion</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control " id="expertise" name="expertise">
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Done</label>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Payment</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="option" id="yes" value="yes" checked>
                            <label class="form-check-label" for="yes">
                                Proceed
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="option" id="no" value="no">
                            <label class="form-check-label" for="no">
                                Later
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
<a href="/ManageAllTask/home"><button type="button" class="btn btn-primary">Back</button></a>

<?= $this->endSection(); ?>