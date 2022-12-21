<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

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

            <?php $this->load->view('vendor/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('vendor/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="page-title br-0">Short Listing - Enter Bid Capacity : <?php echo $mRecord['project_name']; ?></h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0  wizard-content">
                                        <?php $this->load->view('vendor/partials/alerts'); ?>


                                        <form id="register_form" action="<?php echo base_url('vendor/home/actionSendBidCapacity/' . $mRecord['eoi_id']); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6>Latest 4 Years turnover</h6>
                                            <section>
                                                <div class="table-responsive">
                                                    <table  class="table table-striped table-bordered" style="width:100%">
                                                        <thead>

                                                            <tr>
                                                                <th>#</th>
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

                                                            <?php
                                                            //echo $difference;
                                                            if ($difference >= "4") {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        1
                                                                    </td>
                                                                    <td>
                                                                        FY <?php echo date("Y", strtotime("-4 year")); ?>-<?php echo date("Y", strtotime("-3 year")); ?>
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" max="999999" id="bc_to_1" name="bc_to_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_1" name="bc_pat_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_1" required="" type="file" class="form-control form-control-sm" />
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
                                                                        <input min="0" max="999999" id="bc_to_2" name="bc_to_2" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_2" name="bc_pat_2" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_2" required="" type="file" class="form-control form-control-sm" />
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
                                                                        <input min="0" max="999999" id="bc_to_3" name="bc_to_3" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_3" name="bc_pat_3" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_3" required="" type="file" class="form-control form-control-sm" />
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
                                                                        <input min="0" max="999999" id="bc_to_4" name="bc_to_4" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_4" name="bc_pat_4" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_4" required="" type="file" class="form-control form-control-sm" />
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>


                                                            <?php
                                                            //echo $difference;
                                                            if ($difference == "3") {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        1
                                                                    </td>
                                                                    <td>
                                                                        FY <?php echo date("Y", strtotime("-4 year")); ?>-<?php echo date("Y", strtotime("-3 year")); ?>
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" max="999999" id="bc_to_1" name="bc_to_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_1" name="bc_pat_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_1" required="" type="file" class="form-control form-control-sm" />
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
                                                                        <input min="0" max="999999" id="bc_to_2" name="bc_to_2" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_2" name="bc_pat_2" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_2" required="" type="file" class="form-control form-control-sm" />
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
                                                                        <input min="0" max="999999" id="bc_to_3" name="bc_to_3" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_3" name="bc_pat_3" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_3" required="" type="file" class="form-control form-control-sm" />
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>

                                                            <?php
                                                            //echo $difference;
                                                            if ($difference == "2") {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        1
                                                                    </td>
                                                                    <td>
                                                                        FY <?php echo date("Y", strtotime("-1 year")); ?>-<?php echo date("Y"); ?>
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" max="999999" id="bc_to_1" name="bc_to_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_1" name="bc_pat_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_1" required="" type="file" class="form-control form-control-sm" />
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
                                                                        <input min="0" max="999999" id="bc_to_2" name="bc_to_2" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_2" name="bc_pat_2" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_2" required="" type="file" class="form-control form-control-sm" />
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>

                                                            <?php
                                                            //echo $difference;
                                                            if ($difference <= "1") {
                                                                ?>
                                                                <tr>
                                                                    <td>
                                                                        1
                                                                    </td>
                                                                    <td>
                                                                        FY <?php echo date("Y", strtotime("-1 year")); ?>-<?php echo date("Y"); ?>
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" max="999999" id="bc_to_1" name="bc_to_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input min="0" id="bc_pat_1" name="bc_pat_1" required="" type="number" class="form-control form-control-sm" />
                                                                    </td>
                                                                    <td>
                                                                        <input name="bc_bs_1" required="" type="file" class="form-control form-control-sm" />
                                                                    </td>
                                                                </tr>

                                                            <?php } ?>
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
                                                                <th>Action</th>
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
                                                                    ?> (Expected completion date)
                                                                </th>
                                                                <th>
                                                                    Supporting Document 
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="itemsTbody">
                                                            <tr>
                                                                <td>
                                                                    <a class="deleteRowCc"></a>
                                                                </td>
                                                                <td>
                                                                    <input required="" value="" type="text" name="bc_ongoing_works[1][]" class="form-control site-value"/>
                                                                </td>
                                                                <td>
                                                                    <input required="" value="" type="text" name="bc_ongoing_works[1][]"  class="form-control site-value-2"/>
                                                                </td>
                                                                <td>
                                                                    <input required="" value="" type="text" name="bc_ongoing_works[1][]"  class="form-control site-value-4"/>
                                                                </td>
                                                                <td>
                                                                    <input required="" value="" type="number" name="bc_ongoing_works[1][]"  class="form-control site-value-5"/>
                                                                </td>
                                                                <td>
                                                                    <input min="<?php echo $vendor_doi; ?>" required="" value="" type="date" name="bc_ongoing_works[1][]" onchange="getOrderValue('1')" id="bc_ongoing_works_ov_1" class="form-control site-value-6"/>
                                                                </td>
                                                                <td>
                                                                    <input min="<?php echo $vendor_doi; ?>" required="" value="" type="date" name="bc_ongoing_works[1][]" onchange="getDcwStartDate('1')" id="bc_ongoing_works_sd_1" class="form-control site-value-8"/>
                                                                </td>
                                                                <td>
                                                                    <input required="" value="" type="number" name="bc_ongoing_works[1][]" onchange="getDcwStartDate('1')" id="bc_ongoing_works_ed_1" class="form-control site-value-9"/>
                                                                </td>
                                                                <td>
                                                                    <input required="" value="" type="file" name="bc_ongoing_works[1][]"  class="form-control site-value-10"/>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="well clearfix text-right">
                                                        <a href="#" class="btn btn-primary" id="addrowbc">
                                                            <span class="fa fa-plus"></span>
                                                            Add Row
                                                        </a>
                                                    </div>
                                                </div> 
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Solvency Certificate</label>
                                                        <input required="" name="bc_solvency_certificate" type="file" class="form-control" />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>BG Limit Letter from your Bank</label>
                                                        <input required="" name="bc_bg_certificate" type="file" class="form-control" />
                                                    </div>
                                                    <div class="col-md-12 mt-3 mb-3">
                                                        <input class="form-check-input required" type="checkbox" id="checkbox_23" name="bc_confirmation" value="1" required="">
                                                        <label class="form-check-label" for="checkbox_23">
                                                            I/We, hereby declare that the information furnished above is true, complete and correct to the best of my knowledge and belief. I/We understand that in the event of the information being found false or incorrect at any stage, any wilful dishonesty may render for rejection of this PQ application/termination of ongoing contracts/blacklisting.
                                                        </label>
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
            <?php $this->load->view('vendor/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('vendor/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('vendor/partials/scripts'); ?>


        <script>

            var countStepsChange = 0;
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

        <script type="text/javascript">

            var counterdcw = 2;
            $("#addrowbc").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_bc_table tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                cols += '<td><input required type="text" class="form-control site-value" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-2" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-3" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="number" class="form-control site-value-7" onchange="getBilledValue(' + counterdcw + ')" id="bc_ongoing_works_bv_' + counterdcw + '" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-6" onchange="getOrderValue(' + counterdcw + ')" id="bc_ongoing_works_ov_' + counterdcw + '" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-8" onchange="getDcwStartDate(' + counterdcw + ')" id="bc_ongoing_works_sd_' + counterdcw + '" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="number" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw + ')" id="bc_ongoing_works_ed_' + counterdcw + '" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="file" class="form-control site-value-10" name="bc_ongoing_works[' + counterdcw + '][]"/></td>';
                newRow.append(cols);
                $("#stc_bc_table").append(newRow);
                counterdcw++;
            });
            $("#stc_bc_table").on("click", ".ibtnDelDcw", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_bc_table tr').length;
                $(this).closest("tr").remove();
                counterdcw -= 1
            });

            $("#bc_to_1").on('change keyup paste', function () {
                var value = $("#bc_to_1").val();
                if (value) {
                    $("#bc_pat_1").attr('max', value);
                }
            });

            $("#bc_to_2").on('change keyup paste', function () {
                var value = $("#bc_to_2").val();
                if (value) {
                    $("#bc_pat_2").attr('max', value);
                }
            });

            $("#bc_to_3").on('change keyup paste', function () {
                var value = $("#bc_to_3").val();
                if (value) {
                    $("#bc_pat_3").attr('max', value);
                }
            });

            $("#bc_to_4").on('change keyup paste', function () {
                var value = $("#bc_to_4").val();
                if (value) {
                    $("#bc_pat_4").attr('max', value);
                }
            });

        </script>

    </body>
</html>