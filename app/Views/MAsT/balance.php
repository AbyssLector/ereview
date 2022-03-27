<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <center>
                    <div class="card text-center">
                        <div class="card-header">
                            <h4><?= $mydata['nama']; ?>'s Balance</h3>
                        </div>
                        <div class="card-body">
                            <p style="font-size:3em;"><strong><?= $mydata['balance']; ?></strong></p>
                            <blockquote class="blockquote">
                                <p class="mb-3">No pain, No gain. Success will not be achieved without hard work.</p>
                                <footer class="blockquote-footer">Mas Pinaww</footer>
                            </blockquote>
                            <a href="/ManageAssignedTask/Dashboard" class="btn btn-primary">Back</a> <a href="/ManageAssignedTask/DeductFunds" class="btn btn-primary">Withdraw</a>
                        </div>
                    </div>
            </div>
            </center>
        </div>
    </div>
    </div>
    <?= $this->endSection(); ?>