<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="row">
        <div class="p-3 mb-2 bg-warning text-dark">
            <center>
                <h4 class="alert-heading">Hi, <?= $username; ?></h4>
                <p>Sebagai Makelar, anda akan bertindak sebagai admin yang akan mengawasi kinerja dari editor dan reviewer.</p>
            </center>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h5>Task Pending Payment</h5>
                <hr>
                <p>Tugas berikut menunggu pembayaran yang akan dilakukan oleh editor</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
                                <!-- <th scope="col">Reviewer</th> -->
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pending_payment != 0) : ?>
                                <?php foreach ($pending_payment as $pp) : ?>
                                    <tr>
                                        <td><?= $pp['judul']; ?></td>
                                        <td><?= $pp['penulis']; ?></td>
                                        <td><?= $pp['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $pp['isi']; ?>"> Download</a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $pp['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <!-- <td>Nama Reviewer yang dipilih</td> -->
                                        <td><?= $pp['date_created']; ?></td>
                                        <td><?= ($pp['deadline']) ? $pp['deadline'] : '-'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Pending Confirm Pay</h5>
                <hr>
                <p>Tugas berikut sudah dibayar oleh editor dan menunggu konfirmasi anda</p>
                <?php if (session()->getFlashdata('msg')) : ?>
                    <div id="emailHelp" class="form-text" style="color:blue">*<?= session()->getFlashdata('msg'); ?></div>
                <?php endif; ?>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
                                <!-- <th scope="col">Reviewer</th> -->
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Bukti Pembayaran</th>
                                <th scope="col">Accept/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pending_confirmation != null) : ?>
                                <?php foreach ($pending_confirmation as $pc) : ?>
                                    <tr>
                                        <td><?= $pc['judul']; ?></td>
                                        <td><?= $pc['penulis']; ?></td>
                                        <td><?= $pc['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $pc['isi']; ?>">Download </a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $pc['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <!-- <td>Nama Reviewer yang dipilih</td> -->
                                        <td><?= $pc['date_created']; ?></td>
                                        <td><?= $pc['deadline']; ?></td>
                                        <td><a href="/ManageAllTask/Download/<?= $pc['receipt']; ?>">Download Receipt</a></td>
                                        <td><a href="/ManageAllTask/AcceptPayment/<?= $pc['id_artikel']; ?>" class="btn btn-primary">Accept</a> <a href="/ManageAllTask/RejectPayment/<?= $pc['id_artikel']; ?>" class="btn btn-danger">Reject</a></td>
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
                                <th scope="col">Editor</th>
                                <th scope="col">Reviewer</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($accepted_task != null) : ?>
                                <?php foreach ($accepted_task as $at) : ?>
                                    <tr>
                                        <td><?= $at['judul']; ?></td>
                                        <td><?= $at['penulis']; ?></td>
                                        <td><?= $at['kataKunci']; ?></td>
                                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $at['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php $mark1 = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $at['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark1 = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark1) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $at['date_created']; ?></td>
                                        <td><?= $at['deadline']; ?></td>
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
                                <th scope="col">Editor</th>
                                <!-- <th scope="col">Reviewer</th> -->
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
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $rt['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <!-- <td>Nama Reviewer yang dipilih</td> -->
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
                <h5>Task Pending Finish Confirmation</h5>
                <hr>
                <p>Tugas berikut sudah direview oleh reviewer dan menunggu konfirmasi anda</p>
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
                                <th scope="col">Accept/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($confirm_finished != null) : ?>
                                <?php foreach ($confirm_finished as $cf) : ?>
                                    <tr>
                                        <td><?= $cf['judul']; ?></td>
                                        <td><?= $cf['penulis']; ?></td>
                                        <td><?= $cf['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $cf['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $cf['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php $mark1 = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $cf['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark1 = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark1) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $cf['date_created']; ?></td>
                                        <td><?= $cf['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/DownloadResult/<?= $cf['upload']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <td><a href="/ManageAllTask/AcceptReviewedTask/<?= $cf['id_artikel']; ?>" class="btn btn-primary btn-sm">Accept</a><a href="/ManageAllTask/RejectReviewedTask/<?= $cf['id_artikel']; ?>" class="btn btn-danger btn-sm">Reject</a></td>
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
                <p>Tugas berikut sudah anda konfirmasi dan menunggu konfirmasi editor</p>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($confirmed_finished != null) : ?>
                                <?php foreach ($confirmed_finished as $cef) : ?>
                                    <tr>
                                        <td><?= $cef['judul']; ?></td>
                                        <td><?= $cef['penulis']; ?></td>
                                        <td><?= $cef['kataKunci']; ?></td>
                                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $cef['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php $mark1 = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $cef['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark1 = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark1) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $cef['date_created']; ?></td>
                                        <td><?= $cef['deadline']; ?></td>
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
                                <th scope="col">Kirim Bayaran</th>
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
                                        <?php foreach ($editor as $r) : ?>
                                            <?php if ($r['id_editor'] == $ft['id_editor']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <?php $mark1 = false; ?>
                                        <?php foreach ($reviewer as $r) : ?>
                                            <?php if ($r['id_reviewer'] == $ft['id_reviewer']) : ?>
                                                <td><?= $r['nama']; ?></td>
                                                <?php $mark1 = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark1) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $ft['date_created']; ?></td>
                                        <td><?= $ft['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/DownloadResult/<?= $ft['upload']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <td><a href="/ManageAllTask/SendPayment/<?= $ft['id_artikel']; ?>" class="btn btn-warning">Kirim</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?= $this->endSection(); ?>