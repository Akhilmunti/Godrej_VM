<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header');

//echo getLabelValue("Delay due to Contractor"); ?>

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

                    <?php /*<div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="page-title br-0"><?php echo ($updType=="RF") ? "Refloat" : "Edit" ?> NFA - LD Waiver</h3>
                            </div>
                        </div>
                    </div><?php */?>
					
					<div class="content-header">
                        <div class="row">
                            <div class="col-lg-6">
								<h3 class="page-title br-0"><?php echo ($updType=="RF") ? "Refloat" : "Edit" ?> NFA - LD Waiver</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>
					
					<div class="d-block mb-4">
                        <h5 class="page-title br-0 font-weight-bold">ENFA No : <?php echo $mRecord['version_id'] ?></h5>
                    </div>

                    <div class="box">
                        <div class="box-body">
							<form id="articleForm" method="POST" action="<?php echo base_url('nfa/ldWaiver/actionSave/' . $mRecord['id']); ?>" enctype="multipart/form-data">
								<div class="row">

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Subject</label>
											<input type="text" class="form-control" placeholder="" name="subject" required="" value="<?php echo $mRecord['subject'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Contractor</label>
											<input type="text" class="form-control" placeholder="" name="contractor_name" required="" value="<?php echo $mRecord['contractor_name'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Package</label>
											<input type="text" class="form-control" placeholder="" name="package_name" required="" value="<?php echo $mRecord['package_name'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Awarded Towers/Scope</label>
											<input type="text" class="form-control" placeholder="" name="awarded_towers" value="<?php echo $mRecord['awarded_towers'] ?>">
										</div>
									</div>
									
									<div class="col-lg-4">
										<div class='form-group'>
											<label>Award Date / NTP</label>
											<input type="date" class="form-control" placeholder="" name="award_date" required="" value="<?php echo $mRecord['award_date'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Completion Date</label>
											<input type="date" class="form-control" placeholder="" name="completion_date" required="" value="<?php echo $mRecord['completion_date'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Revised Completion Date</label>
											<input type="date" class="form-control" placeholder="" name="revised_completion_date" required="" value="<?php echo $mRecord['revised_completion_date'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Latest Average Feedback Score</label>
											<input type="text" class="form-control" placeholder="" name="avg_feedback_score" required="" value="<?php echo $mRecord['avg_feedback_score'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Original Contract Value</label>
											<input  class="form-control" placeholder="" name="original_contract_value" id="original_contract_value" required="" type="number" value="<?php echo $mRecord['original_contract_value'] ?>">
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
											<label>Total value of Work Done till date</label>
											<input type="text" class="form-control" placeholder="" name="total_value_work" value="<?php echo $mRecord['total_value_work'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Balance works to be done</label>
											<input type="text" class="form-control" placeholder="" name="balance_work" value="<?php echo $mRecord['balance_work'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Applicable LD Amount</label>
											<input type="text" class="form-control" placeholder="" name="ld_amount" value="<?php echo $mRecord['ld_amount'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Reason for LD Waiver</label>
											<input type="text" class="form-control" placeholder="" name="reason_ld_waiver" value="<?php echo $mRecord['reason_ld_waiver'] ?>">
										</div>
									</div>

									<div class="col-lg-4">
										<div class='form-group'>
											<label>Description Background</label>
											<input type="text" class="form-control" placeholder="" name="description_background" value="<?php echo $mRecord['description_background'] ?>">
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
											<?php
											 //foreach ($mRecordReason as $key => $value): 
 
												//echo $value->reason_label;
												?>
                                                <tr>
                                                    <th>1</th>
                                                    <td>Delay due to Contractor</td>
                                                    <td><input type="text" class="form-control" placeholder="" name="reason_value[]" value="<?php echo getLabelValue("Delay due to Contractor",$mRecordReason); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>Delay due to Company</td>
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]" value="<?php echo getLabelValue("Delay due to Company",$mRecordReason); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>Delay due to other reasons (beyond the control of Contractors/Company)</td>
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]" value="<?php echo getLabelValue("Delay due to other reasons (beyond the control of Contractors/Company)",$mRecordReason); ?>"></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td>Impact on OC/Handover Timelines</td>
                                                    <td><input type="number" class="form-control" placeholder="" name="reason_value[]" value="<?php echo getLabelValue("Impact on OC/Handover Timelines",$mRecordReason); ?>"></td>
                                                </tr>
												<?php //  endforeach  ?>  
                                            </tbody>
                                        </table>
										</div>

										<div class="table-responsive">
											<table class="table table-bordered">
												<tr>
													<th>Is LD applicable</th>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="ld_applicable" id="ld_applicable1" value="yes"  <?php echo ($mRecord['ld_applicable']=="yes")? "checked" : "" ?>>
															<label class="form-check-label" for="ld_applicable1">
																Yes
															</label>
														</div>
													</td>
													<td>
														<div class="form-check">
															<input class="form-check-input" type="radio" name="ld_applicable" id="ld_applicable2" value="no" <?php echo ($mRecord['ld_applicable']=="no")? "checked" : "" ?>>
															<label class="form-check-label" for="ld_applicable2">
																No
															</label>
														</div>
													</td>
												</tr>

												<tr>
													<th>In case of No Please specify reason</th>
													<td colspan="2"><input type="text" class="form-control" name="reason_applicable" value="<?php echo $mRecord['reason_applicable'] ?>"></td>
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
											<input type="text" class="form-control" placeholder="" name="recommendations" value="<?php echo $mRecord['recommendations'] ?>">
										</div>
									</div>
								</div>

								<div class="d-block mt-4 mb-4">
									<h5 class="page-title br-0 font-weight-bold">Attachments.</h5>
								</div>

								<div class="row">
								<?php //print_r($mRecordUploads);?>
									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload<?php $upload_path = site_url().'uploads/';?></label>
											<input type="file" class="form-control" placeholder="" name="file1_upload" value="<?php echo $mRecordUploads['file1_upload_path'] ?>">
											<input type="hidden" class="form-control" placeholder="" name="file1_upload_hd" value="<?php echo $mRecordUploads['file1_name'] ?>">
											<?php if($mRecordUploads['file1_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecordUploads['file1_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
											?>
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file1_display_name" value="<?php echo $mRecordUploads['file1_display_name'];?>">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file2_upload" value="<?php echo $mRecordUploads['file2_upload_path'] ?>">
											<?php if($mRecordUploads['file2_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecordUploads['file2_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
											?>
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file2_display_name" value="<?php echo $mRecordUploads['file2_display_name'];?>">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file3_upload">
											<?php if($mRecordUploads['file3_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecordUploads['file3_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
											?>
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file3_display_name" value="<?php echo $mRecordUploads['file3_display_name'];?>">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file4_upload">
											<?php if($mRecordUploads['file4_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecordUploads['file4_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
											?>
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file4_display_name" value="<?php echo $mRecordUploads['file4_display_name'];?>">
										</div>
									</div>

									<div class="col-lg-3">
										<div class='form-group'>
											<label>Upload</label>
											<input type="file" class="form-control" placeholder="" name="file5_upload">
											<?php if($mRecordUploads['file5_name']!='')
											{
											?>
												<a href="<?php echo $upload_path.$mRecordUploads['file5_name'] ?>" target="_blank">View</a>
											<?php 
											}
											else
												echo "&nbsp;";
											?>
											<input type="text" class="form-control mt-2" placeholder="Please enter file name" name="file5_display_name" value="<?php echo $mRecordUploads['file5_display_name'];?>">
										</div>
									</div>

								</div>
							
								  <div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Select different levels of approvals</h5>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label>Select Level*</label>
                                    <select id="level" name="level"  class="form-control">
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
							<div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Different levels of approvals</h5>
                            </div>
								<div class="row"><?php
								$ar=$mRecordApprovers;
								
								$approver_arr=array();
								
									$found[$i][] = current(array_filter($ar, function($item) {
										global $approver_arr;
										//print_r($item);
										$level_approver = "level".$i."_approver";
										$$level_approver =  $item['buyer_name'];
										$approver_id = "approver".$i."_id";
										
										$approver_arr[$item['approver_id']]['approver_name'] = $item['buyer_name'];
										$approver_arr[$item['approver_id']]['approver_level'] = $item['approver_level'];
									
									
								}));
								global $approver_arr;
								
								foreach($approver_arr as $key=>$val)
								{
									$approver_id  = $key;
									$level = $val['approver_level'];
									$approver_name = $val['approver_name'];
									
									
								?>
								
									<div class="col-lg-2">
										<div class='form-group'>
											<label id="level<?php echo $level;?>_id">Level - <?php echo $level;?></label>
											<input type="text" class="form-control" placeholder="" name="level<?php echo $level;?>_approver" id="level<?php echo $level;?>_approver" value="<?php echo $approver_name ?>" required readonly>
											<input type="hidden" class="form-control" placeholder="" name="level<?php echo $level;?>_approver_id" id="level<?php echo $level;?>_approver_id" value="<?php echo $approver_id ?>">
										</div>
									</div>
								<?php 
								} ?>
								</div>
								<div class="row">
									<div class="col-lg-12 text-right">
										<input type="hidden" class="form-control" placeholder="" name="nfa_status"  value="<?php echo $mRecord['nfa_status'] ?>">
										<input type="hidden" class="form-control" placeholder="" name="updType"  value="<?php echo $updType; ?>">
										<input type="hidden" class="form-control" placeholder="" name="enfaNo"  value="<?php echo $mRecord['version_id']; ?>">
										<button type="submit" name="save" value="save" class="btn btn-outline-dark border-secondary mr-10 font-weight-bold rounded">Save</button>
										<button type="submit" name="submit" value="submit" class="btn btn-outline-dark border-secondary font-weight-bold rounded">Submit</button>
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
	
	<?php
	/*search_exif($mRecordReason,"Delay due to Contractor");
	function search_exif($exif, $field)
	{
		foreach ($exif as $data)
		{
			print_r()
			echo "data".$data;
			//if ($data=='Delay due to Contractor')
				//return $data['raw']['_content'];
		}
	}
*/

 $reasonLabel = array ("Delay due to Contractor","Delay due to Company","Delay due to other reasons (beyond the control of Contractors/Company)","Impact on OC/Handover Timelines" );
 function getLabelValue($label,$mRecordReason)
 {
	 
	foreach ($mRecordReason as $key => $value) 
	{ 
	 //echo $value['reason_label'];
		if($value['reason_label']=="$label")
		{
			//echo "test".$label;
			//echo $value['reason_value'];
			return $value['reason_value'];
		}

         /* $key = array_search($value['reason_label'], array_column($value, 'reason_value'));  
              echo "<br>key$key";
            if (!empty($key) || $key === 0) {  
                echo $value[$key];  
            } 
		*/
	}
 } 
   ?>  



    <script>

        function addRow() {
            let table_body = document.getElementById("bidderList"),
                first_tr = table_body.firstElementChild
            tr_clone = first_tr.cloneNode(true);

            console.log("val", tr_clone);
            table_body.append(tr_clone);
            
        }

        var rowIdx = 0;

        function addRow() {
            $('#tbody').append(`<tr id="R${++rowIdx}">
            <td class="row-index text-center">
                <p>Row ${rowIdx}</p>
            </td>
            <td class="text-center">
                <button class="btn btn-danger remove"
                  type="button">Remove</button>
                </td>
            </tr>`);
        }
		
		

		$('#level').change(function () {
			//alert("test"+$('#original_contract_value').val());
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
			//alert(user_name)
			level_val= $('#level').val();
			level_text= $( "#level option:selected" ).text();
			//alert(level_val);
			$('#level'+level_val+'_id').html(level_text);
			
			//$('#level6_approver').val("test");
			$('#level'+level_val+'_approver').val(user_name)
			$('#level'+level_val+'_approver_id').val(user_id)
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
