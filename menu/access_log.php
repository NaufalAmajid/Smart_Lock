<?php
unset($_SESSION['new_rfid']);
?>
<div class="pagetitle">
    <h1>Access Log</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">History</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">History Log Access</h5>
                    <div class="row"><b>Search By Date :</b></div>
                    <div class="row mb-4 mt-2">
                        <div class="col-lg-3 mb-2">
                            <input type="date" class="form-control" name="date1" id="date1" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-lg-3 mb-2">
                            <input type="date" class="form-control" name="date2" id="date2" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-lg-3 mb-2">
                            <button class="btn btn-secondary" onclick="searchDate()"><i class="bi bi-search"></i></button>
                        </div>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>RFID</th>
                                <th>Clock Enter</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="form_create_user" tabindex="-1"></div>

<script>
    function SaveUser() {
        var data = $('#formAddUser').serializeArray();
        $.ajax({
            url: 'api/user.php',
            type: 'POST',
            data: {
                action: 'create',
                data: data
            },
            success: function(result) {
                var data = JSON.parse(result);
                Swal.fire({
                    position: 'top-end',
                    icon: `${data.status}`,
                    title: `${data.message}`,
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        });
    }
</script>