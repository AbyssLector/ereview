<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="row">
        <div class="p-3 mb-2 bg-warning text-dark">
            <center>
                <h4 class="alert-heading">Hi, <?= $username; ?></h4>
                <p>Sebagai editor, anda bisa membuat tugas berupa pengajuan artikel untuk direview kepada reviewer.</p>
                <a href="/ManageMyTask/addNewTask"><button type="button" class="btn btn-danger">+ Add New Task</button></a>
            </center>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h5>Task Pending Payment</h5>
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div id="emailHelp" class="form-text" style="color:blue">*<?= session()->getFlashdata('msg'); ?></div>
                <?php endif; ?>
                <hr>
                <p>Tugas berikut harus segera dibayarkan sebelum bisa diajukan</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <!-- <th scope="col">Editor</th> -->
                                <!-- <th scope="col">Reviewer</th> -->
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Commit Payment</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($pending_artikel as $pa) : ?>
                                <tr>
                                    <td><?= $pa['judul']; ?></td>
                                    <td><?= $pa['penulis']; ?></td>
                                    <td><?= $pa['kataKunci']; ?></td>
                                    <td><a href="/ManageMyTask/Download/<?= $pa['isi']; ?>" class="btn btn-primary btn-sm"> Download</a></td>

                                    <!-- <td>-</td> -->
                                    <!-- <td>-</td> -->
                                    <td><?= $pa['date_created']; ?></td>
                                    <td><?= $pa['deadline']; ?></td>

                                    <td><a href="/ManageMyTask/commitPayment/<?= $pa['id_artikel']; ?>" class="btn btn-primary btn-sm"><?= $pa['commission']; ?></a></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Pending Confirm Pay</h5>
                <hr>
                <p>Tugas berikut sudah dibayar dan dalam daftar tunggu untuk dikonfirmasi oleh makelar</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <!-- <th scope="col">Editor</th> -->
                                <!-- <th scope="col">Reviewer</th> -->
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($payment_confirm != null) : ?>
                                <?php foreach ($payment_confirm as $pc) : ?>
                                    <tr>
                                        <td><?= $pc['judul']; ?></td>
                                        <td><?= $pc['penulis']; ?></td>
                                        <td><?= $pc['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $pc['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <!-- <td>Nama Editor</td> -->
                                        <!-- <td>Nama Reviewer yang dipilih</td> -->
                                        <td><?= $pc['date_created']; ?></td>
                                        <td><?= $pc['deadline']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Assigned</h5>
                <hr>
                <p>Tugas berikut sudah diterima oleh reviewer</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <!-- <th scope="col">Editor</th> -->
                                <th scope="col">Reviewer</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($accepted_task != null) : ?>
                                <?php foreach ($accepted_task as $ac) : ?>
                                    <tr>
                                        <td><?= $ac['judul']; ?></td>
                                        <td><?= $ac['penulis']; ?></td>
                                        <td><?= $ac['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $ac['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <!-- <td>Nama Editor</td> -->
                                        <?php $mark = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $ac['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $ac['date_created']; ?></td>
                                        <td><?= $ac['deadline']; ?></td>
                                        <td><span class="badge rounded-pill bg-success">Accepted</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Rejected</h5>
                <hr>
                <p>Tugas berikut ditolak oleh reviewer</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <!-- <th scope="col">Editor</th> -->
                                <th scope="col">Reviewer</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($rejected_task != null) : ?>
                                <?php foreach ($rejected_task as $rt) : ?>
                                    <tr>
                                        <td><?= $rt['judul']; ?></td>
                                        <td><?= $rt['penulis']; ?></td>
                                        <td><?= $rt['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $rt['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <!-- <td>Nama Editor</td> -->
                                        <td>Nama Reviewer yang dipilih</td>
                                        <td><?= $rt['date_created']; ?></td>
                                        <td><?= $rt['deadline']; ?></td>
                                        <td><span class="badge rounded-pill bg-danger">Rejected</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Confirm Finished</h5>
                <hr>
                <p>Tugas berikut sudah diselesaikan oleh reviewer dan menunggu untuk anda konfirmasi</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <!-- <th scope="col">Editor</th> -->
                                <th scope="col">Reviewer</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Hasil Review</th>
                                <th scope="col">Confirmation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($final_confirm != null) : ?>
                                <?php foreach ($final_confirm as $fc) : ?>
                                    <tr>
                                        <td><?= $fc['judul']; ?></td>
                                        <td><?= $fc['penulis']; ?></td>
                                        <td><?= $fc['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $fc['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <!-- <td>Nama Editor</td> -->
                                        <?php $mark = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $fc['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $fc['date_created']; ?></td>
                                        <td><?= $fc['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/DownloadResult/<?= $fc['upload']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <td><a href="/ManageMyTask/Final/<?= $fc['id_artikel']; ?>" class="btn btn-primary btn-sm">Finish</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Finished</h5>
                <hr>
                <p>Tugas berikut sudah selesai dan makelar akan membayarkan pemabayaran yang sudah anda lakukan kepada reviewer</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
                                <th scope="col">Reviewer</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Hasil Review</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($finished_task != null) : ?>
                                <?php foreach ($finished_task as $ft) : ?>
                                    <tr>
                                        <td><?= $ft['judul']; ?></td>
                                        <td><?= $ft['penulis']; ?></td>
                                        <td><?= $ft['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $ft['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <!-- <td>Nama Editor</td> -->
                                        <?php $mark = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $ft['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $ft['date_created']; ?></td>
                                        <td><?= $ft['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/DownloadResult/<?= $ft['upload']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <td><span class="badge bg-success">Finished</span></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>