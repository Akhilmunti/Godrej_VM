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
                                    <h3 class="page-title br-0">Stage Two Form</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Consultant Registration</h4>
                                    </div>
                                    <?php
                                    if (isset($notification)) {
                                        echo "$notification";
                                    }
                                    // echo $mRecord['stcon_tow'];
                                    //if(!empty($mRecord)){echo implode(',', (array) $a); }
                                    ?>
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('vendor/home/postStageTwoConsultant'); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h6><b>Preamble :</b></h6>
                                                            <p>
                                                                Godrej Properties Ltd. (GPL) plans to undertake various new projects.  GPL wishes to register competent and resourceful Consultants for undertaking various works related to the projects.                                                            </p>
                                                            <br/>
                                                            <h6><b>Scope of Prequalification:</b> </h6>
                                                            <p>
                                                                To identify and assess agencies on various parameters including but not limited to competency, resourcefulness, experience, management band width, etc. with a view to prequalify agencies in appropriate categories. 
                                                            </p>
                                                            <p>
                                                                GPL reserves the right to Prequalify or otherwise any applicant without assigning any reason there for.
                                                            </p>
                                                            <h6>
                                                                <b>
                                                                    Disclaimer: Any information provided if not correct or misrepresented, GPL has all rights to terminate the Business Associations/any Work Order/Purchase Order/Contract.
                                                                </b>
                                                            </h6> 
                                                            <p><b>Notes on Form of Prequalification Information</b></p>
                                                            <p> • The information to be filled in by Contractors in the following pages will be used for the purposes of Prequalification.<br/>
                                                                • This information will not be incorporated in the Contract.<br/>
                                                                • Please fill in the latest updated information only.
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
                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            COMPANY DETAILS, HISTORY & COMMITMENTS
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstName5">Company Name : <span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stcon_company" name="stcon_company" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_company'];
                                                            } else {
                                                                echo $stageOne['company_name'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                                            <select class="custom-select form-control required" id="stcon_tof" name="stcon_tof" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select type of Firm</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_tof'] == "Corporate or Company") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Corporate or Company">Corporate or Company</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_tof'] == "Subsidiary") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Subsidiary">Subsidiary</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_tof'] == "Division") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Division">Division</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_tof'] == "Proprietor") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Proprietor">Proprietor</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_tof'] == "Partnership") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Partnership">Partnership</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="emailAddress">Company Registration No (Eg. CIN/Registration No) :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stcon_reg" name="stcon_reg" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_reg'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Date of Incorporation :<span class="danger">*</span></label>
                                                            <input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control required" id="stcon_doi" name="stcon_doi" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_doi'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Statutory Details</b></h6>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="addressline1">GSTN :<span class="danger">*</span></label>
                                                            <br>
                                                            <input data-role="tagsinput" type="text" id="stcon_gst" name="stcon_gst" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_gst'];
                                                            }
                                                            ?>"  <?php echo $disable; ?>>
                                                            <br><br>
                                                            <input required="" type="file" name="stcon_gst_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php if ($disable == "disabled" && $mRecord['stcon_gst_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stcon_gst_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="addressline2">PF No. :</label>
                                                            <input type="text" class="form-control" id="stcon_pf" name="stcon_pf" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_pf'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                            <br>
                                                            <input type="file" name="stcon_pf_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php if ($disable == "disabled" && $mRecord['stcon_pf_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stcon_pf_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">PAN NO :<span class="danger">*</span></label>
                                                            <input readonly="" type="text" class="form-control required" id="stcon_pan" name="stcon_pan" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_pan'];
                                                            } else {
                                                                echo $stageOne['pan'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                            <br>
                                                            <input required="" type="file" name="stcon_pan_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php if ($disable == "disabled" && $mRecord['stcon_pan_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stcon_pan_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Company Address & Contact Details</b></h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="url123">Address :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stcon_address" name="stcon_address" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_address'];
                                                            } else {
                                                                echo $stageOne['address'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username123">Telephone :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control required" id="stcon_tel" name="stcon_tel" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_tel'];
                                                            } else {
                                                                echo $stageOne['contact_number'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="password123">Fax :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stcon_fax" name="stcon_fax" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_fax'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Website :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stcon_website" name="stcon_website" placeholder="http://" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_website'];
                                                            } else {
                                                                echo $stageOne['website'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name of Contact Person :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stcon_nocp" name="stcon_nocp" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_nocp'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Email of the Contact Person :<span class="danger">*</span></label>
                                                            <input data-role="tagsinput" type="email" class="form-control required" id="stcon_eocp" name="stcon_eocp" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_eocp'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>No. of years as Consultant : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <input type="number" class="form-control required" id="stcon_noy" name="stcon_noy" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stcon_noy'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Type of Work for which Pre qualification is sought : <span class="danger">*</span></b></h6>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_1" name="stcon_tow[]" value="Structural Design"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('Structural Design', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>

                                                                <label class="form-check-label" for="checkbox_1">Structural Design
                                                                </label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_2"  name ="stcon_tow[]" value="Services Design"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('Services Design', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_2">Services Design</label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_3" name="stcon_tow[]"  value="Geo – Technical Investigation"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('Geo – Technical Investigation', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?> >
                                                                <label class="form-check-label" for="checkbox_3" >Geo – Technical Investigation</label>
                                                            </fieldset> 
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_4" name="stcon_tow[]" value="Structural Design"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('Structural Design', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?>  <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_4">Structural Design</label>
                                                            </fieldset>

                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_10" name="stcon_tow[]" value="Quantity Survey & Cost Planning"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('Quantity Survey & Cost Planning', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_10" >Quantity Survey & Cost Planning</label> 
                                                            </fieldset> 
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_5" name="stcon_tow[]" value="PMC"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('PMC', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_5">PMC</label>
                                                            </fieldset>  
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_6" name="stcon_tow[]" value="Miscellaneous (any service not mentioned above)"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_tow']);

                                                                    if (in_array('Miscellaneous (any service not mentioned above)', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_6">Miscellaneous (any service not mentioned above)</label>

                                                            </fieldset>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br/><br/>
                                                <h6><b>Details of Work Performed as a Consultant for in last 5 years</b></h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stcon_wpc" name="stcon_wpc" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_wpc'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">More than 10 completed works in last 5 years</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_wpc'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">More than 5 completed jobs in last 5 years</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_wpc'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">Less than 5 completed works in last 5 years</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stcon_cc" name="stcon_cc" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_cc'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">More than 5 in last 5 years</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_cc'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">Between 2 & 5 in the last 5 years</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_cc'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">At least 1 in the last 5 years</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <br/> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <table id="stcon_wpc_table" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <th>Name of Client, Client’s Representative & Contact Details</th>
                                                                        <th>Project</th>
                                                                        <th>Scope of Work</th>
                                                                        <th>Start Date</th>
                                                                        <th>Completion Date</th>
                                                                        <th>Certificates References/ Recommendations from Clients</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="itemsTbody">
                                                                    <?php if (!empty($mRecord['stcon_wpc_details'])) { ?>
                                                                        <?php
                                                                        $mCount = 0;
                                                                        foreach (json_decode($mRecord['stcon_wpc_details']) as $key => $mScope) {
                                                                            $mCount++;
                                                                            ?>
                                                                            <tr>
                                                                                <td><a class="deleteRow"></a></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[0]; ?>" type="text" name="stcon_wpc_details[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                                </td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[1]; ?>" type="text" name="stcon_wpc_details[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[2]; ?>" type="text" name="stcon_wpc_details[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td>
                                                                                    <input max="<?php echo date("Y-m-d"); ?>" <?php echo $disable; ?> value="<?php echo $mScope[3]; ?>" type="date" name="stcon_wpc_details[<?php echo $mCount; ?>][]"  class="form-control"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input max="<?php echo date("Y-m-d"); ?>" <?php echo $disable; ?> value="<?php echo $mScope[4]; ?>" type="date" name="stcon_wpc_details[<?php echo $mCount; ?>][]"  class="form-control"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[5]; ?>" type="file" name="stcon_wpc_details[<?php echo $mCount; ?>][]"  class="form-control"/>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr>
                                                                            <td><a class="deleteRow"></a></td>
                                                                            <td>
                                                                                <input value="" type="text" name="stcon_wpc_details[1][]" class="form-control"/>
                                                                            </td>
                                                                            <td><input value="" type="text" name="stcon_wpc_details[1][]"  class="form-control"/></td>
                                                                            <td><input value="" type="text" name="stcon_wpc_details[1][]"  class="form-control"/></td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" name="stcon_wpc_details[1][]"  class="form-control"/>
                                                                            </td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" name="stcon_wpc_details[1][]"  class="form-control"/>
                                                                            </td>
                                                                            <td>
                                                                                <input type="file" name="stcon_wpc_details[1][]"  class="form-control"/>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php if ($disable != "disabled") { ?>
                                                                <div class="well clearfix text-right">
                                                                    <a href="#" class="btn btn-primary" id="addrowscope">
                                                                        <span class="fa fa-plus"></span>
                                                                        Add Row
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-control">
                                                            <label><h6>Attachment : </h6></label>
                                                            <input type="file" name="stcon_wpc_attachment" class="form-group" value="" <?php echo $disable; ?>>
                                                            <?php if ($disable == "disabled" && $mRecord['stcon_wpc_attachment']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stcon_wpc_attachment']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <h6><b> Completion Certificates : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stcon_ccc'] == "More than 6") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_11" name="stcon_ccc" value="More than 6">
                                                            <label class="form-check-label" for="checkbox_11">More than 6</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stcon_ccc'] == "3 to 6") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_12" name="stcon_ccc" value="3 to 6" >
                                                            <label class="form-check-label" for="checkbox_12">Establishment >3 to 6 </label>
                                                        </div>    
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stcon_ccc'] == "1 to 2") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_13" name="stcon_ccc" value="1 to 2" >
                                                            <label class="form-check-label" for="checkbox_13">1 to 2</label>
                                                        </div>  
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><b> Details of Current Work/Deliveries in Progress : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <table id="stcon_dcw_table" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <th>
                                                                            Name of Client, Client’s Representative & Contact Details
                                                                        </th>
                                                                        <th>Project</th>
                                                                        <th>Scope of Work</th>
                                                                        <th>Work Order Value Rs.(In Crores)</th>
                                                                        <th>Total Billed Value(In Crores)</th>
                                                                        <th>
                                                                            Start Date
                                                                        </th>
                                                                        <th>
                                                                            Target Completion Date
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="itemsTbody">
                                                                    <?php if (!empty($mRecord['stcon_dcw_details'])) { ?>
                                                                        <?php
                                                                        $mCount = 0;
                                                                        foreach (json_decode($mRecord['stcon_dcw_details']) as $key => $mScope) {
                                                                            $mCount++;
                                                                            ?>
                                                                            <tr>
                                                                                <td><a class="deleteRow"></a></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[0]; ?>" type="text" name="stcon_dcw_details[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                                </td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[1]; ?>" type="text" name="stcon_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[2]; ?>" type="text" name="stcon_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[3]; ?>" type="number" name="stcon_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[4]; ?>" type="number" name="stcon_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td>
                                                                                    <input max="<?php echo date("Y-m-d"); ?>" <?php echo $disable; ?> value="<?php echo $mScope[5]; ?>" type="date" name="stcon_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input max="<?php echo date("Y-m-d"); ?>" <?php echo $disable; ?> value="<?php echo $mScope[6]; ?>" type="date" name="stcon_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr>
                                                                            <td><a class="deleteRowCc"></a></td>
                                                                            <td>
                                                                                <input value="" type="text" name="stcon_dcw_details[1][]" class="form-control"/>
                                                                            </td>
                                                                            <td><input value="" type="text" name="stcon_dcw_details[1][]"  class="form-control"/></td>
                                                                            <td><input value="" type="text" name="stcon_dcw_details[1][]"  class="form-control"/></td>
                                                                            <td><input value="" type="number" name="stcon_dcw_details[1][]"  class="form-control"/></td>
                                                                            <td><input value="" type="number" name="stcon_dcw_details[1][]"  class="form-control"/></td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" name="stcon_dcw_details[1][]"  class="form-control"/>
                                                                            </td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" name="stcon_dcw_details[1][]"  class="form-control"/>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php if ($disable != "disabled") { ?>
                                                                <div class="well clearfix text-right">
                                                                    <a href="#" class="btn btn-primary" id="addrowcc">
                                                                        <span class="fa fa-plus"></span>
                                                                        Add Row
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-control">
                                                            <label><h6>Attachment : </h6></label>
                                                            <input type="file" name="stcon_dcw_attachment" class="form-group" value="" <?php echo $disable; ?>>
                                                            <?php if ($disable == "disabled" && $mRecord['stcon_dcw_attachment']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stcon_dcw_attachment']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                            </section>
                                            <!-- Step 2 -->
                                            <h6></h6>
                                            <section>
                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            PERSONNEL, SUB CONSULTANT & OTHER RESOURCES
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <br>
                                                <h6><b>Human Resource-Own Employees </b></h6>
                                                <p>Indicate total number of staff currently on payroll in the different areas of expertise</p>
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
                                                                    <tr>
                                                                        <td>Total Technical Staff as of Now</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_hroe[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo json_decode($mRecord['stcon_hroe'])[0];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Technical Staff in Previous FY</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_hroe[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo json_decode($mRecord['stcon_hroe'])[1];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Total Technical Staff in Pre Previous FY</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_hroe[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo json_decode($mRecord['stcon_hroe'])[2];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>

                                                        </div> 
                                                    </div>
                                                </div>
                                                <h6><b>Attrition Rate of Employees</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stcon_roe" name="stcon_roe" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_roe'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Average < 10% over last 3 years</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_roe'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">Average > 10% : < 20% over last 3 years</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_roe'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">Average > 20% over last 3 years</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <h6><b>Automation Capability/Resources</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" >
                                                                <tbody id="tbl_posts_5_body">
                                                                    <?php $mRecord['stcon_acr'] = json_decode($mRecord['stcon_acr']); ?>
                                                                    <tr>
                                                                        <td>CADD System</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_acr[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stcon_acr'][0];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Database Standards</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_acr[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stcon_acr'][1];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Engineering Planning & Controls</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_acr[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stcon_acr'][2];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Engineering Tools</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_acr[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stcon_hroe'][3];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Document Management System</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_acr[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stcon_hroe'][4];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Software/App/ERP System</td>
                                                                        <td>
                                                                            <input type="text" name="stcon_acr[]" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stcon_hroe'][5];
                                                                            }
                                                                            ?>" <?php echo $disable; ?>>
                                                                        <td>
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
                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            Professional Indemnity Insurance
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stcon_pii" name="stcon_roe" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_pii'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">> Rs. 10 crore</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_pii'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">> Rs. 5 Crore ; < Rs. 10crores</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_pii'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">< Rs. 5 Crore</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stcon_pii'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">No PLI cover</option>
                                                            </select>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            Financial details & legal status
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <br>
                                                <h6><b>Financial Referees/References </b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="table-responsive"> 
                                                            <table id="stcon_financial_referees_table" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <th>Bank/Financial Institution</th>
                                                                        <th>Name of Referee</th> 
                                                                        <th>Position</th>
                                                                        <th>Contact Details</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="itemsTbody">

                                                                    <?php if (!empty($mRecord['stcon_financial_referees'])) { ?>
                                                                        <?php
                                                                        $mCount = 0;
                                                                        foreach (json_decode($mRecord['stcon_financial_referees']) as $key => $mScope) {
                                                                            $mCount++;
                                                                            ?>
                                                                            <tr>
                                                                                <td><a class="deleteRow"></a></td>
                                                                                <td>
                                                                                    <input <?php echo $disable ?> value="<?php echo $mScope[0]; ?>" type="text" name="stcon_financial_referees[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                                </td>
                                                                                <td><input <?php echo $disable ?> value="<?php echo $mScope[1]; ?>" type="text" name="stcon_financial_referees[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td><input <?php echo $disable ?> value="<?php echo $mScope[2]; ?>" type="text" name="stcon_financial_referees[<?php echo $mCount; ?>][]"  class="form-control"/></td>
                                                                                <td>
                                                                                    <input <?php echo $disable ?> value="<?php echo $mScope[3]; ?>" type="text" name="stcon_financial_referees[<?php echo $mCount; ?>][]"  class="form-control"/>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr>
                                                                            <td><a class="deleteRow"></a></td>
                                                                            <td>
                                                                                <input type="text" name="stcon_financial_referees[1][]" class="form-control"/>
                                                                            </td>
                                                                            <td><input type="text" name="stcon_financial_referees[1][]"  class="form-control"/></td>
                                                                            <td><input type="text" name="stcon_financial_referees[1][]"  class="form-control"/></td>
                                                                            <td><input type="text" name="stcon_financial_referees[1][]"  class="form-control"/></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php if ($disable != "disabled") { ?>
                                                                <div class="well clearfix text-right">
                                                                    <a href="#" class="btn btn-primary" id="addrowfr">
                                                                        <span class="fa fa-plus"></span>
                                                                        Add Row
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                        <br>
                                                        <div>
                                                            <h6>Attach Solvency Certificate from Bank confirming that the company’s bank      account is in a good standing </h6>
                                                            <input <?php echo $disable; ?> type="file" name="stcon_attachment_two" value="">
                                                            <?php if ($disable == "disabled" && $mRecord['stcon_attachment_two']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stcon_attachment_two']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="box">
                                                            <!-- /.box-header -->
                                                            <div class="box-body">
                                                                <div class="table-responsive-sm">
                                                                    <?php
                                                                    $mTotal = json_decode($mRecord['stcon_total_assets']);
                                                                    $mCurrent = json_decode($mRecord['stcon_current_assets']);
                                                                    $mLia = json_decode($mRecord['stcon_total_lia']);
                                                                    $mCurLia = json_decode($mRecord['stcon_current_lia']);
                                                                    $mTurn = json_decode($mRecord['stcon_turnover']);
                                                                    $mProfits = json_decode($mRecord['stcon_profits']);
                                                                    $mProfitsTax = json_decode($mRecord['stcon_profits_tax']);
                                                                    ?>
                                                                    <table class="table table-bordered table-separated">
                                                                        <tr>
                                                                            <th rowspan="2" >Financial Information in Rs.</th>
                                                                            <th colspan="4" style="text-align:center;">Audited Balance Sheet data for 4 years (In Crores)</th> 
                                                                        </tr>
                                                                        <tr> 
                                                                            <td>Year 1 (2020)</td>
                                                                            <td>Year 2 (2021)</td>
                                                                            <td>Year 3 (2022)</td>
                                                                        </tr>
                                                                        <tr>

                                                                            <td>Total Assets</td>
                                                                            <td><input type="text" name="stcon_total_assets[]" value="<?php echo $mTotal[0]; ?>" <?php echo $disable; ?>></td>
                                                                            <td><input type="text" name="stcon_total_assets[]" value="<?php echo $mTotal[1]; ?>" <?php echo $disable; ?>></td>
                                                                            <td><input type="text" name="stcon_total_assets[]" value="<?php echo $mTotal[2]; ?>" <?php echo $disable; ?>></td> 
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Current Assets</td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_current_assets[]" value="<?php echo $mCurrent[0]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_current_assets[]" value="<?php echo $mCurrent[1]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_current_assets[]" value="<?php echo $mCurrent[2]; ?>"></td>


                                                                        </tr>
                                                                        <tr>
                                                                            <td>Total Liabilities</td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_total_lia[]" value="<?php echo $mLia[0]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_total_lia[]" value="<?php echo $mLia[1]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_total_lia[]" value="<?php echo $mLia[2]; ?>"></td>

                                                                        </tr>
                                                                        <tr>
                                                                            <td>Current Liabilities</td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_current_lia[]" value="<?php echo $mCurLia[0]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_current_lia[]" value="<?php echo $mCurLia[1]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_current_lia[]" value="<?php echo $mCurLia[2]; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Turnover</td>
                                                                            <td><input <?php echo $disable; ?> type="number" name="stcon_turnover[]" value="<?php echo $mTurn[0]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="number" name="stcon_turnover[]" value="<?php echo $mTurn[1]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="number" name="stcon_turnover[]" value="<?php echo $mTurn[2]; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Profits before Taxes</td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_profits[]" value="<?php echo $mProfits[0]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_profits[]" value="<?php echo $mProfits[1]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_profits[]" value="<?php echo $mProfits[2]; ?>"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Profits after Taxes</td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_profits_tax[]" value="<?php echo $mProfitsTax[0]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_profits_tax[]" value="<?php echo $mProfitsTax[1]; ?>"></td>
                                                                            <td><input <?php echo $disable; ?> type="text" name="stcon_profits_tax[]" value="<?php echo $mProfitsTax[2]; ?>"></td>
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
                                            <!-- Step 4 -->
                                            <h6></h6>
                                            <section>
                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            CERTIFICATIONS/AWARDS
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">
                                                            <fieldset>
                                                                <input type="checkbox" id="checkbox_122" name="stcon_qac[]" value="> 5"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_qac']);

                                                                    if (in_array('> 5', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>

                                                                <label class="form-check-label" for="checkbox_122">> 5
                                                                </label>

                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_123"  name="stcon_qac[]" value="2 to 5"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_qac']);

                                                                    if (in_array('2 to 5', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_123">2 to 5</label>
                                                            </fieldset>
                                                            <fieldset>
                                                                <input class="form-check-input" type="checkbox" id="checkbox_123"  name="stcon_qac[]" value="At least 1"  
                                                                <?php
                                                                if (!empty($mRecord)) {
                                                                    $data = json_decode($mRecord['stcon_qac']);

                                                                    if (in_array('At least 1', $data)) {
                                                                        echo'checked';
                                                                    }
                                                                }
                                                                ?> <?php echo $disable; ?>>
                                                                <label class="form-check-label" for="checkbox_123">At least 1</label>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
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
                                                                                            <input <?php echo $disable; ?> name="stcon_qap" type="radio" id="radio_1" value="Yes" 
                                                                                            <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_qap'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                                                           >
                                                                                            <label for="radio_1">Yes</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_qap" type="radio" id="radio_2" value="No"
                                                                                            <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_qap'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                                                           >
                                                                                            <label for="radio_2">No</label>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>ISO 9001 certification</td>
                                                                                <td>
                                                                                    <div class="controls">
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_9001_isoc" type="radio" id="radio_3" value="Yes" 
                                                                                            <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_9001_isoc'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            <label for="radio_3">Yes</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_9001_isoc" type="radio" id="radio_4" value="No"
                                                                                            <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_9001_isoc'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            <label for="radio_4">No</label>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>ISO 45001 certification</td>
                                                                                <td>
                                                                                    <div class="controls">
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_45001_isoc" type="radio" id="radio_5" value="Yes"  <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_45001_isoc'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            <label for="radio_5">Yes</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_45001_isoc" type="radio" id="radio_6" value="No"<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_45001_isoc'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>>
                                                                                            <label for="radio_6">No</label>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Other Certificates & Awards</td>
                                                                                <td>
                                                                                    <div class="controls">
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_oca" type="radio" id="radio_7" value="Yes"   <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_oca'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>  >
                                                                                            <label for="radio_7">Yes</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_oca" type="radio" id="radio_8" value="No" <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_oca'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?> >
                                                                                            <label for="radio_8">No</label>
                                                                                        </fieldset>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Industry Accepted Quality Assurance Program</td>
                                                                                <td>
                                                                                    <div class="controls">
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_iaqap" type="radio" id="radio_9" value="Yes"   <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_iaqap'] == 'Yes') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>>
                                                                                            <label for="radio_9">Yes</label>
                                                                                        </fieldset>
                                                                                        <fieldset>
                                                                                            <input <?php echo $disable; ?> name="stcon_iaqap" type="radio" id="radio_10" value="No" <?php
                                                                                            if (!empty($mRecord)) {
                                                                                                if ($mRecord['stcon_iaqap'] == 'No') {
                                                                                                    echo "checked";
                                                                                                }
                                                                                            }
                                                                                            ?>>
                                                                                            <label for="radio_10">No</label>
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
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <input value="<?php echo $mRecord['stcon_partner_field_1']; ?>" <?php echo $disable; ?> class="form-control" name="stcon_partner_field_1" required="" />	  					
                                                        Proprietor/ Partner/ Director of M/s 
                                                        <input value="<?php echo $mRecord['stcon_partner_field_2']; ?>" <?php echo $disable; ?> class="form-control" name="stcon_partner_field_2" required="" />
                                                        hereby confirm that, to the best of my knowledge and information there is no default/ contravention of various laws enactments etc applicable to our firm generally and in particular the following enactments and/or order, rules etc. Made hereunder up to the date of this certificate.
                                                        <br>
                                                        1.	Minimum Wages Act, 1948
                                                        <br>
                                                        2.	BOCW Act, 1996
                                                        <br>
                                                        3.	Companies Act, 1956
                                                        <br>
                                                        4.	Central Excises & Salt Act, 1944
                                                        <br>
                                                        5.	Central Sales Act, 1956 and Local Sales Tax Laws
                                                        <br>
                                                        6.	Income Tax Act, 1961
                                                        <br>
                                                        7.	Customs Act, 1962
                                                        <br>
                                                        8.	Foreign Exchange Management Act, 1999
                                                        <br>
                                                        9.	Industries (Development & Regulation) Act, 1951
                                                        <br>
                                                        10.	Water (Prevention & Control of Pollution) Act, 1974
                                                        <br>
                                                        11.	Air (Prevention & Control of Pollution) Act, 1981
                                                        <br>
                                                        12.	The Environment (Protection) Act, 1986
                                                        <br>
                                                        13.	Factories Act, 1948
                                                        <br>
                                                        14.	Employee’s State Insurance Act, 1948
                                                        <br>
                                                        15.	Employee’s Provident Fund and Miscellaneous Provision Act, 1952
                                                        <br>
                                                        16.	All State enactments governing the working of the Company
                                                        <br>
                                                        During the period covered by this certificate, the Company has made proper deductions applicable and has deposited with the concerned authorities, within prescribed time, all statutory dues such as Excise Duty, Sales Tax, Income Tax, Custom Duty, Provident Fund, ESI Contributions, etc....
                                                        <br>
                                                        The relevant returns under various Laws/Rules applicable to the Company have been duly filled in time with the concerned authorities.
                                                        <input <?php echo $disable; ?> class="form-check-input" type="checkbox" id="checkbox_17" name="stcon_confirmation" value="1" required <?php
                                                        if (!empty($mRecord)) {
                                                            $data = $mRecord['stcon_confirmation'];
                                                            if ($data == 1) {
                                                                echo 'checked';
                                                            }
                                                        }
                                                        ?>>
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

        <script>

            var form = $(".validation-wizard").show();

            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                , transitionEffect: "none"
                , titleTemplate: '<span class="step">Step #index# </span>  '
                , labels: {

                    finish: "Submit"

                }
                , onStepChanging: function (event, currentIndex, newIndex) {
                    return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                    //return newIndex;
                }
                , onFinishing: function (event, currentIndex) {
                    //alert(form.validate().settings.ignore = ":disabled", form.valid());
                    return form.validate().settings.ignore = ":disabled", form.valid()
                }
                , onFinished: function (event, currentIndex) {
<?php if ($disable != "disabled") { ?>
                        var form = document.getElementById("register_form");
                        form.submit();
<?php } ?>
                }
            }), $(".validation-wizard").validate({
                ignore: "input[type=hidden]"
                , errorClass: "text-danger"
                , successClass: "text-success"
                , highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , errorPlacement: function (error, element) {
                    error.insertAfter(element)
                }
                , rules: {

                    email: {
                        email: !0
                    }
                }
            });

            $(document).ready(function () {

                var counterscope = 2;

                $("#addrowscope").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                    cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                    cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                    cols += '<td><input type="file" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                    newRow.append(cols);
                    $("#stcon_wpc_table").append(newRow);
                    counterscope++;
                });

                $("#stcon_wpc_table").on("click", ".ibtnDelScope", function (event) {
                    $(this).closest("tr").remove();
                    counterscope -= 1
                });

                $('#stcon_wpc').on('change', function () {
                    if (this.value === "1") {
                        var rowCount = $('#stcon_wpc_table tr').length;
                        var count = rowCount;
                        if (count < 11) {
                            var times = 9;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                                cols += '<td><input type="file" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                                newRow.append(cols);
                                $("#stcon_wpc_table").append(newRow);
                                counterscope++;
                            }
                        }
                    }
                });

                $('#stcon_cc').on('change', function () {
                    if (this.value === "1") {
                        var rowCount = $('#stcon_wpc_table tr').length;
                        var count = rowCount;
                        if (count < 6) {
                            var times = 5;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                                cols += '<td><input type="file" class="form-control" name="stcon_wpc_details[' + counterscope + '][]"/></td></td>';
                                newRow.append(cols);
                                $("#stcon_wpc_table").append(newRow);
                                counterscope++;
                            }
                        }
                    }
                });

                var counterdcw = 2;

                $("#addrowcc").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                    cols += '<td><input type="number" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                    cols += '<td><input type="number" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                    cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td></td>';
                    cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td></td>';
                    newRow.append(cols);
                    $("#stcon_dcw_table").append(newRow);
                    counterdcw++;
                });

                $("#stcon_dcw_table").on("click", ".ibtnDelDcw", function (event) {
                    $(this).closest("tr").remove();
                    counterdcw -= 1
                });

                $('#stcon_dcw').on('change', function () {
                    if (this.value != "3") {
                        var rowCount = $('#stcon_dcw_table tr').length;
                        var count = rowCount;
                        if (count < 3) {
                            var times = 2;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                                cols += '<td><input type="text" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                                cols += '<td><input type="number" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                                cols += '<td><input type="number" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control" name="stcon_wpc_details[' + counterdcw + '][]"/></td></td>';
                                newRow.append(cols);
                                $("#stcon_dcw_table").append(newRow);
                                counterdcw++;
                            }
                        }
                    }
                });

                var counterfr = 2;

                $("#addrowfr").on("click", function () {
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input type="button" class="ibtnDelFr btn btn-sm btn-danger"  value="Delete"></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_financial_referees[' + counterfr + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_financial_referees[' + counterfr + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_financial_referees[' + counterfr + '][]"/></td>';
                    cols += '<td><input type="text" class="form-control" name="stcon_financial_referees[' + counterfr + '][]"/></td>';
                    newRow.append(cols);
                    $("#stcon_financial_referees_table").append(newRow);
                    counterfr++;
                });

                $("#stcon_financial_referees_table").on("click", ".ibtnDelFr", function (event) {
                    $(this).closest("tr").remove();
                    counterfr -= 1
                });

            });


        </script>

    </body>
</html>