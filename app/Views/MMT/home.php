<?= $this->extend('Template/template'); ?>
<?= $this->section('content'); ?>
<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
    <button type="button" class="btn btn-primary">Manage My Task</button>

    <div class="btn-group" role="group">
        <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            Manage My Task
        </button>
        <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
            <li><a class="dropdown-item" href="/ManageMyTask/addNewTask">Add Task</a></li>
            <li><a class="dropdown-item" href="/ManageMyTask/commitPayment">Payment</a></li>
            <li><a class="dropdown-item" href="/ManageMyTask/confirmTaskCompletion">Confirm Task</a></li>
            <li><a class="dropdown-item" href="/ManageMyTask/selectPotentialReviewer">Select Reviewer</a></li>
            <li><a class="dropdown-item" href="/ManageMyTask/viewTask">View Task</a></li>
        </ul>
    </div>
</div>
<?= $this->endSection(); ?>