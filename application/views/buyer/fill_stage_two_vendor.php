<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <style>
        table tr input[type='number']{
            width: 150px;
        }

        table tr input[type='text']{
            width: 150px;
        }

        .table-select{
            width: 150px !important;
        }

        table tr input[type='file']{
            width: 200px;
        }
    </style>

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
                                    // echo $mRecord['stv_tow'];
                                    //if(!empty($mRecord)){echo implode(',', (array) $a); }
                                    ?>
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('vendor/home/postStageTwoVendor'); ?>" method="POST" class="validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h6><b>Preamble :</b></h6>
                                                            <p>
                                                                Godrej Properties Ltd. (GPL) plans to undertake various new projects. GPL wishes to register competent and resourceful agencies (Contractor/Vendor/Consultant) for undertaking various works related to the projects.
                                                            </p>
                                                            <br/>
                                                            <h6><b>Scope of Prequalification:</b> </h6>
                                                            <p>To identify and assess agencies on various parameters including but not limited to competency, resourcefulness, experience, management band width, etc. with a view to prequalify agencies in appropriate categories. </p>
                                                            <p>GPL reserves the right to Prequalify or otherwise any applicant without assigning any reason there for.</p>
                                                            <h6>
                                                                <b>
                                                                    Disclaimer: Any information provided if not correct or misrepresented, GPL has all rights to terminate the Business Associations/any Work Order/Purchase Order/Contract.
                                                                </b>
                                                            </h6> 
                                                            <p><b>Notes on Form of Prequalification Information</b></p>
                                                            <p> • The information to be filled in by Agency in the following pages will be used for the purposes of Prequalification.<br/>
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
                                                            <input type="text" class="form-control required" id="stv_company" name="stv_company" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_company'];
                                                            } else {
                                                                echo $stageOne['company_name'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                                            <select class="custom-select form-control required" id="stv_tof" name="stv_tof" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select type of Firm</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_tof'] == "Corporate or Company") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Corporate or Company">Corporate or Company</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_tof'] == "Subsidiary") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Subsidiary">Subsidiary</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_tof'] == "Division") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Division">Division</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_tof'] == "Proprietor") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Proprietor">Proprietor</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_tof'] == "Partnership") {
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
                                                            <input type="text" class="form-control required" id="stv_reg" name="stv_reg" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_reg'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Date of Incorporation :<span class="danger">*</span></label>
                                                            <input type="date" class="form-control required" id="stv_doi" name="stv_doi" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_doi'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Statutory Details</b></h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="addressline1">GSTN :<span class="danger">*</span></label>
                                                            <br>
                                                            <input placeholder="Please click on enter to input multiple values" data-role="tagsinput" type="text" id="stv_gst" name="stv_gst" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_gst'];
                                                            }
                                                            ?>"  <?php echo $disable; ?>>
                                                            <br><br>
                                                            <?php if ($disable == "") { ?>
                                                                <input required="" type="file" name="stv_gst_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php } ?>
                                                            <?php if ($disable == "disabled" && $mRecord['stv_gst_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_gst_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location3">PAN NO :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stv_pan" name="stv_pan" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_pan'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                            <br>
                                                            <?php if ($disable == "") { ?>
                                                                <input required="" type="file" name="stv_pan_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php } ?>
                                                            <?php if ($disable == "disabled" && $mRecord['stv_pan_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_pan_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                EPF :
                                                                <a style="display: <?php
                                                                if ($mRecord['stv_epf'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stv_epf_modal_toggle" href="#" data-toggle="modal" data-target="#stv_epf_modal" class="badge badge-gray">View EPF Declaration Form</a>
                                                            </label>
                                                            <select class="form-control" id="stv_epf" name="stv_epf" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_epf'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_epf'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stv_epf_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_epf_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stv_epf_attach" id="stv_epf_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                ESIC :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stv_esic'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stv_esic_modal_toggle" href="#" data-toggle="modal" data-target="#stv_esic_modal" class="badge badge-gray">View ESIC Declaration Form</a>
                                                            </label>
                                                            <select class="form-control" id="stv_esic" name="stv_esic" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_esic'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_esic'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stv_esic_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_esic_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stv_esic_attach" id="stv_esic_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                Labour Welfare Fund :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stv_lwf'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stv_lwf_modal_toggle" href="#" data-toggle="modal" data-target="#stv_lwf_modal" class="badge badge-gray">View LWF Declaration Form</a>
                                                            </label>
                                                            <select class="form-control" id="stv_lwf" name="stv_lwf" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_lwf'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_lwf'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stv_lwf_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_lwf_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stv_lwf_attach" id="stv_lwf_attach" />



                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                Professional Tax Registration Certificate :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stv_ptrc'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stv_ptrc_modal_toggle" href="#" data-toggle="modal" data-target="#stv_ptrc_modal" class="badge badge-gray">View PTRC Declaration Form</a>
                                                            </label>
                                                            <select class="form-control" id="stv_ptrc" name="stv_ptrc" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_ptrc'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_ptrc'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stv_ptrc_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_ptrc_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stv_ptrc_attach" id="stv_ptrc_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">Shops & Establishment Code NO :<span class="danger">*</span></label>
                                                            <select class="form-control" id="stv_secn" name="stv_secn" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_secn'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_secn'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stv_secn_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_secn_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stv_secn_attach" id="stv_secn_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">Labour Identification Number :<span class="danger">*</span></label>
                                                            <select class="form-control" id="stv_lin" name="stv_lin" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_lin'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_lin'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stv_lin_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_lin_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stv_lin_attach" id="stv_lin_attach" />

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade stv_epf_modal" data-backdrop="false" id="stv_epf_modal" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold">
                                                                    Declaration for non-applicability of Employees' Provident Fund and Miscellaneous Provision Act 1952 (EPF & MP Act)
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="panel-body border border-info">

                                                                    <b>
                                                                        Date : <?php echo date('d-m-Y'); ?>
                                                                        <br><br>
                                                                    </b>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>To,</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_epf_to" name="stv_epf_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_epf_to'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <h6>Dear Sir/Madam,</h6>
                                                                            <br>
                                                                            <h6>We, M/s</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_epf_one" name="stv_epf_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_epf_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_epf_two" name="stv_epf_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_epf_two'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>as Contractor/Vendor/Consultant which expression shall unless it be repugnant to the context or meaning thereof, be deemed to mean and include their respective assigns, successors, executors and/or administrators), hereby declare that as per Section 1 (3)(b) of the Employees Provident Fund and Miscellaneous Provisions Act, 1952, the EPF Act is applicable to all the establishments employing 20 or more persons on any day of the preceding twelve months but our above-mentioned firm/office/company does not fall under the purview of the said Act as we have not employed 20 or more employees on any day of the preceding twelve months. </h6>
                                                                            <h6>Consequently, the stated Act is not applicable to us at this juncture.</h6>
                                                                            <h6>
                                                                                Thanking you,
                                                                                <br>
                                                                                Yours Sincerely
                                                                            </h6>
                                                                            <h6>
                                                                                <b>
                                                                                    For M/s 
                                                                                </b>
                                                                            </h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_epf_three" name="stv_epf_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_epf_three'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />

                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            Authorized Signatory
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Name: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_epf_four" name="stv_epf_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_epf_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_epf_five" name="stv_epf_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_epf_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="date" id="stv_epf_six" name="stv_epf_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_epf_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stv_epf_date" name="stv_epf_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_epf_date'];
                                                                                            } else {
                                                                                                echo date('d-m-Y');
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <?php if ($disable == "") { ?>
                                                                    <button type="button" class="btn btn-secondary" id="stv_epf_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stv_epf_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade stv_esic_modal" data-backdrop="false" id="stv_esic_modal" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold">
                                                                    Declaration for non-applicability of: Employees State Insurance Act, 1948 (ESIC)
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="panel-body border border-info">

                                                                    <b>
                                                                        Date : <?php echo date('d-m-Y'); ?>
                                                                        <br><br>
                                                                    </b>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>To,</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_esic_to" name="stv_esic_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_esic_to'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <h6>Dear Sir/Madam,</h6>
                                                                            <br>
                                                                            <h6>We, M/s</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_esic_one" name="stv_esic_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_esic_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_esic_two" name="stv_esic_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_esic_two'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>
                                                                                as Contractor/Vendor/Consultant which expression shall unless it be repugnant to the context or meaning thereof, be deemed to mean and include their respective assigns, successors, executors and/or administrators), hereby declare that as per Section 2(12) of the Employees State Insurance Act, 1948, the ESI Act is applicable to all the establishments employing 10 or more persons on any day of the preceding twelve months but our above-mentioned firm/office/company does not fall under the purview of the said Act as we have not employed 10 or more employees on any day of the preceding twelve months.
                                                                            </h6>
                                                                            <h6>Consequently, the stated Act is not applicable to us at this juncture.</h6>
                                                                            <h6>
                                                                                Thanking you,
                                                                                <br>
                                                                                Yours Sincerely
                                                                            </h6>
                                                                            <h6>
                                                                                <b>
                                                                                    For M/s 
                                                                                </b>
                                                                            </h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_esic_three" name="stv_esic_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_esic_three'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />

                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            Authorized Signatory
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Name: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_esic_four" name="stv_esic_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_esic_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_esic_five" name="stv_esic_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_esic_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="date" id="stv_esic_six" name="stv_esic_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_esic_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stv_esic_date" name="stv_esic_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_esic_date'];
                                                                                            } else {
                                                                                                echo date('d-m-Y');
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <?php if ($disable == "") { ?>
                                                                    <button type="button" class="btn btn-secondary" id="stv_esic_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stv_esic_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade stv_lwf_modal" data-backdrop="false" id="stv_lwf_modal" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold">
                                                                    Declaration for non-applicability of Labour Welfare Fund Act (LWF)
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="panel-body border border-info">

                                                                    <b>
                                                                        Date : <?php echo date('d-m-Y'); ?>
                                                                        <br><br>
                                                                    </b>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>To,</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_lwf_to" name="stv_lwf_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_lwf_to'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <h6>Dear Sir/Madam,</h6>
                                                                            <br>
                                                                            <h6>We, M/s</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_lwf_one" name="stv_lwf_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_lwf_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_lwf_two" name="stv_lwf_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_lwf_two'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>
                                                                                as Contractor/Vendor/Consultant which expression shall unless it be repugnant to the context or meaning thereof, be deemed to mean and include their respective assigns, successors, executors and/or administrators), hereby declare that as per The Labour Welfare Fund Act,  the LWF Act is applicable to all the establishments employing 5 or more persons or as applicable in the respective State(s) on any day of the preceding twelve months but our above-mentioned firm/office/company does not fall under the purview of the said Act as we have not employed 5 or more employees or as applicable in the respective State(s) on any day of the preceding twelve months. 
                                                                            </h6>
                                                                            <h6>Consequently, the stated Act is not applicable to us at this juncture.</h6>
                                                                            <h6>
                                                                                Thanking you,
                                                                                <br>
                                                                                Yours Sincerely
                                                                            </h6>
                                                                            <h6>
                                                                                <b>
                                                                                    For M/s 
                                                                                </b>
                                                                            </h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_lwf_three" name="stv_lwf_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_lwf_three'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />

                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            Authorized Signatory
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Name: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_lwf_four" name="stv_lwf_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_lwf_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_lwf_five" name="stv_lwf_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_lwf_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="date" id="stv_lwf_six" name="stv_lwf_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_lwf_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stv_lwf_date" name="stv_lwf_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_lwf_date'];
                                                                                            } else {
                                                                                                echo date('d-m-Y');
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <?php if ($disable == "") { ?>
                                                                    <button type="button" class="btn btn-secondary" id="stv_lwf_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stv_lwf_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade stv_ptrc_modal" data-backdrop="false" id="stv_ptrc_modal" tabindex="-1">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title text-bold">
                                                                    Declaration for non-applicability of Profession Tax Registration Certificate (PTRC)
                                                                </h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="panel-body border border-info">

                                                                    <b>
                                                                        Date : <?php echo date('d-m-Y'); ?>
                                                                        <br><br>
                                                                    </b>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <h6>To,</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_ptrc_to" name="stv_ptrc_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_ptrc_to'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <br>
                                                                            <h6>Dear Sir/Madam,</h6>
                                                                            <br>
                                                                            <h6>We, M/s</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_ptrc_one" name="stv_ptrc_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_ptrc_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_ptrc_two" name="stv_ptrc_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_ptrc_two'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>
                                                                                Contractor/Vendor/Consultant which expression shall unless it be repugnant to the context or meaning thereof, be deemed to mean and include their respective assigns, successors, executors and/or administrators), hereby declare that as per The Profession Tax  Act,  the  PTRC is applicable to all the registered establishments basis the salary slab as applicable in the respective State(s) and whose professional tax under PTRC will be deducted basis the salary slab but our above-mentioned firm/office/company does not fall under the purview of the said Act as we have not employed any no. of employees or as applicable in the respective State(s) on any day of the preceding twelve months.
                                                                            </h6>
                                                                            <h6>Consequently, the stated Act is not applicable to us at this juncture.</h6>
                                                                            <h6>
                                                                                Thanking you,
                                                                                <br>
                                                                                Yours Sincerely
                                                                            </h6>
                                                                            <h6>
                                                                                <b>
                                                                                    For M/s 
                                                                                </b>
                                                                            </h6>
                                                                            <input required="true" class="form-control" type="text" id="stv_ptrc_three" name="stv_ptrc_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stv_ptrc_three'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />

                                                                            <table class="table">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td colspan="2">
                                                                                            Authorized Signatory
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Name: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_ptrc_four" name="stv_ptrc_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_ptrc_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stv_ptrc_five" name="stv_ptrc_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_ptrc_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="date" id="stv_ptrc_six" name="stv_ptrc_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_ptrc_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stv_ptrc_date" name="stv_ptrc_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stv_ptrc_date'];
                                                                                            } else {
                                                                                                echo date('d-m-Y');
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer modal-footer-uniform">
                                                                <?php if ($disable == "") { ?>
                                                                    <button type="button" class="btn btn-secondary" id="stv_ptrc_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stv_ptrc_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Company Address & Contact Details</b></h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="url123">Address :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stv_address" name="stv_address" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_address'];
                                                            } else {
                                                                echo $stageOne['address'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username123">Telephone :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control required" id="stv_tel" name="stv_tel" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_tel'];
                                                            } else {
                                                                echo $stageOne['contact_number'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="col-6">
                                                                                                            <div class="form-group">
                                                                                                                <label for="password123">Fax :<span class="danger">*</span></label>
                                                                                                                <input type="text" class="form-control required" id="stv_fax" name="stv_fax" value="<?php
                                                    if (!empty($mRecord)) {
                                                        echo $mRecord['stv_fax'];
                                                    }
                                                    ?>" <?php echo $disable; ?>>
                                                                                                            </div>
                                                                                                        </div>-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Website :</label>
                                                            <input type="text" class="form-control" id="stv_website" name="stv_website" placeholder="http://" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_website'];
                                                            } else {
                                                                echo $stageOne['website'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name of Contact Person :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stv_nocp" name="stv_nocp" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_nocp'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email of the Contact Person :<span class="danger">*</span></label>
                                                            <input placeholder="Please click on enter to input multiple values" data-role="tagsinput" type="text" class="form-control" id="stv_eocp" name="stv_eocp" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_eocp'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>No. of years as Vendor : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input readonly="" type="number" class="form-control required" id="stv_noy" name="stv_noy" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stv_noy'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>Type of Work for which Pre qualification is sought : <span class="danger">*</span></b></h6>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="controls">

                                                            <?php
                                                            $mIdCount = 0;
                                                            echo $stageOne['type_of_work_id'];
                                                            foreach ($mTows as $key => $mTow) {
                                                                $mIdCount++;
                                                                ?>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_tow_<?php echo $mIdCount; ?>" name="stv_tow[]" value="<?php echo $mTow['id']; ?>"  
                                                                    <?php
                                                                    if (!empty($mRecord)) {
                                                                        $data = json_decode($mRecord['stv_tow']);

                                                                        if (in_array($mTow['id'], $data)) {
                                                                            echo 'checked';
                                                                        }
                                                                    }
                                                                    ?>
                                                                    <?php
                                                                    if ($stageOne['typeOfWork'] == $mTow['name']) {
                                                                        echo "checked";
                                                                    }
                                                                    ?> <?php echo $disable; ?>>

                                                                    <label class="form-check-label" for="checkbox_tow_<?php echo $mIdCount; ?>">
                                                                        <?php echo $mTow['name']; ?>
                                                                    </label>

                                                                </fieldset>
                                                            <?php } ?>

                                                        </div>
                                                    </div>
                                                </div>
                                                <br/>
                                                <h6><b> REGISTERED WITH GOVERNEMENT DEPARTMENTS / PSUs / MAJOR DEVELOPERS  : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stv_rwgd" name="stv_rwgd" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_rwgd'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Having Purchase Order/ Work order from 11 or more reputed developers including PSU/Government Department </option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_rwgd'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">Having Purchase Order/ Work order in between 5 to10 No’s from reputed developers including PSU/Government Department </option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_rwgd'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">Having Purchase Order/ Work order in between 1 to 5 No’s from reputed developers including PSU/Government Department </option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stv_rwgd'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="4">Having No Purchase Order/ Work order from reputed developers including PSU/Government Department </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <!--                                                <h6><b> Details of Manufacturing, fabrication facilities, or equipment yard locations (to be completed only if relevant to the Scope of Work)  </b></h6>-->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <table id="stv_scope_of_work_table" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <th>Company Name</th>
                                                                        <th>Client’s representative</th>
                                                                        <th>Contact details</th>
                                                                        <th>Project Name</th>
                                                                        <th>Work Scope</th>
                                                                        <th>Total Order Value(In Crores)</th>
                                                                        <th>Award Date</th>
                                                                        <th>
                                                                            Status Of Order
                                                                        </th>
                                                                        <th>
                                                                            Completion date
                                                                        </th>
                                                                        <th>
                                                                            Total billed value(In Crores)
                                                                        </th>
                                                                        <th>
                                                                            Upload Work Order*
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="itemsTbody">
                                                                    <?php if (!empty($mRecord['stv_scope_of_work'])) { ?>
                                                                        <?php
                                                                        $mCount = 0;
                                                                        foreach (json_decode($mRecord['stv_scope_of_work']) as $key => $mScope) {
                                                                            $mCount++;
                                                                            ?>
                                                                            <tr>
                                                                                <td><a class="deleteRow"></a></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[0]; ?>" type="text" name="stv_scope_of_work[<?php echo $mCount; ?>][]" class="form-control site-value"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[1]; ?>" type="text" name="stv_scope_of_work[<?php echo $mCount; ?>][]" class="form-control site-value-2"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[2]; ?>" type="number" name="stv_scope_of_work[<?php echo $mCount; ?>][]" class="form-control site-value-3"/>
                                                                                </td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[3]; ?>" type="text" name="stv_scope_of_work[<?php echo $mCount; ?>][]"  class="form-control site-value-4"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[4]; ?>" type="text" name="stv_scope_of_work[<?php echo $mCount; ?>][]"  class="form-control site-value-5"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[5]; ?>" type="number" name="stv_scope_of_work[<?php echo $mCount; ?>][]"  class="form-control site-value-6"/></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[6]; ?>" type="date" name="stv_scope_of_work[<?php echo $mCount; ?>][]"  class="form-control site-value-7"/>
                                                                                </td>
                                                                                <td>
                                                                                    <select <?php echo $disable; ?> class="form-control table-select site-value-8" name="stv_scope_of_work[<?php echo $mCount; ?>][]">
                                                                                        <option selected="" value="" disabled="">Select Status</option>
                                                                                        <option <?php
                                                                                        if ($mScope[7] == "Ongoing") {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?> value="Ongoing">Ongoing</option>
                                                                                        <option <?php
                                                                                        if ($mScope[7] == "Completed") {
                                                                                            echo 'selected';
                                                                                        }
                                                                                        ?> value="Completed">Completed</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[8]; ?>" type="date" name="stv_scope_of_work[<?php echo $mCount; ?>][]"  class="form-control site-value-9"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[9]; ?>" type="number" name="stv_scope_of_work[<?php echo $mCount; ?>][]"  class="form-control site-value-10"/>
                                                                                </td>
                                                                                <td>
                                                                                    <?php if ($disable == "disabled" && $mScope[10]) { ?>
                                                                                        <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mScope[10]); ?>">Download</a>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr>
                                                                            <td><a class="deleteRow"></a></td>
                                                                            <td>
                                                                                <input value="" type="text" name="stv_scope_of_work[1][]" class="form-control site-value"/>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="text" name="stv_scope_of_work[1][]" class="form-control site-value-2"/>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="number" name="stv_scope_of_work[1][]" class="form-control site-value-3"/>
                                                                            </td>
                                                                            <td><input value="" type="text" name="stv_scope_of_work[1][]"  class="form-control site-value-4"/></td>
                                                                            <td><input value="" type="text" name="stv_scope_of_work[1][]"  class="form-control site-value-5"/></td>
                                                                            <td><input value="" type="number" name="stv_scope_of_work[1][]" onchange="getOrderValue('1')" id="stv_scope_of_work_ov_1" class="form-control site-value-6"/></td>
                                                                            <td>
                                                                                <input value="" type="date" name="stv_scope_of_work[1][]" onchange="getStartDate('1')" id="stv_scope_of_work_sd_1" class="form-control site-value-7"/>
                                                                            </td>
                                                                            <td>
                                                                                <select class="form-control table-select site-value-8" name="stv_scope_of_work[1][]">
                                                                                    <option selected="" value="" disabled="">Select Status</option>
                                                                                    <option value="Ongoing">Ongoing</option>
                                                                                    <option value="Completed">Completed</option>
                                                                                </select>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="date" name="stv_scope_of_work[1][]" onchange="getEndDate('1')" id="stv_scope_of_work_ed_1" class="form-control site-value-9"/>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="number" name="stv_scope_of_work[1][]" onchange="getBilledValue('1')" id="stv_scope_of_work_bv_1" class="form-control site-value-10"/>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="file" name="stv_wpc_details[1][]"  class="form-control site-value-11"/>
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
                                                <h6><b> WHAT TYPE OF BRAND DOES THE VENDOR REPRESENT : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_tobdvr'] == "1") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_11" name="stv_tobdvr" value="1">
                                                            <label class="form-check-label" for="checkbox_11">Established in market for more than 10 Years</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_tobdvr'] == "2") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_12" name="stv_tobdvr" value="2" >
                                                            <label class="form-check-label" for="checkbox_12">Established in market between 5 Years to 9 Years</label>
                                                        </div>    
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_tobdvr'] == "3") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_13" name="stv_tobdvr" value="3" >
                                                            <label class="form-check-label" for="checkbox_13">Established in market between 3 Years to 5 Years</label>
                                                        </div>  
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_tobdvr'] == "4") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_14" name="stv_tobdvr" value="4" >
                                                            <label class="form-check-label" for="checkbox_14">Established in market between 1 Year to 3 Years</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_tobdvr'] == "5") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_15" name="stv_tobdvr" value="5" >
                                                            <label class="form-check-label" for="checkbox_15">Established in market between 0 Year to 1 Year</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <h6><b> After sales service facilities : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_ssf'] == "Service center / authorised dealer within city limits in the region") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_16" name="stv_ssf" value="Service center / authorised dealer within city limits in the region" >
                                                            <label class="form-check-label" for="checkbox_16">Service center / authorised dealer within city limits in the region</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input <?php
                                                            if ($mRecord['stv_ssf'] == "Service center / authorised dealer beyond city limits in the region") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_17" name="stv_ssf" value="Service center / authorised dealer beyond city limits in the region " >
                                                            <label class="form-check-label" for="checkbox_17">Service center / authorised dealer beyond city limits in the region </label>
                                                        </div>    
                                                        <div class="form-check form-check-inline">

                                                            <input <?php
                                                            if ($mRecord['stv_ssf'] == "No service center in India") {
                                                                echo "checked";
                                                            }
                                                            ?> <?php echo $disable; ?> class="form-check-input" type="radio" id="checkbox_18" name="stv_ssf" value="No service center in India" >
                                                            <label class="form-check-label" for="checkbox_18">No service center in India</label>

                                                        </div>  
                                                    </div>
                                                </div> 
                                            </section>
                                            <!-- Step 4 -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <?php
                                                            $mTotal = json_decode($mRecord['stv_total_assets']);
                                                            $mCurrent = json_decode($mRecord['stv_current_assets']);
                                                            $mLia = json_decode($mRecord['stv_total_lia']);
                                                            $mCurLia = json_decode($mRecord['stv_current_lia']);
                                                            $mTurn = json_decode($mRecord['stv_turnover']);
                                                            $mProfits = json_decode($mRecord['stv_profits']);
                                                            $mProfitsTax = json_decode($mRecord['stv_profits_tax']);
                                                            $mFinUploads = json_decode($mRecord['stv_fin_uploads']);
                                                            ?>
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th rowspan="2" >Financial Information in Rs.</th>
                                                                    <th colspan="4" style="text-align:center;">Audited Balance Sheet data for 4 years (In Crores)</th> 
                                                                </tr>
                                                                <tr> 
                                                                    <td>Year 1 (<?php echo date("Y", strtotime("-4 year")); ?>-<?php echo date("Y", strtotime("-3 year")); ?>)</td>
                                                                    <td>Year 2 (<?php echo date("Y", strtotime("-3 year")); ?>-<?php echo date("Y", strtotime("-2 year")); ?>)</td>
                                                                    <td>Year 3 (<?php echo date("Y", strtotime("-2 year")); ?>-<?php echo date("Y", strtotime("-1 year")); ?>)</td>
                                                                    <td>Year 4 (<?php echo date("Y", strtotime("-1 year")); ?>-<?php echo date("Y"); ?>)</td>
                                                                </tr>
<!--                                                                <tr>
                                                                    <td>Total Assets (In Crores)</td>
                                                                    <td><input required="" type="number" name="stv_total_assets[]" value="<?php echo $mTotal[0]; ?>" <?php echo $disable; ?>></td>
                                                                    <td><input required="" type="number" name="stv_total_assets[]" value="<?php echo $mTotal[1]; ?>" <?php echo $disable; ?>></td>
                                                                    <td><input required="" type="number" name="stv_total_assets[]" value="<?php echo $mTotal[2]; ?>" <?php echo $disable; ?>></td> 
                                                                    <td><input required="" type="number" name="stv_total_assets[]" value="<?php echo $mTotal[3]; ?>" <?php echo $disable; ?>></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Current Assets (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_assets[]" value="<?php echo $mCurrent[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_assets[]" value="<?php echo $mCurrent[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_assets[]" value="<?php echo $mCurrent[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_assets[]" value="<?php echo $mCurrent[3]; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Total Liabilities (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_total_lia[]" value="<?php echo $mLia[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_total_lia[]" value="<?php echo $mLia[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_total_lia[]" value="<?php echo $mLia[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_total_lia[]" value="<?php echo $mLia[3]; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Current Liabilities (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_lia[]" value="<?php echo $mCurLia[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_lia[]" value="<?php echo $mCurLia[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_lia[]" value="<?php echo $mCurLia[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_current_lia[]" value="<?php echo $mCurLia[3]; ?>"></td>
                                                                </tr>-->
                                                                <tr>
                                                                    <td>Turnover (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_turnover[]" value="<?php echo $mTurn[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_turnover[]" value="<?php echo $mTurn[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_turnover[]" value="<?php echo $mTurn[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_turnover[]" value="<?php echo $mTurn[3]; ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Profits before Taxes (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits[]" value="<?php echo $mProfits[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits[]" value="<?php echo $mProfits[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits[]" value="<?php echo $mProfits[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits[]" value="<?php echo $mProfits[3]; ?>"></td>

                                                                </tr>
                                                                <tr>
                                                                    <td>Profits after Taxes (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits_tax[]" value="<?php echo $mProfitsTax[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits_tax[]" value="<?php echo $mProfitsTax[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits_tax[]" value="<?php echo $mProfitsTax[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stv_profits_tax[]" value="<?php echo $mProfitsTax[3]; ?>"></td>
                                                                </tr> 

                                                                <tr>
                                                                    <td>Upload Audited Balance Sheet</td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" required="" <?php echo $disable; ?> type="file" name="stv_fin_uploads[]" value="<?php echo $mFinUploads[0]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[0]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[0]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" required="" <?php echo $disable; ?> type="file" name="stv_fin_uploads[]" value="<?php echo $mFinUploads[1]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[1]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[1]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" required="" <?php echo $disable; ?> type="file" name="stv_fin_uploads[]" value="<?php echo $mFinUploads[2]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[2]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[2]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" required="" <?php echo $disable; ?> type="file" name="stv_fin_uploads[]" value="<?php echo $mFinUploads[3]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[3]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[3]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr> 

                                                            </table>
                                                        </div> 
                                                        <!-- /.box -->
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Step 5 -->
                                            <h6></h6>
                                            <section>
                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            Quality Assurance / Control
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <br>
                                                <h6><b> QUALITY & SAFETY MANAGEMENT SYSTEM </b></h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <table id="mainTable" class="table editable-table table-bordered mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Does your company maintain/implemented the following</th>
                                                                        <th>Yes / No</th> 
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>Quality Assurance Program?</td>
                                                                        <td>
                                                                            <div class="controls">
                                                                                <fieldset>
                                                                                    <input onclick="checkThree(this);" <?php echo $disable; ?> name="stv_qap" type="radio" id="radio_1" value="Yes" 
                                                                                    <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_qap'] == 'Yes') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                           >
                                                                                    <label for="radio_1">Yes</label>
                                                                                </fieldset>
                                                                                <fieldset>
                                                                                    <input onclick="checkThree(this);" <?php echo $disable; ?> name="stv_qap" type="radio" id="radio_2" value="No"
                                                                                    <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_qap'] == 'No') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?>
                                                                                           >
                                                                                    <label for="radio_2">No</label>
                                                                                </fieldset>

                                                                                <?php if ($disable == "disabled" && $mRecord['stv_qap_attach']) { ?>
                                                                                    <br>
                                                                                    <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_qap_attach']); ?>">Download</a>
                                                                                <?php } ?>

                                                                                <input style="width: 300px" type="file" hidden="true" class="form-control" name="stv_qap_attach" id="stv_qap_attach" />
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ISO 9001 certification</td>
                                                                        <td>
                                                                            <div class="controls">
                                                                                <fieldset>
                                                                                    <input onclick="checkOne(this);" <?php echo $disable; ?> name="stv_9001_isoc" type="radio" id="radio_3" value="Yes" 
                                                                                    <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_9001_isoc'] == 'Yes') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?> >
                                                                                    <label for="radio_3">Yes</label>
                                                                                </fieldset>
                                                                                <fieldset>
                                                                                    <input onclick="checkOne(this);" <?php echo $disable; ?> name="stv_9001_isoc" type="radio" id="radio_4" value="No"
                                                                                    <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_9001_isoc'] == 'No') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?> >
                                                                                    <label for="radio_4">No</label>
                                                                                </fieldset>

                                                                                <?php if ($disable == "disabled" && $mRecord['stv_9001_isoc_attach']) { ?>
                                                                                    <br>
                                                                                    <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_9001_isoc_attach']); ?>">Download</a>
                                                                                <?php } ?>

                                                                                <input style="width: 300px" type="file" hidden="true" class="form-control" name="stv_9001_isoc_attach" id="stv_9001_isoc_attach" />

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>ISO 45001 certification</td>
                                                                        <td>
                                                                            <div class="controls">
                                                                                <fieldset>
                                                                                    <input onclick="checkTwo(this);" <?php echo $disable; ?> name="stv_45001_isoc" type="radio" id="radio_5" value="Yes"  <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_45001_isoc'] == 'Yes') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?> >
                                                                                    <label for="radio_5">Yes</label>
                                                                                </fieldset>
                                                                                <fieldset>
                                                                                    <input onclick="checkTwo(this);" <?php echo $disable; ?> name="stv_45001_isoc" type="radio" id="radio_6" value="No"<?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_45001_isoc'] == 'No') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?>>
                                                                                    <label for="radio_6">No</label>
                                                                                </fieldset>

                                                                                <?php if ($disable == "disabled" && $mRecord['stv_45001_isoc_attach']) { ?>
                                                                                    <br>
                                                                                    <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_45001_isoc_attach']); ?>">Download</a>
                                                                                <?php } ?>

                                                                                <input style="width: 300px"  type="file" hidden="true" class="form-control" name="stv_45001_isoc_attach" id="stv_45001_isoc_attach" />

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Other Certificates & Awards</td>
                                                                        <td>
                                                                            <div class="controls">
                                                                                <fieldset>
                                                                                    <input onclick="checkFour(this);" <?php echo $disable; ?> name="stv_oca" type="radio" id="radio_7" value="Yes"   <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_oca'] == 'Yes') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?>  >
                                                                                    <label for="radio_7">Yes</label>
                                                                                </fieldset>
                                                                                <fieldset>
                                                                                    <input onclick="checkFour(this);" <?php echo $disable; ?> name="stv_oca" type="radio" id="radio_8" value="No" <?php
                                                                                    if (!empty($mRecord)) {
                                                                                        if ($mRecord['stv_oca'] == 'No') {
                                                                                            echo "checked";
                                                                                        }
                                                                                    }
                                                                                    ?> >
                                                                                    <label for="radio_8">No</label>
                                                                                </fieldset>

                                                                                <?php if ($disable == "disabled" && $mRecord['stv_oca_attach']) { ?>
                                                                                    <br>
                                                                                    <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stv_oca_attach']); ?>">Download</a>
                                                                                <?php } ?>

                                                                                <input style="width: 300px"  type="file" hidden="true" class="form-control" name="stv_oca_attach" id="stv_oca_attach" />

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </section>
                                            <!-- Step 6 -->
                                            <h6></h6>
                                            <section>
                                                <h6><b>Provide all the site names where the projects are in progress and completed (in last 3 years)</b></h6>
                                                <div class="row"> 
                                                    <div class="col-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                    <th>
                                                                        Name of Client
                                                                    </th>
                                                                    <th>
                                                                        Client’s representative
                                                                    </th>
                                                                    <th>
                                                                        Contact details
                                                                    </th>
                                                                    <th>
                                                                        Project Description
                                                                    </th>
                                                                    <th>
                                                                        Contract Value Rs.(In Crores)
                                                                    </th>
                                                                    <th>
                                                                        Billed Value Rs.(In Crores)
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="sites-table-tbody">
                                                                <?php
                                                                $mSites = json_decode($mRecord['stv_visit_a']);
                                                                ?>
                                                                <?php
                                                                foreach ($mSites as $key => $mSite) {
                                                                    $mSiteArray = explode(",", $mSite);
                                                                    ?>
                                                                    <tr>
                                                                        <td>
                                                                            <div class="checkbox">
                                                                                <input checked <?php echo $disable; ?> class="sites_checkbox" value="<?php echo $mSite; ?>" type="checkbox" name="stv_visit_a[]" id="stv_sites_visited<?php echo $key; ?>">
                                                                                <label for="stv_sites_visited<?php echo $key; ?>"></label>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $mSiteArray[0]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $mSiteArray[1]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $mSiteArray[2]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $mSiteArray[3]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $mSiteArray[4]; ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $mSiteArray[5]; ?>
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </tbody>
                                                        </table>
                                                        <div class="checkbox" id="sites_check">

                                                        </div>
                                                        <div class="checkbox">
                                                            <div class="checkbox">
                                                                <input <?php
                                                                if ($mRecord['stv_visit_b']) {
                                                                    echo "checked";
                                                                }
                                                                ?> <?php echo $disable; ?> type="checkbox" name="stv_others" id="stv_others">
                                                                <label for="stv_others">Others</label>
                                                            </div>
                                                        </div>

                                                        <?php if ($mRecord['stv_visit_b']) { ?>
                                                            <input <?php echo $disable; ?> type="text" class="form-control" id="websiteA" name="stv_visit_b"  value="<?php echo $mRecord['stv_visit_b']; ?>">
                                                        <?php } else { ?>
                                                            <input hidden="true" <?php echo $disable; ?> type="text" class="form-control" id="websiteA" name="stv_visit_b"  value="<?php echo $mRecord['stv_visit_b']; ?>">
                                                        <?php } ?>

                                                    </div>
                                                </div>
                                                <span>
                                                    Note : GPL reserves the right to select and visit any of the SITE as per the convenience without any reason.
                                                </span>
                                                <h6><b>Factory Details/Manufacturing Unit</b></h6>
                                                <table id="factory" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; width: 100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>Action</th>
                                                            <th>Factory Location</th>
                                                            <th>Factory Representative</th>
                                                            <th>Contact Number</th>
                                                            <th>Email Id</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (!empty($mRecord['stv_visit_c'])) { ?>

                                                            <?php
                                                            $mCount = 0;
                                                            foreach (json_decode($mRecord['stv_visit_c']) as $key => $mPractice) {
                                                                $mCount++;
                                                                ?>
                                                                <tr>
                                                                    <td style="width: 100px">
                                                                        <?php if ($mCount != 1) { ?>
                                                                            <input <?php echo $disable; ?> type="button" class="ibtnDelFac btn btn-sm btn-danger btn-block" value="Delete">
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <input <?php echo $disable; ?> value="<?php echo $mPractice[0]; ?>" type="text" name="stv_visit_c[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                    </td>
                                                                    <td>
                                                                        <input <?php echo $disable; ?> value="<?php echo $mPractice[1]; ?>" type="text" name="stv_visit_c[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                    </td>
                                                                    <td>
                                                                        <input <?php echo $disable; ?> value="<?php echo $mPractice[2]; ?>" type="number" name="stv_visit_c[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                    </td>
                                                                    <td>
                                                                        <input <?php echo $disable; ?> value="<?php echo $mPractice[3]; ?>" type="email" name="stv_visit_c[<?php echo $mCount; ?>][]" class="form-control"/>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>

                                                        <?php } else { ?>
                                                            <tr>
                                                                <td style="width: 100px">
                                                                    <a class="ibtnDelFac"></a>
                                                                </td>
                                                                <td>
                                                                    <input <?php echo $disable; ?>  required="" value="" type="text" name="stv_visit_c[1][]" class="form-control"/>
                                                                </td>
                                                                <td>
                                                                    <input <?php echo $disable; ?> required="" value="" type="text" name="stv_visit_c[1][]" class="form-control"/>
                                                                </td>
                                                                <td>
                                                                    <input <?php echo $disable; ?> required="" value="" type="number" name="stv_visit_c[1][]" class="form-control"/>
                                                                </td>
                                                                <td>
                                                                    <input <?php echo $disable; ?> required="" value="" type="email" name="stv_visit_c[1][]" class="form-control"/>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                                <?php if ($disable != "disabled") { ?>
                                                    <div class="well clearfix text-right">
                                                        <a href="#" class="btn btn-primary" id="addfactory">
                                                            <span class="fa fa-plus"></span>
                                                            Add Row
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </section>
                                            <!-- Step 7 -->
                                            <h6></h6>
                                            <section>

                                                <div class="row">  
                                                    <div class="col-12">
                                                        <input value="<?php echo $mRecord['stv_partner_field_1']; ?>" <?php echo $disable; ?> class="form-control" name="stv_partner_field_1" required="" />	  					
                                                        Proprietor/ Partner/ Director of M/s 
                                                        <input value="<?php echo $mRecord['stv_partner_field_2']; ?>" <?php echo $disable; ?> class="form-control" name="stv_partner_field_2" required="" />
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
                                                        <input <?php echo $disable; ?> class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1" required <?php
                                                        if (!empty($mRecord)) {
                                                            $data = $mRecord['stv_confirmation'];
                                                            if ($data == 1) {
                                                                echo 'checked';
                                                            }
                                                        }
                                                        ?>>
                                                        <label class="form-check-label" for="checkbox_23">Further, I certify that the information given elsewhere in this document is correct as per my knowledge and understanding</label>
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

            var countStepsChange = 0;
            var form = $(".validation-wizard").show();
            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                        , transitionEffect: "none"
<?php if ($disable == "disabled") { ?>
                    , enableAllSteps: true
                            , enableFinishButton: false
<?php } ?>
                , titleTemplate: '<span class="step">Step #index# </span>  '
                        , labels: {

                            finish: "Submit"

                        }
                , onStepChanging: function (event, currentIndex, newIndex) {
<?php if ($disable == "") { ?>
                        if (newIndex === 4) {
                            if (countStepsChange == "0") {
                                countStepsChange++;
                                var stv_wpc_count = 0;
                                $('#sites_check').children().remove();
                                $("#stv_scope_of_work_table tbody tr").each(function () {
                                    stv_wpc_count++;
                                    var currentRow = $(this); //Do not search the whole HTML tree twice, use a subtree instead
                                    if (currentRow.find(".site-value").val()) {
                                        $('#sites-table-tbody').append('<tr><td><div class="checkbox"><input class="sites_checkbox" value="' + currentRow.find(".site-value").val() + ", " + currentRow.find(".site-value-2").val() + ", " + currentRow.find(".site-value-3").val() + ", " + currentRow.find(".site-value-4").val() + ", Rs." + currentRow.find(".site-value-6").val() + " (In Crs) " + ", Rs." + currentRow.find(".site-value-10").val() + " (In Crs) " + '" type="checkbox" name="stv_visit_a[]" id="stv_sites_visited' + stv_wpc_count + '"><label for="stv_sites_visited' + stv_wpc_count + '"></label></div></td><td>' + currentRow.find(".site-value").val() + '</td><td>' + currentRow.find(".site-value-2").val() + '</td><td>' + currentRow.find(".site-value-3").val() + '</td><td>' + currentRow.find(".site-value-4").val() + '</td><td>' + currentRow.find(".site-value-6").val() + '</td><td>' + currentRow.find(".site-value-10").val() + '</td></tr>');
                                    }
                                });
                            }
                        }

                        if (newIndex === 5) {
                            var addedSites = $('.sites_checkbox').length;
                            var checkedSites = $('.sites_checkbox:checked').length;
                            if (addedSites >= 3 && checkedSites < 3) {
                                alert("Minimum 3 to be selected");
                            } else {
                                return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                            }
                        } else {
                            return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                            //return newIndex;
                        }
<?php } else { ?>
                        //return newIndex;
                        return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
<?php } ?>
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

            function getStartDate(mRowId) {
                var start_date = $('#stv_scope_of_work_sd_' + mRowId).val();
                var end_date = $('#stv_scope_of_work_ed_' + mRowId).val();
                if (end_date) {
                    if (new Date(start_date).getTime() > new Date(end_date).getTime()) {
                        $('#stv_scope_of_work_ed_' + mRowId).attr({
                            "min": start_date,
                        });
                    }
                } else {
                    $('#stv_scope_of_work_ed_' + mRowId).attr({
                        "min": start_date,
                    });
                }
            }

            function getOrderValue(mRowId) {
                var order = $('#stv_scope_of_work_ov_' + mRowId).val();
                var billed = $('#stv_scope_of_work_bv_' + mRowId).val();
                $('#stv_scope_of_work_bv_' + mRowId).attr({
                    "max": order,
                });
            }

            $(document).ready(function () {

                $('#stv_doi').on('change', function (e) {
                    var selectedDate = e.target.value;
                    var date1 = new Date(selectedDate);
                    var date2 = new Date();
                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24 * 365);
                    if (Difference_In_Days > 0) {
                        $('#stv_noy').val(Difference_In_Days.toFixed(1));
                    } else {
                        $('#stv_noy').val("0");
                    }

                    //alert(Difference_In_Days);

                    if (Difference_In_Days >= "0" && Difference_In_Days <= "1") {
                        $('#checkbox_11').attr("disabled", true);
                        $('#checkbox_12').attr("disabled", true);
                        $('#checkbox_13').attr("disabled", true);
                        $('#checkbox_14').attr("disabled", true);
                        $('#checkbox_15').attr("checked", true);
                        $('#checkbox_15').attr("disabled", false);
                    } else if (Difference_In_Days > "1" && Difference_In_Days <= "3") {
                        $('#checkbox_11').attr("disabled", true);
                        $('#checkbox_12').attr("disabled", true);
                        $('#checkbox_13').attr("disabled", true);
                        $('#checkbox_14').attr("checked", true);
                        $('#checkbox_14').attr("disabled", false);
                        $('#checkbox_15').attr("disabled", true);
                    } else if (Difference_In_Days > "3" && Difference_In_Days <= "5") {
                        $('#checkbox_11').attr("disabled", true);
                        $('#checkbox_12').attr("disabled", true);
                        $('#checkbox_13').attr("checked", true);
                        $('#checkbox_13').attr("disabled", false);
                        $('#checkbox_14').attr("disabled", true);
                        $('#checkbox_15').attr("disabled", true);
                    } else if (Difference_In_Days > "5" && Difference_In_Days <= "9") {
                        $('#checkbox_11').attr("disabled", true);
                        $('#checkbox_12').attr("checked", true);
                        $('#checkbox_12').attr("disabled", false);
                        $('#checkbox_13').attr("disabled", true);
                        $('#checkbox_14').attr("disabled", true);
                        $('#checkbox_15').attr("disabled", true);
                    } else if (Difference_In_Days > "10") {
                        $('#checkbox_11').attr("checked", true);
                        $('#checkbox_11').attr("disabled", false);
                        $('#checkbox_12').attr("disabled", true);
                        $('#checkbox_13').attr("disabled", true);
                        $('#checkbox_14').attr("disabled", true);
                        $('#checkbox_15').attr("disabled", true);
                    }


                    $(".site-value-9").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-7").attr({
                        "min": selectedDate,
                    });
                });

                $('#stv_others').on('change', function (e) {
                    if ($('#stv_others').is(':checked')) {
                        $("#websiteA").attr({
                            "hidden": false,
                            "required": true
                        });
                    } else {
                        $("#websiteA").attr({
                            "hidden": true,
                        });
                    }
                });

                var counterscope = 2;
                var selectedWork = 0;
                $('#stv_rwgd').on('change', function () {
                    countStepsChange = 0;
                    if (this.value === "1") {
                        $('#stv_scope_of_work_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stv_scope_of_work_table tr').length;
                        var count = rowCount;
                        if (count < 12) {
                            var times = 11;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-5" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-6" onchange="getOrderValue(' + counterscope + ')" id="stv_scope_of_work_ov_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="date" class="form-control site-value-7" onchange="getStartDate(' + counterscope + ')" id="stv_scope_of_work_sd_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><select class="form-control table-select site-value-8" name="stv_scope_of_work[' + counterscope + '][]"><option selected="" value="" disabled="">Select Status</option><option value="Ongoing">Ongoing</option><option value="Completed">Completed</option></select></td>'
                                cols += '<td><input required type="date" class="form-control site-value-9" onchange="getEndDate(' + counterscope + ')" id="stv_scope_of_work_ed_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-10" onchange="getBilledValue(' + counterscope + ')" id="stv_scope_of_work_bv_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-11" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stv_scope_of_work_table").append(newRow);
                                counterscope++;
                            }
                        }

                    } else if (this.value === "2") {

                        $('#stv_scope_of_work_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stv_scope_of_work_table tr').length;
                        var count = rowCount;
                        if (count < 6) {
                            var times = 5;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-5" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-6" onchange="getOrderValue(' + counterscope + ')" id="stv_scope_of_work_ov_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="date" class="form-control site-value-7" onchange="getStartDate(' + counterscope + ')" id="stv_scope_of_work_sd_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><select class="form-control table-select site-value-8" name="stv_scope_of_work[' + counterscope + '][]"><option selected="" value="" disabled="">Select Status</option><option value="Ongoing">Ongoing</option><option value="Completed">Completed</option></select></td>'
                                cols += '<td><input required type="date" class="form-control site-value-9" onchange="getEndDate(' + counterscope + ')" id="stv_scope_of_work_ed_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-10" onchange="getBilledValue(' + counterscope + ')" id="stv_scope_of_work_bv_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-11" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stv_scope_of_work_table").append(newRow);
                                counterscope++;
                            }
                        }

                    } else if (this.value === "3") {

                        $('#stv_scope_of_work_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stv_scope_of_work_table tr').length;
                        var count = rowCount;
                        if (count < 2) {
                            var times = 1;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-5" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-6" onchange="getOrderValue(' + counterscope + ')" id="stv_scope_of_work_ov_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="date" class="form-control site-value-7" onchange="getStartDate(' + counterscope + ')" id="stv_scope_of_work_sd_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><select class="form-control table-select site-value-8" name="stv_scope_of_work[' + counterscope + '][]"><option selected="" value="" disabled="">Select Status</option><option value="Ongoing">Ongoing</option><option value="Completed">Completed</option></select></td>'
                                cols += '<td><input required type="date" class="form-control site-value-9" onchange="getEndDate(' + counterscope + ')" id="stv_scope_of_work_ed_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-10" onchange="getBilledValue(' + counterscope + ')" id="stv_scope_of_work_bv_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-11" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stv_scope_of_work_table").append(newRow);
                                counterscope++;
                            }
                        }

                    } else if (this.value === "4") {
                        selectedWork = this.value;
                        $('#stv_scope_of_work_table tbody tr').remove();
                    }

                    var selectedDate = $("#stv_doi").val();

                    $(".site-value-9").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-7").attr({
                        "min": selectedDate,
                    });

                });
                $("#addrowscope").on("click", function () {
                    countStepsChange = 0;
                    var rowCount = $('#stv_scope_of_work_table tr').length;
                    //alert(rowCount);
                    if (selectedWork == "1") {
                        if (rowCount >= "11") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-5" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-6" onchange="getOrderValue(' + counterscope + ')" id="stv_scope_of_work_ov_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="date" class="form-control site-value-7" onchange="getStartDate(' + counterscope + ')" id="stv_scope_of_work_sd_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><select class="form-control table-select site-value-8" name="stv_scope_of_work[' + counterscope + '][]"><option selected="" value="" disabled="">Select Status</option><option value="Ongoing">Ongoing</option><option value="Completed">Completed</option></select></td>'
                            cols += '<td><input required type="date" class="form-control site-value-9" onchange="getEndDate(' + counterscope + ')" id="stv_scope_of_work_ed_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-10" onchange="getBilledValue(' + counterscope + ')" id="stv_scope_of_work_bv_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-11" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stv_scope_of_work_table").append(newRow);
                            counterscope++;
                        }
                    } else if (selectedWork == "2") {
                        if (rowCount >= "5" && rowCount <= "10") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-5" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-6" onchange="getOrderValue(' + counterscope + ')" id="stv_scope_of_work_ov_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="date" class="form-control site-value-7" onchange="getStartDate(' + counterscope + ')" id="stv_scope_of_work_sd_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><select class="form-control table-select site-value-8" name="stv_scope_of_work[' + counterscope + '][]"><option selected="" value="" disabled="">Select Status</option><option value="Ongoing">Ongoing</option><option value="Completed">Completed</option></select></td>'
                            cols += '<td><input required type="date" class="form-control site-value-9" onchange="getEndDate(' + counterscope + ')" id="stv_scope_of_work_ed_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-10" onchange="getBilledValue(' + counterscope + ')" id="stv_scope_of_work_bv_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-11" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stv_scope_of_work_table").append(newRow);
                            counterscope++;
                        } else {
                            alert("Maximum 10 entries to be filled.");
                        }
                    } else if (selectedWork == "3") {
                        if (rowCount >= "1" && rowCount <= "5") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-5" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-6" onchange="getOrderValue(' + counterscope + ')" id="stv_scope_of_work_ov_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="date" class="form-control site-value-7" onchange="getStartDate(' + counterscope + ')" id="stv_scope_of_work_sd_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><select class="form-control table-select site-value-8" name="stv_scope_of_work[' + counterscope + '][]"><option selected="" value="" disabled="">Select Status</option><option value="Ongoing">Ongoing</option><option value="Completed">Completed</option></select></td>'
                            cols += '<td><input required type="date" class="form-control site-value-9" onchange="getEndDate(' + counterscope + ')" id="stv_scope_of_work_ed_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-10" onchange="getBilledValue(' + counterscope + ')" id="stv_scope_of_work_bv_' + counterscope + '" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-11" name="stv_scope_of_work[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stv_scope_of_work_table").append(newRow);
                            counterscope++;
                        } else {
                            alert("Maximum 5 entries to be filled.");
                        }
                    } else if (selectedWork == "4") {
                        alert("Entry cannot be filled.");
                    }

                    var selectedDate = $("#stv_doi").val();

                    $(".site-value-9").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-7").attr({
                        "min": selectedDate,
                    });

                });
                $("#stv_scope_of_work_table").on("click", ".ibtnDelScope", function (event) {
                    countStepsChange = 0;
                    var rowCount = $('#stv_scope_of_work_table tr').length;
                    if (selectedWork == "1") {
                        if (rowCount <= "12") {
                            alert("Minimum 11 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else if (selectedWork == "2") {
                        if (rowCount <= "6") {
                            alert("Minimum 5 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else if (selectedWork == "3") {
                        if (rowCount <= "2") {
                            alert("Minimum 1 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else {
                        $(this).closest("tr").remove();
                        counterscope -= 1
                    }

                });
                var counterfactory = 2;
                $("#addfactory").on("click", function () {
                    var rowCount = $('#factory tr').length;
                    //alert(rowCount);
                    var newRow = $("<tr>");
                    var cols = "";
                    cols += '<td><input type="button" class="ibtnDelFac btn btn-sm btn-danger btn-block" value="Delete"></td>';
                    cols += '<td><input required type="text" class="form-control" name="stv_visit_c[' + counterfactory + '][]"/></td>';
                    cols += '<td><input required type="text" class="form-control" name="stv_visit_c[' + counterfactory + '][]"/></td>';
                    cols += '<td><input required type="number" class="form-control" name="stv_visit_c[' + counterfactory + '][]"/></td>';
                    cols += '<td><input required type="email" class="form-control" name="stv_visit_c[' + counterfactory + '][]"/></td>';
                    newRow.append(cols);
                    $("#factory").append(newRow);
                    counterfactory++;
                });
                $("#factory").on("click", ".ibtnDelFac", function (event) {
                    var rowCount = $('#factory tr').length;
                    $(this).closest("tr").remove();
                    counterfactory -= 1
                });
            });
        </script>

        <script>

            function checkOne(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stv_9001_isoc_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stv_9001_isoc_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }


            function checkTwo(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stv_45001_isoc_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stv_45001_isoc_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }

            function checkThree(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stv_qap_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stv_qap_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }

            function checkFour(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stv_oca_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stv_oca_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }

            $('#stv_epf').on('change', function () {
                if (this.value == "1") {
                    $("#stv_epf_modal_toggle").hide();
                    $("#stv_epf_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stv_epf_modal').modal('hide');
                    $("#stv_epf_to, #stv_epf_one, #stv_epf_two, #stv_epf_three, #stv_epf_four, #stv_epf_five, #stv_epf_six, #stv_epf_date").attr({
                        "required": false
                    });
                } else {
                    $("#stv_epf_modal_toggle").show();
                    $('.stv_epf_modal').modal('show');
                    $("#stv_epf_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stv_epf_to, #stv_epf_one, #stv_epf_two, #stv_epf_three, #stv_epf_four, #stv_epf_five, #stv_epf_six, #stv_epf_date").attr({
                        "required": true
                    });
                }
            });
            $('#stv_epf_modal_close').on('click', function () {
                $("#stv_epf_modal_toggle").hide();
                $('#stv_epf').val('1');
                $("#stv_epf_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stv_epf_modal').modal('hide');
                $("#stv_epf_to, #stv_epf_one, #stv_epf_two, #stv_epf_three, #stv_epf_four, #stv_epf_five, #stv_epf_six, #stv_epf_date").attr({
                    "required": false,
                });
                $("#stv_epf_to, #stv_epf_one, #stv_epf_two, #stv_epf_three, #stv_epf_four, #stv_epf_five, #stv_epf_six, #stv_epf_date").val("");
            });
            $('#stv_epf_modal_save').on('click', function () {
                $("#stv_epf_modal_toggle").show();
                if ($('#stv_epf_to').val() && $('#stv_epf_one').val() && $('#stv_epf_two').val() && $('#stv_epf_three').val()
                        && $('#stv_epf_four').val() && $('#stv_epf_five').val() && $('#stv_epf_six').val() && $('#stv_epf_date').val()) {
                    $('.stv_epf_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stv_esic').on('change', function () {
                if (this.value == "1") {
                    $("#stv_esic_modal_toggle").hide();
                    $("#stv_esic_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stv_esic_modal').modal('hide');
                    $("#stv_esic_to, #stv_esic_one, #stv_esic_two, #stv_esic_three, #stv_esic_four, #stv_esic_five, #stv_esic_six, #stv_esic_date").attr({
                        "required": false
                    });
                } else {
                    $("#stv_esic_modal_toggle").show();
                    $('.stv_esic_modal').modal('show');
                    $("#stv_esic_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stv_esic_to, #stv_esic_one, #stv_esic_two, #stv_esic_three, #stv_esic_four, #stv_esic_five, #stv_esic_six, #stv_esic_date").attr({
                        "required": true
                    });
                }
            });
            $('#stv_esic_modal_close').on('click', function () {
                $("#stv_esic_modal_toggle").hide();
                $('#stv_esic').val('1');
                $("#stv_esic_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stv_esic_modal').modal('hide');
                $("#stv_esic_to, #stv_esic_one, #stv_esic_two, #stv_esic_three, #stv_esic_four, #stv_esic_five, #stv_esic_six, #stv_esic_date").attr({
                    "required": false,
                    "value": ""
                });
                $("#stv_esic_to, #stv_esic_one, #stv_esic_two, #stv_esic_three, #stv_esic_four, #stv_esic_five, #stv_esic_six, #stv_esic_date").val("");
            });
            $('#stv_esic_modal_save').on('click', function () {
                $("#stv_esic_modal_toggle").show();
                if ($('#stv_esic_to').val() && $('#stv_esic_one').val() && $('#stv_esic_two').val() && $('#stv_esic_three').val()
                        && $('#stv_esic_four').val() && $('#stv_esic_five').val() && $('#stv_esic_six').val() && $('#stv_esic_date').val()) {
                    $('.stv_esic_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stv_lwf').on('change', function () {
                if (this.value == "1") {
                    $("#stv_lwf_modal_toggle").hide();
                    $("#stv_lwf_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stv_lwf_modal').modal('hide');
                    $("#stv_lwf_to, #stv_lwf_one, #stv_lwf_two, #stv_lwf_three, #stv_lwf_four, #stv_lwf_five, #stv_lwf_six, #stv_lwf_date").attr({
                        "required": false
                    });
                } else {
                    $("#stv_lwf_modal_toggle").show();
                    $('.stv_lwf_modal').modal('show');
                    $("#stv_lwf_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stv_lwf_to, #stv_lwf_one, #stv_lwf_two, #stv_lwf_three, #stv_lwf_four, #stv_lwf_five, #stv_lwf_six, #stv_lwf_date").attr({
                        "required": true
                    });
                }
            });
            $('#stv_lwf_modal_close').on('click', function () {
                $("#stv_lwf_modal_toggle").hide();
                $('#stv_lwf').val('1');
                $("#stv_lwf_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stv_lwf_modal').modal('hide');
                $("#stv_lwf_to, #stv_lwf_one, #stv_lwf_two, #stv_lwf_three, #stv_lwf_four, #stv_lwf_five, #stv_lwf_six, #stv_lwf_date").attr({
                    "required": false,
                    "value": ""
                });
            });
            $('#stv_lwf_modal_save').on('click', function () {
                $("#stv_lwf_modal_toggle").show();
                if ($('#stv_lwf_to').val() && $('#stv_lwf_one').val() && $('#stv_lwf_two').val() && $('#stv_lwf_three').val()
                        && $('#stv_lwf_four').val() && $('#stv_lwf_five').val() && $('#stv_lwf_six').val() && $('#stv_lwf_date').val()) {
                    $('.stv_lwf_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stv_ptrc').on('change', function () {
                if (this.value == "1") {
                    $("#stv_ptrc_modal_toggle").hide();
                    $("#stv_ptrc_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stv_ptrc_modal').modal('hide');
                    $("#stv_ptrc_to, #stv_ptrc_one, #stv_ptrc_two, #stv_ptrc_three, #stv_ptrc_four, #stv_ptrc_five, #stv_ptrc_six, #stv_ptrc_date").attr({
                        "required": false
                    });
                } else {
                    $("#stv_ptrc_modal_toggle").show();
                    $('.stv_ptrc_modal').modal('show');
                    $("#stv_ptrc_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stv_ptrc_to, #stv_ptrc_one, #stv_ptrc_two, #stv_ptrc_three, #stv_ptrc_four, #stv_ptrc_five, #stv_ptrc_six, #stv_ptrc_date").attr({
                        "required": true
                    });
                }
            });
            $('#stv_ptrc_modal_close').on('click', function () {
                $("#stv_ptrc_modal_toggle").hide();
                $('#stv_ptrc').val('1');
                $("#stv_ptrc_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stv_ptrc_modal').modal('hide');
                $("#stv_ptrc_to, #stv_ptrc_one, #stv_ptrc_two, #stv_ptrc_three, #stv_ptrc_four, #stv_ptrc_five, #stv_ptrc_six, #stv_ptrc_date").attr({
                    "required": false,
                    "value": ""
                });
            });
            $('#stv_ptrc_modal_save').on('click', function () {
                $("#stv_ptrc_modal_toggle").show();
                if ($('#stv_ptrc_to').val() && $('#stv_ptrc_one').val() && $('#stv_ptrc_two').val() && $('#stv_ptrc_three').val()
                        && $('#stv_ptrc_four').val() && $('#stv_ptrc_five').val() && $('#stv_ptrc_six').val() && $('#stv_ptrc_date').val()) {
                    $('.stv_ptrc_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stv_secn').on('change', function () {
                if (this.value == "1") {
                    $("#stv_secn_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stv_secn_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            });
            $('#stv_lin').on('change', function () {
                if (this.value == "1") {
                    $("#stv_lin_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stv_lin_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            });
<?php if ($disable == "disabled") { ?>
                var ptrc = "<?php echo $mRecord['stv_ptrc']; ?>";
                if (ptrc == "0") {
                    $("#ptrc_panel").collapse('show');
                } else {
                    $("#ptrc_panel").collapse('hide');
                }

                var lwf = "<?php echo $mRecord['stv_lwf']; ?>";
                if (lwf == "0") {
                    $("#lwf_panel").collapse('show');
                } else {
                    $("#lwf_panel").collapse('hide');
                }

                var esic = "<?php echo $mRecord['stv_esic']; ?>";
                if (esic == "0") {
                    $("#esic_panel").collapse('show');
                } else {
                    $("#esic_panel").collapse('hide');
                }

                var epf = "<?php echo $mRecord['stv_epf']; ?>";
                if (epf == "0") {
                    $("#epf_panel").collapse('show');
                } else {
                    $("#epf_panel").collapse('hide');
                }
<?php } ?>

        </script>

    </body>
</html>