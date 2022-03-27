<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <button type="button" class="btn btn-primary">Manage All Task</button>

    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Manage Assigned Task
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <li><a class="dropdown-item" href="/ManageAssignedTask/acceptTask">Accept Task</a></li>
            <li><a class="dropdown-item" href="/ManageAssignedTask/deductionFunds">Deduction</a></li>
            <li><a class="dropdown-item" href="/ManageAssignedTask/submitTask">Submit Task</a></li>
        </ul>
    </div>
</div>
<?= $this->endSection(); ?>