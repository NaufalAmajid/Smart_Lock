<div class="pagetitle">
    <h1>Users</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                    <h5 class="card-title">List User Have Access Lock</h5>
                    <button type="button" class="btn btn-primary btn-sm mb-3" style="float: right; margin-right: 10px; margin-bottom: 10px; margin-top: -40px;" onclick="OpenModal('pages/form_create_user.php', 'no data sender', 'form_create_user')">
                        <i class="bi bi-person-plus-fill"></i> User
                    </button>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead></thead>
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
    function SaveUser(){
        var data = $('#formAddUser').serializeArray();
        // $.ajax({
        //     url: 'api/user.php',
        //     type: 'POST',
        //     data: data,
        //     success: function(result){
        //         console.log(result);
        //     }
        // });
    }
</script>