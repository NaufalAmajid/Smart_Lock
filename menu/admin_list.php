<div class="pagetitle">
    <h1>List</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">List Admin</li>
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
                            <h5 class="card-title">List Admin Account To Manage</h5>
                        </div>
                        <div class="col-lg-8 mt-3">
                            <button type="button" class="btn btn-outline-dark btn-sm mb-3" style="float: right;" onclick="OpenModal('pages/form_create_admin.php', 'no data sender', 'place_admin')">
                                <i class="bi bi-person-plus-fill"></i> Admin
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Admin Id</th>
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Telegram Id</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyAdmin">
                                        <?php
                                        $query = "SELECT * FROM admins";
                                        $result = mysqli_query($connect, $query);
                                        $no = 1;
                                        $admin = [];
                                        while ($row = mysqli_fetch_array($result)) {
                                            $admin[] = $row;
                                        }
                                        ?>
                                        <?php foreach ($admin as $ad) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $ad['admin_id'] ?></td>
                                                <td><?= $ad['name'] ?></td>
                                                <td><?= $ad['username'] ?></td>
                                                <td><?= $ad['telegram_id'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-info btn-sm" onclick="UpdateAdmin('<?= $ad['id'] ?>')">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="DeleteAdmin('<?= $ad['id'] ?>')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="place_admin" tabindex="-1"></div>
<script>
    function SaveAdmin() {
        var data = $('#formAddAdmin').serializeArray();
        $.ajax({
            url: 'api/admin.php',
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
                    allowOutsideClick: false,
                    timer: 1500
                }).then(() => {
                    if (data.status == 'success') {
                        location.reload();
                    } else {
                        $('#formAddAdmin').trigger('reset');
                    }
                })
            }
        });
    }

    function DeleteAdmin(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You're data will be deleted!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'api/admin.php',
                    type: 'POST',
                    data: {
                        action: 'delete',
                        id: id
                    },
                    success: function(result) {
                        var data = JSON.parse(result);
                        Swal.fire({
                            position: 'top-end',
                            icon: `${data.status}`,
                            title: `${data.message}`,
                            showConfirmButton: false,
                            allowOutsideClick: false,
                            timer: 1500
                        }).then(() => {
                            if (data.status == 'success') {
                                location.reload();
                            }
                        })
                    }
                })
            }
        })
    }

    function UpdateAdmin(id) {
        $.ajax({
            url: 'api/admin.php',
            type: 'POST',
            data: {
                action: 'getById',
                id: id
            },
            success: function(result) {
                var data = JSON.parse(result);
                OpenModal('pages/form_update_admin.php', data, 'place_admin');
            }
        })
    }

    function EditAdmin(id) {
        var data = $('#formUpdateAdmin').serializeArray();
        $.ajax({
            url: 'api/admin.php',
            type: 'POST',
            data: {
                action: 'update',
                id: id,
                data: data
            },
            success: function(result) {
                var data = JSON.parse(result);
                Swal.fire({
                    position: 'top-end',
                    icon: `${data.status}`,
                    title: `${data.message}`,
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    timer: 1500
                }).then(() => {
                    if (data.status == 'success') {
                        location.reload();
                    }
                })
            }
        })
    }
</script>