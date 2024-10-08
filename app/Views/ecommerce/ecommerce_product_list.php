<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Nest Dashboard</title>
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="" />
        <meta property="og:url" content="" />
        <meta property="og:image" content="" />
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/theme/favicon.svg" />
        <!-- Template CSS -->
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/color-modes.js"></script>
        <link href="<?php echo base_url('ecommerce/') ?>assets/css/main.css?v=6.0" rel="stylesheet" type="text/css" />

        <style>
            td {
                max-width: 300px; /* Adjust based on your needs */
                word-wrap: break-word;
                white-space: normal;
            }
        </style>
    </head>


    <body>
        <div class="screen-overlay"></div>
        <aside class="navbar-aside" id="offcanvas_aside">
            <div class="aside-top">
                <a href="index.html" class="brand-wrap">
                    <img src="<?php echo base_url('ecommerce/') ?>assets/imgs/theme/logo.svg" class="logo" alt="Nest Dashboard" />
                </a>
                <div>
                    <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
                </div>
            </div>
            <nav>
                <ul class="menu-aside">
                    <li class="menu-item">
                        <a class="menu-link" href="index.html">
                            <i class="icon material-icons md-home"></i>
                            <span class="text">Dashboard</span>
                        </a>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-products-list.html">
                            <i class="icon material-icons md-shopping_bag"></i>
                            <span class="text">Products</span>
                        </a>
                        <div class="submenu has-submenu active">
                            <a href="product_list" class="active">Product List</a>
                            <a href="page-products-grid.html">Product grid</a>
                            <a href="page-products-grid-2.html">Product grid 2</a>
                            <a href="page-categories.html">Categories</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-orders-1.html">
                            <i class="icon material-icons md-shopping_cart"></i>
                            <span class="text">Orders</span>
                        </a>
                        <div class="submenu">
                            <a href="page-orders-1.html">Order list 1</a>
                            <a href="page-orders-2.html">Order list 2</a>
                            <a href="page-orders-detail.html">Order detail</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-sellers-cards.html">
                            <i class="icon material-icons md-store"></i>
                            <span class="text">Sellers</span>
                        </a>
                        <div class="submenu">
                            <a href="page-sellers-cards.html">Sellers cards</a>
                            <a href="page-sellers-list.html">Sellers list</a>
                            <a href="page-seller-detail.html">Seller profile</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu ">
                        <a class="menu-link" href="page-form-product-1.html">
                            <i class="icon material-icons md-add_box"></i>
                            <span class="text">Add product</span>
                        </a>
                        <div class="submenu">
                            <a href="add_product" >Add product</a>
                            <!-- <a href="page-form-product-2.html">Add product 2</a>
                            <a href="page-form-product-3.html">Add product 3</a>
                            <a href="page-form-product-4.html">Add product 4</a> -->
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="page-transactions-1.html">
                            <i class="icon material-icons md-monetization_on"></i>
                            <span class="text">Transactions</span>
                        </a>
                        <div class="submenu">
                            <a href="page-transactions-1.html">Transaction 1</a>
                            <a href="page-transactions-2.html">Transaction 2</a>
                        </div>
                    </li>
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="#">
                            <i class="icon material-icons md-person"></i>
                            <span class="text">Account</span>
                        </a>
                        <div class="submenu">
                            <a href="page-account-login.html">User login</a>
                            <a href="page-account-register.html">User registration</a>
                            <a href="page-error-404.html">Error 404</a>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="page-reviews.html">
                            <i class="icon material-icons md-comment"></i>
                            <span class="text">Reviews</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="page-brands.html"> <i class="icon material-icons md-stars"></i> <span class="text">Brands</span> </a>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" disabled href="#">
                            <i class="icon material-icons md-pie_chart"></i>
                            <span class="text">Statistics</span>
                        </a>
                    </li>
                </ul>
                <hr />
                <ul class="menu-aside">
                    <li class="menu-item has-submenu">
                        <a class="menu-link" href="#">
                            <i class="icon material-icons md-settings"></i>
                            <span class="text">Settings</span>
                        </a>
                        <div class="submenu">
                            <a href="page-settings-1.html">Setting sample 1</a>
                            <a href="page-settings-2.html">Setting sample 2</a>
                        </div>
                    </li>
                    <li class="menu-item">
                        <a class="menu-link" href="page-blank.html">
                            <i class="icon material-icons md-local_offer"></i>
                            <span class="text"> Starter page </span>
                        </a>
                    </li>
                </ul>
                <br />
                <br />
            </nav>
        </aside>
        <main class="main-wrap">
            <header class="main-header navbar">
                <div class="col-search">
                    <form class="searchform">
                        <div class="input-group">
                            <input list="search_terms" type="text" class="form-control" placeholder="Search term" />
                            <button class="btn btn-light bg" type="button"><i class="material-icons md-search"></i></button>
                        </div>
                        <datalist id="search_terms">
                            <option value="Products"></option>
                            <option value="New orders"></option>
                            <option value="Apple iphone"></option>
                            <option value="Ahmed Hassan"></option>
                        </datalist>
                    </form>
                </div>
                <div class="col-nav">
                    <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"><i class="material-icons md-apps"></i></button>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link btn-icon" href="#">
                                <i class="material-icons md-notifications animation-shake"></i>
                                <span class="badge rounded-pill">3</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i> </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="requestfullscreen nav-link btn-icon"><i class="material-icons md-cast"></i></a>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage" aria-expanded="false"><i class="material-icons md-public"></i></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                                <a class="dropdown-item text-brand" href="#"><img src="assets/imgs/theme/flag-us.png" alt="English" />English</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-fr.png" alt="Français" />Français</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-jp.png" alt="Français" />日本語</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-cn.png" alt="Français" />中国人</a>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="<?php echo base_url('ecommerce/') ?>assets/imgs/people/avatar-2.png" alt="User" /></a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                                <a class="dropdown-item" href="#"><i class="material-icons md-perm_identity"></i>Edit Profile</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-settings"></i>Account Settings</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-account_balance_wallet"></i>Wallet</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-receipt"></i>Billing</a>
                                <a class="dropdown-item" href="#"><i class="material-icons md-help_outline"></i>Help center</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="#"><i class="material-icons md-exit_to_app"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </header>
            <section class="content-main">
                <div class="content-header">
                    <div>
                        <h2 class="content-title card-title">Products List</h2>
                        <!-- <p>Lorem ipsum dolor sit amet.</p> -->
                    </div>
                    <div>
                        <!-- <a href="#" class="btn btn-light rounded font-md">Export</a>
                        <a href="#" class="btn btn-light rounded font-md">Import</a> -->
                        <a href="add_product" class="btn btn-primary btn-sm rounded">Add Product</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <!-- <header class="card-header">
                        <div class="row align-items-center">
                            <div class="col col-check flex-grow-0">
                                <div class="form-check ms-2">
                                    <input class="form-check-input" type="checkbox" value="" />
                                </div>
                            </div>
                            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                                <select class="form-select">
                                    <option selected>Product Name</option>
                                    <option>Electronics</option>
                                    <option>Clothes</option>
                                    <option>Automobile</option>
                                </select>
                            </div>
                            <div class="col-md-2 col-6">
                                <input type="date" value="02.05.2021" class="form-control" />
                            </div>
                            <div class="col-md-2 col-6">
                                <select class="form-select">
                                    <option selected>Status</option>
                                    <option>Active</option>
                                    <option>Disabled</option>
                                    <option>Show all</option>
                                </select>
                            </div>
                        </div>
                    </header> -->
                    <!-- card-header end// -->
                    <div class="card-body">
                       <table  id="product_list" class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Product name</th>
                                <th>Therapeutic Use</th>
                                <th>Shape & Color</th>
                                <th>Unit Size</th>
                                <th>Manufacturing Date</th>
                                <th>Expiry Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                       
                        <!-- itemlist  .// -->
                        
                         <?php  foreach($product_list as $product_data): ?>
                            <tbody>
                                <tr>
                                <td><?php echo $product_data['product_id']; ?> </td>
                                    <td><?php echo $product_data['ProductName']; ?> </td>
                                    <td><?php echo $product_data['TherapeuticUse']; ?> </td>
                                    <td><?php echo $product_data['TabletShapeAndColor']; ?> </td>
                                    <td><?php echo $product_data['UnitSize']; ?> </td>
                                    <td><?php if($product_data['ManufacturingDate'] =='0000-00-00') { echo ''; } else { echo date('d-m-Y', strtotime($product_data['ManufacturingDate'])); }   ?> </td>
                                    <td><?php if($product_data['ManufacturingDate'] =='0000-00-00') { echo ''; } else { echo date('d-m-Y', strtotime($product_data['ExpiryDate'])); } ?> </td>
                                    <td>
                                    <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                                        <a href="javascript:void(0);" 
                                        class="btn btn-sm font-sm btn-success rounded" 
                                        onclick="confirmDelete('<?php echo urlencode($product_data['product_id']); ?>')">
                                            <i class="material-icons md-delete_forever"></i> Delete
                                        </a>
                                    </div>
                                    </td>
                                </tr>
                            </tbody>
                        <!-- <article class="itemlist"> -->
                            <!-- <div class="row align-items-center">
                                <div class="col col-check flex-grow-0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" />
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-8 flex-grow-1 col-name">
                                    <a class="itemside" href="#">
                                        <div class="left">
                                            <img src="assets/imgs/items/5.jpg" class="img-sm img-thumbnail" alt="Item" />
                                        </div>
                                        <div class="info">
                                            <h6 class="mb-0"></h6>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-price"><span>$18.00</span></div>
                                <div class="col-lg-2 col-sm-2 col-4 col-status">
                                    <span class="badge rounded-pill alert-warning">Archived</span>
                                </div>
                                <div class="col-lg-1 col-sm-2 col-4 col-date">
                                    <span>02.11.2021</span>
                                </div>
                                <div class="col-lg-2 col-sm-2 col-4 col-action text-end">
                                    <a href="#" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                    <a href="#" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Delete </a>
                                </div>
                            </div> -->
                            <!-- row .// -->
                        <!-- </article> -->
                        <?php endforeach; ?>
                        
                       
                        </table>
                    </div>
                    <!-- card-body end// -->
                </div>
                <!-- card end// -->
                <!-- <div class="pagination-area mt-30 mb-50">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-start">
                            <li class="page-item active"><a class="page-link" href="#">01</a></li>
                            <li class="page-item"><a class="page-link" href="#">02</a></li>
                            <li class="page-item"><a class="page-link" href="#">03</a></li>
                            <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                            <li class="page-item"><a class="page-link" href="#">16</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                            </li>
                        </ul>
                    </nav>
                </div> -->
            </section>
            <!-- content-main end// -->
            <footer class="main-footer font-xs">
                <div class="row pb-30 pt-15">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        &copy; Nest - HTML Ecommerce Template .
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end">All rights reserved</div>
                    </div>
                </div>
            </footer>
        </main>
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/select2.min.js"></script>
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/perfect-scrollbar.js"></script>
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/jquery.fullscreen.min.js"></script>
        <!-- Main Script -->
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/main.js?v=6.0" type="text/javascript"></script>
        <script>
            function confirmDelete(productId) {
        // Show a confirmation dialog
        if (confirm("Are you sure you want to delete this product?")) {
            // If the user confirms, redirect to the delete action
            window.location.href = '/delete_product?id=' + productId;
        }

        // Function to show alert messages
        function showAlert(message) {
            alert(message);
        }

        // Check if there is a flashdata message for success or error
        <?php if (session()->getFlashdata('success')): ?>
            showAlert("<?php echo session()->getFlashdata('success'); ?>");
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            showAlert("<?php echo session()->getFlashdata('error'); ?>");
        <?php endif; ?>
    }


        </script>
    </body>
</html>
