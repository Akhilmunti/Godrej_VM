<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>
<style>
    .btn-hide {
        display: none;
    }

    .keyDate-hide {
        display: none;
    }
	.table-bordered {
    border: 1px solid #f0f0f0 !important;
    }

      label.error {
        color: red;
        font-size: 1rem;
        display: block;
        margin-top: 5px;
    }

    input.error, select.error,textarea.error {
        border: 1px solid red;
        font-weight: 300;
        color: red;
    }    
</style>

<link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.1.6/quill.js"></script>

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
                            <div class="col-lg-8">
                                <h3 class="page-title br-0">Short Listing Approval for Contractor | Create NFA</h3>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">
                            <form id="nfaForm" method="POST" action="<?php echo base_url('nfa/BidderListContractor/actionSave'); ?>" enctype="multipart/form-data" onsubmit="loader()">
                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Subject*</h5>
                                    <div id="subject" class="form-control" name="subject">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <label>Budget without Escalation (In crores) * </label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="budget_without_escalation" id="budgetWithoutEsc"  required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Budget with Escalation (In crores) * </label>
                                        <input  type="text" oninput="allowNumOnly(this);decimalStrict()"  class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="budget_with_escalation" id="budgetWithEsc" onblur="levels_approvers(this);changeToCr(this)" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <label>Scope of Works*</label>
                                        <textarea required="" name="scope_work" id="scope_work"   class="form-control" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <label>Award Strategy*</label>
                                        <textarea required="" name="award_strategy" id="award_strategy"  class="form-control" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="row mt-20">
                                    <div class="col-lg-6">
                                        <label>Free Issue Material*</label>
                                        <input type="text" class="form-control pull-right" name="free_material" id="free_material" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Basic Rate Items*</label>
                                        <input type="text" class="form-control pull-right" name="basic_rate_items" id="basic_rate_items" required>
                                    </div>
                                </div>

                                <div class="d-block mt-30">
                                    <h5 class="page-title br-0 font-weight-bold">Proposed bidder list for the subject works</h5>
                                </div>

                                <div class="table-responsive mt-30">
                                    <table id="t1" class="table mb-0 table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th scope="col" style="width:5%">S.N</th>
                                                <th scope="col" style="width:15%">Name of Contractor</th>
                                                <th scope="col">Last Year Turnover (In Crores)</th>
                                                <th scope="col">BID Capacity (Cr)</th>
                                                <th scope="col" style="width:15%">PQ/Feedback Score</th>
                                                <th scope="col" style="width:15%">Bidder???s Category</th>
                                                <th scope="col">On-going / Completed</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <tr class="text-center">
                                                <td scope="row">1</td>
                                                <td><input type="text" class="form-control" placeholder="" name="name_contractor[]" id="name_contractor" required></td>
                                                <td><input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="avg_turn_over[]" id="avg_turn_over" required></td>
                                                <td><input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="bid_capacity[]" id="bid_capacity" required></td>
                                                <td>
												<select id="score_type" name="score_type[]" required="" class="form-control" onchange="score_color(this);" required> 
													<option value="PQ">PQ</option>
													<option value="FB">FB</option>
												</select> 
                                                <input type='number' class="form-control mt-3" style="width: 120px !important;" name="score[]" id="score1" min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" required></td>
                                                <td>
                                                    <!-- <input type="text" class="form-control" placeholder="" name="bid_category[]" id="bid_category"> -->
                                                    <select name="bid_category[]" id="bid_category" required="" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="Very Small">Very Small</option>
                                                        <option value="Small">Small</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Large">Large</option>
                                                        <option value="Very Large">Very Large</option>
                                                    </select>
                                                </td>
                                                <td><input type="text" class="form-control" placeholder="" name="ongoing_complete_project[]" id="ongoing_complete_project" required></td>
                                                <td></td>
                                            </tr>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row text-right mt-20">
                                    <div class="col-lg-12">
                                        <button type="button" onclick="addRow()" class="btn btn-primary rounded border-secondary mr-10">
                                            <span class="fa fa-plus"></span>
                                            Add row
                                        </button>
                                    </div>
                                </div>

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold keyDate-hide" id="keyDate1">Key Dates</h5>
                                </div>

                                <!-- <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <div class="table-responsive table-bordered">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">S.N</th>
                                                        <th scope="col" colspan="2">Contract Package ??? <input type="text" class="form-control" id="contract_package_works_label" name="contract_package_works_label"></th>
                                                        <th scope="col">Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>
                                                            <label for="">Milestone on which contractor should be appointed</label>
                                                            <input type='text' class="form-control" name="milestone_label" id="milestone_label" required>
                                                        </td>
                                                        <td><input type="text" class="form-control" placeholder="" id="contract_package_works_value" name="contract_package_works_value"></td>
                                                        <td>
                                                            <textarea class="form-control" rows="2" name="contract_package_works_remarks" id="contract_package_works_remarks"></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Activity</th>
                                                        <th scope="col">Dates</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">A</th>
                                                        <td>Planned date of Contractor appointment As per BI Logic.</td>
                                                        <td><input type="date" class="form-control" placeholder="" id="activity_planned_date" name="activity_planned_date"></td>
                                                        <td>
                                                            <textarea class="form-control" rows="2" name="activity_planned_remarks" id="activity_planned_remarks"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">B</th>
                                                        <td>Actual date as per current site progress</td>
                                                        <td><input type="date" class="form-control" placeholder="" id="activity_actual_date" name="activity_actual_date"></td>
                                                        <td>
                                                            <textarea class="form-control" rows="2" name="activity_actual_remarks" id="activity_actual_remarks"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">C</th>
                                                        <td>CBE of contractor Appointment</td>
                                                        <td><input type="date" class="form-control" placeholder="" id="activity_cbe_date" name="activity_cbe_date" onblur="calculateDays();"></td>
                                                        <td>
                                                            <textarea class="form-control" rows="2" name="activity_cbe_remarks" id="activity_cbe_remarks"></textarea>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th scope="row">D</th>
                                                        <td>Delay in appointment (C-A) </td>
                                                        <td><input type="text" class="form-control" placeholder="" id="activity_delay" name="activity_delay" readonly></td>
                                                        <td>
                                                            <textarea class="form-control" rows="2" name="activity_delay_remarks" id="activity_delay_remarks"></textarea>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div> -->

                                <table id="s_milestone_table2" class="table table-bordered keyDate-hide mt-4">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>
                                                Milestone on which contractor should be appointed as per
                                            </th>
                                            <th>
                                                <select id="milestone" name="milestone" required="" class="form-control form-control-sm" required>
                                                    <option value="PI3">PI3</option>
                                                    <option value="PI5">PI5</option>
                                                </select>
                                            </th>
                                            <th colspan="2">
                                                <input id="milestone_label" name="milestone_label" placeholder="Logic" class="form-control form-control-sm" type="text" required/>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th> Activity </th>
                                            <th> Dates </th>
                                            <th> Remarks </th>
                                            <th> Action </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <b>
                                                    Planned date of Contractor appointment As per BI Logic.
                                                </b>
                                            </td>
                                            <td>
                                                <input id="activity_planned_date" name="activity_planned_date" type="date" class="form-control" required/>
                                            </td>
                                            <td>
                                                <input id="activity_planned_remarks"  name="activity_planned_remarks" type="text" class="form-control" required/>
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
                                                <input id="activity_actual_date"   name="activity_actual_date" type="date" class="form-control" required/>
                                            </td>
                                            <td>
                                                <input id="activity_actual_remarks"  name="activity_actual_remarks" type="text" class="form-control" required/>
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
                                                <input id="activity_cbe_date"   name="activity_cbe_date" type="date" class="form-control" onblur="calculateDays();" required/>
                                            </td>
                                            <td>
                                                <input id="activity_cbe_remarks"   name="activity_cbe_remarks" type="text" class="form-control" required/>
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
                                                <input readonly=""   id="activity_delay" name="activity_delay" type="number" class="form-control" />
                                            </td>
                                            <td>
                                                <input id="activity_delay_remarks" name="activity_delay_remarks" type="text" class="form-control" required/>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                <div id="keyDate" class="row text-right mt-20 keyDate-hide">
                                    <div class="col-lg-12">
                                        <button type="button" id="addrowdcw2" class="btn btn-primary rounded border-secondary mr-10">
                                            <span class="fa fa-plus"></span>
                                            Add row
                                        </button>
                                    </div>
                                </div>


                                <div class="d-block mt-30">
                                    <h5 class="page-title br-0 font-weight-bold">Award Efficiency</h5>
                                </div>

                                <div class="table-responsive mt-30">
                                    <table class="table mb-0 table-bordered">
                                        <thead class="bg-primary">
                                            <tr>
                                                <th scope="col" class="w-20">Activity </th>
                                                <th scope="col" class="w-15">Receipt of Tender Document</th>
                                                <th scope="col" class="w-15">Start date of Bidder List approval</th>
                                                <th scope="col" class="w-15">CBE- Finish date Approval of Award Recommendation</th>
                                                <th scope="col" class="w-35">Remarks (If any)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">Date</th>
                                                <td><input type="date" class="form-control" placeholder="" name="receipt_date" id="receipt_date" required></td>
                                                <td><input type="date" class="form-control" placeholder="" name="bidder_approval_date" id="bidder_approval_date" onblur="calBidderAppDays();" required></td>
                                                <td><input type="date" class="form-control" placeholder="" name="award_recomm_date" id="award_recomm_date" onblur="calBidderAwdRecDays();" required></td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_date" id="remarks_date"></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No of Days (Cumulative)</th>
                                                <td><input readonly value="0" type="number" min="0" class="form-control" placeholder="" name="receipt_days" id="receipt_days"></td>
                                                <td><input readonly type="number" min="0" class="form-control" placeholder="" name="bidder_approval_days" id="bidder_approval_days"></td>
                                                <td><input readonly type="number" min="0" class="form-control" placeholder="" name="award_recomm_days" id="award_recomm_days"></td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_days" id="remarks_days"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Reasons for Delay*</h5>
                                    <div id="reasons_delay" class="form-control" name="reasons_delay">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <label class="page-title br-0 font-weight-bold mr-4">Front Idling*
                                        </label>
                                        <input class="form-check-input" type="radio" name="front_idling" id="front_idling1" value="yes" checked>
                                        <label class="form-check-label font-weight-bold" for="front_idling1">
                                            Yes
                                        </label>
                                        <input class="form-check-input" type="radio" name="front_idling" id="front_idling2" value="no">
                                        <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="front_idling2">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Current Status of Work at Site</h5>
                                    <div id="current_status_work" class="form-control" name="current_status_work"></div>
                                </div>

                                <!-- 
                                <div class="d-block mt-4 mb-4">
                                    <h5 class="page-title br-0 font-weight-bold">Select different levels of approvals</h5>
                                </div>
								<div class="row mt-4">
                                    <div class="col-md-4">
                                        <label>Select Level*</label>
                                        <select id="level" name="level" required class="form-control">
                                            <option value="">Select Level</option>

                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Approver Names</label>
                                        <select id="role" name="role" class="form-control">
                                            <option value="">Select Approver name</option>

                                        </select>
                                    </div>
                                </div> 
                                <div id="approvers_div" style="display:none;">
                                    <div class="d-block mt-4 mb-4">
                                        <h5 class="page-title br-0 font-weight-bold">Different levels of approvals</h5>
                                    </div>
                                    <div class="row" id="approvers_list_div">
                                    </div>
                                </div> -->
								 
                                <div class="row mt-4">
                                    <div class="col-md-3 mb-3">
                                        <lable>PCM</lable>
                                        <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                    </div>
                                    <div id="pm" class="col-md-3 mb-3" style="display: none">
                                        <lable>PM</lable>
                                        <select name="approver_id[]"   class="form-control" >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($PM as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>" ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($PM[0]->level)?0:$PM[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($PM[0]->role_id)?0:$PM[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="zonal" class="col-md-3 mb-3" style="display: none">
                                        <lable>Regional C&P</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($zonals as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($zonals[0]->level)?0:$zonals[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($zonals[0]->role_id)?0:$zonals[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="ch" class="col-md-3 mb-3" style="display: none">
                                        <lable>Construction Head</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($CH as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($CH[0]->level)?0:$CH[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($CH[0]->role_id)?0:$CH[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="project_director" class="col-md-3 mb-3" style="display: none">
                                        <lable>Project Director</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($PD as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($PD[0]->level)?0:$PD[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($PD[0]->role_id)?0:$PD[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="oh" class="col-md-3 mb-3" style="display: none">
                                        <lable>Operations Head</lable>
                                        <select name="approver_id[]"    class="form-control" >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($OH as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($OH[0]->level)?0:$OH[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($OH[0]->role_id)?0:$OH[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="rh" class="col-md-3 mb-3" style="display: none">
                                        <lable>Regional Head</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($RH as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($RH[0]->level)?0:$RH[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($RH[0]->role_id)?0:$RH[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="zh" class="col-md-3 mb-3" style="display: none">
                                        <lable>Zonal CEO</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled=""  selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($ZH as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($ZH[0]->level)?0:$ZH[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($ZH[0]->role_id)?0:$ZH[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="ho" class="col-md-3 mb-3" style="display: none">
                                        <lable>HO - C&P</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($HO as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($HO[0]->level)?0:$HO[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($HO[0]->role_id)?0:$HO[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div>
                                    <div id="coo" class="col-md-3 mb-3" style="display: none">
                                        <lable>Chief Operating Officer</lable>
                                        <select name="approver_id[]"   class="form-control" >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($COO as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"  ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($COO[0]->level)?0:$COO[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($COO[0]->role_id)?0:$COO[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div> 
                                    <div id="COO1" class="col-md-3 mb-3" style="display: none">
                                        <lable>Chief Operating Officer</lable>
                                        <select name="approver_id[]"   class="form-control"  >
                                            <option disabled="" selected="" value="">Select</option>
                                            <option value="0">Not Applicable</option>
                                            <?php foreach ($COO1 as $key => $record) { ?>
                                                <option value="<?php echo $record->buyer_id; ?>"   ><?php echo $record->buyer_name; ?></option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" value="<?php echo empty($COO1[0]->level)?0:$COO1[0]->level; ?>" class="approver_level" name="approver_level[]">
                                        <input type="hidden" value="<?php echo empty($COO1[0]->role_id)?0:$COO1[0]->role_id; ?>" class="approver_role" name="approver_role[]">
                                    </div> 
                                </div>
 								
								
                                <div class="row text-right mt-20">
                                    <input type="hidden" name="subject_hd" id="subject_hd">
                                    <input type="hidden" name="reasons_delay_hd" id="reasons_delay_hd">
                                    <input type="hidden" name="current_status_work_hd" id="current_status_work_hd">
                                    <div class="col-lg-12">
                                        <button type="submit" name="save" value="save" id="save" class="btn btn-primary border-secondary rounded mr-10">Save</button>
                                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary rounded border-secondary">
                                            <div class="spinner-border spinner-border-sm btn-hide" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <span class="btn-txt">Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
        var quill = new Quill('#subject', {
            theme: 'snow'
        });
        var quil2 = new Quill('#reasons_delay', {
            theme: 'snow'
        });
        var quil3 = new Quill('#current_status_work', {
            theme: 'snow'
        });

        $(document).ready (function () {  
        $("#nfaForm").validate();  
        }); 

        // function allowNumOnly(sender){
        //     sender.value = sender.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        // }

        // function changeToCr(sender){

        // let val = sender.value;

        // val1 = String(val);
        // if (val1){
        //     if(val1.includes("Cr")){
        //         sender.value = val;
        //     }else if(!val1.includes("Cr")){
        //         sender.value = sender.value + " Cr";
        //     }
        // }
        // }

        // function setInputFilter(textbox, inputFilter) {
        //     ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        //         textbox.addEventListener(event, function() {
        //         if (inputFilter(this.value)) {
        //             this.oldValue = this.value;
        //             this.oldSelectionStart = this.selectionStart;
        //             this.oldSelectionEnd = this.selectionEnd;
        //         } else if (this.hasOwnProperty("oldValue")) {
        //             this.value = this.oldValue;
        //             this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        //         }
        //         });
        //     });
        // }

        // function decimalStrict(){
        // let noOfClasses=document.getElementsByClassName("decimalStrictClass").length;
        // for(let k = 0;k<=noOfClasses;k++){
        // setInputFilter(document.getElementsByClassName("decimalStrictClass")[k], function(value) {
        //     return /^-?\d*[.,]?\d{0,2}$/.test(value); });
        // }
        // }

        function createRowColumn(row) {
            var column = document.createElement("td");
            row.appendChild(column);
            return column;
        }

        function addRow() {
            var newrow = document.createElement("tr");
            newrow.setAttribute("class", "text-center");
            var numericColumn = createRowColumn(newrow);
            var textColumn = createRowColumn(newrow);
            var textColumn1 = createRowColumn(newrow);
            var textColumn2 = createRowColumn(newrow);
            var textColumn3 = createRowColumn(newrow);
            var textColumn4 = createRowColumn(newrow);
            var textColumn5 = createRowColumn(newrow);
            var removeColumn = createRowColumn(newrow);

            var textbox = document.createElement("input");
            textbox.setAttribute("type", "text");
            textbox.setAttribute("required", "");
            textbox.setAttribute("class", "form-control");
            textbox.setAttribute("name", "name_contractor[]");
            textColumn.appendChild(textbox);

            var textbox1 = document.createElement("input");
            textbox1.setAttribute("type", "text");
            textbox1.setAttribute("min", "0");
            textbox1.setAttribute("required", "");
            textbox1.setAttribute("oninput", "allowNumOnly(this);decimalStrict()");
            textbox1.setAttribute("onblur", "changeToCr(this)");
            textbox1.setAttribute("class", "form-control decimalStrictClass onMouseOutClass");
            textbox1.setAttribute("name", "avg_turn_over[]");
            textColumn1.appendChild(textbox1);

            var textbox2 = document.createElement("input");
            textbox2.setAttribute("type", "text");
            textbox2.setAttribute("min", "0");
            textbox2.setAttribute("required", "");
            textbox2.setAttribute("oninput", "allowNumOnly(this);decimalStrict()");
            textbox2.setAttribute("onblur", "changeToCr(this)");
            textbox2.setAttribute("class", "form-control decimalStrictClass onMouseOutClass");
            textbox2.setAttribute("name", "bid_capacity[]");
            textColumn2.appendChild(textbox2);
 
			

			// var array1 = ["PQ","FB"];
			// //Create and append select list
			// var textbox31 = document.createElement("select");
			// textbox31.id = "score_type";
			// textbox31.class = "form-control";
			// textbox31.name = "score_type[]";
			// textbox31.setAttribute("class", "form-control");
			// textColumn3.appendChild(textbox31);
 
			// //Create and append the options
			// for (var i = 0; i < array1.length; i++) {
				// var option = document.createElement("option");
				// option.value = array1[i];
				// option.text = array1[i];
				// textbox31.appendChild(option);
			// }
            // textColumn3.appendChild(textbox31);
			
			var array1 = ["PQ","FB"];
			//Create and append select list
			var textbox31 = document.createElement("select");
			textbox31.id = "score_type";
			textbox31.class = "form-control";
			textbox31.onchange = "score_color(this)"; 
			textbox31.name = "score_type[]";
			textbox31.setAttribute("class", "form-control");
			textbox31.setAttribute("onchange", "score_color(this)");
			textColumn3.appendChild(textbox31);
 
			//Create and append the options
			for (var i = 0; i < array1.length; i++) {
				var option = document.createElement("option");
				option.value = array1[i];
				option.text = array1[i];
				textbox31.appendChild(option);
			}
            textColumn3.appendChild(textbox31);
			
			var textbox3 = document.createElement("input");
            textbox3.setAttribute("type", "number");
            textbox3.setAttribute("min", "0");
            textbox3.setAttribute("max", "100");
            textbox3.setAttribute("step", "0.01");
            textbox3.setAttribute("required", "");
            textbox3.setAttribute("oninput", "(validity.valid)||(value='');");
            textbox3.setAttribute("class", "form-control mt-3");
            textbox3.setAttribute("name", "score[]");
            textbox3.setAttribute("id", "score");
            textColumn3.appendChild(textbox3);

            // var textbox4 = document.createElement("select");
            // // create option using DOM
            // const newOption = document.createElement('option');
            // const optionText = document.createTextNode("Select");
            // // set option text
            // newOption.appendChild(optionText);
            // textbox4.appendChild(newOption);
            // // and option value
            // // newOption.setAttribute('Small', 'Small');
            // // textbox4.setAttribute("type", "text");
            // textbox4.setAttribute("class", "form-control");
            // textbox4.setAttribute("name", "bid_category[]");
            // textColumn4.appendChild(textbox4);
			
 
			//Create array of options to be added
			var array = ["Select","Very Small","Small","Medium","Large","Very Large"];

			//Create and append select list
			var textbox4 = document.createElement("select");
			textbox4.id = "bid_category";
			textbox4.class = "form-control";
			textbox4.name = "bid_category[]";
			textbox4.setAttribute("class", "form-control");
			textbox4.setAttribute("required", "");
			textColumn4.appendChild(textbox4);
 
			//Create and append the options
			for (var i = 0; i < array.length; i++) {
				var option = document.createElement("option");
				option.value = array[i];
				option.text = array[i];
				textbox4.appendChild(option);
			}
 
            var textbox5 = document.createElement("input");
            textbox5.setAttribute("type", "text");
            textbox5.setAttribute("class", "form-control");
            textbox5.setAttribute("required", "");
            textbox5.setAttribute("name", "ongoing_complete_project[]");
            textColumn5.appendChild(textbox5);

            var remove = document.createElement("input");
            remove.setAttribute("type", "button");
            remove.setAttribute("value", "Delete");
            remove.setAttribute("class", "ibtnDelDcw2 btn btn-sm btn-danger rounded");
            remove.setAttribute("onClick", "deleteRow(this)");
            removeColumn.appendChild(remove);

            var table = document.getElementById('t1');
            var tbody = table.querySelector('tbody') || table;
            var count = tbody.getElementsByTagName('tr').length;
            numericColumn.innerText = count.toLocaleString();

            tbody.appendChild(newrow);

            $('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
            for(let i = 0;i<ele.length;i++){
                let val = event.target.value;
                let val1 = String(event.target.value);
                if (val1) {
                    if (val1.includes("Cr")) {
                        event.target.value = val;
                    } else if (!val1.includes("Cr")) {
                        event.target.value = event.target.value + " Cr";
                    }
                }
            }

	        })    
        }

        function deleteRow(button) {
            var row = button.parentNode.parentNode;
            var tbody = row.parentNode;
            tbody.removeChild(row);

            // refactoring numbering
            var rows = tbody.getElementsByTagName("tr");
            for (var i = 1; i < rows.length; i++) {
                var currentRow = rows[i];
                currentRow.childNodes[0].innerText = i.toLocaleString();
            }
        }

        //Get levels of approvers
        function levels_approvers(sender) { 
            var val = document.getElementById("budgetWithEsc").value;
			// alert(value);
            // if (val >= 50000000) {
            if (val >= 5) {
                document.getElementById("s_milestone_table2").classList.remove("keyDate-hide");
                document.getElementById("keyDate1").classList.remove("keyDate-hide");
                document.getElementById("keyDate").classList.remove("keyDate-hide");
            } else {
                document.getElementById("s_milestone_table2").classList.add("keyDate-hide");
                document.getElementById("keyDate1").classList.add("keyDate-hide");
                document.getElementById("keyDate").classList.add("keyDate-hide");
            }
			
			 if (val > 5) {
				$('#zonal').css('display', 'block');
				$('#zonal').find("select").attr('required', 'required');
				
				$('#pm').css('display', 'block');
				$('#pm').find("select").attr('required', 'required');

				$('#ch').css('display', 'block');
				$('#ch').find("select").attr('required', 'required');
				
				$('#project_director').css('display', 'block');
				$('#project_director').find("select").attr('required', 'required');
				
				$('#oh').css('display', 'block');
				$('#oh').find("select").attr('required', 'required');
				
				$('#rh').css('display', 'block');
				$('#rh').find("select").attr('required', 'required');
				
				$('#zh').css('display', 'block');
				$('#zh').find("select").attr('required', 'required');
				
				$('#coo').css('display', 'block');
				$('#coo').find("select").attr('required', 'required'); 
				
				$('#ho').css('display', 'block');
				$('#ho').find("select").attr('required', 'required');
				
			} else if (val >= 3 && val <= 5) {
				$('#zonal').css('display', 'block');
				$('#zonal').find("select").attr('required', 'required');
				
				$('#pm').css('display', 'block');
				$('#pm').find("select").attr('required', 'required');
				
				$('#ch').css('display', 'block');
				$('#ch').find("select").attr('required', 'required');
				
				$('#oh').css('display', 'block');
				$('#oh').find("select").attr('required', 'required');
				
				$('#project_director').css('display', 'block');
				$('#project_director').find("select").attr('required', 'required');
				
				$('#rh').css('display', 'block');
				$('#rh').find("select").attr('required', 'required');
				
				$('#zh').css('display', 'none');
				// $('#zh').find("select").attr('required', 'required');
				
				$('#coo').css('display', 'none');
				// $('#coo').find("select").attr('required', 'required');
				
				$('#ho').css('display', 'none');
				// $('#ho').find("select").attr('required', 'required');
			} else if (val >= 0.5 && val < 3) {
				$('#zonal').css('display', 'block');
				$('#zonal').find("select").attr('required', 'required');
				
				$('#pm').css('display', 'block');
				$('#pm').find("select").attr('required', 'required');
				
				$('#ch').css('display', 'block');
				$('#ch').find("select").attr('required', 'required');
				
				$('#oh').css('display', 'block');
				$('#oh').find("select").attr('required', 'required');
				
				$('#project_director').css('display', 'block');
				$('#project_director').find("select").attr('required', 'required');
			
				$('#rh').css('display', 'none');
				// $('#rh').find("select").attr('required', 'required');
				
				$('#zh').css('display', 'none');
				// $('#zh').find("select").attr('required', 'required');
				
				$('#coo').css('display', 'none');
				// $('#coo').find("select").attr('required', 'required');
				
				$('#ho').css('display', 'none');
				// $('#ho').find("select").attr('required', 'required');
				
				$('#key-dates').css('display', 'none');
			} else {
				$('#zonal').css('display', 'block');
				$('#zonal').find("select").attr('required', 'required');
				
				$('#pm').css('display', 'attr');
				$('#pm').find("select").css('required', 'required');
				 
				$('#ch').css('display', 'block');
				$('#ch').find("select").attr('required', 'required');
				
				$('#project_director').css('display', 'block');
				$('#project_director').find("select").attr('required', 'required');
				
				$('#oh').css('display', 'none');
				// $('#oh').find("select").attr('required', 'required');
				
				$('#rh').css('display', 'none');
				// $('#rh').find("select").attr('required', 'required');
				
				$('#zh').css('display', 'none');
				// $('#zh').find("select").attr('required', 'required');
				
				$('#coo').css('display', 'none');
				// $('#coo').find("select").attr('required', 'required');
				
				$('#ho').css('display', 'none');
				// $('#ho').find("select").attr('required', 'required');
			}
    
            val1 = String(val);
            if (val1){
                if(val1.includes("Cr")){
                    sender.value = val;
                }else if(!val1.includes("Cr")){
                    sender.value = sender.value + " Cr";
                }
            }

            // var package_value;


            // var package_value = $("#budgetWithEsc").val();


            // // Get max level of Approvers


            // $.ajax({
                // url: "<?php echo base_url('nfa/BidderListContractor/getMaxLevelApprovers'); ?>",
                // type: 'post',
                // data: {
                    // package_value: package_value
                // },
                // //dataType: 'JSON',
                // success: function(response) {

                    // var obj = jQuery.parseJSON(response);
                    // data1 = obj.data1;
                    // data2 = obj.data2;
                    // //alert("obje"+obj.data1);
                    // $('#level').html(data1);
                    // $('#approvers_list_div').html(data2);

                // }
            // });
        }

        //Level role change 
        // $('#level').change(function() {
            // //alert("test"+$('#original_contract_value').val());
            // level = this.value;

            // package_value = $('#post_basic_rate_package1').val();

            // $.post("<?php echo base_url('nfa/Award_contract/getRoleUsers'); ?>", {
                    // role: level,
                    // //contract_value:$('#original_contract_value').val()
                // },
                // function(data, status) {
                    // //alert(data);

                    // $('#role').html(data);

                // });
        // });

        // $('#role').change(function() {
            // //alert("test"+$('#role').val());

            // user_name = $("#role option:selected").text();
            // user_id = $('#role').val();

            // level_val = $("#level")[0].selectedIndex;

            // if (user_id != '') {
                // $('#approvers_div').css('display', 'block');
                // $('#level' + level_val + '_div').css('display', 'block');
            // }
            // level_text = $("#level option:selected").text();
            // //alert(level_val);
            // //$('#level'+level_val+'_id').html(level_text);
            // $('#level' + level_val + '_id').html("Level " + level_val);

            // //$('#level6_approver').val("test");
            // $('#level' + level_val + '_approver').val(user_name);
            // $('#level' + level_val + '_approver_id').val(user_id);
            // $('#level' + level_val + '_approver').prop('readonly', true);

        // });

        //Calculate Sum for the first package
        function calculateSum1() {
            $.ajax({
                url: "<?php echo base_url('nfa/Award_contract/getMaxLevelApprovers'); ?>",
                type: 'post',
                data: {
                    package_value: package_value,
                    l1_vendor1: l1_vendor1
                },
                //dataType: 'JSON',
                success: function(response) {
                    //alert(response);
                    //var str = '{"val1": 1, "val2": 2, "val3": 3}';
                    //var obj = jQuery.parseJSON( str );
                    var obj = jQuery.parseJSON(response);
                    data1 = obj.data1;
                    data2 = obj.data2;
                    //alert("obje"+obj.data1);
                    $('#level').html(data1);
                    $('#approvers_list_div').html(data2);

                    //var jsonResult = $.parseJSON
                    /* var data1 = response.data1;
                    alert(data1); */
                    //var data2 = jsonResult.data2;
                    //alert(data2); 
                    //var str = jsonResult.string;
                }
            });
        }
        //Calculate Days
        function calculateDays() {
            var activity_planned_date = $("#activity_planned_date").val();
            var activity_cbe_date = $("#activity_cbe_date").val();
            // end - start returns difference in milliseconds 
            /* var diff = new Date(activity_cbe_date - activity_actual_date);
            // get days
            var days = diff/1000/60/60/24; */
            days = daysdifference(activity_planned_date, activity_cbe_date);
            //alert(days);
            $("#activity_delay").val(days);
            if (days > 0)
                $("#front_idling1").prop("checked", true);
            else
                $("#front_idling2").prop("checked", true);
        }

        function daysdifference(firstDate, secondDate) {
            var startDay = new Date(firstDate);
            var endDay = new Date(secondDate);
            // Determine the time difference between two dates     
            var millisBetween = endDay.getTime() - startDay.getTime();

            //var millisBetween = startDay.getTime() - endDay.getTime(); 

            // Determine the number of days between two dates  
            var days = millisBetween / (1000 * 3600 * 24);
            //alert("first"+days);
            // Show the final number of days between dates     
            //return Math.round(Math.abs(days)); 
            return Math.round(days);
        }

        $('#save, #submit').on('click', () => {
            // Get HTML content
            var subject_html = quill.root.innerHTML;
            var reasons_delay_html = quil2.root.innerHTML;
            var current_status_work_html = quil3.root.innerHTML;
            // Copy HTML content in hidden form
            $('#subject_hd').val(subject_html);
            $('#reasons_delay_hd').val(reasons_delay_html);
            $('#current_status_work_hd').val(current_status_work_html);

            /* $(".spinner-border").removeClass("btn-hide");
            // $("#submit").attr("disabled", true);
            $(".btn-txt").text("Submitting..."); */

        })

        function loader() {

            $(".spinner-border").removeClass("btn-hide");
            // $("#submit").attr("disabled", true);
            $(".btn-txt").text("Submitting...");
        }

        var counterdcw = 2;
        $("#addrowdcw").on("click", function() {
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
        $("#s_milestone_table").on("click", ".ibtnDelDcw", function(event) {
            $('#sites-table-tbody tr').remove();
            var rowCount = $('#s_milestone_table tr').length;
            $(this).closest("tr").remove();
            counterdcw -= 1
        });
        var counterdcw2 = 2;
        $("#addrowdcw2").on("click", function() {
            $('#sites-table-tbody tr').remove();
            var rowCount = $('#s_milestone_table2 tr').length;
            //alert(rowCount);
            var newRow = $("<tr>");
            var cols = "";
            cols += '<td><input required type="text" class="form-control site-value" name="activity_label[]"/></td>';
            cols += '<td><input required type="date" class="form-control site-value" name="activity_dates[]"/></td>';
            cols += '<td><input type="text" class="form-control site-value-9"  name="activity_remarks[]"/></td>';
            cols += '<td><input type="button" class="ibtnDelDcw2 btn btn-sm btn-danger rounded"  value="Delete"></td>';
            newRow.append(cols);
            $("#s_milestone_table2").append(newRow);
            counterdcw2++;
        });
        $("#s_milestone_table2").on("click", ".ibtnDelDcw2", function(event) {
            $('#sites-table-tbody tr').remove();
            var rowCount = $('#s_milestone_table tr').length;
            $(this).closest("tr").remove();
            counterdcw2 -= 1
        });

        $('#activity_first_date').on('change keyup paste', function() {
            var first = this.value;
            var second = $('#activity_second_date').val();
            $('#activity_second_date').attr('min', first);
            if (second && first) {
                const date1 = new Date(first);
                const date2 = new Date(second);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                $('#activity_difference').val(diffDays);
            }
        });

        $('#activity_second_date').on('change keyup paste', function() {
            var second = this.value;
            var first = $('#activity_first_date').val();
            $('#activity_first_date').attr('max', second);
            if (second && first) {
                const date1 = new Date(first);
                const date2 = new Date(second);
                const diffTime = Math.abs(date2 - date1);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                $('#activity_difference').val(diffDays);
            }
        });
		
		
		
		
        //calBidderAppDays Days
        function calBidderAppDays() {
			 
            var receipt_date = $("#receipt_date").val();
            var bidder_approval_date = $("#bidder_approval_date").val();
			
            days = daysdifference(receipt_date, bidder_approval_date);
            //alert(days);
            $("#bidder_approval_days").val(days);
        }
		
        //calBidderAwdRecDays Days
        function calBidderAwdRecDays() {
            var bidder_approval_date = $("#bidder_approval_date").val();
            var award_recomm_date = $("#award_recomm_date").val();
			
            days = daysdifference(bidder_approval_date, award_recomm_date);
            //alert(days);
            $("#award_recomm_days").val(days);
        }
		
		
		
			
		
	//schange score color PQ/Feedback
	function score_color(th)
	{ 
		score_type = $(th).val();
		if(score_type=="PQ")
		{ 
			$(th).parent("td").find("#score").removeClass('background-feedback');
			$(th).parent("td").find("#score").addClass('background-pq');
		}
		else if(score_type=="FB")
		{
			$(th).parent("td").find("#score").removeClass('background-pq');
			$(th).parent("td").find("#score").addClass('background-feedback');
		}
		
	}
		
		 
		
    </script>
    <script src="../../assets/js/summernote-bs4.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <!-- <script src="../../assets/js/bootstrap.bundle.min.js"></script> -->
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>vendor_plugins/nfa/validate.min.js"></script>
</body>

</html>
</script>
</body>

</html>