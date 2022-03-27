<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Edit Profil</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/Home/Profile" class="btn btn-danger mt-4">Back</a>
                <h1 class="mt-4">Edit Profile</h1>
                <hr class="bg-primary">
                <form action="/Home/SaveChange" method="POST">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('name')) ? 'is-invalid' : ''; ?>" id="name" name="name" placeholder="your.name">
                            <div class="invalid-feedback">
                                <?= $validation->getError('name'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" placeholder="name@example.com">
                            <div class="invalid-feedback">
                                <?= $validation->getError('email'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password">
                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('password'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confpass" class="col-sm-2 col-form-label"> Confirm Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control <?= ($validation->hasError('confpass')) ? 'is-invalid' : ''; ?>" id="confpass" name="confpass">

                        </div>
                        <div class="invalid-feedback">
                            <?= $validation->getError('confpass'); ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <p class="col-sm-2 col-form-label">Role</p>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" placeholder="<?= $type; ?>" aria-label="Disabled input example" disabled>
                        </div>
                    </div>
                    <?php if ($type == 'reviewer') : ?>
                        <div class="row mb-3">
                            <label for="competence" class="col-sm-2 col-form-label">Competence</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="competence" name="competence" placeholder="Competence1, Competence2,.....">
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (session()->getFlashdata('msg')) : ?>
                        <div id="emailHelp" class="form-text" style="color:red">*<?= session()->getFlashdata('msg'); ?></div>
                    <?php endif; ?>
                    <button type="submit" class="btn btn-danger mt-4">save</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>