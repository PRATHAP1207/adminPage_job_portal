


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Agroxa - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="<?=site_url()?>public/assets/images/favicon.ico">

        <link href="<?=site_url()?>public/newAdminAssets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=site_url()?>public/newAdminAssets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?=site_url()?>public/newAdminAssets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?=site_url()?>public/newAdminAssets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="<?=site_url()?>public/assets/images/logo.svg" height="30" alt="logo"></a>
                    </h3>
                    <?php 
                    
                    if(isset($userStatus) && $userStatus==2){
                        ?>
                    <div class="card" style="background-color:#F75D76;">
                <div class="card-body">
                    <?php 
                    
										echo "<span style='color:black;'>Invalid Username and Password</span>";
								?>
                            </div>
                    </div>
                    <?php
                }
                ?>
                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to Syneins.</p>
                        <form class="form-horizontal m-t-30"  action="<?=site_url();?>Login/loginPage" method="post">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-6">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customControlInline">
                                        <label class="custom-control-label" for="customControlInline">Remember me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <!-- <p class="text-white-50">Don't have an account ? <a href="pages-register.html" class="text-white"> Signup Now </a> </p> -->
                <p class="text-muted">© 2022 Syneins. Crafted with <i class="mdi mdi-heart text-danger"></i> by Syneins</p>
            </div>

        </div>

        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="<?=site_url()?>assets/js/jquery.min.js"></script>
        <script src="<?=site_url()?>assets/js/bootstrap.bundle.min.js"></script>
        <script src="<?=site_url()?>assets/js/metisMenu.min.js"></script>
        <script src="<?=site_url()?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?=site_url()?>assets/js/waves.min.js"></script>

        <script src="<?=site_url()?>public/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
        <!-- App js -->
        <script src="<?=site_url()?>public/assets/js/app.js"></script>

    </body>

</html>