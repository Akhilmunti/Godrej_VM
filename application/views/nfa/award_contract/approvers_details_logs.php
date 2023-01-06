  <?php
  $CI=&get_instance();
                                            
foreach ($mRecordLogs as $key => $val) {
   
	$buyer_name = $val['buyer_name'];
	
	 $role = $val['buyer_role'];
	 $approver_id = $val['buyer_id'];
	 //$getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
	 if($approver_id==0)
	 {
		$approver_name = "Not Applicable"; 
	 }
	 if($val['nfa_status']=="SA")
		 $status = "Submitted for Approval";
	 else if($val['nfa_status']=="RT")
		 $status = "Returned for Text correction";
	 else if($val['nfa_status']=="RT")
		 $status = "Returned IOM";
	 else if($val['nfa_status']=="A")
		 $status = "Approved";
	 else if($val['nfa_status']=="AMD")
		 $status = "Amended IOM";
	
	?> 
	  <tr>
                                               
                                                <td>
                                                    <div>
                                                        <div>
                                                            <span class="font-weight-bold">Name</span>: <span class="font-size-14"><?php echo $buyer_name; ?>(<?php echo $role ?>)</span>
                                                        </div>
														<?php if($approver_id!=0)
														{
														?>
															<div>
																<span class="font-weight-bold">Status</span>: <span class="font-size-14">
																<?php echo $status ?></span>
															</div>
															
																<div>
																	<span class="font-weight-bold">Date</span>: <span class="font-size-14"><?php echo date("d-m-Y h:i:sa", strtotime($val['status_date'])) ; ?></span>
																</div>

																

															
															<?php 
														}
															
														//end of if approver_id !=0
														   ?>

                                                    </div>

                                                </td>
                                            </tr>
											<?php 

}



?>