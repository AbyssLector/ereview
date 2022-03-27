<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Expertise</th>
                <th scope="col">Level</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($reviewer as $r) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $r['nama']; ?></td>
                    <td><?= $r['bidang_ilmu']; ?></td>
                    <td><?= $r['level']; ?></td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <?= $pager->links('reviewer', 'my_pagination'); ?>
</div>
</br>
</br>
<a href="/ManageMyTask/home"><button type="button" class="btn btn-primary">Back</button></a>
<?= $this->endSection(); ?>