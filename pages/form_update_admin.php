<?php
$data = $_POST;
$password = md5($data['password']);
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Form Admin</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Start Form -->
            <form class="row g-3" id="formUpdateAdmin">
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name..." value="<?= $data['name'] ?>" autocomplete="off">
                </div>
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" placeholder="username..." autocomplete="off">
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="password...">
                    <div class="form-text" style="font-size: 12px;">
                        <i class="text-info">*if there is no change for the password then just leave it blank</i>
                    </div>
                </div>
            </form>
            <!-- Finish Form -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="EditAdmin('<?= $data['id'] ?>')">Change Admin</button>
        </div>
    </div>
</div>