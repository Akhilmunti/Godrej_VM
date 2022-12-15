  <?php
  $CI=&get_instance();
                                            
foreach ($mRecordLevels as $key => $val) {
 
	$level = $val['level'];
	$approver_name = $val['approver_name'];
	
	 $role = $val['role'];
	 $approver_id = $val['approver_id'];
	 
	 if($approver_id==0)
	 {
		$approver_name = "Not Applicable"; 
	 }
	 else
	 {
		$getUser = $CI->getRoleUsers_approval($role,$mSessionZone,$approver_id);
		
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

}
?>