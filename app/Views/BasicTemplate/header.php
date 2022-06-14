<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Admin Dashboard</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="<?= site_url(); ?>public/assets/images/favicon.ico">

        <script src="<?=site_url()?>public/plugins/morris/morris.css"></script>

        <link href="<?=site_url()?>public/newAdminAssets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?=site_url()?>public/newAdminAssets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="<?=site_url()?>public/newAdminAssets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?=site_url()?>public/newAdminAssets/css/style.css" rel="stylesheet" type="text/css">

        <link href="<?=site_url()?>public/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=site_url()?>public/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?=site_url()?>public/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
      
    </head>

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left topbar-left-dark" style="background-color:black">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="<?= site_url(); ?>public/assets/images/logo.svg" alt="" height="50">
                        </span>
                        <i>
                            <img src="<?= site_url(); ?>public/assets/images/favicon.ico" alt="" height="30">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="dropdown notification-list d-none d-sm-block">
                            <!-- <form role="search" class="app-search">
                                <div class="form-group mb-0"> 
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form>  -->
                        </li>

                       
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="<?=site_url()?>public/newAdminAssets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <!-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span class="badge badge-success float-right">11</span><i class="mdi mdi-settings m-r-5"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i> Lock screen</a>
                                    <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item text-danger" href="<?=site_url();?>login/logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>                                                                    
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>                        
                        <li class="d-none d-sm-block">
                            <div class="dropdown pt-3 d-inline-block">
                                <!-- <a class="btn btn-header waves-effect waves-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Create New
                                </a>
                                
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div> -->
                            </div>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->