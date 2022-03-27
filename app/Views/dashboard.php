<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<!-- <link rel="stylesheet" href="/css/dashboard.css" /> -->

<body class="landing is-preload">
    <div id="page-wrapper">

        <!-- Banner -->
        <!-- https://www.pixelstalk.net/wp-content/uploads/2016/09/Free-All-White.jpg -->
        <section id="banner" style="background-image: url('/img/img.jpg');">
            <h2 style="color:black">eReview</h2>
            <p style="color:black">Best for your article and journal.</p>
            <?php if (!$logged_in) : ?>
                <ul class=" actions special">
                    <li>
                        <div class="d-grid gap-2 d-md-block">
                            <a href="/Home/signUp" class="btn1 btn btn-secondary" style=" font-size:25px;">Sign Up</a>
                            <a href="/Home/myLogin" class="btn1 btn btn-secondary" style=" font-size:25px;">Login</a>

                        </div>
                    </li>
                <?php endif; ?>
                </ul>
        </section>

        <?= $this->endSection(); ?>