<!-- File: app/Views/healthcare/layouts/sidebar.php -->

<div class="leftbar-tab-menu">
    <div class="main-icon-menu">
        <a href="/healthcare_dashboard" class="logo logo-metrica d-block text-center">
            <span>
                <img src="assets/images/aranea_sm.png" alt="logo-small" class="logo-sm">
            </span>
        </a>
        <div class="main-icon-menu-body">
            <div class="position-reletive h-100" data-simplebar style="overflow-x: hidden;">
                <ul class="nav nav-tabs" role="tablist" id="tab-menu">
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Dashboard" data-bs-trigger="hover">
                        <a href="#MetricaDashboard" id="dashboard-tab" class="nav-link">
                            <i class="ti ti-smart-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Apps" data-bs-trigger="hover">
                        <a href="#MetricaApps" id="apps-tab" class="nav-link">
                            <i class="ti ti-apps menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Uikit" data-bs-trigger="hover">
                        <a href="#MetricaUikit" id="uikit-tab" class="nav-link">
                            <i class="ti ti-planet menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Pages" data-bs-trigger="hover">
                        <a href="#MetricaPages" id="pages-tab" class="nav-link">
                            <i class="ti ti-files menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Authentication" data-bs-trigger="hover">
                        <a href="#MetricaAuthentication" id="authentication-tab" class="nav-link">
                            <i class="ti ti-shield-lock menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pro-metrica-end">
            <a href="" class="profile">
                <img src="<?= base_url('assets/images/users/user-4.jpg') ?>" alt="profile-user" class="rounded-circle thumb-sm">
            </a>
        </div>
    </div>
    <div class="main-menu-inner">
            <div class="topbar-left">
                <a href="/healthcare_dashboard" class="logo">
                    <span>
                        <img src="assets/images/aranea_text.png" alt="logo-large" class="logo-lg logo-dark">
                        <img src="assets/images/logo.png" alt="logo-large" class="logo-lg logo-light">
                    </span>
                </a><!--end logo-->
            </div><!--end topbar-left-->
        <div class="menu-body navbar-vertical tab-content" data-simplebar>
            <div id="MetricaDashboard" class="main-icon-menu-pane tab-pane" role="tabpanel" aria-labelledby="dasboard-tab">
                <div class="title-box">
                    <h6 class="menu-title">Dashboard</h6>
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="/healthcare_dashboard">Analytics</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="/investment_request">Investment Request</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="/approve_kyc">KYC Approval</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="/product_listing">Products</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="">Project</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="">Ecommerce</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="">Helpdesk</a>
                    </li><!--end nav-item-->
                    <li class="nav-item">
                        <a class="nav-link" href="">Hospital</a>
                    </li><!--end nav-item-->
                </ul><!--end nav-->
            </div>
        </div>
    </div>
</div>