<!DOCTYPE html>
<html>

<head>
    <title><?= $name; ?>'s Profile</title><!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
                <?php if ($type == 'makelar') : ?>
                    <div class="col"><a href="/ManageAllTask/Dashboard" class="btn btn-danger">Back</a></div>
                <?php elseif ($type == 'editor') : ?>
                    <div class="col"><a href="/ManageMyTask/Dashboard" class="btn btn-danger">Back</a></div>
                <?php else : ?>
                    <div class="col"><a href="/ManageAssignedTask/Dashboard" class="btn btn-danger">Back</a></div>
                <?php endif; ?>
                <div class="row z-depth-3">
                    <div class="col-sm-4 bg-info rounded-left">
                        <div class="card-block text-center text-white">
                            <i class="fas fa-user-tie fa-7x mt-5"></i>
                            <h2 class="font-weight-bold mt-4"><?= $name; ?></h2>
                            <?php if ($type != 'makelar') : ?>
                                <a href="/Home/ChangeProfile" class="btn btn-primary mb-5">Edit Profile</a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-8 bg-white rounded-right">
                        <h3 class="mt-3 text-center">Information</h3>
                        <hr class="badge-primary mt-0 w-25">
                        <div class="row">
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Email</p>
                                <p class="text-muted"><?= $mail; ?></p>
                            </div>
                            <div class="col-sm-6">
                                <p class="font-weight-bold">Role</p>
                                <p calss="text-muted"><?= $type; ?></p>
                            </div>
                        </div>
                        <?php if ($type == 'reviewer') : ?>
                            <h4 class="mt-3">Competence</h4>
                            <hr class="bg-primary">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p class="text-muted"><?= $competence; ?></p>
                                </div>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>