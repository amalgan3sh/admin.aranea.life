<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <title>Aranea - Orders Management</title>
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
                                        <li class="breadcrumb-item"><a href="#">Orders</a></li>
                                        <li class="breadcrumb-item active">Order Management</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Order Management</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Orders</h4>
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>User ID</th>
                                                    <th>Order Items</th>
                                                    <th>Total Amount</th>
                                                    <th>Status</th>
                                                    <th>Requested On</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($orders)): ?>
                                                    <?php foreach ($orders as $order): ?>
                                                        <tr>
                                                            <td><?= esc($order['order_id']) ?></td>
                                                            <td><?= esc($order['user_id']) ?></td>
                                                            <td><?= esc($order['product_names']) ?></td>
                                                            <td><?= esc($order['total_amount']) ?></td>
                                                            <td>
                                                                <?php if ($order['status'] == 'pending'): ?>
                                                                    <span style="color: orange;">Pending</span>
                                                                <?php elseif ($order['status'] == 'processing'): ?>
                                                                    <span style="color: blue;">Processing</span>
                                                                <?php elseif ($order['status'] == 'completed'): ?>
                                                                    <span style="color: green;">Completed</span>
                                                                <?php elseif ($order['status'] == 'cancelled'): ?>
                                                                    <span style="color: red;">Cancelled</span>
                                                                <?php elseif ($order['status'] == 'quoted'): ?>
                                                                    <span style="color: purple;">Quoted</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td><?= esc($order['created_at']) ?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-primary create-quotation" 
                                                                    data-order-id="<?= esc($order['order_id']) ?>" 
                                                                    data-user-id="<?= esc($order['user_id']) ?>">
                                                                    Create Quotation
                                                                </button>
                                                                <button class="btn btn-sm btn-danger reject-order"
                                                                    data-order-id="<?= esc($order['order_id']) ?>">
                                                                    Reject
                                                                </button>
                                                                <button class="btn btn-sm btn-info view-quotation"
                                                                    data-order-id="<?= esc($order['order_id']) ?>">
                                                                    View Quotation
                                                                </button>
                                                                <button class="btn btn-sm btn-success notify-client" data-order-id="<?= esc($order['order_id']) ?>" data-user-id="<?= esc($order['user_id']) ?>">
                                                                    Notify Client
                                                                </button>
                                                                <span class="loading-text" style="display: none;">Loading...</span>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="7">No orders found.</td>
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

                <!-- Footer Start -->
                <footer class="footer text-center text-sm-start">
                    &copy; <script>document.write(new Date().getFullYear())</script> ARANEA
                    <span class="text-muted d-none d-sm-inline-block float-end">
                        Crafted with <i class="mdi mdi-heart text-danger"></i> by SpyderHub
                    </span>
                </footer>
                <!-- end Footer -->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- Javascript  -->
        <script src="<?= base_url('assets/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/simplebar/simplebar.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/feather-icons/feather.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/apexcharts/apexcharts.min.js') ?>"></script>
        <script src="<?= base_url('assets/libs/tabulator-tables/js/tabulator.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/app.js') ?>"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
        $(document).ready(function() {
            $('.create-quotation').click(function() {
                const orderId = $(this).data('order-id');
                
                $.ajax({
                    url: '<?= base_url("orders/createQuotation") ?>',
                    type: 'POST',
                    data: { order_id: orderId },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while creating the quotation: " + error);
                    }
                });
            });

            $('.view-quotation').click(function() {
                const orderId = $(this).data('order-id');
                
                window.location.href = '<?= base_url("orders/viewQuotationPdf") ?>/' + orderId;
            });

            $('.notify-client').click(function() {
                const orderId = $(this).data('order-id');
                const userId = $(this).data('user-id');
                
                $.ajax({
                    url: '<?= base_url("orders/notifyClient") ?>',
                    type: 'POST',
                    data: { order_id: orderId, user_id: userId },
                    success: function(response) {
                        alert(response.message);
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while notifying the client: " + error);
                    }
                });
            });

            $('.reject-order').click(function() {
                const orderId = $(this).data('order-id');
                
                $.ajax({
                    url: '<?= base_url("orders/rejectOrder") ?>',
                    type: 'POST',
                    data: { order_id: orderId },
                    success: function(response) {
                        alert(response.message);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred while rejecting the order: " + error);
                    }
                });
            });
        });
        </script>
    </body>
</html>