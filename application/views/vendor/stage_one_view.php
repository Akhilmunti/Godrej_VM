<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('vendor/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('vendor/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Stage One</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <?php if ($stageOne['active'] == 7) { ?>
                                    <div class="alert alert-danger fade show" role="alert">
                                        <strong>
                                            Stage One Returned : 
                                        </strong>
                                        <?php echo $stageOne['stage_one_return_remarks']; ?>
                                    </div>
                                <?php } ?>

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('vendor/home/saveStageOneData'); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                        <div class="box-body pb-0">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Type of agency: <span class="danger">*</span> </label>
                                                        <input type="text" class="form-control required" id="website" name="website" value="<?php
                                                        if (!empty($stageOne)) {
                                                            print_r($stageOne['natureName']);
                                                        } else if (!empty('$stageOneconsultant')) {
                                                            echo $stageOneconsultant['website'];
                                                        }
                                                        ?>" disabled> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Package name : <span class="danger">*</span> </label>
                                                        <select disabled required="" class="form-control" name="typeOfWork">
                                                            <option disabled="" selected="" value="">Select</option>
                                                            <?php foreach ($getTows as $getTow) { ?>
                                                                <option <?php
                                                                if ($stageOne['typeOfWork'] == $getTow['name']) {
                                                                    echo "selected";
                                                                }
                                                                ?> value="<?php echo $getTow['id']; ?>"><?php echo $getTow['name']; ?></option>
                                                                <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wfirstName2"> Company Name : <span class="danger">*</span> </label>
                                                        <input disabled required="" type="text" class="form-control required" id="wfirstName2" name="company_name" value="<?php echo $stageOne['company_name']; ?>"> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> User Name : <span class="danger">*</span> </label>
                                                        <input disabled required="" type="text" class="form-control required" id="wlastName2" name="user_name" value="<?php echo $stageOne['user_name']; ?>"> </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wemailAddress2"> Email Address : <span class="danger">*</span> </label>
                                                        <input disabled required="" type="email" class="form-control required" id="wemailAddress2" name="email" value="<?php echo $stageOne['email']; ?>"> </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2">Phone Number : <span class="danger">*</span></label>
                                                        <input disabled required="" type="tel" class="form-control required" id="phno" name="contact_number" value="<?php echo $stageOne['contact_number']; ?>"> </div>
                                                </div>
                                            </div>
                                            <div class="row"> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wdate2">Average Turn Over for Last 3 yrs (In Crores) :
                                                            <span class="danger">*</span></label>
                                                        <input disabled required="" type="number" class="form-control required" id="turnovlast3y" name="turn_over_of_last_3years" value="<?php echo $stageOne['turn_over_of_last_3years']; ?>" placeholder="Average Turn Over for Last 3 yrs (In Crores)"> </div>
                                                </div> 
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wfirstName2"> Primary Location : <span class="danger">*</span> </label>
                                                        <select disabled required="" class="form-control" id="location" name="location">
                                                            <option value="">Select Location</option>
                                                            <?php
                                                            foreach ($getlocation as $location) {
                                                                ?>
                                                                <option <?php
                                                                if ($stageOne['location'] == $location->name) {
                                                                    echo "selected";
                                                                }
                                                                ?> value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                                                                    <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>    
                                                </div>  
                                                <div class="col-md-6" >
                                                    <label for="typeOfWork"><b>Interested Zones (Other than Primary location) :</b></label> 
                                                    <div id="interested_zones">
                                                        <?php $mInterested = json_decode($stageOne['interested_zones']); ?>
                                                        <div class="form-check form-check-inline" id="ncrBlock">
                                                            <input <?php
                                                            if (in_array("NCR", $mInterested)) {
                                                                echo "checked";
                                                            }
                                                            ?> class="form-check-input" type="checkbox" id="checkbox_1" name="interested_zones[]" value="NCR" disabled>
                                                            <label class="form-check-label" for="checkbox_1">NCR</label>
                                                        </div>
                                                        <div class="form-check form-check-inline" id="mumbaiBlock">
                                                            <input <?php
                                                            if (in_array("Mumbai", $mInterested)) {
                                                                echo "checked";
                                                            }
                                                            ?> class="form-check-input" type="checkbox" id="checkbox_2" value="Mumbai" name="interested_zones[]" disabled>
                                                            <label class="form-check-label" for="checkbox_2">Mumbai</label>
                                                        </div>    
                                                        <div class="form-check form-check-inline" id="puneBlock">
                                                            <input <?php
                                                            if (in_array("Pune", $mInterested)) {
                                                                echo "checked";
                                                            }
                                                            ?> class="form-check-input" type="checkbox" id="checkbox_3" value="Pune" name="interested_zones[]" disabled>
                                                            <label class="form-check-label" for="checkbox_3">Pune</label>
                                                        </div> 
                                                        <div class="form-check form-check-inline" id="southBlock">
                                                            <input <?php
                                                            if (in_array("South", $mInterested)) {
                                                                echo "checked";
                                                            }
                                                            ?> class="form-check-input" type="checkbox" id="checkbox_4" value="South" name="interested_zones[]" disabled>
                                                            <label class="form-check-label" for="checkbox_4">South</label>
                                                        </div> 
                                                        <div class="form-check form-check-inline" id="eastBlock">
                                                            <input <?php
                                                            if (in_array("Kolkata", $mInterested)) {
                                                                echo "checked";
                                                            }
                                                            ?> class="form-check-input" type="checkbox" id="checkbox_5" value="East" name="interested_zones[]" disabled>
                                                            <label class="form-check-label" for="checkbox_5">Kolkata</label>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Clientele : <span class="danger">*</span> </label>
                                                        <textarea disabled required="" class="form-control required" id="address" name="clientele" value=""><?php echo $stageOne['clientele']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wfirstName2"> Registered Address (Agency) : <span class="danger">*</span> </label>
                                                        <textarea disabled required="" class="form-control required" id="address" name="address" value=""><?php echo $stageOne['address']; ?></textarea>
                                                        <!-- <input type="text" class="form-control required" id="address" name="address">  -->
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wfirstName2"> City Name : <span class="danger">*</span> </label>
                                                        <input disabled value="<?php echo $stageOne['city_name']; ?>" required="" type="text" class="form-control required" id="wLocation2" name="city_name">
                                                    </div>    
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Website :</label>
                                                        <input disabled type="text" class="form-control" id="website" name="website" value="<?php echo $stageOne['website']; ?>"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wfirstName2"> Profile :  </label>
                                                        <br>
                                                        <?php if ($stageOne['profile']) { ?>
                                                            <a href="<?php echo base_url('assets/' . $stageOne['profile']); ?>" download="" class="btn btn-sm btn-primary">Download</a>
                                                        <?php } ?>
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- /.box -->
                        </div>		
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('vendor/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('vendor/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('vendor/partials/scripts'); ?>

        <script type="text/javascript">

            var selectedLocationEdit = "<?php echo $stageOne['location']; ?>";

            if (selectedLocationEdit == "NCR") {
                //$("#checkbox_1").prop("checked", true);
                $('#ncrBlock').hide();
            } else {
                $('#ncrBlock').show();
            }
            if (selectedLocationEdit == "Mumbai") {
                $('#mumbaiBlock').hide();
            } else {
                $('#mumbaiBlock').show();
            }
            if (selectedLocationEdit == "Pune") {
                $('#puneBlock').hide();
            } else {
                $('#puneBlock').show();
            }
            if (selectedLocationEdit == "South") {
                $('#southBlock').hide();
            } else {
                $('#southBlock').show();
            }
            if (selectedLocationEdit == "Kolkata") {
                $('#eastBlock').hide();
            } else {
                $('#eastBlock').show();
            }

            $('#location').change(function () {
                var selectedLocation = this.value;
                if (selectedLocation == "NCR") {
                    //$("#checkbox_1").prop("checked", true);
                    $('#ncrBlock').hide();
                } else {
                    $('#ncrBlock').show();
                }
                if (selectedLocation == "Mumbai") {
                    $('#mumbaiBlock').hide();
                } else {
                    $('#mumbaiBlock').show();
                }
                if (selectedLocation == "Pune") {
                    $('#puneBlock').hide();
                } else {
                    $('#puneBlock').show();
                }
                if (selectedLocation == "South") {
                    $('#southBlock').hide();
                } else {
                    $('#southBlock').show();
                }
                if (selectedLocation == "Kolkata") {
                    $('#eastBlock').hide();
                } else {
                    $('#eastBlock').show();
                }
                $('#interested_zones').show();
            });
        </script>

    </body>
</html>