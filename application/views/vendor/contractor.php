


 <style type="text/css">
 .add-record  {
  color: white !important;
 }
 .add-record_2{
  color: white !important;
 }
 .add-record_3{
    color: white !important;
 }
 .wizard-content .wizard > .steps > ul > li {
  margin: 5px 10px;
 }
 </style>
           <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->     
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Stage Two Form</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Vendor Registration</h4>
                                    </div>
                                    <?php  
                                       if(isset($notification)){
                                        echo "$notification";
                                       }
                                     ?>
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <form id="register_form" action="<?php echo base_url('home/getcontractor');?>" method="POST" class=" validation-wizard wizard-circle">   <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h6><b>Preamble :</b></h6>
                                                            <p>Godrej Properties Ltd. (GPL) plans to undertake various new projects.  GPL wishes to register competent and resourceful Contractors for undertaking various works related to the projects.</p>
                                                            <br/>
                                                            <h6><b>Scope of Prequalification:</b> </h6>
                                                            <p>To identify and assess agencies on various parameters including but not limited to competency, resourcefulness, experience, management band width, etc. with a view to prequalify agencies in appropriate categories. </p>
                                                            <p>GPL reserves the right to Prequalify or otherwise any applicant without assigning any reason there for.</p>
                                                            <h6>Disclaimer: Any information provided if not correct or misrepresented, GPL has all rights to terminate the Business Associations/any Work Order/Purchase Order/Contract.</h6>
                                                            <p><b>Notes on Form of Prequalification Information</b></p><br/>
                                                            <p> • The information to be filled in by Contractors in the following pages will be used for the purposes of Prequalification.<br/>
                                                            •   This information will not be incorporated in the Contract.<br/>
                                                            •   Please fill in the latest updated information only.
                                                            <br/>
                                                            •   All fields are mandatory 
                                                            <br/>
                                                            •   Be aware that lack of information may lead to rejection.
                                                            </p>
 
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                            <!-- Step 1 -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstName5">Company Name : <span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="companyname" name="company_name" value=""> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                                            <select class="custom-select form-control required" name="type_Of_firm" id="typeoffirm" name="typeoffirm"> 
                                                                <option value="" disabled="" selected="">Select type of Firm</option>
                                                                <option>Corporate</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress">Company Registration No (Eg. CIN/Registration No) :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" name="registration_no" value="" id="emailAddress"> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Date of Incorporation :<span class="danger">*</span></label>
                                                            <input type="date" class="form-control required" id="dateofincorportion" name="date_of_incorpartion" value=""> </div>
                                                    </div>
                                                </div>
                                                <h6><b>Statutory Details</b></h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="addressline1">GSTN :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="gstn" name="GST" value=""> </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="addressline2">PF No. :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="pfno" name="PF_no" value=""> </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">PAN NO :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="panno" name="PAN_no" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Company Address & Contact Details</b></h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="url123">Address :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="vaddress" name="address" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username123">Telephone :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control required" id="phno" name="contact_number" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password123">Fax :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="fax" name="fax" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Website :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="website" name="website" value="" placeholder="http://">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name of Contact Person :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="nameofcontactper" name="contact_person" value="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email of the Contact Person :<span class="danger">*</span></label>
                                                            <input type="email" class="form-control required" id="emailofcontactper" name="email" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>No. of years as Contractor : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control required" id="noofyconsultant" name="no_of_years_contractor" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Type of Work for which Prequalification is sought : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                         <fieldset>
                                                            <input type="checkbox" id="checkbox_1" name="type_of_work[]" value="" >
                                                            <label class="form-check-label" for="checkbox_1">Excavation & Shore Piling
                                                               </label>
                                                            
                                                         </fieldset>
                                                         <fieldset>
                                                             <input class="form-check-input" type="checkbox" id="checkbox_2"  name ="type_of_work[]"value="Core & Shell" required>
                                                            <label class="form-check-label" for="checkbox_2">Core & Shell</label>
   
                                                         </fieldset>
                                                         <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_3" name="type_of_work[]"  value="Finishes (all trades)"  >
                                                            <label class="form-check-label" for="checkbox_3" >Finishes (all trades)</label>
                                                         </fieldset> 
                                                       <fieldset>
                                                        <input class="form-check-input" type="checkbox" id="checkbox_4" name="type_of_work[]" value="HVAC"  >
                                                        <label class="form-check-label" for="checkbox_4">HVAC</label>
                                                       </fieldset>
                                                            
                                                        <fieldset>
                                                           <input class="form-check-input" type="checkbox" id="checkbox_5" name="type_of_work[]" value="Plumbing"  >
                                                            <label class="form-check-label" for="checkbox_5" required>Plumbing</label> 
                                                        </fieldset> 
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_6" name="type_of_work[]" value="Firefighting"  >
                                                            <label class="form-check-label" for="checkbox_6">Firefighting</label>
                                                        </fieldset>  
                                                        <fieldset>
                                                             <input class="form-check-input" type="checkbox" id="checkbox_7" name="type_of_work[]"value="Electrical"  >
                                                            <label class="form-check-label" for="checkbox_7">Electrical</label>

                                                        </fieldset>
                                                           
                                                        </div>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_8" name="type_of_work[]" value="External development including boundary wall"  >
                                                            <label class="form-check-label" for="checkbox_8">External development including boundary wall</label> 
                                                        </fieldset>
                                                        <fieldset>
                                                             <input class="form-check-input" type="checkbox" id="checkbox_9"  name="type_of_work[]"value="Landscaping"  >
                                                            <label class="form-check-label" for="checkbox_9">Landscaping</label>
                                                       
                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_10" name="type_of_work[]" value="Water Proofing"  >
                                                            <label class="form-check-label" for="checkbox_10">Water Proofing</label>

                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_11" name="type_of_work[]" value="STP & WTP"  >
                                                            <label class="form-check-label" for="checkbox_11">STP & WTP</label>

                                                        </fieldset>
                                                        <fieldset> 
                                                            <input class="form-check-input" type="checkbox" id="checkbox_12" name="type_of_work[]" value="Miscellaneous works (Any type of work not mentioned above)"  >
                                                            <label class="form-check-label" for="checkbox_12">Miscellaneous works (Any type of work not mentioned above)</label>

                                                        </fieldset></label>

                                                        </fieldset>
                                                         
                                                        
                                                    </div>
                                                </div>

                                                <h6><b>Details of Work Performed as a Consultant for in last 5 years</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="form-control required" id="detailsofworkprfm" name="details_of_work_last_3years[]"> 
                                                                <option value="" disabled="" selected="" >Select Jobs in Last 5 Years</option>
                                                                <option value="More than 10 completed jobs in last 5 years">More than 10 completed jobs in last 5 years</option>
                                                                <option value="More than 5 completed jobs in last 5 years">More than 5 completed jobs in last 5 years</option>
                                                                <option value="Less than 5 completed jobs in last 5 years">Less than 5 completed jobs in last 5 years</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <div class="well clearfix">
                                                                <a class="btn btn-primary pull-right add-record" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                                              </div><br/>
                                                             <table class="table table-bordered" id="tbl_posts">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Action</th>
                                                                    <th>#</th>
                                                                    <th>Name of Client, Client’s representative  & contact details</th>
                                                                    <th>Project Description</th>
                                                                    <th>Contract ValueRs.</th>
                                                                    <th>Start  Date</th>
                                                                    <th>Completion Date</th>
                                                                    
                                                                  </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_body">
                                                                  
                                                                </tbody>
                                                              </table>
                                                            </div>  
                                                         <div style="display:none;">
                                                            
                                                            <table id="sample_table">
                                                              <tr id="">
                                                                <td><a class="btn btn-xs delete-record" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                               <td><span class="sn"></span>.</td>
                                                               <td><input id="clintName" name="field_1[]" value="" type="text1"  ></td>
                                                               <td><input type="text" name="field_1[]" value=""></td>
                                                               <td><input type="text" name="field_1[]" value=""></td>
                                                               <td><input type="date" name="field_1[]" value=""></td>
                                                               <td><input type="date" name="field_1[]" value=""></td>
                                                               
                                                             </tr>
                                                           </table>
                                                        </div> 
                                                        <div class="form-control">
                                                            <input type="file" name="file" value="" class="form-group" required>
 
                                                        </div> 
                                                    </div>
                                                </div>
                                                <h6></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                             <fieldset>
                                                                <input type="checkbox" id="checkbox_13" name="fieldcheckbox1[]" value="More than 6" >
                                                                <label class="form-check-label" for="checkbox_13">More than 6
                                                                   </label>
                                                                
                                                             </fieldset>
                                                             <fieldset>
                                                                 <input class="form-check-input" type="checkbox" id="checkbox_14"  name ="fieldcheckbox1[]"value="3 to 6"  >
                                                                <label class="form-check-label" for="checkbox_14">3 to 6</label>
       
                                                             </fieldset>
                                                             <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_15" name="fieldcheckbox1[]"  value="1 to 2"  >
                                                                <label class="form-check-label" for="checkbox_15" >1 to 2</label>
                                                             </fieldset> 
                                                         </div>
                                                     </div>
                                                </div>
                                                <h6><b>Details of Current Work/Deliveries in Progress </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                             <fieldset>
                                                                <input type="checkbox" id="checkbox_16" name="details_of_corrent_work[]" value="Registered with or having work order from 4 and more reputed developers"  >
                                                                <label class="form-check-label" for="checkbox_16">Registered with or having work order from 4 and more reputed developers
                                                                   </label>
                                                                
                                                             </fieldset>
                                                             <fieldset>
                                                                 <input class="form-check-input" type="checkbox" id="checkbox_17"  name ="details_of_corrent_work[]"value="Registered with or having work order from 2 and more reputed developers"  >
                                                                <label class="form-check-label" for="checkbox_17">Registered with or having work order from 2 and more reputed developers</label>
       
                                                             </fieldset>
                                                             <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_18" name="details_of_corrent_work[]"  value="Registered with or having work order from only 1 reputed developer"  >
                                                                <label class="form-check-label" for="checkbox_18" >Registered with or having work order from only 1 reputed developer</label>
                                                             </fieldset> 
                                                         </div>
                                                     </div>
                                                </div>
                                                 <br/>
                                                <h6><b>Total Value of completed works/PO each year </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <div class="well clearfix">
                                                                <a class="btn btn-primary pull-right add-record_3" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                                              </div><br/>
                                                            <table class="table table-bordered" id="tbl_posts_3">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Action</th>
                                                                    <th>#</th>
                                                                    <th>Name of Client, Client’s Representative & Contact Details</th>
                                                                    <th>Project</th>
                                                                    <th>Scope of Work</th>
                                                                    <th>Work Order Value Rs.(In Crores)</th>
                                                                    <th>Total Billed Value(In Crores)</th>
                                                                    <th>Start  Date</th>
                                                                    <th>Target Completion Date</th>
                                                                    
                                                                  </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_3_body">
                                                                  
                                                                </tbody>
                                                              </table>
                                                            </div> 
                                                           
                                                             
                                                         <div style="display:none;">
                                                            
                                                            <table id="sample_table_3">
                                                              <tr id="">
                                                              <td><a class="btn btn-xs delete-record_3" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                               <td><span class="sn"></span>.</td>
                                                               <td><input type="text" name="total_value_of_completed_works_PO[]"></td>
                                                               <td><input type="text" name="total_value_of_completed_works_PO[]"></td>
                                                               <td><input type="text" name="total_value_of_completed_works_PO[]"></td>
                                                               <td><input type="text" name="total_value_of_completed_works_PO[]"></td>
                                                               <td><input type="text" name="total_value_of_completed_works_PO[]"></td>
                                                               <td><input type="date" name="total_value_of_completed_works_PO[]"></td>
                                                               <td><input type="date" name="total_value_of_completed_works_PO[]"></td>
                                                               
                                                             </tr>
                                                           </table>
                                                        </div>  
                                                        <div class="form-control">
                                                            <input type="file" value="" name="attechment" class="form-group"required>
 
                                                        </div>
                                                    </div>
                                                </div> 
                                                 
                                            </section>
                                            <!-- Step 2 -->
                                            <h6></h6>
                                            <section>
                                                 <h6><b>Human Resource-Own Employees </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" >
                                                                <thead>
                                                                  <tr> 
                                                                    <th>Particulars</th>
                                                                    <th>Total</th>  
                                                                  </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_5_body">
                                                                   <td>Total No. of Staffs Currently on Payroll</td>
                                                               <td><input type="text" name="HR_own_employees" value="">
                                                                </tbody>
                                                              </table>
                                                            </div> 
                                                    </div>
                                                </div>
                                                
                                            </section>
                                            <!-- Step 3 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>Financial Referees/References </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="well clearfix">
                                                                <a class="btn btn-primary pull-right add-record_4" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                                              </div><br>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="tbl_posts_4">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Action</th>
                                                                    <th>#</th>
                                                                    <th>Bank/Financial Institution</th>
                                                                    <th>Name of Referee</th>
                                                                    <th>Position</th>
                                                                    <th>Contact Details</th> 
                                                                    
                                                                  </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_4_body">
                                                                  
                                                                </tbody>
                                                              </table>
                                                            </div> 
                                                           
                                                             
                                                         <div style="display:none;">
                                                            
                                                            <table id="sample_table_4">
                                                              <tr id="">
                                                               <td><a class="btn btn-xs delete-record_4" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                               <td><span class="sn"></span>.</td>
                                                               <td><input type="text" name="financial_referees[]"></td>
                                                               <td><input type="text" name="financial_referees[]"></td>
                                                               <td><input type="text" name="financial_referees[]"></td>
                                                               <td><input type="text" name="financial_referees[]"></td> 
                                                              
                                                             </tr>
                                                           </table>
                                                        </div> 
                                                        <div class="form-control">
                                                            <input type="file"  name="attechment2 " class="form-group" value="" required>
                                                            <label>Attach Solvency Certificate from Bank confirming that the company’s bank      account is in a good standing </label>
                                                        </div>
                                                    </div>
                                                </div>
                                               <h6><b></b></h6>
                                               <div class="row">
                                                    <div class="col-12">
                                                         <div class="box">
                                                            <!-- /.box-header -->
                                                           <div class="box-body">
                                                              <div class="table-responsive-sm">
                                                                <table class="table table-bordered table-separated"  >
                                                                 <tr>
                                                                    <th rowspan="2" >Financial Information in Rs.</th>
                                                                    <th colspan="4" style="text-align:center;">Audited Balance Sheet data for 4 years (In Crores)</th> 
                                                                  </tr>
                                                                  <tr> 
                                                                    <td>Year 1 (to change as per the FY)</td>
                                                                    <td>Year 2 (to change as per the FY)</td>
                                                                    <td>Year 3 (to change as per the FY)</td>
                                                                   
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Total Assets</td>
                                                                    <td><input type="text" name="actual_previous_three_years[0][Total Assets]"> </td>
                                                                    <td><input type="text" name="actual_previous_three_years[0][Total Assets]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[0][Total Assets]"></td> 
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Current Assets</td>
                                                                    <td><input type="text" name="actual_previous_three_years[1][Current Assets]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[1][Current Assets]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[1][Current Assets]"></td>
                                                                    

                                                                  </tr>
                                                                  <tr>
                                                                    <td>Total Liabilities</td>
                                                                    <td><input type="text" name="actual_previous_three_years[2][Total Liabilities]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[2][Total Liabilities]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[2][Total Liabilities]"></td>
                                                                    
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Current Liabilities</td>
                                                                    <td><input type="text" name="actual_previous_three_years[3][Current Liabilities]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[3][Current Liabilities]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[3][Current Liabilities]"></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Turnover</td>
                                                                    <td>1 Cr</td>
                                                                    <td>1 Cr</td>
                                                                    <td>1 Cr</td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Profits before Taxes</td>
                                                                    <td><input type="text" name="actual_previous_three_years[4][Profits before Taxes]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[4][Profits before Taxes]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[4][Profits before Taxes]"></td>
                                                                  </tr>
                                                                  <tr>
                                                                    <td>Profits after Taxes</td>
                                                                    <td><input type="text" name="actual_previous_three_years[Profits after Taxes][Profits after Taxes]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[Profits after Taxes][Profits after Taxes]"></td>
                                                                    <td><input type="text" name="actual_previous_three_years[Profits after Taxes][Profits after Taxes]"></td>
                                                                  </tr>
                                                                </table>
                                                               </div> 
                                                           </div>
                                                           <!-- /.box-body -->
                                                         </div>
                                                           <!-- /.box -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="box">
                                                        <div class="box-body">  
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Working Capital - Current ratio</td>
                                                                            <td>10</td>
                                                                            <td>> 1.5 - 10 marks,
                                                                             1.5 to 1.15 - 7 marks 
                                                                             1.14 to 1 - 5 marks
                                                                            < 1  0 marks
                                                                            </td> 
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Profit Ratio (Current year Vs. Last 3 years average profit)</td>
                                                                            <td>10</td>
                                                                            <td>> 1.25- 10 marks
                                                                            <1.25 > 1.15 5 marks
                                                                            < 1.15 > 1- 3 mark
                                                                            < 1 0 marks
                                                                            </td> 
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Growth (Turnover of Current year over Average turnover of last 3 years)</td>
                                                                            <td>10</td>
                                                                            <td>> 1.20 - 10 marks
                                                                            1.2 to 1.05 - 7 marks
                                                                            < 1.05 > 1 - 3 mark
                                                                            <1 0 marks
                                                                            </td> 
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Step 4 -->
                                            <h6></h6>
                                            <section>
                                                    <h6><b>Quality Assurance / Control </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                             <fieldset>
                                                                <input type="checkbox" id="checkbox_19" name="quality_assurance_control[]" value="BOTH ISO: 9001 CERTIFIED & 45001 CERTIFIED"  >
                                                                <label class="form-check-label" for="checkbox_19">BOTH ISO: 9001 CERTIFIED & 45001 CERTIFIED
                                                                   </label>
                                                                
                                                             </fieldset>
                                                             <fieldset>
                                                                 <input class="form-check-input" type="checkbox" id="checkbox_20"  name ="quality_assurance_control[]"value="EITHER ISO 9001 OR 45001 CERTIFIED"  >
                                                                <label class="form-check-label" for="checkbox_20">EITHER ISO 9001 OR 45001 CERTIFIED</label>
       
                                                             </fieldset>
                                                              
                                                         </div>
                                                     </div>
                                                </div>
                                                 <h6><b> What type of brand does vendor represent : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                     <div class="col-12">
                                                      <div class="box"> 
                                                      <div class="box-body">                
                                                        <div class="table-responsive">
                                                                <table id="mainTable" class="table editable-table table-bordered mb-0">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Does your company maintain a current…..</th>
                                                                            <th>Yes / No</th> 
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                <tr>
                                                                           <td>Quality Assurance Program?</td>
                                                                           <td>
                                    <div class="controls">
                                    <fieldset>
                                        <input name="quality_assurance[0][Quality Assurance Program]" type="radio" id="radio_1" value="Yes"  >
                                        <label for="radio_1">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="quality_assurance[0][Quality Assurance Program]" type="radio" id="radio_2" value="No">
                                        <label for="radio_2">Or Me</label>
                                    </fieldset>
                                </div>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td>ISO 9001 certification</td>
                                                                           <td>
                                    <div class="controls">
                                    <fieldset>
                                        <input name="quality_assurance[1][ISO 9001 certification]" type="radio" id="radio_3" value="Yes"  >
                                        <label for="radio_3">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="quality_assurance[1][ISO 9001 certification]" type="radio" id="radio_4" value="No">
                                        <label for="radio_4">Or Me</label>
                                    </fieldset>
                                </div>
                                                                           </td>
                                                                        </tr>
                                                                          <tr>
                                                                           <td>ISO 45001 certification</td>
                                                                           <td>
                                    <div class="controls">
                                    <fieldset>
                                        <input name="quality_assurance[2][ISO 45001 certification]" type="radio" id="radio_5" value="Yes"   >
                                        <label for="radio_5">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="quality_assurance[2][ISO 45001 certification]" type="radio" id="radio_6" value="No">
                                        <label for="radio_6">Or Me</label>
                                    </fieldset>
                                </div>
                                                                           </td>
                                                                        </tr>
                                                                          <tr>
                                                                           <td>Other Certificates & Awards</td>
                                                                           <td>
                                    <div class="controls">
                                    <fieldset>
                                        <input name="quality_assurance[3][Other Certificates & Awards]" type="radio" id="radio_7" value="Yes"   >
                                        <label for="radio_7">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="quality_assurance[3][Other Certificates & Awards]" type="radio" id="radio_8" value="No">
                                        <label for="radio_8">Or Me</label>
                                    </fieldset>
                                </div>
                                                                           </td>
                                                                        </tr>
                                                                         <tr>
                                                                           <td>Industry Accepted Quality Assurance Program</td>
                                                                           <td>
                                    <div class="controls">
                                    <fieldset>
                                        <input name="quality_assurance[4][Industry Accepted Quality Assurance Program]" type="radio" id="radio_9" value="Yes"  >
                                        <label for="radio_9">Check Me</label>
                                    </fieldset>
                                    <fieldset>
                                        <input name="quality_assurance[4][Industry Accepted Quality Assurance Program]" type="radio" id="radio_10" value="No">
                                        <label for="radio_10">Or Me</label>
                                    </fieldset>
                                </div>
                                                                           </td>
                                                                        </tr>

                                                                        
                                                                    </tbody> 
                                                                </table>
                                                            </div>
                                                      </div>
                                                    </div>
                                                </div> 
                                                </div>
                                            </section>
                                            <!-- Step 5 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>Provide all the site names where the projects are in progress and completed (in last 3 years)</b></h6>
                                                <div class="row"> 
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username123">A :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control required" id="websiteA" name="visited_website[0][A]" placeholder="http://">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password123">B :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="websiteB" name="visited_website[1][B]" placeholder="http://">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>C :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="websiteC" name="visited_website[2][C]" placeholder="http://">
                                                        </div>
                                                    </div> 
                                                </div>
                                            </section>
                                            <!-- Step 6 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>CERTIFICATIONS/AWARDS</b></h6>
                                                <p> <span><input class="form-control-sm form-control" type="text" name="field_5" value="" required /></span> Proprietor/ Partner/ Director of M/s <span><input class="form-control-sm form-control" type="text" name="field_6" value="" required /></span> hereby confirm that, to the best of my knowledge and information there is no default/ contravention of various laws enactments etc applicable to our firm generally and in particular the following enactments and/or order, rules etc. Made hereunder up to the date of this certificate.</p>
                                                <p>
                                                    1.  Minimum Wages Act, 1948 <br>
                                                    2.  BOCW Act, 1996 <br>
                                                    3.  Companies Act, 1956 <br>
                                                    4.  Central Excises & Salt Act, 1944 <br>
                                                    5.  Central Sales Act, 1956 and Local Sales Tax Laws <br>
                                                    6.  Income Tax Act, 1961 <br>
                                                    7.  Customs Act, 1962 <br>
                                                    8.  Foreign Exchange Management Act, 1999 <br>
                                                    9.  Industries (Development & Regulation) Act, 1951 <br>
                                                    10. Water (Prevention & Control of Pollution) Act, 1974 <br>
                                                    11. Air (Prevention & Control of Pollution) Act, 1981 <br>
                                                    12. The Environment (Protection) Act, 1986 <br>
                                                    13. Factories Act, 1948 <br>
                                                    14. Employee’s State Insurance Act, 1948 <br>
                                                    15. Employee’s Provident Fund and Miscellaneous Provision Act, 1952 <br>
                                                    16. All State enactments governing the working of the Company <br>
                                                </p>
                                                <p>
                                                    During the period covered by this certificate, the Company has made proper deductions applicable and has deposited with the concerned authorities, within prescribed time, all statutory dues such as Excise Duty, Sales Tax, Income Tax, Custom Duty, Provident Fund, ESI Contributions, etc....
                                                </p>
                                                <p>
                                                    The relevant returns under various Laws/Rules applicable to the Company have been duly filled in time with the concerned authorities.
                                                </p> 
                                            </section>
                                            <!-- Step 7 -->
                                            <h6></h6>
                                            <section>
                                                
                                                <div class="row">  
                                                    <div class="col-6">
                                                    <input class="form-check-input" type="checkbox" id="checkbox_21" name="conformation" value="1" required>
                                                    <label class="form-check-label" for="checkbox_21">Further, I certify that the information given elsewhere in this document is correct as per my knowledge and understanding</label>
                                                    </div>
                                                   
                                                </div>

                                            </section>
                                            <!-- End -->
                                        </form>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                    </section>
                    <!-- /.content -->
                </div>
            </div> 