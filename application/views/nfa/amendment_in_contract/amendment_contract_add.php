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

                  

                    <div class="content-header">
                        <div class="row">
                            <div class="col-lg-8">
								<h3 class="page-title br-0">Amendment in Contract | Create NFA</h3>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
							<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/amendment_in_contract/actionSave'); ?>" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class='form-group'>
                                        <label>Zone / Project Name</label>
                                        <input type="text" class="form-control" placeholder="" name="project_name" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Package Name</label>
                                        <input type="text" class="form-control" placeholder="" name="package_name" required>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Contractor name</label>
                                        <input type="text" class="form-control" placeholder="" name="contractor_name">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Awarded Towers / Scope</label>
                                        <input type="text" class="form-control" placeholder="" name="awarded_towers">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Award Date / NTP</label>
                                        <input type="date" class="form-control" placeholder="" name="award_date">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Completion Date (As per original Contract)</label>
                                        <input type="date" class="form-control" placeholder="" name="completion_date">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Revised Completion Date (As per approved EOT)</label>
                                        <input type="date" class="form-control" placeholder="" name="revised_completion_date">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Original Awarded Value</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" placeholder="" name="original_award_value">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Last approved Amended Contract Value</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass" placeholder="" name="last_approved_value">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Proposed value of Amendments (in crores)</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass" placeholder="" name="proposed_value_amendment">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Proposed Amendment no.</label>
                                        <input type="text" oninput="allowNumOnly(this)" class="form-control" placeholder="" name="proposed_amendment_no">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Revised value of Contract post this amendment (cr)</label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this)" class="form-control decimalStrictClass" placeholder="" name="revised_value_contract">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Reason for Amendment</label>
                                        <input type="text" class="form-control" placeholder="" name="reason_amendment">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>History /Background</label>
                                        <input type="text" class="form-control" placeholder="" name="history">
                                    </div>
                                </div>

                            </div>

                            <div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Bifurcation of Proposed value of Amendments (in crores).</h5>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th style="width:30%">Heads</th>
                                                    <th style="width:30%">In This Proposed amendment</th>
                                                    <th style="width:30%">Cumulative in Cr (and %age change wrt original contract Value)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bidderList">
                                                <tr>
                                                    <th>1</th>
                                                    <td>A. Extra Item</td>
                                                    <td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);proposedAmendment_total();" class="form-control decimalStrictClass" name="extra_item_proposed" id="extra_item_proposed"></td>
                                                    <td><input type='text' oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);cumulative_total();" class="form-control decimalStrictClass" name="extra_iem_cumulative" id="extra_iem_cumulative"></td>                                          
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>B. Scope Change(addition/Deletion)</td>
                                                    <td><input oninput="decimalStrict()" onblur="changeToCr(this);proposedAmendment_total();getApprovers();" type='text' class="form-control decimalStrictClass" name="scope_change_proposed" id="scope_change_proposed"></td>
                                                    <td><input oninput="decimalStrict()" onblur="changeToCr(this);cumulative_total();"  type='text' class="form-control decimalStrictClass" name="scope_change_cumulative" id="scope_change_cumulative"></td>                                          
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>C. Qty Variation</td>
                                                    <td><input oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);proposedAmendment_total();" type='text' class="form-control decimalStrictClass" name="qty_variation_proposed" id="qty_variation_proposed"></td>
                                                    <td><input oninput="allowNumOnly(this);decimalStrict()" onblur="changeToCr(this);cumulative_total();" type='text' class="form-control decimalStrictClass" name="qty_variation_cumulative" id="qty_variation_cumulative"></td>                                          
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td>Total (A+B+C)</td>
                                                    <td><input type='text' class="form-control" name="total_proposed" id="total_proposed" readonly></td>
                                                    <td><input type='text' class="form-control" name="total_cumulative" id="total_cumulative" readonly></td>                                          
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

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

                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
									<input type="hidden" id="base" value="<?php echo base_url(); ?>">
                                    <button type="submit" name="save" value="save" id="save" class="btn btn-primary border-secondary rounded mr-10">Save</button>
                                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary border-secondary rounded mr-10">Submit</button>
                                </div>
                            </div>
							</form>
                        </div>
                    </div>

                </section>
                
                <!-- Maincontent -->

            </div>

        </div>

        <!-- Content-wrapper -->
        <?php $this->load->view('buyer/partials/footer'); ?>

        <!-- Control Sidebar -->
        <?php $this->load->view('buyer/partials/control'); ?>
        <!-- Control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- Wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_amendment_contract.js"></script>
</body>

</html>