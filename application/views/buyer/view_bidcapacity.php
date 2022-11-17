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

        table tr input[type='tel']{
            width: 150px;
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
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="page-title br-0">Bid Capacity </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0  wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>


                                        <form id="register_form" action="<?php echo base_url('vendor/home/actionSendBidCapacity/' . $mRecord['eoi_id']); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6>Latest 4  Years turnover</h6>
                                            <section>
                                                <div class="table-responsive">
                                                    <table  class="table table-striped table-bordered" style="width:100%">
                                                        <thead>

                                                            <tr>
                                                                <th>SL No</th>
                                                                <th>FY</th>
                                                                <th>Turn Over- (in Rs. Crs.)</th>
                                                                <th>
                                                                    PAT (Profit After Tax)
                                                                    In Rs. Cr.
                                                                </th>
                                                                <th>Attachments
                                                                    (Balance Sheet)
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    1
                                                                </td>
                                                                <td>
                                                                    FY <?php echo date("Y", strtotime("-4 year")); ?>-<?php echo date("Y", strtotime("-3 year")); ?>
                                                                </td>
                                                                <td>
                                                                    <input disabled value="<?php echo $mRecord['bc_to_1']; ?>" name="bc_to_1" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <input disabled value="<?php echo $mRecord['bc_pat_1']; ?>" name="bc_pat_1" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mRecord['bc_bs_1']); ?>" class="btn btn-xs btn-primary">
                                                                        Download
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    2
                                                                </td>
                                                                <td>
                                                                    FY <?php echo date("Y", strtotime("-3 year")); ?>-<?php echo date("Y", strtotime("-2 year")); ?>
                                                                </td>
                                                                <td>
                                                                    <input value="<?php echo $mRecord['bc_to_2']; ?>" disabled name="bc_to_2" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <input value="<?php echo $mRecord['bc_pat_2']; ?>" disabled name="bc_pat_2" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mRecord['bc_bs_2']); ?>" class="btn btn-xs btn-primary">
                                                                        Download
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    3
                                                                </td>
                                                                <td>
                                                                    FY <?php echo date("Y", strtotime("-2 year")); ?>-<?php echo date("Y", strtotime("-1 year")); ?>
                                                                </td>
                                                                <td>
                                                                    <input value="<?php echo $mRecord['bc_to_3']; ?>" disabled name="bc_to_3" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <input value="<?php echo $mRecord['bc_pat_3']; ?>" disabled name="bc_pat_3" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mRecord['bc_bs_3']); ?>" class="btn btn-xs btn-primary">
                                                                        Download
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    4
                                                                </td>
                                                                <td>
                                                                    FY <?php echo date("Y", strtotime("-1 year")); ?>-<?php echo date("Y"); ?>
                                                                </td>
                                                                <td>
                                                                    <input value="<?php echo $mRecord['bc_to_4']; ?>" disabled name="bc_to_4" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <input value="<?php echo $mRecord['bc_pat_4']; ?>" disabled name="bc_pat_4" required="" type="number" class="form-control form-control-sm" />
                                                                </td>
                                                                <td>
                                                                    <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mRecord['bc_bs_4']); ?>" class="btn btn-xs btn-primary">
                                                                        Download
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>  
                                            </section>
                                            <!-- End -->
                                            <h6></h6>
                                            <section>
                                                <h5>
                                                    <b>Ongoing Works/Orders in hand</b>
                                                </h5>
                                                <div class="table-responsive"> 
                                                    <table id="stc_bc_table" class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Client Name</th>
                                                                <th>Project Name</th>
                                                                <th>Scope of Work</th>
                                                                <th>Total Order Value(Cr)</th>
                                                                <th>Award date/ Start date</th>
                                                                <th>
                                                                    Completion Date
                                                                </th>
                                                                <th>
                                                                    Expected Cummlative Billed amount in Cr by <?php
                                                                    echo date("F Y", strtotime("+" . $mRecord['eoi_schedule'] . "months", strtotime($mRecord['eoi_start_date'])));
                                                                    ?> (Expected completion date as per PCM input)
                                                                </th>
                                                                <th>
                                                                    Supporting Document 
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="itemsTbody">
                                                            <?php
                                                            $mWorks = json_decode($mRecord['bc_ongoing_works']);
                                                            foreach ($mWorks as $key => $mWork) {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        <input disabled required="" value="<?php echo $mWork[0]; ?>" type="text" name="bc_ongoing_works[1][]" class="form-control site-value"/>
                                                                    </td>
                                                                    <td><input disabled required="" value="<?php echo $mWork[1]; ?>" type="text" name="bc_ongoing_works[1][]"  class="form-control site-value-2"/></td>
                                                                    <td><input disabled required="" value="<?php echo $mWork[2]; ?>" type="text" name="bc_ongoing_works[1][]"  class="form-control site-value-4"/></td>
                                                                    <td><input disabled required="" value="<?php echo $mWork[3]; ?>" type="number" name="bc_ongoing_works[1][]"  class="form-control site-value-5"/></td>
                                                                    <td><input disabled required="" value="<?php echo $mWork[4]; ?>" type="date" name="bc_ongoing_works[1][]" onchange="getOrderValue('1')" id="bc_ongoing_works_ov_1" class="form-control site-value-6"/></td>
                                                                    <td>
                                                                        <input disabled required="" value="<?php echo $mWork[5]; ?>" type="date" name="bc_ongoing_works[1][]" onchange="getDcwStartDate('1')" id="bc_ongoing_works_sd_1" class="form-control site-value-8"/>
                                                                    </td>
                                                                    <td>
                                                                        <input disabled required="" value="<?php echo $mWork[6]; ?>" type="number" name="bc_ongoing_works[1][]" onchange="getDcwStartDate('1')" id="bc_ongoing_works_ed_1" class="form-control site-value-9"/>
                                                                    </td>
                                                                    <td>
                                                                        <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mWork[7]); ?>" class="btn btn-xs btn-primary">
                                                                            Download
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </div> 
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Solvency Certificate</label>
                                                        <br>
                                                        <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mRecord['bc_solvency_certificate']); ?>" class="btn btn-xs btn-primary">
                                                            Download
                                                        </a>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>BG Limit Letter from your Bank</label>
                                                        <br>
                                                        <a download="" target="_blank" href="<?php echo base_url('uploads/' . $mRecord['bc_bg_certificate']); ?>" class="btn btn-xs btn-primary">
                                                            Download
                                                        </a>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                        </form>
                                    </div>
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

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('buyer/partials/scripts'); ?>


        <script>

            var countStepsChange = 0;
            var form = $(".validation-wizard").show();
            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                , transitionEffect: "none"
                , enableAllSteps: true
                , enableFinishButton: false
                , titleTemplate: '<span class="step">Step #index# </span>  '
                , labels: {

                    finish: "Submit"

                }
                , onStepChanging: function (event, currentIndex, newIndex) {
                    return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                    //return newIndex;
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

    </body>
</html>