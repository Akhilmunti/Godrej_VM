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
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>vendor_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/style.css">

        <!-- Admin skins -->
        <link rel="stylesheet" href="<?php echo base_url('assets/'); ?>css/skin_color.css"> 

    </head>
    <body class="hold-transition theme-blueindigo bg-img" style="background-image: url(https://managequote.in/V1/assets/images/godrej-back.jpeg);">

        <div class="h-p100">
            <div class="row align-items-center justify-content-md-center h-p100">
                <div class="col-lg-5 col-12 h-lg-p100 h-auto bg-dark-opacity-80 depth-4">
                    <div class="row l-block p-xl-100 p-lg-50 p-30 h-lg-p100 h-auto">
                        <div class="col-12 logo align-self-start">
                            <a href="#" class="aut-logo">
                                <img src="<?php echo base_url('assets/'); ?>images/logo-properties-white.png" alt="">
                            </a>
                        </div>
                        <div class="col-12 align-self-start">
                            <h1 class="title text-white">Contracts & Procurement | Digital Platform</h1>
                        </div>
                        <div class="col-12 align-self-end">
                            <h6 class="text-white-50">
                                © 2022 Godrej Marketplace
                            </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-12">
                    <div class="row justify-content-center no-gutters">
                        <div class="col-xl-6 col-lg-7 col-md-6 col-12">
                            <div class="bg-opacity-90 depth-4 rounded">
                                <div class="content-top-agile p-30 pb-0">
                                    <h2 class="text-primary text-left">Sign In</h2>  
                                    <!--<div class="row">-->
                                    <!--    <div class="col-md-12">-->
                                    <!--        <ul class="nav nav-pills nav-fill">-->
                                    <!--            <li class="nav-item">-->
                                    <!--                <a class="nav-link active" href="#">Vendor</a>-->
                                    <!--            </li>-->
                                    <!--            <li class="nav-item">-->
                                    <!--                <a class="nav-link" href="<?php echo SSO_LOGIN_URL; ?>">Buyer</a>-->
                                    <!--            </li>-->
                                    <!--        </ul>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                <div class="p-30">
                                    <?php $this->load->view('buyer/partials/alerts'); ?>
                                    <form action="<?php echo base_url('home/loginBackup'); ?>" method="post">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text "><i class="ti-user"></i></span>
                                                </div>
                                                <input required type="email" class="form-control pl-15  plc-black" name="userName" value="" placeholder="Email">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text  "><i class="ti-lock"></i></span>
                                                </div>
                                                <input required type="password" name="password" value="" class="form-control pl-15  plc-black" placeholder="Password">
                                            </div>
                                            <?php if (isset($error)) { ?>
                                                <div class="" style="background:#ececec;color:red;">
                                                    <?php echo $error; ?>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check form-check-inline">
                                                <input checked="" class="form-check-input" type="radio" name="user_type"  id="inlineRadio1" value="1">
                                                <label class="form-check-label" for="inlineRadio1">Buyer</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="user_type" id="inlineRadio2" value="2">
                                                <label class="form-check-label" for="inlineRadio2">Vendor</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="sign"  class="btn btn-info btn-block">Sign In</button>
                                        </div>

                                        <div class="row align-items-center my-30">
                                            <div class="col">
                                                <p class="text-left mb-0"><a href="<?php echo base_url('home/register'); ?>">Register Now!</a></p>
                                            </div>
                                            <div class="col">
                                                <p class="text-right mb-0"><a href="<?php echo base_url('home/forgotPassword'); ?>">Forgot Password ?</a></p>
                                            </div>
                                        </div>
                                    </form>                                                     

                                    <!--                                    <div class="text-center">
                                                                            <p>- Sign With -</p>
                                                                            <p class="gap-items-2 mb-0">
                                                                                <a class="btn btn-social-icon btn-facebook" href="#">Facebook</a>
                                                                                <a class="btn btn-social-icon btn-twitter" href="#">Twitter</a>
                                                                                <a class="btn btn-social-icon btn-instagram" href="#">Instagram</a>
                                                                            </p>    
                                                                        </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- jQuery 3 -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

        <!-- fullscreen -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/screenfull/screenfull.js"></script>

        <!-- popper -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/popper/dist/popper.min.js"></script>

        <!-- Bootstrap 4.0-->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

    </body>
</html>
<script type="text/javascript">




</script>
