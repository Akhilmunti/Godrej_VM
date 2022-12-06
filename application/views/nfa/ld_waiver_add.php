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

                    <!--<div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="page-title br-0">LD Waiver | Create NFA</h3>
                            </div>
                        </div>
                    </div>-->
					<div class="content-header">
                        <div class="row">
                            <div class="col-lg-6">
								<h3 class="page-title br-0">LD Waiver | Create NFA</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
							<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/ldWaiver/actionSave'); ?>" enctype="multipart/form-data">
								<div class="row">

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Subject*</label>
											<input type="text" class="form-control" placeholder="" name="subject" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Contractor*</label>
											<input type="text" class="form-control" placeholder="" name="contractor_name" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Package*</label>
											<input type="text" class="form-control" placeholder="" name="package_name" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Awarded Towers/Scope</label>
											<input type="text" class="form-control" placeholder="" name="awarded_towers">
										</div>
									</div>
									
									<div class="col-lg-4">
										<div class='form-group'>
											<label>Award Date / NTP*</label>
											<input type="date" class="form-control" placeholder="" name="award_date" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Completion Date*</label>
											<input type="date" class="form-control" placeholder="" name="completion_date" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Revised Completion Date*</label>
											<input type="date" class="form-control" placeholder="" name="revised_completion_date" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Latest Average Feedback Score*</label>
											<input type="text" class="form-control" placeholder="" name="avg_feedback_score" required="">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Original Contract Value*</label>
											<input  class="form-control" placeholder="" name="original_contract_value" id="original_contract_value" required="" type="number">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Last approved Amended Contract Value</label>
											<input type="text" class="form-control" placeholder="" name="last_approved_value">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Total value of Work Done till date</label>
											<input type="text" class="form-control" placeholder="" name="total_value_work">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Balance works to be done</label>
											<input type="text" class="form-control" placeholder="" name="balance_work">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Applicable LD Amount</label>
											<input type="text" class="form-control" placeholder="" name="ld_amount">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Reason for LD Waiver</label>
											<input type="text" class="form-control" placeholder="" name="reason_ld_waiver">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Description Background</label>
											<input type="text" class="form-control" placeholder="" name="description_background">
										</div>
									</div>

								</div>

								<div class="d-block mt-4 mb-4">
									<h5 class="page-title br-0 font-weight-bold">Delay Analysis.</h5>
								</div>

								<div class="row">
									<div class="col-lg-12">

										<div class="table-responsive">
											<table class="table table-bordered">
                                            <thead>
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
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]"></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>Delay due to Company</td>
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]"></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>Delay due to other reasons (beyond the control of Contractors/Company)</td>
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]"></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td>Impact on OC/Handover Timelines</td>
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]"></td>
                                                </tr>
                                            </tbody>
                                        </table>
										</div>

										<div class="table-responsive">
											<table class="table table-bordered">
												<tr>
													<th>Is LD applicable</th>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="ld_applicable" id="ld_applicable1" value="yes" checked>
															<label class="form-check-label" for="ld_applicable1">
																Yes
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="ld_applicable" id="ld_applicable2" value="no">
															<label class="form-check-label" for="ld_applicable2">
																No
															</label>
														</div>
													</td>
												</tr>

												<tr>
													<th>In case of No Please specify reason</th>
													<td colspan="2"><input type="text" class="form-control" name="reason_applicable"></td>
												</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>

								<div class="row">
									<div class="col-lg-12">
										<div class='form-group'>
											<label>Recommendations</label>
											<input type="text" class="form-control" placeholder="" name="recommendations">
										</div>
									</div>
								</div>

								<div class="d-block mt-4 mb-4">
									<h5 class="page-title br-0 font-weight-bold">Attachments.</h5>
								</div>

								<div class="row">

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file1_upload">
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file1_display_name">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file2_upload">
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file2_display_name">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file3_upload">
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file3_display_name">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file4_upload">
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file4_display_name">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file5_upload">
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file5_display_name">
										</div>
									</div>

								</div>
		
								  <div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Select different levels of approvals</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Select Level*</label>
                                    <select id="level" name="level" required class="form-control">
										<option value="" >Select Level</option>
                                        <option value="1">Level 1(PM)</option>
                                        <option value="2">Level 2(Regional C&P Head)</option>
                                        <option value="3">Level 3(CH)</option>
                                        <option value="4">Level 4(PD)</option>
										<option value="5">Level 5(OH)</option>
                                        <option value="6">Level 6(RH)</option>
                                        <option value="7">Level 7(Zonal CEO)</option>
                                        <option value="8">Level 8(HO - C&P)</option>
										<option value="9">Level 9(COO)</option>
										<option value="10">Level 10(MD)</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label>Approver Names</label>
                                    <select id="role" name="role"  class="form-control">
                                        <option value="" >Select Approver name</option>
										<option value="" >Approver name</option>
										<option value="" >Approver name2</option>
                                    </select>
                                </div>
                            </div>
							<div id="approvers_div" style="display:none;">
							<div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Different levels of approvals</h5>
                            </div>
								<div class="row" >
								<?php for($i=1;$i<=10;$i++) 
								{	
								?>
								
									<div class="col-lg-2" id="level<?php echo $i;?>_div" >
										<div class='form-group'>
											<label id="level1_id">Level - <?php echo $i;?></label>
											<input type="text" class="form-control" placeholder="" name="level<?php echo $i;?>_approver" id="level<?php echo $i;?>_approver"  required="Please fill out" >
											<input type="hidden" class="form-control" placeholder="" name="level<?php echo $i;?>_approver_id" id="level<?php echo $i;?>_approver_id">
										</div>
									</div>
								<?php 
								}
								?>							
									<!--<div class="col-lg-2">
										<div class='form-group'>
											<label id="level2_id">Level - 2</label>
											<input type="text" class="form-control" placeholder="" name="level2_approver" id="level2_approver">
											<input type="hidden" class="form-control" placeholder="" name="level2_approver_id" id="level2_approver_id">
										</div>
									</div>

									<div class="col-lg-2">
										<div class='form-group'>
											<label id="level3_id">Level - 3</label>
											<input type="text" class="form-control" placeholder="" name="level3_approver" id="level3_approver">
											<input type="hidden" class="form-control" placeholder="" name="level3_approver_id" id="level3_approver_id">
										</div>
									</div>

									<div class="col-lg-2">
										<div class='form-group'>
											<label id="level4_id">Level - 4</label>
											<input type="text" class="form-control" placeholder="" name="level4_approver" id="level4_approver">
											<input type="hidden" class="form-control" placeholder="" name="level4_approver_id" id="level4_approver_id">
										</div>
									</div>

									<div class="col-lg-2">
										<div class='form-group'>
											<label id="level5_id">Level - 5</label>
											<input type="text" class="form-control" placeholder="" name="level5_approver" id="level5_approver">
											<input type="hidden" class="form-control" placeholder="" name="level5_approver_id" id="level5_approver_id">
										</div>
									</div>
									
									<div class="col-lg-2">
										<div class='form-group'>
											<label id="level6_id">Level - 6</label>
											<input type="text" class="form-control" placeholder="" name="level6_approver" id="level6_approver">
											<input type="hidden" class="form-control" placeholder="" name="level6_approver_id" id="level6_approver_id">
										</div>
									</div>-->

								</div>
								</div>
								<div class="row mt-4" >
									<div class="col-lg-12 text-right">
										<button type="submit" name="save" id="save" value="save" class="btn btn-outline-dark border-secondary mr-10 font-weight-bold rounded">Save</button>
										<button type="submit" name="submit" id="submit" value="submit" class="btn btn-outline-dark border-secondary font-weight-bold rounded">Submit</button>
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

    <script>
		/*$(document).ready(function(){
			$("#submit").click(function(){
			//$('#inputName').attr('required', false); 
			//document.getElementById("msg").innerHTML  = "Required attribute removed from name input"; 
			//
			level= this.value;
			alert("level"+level);
			contract_value=$('#original_contract_value').val();
			
			if(contract_value<=100000000 )
			{
				alert("contract_value"+contract_value);
				$("#level10_approver").attr('required',false);
				//$('#level'+level+'_div').css('display','none');
			}
			//else
				//$("#level"+level+"_approver").attr('required',true);
			});
    });*/
        
		//$("#level10_approver").prop('required',false);

		$('#level').change(function () {
			//alert("test"+$('#original_contract_value').val());
			level= this.value;
			//alert("level"+level);
			contract_value=$('#original_contract_value').val();
			if(contract_value<=100000000 )
			{
				$("#level10_approver").val('NA');
				//$('#level'+level+'_div').css('display','none');
			}
			//else
				//$("#level"+level+"_approver").attr('required',true);
			$.post("<?php echo base_url('nfa/ldWaiver/getRoleUsers'); ?>",
					{
						level: this.value,
						contract_value:$('#original_contract_value').val()
					},
					function (data, status) {
						//alert(data);
						
						$('#role').html(data);
						
					});
		});
		
		$('#role').change(function () {
			//alert("test"+$('#role').val());
			
			user_name = $( "#role option:selected" ).text();
			user_id = $('#role').val();
			contract_value=$('#original_contract_value').val()
			//if(contract_value=='')
				//contract_value=0;
			level_val= $('#level').val();
			
			
				
			
			if(user_id!='')
			{
				$('#approvers_div').css('display','block');
				$('#level'+level_val+'_div').css('display','block');
				
				
			}	
			level_text= $( "#level option:selected" ).text();
			//alert(level_val);
			$('#level'+level_val+'_id').html(level_text);
			
			//$('#level6_approver').val("test");
			$('#level'+level_val+'_approver').val(user_name);
			$('#level'+level_val+'_approver_id').val(user_id);
			$('#level'+level_val+'_approver').prop('readonly',true);
			<?php /*$.post("<?php echo base_url('nfa/ldWaiver/getUserDetails'); ?>",
					{
						level: this.value,
						contract_value:$('#original_contract_value').val()
					},
					function (data, status) {
						alert(data);
						$('#role').html(data);
					}); */?>
		});

    </script>

</body>

</html>
