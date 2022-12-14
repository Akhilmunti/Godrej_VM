<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="<?php echo base_url('assets/'); ?>images/godrej-logo.png">

        <title>Godrej Marketplace</title>

        <!-- Bootstrap 4.0-->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap/dist/css/bootstrap.css">

        <!-- theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">

        <!-- DashboardX Admin skins -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/skin_color.css">

        <!-- weather weather -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/weather-icons/weather-icons.css">  
        <!-- daterange picker -->   
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-daterangepicker/daterangepicker.css">

        <!-- bootstrap datepicker -->   
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_plugins/iCheck/all.css">

        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">

        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_plugins/timepicker/bootstrap-timepicker.min.css">

        <!-- Bootstrap select -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-select/dist/css/bootstrap-select.css">

        <!-- Bootstrap tagsinput -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">

        <!-- Bootstrap touchspin -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css">

        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/select2/dist/css/select2.min.css">

        <!-- Data Table-->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/'); ?>vendor_components/datatable/datatables.min.css"/>
    </head>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                    <!-- mini logo -->
                    <div class="logo-mini">
                        <span class="light-logo"><img src="<?php echo base_url('assets/'); ?>images/godrej-logo-white.png" alt="logo"></span>
                        <span class="dark-logo"><img src="<?php echo base_url('assets/'); ?>images/godrej-logo-white.png" alt="logo"></span>
                    </div>
                    <!-- logo-->
                    <div class="logo-lg">
                        <span class="light-logo"><img src="<?php echo base_url('assets/'); ?>images/godrej-logo-white.png" alt="logo"></span>
                        <span class="dark-logo"><img src="<?php echo base_url('assets/'); ?>images/godrej-logo-white.png" alt="logo"></span>
                    </div>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top">      
                    <div class="app-menu">
                        <ul class="header-megamenu nav">
                            <li class="btn-group nav-item">
                                <a href="#" class="waves-effect waves-light nav-link rounded" data-toggle="push-menu" role="button">
                                    <i class="nav-link-icon ti-align-left text-white"></i>
                                </a>
                            </li>
                            <li class="btn-group nav-item">
                                <a href="#" data-provide="fullscreen" class="waves-effect waves-light nav-link rounded" title="Full Screen">
                                    <i class="nav-link-icon mdi mdi-crop-free text-white"></i>
                                </a>
                            </li>       
                            <li class="dropdown nav-item d-xl-inline-flex d-none">
                                <a href="#" aria-haspopup="true"  data-toggle="dropdown" class="waves-effect waves-light nav-link rounded" aria-expanded="false">
                                    <i class="nav-link-icon ti-layout-tab text-white mx-5 mx-lg-0"></i>
                                </a>
                                <div class="dropdown-menu overflow-hidden">
                                    <div class="dropdown-menu-header-inner bg-img" style="background-image: url('<?php echo base_url('assets/'); ?>images/gallery/landscape1.jpg');" data-overlay="5">
                                        <div class="p-30 text-left w-250">
                                            <h5 class="text-white">Overview</h5>
                                            <h6 class="text-white">Unlimited options</h6>
                                            <div class="menu-header-btn-pane">
                                                <button class="mr-2 btn btn-success btn-sm">Settings</button>
                                                <button class="btn-icon btn-icon-only btn btn-info btn-sm">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-10">
                                        <button type="button" class="btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Graphic Design</button>
                                        <button type="button" class="btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>App Development</button>
                                        <button type="button" class="btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Icon Design</button>
                                        <div tabindex="-1" class="dropdown-divider"></div>
                                        <button type="button" class="btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Miscellaneous</button>
                                        <button type="button" class="btn btn-flat btn-light no-shadow w-p100 text-left"><i class="mdi mdi-file-multiple mr-10"> </i>Frontend Dev</button>
                                    </div>
                                </div>
                            </li>   
                        </ul> 
                    </div>

                    <div class="navbar-custom-menu r-side">
                        <ul class="nav navbar-nav">
                            <!-- full Screen -->
                            <li class="search-bar d-sm-inline-flex d-none">       
                                <div class="lookup lookup-circle lookup-right">
                                    <input type="text" name="s">
                                </div>
                            </li>           
                            <!-- Messages -->
                            <li class="dropdown messages-menu">
                                <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Messages">
                                    <i class="ti-email"></i>
                                </a>
                                <ul class="dropdown-menu animated bounceIn">

                                    <li class="header">
                                        <div class="p-20">
                                            <div class="flexbox">
                                                <div>
                                                    <h4 class="mb-0 mt-0">Messages</h4>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-danger">Clear All</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu sm-scrol">
                                            <li><!-- start message -->
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo base_url('assets/'); ?>images/user2-160x160.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Lorem Ipsum
                                                            <small><i class="fa fa-clock-o"></i> 15 mins</small>
                                                        </h4>
                                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <!-- end message -->
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo base_url('assets/'); ?>images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Nullam tempor
                                                            <small><i class="fa fa-clock-o"></i> 4 hours</small>
                                                        </h4>
                                                        <span>Curabitur facilisis erat quis metus congue viverra.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo base_url('assets/'); ?>images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Proin venenatis
                                                            <small><i class="fa fa-clock-o"></i> Today</small>
                                                        </h4>
                                                        <span>Vestibulum nec ligula nec quam sodales rutrum sed luctus.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo base_url('assets/'); ?>images/user3-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Praesent suscipit
                                                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                        </h4>
                                                        <span>Curabitur quis risus aliquet, luctus arcu nec, venenatis neque.</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <div class="pull-left">
                                                        <img src="<?php echo base_url('assets/'); ?>images/user4-128x128.jpg" class="rounded-circle" alt="User Image">
                                                    </div>
                                                    <div class="mail-contnet">
                                                        <h4>
                                                            Donec tempor
                                                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                        </h4>
                                                        <span>Praesent vitae tellus eget nibh lacinia pretium.</span>
                                                    </div>

                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">               
                                        <a href="#">See all e-Mails</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Notifications -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="Notifications">
                                    <i class="ti-comment-alt"></i>
                                </a>
                                <ul class="dropdown-menu animated bounceIn">

                                    <li class="header">
                                        <div class="p-20">
                                            <div class="flexbox">
                                                <div>
                                                    <h4 class="mb-0 mt-0">Notifications</h4>
                                                </div>
                                                <div>
                                                    <a href="#" class="text-danger">Clear All</a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <!-- inner menu: contains the actual data -->
                                        <ul class="menu sm-scrol">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc suscipit blandit.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu sapien elementum, in semper diam posuere.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor commodo porttitor pretium a erat.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et nisi
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero dictum fermentum.
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-primary"></i> Nunc fringilla lorem 
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam interdum, at scelerisque ipsum imperdiet.
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="footer">
                                        <a href="#">View all</a>
                                    </li>
                                </ul>
                            </li>   

                            <!-- User Account-->
                            <li class="dropdown user user-menu">
                                <a href="#" class="waves-effect waves-light dropdown-toggle" data-toggle="dropdown" title="User">
                                    <i class="ti-user"></i>
                                </a>
                                <ul class="dropdown-menu animated flipInX">
                                    <!-- User image -->
                                    <li class="user-header bg-img" style="background-image: url(<?php echo base_url('assets/'); ?>images/user-info.jpg)" data-overlay="3">
                                        <div class="flexbox align-self-center">                   
                                            <img src="<?php echo base_url('assets/'); ?>images/avatar/7.jpg" class="float-left rounded-circle" alt="User Image">                      
                                            <h4 class="user-name align-self-center">
                                                <span>Samuel Brus</span>
                                                <small>samuel@gmail.com</small>
                                            </h4>
                                        </div>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-person"></i> My Profile</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-bag"></i> My Balance</a>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-email-unread"></i> Inbox</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ion ion-settings"></i> Account Setting</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="javascript:void(0)"><i class="ion-log-out"></i> Logout</a>
                                        <div class="dropdown-divider"></div>
                                        <div class="p-10"><a href="javascript:void(0)" class="btn btn-sm btn-rounded btn-success">View Profile</a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative"> 

                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="main-sidebar">
                        <!-- sidebar-->
                        <section class="sidebar">
                            <ul class="sidebar-menu" data-widget="tree">
 
                                 
                                <li>
                                    <a href="<?php echo base_url('dashboard'); ?>">
                                        <i class="mdi mdi-minus-network"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>  

                                

                                <li class="treeview">
                                    <a href="#">
                                        <i class="mdi mdi-access-point"></i>
                                        <span>Management</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class="active"><a href="<?php echo base_url('home/userManagement'); ?>">Users</a></li>
                                        <li><a href="<?php echo base_url('home/privilegeManagement'); ?>">Privilege</a></li>
                                        <li><a href="<?php echo base_url('home/pqManagement'); ?>">PQ</a></li>
                                        <li><a href="<?php echo base_url('home/siteReport'); ?>">Assessment Report</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="<?php echo base_url(); ?>">
                                        <i class="ti-power-off"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li> 

                            </ul>
                        </section>
                    </aside>