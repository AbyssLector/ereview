<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <button type="button" class="btn btn-primary">Manage All Task</button>

    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Manage All Task
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <li><a class="dropdown-item" href="/ManageAllTask/manageEditor">Manage Editor</a></li>
            <li><a class="dropdown-item" href="/ManageAllTask/confirmTaskCompletion">Confirm Task</a></li>
            <li><a class="dropdown-item" href="/ManageAllTask/monitorProgressofTask">Monitor Task</a></li>
        </ul>
    </div>
</div>
<?= $this->endSection(); ?>