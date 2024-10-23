
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
                            <div class="dropdown-menu dropdown-menu-start" aria-labelledby="dropdownLanguage">
                                <a class="dropdown-item text-brand" href="#"><img src="assets/imgs/theme/flag-us.png" alt="English" />English</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-fr.png" alt="Français" />Français</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-jp.png" alt="Français" />日本語</a>
                                <a class="dropdown-item" href="#"><img src="assets/imgs/theme/flag-cn.png" alt="Français" />中国人</a>
                            </div>
                        </li>
                        <li class="dropdown nav-item">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount" aria-expanded="false"> <img class="img-xs rounded-circle" src="assets/imgs/people/avatar-2.png" alt="User" /></a>
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
                        <h2 class="content-title card-title">Dashboard</h2>
                        <p>Whole data about your business here</p>
                    </div>
                    <!-- <div>
                        <a href="#" class="btn btn-primary"><i class="text-muted material-icons md-post_add"></i>Create report</a>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-shopping_bag"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Added Products</h6>
                                    <span><?php  echo $added_product_total; ?></span>
                                    <span class="text-sm">No of Products added.</span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-shopping_bag"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Products</h6>
                                    <span><?php  echo $total_count; ?></span>
                                    <span class="text-sm"> Products waiting for approval.</span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-shopping_bag"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Approved Products</h6>
                                    <span><?php  echo $approved_count; ?></span>
                                    <span class="text-sm"> Products approved by Admin. </span>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="card card-body mb-4">
                            <article class="icontext">
                                <span class="icon icon-sm rounded-circle bg-danger-light"><i class="text-danger material-icons md-shopping_bag"></i></span>
                                <div class="text">
                                    <h6 class="mb-1 card-title">Rejected Products</h6>
                                    <span><?php  echo $rejected_count; ?></span>
                                    <span class="text-sm"> Products rejected by Admin. </span>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8 col-lg-12">
                        <!-- <div class="card mb-4">
                            <article class="card-body">
                                <h5 class="card-title">Sale statistics</h5>
                                <canvas id="myChart" height="120px"></canvas>
                            </article>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="card mb-4">
                                    <article class="card-body">
                                        <h5 class="card-title">Latest Members Added</h5>
                                        <div class="new-member-list">
                                            <?php 
                                            $count = 1;
                                            foreach($users_list as $user_info) { 
                                                if($count == 6) { break; } ?>
                                            <div class="d-flex align-items-center justify-content-between mb-4">
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/images/avatar-1.png" alt="" class="avatar" />
                                                    <div>
                                                        <h6><?php echo ucwords($user_info['firstname'].' '.$user_info['lastname']); ?></h6>
                                                        <p class="text-muted font-xs"><?php echo $user_info['location']; ?></p>
                                                    </div>
                                                </div>
                                                <!-- <a href="#" class="btn btn-xs"><i class="material-icons md-add"></i> Add</a> -->
                                            </div>
                                            <?php $count++; } ?>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="card mb-4">
                                    <article class="card-body">
                                        <h5 class="card-title">Recent activities</h5>
                                        <ul class="verti-timeline list-unstyled font-sm">
                                            <?php 
                                            foreach($recent_activity as $recent_activity_info){ ?>
                                            <li class="event-list">
                                                <div class="event-timeline-dot">
                                                    <i class="material-icons md-play_circle_outline font-xxl"></i>
                                                </div>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <h6><span><?php echo date('j M', strtotime($recent_activity_info['timestamp'])) ?></span> <i class="material-icons md-trending_flat text-brand ml-15 d-inline-block"></i></h6>
                                                    </div>
                                                    <div class="media-body">
                                                        <div><?php echo $recent_activity_info['type']; ?> by <?php echo ucwords($recent_activity_info['user_name']); ?> </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-4 col-lg-12">
                        <div class="card mb-4">
                            <article class="card-body">
                                <h5 class="card-title">Revenue Base on Area</h5>
                                <canvas id="myChart2" height="217"></canvas>
                            </article>
                        </div>
                        <div class="card mb-4">
                            <article class="card-body">
                                <h5 class="card-title">Marketing Chanel</h5>
                                <span class="text-muted font-xs">Facebook</span>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 15%">15%</div>
                                </div>
                                <span class="text-muted font-xs">Instagram</span>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 65%">65%</div>
                                </div>
                                <span class="text-muted font-xs">Google</span>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 51%">51%</div>
                                </div>
                                <span class="text-muted font-xs">Twitter</span>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 80%">80%</div>
                                </div>
                                <span class="text-muted font-xs">Other</span>
                                <div class="progress mb-3">
                                    <div class="progress-bar" role="progressbar" style="width: 80%">80%</div>
                                </div>
                            </article>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="card mb-4">
                    <header class="card-header">
                        <h4 class="card-title">Latest orders</h4>
                        <div class="row align-items-center">
                            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                                <div class="custom_select">
                                    <select class="form-select select-nice">
                                        <option selected>All Categories</option>
                                        <option>Women's Clothing</option>
                                        <option>Men's Clothing</option>
                                        <option>Cellphones</option>
                                        <option>Computer & Office</option>
                                        <option>Consumer Electronics</option>
                                        <option>Jewelry & Accessories</option>
                                        <option>Home & Garden</option>
                                        <option>Luggage & Bags</option>
                                        <option>Shoes</option>
                                        <option>Mother & Kids</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2 col-6">
                                <input type="date" value="02.05.2021" class="form-control" />
                            </div>
                            <div class="col-md-2 col-6">
                                <div class="custom_select">
                                    <select class="form-select select-nice">
                                        <option selected>Status</option>
                                        <option>All</option>
                                        <option>Paid</option>
                                        <option>Chargeback</option>
                                        <option>Refund</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </header>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="table-responsive">
                                <table class="table align-middle table-nowrap mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col" class="text-center">
                                                <div class="form-check align-middle">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck01" />
                                                    <label class="form-check-label" for="transactionCheck01"></label>
                                                </div>
                                            </th>
                                            <th class="align-middle" scope="col">Order ID</th>
                                            <th class="align-middle" scope="col">Billing Name</th>
                                            <th class="align-middle" scope="col">Date</th>
                                            <th class="align-middle" scope="col">Total</th>
                                            <th class="align-middle" scope="col">Payment Status</th>
                                            <th class="align-middle" scope="col">Payment Method</th>
                                            <th class="align-middle" scope="col">View Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck02" />
                                                    <label class="form-check-label" for="transactionCheck02"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-bold">#SK2540</a></td>
                                            <td>Neal Matthews</td>
                                            <td>07 Oct, 2021</td>
                                            <td>$400</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success">Paid</span>
                                            </td>
                                            <td><i class="material-icons md-payment font-xxl text-muted mr-5"></i> Mastercard</td>
                                            <td>
                                                <a href="#" class="btn btn-xs"> View details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck03" />
                                                    <label class="form-check-label" for="transactionCheck03"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-bold">#SK2541</a></td>
                                            <td>Jamal Burnett</td>
                                            <td>07 Oct, 2021</td>
                                            <td>$380</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-danger">Chargeback</span>
                                            </td>
                                            <td><i class="material-icons md-payment font-xxl text-muted mr-5"></i> Visa</td>
                                            <td>
                                                <a href="#" class="btn btn-xs"> View details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck04" />
                                                    <label class="form-check-label" for="transactionCheck04"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-bold">#SK2542</a></td>
                                            <td>Juan Mitchell</td>
                                            <td>06 Oct, 2021</td>
                                            <td>$384</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success">Paid</span>
                                            </td>
                                            <td><i class="material-icons md-payment font-xxl text-muted mr-5"></i> Paypal</td>
                                            <td>
                                                <a href="#" class="btn btn-xs"> View details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck05" />
                                                    <label class="form-check-label" for="transactionCheck05"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-bold">#SK2543</a></td>
                                            <td>Barry Dick</td>
                                            <td>05 Oct, 2021</td>
                                            <td>$412</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success">Paid</span>
                                            </td>
                                            <td><i class="material-icons md-payment font-xxl text-muted mr-5"></i> Mastercard</td>
                                            <td>
                                                <a href="#" class="btn btn-xs"> View details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck06" />
                                                    <label class="form-check-label" for="transactionCheck06"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-bold">#SK2544</a></td>
                                            <td>Ronald Taylor</td>
                                            <td>04 Oct, 2021</td>
                                            <td>$404</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-warning">Refund</span>
                                            </td>
                                            <td><i class="material-icons md-payment font-xxl text-muted mr-5"></i> Visa</td>
                                            <td>
                                                <a href="#" class="btn btn-xs"> View details</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="transactionCheck07" />
                                                    <label class="form-check-label" for="transactionCheck07"></label>
                                                </div>
                                            </td>
                                            <td><a href="#" class="fw-bold">#SK2545</a></td>
                                            <td>Jacob Hunter</td>
                                            <td>04 Oct, 2021</td>
                                            <td>$392</td>
                                            <td>
                                                <span class="badge badge-pill badge-soft-success">Paid</span>
                                            </td>
                                            <td><i class="material-icons md-payment font-xxl text-muted mr-5"></i> Paypal</td>
                                            <td>
                                                <a href="#" class="btn btn-xs"> View details</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> -->
                        <!-- table-responsive end// -->
                    <!-- </div>
                </div> -->
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
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/vendors/chart.js"></script>
        <!-- Main Script -->
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/main.js?v=6.0" type="text/javascript"></script>
        <script src="<?php echo base_url('ecommerce/') ?>assets/js/custom-chart.js" type="text/javascript"></script>
    </body>
</html>
