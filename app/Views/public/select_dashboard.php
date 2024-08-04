<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Dashboard Selection - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Dashboard Selection for Super Admin" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                             <img src="assets/images/ARANEA_WHITE.png" height="100" alt="logo" class="auth-logo">
                                        </a>
                                        <?php $session = session(); ?>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Welcome, <?= $session->get('username') ?>!</h4>   
                                        <p class="text-muted mb-0">Please select the dashboard you'd like to access.</p>  
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Healthcare Card -->
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-hospital fa-3x mb-3 text-primary"></i>
                                                    <h5 class="card-title">Healthcare</h5>
                                                    <p class="card-text">Access the Healthcare dashboard</p>
                                                    <a href="<?php echo base_url('healthcare_dashboard') ?>" class="btn btn-primary">Go to Healthcare</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- HolidayCity Card -->
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-umbrella-beach fa-3x mb-3 text-success"></i>
                                                    <h5 class="card-title">HolidayCity</h5>
                                                    <p class="card-text">Access the HolidayCity dashboard</p>
                                                    <a href="<?php echo base_url('holiday_dashboard') ?>" class="btn btn-success">Go to HolidayCity</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- IES Dashboard Card -->
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-shipping-fast fa-3x mb-3 text-danger"></i>
                                                    <h5 class="card-title">IES Dashboard</h5>
                                                    <p class="card-text">Access the IES dashboard</p>
                                                    <a href="https://demo.lakshmipharmaceuticals.com/" class="btn btn-danger">Go to IES Dashboard</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Pre-Distributor Dashboard Card -->
                                        <div class="col-md-6 mb-3">
                                            <div class="card">
                                                <div class="card-body text-center">
                                                    <i class="fas fa-truck-loading fa-3x mb-3 text-warning"></i>
                                                    <h5 class="card-title">Pre-Distributor Dashboard</h5>
                                                    <p class="card-text">Access the Pre-Distributor dashboard</p>
                                                    <a href="https://user.lakshmipharmaceuticals.com/" class="btn btn-warning">Go to Pre-Distributor</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!--end card-body-->
                                <div class="card-body bg-light-alt text-center">
                                    &copy; <script>
                                        document.write(new Date().getFullYear())
                                    </script> Aranea                                          
                                </div><!--end card-body-->
                            </div><!--end card-->
                        </div><!--end col-->
                    </div><!--end row-->
                </div><!--end card-body-->
            </div><!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <!-- vendor js -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <!-- App js -->
    <script src="assets/js/app.js"></script>
</body>

</html>