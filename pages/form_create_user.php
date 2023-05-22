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
                    <label for="inputNanme4" class="form-label">RFID</label>
                    <input type="text" class="form-control" id="rfid" name="rfid" readonly>
                    <div class="form-text" style="font-size: 12px;">
                        <i class="text-primary">*please, scan the card / pin to get RFID</i>
                    </div>
                </div>
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="email" class="form-control" id="Name" name="name" placeholder="name...">
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Address</label>
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