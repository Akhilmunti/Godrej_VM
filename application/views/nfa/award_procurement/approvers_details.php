  <?php
  $CI=&get_instance();
                                            
foreach ($mRecordLevels as $key => $val) {
   // $approver_id  = $key;
	$level = $val['level'];
	$approver_name = $val['approver_name'];
	
	 $role = $val['role'];
	 $approver_id = $val['approver_id'];
	 //$getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
	 if($approver_id==0)
	 {
		$approver_name = "Not Applicable"; 
	 }
	 else
	 {
		$getUser = $CI->getRoleUsers_approval($role,$mSessionZone,$approver_id);
		//print_r($getUser);
		$approver_name = $getUser[0]->buyer_name;
	 }
	?> 
	  <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Level <?php echo $level; ?> Approver(<?php echo $role ?>)</td>
                                                <td>
                                                    <div>
                                                        <div>
                                                            <span class="font-weight-bold">Approver Name</span>: <span class="font-size-14"><?php echo $approver_name; ?></span>
                                                        </div>
														<?php if($approver_id!=0)
														{
														?>
															<div>
																<span class="font-weight-bold">Status</span>: <span class="font-size-14">
																<?php echo ($val['approved_status'] == 0) ? "Approval Pending" : "Approved" ?></span>
															</div>
															<?php
															if ($val['approved_status'] == 1)
															{
																?>
																<div>
																	<span class="font-weight-bold">Approve Remarks</span>: <span class="font-size-14"><?php echo $val['approved_remarks'] ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Approved Date</span>: <span class="font-size-14"><?php
																	if ($val['approved_status'] == 1)
																		echo date("d-M-y h:i:sa", strtotime($val['approved_date'])) ;?></span>
																</div>

															
															<?php 
															}
															if ($val['returned_text_status'] == 1) {
															?>
																<hr class='hr-bold-line' />

																<div>
																	<span class="font-weight-bold"><?php 
																	
																	
																		echo "Returned for Text correction" ; ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Remarks</span>: <span class="font-size-14"><?php echo $val['returned_text_remarks'] ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Returned Date for text correction</span>: <span class="font-size-14"><?php echo date("d-M-y h:i:sa", strtotime($val['returned_text_date']));?></span>
																</div>

														   <?php
																} //end of if text correction
																
																
															if ($val['returned_by']  != 0) {
															?>
																<hr class='hr-bold-line' />

																<div>
																	<span class="font-weight-bold"><?php 
																	
																	
																		echo "Returned IOM" ; ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Remarks</span>: <span class="font-size-14"><?php echo $val['returned_remarks'] ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Returned Date</span>: <span class="font-size-14"><?php echo date("d-M-y h:i:sa", strtotime($val['returned_date']));?></span>
																</div>

														   <?php
																} //end of if returned
																
															if ($val['amended_by']  != 0) {
															?>
																<hr class='hr-bold-line' />

																<div>
																	<span class="font-weight-bold"><?php 
																	
																	
																		echo "Amended IOM" ; ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Remarks</span>: <span class="font-size-14"><?php echo $val['amended_remarks'] ?></span>
																</div>

																<div>
																	<span class="font-weight-bold">Amended Date</span>: <span class="font-size-14"><?php echo date("d-M-y h:i:sa", strtotime($val['amended_date']));?></span>
																</div>

														   <?php
																} //end of if returned
														}//end of if approver_id !=0
														   ?>

                                                    </div>

                                                </td>
                                            </tr>
											<?php 
/*	 
?>
	<tr>
		<td class='font-weight-bold' style="width: 60%;">Level <?php echo $level; ?> Approver(<?php echo $role ?>)</td>
		<td><?php echo $approver_name; 
		
		
		if($approver_id!=0)
		 {
			?>
				- <?php echo ($val['approved_status'] == 0) ? "Approval Pending" : "Approved" ?><br>
				<?php
				if ($val['approved_status'] == 1)
					echo "Approved Date: " . date("d-m-Y h:i:sa", strtotime($val['approved_date'])) . "<br>";
				if ($val['returned_text_status'] == 1) {
					echo "Returned for Text correction" . "<br>";
					echo "Remarks: " . $val['returned_text_remarks'] . "<br>";
					//echo "Returned Date for text correction: ".$val['returned_text_date']."<br>";
					echo "Returned Date for text correction: " . date("d-m-Y h:i:sa", strtotime($val['returned_text_date'])) . "<br>";
				}
				if ($val['returned_by'] != 0) {

					echo "Returned IOM" . "<br>";
					echo "Remarks: " . $val['returned_remarks'] . "<br>";
					echo "Returned Date: " . date("d-m-Y h:i:sa", strtotime($val['returned_date'])) . "<br>";
					//$date=date_create($val['returned_date']);
					//echo date_format($date,"Y/m/d h:i:sa");
				}
				if ($val['amended_by'] != 0) {

					echo "Amended IOM" . "<br>";
					echo "Remarks: " . $val['amended_remarks'] . "<br>";
					echo "Amended Date: " . date("d-m-Y h:i:sa", strtotime($val['amended_date'])) . "<br>";
				}
				
		 } //end of approver id checking
			?>
			
			</td>
	</tr>
<?php
*/
}



?>