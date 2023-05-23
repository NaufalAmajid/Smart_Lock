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
                                    <h6>145</h6>
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
                                    <h6>145</h6>
                                    <span class="text-success small pt-1 fw-bold">Scanning</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Access Denied <span>| <?= $func->DateDesc(date('Y-m-d')) ?></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-shield-fill-x"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>145</h6>
                                    <span class="text-success small pt-1 fw-bold">Scanning</span>
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