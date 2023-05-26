<?php
unset($_SESSION['new_rfid']);
?>
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>
<!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <!-- Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">User Access <span>| Total </span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-bounding-box"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        $userQuery = "SELECT * FROM users";
                                        $userResult = mysqli_query($connect, $userQuery);
                                        echo mysqli_num_rows($userResult);
                                        ?>
                                    </h6>
                                    <span class="text-success small pt-1 fw-bold">Person</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <h5 class="card-title">Access Received <span>| <?= $func->DateDesc(date('Y-m-d')) ?></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-fill-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        // $query = "SELECT * FROM logs WHERE date = '" . date('Y-m-d') . "'";
                                        // $result = mysqli_query($connect, $query);
                                        // echo mysqli_num_rows($result);
                                        echo '0';
                                        ?>
                                    </h6>
                                    <span class="text-success small pt-1 fw-bold">Scanning</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Admin Dashboard <span>| Total</span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>
                                        <?php
                                        $query = "SELECT * FROM admins";
                                        $result = mysqli_query($connect, $query);
                                        echo mysqli_num_rows($result);
                                        ?>
                                    </h6>
                                    <span class="text-success small pt-1 fw-bold">Use</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</section>