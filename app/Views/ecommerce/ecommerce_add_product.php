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
                        <div class="submenu">
                            <a href="product_list">Product List</a>
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
                    <li class="menu-item has-submenu active">
                        <a class="menu-link" href="page-form-product-1.html">
                            <i class="icon material-icons md-add_box"></i>
                            <span class="text">Add product</span>
                        </a>
                        <div class="submenu">
                            <a href="add_product" class="active">Add product</a>
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
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Add New Product</h2>
                            <div>
                                <!-- <button class="btn btn-light rounded font-sm mr-5 text-body hover-up">Save to draft</button> -->
                                <!-- <button class="btn btn-md rounded font-sm hover-up ">Add</button> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Basic</h4>
                            </div>
                            <div class="card-body">
                                <?php if (isset($_GET['message'])): ?>
                                <div class="alert alert-info" id="add_product_modal">
                                   <span class="message"> <?= htmlspecialchars($_GET['message']) ?> </span>
                                    <!-- <button type="button" id="close_modal" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button> -->
                                </div>
                                <?php endif; ?>

                                <form class="row" method="post" action="submit_add_product" enctype="multipart/form-data">
                                    <div class="col-lg-6">
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" placeholder="Type here" class="form-control" id="product_name" name="product_name" required>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="content">Content</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4" id="content" name="content" required></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Dosage Form</label>
                                        <input type="text" placeholder="Type here" class="form-control" id="dosage_form" name="dosage_form" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Strength</label>
                                        <input type="text" placeholder="Type here" class="form-control" id="strength" name="strength" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Therapeutic Use</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4" id="therapeutic_use" name="therapeutic_use" required></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="tab_shape_and_color">Shape & Color</label>
                                        <input type="text" placeholder="Type here" class="form-control" id="tab_shape_and_color" name="tab_shape_and_color" required />
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Product Image</label>
                                        <div class="input-upload">
                                            <img src="assets/imgs/theme/upload.svg" alt="" />
                                            <input class="form-control" id="main_product_image" name="main_product_image" type="file" />
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label">Other Images</label>
                                        <div class="input-upload">
                                            <img src="assets/imgs/theme/upload.svg" alt="" />
                                            <input class="form-control" id="other_product_images" name="other_product_images[]" type="file"  multiple>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="packaging" class="form-label">Packaging</label>
                                                <input type="text" placeholder="Packaging" class="form-control" id="packaging" name="packaging" required />
                                            </div>
                                        
                                        
                                            <div class="mb-4">
                                                <label for="batch_number" class="form-label">Batch Number</label>
                                                <input type="text" placeholder="Batch Number" class="form-control" id="batch_number" name="batch_number" required />
                                            </div>
                                        
                                            <div class="mb-4">
                                        <label for="manufacturing_date" class="form-label">Manufacturing Date</label>
                                        <input type="date" placeholder="gam" class="form-control" id="manufacturing_date" name="manufacturing_date" required />
                                    </div>
                                    <div class="mb-4">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" placeholder="$" class="form-control" id="expiry_date" name="expiry_date" required />
                                    </div>
                                    <div class="mb-4">
                                        <label for="unit_size" class="form-label">Unit Size</label>
                                        <input type="text" placeholder="UnitSize" class="form-control" id="unit_size" name="unit_size" required />
                                    </div>
                                    <div class="mb-4">
                                        <label for="shipper_size" class="form-label">Shipper Size</label>
                                        <input type="text" placeholder="UnitSize" class="form-control" id="shipper_size" name="shipper_size" required />
                                    </div>
                                    <div class="mb-4">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="text" placeholder="Icon" class="form-control" id="icon" name="icon" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="rating" class="form-label">Rating</label>
                                        <input type="number" placeholder="Rating" class="form-control" id="rating" name="rating" />
                                    </div>
                                    
                                    </div>
                                    <!-- <div class="mb-4">
                                        <label class="form-label">Full description</label>
                                        <textarea placeholder="Type here" class="form-control" rows="4"></textarea>
                                    </div> -->
                                    <!-- <div class="row"> -->
                                        <!-- <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Regular price</label>
                                                <div class="row gx-2">
                                                    <input placeholder="$" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="col-lg-4">
                                            <div class="mb-4">
                                                <label class="form-label">Promotional price</label>
                                                <input placeholder="$" type="text" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <label class="form-label">Currency</label>
                                            <select class="form-select">
                                                <option>USD</option>
                                                <option>EUR</option>
                                                <option>RUBL</option>
                                            </select>
                                        </div> -->
                                    <!-- </div> -->
                                    <!-- <div class="mb-4">
                                        <label class="form-label">Tax rate</label>
                                        <input type="text" placeholder="%" class="form-control" id="product_name" />
                                    </div>
                                    <label class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="" />
                                        <span class="form-check-label"> Make a template </span>
                                    </label> -->
                                    <div class="form-group mb-0 row">
                                            <div class="">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Add <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group--> 
                                </form>
                            </div>
                        </div>
                        <!-- card end// -->
                        <!-- <div class="card mb-4">
                            <div class="card-header">
                                <h4>Shipping</h4>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="product_name" class="form-label">Width</label>
                                                <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-4">
                                                <label for="product_name" class="form-label">Height</label>
                                                <input type="text" placeholder="inch" class="form-control" id="product_name" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Weight</label>
                                        <input type="text" placeholder="gam" class="form-control" id="product_name" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Shipping fees</label>
                                        <input type="text" placeholder="$" class="form-control" id="product_name" />
                                    </div>
                                </form>
                            </div>
                        </div> -->
                        <!-- card end// -->
                    </div>
                    <div class="col-lg-6">
                    <!-- <div class="card mb-4">
                            <div class="card-header">
                                <h4>Other Details</h4>
                            </div>
                            <div class="card-body"> -->
                                <!-- <form>
                                    <div class="row">
                                            <div class="mb-4">
                                                <label for="packaging" class="form-label">Packaging</label>
                                                <input type="text" placeholder="Packaging" class="form-control" id="packaging" name="packaging" />
                                            </div>
                                        
                                        
                                            <div class="mb-4">
                                                <label for="batch_number" class="form-label">Batch Number</label>
                                                <input type="text" placeholder="Batch Number" class="form-control" id="batch_number" name="batch_number" />
                                            </div>
                                        
                                    </div>
                                    <div class="mb-4">
                                        <label for="manufacturing_date" class="form-label">Manufacturing Date</label>
                                        <input type="date" placeholder="gam" class="form-control" id="manufacturing_date" name="manufacturing_date" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" placeholder="$" class="form-control" id="expiry_date" name="expiry_date" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="unit_size" class="form-label">Unit Size</label>
                                        <input type="text" placeholder="UnitSize" class="form-control" id="unit_size" name="unit_size" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="shipper_size" class="form-label">Shipper Size</label>
                                        <input type="text" placeholder="UnitSize" class="form-control" id="shipper_size" name="shipper_size" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="icon" class="form-label">Icon</label>
                                        <input type="text" placeholder="Icon" class="form-control" id="icon" name="icon" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="rating" class="form-label">Rating</label>
                                        <input type="number" placeholder="Rating" class="form-control" id="rating" name="rating" />
                                    </div>
                                </form> -->
                            <!-- </div>
                        </div> -->
                        <!-- <div class="card mb-4">
                            <div class="card-header">
                                <h4>Media</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-upload">
                                    <img src="assets/imgs/theme/upload.svg" alt="" />
                                    <input class="form-control" type="file" />
                                </div>
                            </div>
                        </div> -->
                        <!-- card end// -->
                        <!-- <div class="card mb-4">
                            <div class="card-header">
                                <h4>Organization</h4>
                            </div>
                            <div class="card-body">
                                <div class="row gx-2">
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Category</label>
                                        <select class="form-select">
                                            <option>Automobiles</option>
                                            <option>Home items</option>
                                            <option>Electronics</option>
                                            <option>Smartphones</option>
                                            <option>Sport items</option>
                                            <option>Baby and Tous</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-6 mb-3">
                                        <label class="form-label">Sub-category</label>
                                        <select class="form-select">
                                            <option>Nissan</option>
                                            <option>Honda</option>
                                            <option>Mercedes</option>
                                            <option>Chevrolet</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="product_name" class="form-label">Tags</label>
                                        <input type="text" class="form-control" />
                                    </div>
                                </div>
                                 row.// -->
                            </div>
                        </div> 
                        <!-- card end// -->
                    </div>
                </div>
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

    
        </script>
    </body>
</html>
