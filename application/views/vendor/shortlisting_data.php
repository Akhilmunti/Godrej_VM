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
                                    <h3 class="page-title br-0">Short Listing</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('vendor/partials/alerts'); ?>
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
                                                    <tr>
                                                        <td>
                                                            1
                                                        </td>
                                                        <td>
                                                            FY 17-18
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="4444" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" type="file" class="form-control form-control-sm" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            2
                                                        </td>
                                                        <td>
                                                            FY 18-19
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" type="file" class="form-control form-control-sm" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            3
                                                        </td>
                                                        <td>
                                                            FY 19-20
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" type="file" class="form-control form-control-sm" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            4
                                                        </td>
                                                        <td>
                                                            FY 20-21
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="3333" type="text" class="form-control form-control-sm" />
                                                        </td>
                                                        <td>
                                                            <input readonly="" type="file" class="form-control form-control-sm" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>  
                                        <div class="table-responsive"> 
                                            <table id="stc_dcw_table" class="table table-bordered">
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
                                                            Expected Cummlative Billed amount in Cr by March 24 (Expected completion date as per PCM input)
                                                        </th>
                                                        <th>
                                                            Attachment
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="itemsTbody">
                                                    <tr>
                                                        <td><a class="deleteRowCc"></a></td>
                                                        <td>
                                                            <input readonly="" value="test client" type="text" name="stc_dcw_details[1][]" class="form-control site-value"/>
                                                        </td>
                                                        <td><input readonly="" value="Project one" type="text" name="stc_dcw_details[1][]"  class="form-control site-value-2"/></td>
                                                        <td><input readonly="" value="Lists" type="text" name="stc_dcw_details[1][]"  class="form-control site-value-4"/></td>
                                                        <td><input readonly="" value="33333" type="number" name="stc_dcw_details[1][]"  class="form-control site-value-5"/></td>
                                                        <td><input readonly="" value="2022-03-22" type="date" name="stc_dcw_details[1][]" onchange="getOrderValue('1')" id="stc_dcw_details_ov_1" class="form-control site-value-6"/></td>
                                                        <td>
                                                            <input readonly="" value="2022-03-29" type="date" name="stc_dcw_details[1][]" onchange="getDcwStartDate('1')" id="stc_dcw_details_sd_1" class="form-control site-value-8"/>
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="2222" type="number" name="stc_dcw_details[1][]" onchange="getDcwStartDate('1')" id="stc_dcw_details_ed_1" class="form-control site-value-9"/>
                                                        </td>
                                                        <td>
                                                            <input readonly="" value="" type="file" name="stc_dcw_details[1][]"  class="form-control site-value-10"/>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="well clearfix text-right">
<!--                                                <a href="#" class="btn btn-primary" id="addrowdcw">
                                                    <span class="fa fa-plus"></span>
                                                    Add Row
                                                </a>-->
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="box-footer text-right">
                                        <hr>
                                        <a href="<?php echo base_url('vendor/home/shortlistingBids'); ?>" class="btn btn-primary">Close</a>
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

        <script type="text/javascript">
            function getSelectedPr(sel, selectedId) {
                if (confirm('Please confirm your selection')) {
                    alert("Success.");
                    // Save it!
//                    var selectedPr = sel.value;
//                    $.post("<?php echo base_url('buyer/vendor/makePr'); ?>",
//                            {
//                                buyer_id: selectedId,
//                                pr: selectedPr,
//                            },
//                            function (data, status) {
//                                if (data == "1") {
//                                    location.reload();
//                                } else {
//                                    alert("Something went wrong, Please try again later.");
//                                }
//                            });
                } else {
                    // Do nothing!
                    console.log('Thing was not saved to the database.');
                }
            }

            $('#submit_eoi').on('click', function () {
                $('.select_details_eoi').modal('toggle');
                $("#send_short").removeAttr("disabled");
                $("#accept_eoi").attr("disabled", true);
            });


            var counterdcw = 2;
            $("#addrowdcw").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_dcw_table tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                cols += '<td><input required type="text" class="form-control site-value" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-6" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="number" class="form-control site-value-7" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-8" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="number" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="file" class="form-control site-value-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                newRow.append(cols);
                $("#stc_dcw_table").append(newRow);
                counterdcw++;
            });
            $("#stc_dcw_table").on("click", ".ibtnDelDcw", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#stc_dcw_table tr').length;
                $(this).closest("tr").remove();
                counterdcw -= 1
            });

        </script>

    </body>
</html>