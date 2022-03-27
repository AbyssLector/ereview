<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">

</head>
<title><?= $title; ?></title>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <div class="container-fluid1">
            <a class="navbar-brand" href="http://localhost:8080">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?php if ($type == 'makelar') : ?>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/ManageAllTask/Dashboard">Makelar</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($type == 'editor') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/ManageMyTask/Dashboard">Editor</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($type == 'reviewer') : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/ManageAssignedTask/Dashboard">Reviewer</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($logged_in) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/Home/Profile">Profile</a>
                        </li>
                    <?php endif; ?>
                    <?php if (!$logged_in) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/Home/signUp">Sign Up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Home/myLogin">Login</a>
                        </li>
                    <?php endif; ?>
                    <?php if ($logged_in) : ?>
                        <li>
                            <a class="nav-link" href="/Home/Logout">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <?= $this->renderSection('content'); ?>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
<div class="container-fluid pb-0 mb-0 justify-content-center text-light ">
    <footer>
        <div class="row my-2 justify-content-center py-5">
            <div class="col-11">
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                        <h3 class="text-muted mb-md-0 mb-5 bold-text">Ereview.</h3>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 bold-text "><b> </b></h6>
                        <ul class="list-unstyled">
                            <li> </li>
                            <li> </li>
                            <li> </li>
                            <li> </li>
                        </ul>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                        <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b></b></h6>
                        <p class="mb-1"></p>
                        <p></p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                        <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter" aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram" aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span> Ereview All Rights Reserved.</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                        <h6 class="mt-55 mt-2 text-muted bold-text"><b>Phone Contact</b></h6><small> <span><i class="fa fa-envelope" aria-hidden="true"></i></span> 08xx-xxxx-xxxx</small>
                    </div>
                    <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                        <h6 class="text-muted bold-text"><b>Email Contact</b></h6><small><span><i class="fa fa-envelope" aria-hidden="true"></i></span> ereview@gmail.com</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>


</html>