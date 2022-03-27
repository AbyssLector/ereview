<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>

<body>
    <div class="row">
        <div class="p-3 mb-2 bg-warning text-dark">
            <center>
                <h4 class="alert-heading">Hi, <?= $username; ?></h4>
                <p>Sebagai reviewer, anda bisa menerima tugas dari editor untuk mereview artikel atau jurnal yang dibuat oleh editor.</p>
                <a href="/ManageAssignedTask/Balance" class="btn btn-danger">Your Balance</a>

            </center>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col">
                <br>
                <h5>Task Pending Acceptence</h5>
                <hr>
                <p>Tugas berikut harus anda konfirmasi untuk diterima atau tidak</p>
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
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Accept/Reject</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pending_accept != null) : ?>
                                <?php foreach ($pending_accept as $pa) : ?>
                                    <tr>
                                        <td><?= $pa['judul']; ?></td>
                                        <td><?= $pa['penulis']; ?></td>
                                        <td><?= $pa['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $pa['isi']; ?>">Download<a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $pa['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $pa['date_created']; ?></td>
                                        <td><?= $pa['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/AccTask/<?= $pa['id_artikel']; ?>" class="btn btn-primary">Accept</a> <a href="/ManageAssignedTask/RejTask/<?= $pa['id_artikel']; ?>" class="btn btn-danger">Reject</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task In Progress</h5>
                <hr>
                <p>Tugas berikut sedang anda kerjakan dan menunggu hasil review</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Upload Hasil</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pending_reviewed != null) : ?>
                                <?php foreach ($pending_reviewed as $pr) : ?>
                                    <tr>
                                        <td><?= $pr['judul']; ?></td>
                                        <td><?= $pr['penulis']; ?></td>
                                        <td><?= $pr['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $pr['isi']; ?>">Download<a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $pr['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $pr['date_created']; ?></td>
                                        <td><?= $pr['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/Upload/<?= $pr['id_artikel']; ?>" class="btn btn-primary btn-sm">Upload</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>
                <br>
                <br>
                <h5>Task Pending Finished</h5>
                <hr>
                <p>Tugas berikut adalah tugas yang sudah anda kirim hasil reviewnya dan sedang dikonfirmasi oleh makelar</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Hasil Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($pending_reviewed_conf != null) : ?>
                                <?php foreach ($pending_reviewed_conf as $prc) : ?>
                                    <tr>
                                        <td><?= $prc['judul']; ?></td>
                                        <td><?= $prc['penulis']; ?></td>
                                        <td><?= $prc['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $prc['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $prc['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $prc['date_created']; ?></td>
                                        <td><?= $prc['deadline']; ?></td>
                                        <td><button type="button" class="btn btn-primary btn-sm">Download</button></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <h5>Task Pending Confirm Finished</h5>
                <hr>
                <p>Tugas berikut sudah dikonfirmasi oleh makelar dan akan dikonfirmasi oleh editor</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
                                <th scope="col">Assign Date</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Hasil Review</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($confirmed_makelar != null) : ?>
                                <?php foreach ($confirmed_makelar as $cm) : ?>
                                    <tr>
                                        <td><?= $cm['judul']; ?></td>
                                        <td><?= $cm['penulis']; ?></td>
                                        <td><?= $cm['kataKunci']; ?></td>
                                        <td><a href="/ManageMyTask/Download/<?= $cm['isi']; ?>" class="btn btn-primary btn-sm">Download</a></td>
                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $cm['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
                                                <?php $mark = true; ?>
                                                <?php break; ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php if (!$mark) : ?>
                                            <td>-</td>
                                        <?php endif; ?>
                                        <td><?= $cm['date_created']; ?></td>
                                        <td><?= $cm['deadline']; ?></td>
                                        <td><a href="/ManageAssignedTask/DownloadResult/<?= $cm['upload']; ?>" class="btn btn-primary btn-sm">Download</a></td>
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
                <p>Tugas berikut sudah dikonfimasi oleh editor</p>
                <div class="scrollmenu" style="overflow:auto; white-space: nowrap;">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Author</th>
                                <th scope="col">Kata Kunci</th>
                                <th scope="col">File</th>
                                <th scope="col">Editor</th>
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

                                        <?php $mark = false; ?>
                                        <?php foreach ($editor as $e) : ?>
                                            <?php if ($e['id_editor'] == $ft['id_editor']) : ?>
                                                <td><?= $e['nama']; ?></td>
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
                    </table>
                </div>
                <br>
            </div>
        </div>
    </div>


    <?= $this->endSection(); ?>