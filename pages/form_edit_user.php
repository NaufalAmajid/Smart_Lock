<?php
session_start();
$_SESSION['new_rfid'] = true;
$data = $_POST;
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Form User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Start Form -->
            <form class="row g-3" id="formEditUser">
                <div class="col-12">
                    <label for="card_id_edit" class="form-label">RFID</label>
                    <input type="text" class="form-control" id="card_id_edit" name="card_id" value="<?= $data['card_id'] ?>" readonly>
                    <div class="form-text" style="font-size: 12px;">
                        <i class="text-primary">*if change RFID scan the card / pin to get new RFID</i>
                    </div>
                </div>
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="email" class="form-control" id="name" name="name" value="<?= $data['name'] ?>" placeholder="name..." autocomplete="off">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="..."><?= $data['address'] ?></textarea>
                </div>
            </form>
            <!-- Finish Form -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="EditUser('<?= $data['id'] ?>')">Save Change</button>
        </div>
    </div>
</div>