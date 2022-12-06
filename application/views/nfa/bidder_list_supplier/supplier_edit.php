<!DOCTYPE html>
<html lang="en">

<?php
 $salient_id = $mRecordBidSupplier['salient_id'];


 $this->load->view('buyer/partials/header');
  ?>
<style>
   

	.btn-hide{
		display: none;
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
                                <h3 class="page-title br-0">Short Listing Approval for Supplier | Edit NFA</h3>
                            </div>
                            <div class="col-lg-4 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">
                            <form id="nfaForm" method="POST" action="<?php echo base_url('nfa/BidderListSupplier/actionSave/' . $mRecordBidSupplier['salient_id']); ?>" enctype="multipart/form-data" onsubmit="loader()">
                                
                          
                                <div class="d-block mt-4">
                                    <h5 class="page-title br-0 font-weight-bold">Subject</h5>
                                    <div id="subject" class="form-control" name="subject">
                                        <?php echo $mRecordBidSupplier['subject'] ?>
                                    </div>
                                </div>                               

                                
                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <label>Budget without Escalation (In crores) * </label>
                                        <input type="text" oninput="allowNumOnly(this);decimalStrict()" class="form-control decimalStrictClass onMouseOutClass onBlurClass" placeholder="" name="budget_without_escalation" id="budgetWithoutEsc" 
                                        value="<?php echo $mRecordBidSupplier['budget_without_escalation'].' Cr' ?>" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Budget with Escalation (In crores) * </label>
                                        <input  type="text" oninput="allowNumOnly(this);decimalStrict()"  class="form-control decimalStrictClass onMouseOutClass onBlurClass" placeholder="" name="budget_with_escalation"onblur="levels_approvers(this)"  id="budgetWithEsc"
                                        value="<?php echo $mRecordBidSupplier['budget_with_escalation'].' Cr' ?>" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-lg-6">
                                        <label>Material Name</label>
                                        <input type="text" class="form-control" placeholder="" name="material_name" id="material_name"  
                                        value="<?php echo $mRecordBidSupplier['material_name'] ?>">

                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                       
                                            <div class="form-check pl-0">
                                                <label class="page-title br-0 font-weight-bold mr-4">Is HO approval required</label>
                                                <input class="form-check-input" type="radio" name="ho_approval" id="ho_approval1" 
                                                value="Y" <?php echo ($mRecordBidSupplier['ho_approval'] == "Y") ? "checked" : "" ?>>
                                                
                                                <label class="form-check-label font-weight-bold" for="ho_approval1">
                                                    Yes
                                                </label>
                                                <input class="form-check-input" type="radio" name="ho_approval" id="ho_approval2" 
                                                value="N" <?php echo ($mRecordBidSupplier['ho_approval'] == "N") ? "checked" : "" ?>>
                                                
                                                <label class="form-check-label font-weight-bold" style="margin-left: 25px;" for="ho_approval2">
                                                    No
                                                </label>
                                            </div>
                                      
                                    </div>
                                </div>
                              

                                <div class="row mt-4">
                                    <div class="col-lg-12">
                                        <label>Award Strategy*</label>
                                        <textarea required="" name="award_strategy" id="award_strategy"  class="form-control" rows="4"><?php echo $mRecordBidSupplier['award_strategy'] ?> </textarea>
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
                                                <th scope="col">Name of Contractor</th>                                               
                                                <th scope="col">PQ/Feedback Score</th>
                                                <th scope="col">Bidder’s Category</th>
                                                <th scope="col">On-going / Completed</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bidderList">
                                            <?php

                                            foreach ($mRecordSubWorks as $key => $val) {
                                                $slNo  = $key + 1;
                                                $name_contractor = $val->name_contractor;
                                                $feedback_score = $val->feedback_score;
                                                $bid_category = $val->bid_category;
                                                $ongoing_complete_project = $val->ongoing_complete_project;
                                            ?>
                                                <tr class="text-center">
                                                    <td scope="row"><?php echo $slNo ?></td>
                                                    <td><input type="text" class="form-control" placeholder="" name="name_contractor[]" id="name_contractor" value="<?php echo $name_contractor; ?>" required></td>
                                                    <td>
                                                    <select id="score_type" name="score_type[]" required="" class="form-control" onchange="score_color(this);"> 
                                                        <option value="PQ">PQ</option>
                                                        <option value="FB">FB</option>
												    </select>
                                                        <input type="number" min="0" max="100" step="0.01" oninput="(validity.valid)||(value='');" class="form-control mt-3" placeholder="" name="score[]" id="score" value="<?php echo $feedback_score; ?>" required></td>
                                                    <td><input type="text" class="form-control" placeholder="" name="bid_category[]" id="bid_category" value="<?php echo $bid_category; ?>"></td>
                                                    <td><input type="text" class="form-control" placeholder="" name="ongoing_complete_project[]" id="ongoing_complete_project" value="<?php echo $ongoing_complete_project; ?>"></td>
                                                    <td> </td>
                                                </tr>
                                            <?php

                                            } ?>
                                            <tr>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row text-right mt-20">
                                    <div class="col-lg-12">
                                        <button type="button" onclick="addRow()" class="btn btn-primary rounded border-secondary mr-10">Add row</button>
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
                                                <td><input type="date" class="form-control" placeholder="" name="receipt_date" id="receipt_date" value="<?php echo $mRecordBidSupplier['receipt_date']; ?>"></td>
                                                <td><input type="date" class="form-control" placeholder="" name="bidder_approval_date" id="bidder_approval_date"  onblur="calBidderAppDays();"
                                                        value="<?php echo $mRecordBidSupplier['bidder_approval_date']; ?>">
                                                    </td>
                                                <td><input type="date" class="form-control" placeholder="" name="award_recomm_date" id="award_recomm_date"  onblur="calBidderAwdRecDays();"
                                                     value="<?php echo $mRecordBidSupplier['award_recomm_date']; ?>"></td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_date" id="remarks_date"><?php echo $mRecordBidSupplier['remarks_date']; ?></textarea>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row">No of Days (Cumulative)</th>
                                                <td><input type="text" class="form-control" placeholder="" name="receipt_days" id="receipt_days" value="<?php echo $mRecordBidSupplier['receipt_days']; ?>" readonly></td>
                                                <td><input type="text" class="form-control" placeholder="" name="bidder_approval_days" id="bidder_approval_days" value="<?php echo $mRecordBidSupplier['bidder_approval_days']; ?>" readonly></td>
                                                <td><input type="text" class="form-control" placeholder="" name="award_recomm_days" id="award_recomm_days" value="<?php echo $mRecordBidSupplier['award_recomm_days']; ?>" readonly></td>
                                                <td>
                                                    <textarea class="form-control" rows="2" name="remarks_days" id="remarks_days"><?php echo $mRecordBidSupplier['remarks_days']; ?></textarea>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div> 
                                
                                <div class="row mt-4" id="level_app">
                                    <div class="col-lg-12">
                                       
                                            <label class="font-weight-bold">Background / Description</label>
                                            <textarea class="form-control" rows="3" name="background_description" id="background_description"><?php echo $mRecordBidSupplier['background_description'];?>
                                            </textarea>
                                        
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
							 //print_r($mRecordApprovers);
							 $level_max = sizeof($mRecordApprovers);
							 $getLevels = $CI->nfaAction->getAllLevelRole_approvers('',$salient_id,"bidder_supplier");
							 //print_r($getLevels);
							 $result_maxLevel = '';
							 $mSessionZone = $this->session->userdata('session_zone');
							
							 foreach ($getLevels as $key => $valLevel) {
								 $role = $valLevel->role;
								 $approver_id = $valLevel->approver_id;
								 //$getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
								 $getUsers = $CI->getRoleUsers_approval($role,$mSessionZone);
								 
			
								
                            ?>


								<div id="pm" class="col-md-3 mb-3">
									<lable><?php echo $role;?></lable>
									<select name="approver_id[]"   class="form-control" required >
										<option disabled="" selected="" value="">Select</option>
										<option value="0" <?php echo ($approver_id==0) ? "selected": "";?>>Not Applicable</option>
										<?php  //print_r($getLevels);
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
                                 <div class="row text-right mt-20">
                                    <input type="hidden" name="subject_hd" id="subject_hd">
                                    <input type="hidden" class="form-control" placeholder="" name="nfa_status"  value="<?php echo $mRecordBidSupplier['nfa_status'] ?>">
                                    <input type="hidden" class="form-control" placeholder="" name="updType"  value="<?php echo $updType; ?>">
                                    <input type="hidden" class="form-control" placeholder="" name="enfaNo"  value="<?php echo $mRecordBidSupplier['version_id']; ?>">
                                    <input type="hidden" id="base" value="<?php echo base_url(); ?>">
                                    <input type="hidden" id="salient_id" value="<?php echo $salient_id; ?>">
							  <div class="col-lg-12">
                                        <button type="submit" name="save" value="save" id="save" class="btn btn-primary border-secondary rounded mr-10">Save</button>
                                        <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary border-secondary rounded "><div class="spinner-border spinner-border-sm btn-hide" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>  
                                        <span class="btn-txt">Submit</span></button>
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

        $(document).ready (function () {  
        $("#nfaForm").validate();  
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
            var textColumn1 = createRowColumn(newrow);
            var textColumn2 = createRowColumn(newrow);
            var textColumn3 = createRowColumn(newrow);
            var textColumn4 = createRowColumn(newrow);
            var textColumn5 = createRowColumn(newrow);
            var removeColumn = createRowColumn(newrow);

            var textbox = document.createElement("input");
            textbox.setAttribute("type", "text");
            textbox.setAttribute("class", "form-control");
            textbox.setAttribute("name", "name_contractor[]");
            textColumn.appendChild(textbox);

            var textbox1 = document.createElement("input");
            textbox1.setAttribute("type", "number");
            textbox1.setAttribute("min", "0");
            textbox1.setAttribute("class", "form-control");
            textbox1.setAttribute("name", "avg_turn_over[]");
            textColumn1.appendChild(textbox1);

            var textbox2 = document.createElement("input");
            textbox2.setAttribute("type", "number");
            textbox2.setAttribute("min", "0");
            textbox2.setAttribute("class", "form-control");
            textbox2.setAttribute("name", "bid_capacity[]");
            textColumn2.appendChild(textbox2);

            var textbox3 = document.createElement("input");
            textbox3.setAttribute("type", "number");
            textbox3.setAttribute("min", "0");
            textbox3.setAttribute("class", "form-control");
            textbox3.setAttribute("name", "feedback_score[]");
            textColumn3.appendChild(textbox3);

            var textbox4 = document.createElement("input");
            textbox4.setAttribute("type", "text");
            textbox4.setAttribute("class", "form-control");
            textbox4.setAttribute("name", "bid_category[]");
            textColumn4.appendChild(textbox4);

            var textbox5 = document.createElement("input");
            textbox5.setAttribute("type", "text");
            textbox5.setAttribute("class", "form-control");
            textbox5.setAttribute("name", "ongoing_complete_project[]");
            textColumn5.appendChild(textbox5);

            var remove = document.createElement("input");
            remove.setAttribute("type", "button");
            remove.setAttribute("value", "Delete");
            remove.setAttribute("class", "btn btn-outline-dark border-secondary rounded");
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

        //Get levels of approvers
        function levels_approvers(sender) 
        { 	


            var ho_approval = $("input[name='ho_approval']:checked").val();
            var budget_with_escalation = $("input[name=budget_with_escalation]").val();
            var salient_id = null;
           

            $.ajax({
                url: 'http://localhost/vendorGlobe/godrej/nfa/BidderListSupplier/getMaxLevelApprovers',
                    type: 'POST',
                    data: {'ho_approval':ho_approval,'budget_with_escalation':budget_with_escalation},
                    
                    success: function(data) {
                        $('#approvers_list_div').html(data);
                       
                    }
                    
                    });


        }       
       
        // change approval list according to ho_approval
        $('input[name=ho_approval]').change(function(){
            var ho_approval = $("input[name='ho_approval']:checked").val();

            levels_approvers(this);
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
            
            // Copy HTML content in hidden form
            $('#subject_hd').val(subject_html);
           

        })
		function loader(){

            $(".spinner-border").removeClass("btn-hide");
            // $("#submit").attr("disabled", true);
            $(".btn-txt").text("Submitting...");
        }
    </script>
    <script src="../../assets/js/summernote-bs4.min.js"></script>
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js" ></script>
    <script type="text/javascript" src="<?php echo base_url('assets/'); ?>vendor_plugins/nfa/validate.min.js"></script>
</body>

</html>