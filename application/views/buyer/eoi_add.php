<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <style>
        table tr input[type='number']{
            width: 150px;
        }

        table tr input[type='text']{
            width: 150px;
        }

        table tr input[type='file']{
            width: 200px;
        }
    </style>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('buyer/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('buyer/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">Expression Of Interest</h3>
                                </div>

                                <div class="col-md-6 text-right">
                                    <span class="mr-3"><?php echo $project['project_name']; ?> / Contracts / <?php echo $tow['name']; ?></span>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('buyer/vendor/actionSaveEoi/' . $project['project_id'] . "/" . $zone . "/" . $type . "/" . $for . "/" . $tow['id']); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="wlastName2"> Budget (Basic value of Work in crores) : <span class="danger">*</span> </label>
                                                            <input max="999999" name="eoi_budget" required="" type="number" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="wlastName2"> Scope of Work : <span class="danger">*</span> </label>
                                                            <input name="eoi_scope" required="" type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="wlastName2"> Estimated Start Date: <span class="danger">*</span> </label>
                                                        <input name="eoi_start_date" required="" type="date" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="wlastName2"> Completion Schedule <b>(Number of Months)</b>: <span class="danger">*</span> </label>
                                                        <input name="eoi_schedule" required="" type="number" class="form-control"/>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <table id="example" class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Select
                                                                    </th>
                                                                    <th>
                                                                        Vendor
                                                                    </th>
                                                                    <th>
                                                                        Zone
                                                                    </th>
                                                                    <th>
                                                                        Financial Categorization
                                                                    </th>
                                                                    <th>
                                                                        PQ Score
                                                                    </th>
                                                                    <th>
                                                                        FB Score
                                                                    </th>
                                                                    <th>
                                                                        Latest PQ/FB Date
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <?php if (!empty($mRecords)) { ?>

                                                                    <?php
                                                                    $mCount = 0;
                                                                    $mDanger = "";
                                                                    foreach ($mRecords as $key => $mRecord) {
                                                                        $mCount++;
                                                                        ?>

                                                                        <tr class="<?php
                                                                        if (($mRecord['vendor_pq_score'] != "-" && $mRecord['vendor_pq_score'] < 50) || ($mRecord['vendor_feedback_score'] != "-" && $mRecord['vendor_feedback_score'] < 60)) {
                                                                            echo "bg-danger";
                                                                        }
                                                                        ?>">
                                                                            <td>
                                                                                <input <?php
                                                                                if (($mRecord['vendor_pq_score'] != "-" && $mRecord['vendor_pq_score'] < 50) || ($mRecord['vendor_feedback_score'] != "-" && $mRecord['vendor_feedback_score'] < 60)) {
                                                                                    echo "disabled";
                                                                                }
                                                                                ?> value="<?php echo $mRecord['vendor_id']; ?>" class="form-check-input" type="checkbox" id="checkbox_<?php echo $mRecord['vendor_id'] ?>" name="eoi_vendors_selected[]"> 
                                                                                <label class="form-check-label" for="checkbox_<?php echo $mRecord['vendor_id'] ?>"></label>
                                                                            </td>
                                                                            <td>
                                                                                <span class="btn btn-xs btn-primary">
                                                                                    <?php echo $mRecord['vendor_company_name']; ?>
                                                                                </span>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $mRecord['vendor_zone']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $mRecord['vendor_turn_over']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $mRecord['vendor_pq_score']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php echo $mRecord['vendor_feedback_score']; ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php
                                                                                if ($mRecord['vendor_pq_score'] != "-") {
                                                                                    echo $mRecord['vendor_pq_score_date'];
                                                                                } else {
                                                                                    echo $mRecord['vendor_feedback_score_date'];
                                                                                }
                                                                                ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php if (($mRecord['vendor_pq_score'] != "-" && $mRecord['vendor_pq_score'] < 50) || ($mRecord['vendor_feedback_score'] != "-" && $mRecord['vendor_feedback_score'] < 60)) { ?>
                                                                                    <button type="button" id="override-<?php echo $mRecord['vendor_id']; ?>" class="btn btn-sm btn-primary">Override</button>
                                                                                <?php } ?>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>

                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Project Configuration: <span class="danger">*</span> </label>
                                                                    <input name="eoi_configuration" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Total BUA - In million square foot: <span class="danger">*</span> </label>
                                                                    <input max="999999" name="eoi_total_bua" value="" required="" type="number" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Type of Contract: <span class="danger">*</span> </label>
                                                                    <input name="eoi_toc" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Basic Rate Items: <span class="danger">*</span> </label>
                                                                    <select multiple="" name="eoi_bri[]" required="" class="form-control">
                                                                        <?php if (!empty($bris)) { ?>
                                                                            <?php foreach ($bris as $key => $bri) { ?>
                                                                                <option value="<?php echo $bri['bi_name']; ?>"><?php echo $bri['bi_name']; ?></option>
                                                                            <?php } ?>                                                                            
                                                                        <?php } ?>
                                                                        <option value="No Applicable">Not Applicable</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Free Issue Items: <span class="danger">*</span> </label>
                                                                    <select multiple="" name="eoi_fii[]" required="" class="form-control">
                                                                        <?php if (!empty($fiis)) { ?>
                                                                            <?php foreach ($fiis as $key => $fii) { ?>
                                                                                <option value="<?php echo $fii['ii_name']; ?>"><?php echo $fii['ii_name']; ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                        <option value="No Applicable">Not Applicable</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Performance Deposit: <span class="danger">*</span> </label>
                                                                    <input name="eoi_pd" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Water: <span class="danger">*</span> </label>
                                                                    <input name="eoi_water" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Electricity: <span class="danger">*</span> </label>
                                                                    <input name="eoi_electicity" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Labour Accommodation: <span class="danger">*</span> </label>
                                                                    <input name="eoi_labour" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Defects Liability Period: <span class="danger">*</span> </label>
                                                                    <input name="eoi_dlp" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Deposit against DLP: <span class="danger">*</span> </label>
                                                                    <input name="eoi_dadlp" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Others: <span class="danger">*</span> </label>
                                                                    <input name="eoi_others" value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                        </form>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>			
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('buyer/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('buyer/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar-->
            <div class = "control-sidebar-bg"></div>

        </div>
        <!--./wrapper-->



        <?php $this->load->view('buyer/partials/scripts');
        ?>

        <script>

            var countStepsChange = 0;
            var checkvendorselected = 0;
            var form = $(".validation-wizard").show();
            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                , transitionEffect: "none"
                , enableAllSteps: true
                , enableFinishButton: true
                , titleTemplate: '<span class="step">Step #index# </span>  '
                , labels: {

                    finish: "Submit"

                }
                , onStepChanging: function (event, currentIndex, newIndex) {
                    if (newIndex === 2) {
                        var selectedVendors = $("input[name='eoi_vendors_selected[]']")
                                .map(function () {
                                    if ($(this).is(":checked")) {
                                        checkvendorselected = 1;
                                    }
                                }).get();
                        if (checkvendorselected === 1) {
                            return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                            //return newIndex;
                        } else {
                            alert("Select Vendors");
                        }
                    } else {
                        return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                        //return newIndex;
                    }

                }
                , onFinishing: function (event, currentIndex) {
                    //alert(form.validate().settings.ignore = ":disabled", form.valid());
                    //return form.validate().settings.ignore = ":disabled", form.valid()
                    return currentIndex;
                }
                , onFinished: function (event, currentIndex) {
                    var form = document.getElementById("register_form");
                    form.submit();
                }
            }), $(".validation-wizard").validate({
                ignore: "input[type=hidden]"
                , errorClass: "text-danger"
                , successClass: "text-success"
                , highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , errorPlacement: function (error, element) {
                    error.insertAfter(element)
                }
                , rules: {

                    email: {
                        email: !0
                    }
                }
            });
        </script>

        <?php
        foreach ($mRecords as $key => $mRecord) {
            $mTows = json_decode($mRecord['consolidated_tows']);
            $mTowsIds = json_decode($mRecord['consolidated_tows_ids']);
            ?>
            <?php if (in_array($tow['id'], $mTowsIds)) { ?>
                <script>
                    $("#override-<?php echo $mRecord['vendor_id']; ?>").click(function () {
                        var status = $("#override-<?php echo $mRecord['vendor_id']; ?>").html();
                        var checked_status = this.checked;
                        if (status === "Override") {
                            $("#checkbox_<?php echo $mRecord['vendor_id']; ?>").removeAttr("disabled");
                            $("#override-<?php echo $mRecord['vendor_id']; ?>").html("Disable");
                        } else {
                            $("#checkbox_<?php echo $mRecord['vendor_id']; ?>").prop('checked', false);
                            $("#checkbox_<?php echo $mRecord['vendor_id']; ?>").attr("disabled", "disabled");
                            $("#override-<?php echo $mRecord['vendor_id']; ?>").html("Override");
                        }
                    });
                </script>
            <?php } ?>
        <?php } ?>

    </body>
</html>