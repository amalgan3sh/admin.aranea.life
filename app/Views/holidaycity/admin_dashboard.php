

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
                                        <li class="breadcrumb-item"><a href="#">Aranea</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item"><a href="#">Dashboard</a>
                                        </li><!--end nav-item-->
                                        <li class="breadcrumb-item active">Analytics</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Analytics</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div>
                    <!-- end page title end breadcrumb -->
                    <!-- end page title end breadcrumb -->
                    <div class="row">
                        <div class="col-lg-9">
                            <!-- app/Views/analytics_view.php -->
                            <div class="row justify-content-center">
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-9">
                                                    <p class="text-dark mb-0 fw-semibold">Total Responses</p>
                                                    <h3 class="my-1 font-20 fw-bold"><?= $total_responses ?? 'N/A'; ?></h3>
                                                    <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i> New Responses</span></p>
                                                </div>
                                                <div class="col-3 align-self-center">
                                                    <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                                        <i class="ti ti-users font-24 align-self-center text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-9">
                                                    <p class="text-dark mb-0 fw-semibold">Avg. Age</p>
                                                    <h3 class="my-1 font-20 fw-bold"><?= number_format($avg_age, 2) ?? 'N/A'; ?></h3>
                                                    <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i> Average Age</span></p>
                                                </div>
                                                <div class="col-3 align-self-center">
                                                    <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                                        <i class="ti ti-clock font-24 align-self-center text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-9">
                                                    <p class="text-dark mb-0 fw-semibold">Interested in Additional Income</p>
                                                    <h3 class="my-1 font-20 fw-bold"><?= $interested_in_income ?? 'N/A'; ?></h3>
                                                    <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i> Total Interested</span></p>
                                                </div>
                                                <div class="col-3 align-self-center">
                                                    <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                                        <i class="ti ti-activity font-24 align-self-center text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6 col-lg-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-9">
                                                    <p class="text-dark mb-0 fw-semibold">New Responses</p>
                                                    <h3 class="my-1 font-20 fw-bold">85000</h3>
                                                    <p class="mb-0 text-truncate text-muted"><span class="text-success"><i class="mdi mdi-trending-up"></i> Completions Weekly</span></p>
                                                </div>
                                                <div class="col-3 align-self-center">
                                                    <div class="d-flex justify-content-center align-items-center thumb-md bg-light-alt rounded-circle mx-auto">
                                                        <i class="ti ti-confetti font-24 align-self-center text-muted"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Audience Overview</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   This Year<i class="las la-angle-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                    <a class="dropdown-item" href="#">Last Month</a>
                                                    <a class="dropdown-item" href="#">This Year</a>
                                                </div>
                                            </div>               
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="">
                                        <div id="ana_dash_1" class="apex-charts"></div>
                                    </div> 
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div><!--end col-->
                        <div class="col-lg-3">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Sessions Device</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   All<i class="las la-angle-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Farm House</a>
                                                    <a class="dropdown-item" href="#">Villa</a>
                                                    <a class="dropdown-item" href="#">Resort</a>
                                                    <a class="dropdown-item" href="#">Any Other</a>
                                                </div>
                                            </div>         
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="text-center">
                                        <div id="ana_device" class="apex-charts"></div>
                                        <h6 class="bg-light-alt py-3 px-2 mb-0">
                                            <i data-feather="calendar" class="align-self-center icon-xs me-1"></i>
                                            01 January 2020 to 31 December 2020
                                        </h6>
                                    </div>  
                                    <!-- ApexCharts JS -->
                                    <div class="table-responsive mt-2">
                                    <table class="table border-dashed mb-0">
                                    <thead>
                                        <tr>
                                            <th>House Type</th>
                                            <th class="text-end">Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($house_types as $index => $type): ?>
                                            <tr>
                                                <td><?= $type; ?></td>
                                                <td class="text-end"><?= $house_counts[$index]; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table><!--end /table-->
                                    </div><!--end /div-->                                 
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col--> 
                    </div><!--end row-->

                    <div class="row">
                        <div class="col-lg-4"> 
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Live Visits Our New Site</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                   Today<i class="las la-angle-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Yesterday</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                </div>
                                            </div>               
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header--> 
                                <div class="card-body">   
                                    <div id="circlechart" class="apex-charts"></div>   
                                    <div>
                                        <div class="row">
                                            <div class="col-lg">
                                                <h4 class="card-title mt-0 mb-2">Gender Distribution</h4>                                         
                                                <div class="traffic-card">                                                
                                                    <h4 class="my-2"><?php echo $total_responses; ?></h4>
                                                    <p class="mb-2 fw-semibold">Total Responses</p>
                                                </div>                                                
                                            </div><!--end col-->
                                            <div class="col-lg-auto align-self-center">   
                                                <ul class="list-unstyled url-list mb-0">
                                                    <li>
                                                        <i class="fas fa-caret-right font-16 text-primary"></i>
                                                        <span>Male</span>                                                                                                      
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-caret-right font-16 text-success"></i> 
                                                        <span>Female</span>                                              
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-caret-right font-16 text-gray"></i>
                                                        <span>Other</span>                                                 
                                                    </li>                                                
                                                </ul>
                                            </div><!--end col-->
                                        </div><!--end row-->      
                                        <div class="progress mb-1">                                                    
                                            <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary" role="progressbar" style="width: <?php echo $male_percentage; ?>%" aria-valuenow="<?php echo $male_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $male_percentage; ?>%</div>
                                            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo $female_percentage; ?>%" aria-valuenow="<?php echo $female_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $female_percentage; ?>%</div>
                                            <div class="progress-bar bg-soft-secondary" role="progressbar" style="width: <?php echo $other_percentage; ?>%" aria-valuenow="<?php echo $other_percentage; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $other_percentage; ?>%</div>
                                        </div> 
                                    </div>                                                      
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div><!--end col-->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Most Interested Districts</h4>                      
                                        </div><!--end col-->
                                        <div class="col-auto"> 
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Today<i class="las la-angle-down ms-1"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="#">Today</a>
                                                    <a class="dropdown-item" href="#">Yesterday</a>
                                                    <a class="dropdown-item" href="#">Last Week</a>
                                                </div>
                                            </div>               
                                        </div><!--end col-->
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->                                
                                <div class="card-body">
                                    <ul class="list-group custom-list-group">
                                        <?php foreach ($interested_districts as $district): ?>
                                        <li class="list-group-item align-items-center d-flex justify-content-between">
                                            <div class="media">
                                                <img src="assets/images/small/rgb.svg" height="30" class="me-3 align-self-center rounded" alt="<?php echo $district['interested_district']; ?>">
                                                <div class="media-body align-self-center"> 
                                                    <h6 class="m-0"><?php echo $district['interested_district']; ?></h6>
                                                    <p class="mb-0 text-muted"><?php echo $district['count']; ?> Enquiries</p>                                                                                           
                                                </div><!--end media body-->
                                            </div>
                                            <div class="align-self-center">
                                                <a href="" class="btn btn-sm btn-soft-primary"><?php echo $district['count']; ?> <i class="las la-external-link-alt font-15"></i></a>  
                                            </div>                                            
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>                                
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                            <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <h2 class="m-0 align-self-center"><?php echo $recent_entries_count; ?></h2>
                                    <div class="d-block ms-2 align-self-center">
                                        <span class="text-warning">Right now</span>
                                        <h5 class="my-1">Recent Survey Entries</h5>
                                        <p class="mb-0 text-muted">We have received <?php echo $recent_entries_count; ?> new entries in the last 24 hours.
                                            <a href="" class="text-primary">Read More <i class="las la-arrow-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div><!--end card-body-->
                            </div><!--end card-->
                        </div> <!--end col--> 
                                                
                        
                        <div class="col-lg-4">
                        <div class="card">   
    <div class="card-header">
        <div class="row align-items-center">
            <div class="col">                      
                <h4 class="card-title">Activity</h4>                      
            </div><!--end col-->
            <div class="col-auto"> 
                <div class="dropdown">
                    <a href="#" class="btn btn-sm btn-outline-light dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        All<i class="las la-angle-down ms-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Purchases</a>
                        <a class="dropdown-item" href="#">Emails</a>
                    </div>
                </div>          
            </div><!--end col-->
        </div>  <!--end row-->                                  
    </div><!--end card-header-->                                              
    <div class="card-body p-0"> 
        <div class="p-3" data-simplebar style="height: 400px;">
            <div class="activity">
                <?php foreach ($recent_activities as $activity): ?>
                <div class="activity-info">
                    <div class="icon-info-activity">
                        <i class="las la-user-clock bg-soft-primary"></i>
                    </div>
                    <div class="activity-info-text">
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="text-muted mb-0 font-13 w-75">
                                <span><?php echo $activity['name']; ?></span> 
                                <?php echo $activity['who_are_you']; ?> from 
                                <a href="mailto:<?php echo $activity['email']; ?>"><?php echo $activity['email']; ?></a> 
                                at <?php echo $activity['current_residential_location']; ?>
                            </p>
                            <small class="text-muted"><?php echo date('d M Y, h:i A', strtotime($activity['created_at'])); ?></small>
                        </div>    
                    </div>
                </div> 
                <?php endforeach; ?>                                                                                                                    
            </div><!--end activity-->
        </div><!--end analytics-dash-activity-->

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <?= $pager->links('default', 'bootstrap_pagination') ?>
        </nav><!--end nav-->
    </div><!--end card-body-->                                     
</div><!--end card-->
                        </div><!--end col--> 
                       
                    </div><!--end row-->
                    <div class="row">                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Browser Used & Traffic Reports</h4>                      
                                        </div><!--end col-->                                        
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Channel</th>
                                                    <th class="border-top-0">Sessions</th>
                                                    <th class="border-top-0">Prev.Period</th>
                                                    <th class="border-top-0">% Change</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Organic search</a></td>
                                                    <td>10853<small class="text-muted">(52%)</small></td>
                                                    <td>566<small class="text-muted">(92%)</small></td>
                                                    <td> 52.80% <i class="fas fa-caret-up text-success font-16"></i></td>
                                                </tr><!--end tr-->     
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Direct</a></td>
                                                    <td>2545<small class="text-muted">(47%)</small></td>
                                                    <td>498<small class="text-muted">(81%)</small></td>
                                                    <td> -17.20% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                                    
                                                </tr><!--end tr-->    
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Referal</a></td>
                                                    <td>1836<small class="text-muted">(38%)</small></td> 
                                                    <td>455<small class="text-muted">(74%)</small></td>
                                                    <td> 41.12% <i class="fas fa-caret-up text-success font-16"></i></td>
                                                    
                                                </tr><!--end tr-->    
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Email</a></td>
                                                    <td>1958<small class="text-muted">(31%)</small></td> 
                                                    <td>361<small class="text-muted">(61%)</small></td>
                                                    <td> -8.24% <i class="fas fa-caret-down text-danger font-16"></i></td>
                                                </tr><!--end tr-->    
                                                <tr>                                                        
                                                    <td><a href="" class="text-primary">Social</a></td>
                                                    <td>1566<small class="text-muted">(26%)</small></td> 
                                                    <td>299<small class="text-muted">(49%)</small></td>
                                                    <td> 29.33% <i class="fas fa-caret-up text-success"></i></td>
                                                </tr><!--end tr-->                            
                                            </tbody>
                                        </table> <!--end table-->                                               
                                    </div><!--end /div-->
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->   
                        
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row align-items-center">
                                        <div class="col">                      
                                            <h4 class="card-title">Browser Used & Traffic Reports</h4>                      
                                        </div><!--end col-->                                        
                                    </div>  <!--end row-->                                  
                                </div><!--end card-header-->
                                <div class="card-body">
                                    <div class="table-responsive browser_users">
                                        <table class="table mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">Browser</th>
                                                    <th class="border-top-0">Sessions</th>
                                                    <th class="border-top-0">Bounce Rate</th>
                                                    <th class="border-top-0">Transactions</th>
                                                </tr><!--end tr-->
                                            </thead>
                                            <tbody>
                                                <tr>                                                        
                                                    <td><img src="assets/images/logos/chrome.png" alt="" height="16" class="me-2">Chrome</td>
                                                    <td>10853<small class="text-muted">(52%)</small></td>                                   
                                                    <td> 52.80%</td>
                                                    <td>566<small class="text-muted">(92%)</small></td>
                                                </tr><!--end tr-->     
                                                <tr>                                                        
                                                    <td><img src="assets/images/logos/micro-edge.png" alt="" height="16" class="me-2">Microsoft Edge</td>
                                                    <td>2545<small class="text-muted">(47%)</small></td>                                   
                                                    <td> 47.54%</td>
                                                    <td>498<small class="text-muted">(81%)</small></td>
                                                </tr><!--end tr-->    
                                                <tr>                                                        
                                                    <td><img src="assets/images/logos/in-explorer.png" alt="" height="16" class="me-2">Internet-Explorer</td>
                                                    <td>1836<small class="text-muted">(38%)</small></td>                                   
                                                    <td> 41.12%</td>
                                                    <td>455<small class="text-muted">(74%)</small></td>
                                                </tr><!--end tr-->    
                                                <tr>                                                        
                                                    <td><img src="assets/images/logos/opera.png" alt="" height="16" class="me-2">Opera</td>
                                                    <td>1958<small class="text-muted">(31%)</small></td>                                   
                                                    <td> 36.82%</td>
                                                    <td>361<small class="text-muted">(61%)</small></td>
                                                </tr><!--end tr-->    
                                                <tr>                                                        
                                                    <td><img src="assets/images/logos/chrome.png" alt="" height="16" class="me-2">Chrome</td>
                                                    <td>10853<small class="text-muted">(52%)</small></td>                                   
                                                    <td> 52.80%</td>
                                                    <td>566<small class="text-muted">(92%)</small></td>
                                                </tr><!--end tr-->                             
                                            </tbody>
                                        </table> <!--end table-->                                               
                                    </div><!--end /div--> 
                                </div><!--end card-body--> 
                            </div><!--end card--> 
                        </div> <!--end col-->
                    </div><!--end row-->

                </div><!-- container -->

                <!--Start Rightbar-->
                <!--Start Rightbar/offcanvas-->
                <div class="offcanvas offcanvas-end" tabindex="-1" id="Appearance" aria-labelledby="AppearanceLabel">
                    <div class="offcanvas-header border-bottom">
                      <h5 class="m-0 font-14" id="AppearanceLabel">Appearance</h5>
                      <button type="button" class="btn-close text-reset p-0 m-0 align-self-center" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">  
                        <h6>Account Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch1">
                                <label class="form-check-label" for="settings-switch1">Auto updates</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch2" checked>
                                <label class="form-check-label" for="settings-switch2">Location Permission</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch3">
                                <label class="form-check-label" for="settings-switch3">Show offline Contacts</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->
                        <h6>General Settings</h6>
                        <div class="p-2 text-start mt-3">
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch4">
                                <label class="form-check-label" for="settings-switch4">Show me Online</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch mb-2">
                                <input class="form-check-input" type="checkbox" id="settings-switch5" checked>
                                <label class="form-check-label" for="settings-switch5">Status visible to all</label>
                            </div><!--end form-switch-->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="settings-switch6">
                                <label class="form-check-label" for="settings-switch6">Notifications Popup</label>
                            </div><!--end form-switch-->
                        </div><!--end /div-->               
                    </div><!--end offcanvas-body-->
                </div>
                <!--end Rightbar/offcanvas-->
                 <!--end Rightbar-->
                 
                <!--Start Footer-->
                <!-- Footer Start -->
                <footer class="footer text-center text-sm-start">
                    &copy; <script>
                        document.write(new Date().getFullYear())
                    </script> Metrica <span class="text-muted d-none d-sm-inline-block float-end">Crafted with <i
                            class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer>
                <!-- end Footer -->                
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->



        <!-- Javascript  -->  
        <!-- vendor js -->
        
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>

        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>
        <!-- <script src="assets/js/pages/analytics-index.init.js"></script> -->

        <script>
                    var options = {
        series: [{
            name: "House Type Count",
            data: <?php echo json_encode($house_counts); ?>
        }, {
            name: "Income Interest Count",
            data: <?php echo json_encode($income_interest_counts); ?>
        }],
        chart: {
            height: 330,
            type: "bar",
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: "20%",
                endingShape: "rounded",
                barCap: "round"
            }
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ["transparent"]
        },
        colors: ["#1ccab8", "#2a76f4"],
        xaxis: {
            categories: <?php echo json_encode($house_types); ?>,
            axisBorder: {
                show: true,
                color: "#bec7e0"
            },
            axisTicks: {
                show: true,
                color: "#bec7e0"
            }
        },
        yaxis: {
            title: {
                text: "Count"
            }
        },
        fill: {
            opacity: 1
        },
        grid: {
            row: {
                colors: ["transparent", "transparent"],
                opacity: 0.2
            },
            strokeDashArray: 2.5
        },
        tooltip: {
            y: {
                formatter: function(t) {
                    return t
                }
            }
        }
    },

	chartMain = new ApexCharts(document.querySelector("#ana_dash_1"), options),
	options = {
		chart: {
			height: 255,
			type: "donut"
		},
		plotOptions: {
			pie: {
				donut: {
					size: "85%"
				}
			}
		},
		dataLabels: {
			enabled: !1
		},
		stroke: {
			show: !0,
			width: 2,
			colors: ["transparent"]
		},
		series: <?php echo json_encode($house_percentages); ?>,
		legend: {
			show: !0,
			position: "bottom",
			horizontalAlign: "center",
			verticalAlign: "middle",
			floating: !1,
			fontSize: "13px",
			offsetX: 0,
			offsetY: 0
		},
		labels: <?php echo json_encode($house_types); ?>,
		colors: ["#2a76f4", "rgba(42, 118, 244, .5)", "rgba(42, 118, 244, .18)"],
		responsive: [{
			breakpoint: 600,
			options: {
				plotOptions: {
					donut: {
						customScale: .2
					}
				},
				chart: {
					height: 240
				},
				legend: {
					show: !1
				}
			}
		}],
		tooltip: {
			y: {
				formatter: function(t) {
					return t + " %"
				}
			}
		}
	},
	chart = new ApexCharts(document.querySelector("#ana_device"), options),
	optionsCircle = {
		chart: {
            type: "radialBar",
            height: 295,
            offsetY: -30,
            offsetX: 20
        },
		plotOptions: {
            radialBar: {
                inverseOrder: false,
                hollow: {
                    margin: 5,
                    size: "55%",
                    background: "transparent"
                },
                track: {
                    show: true,
                    background: "#ddd",
                    strokeWidth: "10%",
                    opacity: 1,
                    margin: 5
                },
                dataLabels: {
                    name: {
                        fontSize: "18px"
                    },
                    value: {
                        fontSize: "16px",
                        color: "#50649c"
                    }
                }
            }
        },
		series: [<?php echo $male_percentage; ?>, <?php echo $female_percentage; ?>, <?php echo $other_percentage; ?>],
		labels: ["Male", "Female", "Other"],
		legend: {
            show: true,
            position: "bottom",
            offsetX: -40,
            offsetY: -5,
            formatter: function(t, e) {
                return t + " - " + e.w.globals.series[e.seriesIndex] + "%"
            }
        },
		stroke: {
            lineCap: "round"
        },
        colors: ["#2a76f4", "#38c4fa", "#f4a261"]
	},
	chartCircle = new ApexCharts(document.querySelector("#circlechart"), optionsCircle),
	iteration = 11;

function getRandom() {
	var t = iteration;
	return (Math.sin(t / trigoStrength) * (t / trigoStrength) + t / trigoStrength + 1) * (2 * trigoStrength)
}


window.setInterval(function() {
	iteration++, chartCircle.updateSeries([getRangeRandom({
		min: 10,
		max: 100
	}), getRangeRandom({
		min: 10,
		max: 100
	})])
}, 3e3), window.addEventListener("DOMContentLoaded", t => {
	chartMain.render(), chart.render(), chartCircle.render()
});
        </script>
        <!-- App js -->
        <script src="assets/js/app.js"></script>


    </body>
    <!--end body-->
</html>