<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    

    <meta charset="utf-8" />
            <title>Metrica - Admin & Dashboard Template</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="" name="author" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />

            <!-- App favicon -->
            <link rel="shortcut icon" href="assets/images/favicon.ico">

       

     <!-- App css -->
     <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
     <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body id="body" class="auth-page" style="background-image: url('assets/images/p-1.png'); background-size: cover; background-position: center center;">
   <!-- Log In page -->
    <div class="container-md">
        <div class="row vh-100 d-flex justify-content-center">
            <div class="col-12 align-self-center">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4 mx-auto">
                            <div class="card">
                                <div class="card-body p-0 auth-header-box">
                                    <div class="text-center p-3">
                                        <a href="index.html" class="logo logo-admin">
                                            <img src="assets/images/logo-sm.png" height="50" alt="logo" class="auth-logo">
                                        </a>
                                        <h4 class="mt-3 mb-1 fw-semibold text-white font-18">Let's Get Started Metrica</h4>   
                                        <p class="text-muted  mb-0">Sign up to continue to Metrica.</p>  
                                    </div>
                                </div>
                                <div class="card-body pt-0">                                    
                                    <form id="registrationForm" class="my-4" action="registerUser" method="post">            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">                               
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="useremail">Email</label>
                                            <input type="email" class="form-control" id="useremail" name="user email" placeholder="Enter email">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-2">
                                            <label class="form-label" for="userpassword">Password</label>                                            
                                            <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password">                            
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="Confirmpassword">ConfirmPassword</label>                                            
                                            <input type="password" class="form-control" name="password" id="Confirmpassword" placeholder="Enter Confirm password">                            
                                        </div><!--end form-group--> 

                                        <div class="form-group mb-2">
                                            <label class="form-label" for="mobileNo">Mobile Number</label>
                                            <input type="text" class="form-control" id="mobileNo" name="mobile_number" placeholder="Enter Mobile Number">                               
                                        </div><!--end form-group--> 
            
                                        <div class="form-group row mt-3">
                                            <div class="col-12">
                                                <div class="form-check form-switch form-switch-success">
                                                    <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                    <label class="form-check-label" for="customSwitchSuccess">By registering you agree to the Metrica <a href="#" class="text-primary">Terms of Use</a></label>
                                                </div>
                                            </div><!--end col--> 
                                        </div><!--end form-group--> 
            
                                        <div class="form-group mb-0 row">
                                            <div class="col-12">
                                                <div class="d-grid mt-3">
                                                    <button class="btn btn-primary" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                                </div>
                                            </div><!--end col--> 
                                        </div> <!--end form-group-->                           
                                    </form><!--end form-->
                                    <div class="m-3 text-center text-muted">
                                        <p class="mb-0">Already have an account ? <a href="auth-login.html" class="text-primary ms-2">Log in</a></p>
                                    </div>
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

    <!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the default form submission

    var formData = new FormData(this);

    fetch('registerUser', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        // Check if registration was successful
        if (data.success) {
            Swal.fire({
                title: 'Success!',
                text: 'You have registered successfully.',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(() => {
                // Redirect to the home page
                window.location.href = '/';
            });
        } else {
            Swal.fire({
                title: 'Error!',
                text: 'Registration failed. Please try again.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    })
    .catch(error => {
        Swal.fire({
            title: 'Error!',
            text: 'An unexpected error occurred. Please try again.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    });
});
</script>



    
    
</body>

</html>