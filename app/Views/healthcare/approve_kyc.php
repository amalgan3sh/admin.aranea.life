<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Aranea - KYC Approval</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico') ?>">

        <link href="<?= base_url('assets/libs/tabulator-tables/css/tabulator_bootstrap5.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/css/app.min.css') ?>" rel="stylesheet" type="text/css" />
    </head>

    <body id="body">
        <!-- Start of Sidebar -->
        <?= $this->include('healthcare/layouts/sidebar') ?>
        <!-- End of Sidebar -->
        
        <!-- Top Bar Start -->
        <!-- Your existing top bar code here -->
        <!-- Top Bar End -->

        <div class="page-wrapper">
            <!-- Page Content-->
            <div class="page-content-tab">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-end">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#">Aranea</a></li>
                                        <li class="breadcrumb-item"><a href="#">KYC</a></li>
                                        <li class="breadcrumb-item active">KYC Approval</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">KYC Approval</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">KYC Uploads </h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                <div class="table-responsive">
                                <table class="table table-sm table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Phone No</th>
                                        <th>Address</th>
                                        <th>Requested On</th>
                                        <th>Status</th>
                                        <th>Document</th> <!-- New Document column -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($kyc_details)): ?>
                                        <?php foreach ($kyc_details as $kyc_details): ?>
                                            <tr>
                                                <td><?= esc($kyc_details['full_name']) ?></td>
                                                <td><?= esc($kyc_details['phone_no']) ?></td>
                                                <td><?= esc($kyc_details['address']) ?></td>
                                                <td><?= esc($kyc_details['created_at']) ?></td>
                                                <td>
                                                    <?php if ($kyc_details['status'] == 'pending'): ?>
                                                        <span style="color: orange;">Pending</span>
                                                    <?php elseif ($kyc_details['status'] == 'approved'): ?>
                                                        <span style="color: green;">Approved</span>
                                                    <?php elseif ($kyc_details['status'] == 'rejected'): ?>
                                                        <span style="color: red;">Rejected</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <!-- New Document column with a View link -->
                                                    <a href="happymeds/<?= esc($kyc_details['document_path']) ?>" target="_blank">View</a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-success approve-button" 
                                                        data-id="<?= esc($kyc_details['id']) ?>" 
                                                        data-user-id="<?= esc($kyc_details['user_id']) ?>" 
                                                        >
                                                        Approve
                                                    </button>
                                                    <button class="btn btn-sm btn-danger reject-button"
                                                        data-id="<?= esc($kyc_details['id']) ?>">
                                                        Reject
                                                    </button>
                                                    <span class="loading-text" style="display: none;">Loading...</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7">No KYC requests found.</td> <!-- Adjust colspan to 7 -->
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>

                                </div>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div><!-- container -->

                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <!-- Your existing rightbar code here -->
                </div>
                <!--end Rightbar/offcanvas-->
                <!--end Rightbar-->
                 
                <!--Start Footer-->
                <!-- Footer Start -->
                <footer class="footer text-center text-sm-start">
                    &copy; <script>
                        document.write(new Date().getFullYear())
                    </script> ARANEA <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
                            class="mdi mdi-heart text-danger"></i> by SpyderHub</span>
                </footer>
                <!-- end Footer -->                
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- Javascript  -->   
        <!-- vendor js -->
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/feather-icons/feather.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/tabulator-tables/js/tabulator.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/pages/analytics-customers.init.js') ?>"></script>
        <!-- App js -->
        <script src="<?= base_url('assets/js/app.js') ?>"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
            $('.approve-button, .reject-button').click(function() {
                const button = $(this);
                const action = button.hasClass('approve-button') ? 'approve' : 'reject';
                const kycId = button.data('id');
                const userId = button.data('user-id');

                // Optional: Confirm action
                if (!confirm(`Are you sure you want to ${action} this KYC request?`)) {
                    return; // Exit if the user cancels
                }

                // Show loading text and hide buttons
                button.closest('td').find('button').hide();
                button.closest('td').find('.loading-text').show();

                // Prepare data to send
                const data = {
                    kyc_id: kycId,
                    user_id: userId,
                    action: action
                };

                alert(data.action)
                // Make the AJAX request
                $.ajax({
                    url: `<?= base_url("kyc_") ?>${action}`, // Adjust the URL as needed
                    type: 'POST',
                    data: data,
                    success: function(response) {
                        // Hide loading text
                        button.closest('td').find('.loading-text').hide();

                        // Handle success
                        if (response.status === 'success') {
                            alert(`KYC request ${action}d successfully!`);
                            location.reload(); // Refresh the page to see updated data
                        } else {
                            alert("An error occurred: " + response.message);
                            button.closest('td').find('button').show(); // Show buttons again
                        }
                    },
                    error: function(xhr, status, error) {
                        // Hide loading text and show buttons
                        button.closest('td').find('.loading-text').hide();
                        button.closest('td').find('button').show();
                        // Handle error
                        alert("An error occurred: " + error);
                    }
                });
            });
        });
        </script>

    </body>
</html>