<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Aranea - Investment Request</title>
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
                                        <li class="breadcrumb-item"><a href="#">Investments</a></li>
                                        <li class="breadcrumb-item active">Investment Requests</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Investments</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Investment Requests </h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Dosage Form</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (!empty($product_list)): ?>
                                        <?php foreach ($product_list as $product_details): ?>
                                            <tr>
                                                <td><?= esc($product_details['product_name']) ?></td>
                                                <td><?= esc($product_details['category']) ?></td>
                                                <td><?= esc($product_details['dosage_form']) ?></td>
                                                <td align="right"><?= esc($product_details['price']) ?></td>
                                                <td>
                                                    <?php if ($product_details['status'] == 'pending'): ?>
                                                        <span style="color: orange;">Pending</span>
                                                    <?php elseif ($product_details['status'] == 'approved'): ?>
                                                        <span style="color: green;">Approved</span>
                                                    <?php elseif ($product_details['status'] == 'rejected'): ?>
                                                        <span style="color: red;">Rejected</span>
                                                    <?php endif; ?>
                                                </td>
                                               
                                                <td>
                                                    <?php if($product_details['status'] == 'pending'): ?>
                                                    <button class="btn btn-sm btn-success approve-button" 
                                                        data-id="<?= esc($product_details['id']) ?>" 
                                                        data-user-id="<?= esc($product_details['user_id']) ?>" 
                                                        data-status="approve"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#approveModal"
                                                        >
                                                        Approve
                                                    </button>
                                                    <button class="btn btn-sm btn-danger reject-button"
                                                        data-id="<?= esc($product_details['id']) ?>" data-status="reject"
                                                        data-user-id="<?= esc($product_details['user_id']) ?>"
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#approveModal">
                                                        Reject
                                                    </button>
                                                    <?php endif; ?>
                                                    <span class="loading-text" style="display: none;">Loading...</span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="7">No Products found.</td> <!-- Adjust colspan to 7 -->
                                        </tr>
                                    <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Modal for Approval Reason -->
                                <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="approveModalLabel">Change Status</h5>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="approvalForm">
                                        <input type="hidden" id="product-id" name="product_id">
                                        <input type="hidden" id="user-id" name="user_id">
                                        <input type="hidden" id="status" name="status">
                                        <div class="form-group">
                                            <label for="approval-reason">Reason:</label>
                                            <textarea class="form-control" id="status_description" name="status_description" rows="3" required></textarea>
                                        </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="submitApproval">Submit</button>
                                    </div>
                                    </div>
                                </div>
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
            document.querySelectorAll('.approve-button, .reject-button').forEach(button => {
                button.addEventListener('click', function() {
                    const button = $(this);
                    const action = button.hasClass('approve-button') ? 'approve' : 'reject';
                   
                    const productId = this.getAttribute('data-id');
                    const userId = this.getAttribute('data-user-id');
                
                    // Set the hidden input values in the modal form
                    document.getElementById('product-id').value = productId;
                    document.getElementById('user-id').value = userId;
                    document.getElementById('status').value=action;
                });
            });

document.getElementById('submitApproval').addEventListener('click', function() {
    const formData = new FormData(document.getElementById('approvalForm'));
    var action = 'approve';
    
    // Log the contents of FormData
    formData.forEach((value, key) => {
        if(key == 'status') {
            action = value;
        }
        console.log(key + ': ' + value);

    });

    fetch(`<?= base_url("submit_") ?>${action}`, {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if(data.success) {
            alert(`Product ${action}ed successfully!`);
            $('#approveModal').modal('hide');
            $("#approveModel #status_description").empty();
           
            location.reload(); // Refresh the page to see updated data

        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        alert('There was an error: ' + error.message);
    });
});




        </script>

    </body>
</html>