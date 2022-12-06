<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>
<style>
    .btn-hide{
        display: none;
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
                            <div class="col-lg-9">
                                <h3>Approval For Descoping</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">
							<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/DescopingIOM/actionSave'); ?>" enctype="multipart/form-data" onsubmit="loader()">

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Subject*</label>
                                        <input type="text" class="form-control" placeholder="" id="subject" name="subject" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Contractor*</label>
                                        <input type="text" class="form-control" placeholder="" id="contractor" name="contractor" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Package*</label>
                                        <input type="text" class="form-control" placeholder="" id="package" name="package" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Awarded Towers/Scope</label>
                                        <input type="text" class="form-control" placeholder="" id="awarded_towers" name="awarded_towers" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Award Date / NTP*</label>
                                        <input type="date" class="form-control" placeholder="" id="award_date" name="award_date" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Completion Date*</label>
                                        <input type="date" class="form-control" placeholder="" id="completion_date"  name="completion_date" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Revised Completion Date*</label>
                                        <input type="date" class="form-control" placeholder="" id="revised_completion_date" name="revised_completion_date" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Original Contract Value*</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="original_contract_value" id="original_contract_value" required="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Last approved Amended Contract Value</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" id="last_approved_amended_value" name="last_approved_amended_value" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Total value of Work Done till date</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" id="total_value_of_work" name="total_value_of_work" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Balance works to be done</label>
                                        <input type="text" class="form-control" placeholder="" id="balance_work" name="balance_work" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Proposed work to be de-scoped</label>
                                        <input type="text" class="form-control" placeholder="" id="proposed_work" name="proposed_work" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Cumulative Amount of Work to be De-Scoped</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" id="cumulative_amount_of_work" name="cumulative_amount_of_work" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Estimated Value of Re-award for Balance work to be done</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="estimated_value_of_reward" required>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Reason for De-Scoping</label>
                                        <input type="text" class="form-control" placeholder="" name="reason_for_descoping" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Cost Overrun</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass onMouseOutClass" placeholder="" name="cost_overrun" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Recovery Mechanism in case of Cost Overrun</label>
                                        <input type="text" class="form-control" placeholder="" name="recovery_mechanism" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Performance Bank Guarantee</label>
                                        <input type="text" class="form-control" placeholder="" name="perormance_bank_guarantee" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Validity of Performance Bank Guarantee</label>
                                        <input type="text" class="form-control" placeholder="" name="validity_of_performance" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Retention against RA bill </label>
                                        <input type="text" class="form-control" placeholder="" name="retention_against" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Status of Advance Recovery</label>
                                        <input type="text" class="form-control" placeholder="" name="status_of_advance_recovery" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Remarks</label>
                                        <textarea class="form-control" rows="2" name="remarks" id="remarks"></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Delay Analysis</h5>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-bordered mt-4">
                                    <thead class="bg-primary">
                                        <tr>
                                            <th>#</th>
                                            <th>Total Delay</th>
                                            <th>Total Days (as below)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr>
                                            <th>1</th>
                                            <td>Delay due to Contractor</td>
                                            <td><input oninput="allowNumOnly(this)" type="text" class="form-control" placeholder="" name="delay_due_contractor" required></td>
                                        </tr>
                                        <tr>
                                            <th>2</th>
                                            <td>Delay due to Company</td>
                                            <td><input oninput="allowNumOnly(this)" type="text" class="form-control" placeholder="" name="delay_due_company" required></td>
                                        </tr>
                                        <tr>
                                            <th>3</th>
                                            <td>Delay due to other reasons (beyond the control of Contractors/Company)</td>
                                            <td><input oninput="allowNumOnly(this)" type="text" class="form-control" placeholder="" name="delay_due_other_reason" required></td>
                                        </tr>
                                        <tr>
                                            <th>4</th>
                                            <td>Impact on OC/Handover Timelines</td>
                                            <td><input oninput="allowNumOnly(this)" type="text" class="form-control" placeholder="" name="impact_on_oc" required></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Decision on LD</label>
                                        <input type="text" class="form-control" placeholder="" name="decision_on_ld" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Decision on 10% Administration charges on de-scoped works</label>
                                        <input type="text" class="form-control" placeholder="" name="decision_on_ten_administration" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-12">
                                    <label class="page-title br-0 font-weight-bold mr-4">Reduction in PBG Value</label>
                                    <input class="form-check-input" type="radio" name="reduction_in_pbg_value" id="reduction_in_pbg_value1" value="Yes" checked>
                                    <label class="form-check-label font-weight-bold" for="reduction_in_pbg_value1">
                                        Yes
                                    </label>
                                    <input class="form-check-input" type="radio" name="reduction_in_pbg_value" id="reduction_in_pbg_value2" value="No">
                                    <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="reduction_in_pbg_value2">
                                        No
                                    </label>
                                </div>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Deviation in Existing/Original Contract (if any)</label>
                                        <input type="text" class="form-control" placeholder="" name="deviation_in_existing" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Status of Re-Tendering</label>
                                        <input type="text" class="form-control" placeholder="" name="status_of_retendering" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class='form-group'>
                                        <label>Recommendations</label>
                                        <input type="text" class="form-control" placeholder="" name="recommendations" required>
                                    </div>
                                </div>

                            </div>

                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Attachments</h5>
                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Upload - 1</label>
                                        <input type="file" class="form-control" placeholder="">
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Upload - 2</label>
                                        <input type="file" class="form-control" placeholder="">
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Upload - 3</label>
                                        <input type="file" class="form-control" placeholder="">
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Upload - 4</label>
                                        <input type="file" class="form-control" placeholder="">
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Upload - 5</label>
                                        <input type="file" class="form-control" placeholder="">
                                        <input type="text" class="form-control mt-2" placeholder="Please enter file name" name="">
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-4">
                                <div class="col-md-3 mb-3">
                                    <lable>PCM</lable>
                                    <input readonly="" value="<?php echo $this->session->userdata('session_name'); ?>" class="form-control" />
                                </div>
                            </div>


                            <div class="row text-right mt-20">
                                <div class="col-lg-12">
								      
                                    <button type="button" class="btn btn-primary border-secondary rounded mr-10">Save</button> 
									<button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary rounded border-secondary">
										<div class="spinner-border spinner-border-sm btn-hide" role="status">
											<span class="sr-only">Loading...</span>
										</div>
										<span class="btn-txt">Submit</span>
									</button>
                                </div>
                            </div>

                        </div>
                    </div>
					</form>
                </section>
            </div>


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

    <!-- ./wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

    <script>

        $(document).ready (function () {  
        $("#nfaForm").validate();  
        }); 

    </script>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>vendor_plugins/nfa/validate.min.js"></script>

</body>

</html>