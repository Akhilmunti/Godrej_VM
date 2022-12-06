<!DOCTYPE html>
<html lang="en">

<?php 
$salient_id = $mRecord['id'];
$this->load->view('buyer/partials/header'); ?>

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
								<h3 class="page-title br-0">Amendment in Contract |<?php echo ($updType=="RF") ? "Refloat" : "Edit" ?> NFA</h3>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
							<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/amendment_in_contract/actionSave/'.$mRecord['id']); ?>" enctype="multipart/form-data">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class='form-group'>
                                        <label>Zone / Project Name</label>
                                        <input type="text" class="form-control" placeholder="" name="project_name" value="<?php echo $mRecord['project_name'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Package Name</label>
                                        <input type="text" class="form-control" placeholder="" name="package_name" value="<?php echo $mRecord['package_name'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Contractor name</label>
                                        <input type="text" class="form-control" placeholder="" name="contractor_name" value="<?php echo $mRecord['contractor_name'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Awarded Towers / Scope</label>
                                        <input type="text" class="form-control" placeholder="" name="awarded_towers" value="<?php echo $mRecord['awarded_towers'] ?>">
                                    </div>
                                </div>
                                
                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Award Date / NTP</label>
                                        <input type="date" class="form-control" placeholder="" name="award_date" value="<?php echo $mRecord['award_date'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Completion Date (As per original Contract)</label>
                                        <input type="date" class="form-control" placeholder="" name="completion_date" value="<?php echo $mRecord['completion_date'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Revised Completion Date (As per approved EOT)</label>
                                        <input type="date" class="form-control" placeholder="" name="revised_completion_date" value="<?php echo $mRecord['revised_completion_date'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Original Awarded Value</label>
                                        <input type="text" class="form-control" placeholder="" name="original_award_value" value="<?php echo $mRecord['original_award_value'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Last approved Amended Contract Value</label>
                                        <input type="text" class="form-control" placeholder="" name="last_approved_value" value="<?php echo $mRecord['last_approved_value'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Proposed value of Amendments (in crores)</label>
                                        <input type="text" class="form-control" placeholder="" name="proposed_value_amendment" value="<?php echo $mRecord['proposed_value_amendment'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Proposed Amendment no.</label>
                                        <input type="text" class="form-control" placeholder="" name="proposed_amendment_no" value="<?php echo $mRecord['proposed_amendment_no'] ?>"> 
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Revised value of Contract post this amendment (cr)</label>
                                        <input type="text" class="form-control" placeholder="" name="revised_value_contract" value="<?php echo $mRecord['revised_value_contract'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>Reason for Amendment</label>
                                        <input type="text" class="form-control" placeholder="" name="reason_amendment" value="<?php echo $mRecord['reason_amendment'] ?>">
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class='form-group'>
                                        <label>History /Background</label>
                                        <input type="text" class="form-control" placeholder="" name="history" value="<?php echo $mRecord['history'] ?>">
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
                                                    <td><input type='text' class="form-control" name="extra_item_proposed" id="extra_item_proposed" value="<?php echo $mRecord['extra_item_proposed'] ?>"></td>
                                                    <td><input type='text' class="form-control" name="extra_iem_cumulative" id="extra_iem_cumulative" value="<?php echo $mRecord['extra_iem_cumulative'] ?>"></td>                                          
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>B. Scope Change(addition/Deletion)</td>
                                                    <td><input type='text' class="form-control" name="scope_change_proposed" id="scope_change_proposed" value="<?php echo $mRecord['scope_change_proposed'] ?>"></td>
                                                    <td><input type='text' class="form-control" name="scope_change_cumulative" id="scope_change_cumulative" value="<?php echo $mRecord['scope_change_cumulative'] ?>"></td>                                          
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>C. Qty Variation</td>
                                                    <td><input type='text' class="form-control" name="qty_variation_proposed" id="qty_variation_proposed" value="<?php echo $mRecord['qty_variation_proposed'] ?>"></td>
                                                    <td><input type='text' class="form-control" name="qty_variation_cumulative" id="qty_variation_cumulative" value="<?php echo $mRecord['qty_variation_cumulative'] ?>"></td>                                          
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td>Total (A+B+C)</td>
                                                    <td><input type='text' class="form-control" name="total_proposed" id="total_proposed" value="<?php echo $mRecord['total_proposed'] ?>"></td>
                                                    <td><input type='text' class="form-control" name="total_cumulative" id="total_cumulative" value="<?php echo $mRecord['total_cumulative'] ?>"></td>                                          
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
							
                            <div class="row" id="approvers_list_div">
							
							<?php 
							 $CI =& get_instance();
							
							 $level_max = sizeof($mRecordApprovers);
							
							 $getLevels = $CI->nfaAction->getAllLevelRole_approvers('',$salient_id,"amendment_contract");
							
							 $result_maxLevel = '';
							 $mSessionZone = $this->session->userdata('session_zone');
							
							 foreach ($getLevels as $key => $valLevel) {
								 $role = $valLevel->role;
								 $approver_id = $valLevel->approver_id;
								
								 $getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
								 	
								
                            ?>


								<div id="pm" class="col-md-3 mb-3">
									<lable><?php echo $role;?></lable>
									<select name="approver_id[]"   class="form-control" required >
										<option disabled="" selected="" value="">Select</option>
										<option value="0" <?php echo ($approver_id==0) ? "selected": "";?>>Not Applicable</option>
										<?php 
										foreach ($getUsers as $keyUser => $valUser) {
											$buyer_id = $valUser->buyer_id;
											?>
										<option value='<?php echo $valUser->buyer_id; ?>' <?php echo ($approver_id==$buyer_id) ? "selected": "";?>><?php echo  $valUser->buyer_name ?></option>
										<?php }?>           
									</select>
								</div>
							<?php 
								
							}?>
                          
							<?php 
							//}
							?>

                            </div>	

                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
									<input type="hidden" class="form-control" placeholder="" name="nfa_status"  value="<?php echo $mRecord['nfa_status'] ?>">
									<input type="hidden" class="form-control" placeholder="" name="updType"  value="<?php echo $updType; ?>">
									<input type="hidden" class="form-control" placeholder="" name="enfaNo"  value="<?php echo $mRecord['version_id']; ?>">
									
									<input type="hidden" id="base" value="<?php echo base_url(); ?>">
									<input type="hidden" id="salient_id" value="<?php echo $salient_id; ?>">
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

</body>

</html>