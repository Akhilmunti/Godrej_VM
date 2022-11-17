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
                                        <form id="register_form" action="<?php echo base_url('home/getConsultant');?>" method="POST"  class=" validation-wizard wizard-circle">  <h6></h6>
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
                                                            <input type="text" class="form-control required" id="companyname" name="company_name"> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                                            <select class="custom-select form-control required" id="typeoffirm" name="type_Of_firm"> 
                                                                <option value="" disabled="" selected="">Select type of Firm</option>
                                                                <option value="Corporate">Corporate</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress">Company Registration No (Eg. CIN/Registration No) :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="" name="registration_no" value=""> </div>
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
                                                <h6><b>No. of years as Vendor : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control required" id="noofyconsultant" name="no_of_years_vendor" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Type of Work for which Prequalification is sought : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                         <fieldset>
                                                            <input type="checkbox" id="checkbox_1" name="type_of_work[]" value="Structural Design" >
                                                            <label class="form-check-label" for="checkbox_1">Structural Design
                                                               </label>
                                                            
                                                         </fieldset>
                                                         <fieldset>
                                                             <input class="form-check-input" type="checkbox" id="checkbox_2"  name ="type_of_work[]"value="Services Design" >
                                                            <label class="form-check-label" for="checkbox_2">Services Design</label>
   
                                                         </fieldset>
                                                         <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_3" name="type_of_work[]"  value="Geo – Technical Investigation" >
                                                            <label class="form-check-label" for="checkbox_3" >Geo – Technical Investigation</label>
                                                         </fieldset> 
                                                       <fieldset>
                                                        <input class="form-check-input" type="checkbox" id="checkbox_4" name="type_of_work[]" value="Topographical Survey" >
                                                        <label class="form-check-label" for="checkbox_4">Topographical Survey</label>
                                                       </fieldset>
                                                            
                                                        <fieldset>
                                                           <input class="form-check-input" type="checkbox" id="checkbox_5" name="type_of_work[]" value="Quantity Survey & Cost Planning" >
                                                            <label class="form-check-label" for="checkbox_5" >Quantity Survey & Cost Planning</label> 
                                                        </fieldset> 
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_6" name="type_of_work[]" value="PMC" >
                                                            <label class="form-check-label" for="checkbox_6">PMC</label>
                                                        </fieldset>  
                                                        <fieldset>
                                                             <input class="form-check-input" type="checkbox" id="checkbox_8" name="type_of_work[]"value="Miscellaneous (any service not mentioned above)" >
                                                            <label class="form-check-label" for="checkbox_8">Miscellaneous (any service not mentioned above)</label>

                                                        </fieldset> 
                                                        </div> 
                                                    </div>
                                                </div>
                                                <h6 class=" mt-10"><b>Details of Work Performed as a Consultant for in last 5 years :  </b></h6>
                                                <div class="row">
                                                   <div class="col-md-12">
                                                        <div class="controls">
                                                         <fieldset>
                                                            <input type="checkbox" id="checkbox_9" name="work_performed[]" value="More than 10 completed jobs in last 5 years">
                                                            <label class="form-check-label" for="checkbox_9">More than 10 completed jobs in last 5 years
                                                               </label>
                                                            
                                                         </fieldset>
                                                         <fieldset>
                                                             <input class="form-check-input" type="checkbox" id="checkbox_10"  name ="work_performed[]"value="More than 5 completed jobs in last 5 years">
                                                            <label class="form-check-label" for="checkbox_10">More than 5 completed jobs in last 5 years</label>
   
                                                         </fieldset>
                                                         <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_11" name="work_performed[]"  value="Less than 5 completed jobs in last 5 years">
                                                            <label class="form-check-label" for="checkbox_11" >Less than 5 completed jobs in last 5 years</label>
                                                         </fieldset>  
                                                         <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_12" name="work_performed[]"  value="More than 5 in last 5 years" >
                                                            <label class="form-check-label" for="checkbox_12" >More than 5 in last 5 years</label>
                                                         </fieldset>
                                                         <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_13" name="work_performed[]"  value="Between 2 & 5 in the last 5 years" >
                                                            <label class="form-check-label" for="checkbox_13" >Between 2 & 5 in the last 5 years</label>
                                                         </fieldset>
                                                         <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_14" name="work_performed[]"  value="At least 1 in the last 5 years">
                                                            <label class="form-check-label" for="checkbox_14" >At least 1 in the last 5 years</label>
                                                         </fieldset>
                                                        </div> 
                                                    </div>
                                                </div> 
                                                <div class="row">  
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
                                                                    <th>Scope of Work</th>
                                                                    <th>Work Order Value Rs.(In Crores)</th>
                                                                    <th>Start  Date</th>
                                                                    <th>Completion Date</th>
                                                                    <th>Certificates References/ Recommendations from Clients</th>
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
                                                               <td><input id="clintName" name="field_1[]" value="" type="text1" name=""></td>
                                                               <td><input type="text1" name="   field_1[]" value=""></td>
                                                               <td><input type="text1" name="   field_1[]" value=""></td>
                                                               <td><input type="text1" name="   field_1[]" value=""></td>
                                                               <td><input type="date" name="    field_1[]" value=""></td>
                                                               <td><input type="date" name="    field_1[]" value=""></td>
                                                               <td><input type="file" name="    field_1[]" value=""></td>
                                                               
                                                             </tr>
                                                           </table>
                                                        </div>  
                                                    </div>
                                                </div><br>
                                                <h6><b>Details of Current Work/Deliveries in Progress </b></h6>
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <div class="well clearfix">
                                                                <a class="btn btn-primary pull-right add-record_2" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                                              </div><br/>
                                                            <table class="table table-bordered" id="tbl_posts_2">
                                                                <thead>
                                                                  <tr>
                                                                    <th>Action</th>
                                                                    <th>#</th>
                                                                    <th>Name of Client, Client’s representative  & contact details</th>
                                                                    <th>Project</th>
                                                                    <th>Scope of Work</th>
                                                                    <th>Work Order Value Rs.(In Crores)</th>
                                                                    <th>Total Billed Value(In Crores)</th>
                                                                    <th>Start  Date</th>
                                                                    <th>Completion Due Date</th>
                                                                    
                                                                  </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_2_body">
                                                                  
                                                                </tbody>
                                                              </table>
                                                            </div> 
                                                           
                                                             
                                                         <div style="display:none;">
                                                            
                                                            <table id="sample_table_2">
                                                              <tr id="">
                                                              <td><a class="btn btn-xs delete-record_2" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                               <td><span class="sn"></span>.</td>
                                                               <td><input type="text1" name="detailsof_current_work[]" value=""></td>
                                                               <td><input type="text1" name="detailsof_current_work[]" value=""></td>
                                                               <td><input type="text1" name="detailsof_current_work[]" value=""></td>
                                                               <td><input type="text1" name="detailsof_current_work[]" value=""></td>
                                                               <td><input type="text1" name="detailsof_current_work[]" value=""></td>
                                                               <td><input type="date" name="detailsof_current_work[]" value=""></td>
                                                               <td><input type="date" name="detailsof_current_work[]" value=""></td>
                                                               
                                                             </tr>
                                                           </table>
                                                        </div> 
                                                        <div class="form-control">
                                                            <h6>Attachment</h6>
                                                            <input type="file" value="" name="attachment" class="form-group" value="">
                                                        </div>
                                                    </div>
                                                </div><br/> 
                                                  
                                            </section>
                                            <!-- Step 2 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>Human Resource-Own Employees</b></h6>
                                                <p>Indicate total number of staff currently on payroll in the different areas of expertise</p>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Particulars</th>
                                                                        <th>Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h6>Total Technical Staff as of Now</h6>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number"  name="HR_own_employees[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                           <h6>Total Technical Staff in Previous FY</h6>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="HR_own_employees[]" value=""  />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h6>Total Technical Staff in Pre Previous FY</h6>
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number"  name="HR_own_employees[]" value="" />
                                                                        </td>
                                                                    </tr> 
                                                                    <tr> 
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>

                                                </div>
                                                <h6><b>Attrition Rate of Employees</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-control">
                                                            <select class="custom-select form-control required" name="attrition_rate_of_employees[]" > 
                                                                <option value="" disabled="" selected="">Select Attrition Rate of Employees</option>
                                                                <option value="Average < 10% over last 3 years">Average < 10% over last 3 years</option>
                                                                <option value="Average > 10% : < 20% over last 3 years">Average > 10% : < 20% over last 3 years</option>
                                                                <option value="Average > 20% over last 3 years">Average > 20% over last 3 years</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Automation Capability/Resources</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            CADD System 
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="automation_capability[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Database Standards
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="automation_capability[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Engineering Planning & Controls
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="automation_capability[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Engineering Tools
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="automation_capability[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Document Management System
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="automation_capability[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Software/App/ERP System
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="text" name="automation_capability[]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                </div> 
                                            </section>
                                            <!-- Step 3 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>Professional Indemnity Insurance</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-control">
                                                            <select class="custom-select form-control required" required name="professional_indemnity_insurance[]"> 
                                                                <option selected="" value="" disabled="">Select Indemnity Insurance</option>
                                                                <option value=" Rs. 10 crore">> Rs. 10 crore</option>
                                                                <option value="Rs. 5 Crore">> Rs. 5 Crore ; < Rs. 10crores</option>
                                                                <option value="< Rs. 5 Crore">< Rs. 5 Crore</option>
                                                                <option value="No PLI cover">No PLI cover</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Step 4 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>Financial Referees/References</b></h6>
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
                                                                    <th>Bank/Financial Institution</th>
                                                                    <th>Name of Referee</th>
                                                                    <th>Position</th>
                                                                    <th>Contact Details</th> 
                                                                    
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
                                                               <td><input type="text" name="financial_referees[]" value=""></td>
                                                               <td><input type="text" name="financial_referees[]" value=""></td>
                                                               <td><input type="text" name="financial_referees[]" value=""></td>
                                                               <td><input type="text" name="financial_referees[]" value=""></td> 
                                                               
                                                             </tr>
                                                           </table>
                                                        </div> 
                                                        <div class="form-control">
                                                            <input type="file" name="attachmentFile"  value="" class="form-group" required>
                                                            <label>Attach Solvency Certificate from Bank confirming that the company’s bank      account is in a good standing </label>

                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Current Financial Details</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Financial Information in Rs.</th>
                                                                        <th>Year 1 (to change as per the FY)</th>
                                                                        <th>Year 2 (to change as per the FY)</th>
                                                                        <th>Year 3 (to change as per the FY)</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            Total Assets
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Total_Assets]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Total_Assets]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Total_Assets]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Current Assets
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Current_Assets]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Current_Assets]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Current_Assets]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Total Liabilities
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Total_Liabilities]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Total_Liabilities]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Total_Liabilities]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Current Liabilities
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Current_Liabilities]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Current_Liabilities]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Current_Liabilities]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Turnover
                                                                        </td>
                                                                        <td>
                                                                             <h6>1 Cr</h6>
                                                                        </td>
                                                                        <td>
                                                                            <h6>1 Cr</h6>
                                                                        </td>
                                                                        <td>
                                                                            <h6>1 Cr</h6>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Profits before Taxes
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Profits_before_Taxes]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Profits_before_Taxes]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Profits_before_Taxes]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            Profits after Taxes
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Profits_after_Taxes]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Profits_after_Taxes]" value="" />
                                                                        </td>
                                                                        <td>
                                                                            <input class="form-control" type="number" name="crrent_financial_details[0][Profits_after_Taxes]" value="" />
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div> 
                                                    </div>
                                                </div>
                                                 
                                                 
                                            </section>
                                            <!-- Step 5 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>CERTIFICATIONS/AWARDS</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-control">
                                                            <select class="custom-select form-control required" required name="certification_awards[]"> 
                                                                <option selected="" disabled="">Select Certificatetion</option>
                                                                <option value="5">> 5</option>
                                                                <option value="2 to 5">2 to 5</option>
                                                                <option value="At last 1">At least 1</option>
                                                            </select>
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
                                            <!-- Step 6 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>CERTIFICATIONS/AWARDS</b></h6>
                                                <p> <span><input class="form-control-sm form-control" type="text" name="field_4" value="" required /></span> Proprietor/ Partner/ Director of M/s <span><input class="form-control-sm form-control" type="text" name="field_6" value="" required /></span> hereby confirm that, to the best of my knowledge and information there is no default/ contravention of various laws enactments etc applicable to our firm generally and in particular the following enactments and/or order, rules etc. Made hereunder up to the date of this certificate.</p>
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
                                                <h6><b>Provide all the site names where the projects are in progress and completed (in last 3 years)</b></h6>
                                                <div class="row">  
                                                    <div class="col-6">
                                                    <input class="form-check-input" type="checkbox" name="confarmation" value="" id="checkbox_17" name="checkbox_17" value="option2" required>
                                                    <label class="form-check-label" for="checkbox_17">Further, I certify that the information given elsewhere in this document is correct as per my knowledge and understanding</label>
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


