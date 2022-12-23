<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<link href="https://cdn.quilljs.com/1.1.6/quill.snow.css" rel="stylesheet">

<script src="https://cdn.quilljs.com/1.1.6/quill.js"></script>



<body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">
    <style>
        .btn-hide {
            display: none;
        }

        .date-hide {
            display: none;
        }

        .idling-hide {
            display: none;
        }


        .sec1{
            display: none;
        }
        .sec2{
            display: none;
        }

        [data-tip] {
            position: relative;
        }

        [data-tip]:before {
            content: '';
            /* hides the tooltip when not hovered */
            display: none;
            content: '';
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-bottom: 5px solid #1a1a1a;
            position: absolute;
            top: 30px;
            left: 35px;
            z-index: 8;
            font-size: 0;
            line-height: 0;
            width: 0;
            height: 0;
        }

        [data-tip]:after {
            display: none;
            content: attr(data-tip);
            position: absolute;
            top: 35px;
            left: 0px;
            padding: 5px 8px;
            background: #1a1a1a;
            color: #fff;
            z-index: 9;
            font-size: 0.8em;
            height: 30px;
            line-height: 18px;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            white-space: nowrap;
            word-wrap: normal;
        }

        [data-tip]:hover:before,
        [data-tip]:hover:after {
            display: block;
        }

        .synopsis-header {
            text-align: left;
        }

        .form-control::placeholder {
            color: #898888;
            opacity: 0.9;
        }

        .form-control:-ms-input-placeholder {
            color: #898888;
        }

        .form-control::-ms-input-placeholder {
            color: #898888;
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
        .total-hide{
            display: none;
        }

    </style>



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

                    <?php $this->load->view('nfa/common_iom_header.php'); ?>

                    <div class="box">

                        <div class="box-body">
                            <form id="nfaForm" method="POST" action="<?php echo base_url('nfa/Award_contract/actionSave'); ?>" enctype="multipart/form-data">
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class='form-group'>
                                            <label class="font-weight-bold">Subject</label>
                                            <div id="subject" class="form-control" name="subject"></div>

                                        </div>
                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-lg-12">
                                        <div class='form-group'>
                                            <label class="font-weight-bold">Scope of Work</label>
                                            <input type='text' class="form-control" placeholder="" name="scope_of_work" id="scope_of_work">
                                        </div>
                                    </div>

                                </div>


                                <div class="table-responsive mt-4">
                                    <table id="tables" class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th class="synopsis-header" colspan="5"><label>Award Synopsis</label>
                                                    <input type='text' class="form-control" placeholder="" name="synopsis_label" id="synopsis_label" required>
                                                    <label class="mt-4">How many Contractors Recommended?</label>
                                                    <select id="package_count" onchange="addPackage(this)" name="package_count" required="" style="width:25%;" class="form-control">
                                                        <option value="0">1</option>
                                                        <option value="1">2</option>
                                                        <option value="2">3</option>
                                                    </select>
                                                </th>
                                            </tr>
                                        </thead>
                                    </table>
                                    <table id="dyntable" class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th>Description</th>
                                                <th scope="col">
                                                    <label>Package name</label>
                                                    <input type='text' class="form-control" placeholder="" name="package_label[]" id="package_label1" required onblur="package_bidders(this);">
                                                </th>
                                                <th  id="total-h" class="total-hide" style="width:20% ;">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <tr class='text-center'>

                                                <td>Budget incl Escalation</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_budget_esc','total_budget_esc');setGpl_budget();" class="form-control decimalStrictClass onMouseOutClass" name="package_budget_esc[]" id="package_budget_esc1" autocomplete="off" required>
                                                </td>

                                                <td id="total-td1" class="total-hide"><input type='text' class="form-control" name="total_budget_esc" id="total_budget_esc" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Negotiated Value (Excl. Tax) – Pre Final Round</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_negot_value','total_negot_value');" class="form-control decimalStrictClass onMouseOutClass" name="package_negot_value[]" id="package_negot_value1" required>
                                                </td>

                                                <td id="total-td2" class="total-hide"><input type='text' class="form-control" name="total_negot_value" id="total_negot_value" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Finalized Proposed Award Value (Excl Tax)</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass onMouseOutClass" name="finalized_award_value_package[]" id="finalized_award_value_package1" required onblur="finalized_val(this);finalized_total();showBidders_finalized();calculateSum1();">
                                                </td>

                                                <td id="total-td3" class="total-hide"><input type='text' class="form-control" name="total_finalized_award_value" id="total_finalized_award_value" value="" readonly></td>
                                            </tr>
                                            
                                            <tr class='text-center'>
                                                <td>Expected Savings w.r.t Budget incl.escalation:</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="packageSynopsis_total('expected_savings_package','total_expected_savings');getExpectedSavings();calculateSum1();" class="form-control decimalStrictClass" name="expected_savings_package[]" id="expected_savings_package1" readonly>
                                                </td>

                                                <td id="total-td4" class="total-hide"><input type='text' class="form-control" name="total_expected_savings" id="total_expected_savings" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Recommended Vendors</td>
                                                <td>
                                                    <input type='text' class="form-control" name="recomm_vendor_package[]" id="recomm_vendor_package1" required  onblur="setRecommended_vendorName();">
                                                </td>

                                                <td id="total-td5" class="total-hide"></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Basis of award</td>
                                                <td>
                                                    <input type='text' class="form-control" name="basis_award_package[]" id="basis_award_package1" readonly>
                                                </td>

                                                <td id="total-td6" class="total-hide"></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Deviation from Approved Contracting Strategy</td>
                                                <td>
                                                    <input type='text' class="form-control" name="deviation_approved_package[]" id="deviation_approved_package1" required>
                                                </td>

                                                <td id="total-td7" class="total-hide"></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>
                                                    <label>Last Awarded Benchmark with Date</label>
                                                    <div data-tip="Please enter project name and date of award">
                                                        <input type='text' class="form-control" name="benchmark_label" id="benchmark_label" placeholder="Please enter project name and date of award" autocomplete="off" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('awarded_benchmark_package','total_awarded_benchmark');" class="form-control decimalStrictClass onMouseOutClass" name="awarded_benchmark_package[]" id="awarded_benchmark_package1" required>
                                                </td>

                                                <td id="total-td8" class="total-hide"><input type='text' class="form-control" name="total_awarded_benchmark" id="total_awarded_benchmark" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Is there any basic rate item in tender</td>
                                                <td>
                                                    <input class="form-check-input" type="radio" name="group_1" id="packageRadiosYes1" value="yes">
                                                    <label class="form-check-label font-weight-bold" for="packageRadiosYes1">
                                                        Yes
                                                    </label>
                                                    <input class="form-check-input" type="radio" name="group_1" id="packageRadiosNo1" value="no" checked>
                                                    <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="packageRadiosNo1">
                                                        No
                                                    </label>

                                                </td>

                                                <td id="total-td9" class="total-hide"></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Total Amount of Basic Rate Items in Tender</td>
                                                <td>
                                                    <input id="basic_rate1" name="total_basic_rate_package[]" style="display:none ;" type='text' oninput="allowNumOnly(this);decimalStrictThree()"  onblur="changeToCr(this);packageSynopsis_total('basic_rate','total_basic_rate');" class="form-control decimalStrictThreeClass onMouseOutClass">
                                                </td>

                                                <td id="total-td10" class="total-hide"><input type='text' class="form-control" name="total_basic_rate" id="total_basic_rate" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Anticipated Basic Rate adjustment (If the current prices prevail throughout the Contract Period):</td>
                                                <td>
                                                    <input id="anticipated_rate1" oninput="decimalStrict(this)" name="anticipate_basic_rate_package[]" style="display:none ;" type='text' class="form-control decimalStrictClass onMouseOutClass" onblur="changeToCr(this);packageSynopsis_total('anticipated_rate','total_anticipated_rate');calculateSum1();" required>
                                                </td>

                                                <td id="total-td11" class="total-hide"><input type='text' class="form-control" name="total_anticipated_rate" id="total_anticipated_rate" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>Proposed Award Value (Excl Tax)- Adjusted Awarded Value(Post Basic Rate Adjustment): <span class=" font-weight-bold">SAP WO VALUE TO BE CREATED</span></td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="post_basic_rate_package[]" id="post_basic_rate_package1" readonly>
                                                </td>

                                                <td id="total-td12" class="total-hide"><input type='text' class="form-control" name="total_post_basic_rate" id="total_post_basic_rate" value="" readonly></td>
                                            </tr>

                                            <tr class='text-center'>
                                                <td>Base Rate Consideration Month in Award</td>
                                                <td>
                                                    <input type='date' class="form-control" name="basic_rate_month_package[]" id="basic_rate_month_package1" required>
                                                </td>

                                                <td id="total-td13" class="total-hide"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Final Bid Scenario</h5>
                                </div>

                                <div class="mt-4">
                                    <h5>How many Bidders participated?</h5>
                                    <select id="bidder_count" name="bidder_count" required="" style="width:25%;" class="form-control">
                                        <option value="0">1</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                        <option value="4">5</option>
                                        <option value="5">6</option>
                                        <option value="6">7</option>
                                        <option value="7">8</option>
                                        <option value="8">9</option>
                                        <option value="9">10</option>
                                    </select>
                                </div>

                                <div class="table-responsive mt-4">

                                    <table id='mainTable' class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center' id="bidHead_row">
                                                <th>Description</th>
                                                <th scope="col" style="width:15% ;">GPL Budget (with escalation)</th>
                                                <th scope="col" style="width: 120px !important;"><input type='text' class="form-control" name="final_bidder_name[]" placeholder="Enter Bidder Name" id="final_bidder_name1" required></th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList" style="width: 40% !important;">
                                            <tr class='text-center' id="pqFb_row">
                                                <td>PQ/ Feedback Score </td>
                                                <td>
                                                    <svg height="100px" style="padding:30% ;" viewBox="0 0 512 512">
                                                        <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z" />
                                                    </svg>
                                                </td>
                                                <td>
                                                    <select id="score_type1" name="score_type[]" required="" class="form-control" style="width: 120px !important;" onchange="score_color();">
                                                        <option value="">Select</option>
                                                        <option value="PQ">PQ</option>
                                                        <option value="FB">FB</option>
                                                    </select>
                                                    <input type='number' class="form-control mt-3" style="width: 120px !important;" name="score[]" id="score1" min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" required>
                                                </td>
                                            </tr>
                                            <tr id="package_row1" class='text-center'>
                                            </tr>
                                            <tr id="package_row2" class='text-center'></tr>
                                            <tr id="package_row3" class='text-center'></tr>
                                            <tr class='text-center' id="totAmt_row">
                                                <td class="page-title font-weight-bold">Total Amount</td>
                                                <td><input type='text' onblur="getBidders_total();calculateSum1();" class="form-control" name="total_amt_gpl" id="total_amt_gpl" readonly></td>
                                                <td><input type='text' onblur="getBidders_total();calculateSum1();" class="form-control" name="total_amt_bidder[]" id="total_amt_bidder1" readonly></td>
                                            </tr>
                                            <tr class='text-center' id="bidPos_row">
                                                <td colspan="2">Bid position</td>
                                                <td><input type='text' class="form-control" name="bid_position[]" id="bid_position1" value="" readonly></td>
                                            </tr>
                                            <tr class='text-center' id="diffCrs_row">
                                                <td colspan="2">Difference wrt Budget (in crs)</td>
                                                <td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="diff_budget_crs[]" id="diff_budget_crs1" readonly></td>
                                            </tr>
                                            <tr class='text-center' id="diffPercent_row">
                                                <td colspan="2">Difference wrt Budget (in %age)</td>
                                                <td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" name="diff_budget_percentage[]" id="diff_budget_percentage1" readonly></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                                <div class="d-block mt-4">
                                    <h5 id="date1" class="page-title br-0 font-weight-bold date-hide">Contractor Appointment Dates</h5>
                                </div>

                                <div id="appointment-date" class="table-responsive date-hide">

                                    <table class="table table-bordered mb-0 keyDate-hide">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th>Sr No.</th>
                                                <th style="width:60%" colspan="2">
                                                    <label>Contract Package</label>
                                                    <input type='text' class="form-control" name="contract_package_works_label" id="contract_package_works_label">
                                                </th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <tr class='text-center'>
                                                <td></td>
                                                <td>
                                                    <label>Milestone on which contractor should be appointed</label>
                                                    <div data-tip="Please mention the milestone as per applicable PI">
                                                        <input type='text' class="form-control" name="milestone_label" id="milestone_label" autocomplete="off" required>
                                                    </div>
                                                </td>
                                                <td>
                                                    <select id="contract_package_works_value" name="contract_package_works_value" class="form-control" required>
                                                        <option value="">Select</option>
                                                        <option value="pi1">PI1</option>
                                                        <option value="pi2">PI2</option>
                                                        <option value="pi3">PI3</option>
                                                        <option value="pi4">PI4</option>
                                                        <option value="pi5">PI5</option>
                                                        <option value="not applicable">Not applicable</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="contract_package_works_remarks" id="contract_package_works_remarks"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tbody>
                                        <tr class='text-center'>
                                            <td class="bg-primary"></td>
                                            <td class="page-title font-weight-bold bg-primary">Activity</td>
                                            <td class="page-title font-weight-bold bg-primary">Dates</td>
                                            <td class="bg-primary"></td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>A</td>
                                            <td>Planned date of Contractor appointment As per PI Logic</td>
                                            <td>
                                                <input type='date' class="form-control" style="width: 100% " name="activity_planned_date" id="activity_planned_date" onblur="calculateDays();" required>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_planned_remarks" id="activity_planned_remarks"></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>B</td>
                                            <td>Actual date as per current site progress</td>
                                            <td>
                                                <input type='date' class="form-control" style="width: 100%;" name="activity_actual_date" id="activity_actual_date required" required>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_actual_remarks" id="activity_actual_remarks required"></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>C</td>
                                            <td>CBE of contractor Appointment</td>
                                            <td>
                                                <input type='date' class="form-control" style="width: 100%;" name="activity_cbe_date" id="activity_cbe_date" onblur="calculateDays();" required>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_cbe_remarks" id="activity_cbe_remarks"></textarea>
                                            </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>D</td>
                                            <td>Delay in appointment(C-A)</td>
                                            <td>
                                                <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="activity_delay" id="activity_delay" readonly>
                                            </td>
                                            <td>
                                                <textarea class="form-control" rows="2" name="activity_delay_remarks" id="activity_delay_remarks"></textarea>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <label class="page-title br-0 font-weight-bold mr-4">Front Idling
                                        </label>
                                        <input class="form-check-input" type="radio" name="front_idling" id="front_idling1" value="yes" onclick="idlingCheck()">
                                        <label class="form-check-label font-weight-bold" for="front_idling1">
                                            Yes
                                        </label>
                                        <input class="form-check-input" type="radio" name="front_idling" id="front_idling2" value="no" onclick="idlingUnCheck()" checked>
                                        <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="front_idling2">
                                            No
                                        </label>
                                    </div>
                                </div>

                                <div id="delayReason" class="idling-hide mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Reasons for Delay</h5>
                                    <div id="reasons_delay" class="form-control" name="reasons_delay"></div>
                                </div>

                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Award Efficiency</h5>
                                </div>

                                <div class="table-responsive mt-4">

                                    <table class="table table-bordered mb-0">
                                        <thead class="bg-primary">
                                            <tr class='text-center'>
                                                <th style="width:15%">Actitivity</th>
                                                <th style="width:20%">Receipt of Tender Document</th>
                                                <th style="width:20%">Start date of Bidder List approval</th>
                                                <th style="width:20%">Finish date Approval of Award Recommendation</th>
                                                <th style="width:25%">Remarks (If any)</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <tr class='text-center'>
                                                <td>Date</td>
                                                <td>
                                                    <input type='date' class="form-control" name="receipt_date" id="receipt_date" required>
                                                </td>
                                                <td>
                                                    <input type='date' class="form-control" name="bidder_approval_date" id="bidder_approval_date" required>
                                                </td>
                                                <td>
                                                    <input type='date' class="form-control" name="award_recomm_date" id="award_recomm_date" min="<?php echo date("Y-m-d" , strtotime("+1 day") ) ?>" required>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_date" id="remarks_date"></textarea>
                                                </td>
                                            </tr>
                                            <tr class='text-center'>
                                                <td>No of Days</td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="receipt_days" id="receipt_days" value="NA" readonly>
                                                </td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="bidder_approval_days" id="bidder_approval_days" readonly>
                                                </td>
                                                <td>
                                                    <input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" name="award_recomm_days" id="award_recomm_days" readonly>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_days" id="remarks_days"></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Current Status of Work at Site</h5>
                                    <div id="current_status_work" class="form-control" name="current_status_work">
                                    </div>

                                    <div class="d-block mt-4">
                                        <h5 class="page-title br-0 font-weight-bold">Major Terms and Conditions</h5>
                                    </div>

                                    <div class="table-responsive mt-4">
                                        <table class="table table-bordered mb-0" id="t1">
                                            <thead class="bg-primary">
                                                <tr class='text-center'>
                                                    <th style="width:10%">Sl. No.</th>
                                                    <th style="width:25%">Terms</th>
                                                    <th style="width:55%"><label for="term_label">Description</label>
                                                    <div style="display:flex ;">
                                                    <div style="width: 100%;" class="mr-2"><label id="pckLabel1">Package 1</label><input type='text'class="form-control" placeholder="Package 1" name="term_label[]" id="term_label1" required></div><div style="width: 100%;" class="sec1 mr-2"><label id="pckLabel2">Package 2</label><input type='text' class="form-control mr-2" placeholder="Package 2" name="term_label[]" id="term_labe2" required></div><div style="width: 100%;" class="sec2 mr-2"><label id="pckLabel3">Package 3</label><input type='text' class="form-control mr-2" placeholder="Package 3" name="term_label[]" id="term_label3" required></div></div></th>
                                                    <th style="width:10%;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="">
                                                <tr class='text-center'>
                                                    <td>1</td>
                                                    <td><input type='text' class="form-control" name="term[]" placeholder="" required></td>
                                                    <td><div style="display:flex ;"><textarea name="term_label_value[1][]"  class="form-control mr-2" rows="2"  id="term_label_value1" required></textarea><textarea name="term_label_value[1][]"  class="form-control sec1 mr-2" rows="2"  id="term_label_value2" ></textarea><textarea name="term_label_value[1][]"  class="form-control sec2 mr-2" rows="2"  id="term_label_value3" ></textarea></div></td>
                                                    <td></td>
                                                </tr>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row text-right mt-20">
                                        <div class="col-lg-12">
                                            <button type="button" onclick="addRow()" class="btn btn-primary border-secondary rounded mr-10">
                                                <span class="fa fa-plus"></span>
                                                Add row
                                            </button>
                                        </div>
                                    </div>


                                    <div class="row mt-4">

                                        <div class="col-lg-12">
                                            <div class='form-group'>
                                                <label class="font-weight-bold">Background / Detailed Note</label>
                                                <textarea class="form-control" rows="3" name="detailed_note" id="detailed_note"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label>Upload Comparitive</label>
                                                <input type="file" class="form-control" placeholder="" name="upload_comparitive">
                                                <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="upload_comparitive_disp_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class='form-group'>
                                                <label>Upload Detailed IOM</label>  
                                                <input type="file" class="form-control" placeholder="" name="upload_detailed">
                                                <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="upload_detailed_disp_name">
                                            </div>
                                        </div>
                                    </div>
                                    <?php ?>

                                 
                                    <div class="d-block mt-4 mb-4">
                                        <h5 class="page-title br-0 font-weight-bold">Select different levels of approvals</h5>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-md-3 mb-3">
                                            <lable>PCM</lable>
                                            <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row" id="approvers_list_div"></div>

                                </div>
                                <?php ?>
                                <div class="row text-right mt-20">
                                    <input type="hidden" name="project_id" id="project_id" value="<?php echo $project_id ?>">
                                    <input type="hidden" name="zone" id="zone" value="<?php echo $zone ?>">
                                    <input type="hidden" name="type_work_id" id="type_work_id" value="<?php echo $type_work_id ?>">
                                    <input type="hidden" name="subject_hd" id="subject_hd">
                                    <input type="hidden" name="reasons_delay_hd" id="reasons_delay_hd">
                                    <input type="hidden" name="current_status_work_hd" id="current_status_work_hd">
                                    <input type="hidden" name="l1_vendor" value="<?php echo $mRecord['l1_vendor']; ?>">
                                    <input type="hidden" id="base" value="<?php echo base_url(); ?>">
                                    <div class="col-lg-12">
                                        <button type="submit" name="save" value="save" id="save" class="btn btn-primary border-secondary rounded mr-10">Save</button>
                                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary border-secondary rounded">
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
                </section>
            </div>
        </div>


        <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <?php $this->load->view('buyer/partials/footer'); ?>

    <!-- Control Sidebar -->

    <?php $this->load->view('buyer/partials/control'); ?>

    <!-- /.control-sidebar -->

    <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->

    <div class="control-sidebar-bg"></div>

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

        let contrSel ;

        /* frozen value of fb/pq */

        function handleChange(input) {
            if (input.value < 0) input.value = 0;
            if (input.value > 100) input.value = 100;
        }

        function allowNumOnly(sender) {
            sender.value = sender.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');
        }

        /* frozen value of fb/pq */

        /* cotractor appointment date toggle */

        function finalized_val(sender) {
            let val = sender.value;
         
            

            val1 = String(val);
            if (val1) {
                if (val1.includes("Cr")) {
                    sender.value = val;
                } else if (!val1.includes("Cr")) {
                    sender.value = sender.value + " Cr";
                }
            }

        }

        /* cotractor appointment date toggle */

        /* idling toggle */

        function idlingCheck() {
            var checkBox = document.getElementById("front_idling1");
            if (checkBox.checked == true) {
                document.getElementById("delayReason").classList.remove("idling-hide");
            }
        }

        function idlingUnCheck() {
            var checkBox = document.getElementById("front_idling2");
            if (checkBox.checked == true) {
                document.getElementById("delayReason").classList.add("idling-hide");
            }
        }

        /* idling toggle */

        /* changing input value to cr */

        function changeToCr(sender) {

            let val = sender.value;

            val1 = String(val);
            if (val1) {
                if (val1.includes("Cr")) {
                    sender.value = val;
                } else if (!val1.includes("Cr")) {
                    sender.value = sender.value + " Cr";
                }
            }
        }

        /*ending changing input value to cr */

        $('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
            console.log("ele",ele);
            for(let i = 0;i<ele.length;i++){
                let val = event.target.value;
                val1 = String(event.target.value);
                if (val1) {
                    if (val1.includes("Cr")) {
                        event.target.value = val;
                    } else if (!val1.includes("Cr")) {
                        event.target.value = event.target.value + " Cr";
                    }
                }
            }

        })

         
        $('#package_count').on('change', function(e) {

            //Remove TD from final Bid
           
            $('#bidder_count').val(0);
            $('#bidHead_row').find('th:gt(2)').remove();
            $('#pqFb_row').find('td:gt(2)').remove();
            $('#package_row1').find('td:gt(2)').remove();
           // $('#package_row2').find('td:gt(2)').remove();
            //$('#package_row3').find('td:gt(2)').remove();
            //$('#package_row2').find('td:gt(0)').remove();
            //$('#package_row3').find('td:gt(0)').remove();
            $('#package_row2').hide();
            $('#package_row3').hide();
            $('#totAmt_row').find('td:gt(2)').remove();
            $('#bidPos_row').find('td:gt(1)').remove();
            $('#diffCrs_row').find('td:gt(1)').remove();
            $('#diffPercent_row').find('td:gt(1)').remove();
            
            let _th = `<th><label class='cust_th'>Package name</label><input type='text' class="form-control" placeholder="" name="package_label[]" id="package_label"  required onblur="package_bidders(this);"></th>`;

            let _budget_incl = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict();decimalStrict()" onblur="changeToCr(this);packageSynopsis_total('package_budget_esc','total_budget_esc');setGpl_budget();" class="form-control _budget_incl_td decimalStrictClass onMouseOutClass" name="package_budget_esc[]" id="package_budget_esc" required></td>`;

            let _negotiated_val = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  onblur="changeToCr(this);packageSynopsis_total('package_negot_value','total_negot_value');" class="form-control _negotiated_val_td decimalStrictClass onMouseOutClass" name="package_negot_value[]" id="package_negot_value" required></td>`;

            let _finalized = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" class="form-control _finalized_td decimalStrictClass onMouseOutClass" name="finalized_award_value_package[]" id="finalized_award_value_package" onblur="finalized_val(this);finalized_total();showBidders_finalized();calculateSum1();" required></td>`;

            let _exp_saving = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  class="form-control _exp_saving_td decimalStrictClass" name="expected_savings_package[]" id="expected_savings_package" readonly></td>`;

            let _rec_vendors = `<td><input type='text' class="form-control _rec_vendors_td" name="recomm_vendor_package[]" id="recomm_vendor_package" required onblur="setRecommended_vendorName();"></td>`;

            let _basis_awrd = `<td><input type='text' class="form-control _basis_awrd_td" name="basis_award_package[]" id="basis_award_package" readonly></td>`;

            let _deviation_contr = `<td><input type='text' class="form-control _deviation_contr_td" name="deviation_approved_package[]" id="deviation_approved_package" required></td>`;

            let _last_awarded = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  onblur="changeToCr(this);packageSynopsis_total('awarded_benchmark_package','total_awarded_benchmark');" class="form-control _last_awarded_td decimalStrictClass onMouseOutClass" name="awarded_benchmark_package[]" id="awarded_benchmark_package" required></td>`;

            let _is_basic_rate = `<td><input class="form-check-input _is_basic_rate_td" type="radio" id="group_" name="group" value="yes"><label class="form-check-label font-weight-bold" for="one_">Yes</label><input class="form-check-input" type="radio" id="group_" name="group"
            value="no" checked><label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="two_">No</label></td>`;

            let _amnt_basic_rate = `<td><input type='text' class="form-control _amnt_basic_rate_td decimalStrictThreeClass onMouseOutClass" name="total_basic_rate_package[]" id="basic_rate" oninput="allowNumOnly(this);decimalStrictThree()" onblur="changeToCr(this);packageSynopsis_total('basic_rate','total_basic_rate');"  value="" style="display:none ;" ></td>`;

            let _anti_basic_rate = `<td><input id="anticipated_rate" name="anticipate_basic_rate_package[]"  type='text' oninput="decimalStrict(this)"  onblur="changeToCr(this);packageSynopsis_total('anticipated_rate','total_anticipated_rate');calculateSum1();"  class="form-control _anti_basic_rate_td decimalStrictClass onMouseOutClass" required style="display:none ;" ></td>`;

            let _proposed_awrd_val = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control _proposed_awrd_val_td decimalStrictClass onMouseOutClass" name="post_basic_rate_package[]" id="post_basic_rate_package" readonly></td>`;

            let _base_rate_mnth = ` <td><input type='date' class="form-control _base_rate_mnth_td" name="basic_rate_month_package[]" id="basic_rate_month_package" required></td>`;

            if ($(".cust_th").length <= e.target.value) {

                for (let i = $(".cust_th").length; i < e.target.value; i++) {

                    let th = $(_th);
                    th.find("input").attr("name", th.find("input").attr("name"))
                    th.find("input").attr("id", th.find("input").attr("id") + String(i + 2))

                   
                    let budget_incl = $(_budget_incl);
                    budget_incl.find("input").attr("name", budget_incl.find("input").attr("name"))
                    budget_incl.find("input").attr("id", budget_incl.find("input").attr("id") + String(i + 2))
                   

                    let negotiated_val = $(_negotiated_val);
                    negotiated_val.find("input").attr("name", negotiated_val.find("input").attr("name"))
                    negotiated_val.find("input").attr("id", negotiated_val.find("input").attr("id") + String(i + 2))
                   
                    let finalized_val = $(_finalized);
                    finalized_val.find("input").attr("name", finalized_val.find("input").attr("name"))
                    finalized_val.find("input").attr("id", finalized_val.find("input").attr("id") + String(i + 2))

                    let exp_saving = $(_exp_saving);
                    exp_saving.find("input").attr("name", exp_saving.find("input").attr("name"))
                    exp_saving.find("input").attr("id", exp_saving.find("input").attr("id") + String(i + 2))

                    let rec_vendors = $(_rec_vendors);
                    rec_vendors.find("input").attr("name", rec_vendors.find("input").attr("name"))
                    rec_vendors.find("input").attr("id", rec_vendors.find("input").attr("id") + String(i + 2))

                    let basis_awrd = $(_basis_awrd);
                    basis_awrd.find("input").attr("name", basis_awrd.find("input").attr("name"))
                    basis_awrd.find("input").attr("id", basis_awrd.find("input").attr("id") + String(i + 2))

                    let deviation_contr = $(_deviation_contr);
                    deviation_contr.find("input").attr("name", deviation_contr.find("input").attr("name"))
                    deviation_contr.find("input").attr("id", deviation_contr.find("input").attr("id") + String(i + 2))

                    let last_awarded = $(_last_awarded);
                    last_awarded.find("input").attr("name", last_awarded.find("input").attr("name"))
                    last_awarded.find("input").attr("id", last_awarded.find("input").attr("id") + String(i + 2))

                    let is_basic_rate = $(_is_basic_rate);
                    let groupName = is_basic_rate.find("input").attr("name") + "_" + String(i + 2)
                  
                    $(is_basic_rate.find("input")[0]).attr("id", groupName + "_1")
                    $(is_basic_rate.find("input")[1]).attr("id", groupName + "_2")
                    $(is_basic_rate.find("label")[0]).attr("for", groupName + "_1")
                    $(is_basic_rate.find("label")[1]).attr("for", groupName + "_2")
                    is_basic_rate.find("input").attr("name", groupName)

                
                    let amnt_basic_rate = $(_amnt_basic_rate);
                    amnt_basic_rate.find("input").attr("name", amnt_basic_rate.find("input").attr("name"))
                    amnt_basic_rate.find("input").attr("id", amnt_basic_rate.find("input").attr("id") + String(i + 2))

                    let anti_basic_rate = $(_anti_basic_rate);
                    anti_basic_rate.find("input").attr("name", anti_basic_rate.find("input").attr("name"))
                    anti_basic_rate.find("input").attr("id", anti_basic_rate.find("input").attr("id") + String(i + 2))

                    let proposed_award_val = $(_proposed_awrd_val);
                    proposed_award_val.find("input").attr("name", proposed_award_val.find("input").attr("name"))
                    proposed_award_val.find("input").attr("id", proposed_award_val.find("input").attr("id") + String(i + 2))

                    let base_rate_mnth = $(_base_rate_mnth);
                    base_rate_mnth.find("input").attr("name", base_rate_mnth.find("input").attr("name"))
                    base_rate_mnth.find("input").attr("id", base_rate_mnth.find("input").attr("id") + String(i + 2))

                    let elementlength = $("#dyntable").find("thead").find("tr").find(`th`).length

                    $($("#dyntable").find("thead").find("tr").find("th")[elementlength - 1]).before(th)
                   
                    $($($("#dyntable").find("tbody").find("tr")[0]).find("td")[elementlength - 1]).before(budget_incl)
                    $($($("#dyntable").find("tbody").find("tr")[1]).find("td")[elementlength - 1]).before(negotiated_val)
                    

                    $($($("#dyntable").find("tbody").find("tr")[2]).find("td")[elementlength - 1]).before(finalized_val)

                    $($($("#dyntable").find("tbody").find("tr")[3]).find("td")[elementlength - 1]).before($(exp_saving))

                    $($($("#dyntable").find("tbody").find("tr")[4]).find("td")[elementlength - 1]).before(rec_vendors)

                    $($($("#dyntable").find("tbody").find("tr")[5]).find("td")[elementlength - 1]).before(basis_awrd)

                    $($($("#dyntable").find("tbody").find("tr")[6]).find("td")[elementlength - 1]).before(deviation_contr)

                    $($($("#dyntable").find("tbody").find("tr")[7]).find("td")[elementlength - 1]).before(last_awarded)

                    $($($("#dyntable").find("tbody").find("tr")[8]).find("td")[elementlength - 1]).before(is_basic_rate)

                    $($($("#dyntable").find("tbody").find("tr")[9]).find("td")[elementlength - 1]).before(amnt_basic_rate)
                    $($($("#dyntable").find("tbody").find("tr")[10]).find("td")[elementlength - 1]).before(anti_basic_rate)

                    $($($("#dyntable").find("tbody").find("tr")[11]).find("td")[elementlength - 1]).before(proposed_award_val)

                   
                    $($($("#dyntable").find("tbody").find("tr")[12]).find("td")[elementlength - 1]).before(base_rate_mnth)

                    

                }
            } else {

                for (let i = e.target.value; i <= $(".cust_th").length; i++) {
                    $(".cust_th").parent().last().remove()
                    $("._budget_incl_td").parent().last().remove()
                    $("._negotiated_val_td").parent().last().remove()
                    $("._finalized_td").parent().last().remove()
                    $("._exp_saving_td").parent().last().remove()
                    $("._rec_vendors_td").parent().last().remove()
                    $("._basis_awrd_td").parent().last().remove()
                    $("._deviation_contr_td").parent().last().remove()
                    $("._last_awarded_td").parent().last().remove()
                    $("._is_basic_rate_td").parent().last().remove()
                    $("._amnt_basic_rate_td").parent().last().remove()
                    $("._anti_basic_rate_td").parent().last().remove()
                    $("._proposed_awrd_val_td").parent().last().remove()      
                    $("._base_rate_mnth_td").parent().last().remove()
                }

            }

            let basic2 = document.getElementById("basic_rate2");
            let anticipated2 = document.getElementById("anticipated_rate2");
            let basic3 = document.getElementById("basic_rate3");
            let anticipated3 = document.getElementById("anticipated_rate3");
            $('#group_1_1').click(function() {

                basic2.style.display = "block";
                anticipated2.style.display = "block";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            });

            $('#group_1_2').click(function() {
              
                basic2.style.display = "none";
                anticipated2.style.display = "none";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            });
            $('#group_2_1').click(function() {

                basic2.style.display = "block";
                anticipated2.style.display = "block";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            });

            $('#group_2_2').click(function() {

                basic2.style.display = "none";
                anticipated2.style.display = "none";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            });
            //3rd Package
            $('#group_3_1').click(function () {  
			
			   basic3.style.display = "block";
			   anticipated3.style.display = "block";
			   packageSynopsis_total('basic_rate','total_basic_rate');
			   packageSynopsis_total('anticipated_rate','total_anticipated_rate');
				 });  

			$('#group_3_2').click(function () {  
					
				basic3.style.display = "none";
				anticipated3.style.display = "none";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
			});    

		  

            $('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
            console.log("ele",ele);
            for(let i = 0;i<ele.length;i++){
                let val = event.target.value;
                val1 = String(event.target.value);
                if (val1) {
                    if (val1.includes("Cr")) {
                        event.target.value = val;
                    } else if (!val1.includes("Cr")) {
                        event.target.value = event.target.value + " Cr";
                    }
                }
            }

            })

            //Deleting major terms rows on package count change
            deleteRow_majorTerms(); 
        });


        /* Ending award synopsis dynamic column */

        /* adding final bid scenario dynamic column */

        $('#bidder_count').on('change', function(e) {

            let _th = `<th style="width: 120px !important;"><input type='text' class="form-control custom_th" name="final_bidder_name[]" placeholder="Enter Bidder Name" id="final_bidder_name" required></th>`;

            let _pqfb = `<td><select id="score_type" style="width: 120px !important;" name="score_type[]" required="" class="form-control pq_fb_score_custom_td" onchange="score_color();"><option value="">Select</option><option value="PQ">PQ</option><option value="FB">FB</option></select><input type='number' class="form-control mt-3" style="width: 120px !important;" name="score[]" id="score" style="width: 120px !important;"  min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');"></td>`;

            let _package_bidder = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()"  onblur="changeToCr(this);getBidders_total();calculateSum1();" class="form-control package_common_tower_label_custom_td decimalStrictClass onMouseOutClass" name="package_bidder[1][1]" id="package_bidder_1_1" required></td>`;

            

            let _total_amt_label = `<td><input type='text' class="form-control total_amt_label_custom_td" name="total_amt_bidder[]" id="total_amt_bidder" readonly></td>`;

            let _bid_position_label = `<td><input type='text' class="form-control bid_position_label_custom_td" name="bid_position[]" id="bid_position"  value="" readonly></td>`;

            let _bid_position_gp = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control bid_position_gp_custom_td decimalStrictClass onMouseOutClass" name="diff_budget_crs[]" id="diff_budget_crs" readonly></td>`;

            let _diff_age_gp = `<td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control diff_age_gp_custom_td decimalStrictClass onMouseOutClass" name="diff_budget_percentage[]" id="diff_budget_percentage" readonly></td>`;

            var package_count = $('#package_count').find(":selected").text();
            var bid_count = $('#bidder_count').find(":selected").text();
           
            var pckIndex, bidIndex, ele_bidIndex;
            var bidCount_disp = $('input[name="final_bidder_name[]"]').length;
          
			if(bidCount_disp <= bid_count){


                for (pckIndex = 1; pckIndex <= package_count; pckIndex++) {

                    for (bidIndex = bidCount_disp; bidIndex < bid_count; bidIndex++) {
                        ele_bidIndex = bidIndex + 1;
                      
                        let th = $(_th);
                        th.find("input").attr("name", th.find("input").attr("name"))
                        th.find("input").attr("id", th.find("input").attr("id") + (bidIndex + 1))
                       
                        let pq_fb_score = $(_pqfb);
                        pq_fb_score.find("select").attr("name", pq_fb_score.find("select").attr("name"))
                        pq_fb_score.find("select").attr("id", pq_fb_score.find("select").attr("id") + ele_bidIndex)
                        pq_fb_score.find("input").attr("name", pq_fb_score.find("input").attr("name"))
                        pq_fb_score.find("input").attr("id", pq_fb_score.find("input").attr("id") + ele_bidIndex)

                        let package_bidder = $(_package_bidder);
                        package_bidder.find("input").attr("name", "package_bidder[" + pckIndex + "][" + ele_bidIndex + "]")
                        package_bidder.find("input").attr("id", "package_bidder_" + pckIndex + "_" + ele_bidIndex)
                       
                        let total_amt_label = $(_total_amt_label);
                        total_amt_label.find("input").attr("name", total_amt_label.find("input").attr("name"))
                        total_amt_label.find("input").attr("id", total_amt_label.find("input").attr("id") + ele_bidIndex)

                        let bid_position_label = $(_bid_position_label);
                        bid_position_label.find("input").attr("name", bid_position_label.find("input").attr("name"))
                        bid_position_label.find("input").attr("id", bid_position_label.find("input").attr("id") + ele_bidIndex)

                        let bid_position_gp = $(_bid_position_gp);
                        bid_position_gp.find("input").attr("name", bid_position_gp.find("input").attr("name"))
                        bid_position_gp.find("input").attr("id", bid_position_gp.find("input").attr("id") + ele_bidIndex)

                        let diff_age_gp = $(_diff_age_gp);
                        diff_age_gp.find("input").attr("name", diff_age_gp.find("input").attr("name"))
                        diff_age_gp.find("input").attr("id", diff_age_gp.find("input").attr("id") + ele_bidIndex)

                        if (pckIndex == 1) {
                            $("#mainTable").find("thead").find("tr").append(th)
                            $($("#mainTable").find("tbody").find("tr")[0]).append(pq_fb_score)
                        }
                        $($("#mainTable").find("tbody").find("tr")[pckIndex]).append(package_bidder)
                        
                        if (pckIndex == 1) {
                            $($("#mainTable").find("tbody").find("tr")[4]).append(total_amt_label)
                            $($("#mainTable").find("tbody").find("tr")[5]).append(bid_position_label)
                            $($("#mainTable").find("tbody").find("tr")[6]).append(bid_position_gp)
                            $($("#mainTable").find("tbody").find("tr")[7]).append(diff_age_gp)
                        }
                        

                    }
                }


            } else {
                let length = $(".custom_th").length;
                for (pckIndex = 1; pckIndex <= package_count; pckIndex++) {
                   
                    for (bidIndex = bid_count; bidIndex < bidCount_disp; bidIndex++) {
                       
						ele_bidIndex=parseInt(bidIndex)+1;
                        
                        if (pckIndex == 1) {
                            $(".custom_th").parent().last().remove()
                            $(".pq_fb_score_custom_td").parent().last().remove()
                            $(".total_amt_label_custom_td").parent().last().remove()
                            $(".bid_position_label_custom_td").parent().last().remove()
                            $(".bid_position_gp_custom_td").parent().last().remove()
                            $(".diff_age_gp_custom_td").parent().last().remove()
                        }
                      
						$("#package_bidder_"+pckIndex+"_"+ele_bidIndex).closest("td").remove();
						$("#package_bidder_"+pckIndex+"_"+ele_bidIndex).remove()
                       
                    }
                }

            }

            setRecommended_vendorName();
            setGpl_budget();
            showBidders_finalized();

            $('.onMouseOutClass').on('mouseout', (event) => {
            let ele = document.getElementsByClassName("onMouseOutClass");
            console.log("ele",ele);
            for(let i = 0;i<ele.length;i++){
                let val = event.target.value;
                val1 = String(event.target.value);
                if (val1) {
                    if (val1.includes("Cr")) {
                        event.target.value = val;
                    } else if (!val1.includes("Cr")) {
                        event.target.value = event.target.value + " Cr";
                    }
                }
            }

            })
        });

        /*  ending final bid scenario dynamic column */

        /* Add row delete row */
        const radio1 = document.getElementById('packageRadiosYes1');

        const radio2 = document.getElementById('packageRadiosNo1');

        const radio3 = document.getElementById('group_1_1');

        const radio4 = document.getElementById('group_1_2');
        const radio5 = document.getElementById('group_2_1');
        const radio6 = document.getElementById('group_2_2');


        let basic1 = document.getElementById("basic_rate1");
        let anticipated1 = document.getElementById("anticipated_rate1");
        let basic2 = document.getElementById("basic_rate2");
        let anticipated2 = document.getElementById("anticipated_rate2");
        let basic3 = document.getElementById("basic_rate3");
        let anticipated3 = document.getElementById("anticipated_rate3");
        radio1.addEventListener('click', function handleClick() {

            if (radio1.checked) {
                basic1.style.display = "block";
                anticipated1.style.display = "block";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            }
        });
        radio2.addEventListener('click', function handleClick() {
            if (radio2.checked) {
                basic1.style.display = "none";
                anticipated1.style.display = "none";
				packageSynopsis_total('basic_rate','total_basic_rate');
				packageSynopsis_total('anticipated_rate','total_anticipated_rate');
            }
        });


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
            var textAreaColumn = createRowColumn(newrow);
            var removeColumn = createRowColumn(newrow);

            var textbox = document.createElement("input");
            textbox.setAttribute("type", "text");
            textbox.setAttribute("required","");
            textbox.setAttribute("class", "form-control");
            textbox.setAttribute("name", "term[]");
            textColumn.appendChild(textbox);

            var textArea1 = document.createElement("div");
            textArea1.setAttribute("style", "display:flex ;");

            var term_len = $('input[name="term[]"]').length;
			
            var term_len_index = parseInt(term_len)+1;

            if(contrSel === "1"){
                var textAreaRow = document.createElement("textarea");
                textAreaRow.setAttribute("class", "form-control mr-2");
                textAreaRow.setAttribute("rows", "2");
                textAreaRow.setAttribute("required","");
               
                textAreaRow.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textAreaRow.setAttribute("id", "term_label_value1");
                

                var textAreaRow2 = document.createElement("textarea");
                textAreaRow2.setAttribute("class", "form-control mr-2");
                textAreaRow2.setAttribute("rows", "2");
               
                textAreaRow2.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textAreaRow2.setAttribute("id", "term_label_value2");
                textArea1.appendChild(textAreaRow);
                textArea1.appendChild(textAreaRow2);

            }else if(contrSel === "2"){
                var textAreaRow = document.createElement("textarea");
                textAreaRow.setAttribute("class", "form-control mr-2");
                textAreaRow.setAttribute("rows", "2");
                textAreaRow.setAttribute("required","");
                
                textAreaRow.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textAreaRow.setAttribute("id", "term_label_value1");

                var textAreaRow2 = document.createElement("textarea");
                textAreaRow2.setAttribute("class", "form-control mr-2");
                textAreaRow2.setAttribute("rows", "2");
               
                textAreaRow2.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textAreaRow2.setAttribute("id", "term_label_value2");

                var textAreaRow3 = document.createElement("textarea");
                textAreaRow3.setAttribute("class", "form-control mr-2");
                textAreaRow3.setAttribute("rows", "2");
              
                textAreaRow3.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textAreaRow3.setAttribute("id", "term_label_value3");

                textArea1.appendChild(textAreaRow);
                textArea1.appendChild(textAreaRow2);
                textArea1.appendChild(textAreaRow3);
            }else{
                var textAreaRow = document.createElement("textarea");
                textAreaRow.setAttribute("class", "form-control mr-2");
                textAreaRow.setAttribute("rows", "2");
                textAreaRow.setAttribute("required","");
               
                textAreaRow.setAttribute("name", "term_label_value["+term_len_index+"][]");
                textAreaRow.setAttribute("id", "term_label_value1");

                textArea1.appendChild(textAreaRow);
            }

            textAreaColumn.appendChild(textArea1);
           
            var remove = document.createElement("input");
            remove.setAttribute("type", "button");
            remove.setAttribute("value", "Delete");
            remove.setAttribute("class", "btn ibtnDelDcw2 btn-sm btn-danger rounded");
            remove.setAttribute("onClick", "deleteRow(this)");
            removeColumn.appendChild(remove);

            var table = document.getElementById('t1');
            var tbody = table.querySelector('tbody') || table;
            var count = tbody.getElementsByTagName('tr').length;
            numericColumn.innerText = count.toLocaleString();

            tbody.appendChild(newrow);
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

       

        /* Add row delete row */

        //Level role change 
        $('#level').change(function() {
            
            level = this.value;

            package_value = $('#post_basic_rate_package1').val();

            
            $.post("<?php echo base_url('nfa/Award_contract/getRoleUsers'); ?>", {
                    role: level,
                    
                },
                function(data, status) {
                    
                    $('#role').html(data);

                });
        });

        $('#role').change(function() {
           
            user_name = $("#role option:selected").text();
            user_id = $('#role').val();
           
            level_val = $("#level")[0].selectedIndex;


            if (user_id != '') {
                $('#approvers_div').css('display', 'block');
                $('#level' + level_val + '_div').css('display', 'block');


            }
            level_text = $("#level option:selected").text();
          
            $('#level' + level_val + '_id').html("Level " + level_val);

            $('#level' + level_val + '_approver').val(user_name);
            $('#level' + level_val + '_approver_id').val(user_id);
            $('#level' + level_val + '_approver').prop('readonly', true);

        });


        //Calculate Days

        function calculateDays() {

            var activity_planned_date = $("#activity_planned_date").val();
            var activity_cbe_date = $("#activity_cbe_date").val();
			var activity_days="";


            // end - start returns difference in milliseconds 
           
            activity_days = daysdifference(activity_planned_date, activity_cbe_date);
			if(!isNaN(activity_days)) {
				$("#activity_delay").val(activity_days+" Days");
			}
			else
			{
				$("#activity_delay").val(" Days");
			}
            if (activity_days > 0) {
                $("#front_idling1").prop("checked", true);
                idlingCheck();
            } else {
                $("#front_idling2").prop("checked", true);
                idlingUnCheck();
            }
        }

        function daysdifference(firstDate, secondDate) {
            var startDay = new Date(firstDate);
            var endDay = new Date(secondDate);

            // Determine the time difference between two dates     
            var millisBetween = endDay.getTime() - startDay.getTime();

            //var millisBetween = startDay.getTime() - endDay.getTime(); 

            // Determine the number of days between two dates  
            var days1 = millisBetween / (1000 * 3600 * 24);
           
            return Math.round(days1);
        }
      
        $('#receipt_date').blur(function() {
            var receipt_date = $("#receipt_date").val();
            var bidder_approval_date = $("#bidder_approval_date").val();
            calculateDays_betDates(receipt_date, bidder_approval_date, "bidder_approval_days");

        });
        $('#bidder_approval_date').blur(function() {
            var receipt_date = $("#receipt_date").val();
            var bidder_approval_date = $("#bidder_approval_date").val();
            calculateDays_betDates(receipt_date, bidder_approval_date, "bidder_approval_days");

        });
        $('#award_recomm_date').blur(function() {
            var bidder_approval_date = $("#bidder_approval_date").val();
            var award_recomm_date = $("#award_recomm_date").val();
            calculateDays_betDates(bidder_approval_date, award_recomm_date, "award_recomm_days");

        });

        $('#save, #submit').on('click', () => {
            // Get HTML content

            var subject_html = quill.root.innerHTML;
            var reasons_delay_html = quil2.root.innerHTML;
            var current_status_work_html = quil3.root.innerHTML;

            // Copy HTML content in hidden form
            $('#subject_hd').val(subject_html);
            $('#reasons_delay_hd').val(reasons_delay_html);
            $('#current_status_work_hd').val(current_status_work_html);

        })
       
        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
                textbox.addEventListener(event, function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                }
                });
            });
        }
        
       
        function decimalStrict(){
            let noOfClasses=document.getElementsByClassName("decimalStrictClass").length;
            for(let k = 0;k<=noOfClasses;k++){
                setInputFilter(document.getElementsByClassName("decimalStrictClass")[k], function(value) {
                return /^-?\d*[.,]?\d{0,2}$/.test(value); });
            }
        }

        function decimalStrictThree(){
            let noOfClasses=document.getElementsByClassName("decimalStrictThreeClass").length;
            for(let k = 0;k<=noOfClasses;k++){
                setInputFilter(document.getElementsByClassName("decimalStrictThreeClass")[k], function(value) {
                return /^-?\d*[.,]?\d{0,3}$/.test(value); });
            }
        }

        function addPackage(selectObj){
            
            contrSel = selectObj.value;
            let pack1=document.getElementsByClassName("sec1");
            let pack2=document.getElementsByClassName("sec2");
            let total_col=document.getElementsByClassName("total-hide");
            let total_h=document.getElementById("total-h");
            let tr1=document.getElementById("total-td1");
            let tr2=document.getElementById("total-td2");
            let tr3=document.getElementById("total-td3");
            let tr4=document.getElementById("total-td4");
            let tr5=document.getElementById("total-td5");
            let tr6=document.getElementById("total-td6");
            let tr7=document.getElementById("total-td7");
            let tr8=document.getElementById("total-td8");
            let tr9=document.getElementById("total-td9");
            let tr10=document.getElementById("total-td10");
            let tr11=document.getElementById("total-td11");
            let tr12=document.getElementById("total-td12");
            let tr13=document.getElementById("total-td13");
            
            if(selectObj.value === "1"){

                for (i = 0; i < pack1.length; i++) {
                    pack1[i].style.display="block";
                    pack2[i].style.display="none";

                }
            }
            else if(selectObj.value === "2"){
                
                for (i = 0; i < pack2.length; i++) {
                    pack1[i].style.display="block";
                    pack2[i].style.display="block";
                }
            }else{
                for (i = 0; i < pack1.length; i++) {
                    pack1[i].style.display="none";
                    pack2[i].style.display="none";
                    
                }
            }     
            if(selectObj.value === "1" || selectObj.value === "2"){
                total_h.classList.remove("total-hide");
                tr1.classList.remove("total-hide");
                tr2.classList.remove("total-hide");
                tr3.classList.remove("total-hide");
                tr4.classList.remove("total-hide");
                tr5.classList.remove("total-hide");
                tr6.classList.remove("total-hide");
                tr7.classList.remove("total-hide");
                tr8.classList.remove("total-hide");
                tr9.classList.remove("total-hide");
                tr10.classList.remove("total-hide");
                tr11.classList.remove("total-hide");
                tr12.classList.remove("total-hide");
                tr13.classList.remove("total-hide");
            }else{
                total_h.classList.add("total-hide");
                tr1.classList.add("total-hide");
                tr2.classList.add("total-hide");
                tr3.classList.add("total-hide");
                tr4.classList.add("total-hide");
                tr5.classList.add("total-hide");
                tr6.classList.add("total-hide");
                tr7.classList.add("total-hide");
                tr8.classList.add("total-hide");
                tr9.classList.add("total-hide");
                tr10.classList.add("total-hide");
                tr11.classList.add("total-hide");
                tr12.classList.add("total-hide");
                tr13.classList.add("total-hide");
            }
        }
        
    </script>
    <script src="../../assets/js/summernote-bs4.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
   
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_award_contract.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js"></script>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</body>

</html>