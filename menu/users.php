<?php
unset($_SESSION['new_rfid']);
?>
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
                            <button type="button" class="btn btn-primary btn-sm mb-3" style="float: right;" onclick="OpenModal('pages/form_create_user.php', 'no data sender', 'place_user')">
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
                                            <th>Address</th>
                                            <th>RFID</th>
                                            <th>Created By</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT a.name AS name_of_user, b.name AS name_of_admin, a.* FROM users a LEFT JOIN admins b ON a.admin_id = b.admin_id ORDER BY a.id DESC";
                                        $result = mysqli_query($connect, $query);
                                        $no = 1;
                                        $users = [];
                                        while ($row = mysqli_fetch_array($result)) {
                                            $users[] = $row;
                                        }
                                        ?>
                                        <?php foreach ($users as $us) : ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $us['name_of_user'] ?></td>
                                                <td><?= $us['address'] ?></td>
                                                <td><?= $us['card_id'] ?></td>
                                                <td><?= $us['name_of_admin'] ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-info btn-sm" onclick="UpdateUser('<?= $us['id'] ?>')">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="DeleteUser('<?= $us['id'] ?>')">
                                                        <i class="bi bi-trash-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
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
<div class="modal fade" id="place_user" tabindex="-1"></div>

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
                }).then(() => {
                    if (data.status == 'success') {
                        window.location.reload();
                    }
                })
            }
        });
    }

    function UpdateUser(id) {
        $.ajax({
            url: 'api/user.php',
            type: 'POST',
            data: {
                action: 'getById',
                id: id
            },
            success: function(result) {
                var data = JSON.parse(result);
                OpenModal('pages/form_edit_user.php', data, 'place_user');
            }
        })
    }

    function EditUser(id) {
        var data = $('#formEditUser').serializeArray();
        $.ajax({
            url: 'api/user.php',
            type: 'POST',
            data: {
                action: 'edit',
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

    function DeleteUser(id) {
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
                    url: 'api/user.php',
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
</script>