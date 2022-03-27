<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
    <table class="table">
        <h4 class="my-3">Monitor Task</h4>
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Done</th>
                <th scope="col">To Do</th>
                <th scope="col">Started</th>
                <th scope="col">Due</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
                <td>Sample</td>
            </tr>
        </tbody>
    </table>
</div>
</br>
</br>
<a href="/ManageAllTask/home"><button type="button" class="btn btn-primary">Back</button></a>
<?= $this->endSection(); ?>