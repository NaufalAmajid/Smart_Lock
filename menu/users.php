<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Users</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <h5 class="card-title">List User Have Access Lock</h5>
                        </div>
                        <div class="col-lg-8 mt-3">
                            <button type="button" class="btn btn-primary btn-sm mb-3" style="float: right;" onclick="OpenModal('pages/form_create_user.php', 'no data sender', 'form_create_user')">
                                <i class="bi bi-person-plus-fill"></i> User
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <!-- Table with stripped rows -->
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>RFID</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Sample Name</td>
                                            <td>0023</td>
                                            <td>
                                                <button type="button" class="btn btn-outline-info btn-sm" onclick="UpdateAdmin('<?= $ad['id'] ?>')">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <button type="button" class="btn btn-outline-danger btn-sm" onclick="DeleteAdmin('<?= $ad['id'] ?>')">
                                                    <i class="bi bi-trash-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!-- End Table with stripped rows -->
                            </div>
                        </div>
                    </div>
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