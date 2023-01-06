<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

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
                                    <h3 class="page-title br-0">
                                        Bidder List Approvals Contracts
                                    </h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form id="register_form" action="<?php echo base_url('buyer/vendor/sendForApproval/' . $eoi['eoi_id']); ?>" method="POST" enctype="multipart/form-data">
                                        <div class="box-body pb-0">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Subject : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_subject" class="form-control" rows="4"><?php echo $eoi['eoi_subject'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Project Configuration : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwoe" type="text" class="form-control" required="" value="<?php echo $record['wopo_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Total BUA : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwoe" type="number" class="form-control" required="" value="<?php echo $record['wopo_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Contract Duration : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwoe" type="number" class="form-control" required="" value="<?php echo $record['wopo_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Budget without Escalation (In crores) : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwoe" type="number" class="form-control" required="" value="<?php echo $record['wopo_startdate']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wopo_startdate"> Budget with Escalation (In crores) : <span class="danger">*</span> </label>
                                                        <input required="" name="s_bwe" step="0.1" id="escalation" type="number" class="form-control" required=""  />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Scope of Works  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_sow" class="form-control" rows="4"><?php echo $eoi['eoi_scope']; ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Contract Award strategy  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_cas" class="form-control" rows="4"><?php echo $eoi['eoi_award'] ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Basic Rate Items: <span class="danger">*</span> </label>
                                                        <input required="" name="s_brm" type="text" class="form-control" required="" value="<?php echo $record['s_brm']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="wlastName2"> Free Issue Items: <span class="danger">*</span> </label>
                                                        <input required="" name="s_fim" type="text" class="form-control" required="" value="<?php echo $record['s_fim']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <table id="s_milestone_table3" class="table table-bordered">
                                                        <thead class="bg-primary">
                                                            <tr>
                                                                <th>
                                                                    Action
                                                                </th>
                                                                <th>
                                                                    Name of Contractor
                                                                </th>
                                                                <th>
                                                                    Last Year Turnover (In Crores)
                                                                </th>
                                                                <th>
                                                                    BID Capacity (Cr)
                                                                </th>
                                                                <th>
                                                                    PQ/Feedback Score
                                                                </th>
                                                                <th>
                                                                    Score
                                                                </th>
                                                                <th>
                                                                    Bidder’s Category
                                                                </th>
                                                                <th>
                                                                    On-going / Completed Project Remarks
                                                                </th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <input class="form-control" type="text" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"> 
                                                                        <option disabled="" value="" selected="">Select</option>
                                                                        <option>PQ</option>
                                                                        <option>Feedback</option>
                                                                    </select>
                                                                </td>
                                                                <td class="bg-success">
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"> 
                                                                        <option disabled="" value="" selected="">Select</option>
                                                                        <option>Very Small</option>
                                                                        <option>Small</option>
                                                                        <option>Medium</option>
                                                                        <option>Large</option>
                                                                        <option>Very Large</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <input class="form-control" type="text" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"> 
                                                                        <option disabled="" value="" selected="">Select</option>
                                                                        <option>PQ</option>
                                                                        <option>Feedback</option>
                                                                    </select>
                                                                </td>
                                                                <td class="bg-warning">
                                                                    <input class="form-control" type="number" />
                                                                </td>
                                                                <td>
                                                                    <select class="form-control"> 
                                                                        <option disabled="" value="" selected="">Select</option>
                                                                        <option>Very Small</option>
                                                                        <option>Small</option>
                                                                        <option>Medium</option>
                                                                        <option>Large</option>
                                                                        <option>Very Large</option>
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input class="form-control" type="text" />
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>

                                                    <div class="well clearfix text-right">
                                                        <a href="#" class="btn btn-primary" id="addrowdcw3">
                                                            <span class="fa fa-plus"></span>
                                                            Add Row
                                                        </a>
                                                    </div>

                                                    <div id="key-dates">
                                                        <h4 class="mt-2">
                                                            <b>
                                                                KEY DATES  :
                                                            </b>
                                                        </h4>

                                                        <table id="s_milestone_table2" class="table table-bordered">
                                                            <thead class="bg-primary">
                                                                <tr>
                                                                    <th>
                                                                        Milestone on which contractor should be appointed as per
                                                                    </th>
                                                                    <th>
                                                                        <select id="s_milestone" name="s_milestone" required="" class="form-control form-control-sm">
                                                                            <option value="PI3">PI3</option>
                                                                            <option value="PI5">PI5</option>
                                                                        </select>
                                                                    </th>
                                                                    <th colspan="2">
                                                                        <input id="s_milestone_logic" name="s_milestone_logic" required="" placeholder="Logic" class="form-control form-control-sm" type="text" />
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <th>
                                                                        Activity
                                                                    </th>
                                                                    <th>
                                                                        Dates
                                                                    </th>
                                                                    <th>
                                                                        Remarks
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            Planned date of Contractor appointment As per PI Logic.
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_first_date" required="" name="s_activity[1][]" type="date" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_first_date2" required="" name="s_activity[1][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            Actual date as per current site progress
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_act_date" required="" name="s_activity[2][]" type="date" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_act_date2" required="" name="s_activity[2][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            CBE of contractor Appointment
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_second_date" required="" name="s_activity[3][]" type="date" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_second_date2" required="" name="s_activity[3][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            Delay in appointment
                                                                        </b>
                                                                    </td> 
                                                                    <td>
                                                                        <input id="activity_difference" readonly="" required="" name="s_activity[4][]" type="number" class="form-control" />
                                                                    </td>
                                                                    <td>
                                                                        <input id="activity_difference2" name="s_activity[4][]" type="text" class="form-control" />
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <div class="well clearfix text-right">
                                                            <a href="#" class="btn btn-primary" id="addrowdcw2">
                                                                <span class="fa fa-plus"></span>
                                                                Add Row
                                                            </a>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Front Idling  : <span class="danger">*</span> </label>
                                                        <input value="1" name="s_fi" type="radio" id="radio_1" checked />
                                                        <label for="radio_1">Yes</label>
                                                        <input value="0" name="s_fi" name="group1" type="radio" id="radio_2" />
                                                        <label for="radio_2">No</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12" id="reason_delay">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Reason For Delay  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_fa" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Current Work Status  : <span class="danger">*</span> </label>
                                                        <textarea required="" name="s_cws" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="wopo_usertype"> Comments  :  </label>
                                                        <textarea name="s_comments" class="form-control" rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-3 mb-3">
                                                            <lable>PCM</lable>
                                                            <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                                        </div>
                                                        <div id="pm" class="col-md-3 mb-3" style="display: none">
                                                            <lable>PM</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($PM as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="zonal" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Regional C&P Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($RCH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="ch" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Construction Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($CH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="project_director" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Project Director</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($PD as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="oh" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Operations Head</lable>
                                                            <select name="s_approvers[]"  class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($OH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="rh" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Regional Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($RH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="zh" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Zonal CEO</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled=""  selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($ZH as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="ho" class="col-md-3 mb-3" style="display: none">
                                                            <lable>HO - C&P Head</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($HO as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <div id="coo" class="col-md-3 mb-3" style="display: none">
                                                            <lable>Chief Operating Officer</lable>
                                                            <select name="s_approvers[]" class="form-control">
                                                                <option disabled="" selected="" value="">Select</option>
                                                                <option value="">Not Applicable</option>
                                                                <?php foreach ($COO as $key => $record) { ?>
                                                                    <option value="<?php echo $record['buyer_id']; ?>"><?php echo $record['buyer_name']; ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="box-footer text-right">
                                            <button class="btn btn-primary" type="submit">Send for approval</button>
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

            $("#escalation").on('change keyup paste', function () {
                var value = $('#escalation').val();
                if (value < 5) {
                    $('#key-dates').css('display', 'none');
                    $("#s_milestone").removeAttr("required");
                    $("#s_milestone_logic").removeAttr("required");
                    $("#activity_first_date").removeAttr("required");
                    $("#activity_first_date2").removeAttr("required");
                    $("#activity_act_date").removeAttr("required");
                    $("#activity_act_date2").removeAttr("required");
                    $("#activity_second_date").removeAttr("required");
                    $("#activity_second_date2").removeAttr("required");
                    $("#activity_difference").removeAttr("required");
                    $("#activity_difference2").removeAttr("required");
                } else {
                    $('#key-dates').css('display', 'block');
                    $("#s_milestone").attr('required', 'required');
                    $("#s_milestone_logic").attr('required', 'required');
                    $("#activity_first_date").attr('required', 'required');
                    $("#activity_first_date2").attr('required', 'required');
                    $("#activity_act_date").attr('required', 'required');
                    $("#activity_act_date2").attr('required', 'required');
                    $("#activity_second_date").attr('required', 'required');
                    $("#activity_second_date2").attr('required', 'required');
                    $("#activity_difference").attr('required', 'required');
                    $("#activity_difference2").attr('required', 'required');
                }
                if (value > 5) {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#oh').css('display', 'block');
                    $('#rh').css('display', 'block');
                    $('#zh').css('display', 'block');
                    $('#coo').css('display', 'block');
                    $('#ho').css('display', 'block');
                } else if (value >= 3 && value <= 5) {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#oh').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#rh').css('display', 'block');
                    $('#zh').css('display', 'none');
                    $('#coo').css('display', 'none');
                    $('#ho').css('display', 'none');
                } else if (value >= 0.5 && value < 3) {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#oh').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#rh').css('display', 'none');
                    $('#zh').css('display', 'none');
                    $('#coo').css('display', 'none');
                    $('#ho').css('display', 'none');
                    $('#key-dates').css('display', 'none');
                } else {
                    $('#zonal').css('display', 'block');
                    $('#pm').css('display', 'block');
                    $('#ch').css('display', 'block');
                    $('#project_director').css('display', 'block');
                    $('#oh').css('display', 'none');
                    $('#rh').css('display', 'none');
                    $('#zh').css('display', 'none');
                    $('#coo').css('display', 'none');
                    $('#ho').css('display', 'none');
                }
            });
            var counterdcw = 2;
            $("#addrowdcw").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"><input required type="text" class="form-control site-value" name="s_milestone[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value" name="s_milestone[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value-6" onchange="getOrderValue(' + counterdcw + ')" id="s_milestone_ov_' + counterdcw + '" name="s_milestone[' + counterdcw + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9" onchange="getDcwEndDate(' + counterdcw + ')" id="s_milestone_ed_' + counterdcw + '" name="s_milestone[' + counterdcw + '][]"/></td>';
                newRow.append(cols);
                $("#s_milestone_table").append(newRow);
                counterdcw++;
            });
            $("#s_milestone_table").on("click", ".ibtnDelDcw", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table tr').length;
                $(this).closest("tr").remove();
                counterdcw -= 1
            });
            var counterdcw2 = 2;
            $("#addrowdcw2").on("click", function () {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table2 tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input required type="text" class="form-control site-value" name="s_activity[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="date" class="form-control site-value" name="s_activity[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input required type="text" class="form-control site-value-9"  name="s_activity[' + counterdcw2 + '][]"/></td>';
                cols += '<td><input type="button" class="ibtnDelDcw2 btn btn-sm btn-danger"  value="Delete"></td>';
                newRow.append(cols);
                $("#s_milestone_table2").append(newRow);
                counterdcw2++;
            });
            $("#s_milestone_table2").on("click", ".ibtnDelDcw2", function (event) {
                $('#sites-table-tbody tr').remove();
                var rowCount = $('#s_milestone_table tr').length;
                $(this).closest("tr").remove();
                counterdcw2 -= 1
            });

            $('#activity_first_date').on('change keyup paste', function () {
                var first = this.value;
                var second = $('#activity_second_date').val();
                //$('#activity_second_date').attr('min', first);
                if (second && first) {
                    const date1 = new Date(first);
                    const date2 = new Date(second);
                    const diffTime = date2 - date1;
                    const diffDays = diffTime / (1000 * 60 * 60 * 24);
                    $('#activity_difference').val(diffDays);
                }
            });

            $('#activity_second_date').on('change keyup paste', function () {
                var second = this.value;
                var first = $('#activity_first_date').val();
                //$('#activity_first_date').attr('max', second);
                if (second && first) {
                    const date1 = new Date(first);
                    const date2 = new Date(second);
                    const diffTime = date2 - date1;
                    const diffDays = diffTime / (1000 * 60 * 60 * 24);
                    $('#activity_difference').val(diffDays);
                    if (diffDays > 0) {
                        $('#reason_delay').css('display', 'block');
                    }
                }
            });

            $('input[type=radio][name=s_fi]').on('change keyup paste', function () {
                var checkedValue = this.value;
                var delay = $('#activity_difference').val();
                if (delay < 0 && checkedValue === "0") {
                    $('#reason_delay').css('display', 'none');
                } else {
                    $('#reason_delay').css('display', 'block');
                }
            });


            var counterdcw3 = 2;
            $("#addrowdcw3").on("click", function () {
                var rowCount = $('#s_milestone_table3 tr').length;
                //alert(rowCount);
                var newRow = $("<tr>");
                var cols = "";
                cols += '<td><input type="button" class="ibtnDelDcw2 btn btn-sm btn-danger"  value="Delete"></td>';
                cols += '<td><input required type="text" class="form-control" name="s_activity[' + counterdcw3 + '][]"/></td>';
                cols += '<td><input required type="number" class="form-control"  name="s_activity[' + counterdcw3 + '][]"/></td>';
                cols += '<td><input required type="number" class="form-control"  name="s_activity[' + counterdcw3 + '][]"/></td>';
                cols += '<td><select class="form-control"><option disabled="" value="" selected="">Select</option><option>PQ</option><option>Feedback</option></select></td>';
                cols += '<td><input required type="number" class="form-control"  name="s_activity[' + counterdcw3 + '][]"/></td>';
                cols += '<td><select class="form-control"><option disabled="" value="" selected="">Select</option><option>Very Small</option><option>Small</option><option>Medium</option><option>Large</option><option>Very Large</option></select></td>';
                cols += '<td><input required type="text" class="form-control" name="s_activity[' + counterdcw3 + '][]"/></td>';
                newRow.append(cols);
                $("#s_milestone_table3").append(newRow);
                counterdcw2++;
            });
            $("#s_milestone_table3").on("click", ".ibtnDelDcw2", function (event) {
                var rowCount = $('#s_milestone_table3 tr').length;
                $(this).closest("tr").remove();
                counterdcw2 -= 1
            });

        </script>

    </body>
</html>