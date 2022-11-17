<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('vendor/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('vendor/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Dashboard</h3>
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
                                        <form id="register_form" action="<?php echo base_url('home/getStageTwoVendor'); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
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
                                                            <h6>
                                                                <b>
                                                                    Disclaimer: Any information provided if not correct or misrepresented, GPL has all rights to terminate the Business Associations/any Work Order/Purchase Order/Contract.
                                                                </b>
                                                            </h6>
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
                                                            <input type="text" class="form-control" id="companyname" name="company_name" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['company_name'];
                                                            }
                                                            ?>"> </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                                            <select class="custom-select form-control" id="typeoffirm" name="type_Of_firm" selected=""> 

                                                                <option value="" disabled="" selected="">Select type of Firm</option>

                                                                <option  <?php
                                                                if (!empty($getStageTwo)) {
                                                                    if ($getStageTwo['type_Of_firm'] == "Corporate") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Corporate" disabled>Corporate</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress">Company Registration No (Eg. CIN/Registration No) :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="emailAddress" name="registration_no" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['registration_no'];
                                                            }
                                                            ?>"> </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Date of Incorporation :<span class="danger">*</span></label>
                                                            <input type="date" class="form-control" id="dateofincorportion" name="date_of_incorpartion" value="<?php
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
                                                            <input type="text" class="form-control" id="gstn" name="GST" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['GST'];
                                                            }
                                                            ?>"disabled> </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="addressline2">PF No. :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="pfno" name="PF_no" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['PF_no'];
                                                            }
                                                            ?>"> </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">PAN NO :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="panno" name="PAN_no" value="<?php
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
                                                            <input type="text" class="form-control" id="vaddress" name="address" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['address'];
                                                            }
                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username123">Telephone :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control" id="phno" name="contact_number" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['contact_number'];
                                                            }
                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password123">Fax :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="fax" name="fax" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['fax'];
                                                            }
                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Website :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="website" name="website" placeholder="http://" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['website'];
                                                            }
                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name of Contact Person :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="nameofcontactper" name="contact_person" value="<?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['contact_person'];
                                                            }
                                                            ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email of the Contact Person :<span class="danger">*</span></label>
                                                            <input type="email" class="form-control" id="emailofcontactper" name="email" value="<?php
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
                                                            <input type="number" class="form-control" id="noofyconsultant" name="no_of_years_vendor" value="<?php
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
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_1" name="type_of_work[]" value="Lifts"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('Lifts', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >

                                                                <label class="form-check-label" for="checkbox_1">Lifts
                                                                </label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_2"  name ="type_of_work[]"value="RMC"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('RMC', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_2">RMC</label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_3" name="type_of_work[]"  value="Steel (rebar & structural steel)"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('Steel (rebar & structural steel)', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_3" >Steel (rebar & structural steel)</label>
                                                            </fieldset> 
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_4" name="type_of_work[]" value="Cement"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('Cement', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_4">Cement</label>
                                                            </fieldset>

                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_10" name="type_of_work[]" value="Flooring (tiles, various stone, wooden, vinyl etc."  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('Flooring (tiles, various stone, wooden, vinyl etc.', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_10" >Flooring (tiles, various stone, wooden, vinyl etc.</label> 
                                                            </fieldset> 
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_5" name="type_of_work[]" value="Doors, windows & hardware (wooden, aluminium, steel, PVC, UPVC)"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('Doors, windows & hardware (wooden, aluminium, steel, PVC, UPVC)', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_5">Doors, windows & hardware (wooden, aluminium, steel, PVC, UPVC)</label>
                                                            </fieldset>  
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_6" name="type_of_work[]"value="Air conditioners / air-conditioning system"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['type_of_work']);

                                                                    if (in_array('Air conditioners / air-conditioning system', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_6">Air conditioners / air-conditioning system</label>

                                                            </fieldset>

                                                        </div>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_7" name="type_of_work[]" value="Electrical equipment and fitting"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Electrical equipment and fitting', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_7">Electrical equipment and fitting</label> 
                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_8"  name="type_of_work[]"value="Modular kitchen"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Modular kitchen', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_8">Modular kitchen</label>

                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_9" name="type_of_work[]" value="Formwork"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Formwork', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_9">Formwork</label>

                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_18" name="type_of_work[]" value="Furnitures"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Furnitures', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_18">Furnitures</label>

                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_19" name="type_of_work[]" value="CP & sanitary ware"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('CP & sanitary ware', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_19">CP & sanitary ware</label>

                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_20" name="type_of_work[]" value="Structural glazing"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Structural', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_20">Structural glazing</label>

                                                        </fieldset>
                                                        <fieldset>
                                                            <input class="form-check-input" type="checkbox" id="checkbox_21" name="type_of_work[]" value="Miscellaneous (any supplies not mentioned above)"  
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Lifts', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
                                                            <label class="form-check-label" for="checkbox_21">Miscellaneous (any supplies not mentioned above)</label>

                                                        </fieldset>


                                                    </div>
                                                </div>
                                                <br/><br/>
                                                <h6><b>REGISTERED WITH GOVERNEMENT DEPARTMENTS / PSUs / MAJOR DEVELOPERS </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">   
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_22" name="field_chkbox_1[]" value="Registered with or having Purchase OrderPSU & Govt with or and more than 5 reputed developers"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['field_chkbox_1']);

                                                                    if (in_array('Registered with or having Purchase OrderPSU & Govt with or and more than 5 reputed developers', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>>
                                                                <label class="form-check-label" for="checkbox_22">Registered with or having Purchase OrderPSU & Govt with or and more than 5 reputed developers</label> 
                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_23"  name="field_chkbox_1[]"value="Registered with or having Purchase order from more than 5 reputed developers" 

                                                                       <?php
                                                                       if (!empty($getStageTwo)) {
                                                                           $data = json_decode($getStageTwo['field_chkbox_1']);

                                                                           if (in_array('Registered with or having Purchase order from more than 5 reputed developers', $data)) {
                                                                               echo'checked';
                                                                           }
                                                                       }
                                                                       ?>
                                                                       >
                                                                <label class="form-check-label" for="checkbox_23">Registered with or having Purchase order from more than 5 reputed developers</label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_24" name="field_chkbox_1[]" value="Registered with or having  Purchase  order from 5 and more reputed developers"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['field_chkbox_1']);

                                                                    if (in_array('Registered with or having Purchase order from more than 5 reputed developers', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> >
                                                                <label class="form-check-label" for="checkbox_24">Registered with or having  Purchase  order from 5 and more reputed developers</label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_25" name="field_chkbox_1[]" value="Registered with or having  Purchase order from only 3 reputed developers"  
                                                                <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['field_chkbox_1']);

                                                                    if (in_array('Registered with or having  Purchase order from only 3 reputed developers', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> >
                                                                <label class="form-check-label" for="checkbox_25">Registered with or having  Purchase order from only 3 reputed developers</label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_26" name="field_chkbox_1[]" value="Registered with less than 3 reputed developers"   <?php
                                                                if (!empty($getStageTwo)) {
                                                                    $data = json_decode($getStageTwo['field_chkbox_1']);

                                                                    if (in_array('Registered with less than 3 reputed developers', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>>
                                                                <label class="form-check-label" for="checkbox_26">Registered with less than 3 reputed developers</label>

                                                            </fieldset>



                                                        </div>
                                                    </div>
                                                </div>
                                                <br/> 
                                                <h6><b> Details of Manufacturing, fabrication facilities, or equipment yard locations (to be completed only if relevant to the Scope of Work)  </b></h6>
                                                <!-- <div class="row">
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
                                                                    <th>Contract Value Rs.</th>
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
                                                               <td><input type="text1" name="field_1[]" value=""></td>
                                                               <td><input type="text1" name="field_1[]" value=""></td>
                                                               <td><input type="text1" name="field_1[]" value=""></td>
                                                               <td><input type="date" name="field_1[]" value=""></td>
                                                               <td><input type="date" name="field_1[]" value=""></td>
                                                               
                                                             </tr>
                                                           </table>
                                                        </div> 
                                                         
                                                        
                                                    </div>
                                                </div> -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- <div class="table-responsive"> 
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
                                                                        <th>Contract Value Rs.</th>
                                                                        <th>Start  Date</th>
                                                                        <th>Completion Due Date</th>
                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_2_body">
                                                        <?php
                                                        $field_1 = json_decode($getStageTwo['field_1']);
                                                        if (!empty($field_1)) {
                                                            ?>
                                                        
                                                            <?php
                                                            $mCount = 0;
                                                            $mFind = 0;
                                                            $mCountArray = count($field_1);
                                                            $mTimes = count($field_1) / 5;

                                                            $mCount = 0;
                                                            $mHash = 0;
                                                            for ($x = 0; $x < $mTimes; $x++) {
                                                                if ($x == 0) {
                                                                    $mCount = $mCount;
                                                                } else {
                                                                    $mCount = $mCount + 5;
                                                                }
                                                                ?>
                                                                <?php if ($x == 0) { ?>
                                                                                                                                
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>
                                                                                                                                
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                    <?php echo "1"; ?>
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[0]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[1]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[2]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[3]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[4]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                            </tr>
                                                                                                                                
                                                                <?php } else { ?>
                                                                                                                                                                                            <tr>
                                                                                                                                                                                                <td>
                                                                                                                                
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                    <?php echo $x + 1; ?>
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 0]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 1]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 2]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 3]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                                <td>
                                                                                                                                                                                                    <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 4]; ?>" />
                                                                                                                                                                                                </td>
                                                                                                                                                                                            </tr>
                                                                <?php } ?>
                                                            <?php } ?>
                                                        
                                                        <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div> 
                    
                    
                                                        <div style="display:none;">
                    
                                                            <table id="sample_table_2">
                                                                <tr id="">
                                                                    <td><a class="btn btn-xs delete-record_2" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                                    <td><span class="sn"></span>.</td>
                                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                                    <td><input type="date" name="field_1[]" value=""></td>
                                                                    <td><input type="date" name="field_1[]" value=""></td>
                    
                                                                </tr>
                                                            </table>
                                                        </div>  -->
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
                                                                    <?php
                                                                    $field_1 = json_decode($getStageTwo['field_1']);
                                                                    if (!empty($field_1)) {
                                                                        ?>

                                                                        <?php
                                                                        $mCount = 0;
                                                                        $mFind = 0;
                                                                        $mCountArray = count($field_1);
                                                                        $mTimes = count($field_1) / 5;

                                                                        $mCount = 0;
                                                                        $mHash = 0;
                                                                        for ($x = 0; $x < $mTimes; $x++) {
                                                                            if ($x == 0) {
                                                                                $mCount = $mCount;
                                                                            } else {
                                                                                $mCount = $mCount + 5;
                                                                            }
                                                                            ?>
                                                                            <?php if ($x == 0) { ?>

                                                                                <tr>
                                                                                    <td>

                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo "1"; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[0]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[1]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[2]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[3]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[4]; ?>" />
                                                                                    </td>
                                                                                </tr>

                                                                            <?php } else { ?>
                                                                                <tr>
                                                                                    <td>

                                                                                    </td>
                                                                                    <td>
                                                                                        <?php echo $x + 1; ?>
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 0]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 1]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 2]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 3]; ?>" />
                                                                                    </td>
                                                                                    <td>
                                                                                        <input class="form-control" readonly="" value="<?php echo $field_1[$mCount + 4]; ?>" />
                                                                                    </td>
                                                                                </tr>
                                                                            <?php } ?>
                                                                        <?php } ?>

                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div> 


                                                        <div style="display:none;">

                                                            <table id="sample_table_2">
                                                                <tr id="">
                                                                    <td><a class="btn btn-xs delete-record_2" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                                    <td><span class="sn"></span>.</td>
                                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                                    <td><input type="text1" name="field_1[]" value=""></td>
                                                                    <td><input type="date" name="field_1[]" value=""></td>
                                                                    <td><input type="date" name="field_1[]" value=""></td>

                                                                </tr>
                                                            </table>
                                                        </div> 


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
                                                                    <?php
                                                                    if (!empty($getStageTwo['details_of_corrent_work'])) {
                                                                        $details_of_corrent_work = json_decode($getStageTwo['details_of_corrent_work']);
                                                                        if (!empty($details_of_corrent_work)) {
                                                                            ?>

                                                                            <?php
                                                                            $mCount = 0;
                                                                            $mFind = 0;
                                                                            $mCountArray = count($details_of_corrent_work);
                                                                            $mTimes = count($details_of_corrent_work) / 5;

                                                                            $mCount = 0;
                                                                            $mHash = 0;
                                                                            for ($x = 0; $x < $mTimes; $x++) {
                                                                                if ($x == 0) {
                                                                                    $mCount = $mCount;
                                                                                } else {
                                                                                    $mCount = $mCount + 5;
                                                                                }
                                                                                ?>
                                                                                <?php if ($x == 0) { ?>
                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td><?php echo "1"; ?></td> 
                                                                                        <td><input type="text1" name="details_of_corrent_work[]"
                                                                                                   value="<?php echo $details_of_corrent_work[0]; ?>" readonly="" class=" form-control "></td>
                                                                                        <td><input type="text1" name="details_of_corrent_work[]" readonly="" value="<?php echo $details_of_corrent_work[1]; ?>" readonly="" class=" form-control "></td>
                                                                                        <td><input type="text1" name="details_of_corrent_work[]" readonly="" value="<?php echo $details_of_corrent_work[2]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="date" name="details_of_corrent_work[]"readonly="" value="<?php echo $details_of_corrent_work[3]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="date" name="details_of_corrent_work[]" readonly="" value="<?php echo $details_of_corrent_work[4]; ?>"readonly="" class=" form-control "></td>

                                                                                    </tr>

                                                                                <?php } else { ?>
                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td><?php echo $x + 1; ?></td> 

                                                                                        <td><input type="text1" name="details_of_corrent_work[]"
                                                                                                   readonly="" value="<?php echo $details_of_corrent_work[$mCount + 0]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="text1" name="details_of_corrent_work[]" readonly="" value="<?php echo $details_of_corrent_work[$mCount + 1]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="text1" name="details_of_corrent_work[]" readonly="" value="<?php echo $details_of_corrent_work[$mCount + 2]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="date" name="details_of_corrent_work[]"readonly="" value="<?php echo $details_of_corrent_work[$mCount + 3]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="date" name="details_of_corrent_work[]" readonly="" value="<?php echo $details_of_corrent_work[$mCount + 4]; ?>"readonly="" class=" form-control "></td>

                                                                                    </tr>

                                                                                <?php } ?>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div> 


                                                        <div style="display:none;">

                                                            <table id="sample_table_5">
                                                                <tr id="">
                                                                    <td><a class="btn btn-xs delete-record_5" data-id="0"><i class="glyphicon glyphicon-trash"></i></a></td>
                                                                    <td><span class="sn"></span>.</td>
                                                                    <td><input type="text1" name="details_of_corrent_work[]" value=""></td>
                                                                    <td><input type="text1" name="details_of_corrent_work[]" value=""></td>
                                                                    <td><input type="text1" name="details_of_corrent_work[]" value=""></td>
                                                                    <td><input type="date" name="details_of_corrent_work[]" value=""></td>
                                                                    <td><input type="date" name="details_of_corrent_work[]" value=""></td>

                                                                </tr>
                                                            </table>
                                                        </div> 
                                                        <div class="form-control">
                                                            <!--                                                            <h6><b>Field 2 :</b></h6>-->
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
                                                                        <th>Total Value of Works in Rs.</th>

                                                                    </tr>
                                                                </thead>
                                                                <tbody id="tbl_posts_3_body">
                                                                    <?php
                                                                    if (!empty($getStageTwo['total_value_of_completed_works'])) {
                                                                        $total_value_of_completed_works = json_decode($getStageTwo['total_value_of_completed_works']);
                                                                        if (!empty($total_value_of_completed_works)) {
                                                                            ?>

                                                                            <?php
                                                                            $mCount = 0;
                                                                            $mFind = 0;
                                                                            $mCountArray = count($total_value_of_completed_works);
                                                                            $mTimes = count($total_value_of_completed_works) / 3;

                                                                            $mCount = 0;
                                                                            $mHash = 0;
                                                                            for ($x = 0; $x < $mTimes; $x++) {
                                                                                if ($x == 0) {
                                                                                    $mCount = $mCount;
                                                                                } else {
                                                                                    $mCount = $mCount + 3;
                                                                                }
                                                                                ?>
                                                                                <?php if ($x == 0) { ?>
                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td><?php echo 1; ?> </td>
                                                                                        <td><input type="text" name="total_value_of_completed_works[]" value="<?php echo $total_value_of_completed_works[0]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="text" name="total_value_of_completed_works[]" value="<?php echo $total_value_of_completed_works[1]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="text" name="total_value_of_completed_works[]" value="<?php echo $total_value_of_completed_works[2]; ?>"readonly="" class=" form-control "></td>


                                                                                    </tr>
                                                                                <?php } else { ?>
                                                                                    <tr>
                                                                                        <td> </td>
                                                                                        <td><?php echo $x + 1; ?> </td>
                                                                                        <td><input type="text" name="total_value_of_completed_works[]" value="<?php echo $total_value_of_completed_works[$mCount + 0]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="text" name="total_value_of_completed_works[]" value="<?php echo $total_value_of_completed_works[$mCount + 1]; ?>"readonly="" class=" form-control "></td>
                                                                                        <td><input type="text" name="total_value_of_completed_works[]" value="<?php echo $total_value_of_completed_works[$mCount + 2]; ?>"readonly="" class=" form-control "></td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
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
                                                            <input class="form-check-input" type="checkbox" id="checkbox_11" name="type_of_brand_does_vendor_represent[]" value="Eshatblishment Above 5 years & Turnover Above 10 Crores"
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                $data = json_decode($getStageTwo['type_of_work']);

                                                                if (in_array('Lifts', $data)) {
                                                                    echo'checked';
                                                                }
                                                            }
                                                            ?>
                                                                   >
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
                                                                    <?php
                                                                    if (!empty($getStageTwo['details_of_manufacturing_facilities'])) {
                                                                        $details_of_manufacturing_facilities = json_decode($getStageTwo['details_of_manufacturing_facilities']);
                                                                        if (!empty($details_of_manufacturing_facilities)) {
                                                                            ?>

                                                                            <?php
                                                                            $mCount = 0;
                                                                            $mFind = 0;
                                                                            $mCountArray = count($details_of_manufacturing_facilities);
                                                                            $mTimes = count($details_of_manufacturing_facilities) / 4;

                                                                            $mCount = 0;
                                                                            $mHash = 0;
                                                                            for ($x = 0; $x < $mTimes; $x++) {
                                                                                if ($x == 0) {
                                                                                    $mCount = $mCount;
                                                                                } else {
                                                                                    $mCount = $mCount + 4;
                                                                                }
                                                                                ?>
                                                                                <?php if ($x == 0) { ?>
                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td> <?php echo 1; ?></td>
                                                                                        <td><input type="text1" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[0]; ?>"class="form-control" readonly=""></td>
                                                                                        <td><input type="text1" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[1]; ?>"class="form-control" readonly=""></td>
                                                                                        <td><input type="text1" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[2]; ?>"class="form-control" readonly=""></td>
                                                                                        <td><input type="text" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[3]; ?>"class="form-control" readonly=""></td> 

                                                                                    </tr>
                                                                                <?php } else { ?>
                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td><?php echo $x + 1; ?></td>
                                                                                        <td><input type="text1" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[$mCount + 0]; ?>" class="form-control" readonly=""></td>
                                                                                        <td><input type="text1" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[$mCount + 1]; ?>"class="form-control" readonly=""></td>
                                                                                        <td><input type="text1" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[$mCount + 2]; ?>"class="form-control" readonly=""></td>
                                                                                        <td><input type="text" name="details_of_manufacturing_facilities[]" value="<?php echo $details_of_manufacturing_facilities[$mCount + 3]; ?>"class="form-control" readonly=""></td> 

                                                                                    </tr>
                                                                                <?php } ?>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
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
                                                                <td><input type="text" name="HR_own_employees" value="<?php
                                                                    if (!empty($getStageTwo)) {
                                                                        echo $getStageTwo['HR_own_employees'];
                                                                    }
                                                                    ?>">
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
                                                                    <?php
                                                                    if (!empty($getStageTwo['financial_referees'])) {
                                                                        $financial_referees = json_decode($getStageTwo['financial_referees']);
                                                                        if (!empty($financial_referees)) {
                                                                            ?>

                                                                            <?php
                                                                            $mCount = 0;
                                                                            $mFind = 0;
                                                                            $mCountArray = count($financial_referees);
                                                                            $mTimes = count($financial_referees) / 4;

                                                                            $mCount = 0;
                                                                            $mHash = 0;
                                                                            for ($x = 0; $x < $mTimes; $x++) {
                                                                                if ($x == 0) {
                                                                                    $mCount = $mCount;
                                                                                } else {
                                                                                    $mCount = $mCount + 4;
                                                                                }
                                                                                ?>
                                                                                <?php if ($x == 0) { ?>
                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td><?php echo 1; ?></td> 
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[0]; ?>" class="form-control" readonly></td> 
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[1]; ?>" class="form-control" readonly>
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[2]; ?>" class="form-control" readonly>
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[3]; ?>" class="form-control" readonly>

                                                                                    </tr>
                                                                                <?php } else { ?>

                                                                                    <tr id="">
                                                                                        <td> </td>
                                                                                        <td><?php echo $x + 1; ?></td>

                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[$mCount + 0]; ?>" class="form-control" readonly></td> 
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[$mCount + 1]; ?>" class="form-control" readonly>
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[$mCount + 2]; ?>" class="form-control" readonly>
                                                                                        <td><input type="text" name="financial_referees[]" value="<?php echo $financial_referees[3]; ?>" class="form-control" readonly>

                                                                                    </tr>
                                                                                <?php } ?>
                                                                            <?php } ?>

                                                                        <?php } ?>
                                                                    <?php } ?>
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
                                                                        <?php
//                        if(!empty($getStageTwo['actual_previous_three_years_data'])){
// $actual_previous_three_years_data = json_decode($getStageTwo['actual_previous_three_years_data']);
// echo $actual_previous_three_years_data = json_decode($getStageTwo['actual_previous_three_years_data']);
// if (!empty($actual_previous_three_years_data)) {
//     
                                                                        ?>

                                                                        //     <?php
//     $mCount = 0;
//     $mFind = 0;
//     $mCountArray = count($actual_previous_three_years_data);
//     $mTimes = count($actual_previous_three_years_data) / 4;
//     $mCount = 0;
//     $mHash = 0;
//     for ($x = 0; $x < $mTimes; $x++) {
//         if ($x == 0) {
//             $mCount = $mCount;
//         } else {
//             $mCount = $mCount + 4;
//         }
                                                                        ?>
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
                                                                            <td>Total Assets </td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[0][totalAssets]" value="
                                                                                       <?php ?>"> </td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[1][totalAssets]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[2][totalAssets]" value=""></td> 
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Current Assets</td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[3][currentAssets]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[4][currentAssets]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[5][currentAssets]" value=""></td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td>Total Liabilities</td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[6][totalLiabilities]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[7][totalLiabilities]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[8][totalLiabilities]" value=""></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>Current Liabilities</td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[9][currentLiabilities]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[10][currentLiabilities]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[11][currentLiabilities]" value=""></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Turnover</td>
                                                                            <td>1 Cr</td>
                                                                            <td>1 Cr</td>
                                                                            <td>1 Cr</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Profits before Taxes</td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[13][ProfitsAeforeTaxes]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[14][ProfitsAeforeTaxes]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[15][ProfitsAeforeTaxes]" value=""></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Profits after Taxes</td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[16][ProfitsBeforeTaxes]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[17][ProfitsBeforeTaxes]" value=""></td>
                                                                            <td><input type="text" name="actual_previous_three_years_data[18][ProfitsBeforeTaxes]" value=""></td>
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
                                                                                <th>Yes / No</th> 
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>Quality Assurance Program?</td>
                                                                                <td>
                                                                                    <div class="controls">
                                                                                        <fieldset>
                                                                                            <input name="qualityAssuranceProgram" type="radio" id="radio_1" value="Yes" 
                                                                                            <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['qualityAssuranceProgram'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                                   >
                                                                                            <label for="radio_1">Check Me</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input name="qualityAssuranceProgram" type="radio" id="radio_2" value="No"
                                                                                            <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['qualityAssuranceProgram'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                                   >
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
                                                                                            <input name="iSO9001certification" type="radio" id="radio_3" value="Yes" 
                                                                                            <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['iSO9001certification'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            <label for="radio_3">Check Me</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input name="iSO9001certification" type="radio" id="radio_4" value="No"
                                                                                            <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['iSO9001certification'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            >
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
                                                                                            <input name="iSO45001certification" type="radio" id="radio_5" value="Yes"  <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['iSO45001certification'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            <label for="radio_5">Check Me</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input name="iSO45001certification" type="radio" id="radio_6" value="No"<?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['iSO45001certification'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>>
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
                                                                                            <input name="otherCertificatesAwards" type="radio" id="radio_7" value="Yes"   <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['otherCertificatesAwards'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>  >
                                                                                            <label for="radio_7">Check Me</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input name="otherCertificatesAwards" type="radio" id="radio_8" value="No" <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['otherCertificatesAwards'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
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
                                                                                            <input name="industryAccepted" type="radio" id="radio_9" value="Yes"   <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['industryAcceptedProgram'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>>
                                                                                            <label for="radio_9">Check Me</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input name="industryAccepted" type="radio" id="radio_10" value="No" <?php
                                                                                            if (!empty($getStageTwo)) {
                                                                                                if ($getStageTwo['industryAcceptedProgram'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>>
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
                                                <h6><b>Provide all the site names where the projects are in progress and completed (in last 3 years)</b></h6>
                                                <div class="row"> 
                                                    <div class="col-6">

                                                        <div class="form-group">
                                                            <label for="username123">A :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control" id="websiteA" name="sitesVisitA" placeholder="http://" value="
                                                            <?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['sitesVisitA'];
                                                            }
                                                            ?>

                                                                   " readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password123">B :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="websiteB" name="sitesVisitB" placeholder="http://" value=" <?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['sitesVisitB'];
                                                            }
                                                            ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>C :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control" id="websiteC" name="sitesVisitC" placeholder="http://" value=" <?php
                                                            if (!empty($getStageTwo)) {
                                                                echo $getStageTwo['sitesVisitC'];
                                                            }
                                                            ?>" readonly>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </section>
                                            <!-- Step 7 -->
                                            <h6></h6>
                                            <section>

                                                <div class="row">  
                                                    <div class="col-6">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_17" name="conformation" value="1" required <?php
                                                        if (!empty($getStageTwo)) {
                                                            $data = $getStageTwo['conformation'];
                                                            if ($data == 1) {
                                                                echo 'checked';
                                                            }
                                                        }
                                                        ?>>
                                                        <label class="form-check-label" for="checkbox_17"

                                                               >Further, I certify that the information given elsewhere in this document is correct as per my knowledge and understanding</label>
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
            <!-- /.content-wrapper -->
            <?php $this->load->view('vendor/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('vendor/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('vendor/partials/scripts'); ?>

    </body>
</html>