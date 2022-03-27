<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Keyword</th>
                <th scope="col">Link PDF</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($task as $t) : ?>
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $t['judul']; ?></td>
                    <td><?= $t['penulis']; ?></td>
                    <td><?= $t['kataKunci']; ?></td>
                    <td> <a href="/ManageMyTask/Download/<?= $t['isi']; ?>"> <?= $t['isi']; ?></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links('artikel', 'my_pagination'); ?>
</div>
</br>
</br>
<a href="/ManageMyTask/home"><button type="button" class="btn btn-primary">Back</button></a>
<?= $this->endSection(); ?>