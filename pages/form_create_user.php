<?php
session_start();
$_SESSION['new_rfid'] = true;
?>
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Form User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- Start Form -->
            <form class="row g-3" id="formAddUser">
                <div class="col-12">
                    <label for="card_id" class="form-label">RFID</label>
                    <input type="text" class="form-control" id="card_id" name="card_id" readonly>
                    <div class="form-text" style="font-size: 12px;">
                        <i class="text-primary">*please, scan the card / pin to get RFID</i>
                    </div>
                </div>
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="email" class="form-control" id="name" name="name" placeholder="name..." autocomplete="off">
                </div>
                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="..."></textarea>
                </div>
            </form>
            <!-- Finish Form -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="SaveUser()">Save User</button>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        setInterval(() => {
            GetRFID();
        }, 1000);
    });

    function GetRFID() {
        $.ajax({
            url: 'api/get_rfid.php',
            type: 'POST',
            success: function(result) {
                var data = JSON.parse(result);
                $('#card_id').val(data.rfid);
            }
        })
    }
</script>