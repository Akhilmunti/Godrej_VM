
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
    .add-record_5{
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
                if (isset($notification)) {
                    echo "$notification";
                }
                // echo $getStageTwo['type_of_work'];
                //if(!empty($getStageTwo)){echo implode(',', (array) $a); }
                ?>
                <!-- /.box-header -->
                <div class="box-body wizard-content">
                    <form id="register_form" action="<?php echo base_url('home/getStageTwoVendor'); ?>" method="POST" class=" validation-wizard">
                        <!-- step -->

                        <h6></h6>
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
                                        <input type="text" class="form-control required" id="companyname" name="company_name" value=" <?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['company_name'];
                                        }
                                        ?>"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                        <select class="custom-select form-control required" id="typeoffirm" name="type_Of_firm"> 
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
                                        <input type="text" class="form-control required" id="emailAddress" name="registration_no" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['registration_no'];
                                        }
                                        ?>"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phoneNumber1">Date of Incorporation :<span class="danger">*</span></label>
                                        <input type="date" class="form-control required" id="dateofincorportion" name="date_of_incorpartion" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['date_of_incorpartion'];
                                        }
                                        ?>"> </div>
                                </div>
                            </div>
                            <h6><b>Statutory Details</b></h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="addressline1">GSTN :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="gstn" name="GST" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['GST'];
                                        }
                                        ?>"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="addressline2">PF No. :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="pfno" name="PF_no" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['PF_no'];
                                        }
                                        ?>"> </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="location3">PAN NO :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="panno" name="PAN_no" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['PAN_no'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <h6><b>Company Address & Contact Details</b></h6>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="url123">Address :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="vaddress" name="address" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['address'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="username123">Telephone :<span class="danger">*</span></label>
                                        <input type="tel" class="form-control required" id="phno" name="contact_number" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['contact_number'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password123">Fax :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="fax" name="fax" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['fax'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="website" name="website" placeholder="http://" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['website'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name of Contact Person :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="nameofcontactper" name="contact_person" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['contact_person'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email of the Contact Person :<span class="danger">*</span></label>
                                        <input type="email" class="form-control required" id="emailofcontactper" name="email" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['email'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <h6><b>No. of years as Vendor : <span class="danger">*</span></b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="number" class="form-control required" id="noofyconsultant" name="no_of_years_vendor" value="<?php
                                        if (!empty($getStageTwo)) {
                                            echo $getStageTwo['no_of_years_vendor'];
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <h6><b>Type of Work for which Prequalification is sought : <span class="danger">*</span></b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="controls">
                                        <?php
// $interest = array(); // initializing  
// if(!empty($getStageTwo)){print_r($getStageTwo['type_of_work']);}
// $data= $getStageTwo['type_of_work'];
// if(!empty($getStageTwo)){
// $data=$getStageTwo['type_of_work'];
//     echo $data;}
// if(echo in_array('Lifts',$interest)){echo'yes';}
// store in an array 
// print_r($interest);
//    if(!empty($getStageTwo)){(in_array('Lifts',$interest) ? 'checked="checked"' : ''); } 
                                        ?>
                                        <fieldset>
                                            <input type="checkbox" id="checkbox_1" name="type_of_work[]" value="Lifts"

                                                   <?php
                                                   if (!empty($getStageTwo)) {
                                                       $data[] = $getStageTwo['type_of_work'];

                                                       if (in_array('Lifts', $data))
                                                           echo "checked = 'checked'";
                                                   }
                                                   ?>
                                                   >
                                            <label class="form-check-label" for="checkbox_1">Lifts
                                            </label>

                                        </fieldset>
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_2"  name ="type_of_work[]"value="RMC" >
                                            <label class="form-check-label" for="checkbox_2">RMC</label>

                                        </fieldset>
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_3" name="type_of_work[]"  value="Steel (rebar & structural steel)"
                                                   >
                                            <label class="form-check-label" for="checkbox_3" >Steel (rebar & structural steel)</label>
                                        </fieldset> 
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_4" name="type_of_work[]" value="Cement" >
                                            <label class="form-check-label" for="checkbox_4">Cement</label>
                                        </fieldset>

                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_10" name="type_of_work[]" value="Flooring (tiles, various stone, wooden, vinyl etc." >
                                            <label class="form-check-label" for="checkbox_10" >Flooring (tiles, various stone, wooden, vinyl etc.</label> 
                                        </fieldset> 
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_5" name="type_of_work[]" value="Doors, windows & hardware (wooden, aluminium, steel, PVC, UPVC)" >
                                            <label class="form-check-label" for="checkbox_5">Doors, windows & hardware (wooden, aluminium, steel, PVC, UPVC)</label>
                                        </fieldset>  
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_6" name="type_of_work[]"value="Air conditioners / air-conditioning system" >
                                            <label class="form-check-label" for="checkbox_6">Air conditioners / air-conditioning system</label>

                                        </fieldset>

                                    </div>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_7" name="type_of_work[]" value="Electrical equipment and fitting" >
                                        <label class="form-check-label" for="checkbox_7">Electrical equipment and fitting</label> 
                                    </fieldset>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_8"  name="type_of_work[]"value="Modular kitchen" >
                                        <label class="form-check-label" for="checkbox_8">Modular kitchen</label>

                                    </fieldset>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_9" name="type_of_work[]" value="Formwork" >
                                        <label class="form-check-label" for="checkbox_9">Formwork</label>

                                    </fieldset>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_18" name="type_of_work[]" value="Furnitures" >
                                        <label class="form-check-label" for="checkbox_18">Furnitures</label>

                                    </fieldset>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_19" name="type_of_work[]" value="CP & sanitary ware" >
                                        <label class="form-check-label" for="checkbox_19">CP & sanitary ware</label>

                                    </fieldset>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_20" name="type_of_work[]" value="Structural glazing" >
                                        <label class="form-check-label" for="checkbox_20">Structural glazing</label>

                                    </fieldset>
                                    <fieldset>
                                        <input class="form-check-input" type="checkbox" id="checkbox_21" name="type_of_work[]" value="Miscellaneous (any supplies not mentioned above)" >
                                        <label class="form-check-label" for="checkbox_21">Miscellaneous (any supplies not mentioned above)</label>

                                    </fieldset>


                                </div>
                            </div>
                            <br/><br/>
                            <h6><b>Field </b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="controls">   
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_22" name="field_chkbox_1[]" value="Registered with or having Purchase OrderPSU & Govt with or and more than 5 reputed developers" >
                                            <label class="form-check-label" for="checkbox_22">Registered with or having Purchase OrderPSU & Govt with or and more than 5 reputed developers</label> 
                                        </fieldset>
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_23"  name="field_chkbox_1[]"value="Registered with or having Purchase order from more than 5 reputed developers" >
                                            <label class="form-check-label" for="checkbox_23">Registered with or having Purchase order from more than 5 reputed developers</label>

                                        </fieldset>
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_24" name="field_chkbox_1[]" value="Registered with or having  Purchase  order from 5 and more reputed developers" >
                                            <label class="form-check-label" for="checkbox_24">Registered with or having  Purchase  order from 5 and more reputed developers</label>

                                        </fieldset>
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_25" name="field_chkbox_1[]" value="Registered with or having  Purchase order from only 3 reputed developers" >
                                            <label class="form-check-label" for="checkbox_25">Registered with or having  Purchase order from only 3 reputed developers</label>

                                        </fieldset>
                                        <fieldset>
                                            <input class="form-check-input" type="checkbox" id="checkbox_26" name="field_chkbox_1[]" value="Registered with less than 3 reputed developers" >
                                            <label class="form-check-label" for="checkbox_26">Registered with less than 3 reputed developers</label>

                                        </fieldset>



                                    </div>
                                </div>
                            </div>
                            <br/> 
                            <h6><b> Field 1  </b></h6>
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
                                                    <th>Project Description</th>
                                                    <th>Contract Value Rs.(In Crores)</th>
                                                    <th>Start  Date</th>
                                                    <th>Completion Due Date</th>

                                                </tr>
                                            </thead>
                                            <tbody id="tbl_posts_2_body">

                                            </tbody>
                                        </table>
                                    </div> 

                                    <?php
                                    if (!empty($getStageTwo)) {
                                        echo $getStageTwo['field_1'];
                                        ?>
                                        <div >

                                            <table id="sample_table_2">
                                                <tr id="">
                                                    <td><a class="btn btn-xs delete-record_2" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                    <td><span class="sn"></span>.</td>
                                                    <td><input type="text1" name="field_1[]" value="<?php
                                                        if (!empty($getStageTwo)) {
                                                            echo $getStageTwo['field_1']['name'];
                                                        }
                                                        ?>"></td>
                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                    <td><input type="date" name="field_1[]" value=""></td>
                                                    <td><input type="date" name="field_1[]" value=""></td>

                                                </tr>
                                            </table>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div style="display:none;">

                                            <table id="sample_table_2">
                                                <tr id="">
                                                    <td><a class="btn btn-xs delete-record_2" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                    <td><span class="sn"></span>.</td>
                                                    <td><input type="text1" name="field_1[][name]" value=""></td>
                                                    <td><input type="text1" name="field_1[][project]" value=""></td>
                                                    <td><input type="text1" name="field_1[][contact]" value=""></td>
                                                    <td><input type="date" name="field_1[][start_date]" value=""></td>
                                                    <td><input type="date" name="field_1[][end_date]" value=""></td>

                                                </tr>
                                            </table>
                                        </div>
                                    <?php }
                                    ?>

                                </div>
                            </div>

                            <br/> 
                            <h6><b>Details of Current Work/Deliveries in Progress  </b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive"> 
                                        <div class="well clearfix">
                                            <a class="btn btn-primary pull-right add-record_5" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                        </div><br/>
                                        <table class="table table-bordered" id="tbl_posts_5">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>#</th>
                                                    <th>Name of Client, Client’s representative and contact details</th>
                                                    <th>Item Description</th>
                                                    <th>PO Value Rs.</th>
                                                    <th>Start  Date</th>
                                                    <th>Completion Due Date</th>

                                                </tr>
                                            </thead>
                                            <tbody id="tbl_posts_5_body">

                                            </tbody>
                                        </table>
                                    </div> 


                                    <div style="display:none;">

                                        <table id="sample_table_5">
                                            <tr id="">
                                                <td><a class="btn btn-xs delete-record_5" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                <td><span class="sn"></span>.</td>
                                                <td><input type="text1" name="details_of_corrent_work[]" value="<?php
                                                    if (!empty($getStageTwo)) {
                                                        echo $getStageTwo['details_of_corrent_work'];
                                                    }
                                                    ?>"></td>
                                                <td><input type="text1" name="details_of_corrent_work[]" value=""></td>
                                                <td><input type="text1" name="details_of_corrent_work[]" value=""></td>
                                                <td><input type="date" name="details_of_corrent_work[]" value=""></td>
                                                <td><input type="date" name="details_of_corrent_work[]" value=""></td>

                                            </tr>
                                        </table>
                                    </div> 
                                    <div class="form-control">
                                        <h6><b>Field 2 :</b></h6>
                                        <label><h6>Attachment : </h6></label>
                                        <input type="file" name="attachment1" class="form-group" value="">

                                    </div>
                                </div>
                            </div><br/>
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
                                                    <th>Year</th>
                                                    <th>Location</th>
                                                    <th>Total Value of WorksRs.</th>

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
                                                <td><input type="text" name="total_value_of_completed_works[]" value=""></td>
                                                <td><input type="text" name="total_value_of_completed_works[]" value=""></td>
                                                <td><input type="text" name="total_value_of_completed_works[]" value=""></td>


                                            </tr>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                            <h6><b> What type of brand does vendor represent : <span class="danger">*</span></b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_11" name="type_of_brand_does_vendor_represent[]" value="Eshatblishment Above 5 years & Turnover Above 10 Crores" >
                                        <label class="form-check-label" for="checkbox_11">Eshatblishment Above 5 years & Turnover Above 10 Crores</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_12" name="type_of_brand_does_vendor_represent[]" value="Establishment >3 years & Turnover  <3Crores -10 Crores" >
                                        <label class="form-check-label" for="checkbox_12">Establishment >3 years & Turnover  <3Crores -10 Crores </label>
                                    </div>    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_13" name="type_of_brand_does_vendor_represent[]" value="Establishment <3years & Turnover  <3 Cr" >
                                        <label class="form-check-label" for="checkbox_13">Establishment <3years & Turnover  <3 Cr</label>
                                    </div>  
                                </div>
                            </div>
                            <h6><b> After sales service facilities : <span class="danger">*</span></b></h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_14" name="sales_service_facilities[]" value="Service center / authorised dealer within city limits in the region" >
                                        <label class="form-check-label" for="checkbox_14">Service center / authorised dealer within city limits in the region</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_15" name="sales_service_facilities[]" value="Service center / authorised dealer beyond city limits in the region " >
                                        <label class="form-check-label" for="checkbox_15">Service center / authorised dealer beyond city limits in the region </label>
                                    </div>    
                                    <div class="form-check form-check-inline">

                                        <input class="form-check-input" type="checkbox" id="checkbox_16" name="sales_service_facilities[]" value="No service center in India" >
                                        <label class="form-check-label" for="checkbox_16">No service center in India</label>

                                    </div>  
                                </div>
                            </div> 
                        </section>
                        <!-- Step 2 -->
                        <h6></h6>
                        <section>
                            <h6><b>Details of Manufacturing facilities.  List all information requested below </b></h6>
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
                                                    <th>LOCATION</th>
                                                    <th>Description of Items being manufactured</th>
                                                    <th>Capacity and Establishment year</th>
                                                    <th>Remarks</th> 

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
                                                <td><input type="text1" name="details_of_manufacturing_facilities[]" value=""></td>
                                                <td><input type="text1" name="details_of_manufacturing_facilities[]" value=""></td>
                                                <td><input type="text1" name="details_of_manufacturing_facilities[]" value=""></td>
                                                <td><input type="text" name="details_of_manufacturing_facilities[]" value=""></td> 

                                            </tr>
                                        </table>
                                    </div> 
                                </div>
                            </div>
                        </section>
                        <!-- Step 3 -->
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
                        <!-- Step 4 -->
                        <h6></h6>
                        <section>
                            <h4><b>Financial details & legal status</b></h4>
                            <h6><b>Financial Referees/References </b></h6>
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="table-responsive">
                                        <div class="well clearfix">
                                            <a class="btn btn-primary pull-right add-record_6" data-added="0"><i class="glyphicon glyphicon-plus"></i> Add Row</a>
                                        </div><br/>
                                        <table class="table table-bordered" id="tbl_posts_6">
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
                                            <tbody id="tbl_posts_6_body">
                                            </tbody>
                                        </table>
                                    </div>  
                                    <div style="display:none;">

                                        <table id="sample_table_6">
                                            <tr id="">
                                                <td><a class="btn btn-xs delete-record_6" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                <td><span class="sn"></span>.</td>
                                                <td><input type="text" name=""></td>
                                                <td><input type="text" name="financial_referees[]" value=""></td> 
                                                <td><input type="text" name="financial_referees[]" value="">
                                                <td><input type="text" name="financial_referees[]" value="">

                                            </tr>
                                        </table>
                                    </div>
                                    <div>
                                        <h6>Attach Solvency Certificate from Bank confirming that the company’s bank      account is in a good standing </h6>
                                        <input type="file" name="attachment2" value="">
                                    </div> 
                                </div>
                            </div>
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
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year1]" value=""> </td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year2]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year3]" value=""></td> 
                                                    </tr>
                                                    <tr>
                                                        <td>Current Assets</td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year1]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year2]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year3]" value=""></td>


                                                    </tr>
                                                    <tr>
                                                        <td>Total Liabilities</td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year1]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year2]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year3]" value=""></td>

                                                    </tr>
                                                    <tr>
                                                        <td>Current Liabilities</td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year1]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year2]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year3]" value=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Turnover</td>
                                                        <td>1 Cr</td>
                                                        <td>1 Cr</td>
                                                        <td>1 Cr</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profits before Taxes</td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year1]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year2]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year3]" value=""></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Profits after Taxes</td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year1]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year2]" value=""></td>
                                                        <td><input type="text" name="actual_previous_three_years_data[0][year3]" value=""></td>
                                                    </tr>


                                                </table>
                                            </div> 
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </section>
                        <!-- Step 5 -->
                        <h6></h6>
                        <section>
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
                                                            <th>Yes</th>
                                                            <th>No</th> 
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Quality Assurance Program?</td>
                                                            <td><fieldset class="controls">
                                                                    <input name="type_of_brand_does_vendor_represent [0][quality_assurance_program]" type="radio" id="radio_1" value="yes" required>
                                                                    <label for="radio_1">Check Me</label>
                                                                </fieldset></td>
                                                            <td> <fieldset>
                                                                    <input name="type_of_brand_does_vendor_represent [0][quality_assurance_program]" type="radio" id="radio_2" value="No">
                                                                    <label for="radio_2">Or Me</label>                                  
                                                                </fieldset></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>ISO 9001 certification</td>
                                                            <td><fieldset class="controls">
                                                                    <input name="group2" type="radio" id="radio_3" name="type_of_brand_does_vendor_represent [0][ISO_9001_certification]" value="Yes" >
                                                                    <label for="radio_3">Check Me</label>
                                                                </fieldset></td>
                                                            <td>
                                                                <fieldset>
                                                                    <input name="type_of_brand_does_vendor_represent [0][ISO_9001_certification]" type="radio" id="radio_4" value="No">
                                                                    <label for="radio_4">Or Me</label>          </fieldset>
                                                            </td> 
                                                        </tr>
                                                        <tr>
                                                            <td>ISO 45001 certification</td>
                                                            <td><fieldset class="controls">
                                                                    <input name="type_of_brand_does_vendor_represent[0][ISO_45001_certification]" type="radio" id="radio_5" value="1" required>
                                                                    <label for="radio_5">Check Me</label>
                                                                </fieldset></td>
                                                            <td> <fieldset>
                                                                    <input name="type_of_brand_does_vendor_represent[0][ISO_45001_certification]" type="radio" id="radio_6" value="2">
                                                                    <label for="radio_6">Or Me</label>                                  
                                                                </fieldset></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Industry Accepted Quality Assurance Program</td>
                                                            <td><fieldset class="controls">
                                                                    <input name="type_of_brand_does_vendor_represent[0][Industry Accepted_Quality_Assurance_Program]" type="radio" id="radio_7" value="1" required>
                                                                    <label for="radio_7">Check Me</label>
                                                                </fieldset></td>
                                                            <td> <fieldset>
                                                                    <input name="type_of_brand_does_vendor_represent[0][Industry Accepted_Quality_Assurance_Program]" type="radio" id="radio_8" value="2">
                                                                    <label for="radio_8">Or Me</label>                                  
                                                                </fieldset></td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Other Certificates & Awards</td>
                                                            <td><fieldset class="controls">
                                                                    <input name="type_of_brand_does_vendor_represent[0][Other_Certificates_&_Awards]" type="radio" id="radio_9" value="1" required>
                                                                    <label for="radio_9">Check Me</label>
                                                                </fieldset></td>
                                                            <td> <fieldset>
                                                                    <input name="type_of_brand_does_vendor_represent[0][Other_Certificates_&_Awards]" type="radio" id="radio_10" value="2">
                                                                    <label for="radio_10">Or Me</label>                                  
                                                                </fieldset></td> 
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
                            <h6><b>Please fill 3 sites which you wish us to visit</b></h6>
                            <div class="row"> 
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="username123">A :<span class="danger">*</span></label>
                                        <input type="tel" class="form-control required" id="websiteA" name="visited_website[0][a]" placeholder="http://" value="">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="password123">B :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="websiteB" name="visited_website[0][b]" placeholder="http://" value="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>C :<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="websiteC" name="visited_website[0][c]" placeholder="http://" value="">
                                    </div>
                                </div> 
                            </div>
                        </section>
                        <!-- Step 7 -->
                        <h6></h6>
                        <section>

                            <div class="row">  
                                <div class="col-6">
                                    <input class="form-check-input" type="checkbox" id="checkbox_17" name="conformation" value="1" required>
                                    <label class="form-check-label" for="checkbox_17">Further, I certify that the information given elsewhere in this document is correct as per my knowledge and understanding</label>
                                </div>

                            </div>

                        </section>
                        <!-- End -->
                        <?php
//    }
// }
                        ?>

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