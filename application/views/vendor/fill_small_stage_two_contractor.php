<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('vendor/partials/header'); ?>

    <style>
        table tr input[type='number']{
            width: 150px;
        }

        table tr input[type='text']{
            width: 150px;
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

                                <?php if ($stageOne['active'] == 8) { ?>
                                    <div class="alert alert-danger fade show" role="alert">
                                        <strong>
                                            Stage Two Returned : 
                                        </strong>
                                        <?php echo $stageOne['stage_two_return_remarks']; ?>
                                    </div>
                                <?php } ?>

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">Contractor Registration</h4>
                                    </div>
                                    <?php
                                    if (isset($notification)) {
                                        echo "$notification";
                                    }
                                    // echo $mRecord['stc_tow'];
                                    //if(!empty($mRecord)){echo implode(',', (array) $a); }
                                    ?>
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('vendor/home/postStageTwoContractor'); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
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
                                                            <p>
                                                                To identify and assess agencies on various parameters including but not limited to competency, resourcefulness, experience, management band width, etc. with a view to prequalify agencies in appropriate categories. 
                                                            </p>
                                                            <p>GPL reserves the right to Prequalify or otherwise any applicant without assigning any reason there for.</p>
                                                            <h6>
                                                                <b>
                                                                    Disclaimer: Any information provided if not correct or misrepresented, GPL has all rights to terminate the Business Associations/any Work Order/Purchase Order/Contract.
                                                                </b>
                                                            </h6> 
                                                            <p><b>Notes on Form of Pre qualification Information</b></p>
                                                            <p> • The information to be filled in by Agency in the following pages will be used for the purposes of Prequalification.<br/>
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
                                                            <input type="text" class="form-control required" id="stc_company" name="stc_company" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_company'];
                                                            } else {
                                                                echo $stageOne['company_name'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="lastName1">Select type of Firm  :<span class="danger">*</span></label>
                                                            <select class="custom-select form-control required" id="stc_tof" name="stc_tof" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select type of Firm</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_tof'] == "Corporate or Company") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Corporate or Company">Corporate or Company</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_tof'] == "Subsidiary") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Subsidiary">Subsidiary</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_tof'] == "Division") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Division">Division</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_tof'] == "Proprietor") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="Proprietor">Proprietor</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_tof'] == "Partnership") {
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
                                                            <input type="text" class="form-control required" id="stc_reg" name="stc_reg" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_reg'];
                                                            }
                                                            ?>" <?php echo $disable; ?>> 
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="phoneNumber1">Date of Incorporation :<span class="danger">*</span></label>
                                                            <input max="<?php echo date("Y-m-d"); ?>" type="date" class="form-control required" id="stc_doi" name="stc_doi" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_doi'];
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
                                                            <input required="" placeholder="Please click on enter to input multiple values" data-role="tagsinput" type="text" id="stc_gst" name="stc_gst" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_gst'];
                                                            }
                                                            ?>"  <?php echo $disable; ?>>
                                                            <br><br>
                                                            <?php if ($disable == "") { ?>
                                                                <input required="" type="file" name="stc_gst_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php } ?>
                                                            <?php if ($disable == "disabled" && $mRecord['stc_gst_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_gst_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="location3">PAN NO :<span class="danger">*</span></label>
                                                            <input readonly="" type="text" class="form-control required" id="stc_pan" name="stc_pan" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_pan'];
                                                            } else {
                                                                echo $stageOne['pan'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                            <br>
                                                            <?php if ($disable == "") { ?>
                                                                <input required="" type="file" name="stc_pan_file" class="form-control"  <?php echo $disable; ?>/>
                                                            <?php } ?>
                                                            <?php if ($disable == "disabled" && $mRecord['stc_pan_file']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_pan_file']); ?>">Download</a>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                EPF :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stc_epf'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stc_epf_modal_toggle" href="#" data-toggle="modal" data-target="#stc_epf_modal" class="badge badge-gray">View EPF Declaration Form</a>
                                                            </label>
                                                            <select required="" class="form-control" id="stc_epf" name="stc_epf" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_epf'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_epf'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stc_epf_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_epf_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stc_epf_attach" id="stc_epf_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                ESIC :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stc_esic'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stc_esic_modal_toggle" href="#" data-toggle="modal" data-target="#stc_esic_modal" class="badge badge-gray">View ESIC Declaration Form</a>
                                                            </label>
                                                            <select required="" class="form-control" id="stc_esic" name="stc_esic" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_esic'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_esic'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stc_esic_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_esic_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stc_esic_attach" id="stc_esic_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                Labour Welfare Fund :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stc_lwf'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stc_lwf_modal_toggle" href="#" data-toggle="modal" data-target="#stc_lwf_modal" class="badge badge-gray">View LWF Declaration Form</a>
                                                            </label>
                                                            <select required="" class="form-control" id="stc_lwf" name="stc_lwf" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_lwf'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_lwf'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stc_lwf_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_lwf_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stc_lwf_attach" id="stc_lwf_attach" />



                                                        </div>
                                                    </div>


                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">
                                                                Professional Tax Registration Certificate :<span class="danger">*</span>
                                                                <a style="display: <?php
                                                                if ($mRecord['stc_ptrc'] == "0") {
                                                                    echo "";
                                                                } else {
                                                                    echo "none";
                                                                }
                                                                ?>" id="stc_ptrc_modal_toggle" href="#" data-toggle="modal" data-target="#stc_ptrc_modal" class="badge badge-gray">View PTRC Declaration Form</a>
                                                            </label>
                                                            <select required="" class="form-control" id="stc_ptrc" name="stc_ptrc" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_ptrc'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_ptrc'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stc_ptrc_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_ptrc_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stc_ptrc_attach" id="stc_ptrc_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">Shops & Establishment Code NO :<span class="danger">*</span></label>
                                                            <select required="" class="form-control" id="stc_secn" name="stc_secn" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_secn'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_secn'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stc_secn_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_secn_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stc_secn_attach" id="stc_secn_attach" />

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="location3">Labour Identification Number :<span class="danger">*</span></label>
                                                            <select required="" class="form-control" id="stc_lin" name="stc_lin" <?php echo $disable; ?>>
                                                                <option value="" disabled="" selected="">Select</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_lin'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Applicable</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_lin'] == "0") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="0">Not Applicable</option>
                                                            </select>

                                                            <?php if ($disable == "disabled" && $mRecord['stc_lin_attach']) { ?>
                                                                <br>
                                                                <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mRecord['stc_lin_attach']); ?>">Download</a>
                                                            <?php } ?>
                                                            <br>
                                                            <input type="file" hidden="true" class="form-control" name="stc_lin_attach" id="stc_lin_attach" />

                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade stc_epf_modal" data-backdrop="false" id="stc_epf_modal" tabindex="-1">
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
                                                                            <input required="true" class="form-control" type="text" id="stc_epf_to" name="stc_epf_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_epf_to'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_epf_one" name="stc_epf_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_epf_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stc_epf_two" name="stc_epf_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_epf_two'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_epf_three" name="stc_epf_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_epf_three'];
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
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_epf_four" name="stc_epf_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_epf_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_epf_five" name="stc_epf_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_epf_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input max="<?php echo date("Y-m-d"); ?>" style="width: 100%" required="true" class="form-control" type="date" id="stc_epf_six" name="stc_epf_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_epf_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stc_epf_date" name="stc_epf_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_epf_date'];
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
                                                                    <button type="button" class="btn btn-secondary" id="stc_epf_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stc_epf_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade stc_esic_modal" data-backdrop="false" id="stc_esic_modal" tabindex="-1">
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
                                                                            <input required="true" class="form-control" type="text" id="stc_esic_to" name="stc_esic_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_esic_to'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_esic_one" name="stc_esic_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_esic_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stc_esic_two" name="stc_esic_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_esic_two'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_esic_three" name="stc_esic_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_esic_three'];
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
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_esic_four" name="stc_esic_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_esic_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_esic_five" name="stc_esic_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_esic_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input max="<?php echo date("Y-m-d"); ?>" style="width: 100%" required="true" class="form-control" type="date" id="stc_esic_six" name="stc_esic_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_esic_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stc_esic_date" name="stc_esic_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_esic_date'];
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
                                                                    <button type="button" class="btn btn-secondary" id="stc_esic_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stc_esic_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade stc_lwf_modal" data-backdrop="false" id="stc_lwf_modal" tabindex="-1">
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
                                                                            <input required="true" class="form-control" type="text" id="stc_lwf_to" name="stc_lwf_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_lwf_to'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_lwf_one" name="stc_lwf_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_lwf_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stc_lwf_two" name="stc_lwf_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_lwf_two'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_lwf_three" name="stc_lwf_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_lwf_three'];
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
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_lwf_four" name="stc_lwf_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_lwf_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_lwf_five" name="stc_lwf_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_lwf_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input max="<?php echo date("Y-m-d"); ?>" style="width: 100%" required="true" class="form-control" type="date" id="stc_lwf_six" name="stc_lwf_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_lwf_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stc_lwf_date" name="stc_lwf_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_lwf_date'];
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
                                                                    <button type="button" class="btn btn-secondary" id="stc_lwf_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stc_lwf_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal fade stc_ptrc_modal" data-backdrop="false" id="stc_ptrc_modal" tabindex="-1">
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
                                                                            <input required="true" class="form-control" type="text" id="stc_ptrc_to" name="stc_ptrc_to" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_ptrc_to'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_ptrc_one" name="stc_ptrc_one" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_ptrc_one'];
                                                                            }
                                                                            ?>" <?php echo $disable; ?> />
                                                                            <h6>having its registered office at</h6>
                                                                            <input required="true" class="form-control" type="text" id="stc_ptrc_two" name="stc_ptrc_two" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_ptrc_two'];
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
                                                                            <input required="true" class="form-control" type="text" id="stc_ptrc_three" name="stc_ptrc_three" value="<?php
                                                                            if (!empty($mRecord)) {
                                                                                echo $mRecord['stc_ptrc_three'];
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
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_ptrc_four" name="stc_ptrc_four" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_ptrc_four'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> />
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Designation: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input style="width: 100%" required="true" class="form-control" type="text" id="stc_ptrc_five" name="stc_ptrc_five" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_ptrc_five'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td>
                                                                                            Date:
                                                                                        </td>
                                                                                        <td>
                                                                                            <input max="<?php echo date("Y-m-d"); ?>" style="width: 100%" required="true" class="form-control" type="date" id="stc_ptrc_six" name="stc_ptrc_six" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_ptrc_six'];
                                                                                            }
                                                                                            ?>" <?php echo $disable; ?> /> 
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="display: none">
                                                                                        <td>
                                                                                            Sign & Stamp: 
                                                                                        </td>
                                                                                        <td>
                                                                                            <input hidden="" class="form-control" type="text" id="stc_ptrc_date" name="stc_ptrc_date" value="<?php
                                                                                            if (!empty($mRecord)) {
                                                                                                echo $mRecord['stc_ptrc_date'];
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
                                                                    <button type="button" class="btn btn-secondary" id="stc_ptrc_modal_close">Close</button>
                                                                    <button type="button" class="btn btn-primary float-right" id="stc_ptrc_modal_save">Save</button>
                                                                <?php } else { ?>
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.modal -->

                                                <h6><b>Company Address & Contact Details</b></h6>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="url123">Address :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stc_address" name="stc_address" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_address'];
                                                            } else {
                                                                echo $stageOne['address'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label for="username123">Telephone :<span class="danger">*</span></label>
                                                            <input type="tel" class="form-control required" id="stc_tel" name="stc_tel" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_tel'];
                                                            } else {
                                                                echo $stageOne['contact_number'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <!--                                                    <div class="col-6">
                                                                                                            <div class="form-group">
                                                                                                                <label for="password123">Fax :<span class="danger">*</span></label>
                                                                                                                <input type="text" class="form-control required" id="stc_fax" name="stc_fax" value="<?php
                                                    if (!empty($mRecord)) {
                                                        echo $mRecord['stc_fax'];
                                                    }
                                                    ?>" <?php echo $disable; ?>>
                                                                                                            </div>
                                                                                                        </div>-->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Website :</label>
                                                            <input type="text" class="form-control" id="stc_website" name="stc_website" placeholder="http://" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_website'];
                                                            } else {
                                                                echo $stageOne['website'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Name of Contact Person :<span class="danger">*</span></label>
                                                            <input type="text" class="form-control required" id="stc_nocp" name="stc_nocp" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_nocp'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email of the Contact Person :<span class="danger">*</span></label>
                                                            <input placeholder="Please click on enter to input multiple values" data-role="tagsinput" type="text" class="form-control required" id="stc_eocp" name="stc_eocp" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_eocp'];
                                                            }
                                                            ?>" <?php echo $disable; ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6><b>No. of years as Contractor : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input readonly="" type="number" class="form-control required" id="stc_noy" name="stc_noy" value="<?php
                                                            if (!empty($mRecord)) {
                                                                echo $mRecord['stc_noy'];
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
                                                            foreach ($mTows as $key => $mTow) {
                                                                $mIdCount++;
                                                                ?>
                                                                <fieldset>
                                                                    <input type="checkbox" id="checkbox_tow_<?php echo $mIdCount; ?>" name="stc_tow[]" value="<?php echo $mTow['id']; ?>"  
                                                                    <?php
                                                                    if (!empty($mRecord)) {
                                                                        $data = json_decode($mRecord['stc_tow']);

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
                                                <br/><br/>
                                                <h6><b>Experience with Similar Work (In last 5 years)*</b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stc_wpc" name="stc_wpc" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_wpc'] == '1') {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Experienced and completed more than 10 projects</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_wpc'] == '2') {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">Experienced and completed 6 - 9 projects</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_wpc'] == '3') {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">Experienced and completed 3-5 projects</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_wpc'] == '4') {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="4">Experienced and completed 1- 2 projects</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_wpc'] == '5') {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="5">No Experience for completing any projects</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br/> 
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <table id="stc_wpc_table" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <th>Name of Client</th>
                                                                        <th>Client’s representative</th>
                                                                        <th>Contact details</th>
                                                                        <th>Project Description</th>
                                                                        <th style="width: 150px">Contract Value Rs.(In Crores)</th>
                                                                        <th>Start  Date</th>
                                                                        <th>Completion Date</th>
                                                                        <th>Upload Similar Work*</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="itemsTbody">
                                                                    <?php if (!empty($mRecord['stc_wpc_details'])) { ?>
                                                                        <?php
                                                                        $mCount = 0;
                                                                        foreach (json_decode($mRecord['stc_wpc_details']) as $key => $mScope) {
                                                                            $mCount++;
                                                                            ?>
                                                                            <tr>
                                                                                <td><a class="deleteRow"></a></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[0]; ?>" type="text" name="stc_wpc_details[<?php echo $mCount; ?>][]" class="form-control site-value"/>
                                                                                </td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[1]; ?>" type="text" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control site-value-2"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[2]; ?>" type="text" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control site-value-3"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[3]; ?>" type="text" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control site-value-4"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[4]; ?>" type="number" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control site-value-5"/></td>
                                                                                <td>
                                                                                    <input max="<?php echo date("Y-m-d"); ?>" <?php echo $disable; ?> value="<?php echo $mScope[5]; ?>" type="date" onchange="getStartDate(<?php echo $mCount; ?>)" id="stc_wpc_details_sd_<?php echo $mCount; ?>" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control site-value-6"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input max="<?php echo date("Y-m-d"); ?>" <?php echo $disable; ?> value="<?php echo $mScope[6]; ?>" type="date" onchange="getEndDate(<?php echo $mCount; ?>)" id="stc_wpc_details_sd_<?php echo $mCount; ?>" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control site-value-7"/>
                                                                                </td>
                                                                                <td>
        <!--                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[7]; ?>" type="file" name="stc_wpc_details[<?php echo $mCount; ?>][]"  class="form-control"/>-->
                                                                                    <?php if ($disable == "disabled" && $mScope[5]) { ?>
                                                                                        <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mScope[7]); ?>">Download</a>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr>
                                                                            <td><a class="deleteRow"></a></td>
                                                                            <td>
                                                                                <input value="" type="text" name="stc_wpc_details[1][]" class="form-control site-value"/>
                                                                            </td>
                                                                            <td><input value="" type="text" name="stc_wpc_details[1][]"  class="form-control site-value-2"/></td>
                                                                            <td><input value="" type="text" name="stc_wpc_details[1][]"  class="form-control site-value-3"/></td>
                                                                            <td><input value="" type="text" name="stc_wpc_details[1][]"  class="form-control site-value-4"/></td>
                                                                            <td><input value="" type="number" name="stc_wpc_details[1][]"  class="form-control site-value-5"/></td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" onchange="getStartDate('1')" id="stc_wpc_details_sd_1" name="stc_wpc_details[1][]"  class="form-control site-value-6"/>
                                                                            </td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" onchange="getEndDate('1')" id="stc_wpc_details_ed_1" name="stc_wpc_details[1][]"  class="form-control site-value-7"/>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="file" name="stc_wpc_details[1][]"  class="form-control site-value-8"/>
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

                                                <h6><b> Association with other reputed clients to be confirmed using Work order copies/ Completion certificate as documetary evidance : <span class="danger">*</span></b></h6>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stc_dcw" name="stc_dcw" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_dcw'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">Having Work order  more than 5 reputed developers including PSU/Government Department </option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_dcw'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">Having Work order in between 4 to 5 No’s from reputed developers including PSU/Government Department </option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_dcw'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">Having Work order in between 1 to 3 No’s from reputed developers including PSU/Government Department </option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_dcw'] == "4") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="4">Having No Work order from reputed developers including PSU/Government Department </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive"> 
                                                            <table id="stc_dcw_table" class="table table-bordered">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Action</th>
                                                                        <th>Name of Client</th>
                                                                        <th>Client’s representative</th>
                                                                        <th>Contact details</th>
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
                                                                        <th>
                                                                            Upload Work Order*
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="itemsTbody">
                                                                    <?php if (!empty($mRecord['stc_dcw_details'])) { ?>
                                                                        <?php
                                                                        $mCount = 0;
                                                                        foreach (json_decode($mRecord['stc_dcw_details']) as $key => $mScope) {
                                                                            $mCount++;
                                                                            ?>
                                                                            <tr>
                                                                                <td><a class="deleteRow"></a></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[0]; ?>" type="text" name="stc_dcw_details[<?php echo $mCount; ?>][]" class="form-control site-value-dcw"/>
                                                                                </td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[1]; ?>" type="text" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-2"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[2]; ?>" type="text" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-3"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[3]; ?>" type="text" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-4"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[4]; ?>" type="text" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-5"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[5]; ?>" onchange="getOrderValue(<?php echo $mCount; ?>)" id="stc_dcw_details_ov_1" type="number" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-6"/></td>
                                                                                <td><input <?php echo $disable; ?> value="<?php echo $mScope[6]; ?>" onchange="getBilledValue(<?php echo $mCount; ?>)" id="stc_dcw_details_bv_1" type="number" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-7"/></td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[7]; ?>" onchange="getDcwStartDate(<?php echo $mCount; ?>)" id="stc_dcw_details_sd_<?php echo $mCount; ?>" type="date" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-8"/>
                                                                                </td>
                                                                                <td>
                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[8]; ?>" onchange="getDcwEndDate(<?php echo $mCount; ?>)" id="stc_dcw_details_ed_<?php echo $mCount; ?>" type="date" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control site-value-dcw-9"/>
                                                                                </td>
                                                                                <td>
        <!--                                                                                    <input <?php echo $disable; ?> value="<?php echo $mScope[9]; ?>" type="file" name="stc_dcw_details[<?php echo $mCount; ?>][]"  class="form-control"/>-->
                                                                                    <?php if ($disable == "disabled" && $mScope[7]) { ?>
                                                                                        <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mScope[9]); ?>">Download</a>
                                                                                    <?php } ?>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    <?php } else { ?>
                                                                        <tr>
                                                                            <td><a class="deleteRowCc"></a></td>
                                                                            <td>
                                                                                <input value="" type="text" name="stc_dcw_details[1][]" class="form-control  site-value-dcw"/>
                                                                            </td>
                                                                            <td><input value="" type="text" name="stc_dcw_details[1][]"  class="form-control site-value-dcw-2"/></td>
                                                                            <td><input value="" type="text" name="stc_dcw_details[1][]"  class="form-control site-value-dcw-3"/></td>
                                                                            <td><input value="" type="text" name="stc_dcw_details[1][]"  class="form-control site-value-dcw-4"/></td>
                                                                            <td><input value="" type="text" name="stc_dcw_details[1][]"  class="form-control site-value-dcw-5"/></td>
                                                                            <td><input value="" type="number" name="stc_dcw_details[1][]" onchange="getOrderValue('1')" id="stc_dcw_details_ov_1" class="form-control site-value-dcw-6"/></td>
                                                                            <td><input value="" type="number" name="stc_dcw_details[1][]" onchange="getBilledValue('1')" id="stc_dcw_details_bv_1" class="form-control site-value-dcw-7"/></td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" name="stc_dcw_details[1][]" onchange="getDcwStartDate('1')" id="stc_dcw_details_sd_1" class="form-control site-value-dcw-8"/>
                                                                            </td>
                                                                            <td>
                                                                                <input max="<?php echo date("Y-m-d"); ?>" value="" type="date" name="stc_dcw_details[1][]" onchange="getDcwEndDate('1')" id="stc_dcw_details_ed_1" class="form-control site-value-dcw-9"/>
                                                                            </td>
                                                                            <td>
                                                                                <input value="" type="file" name="stc_dcw_details[1][]"  class="form-control site-value-dcw-10"/>
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                            </table>
                                                            <?php if ($disable != "disabled") { ?>
                                                                <div class="well clearfix text-right">
                                                                    <a href="#" class="btn btn-primary" id="addrowdcw">
                                                                        <span class="fa fa-plus"></span>
                                                                        Add Row
                                                                    </a>
                                                                </div>
                                                            <?php } ?>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- Step 3 -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="table-responsive">
                                                            <?php
                                                            $mTotal = json_decode($mRecord['stc_total_assets']);
                                                            $mCurrent = json_decode($mRecord['stc_current_assets']);
                                                            $mLia = json_decode($mRecord['stc_total_lia']);
                                                            $mCurLia = json_decode($mRecord['stc_current_lia']);
                                                            $mTurn = json_decode($mRecord['stc_turnover']);
                                                            $mProfits = json_decode($mRecord['stc_profits']);
                                                            $mProfitsTax = json_decode($mRecord['stc_profits_tax']);
                                                            $mFinUploads = json_decode($mRecord['stc_fin_uploads']);
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
                                                                <tr>
                                                                    <td>Turnover (In Crores)</td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stc_turnover[]" value="<?php echo $mTurn[0]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stc_turnover[]" value="<?php echo $mTurn[1]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stc_turnover[]" value="<?php echo $mTurn[2]; ?>"></td>
                                                                    <td><input required="" <?php echo $disable; ?> type="number" name="stc_turnover[]" value="<?php echo $mTurn[3]; ?>"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td>Upload Audited Balance Sheet</td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" <?php echo $disable; ?> type="file" name="stc_fin_uploads[]" value="<?php echo $mFinUploads[0]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[0]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[0]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" <?php echo $disable; ?> type="file" name="stc_fin_uploads[]" value="<?php echo $mFinUploads[1]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[1]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[1]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" <?php echo $disable; ?> type="file" name="stc_fin_uploads[]" value="<?php echo $mFinUploads[2]; ?>">
                                                                        <?php } ?>
                                                                        <?php if ($disable == "disabled" && $mFinUploads[2]) { ?>
                                                                            <a class="btn btn-sm btn-info" download="" href="<?php echo base_url('uploads/' . $mFinUploads[2]); ?>">Download</a>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($disable == "") { ?>
                                                                            <input style="width: 200px" <?php echo $disable; ?> type="file" name="stc_fin_uploads[]" value="<?php echo $mFinUploads[3]; ?>">
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

                                                <div class="text-center">
                                                    <h4>
                                                        <b>
                                                            Capability Facotrs (Manpower and resources)
                                                            (Verification of PF challans paid for, Wage register maintained)
                                                        </b>
                                                    </h4>
                                                    <hr>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <select class="custom-select form-control required" id="stc_cc" name="stc_cc" <?php echo $disable; ?>> 

                                                                <option value="" disabled="" selected="">Select</option>

                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_cc'] == "1") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="1">More than 10 no. of permanent staff on payroll</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_cc'] == "2") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="2">5- 10 no. of permanent staff on payroll</option>
                                                                <option <?php
                                                                if (!empty($mRecord)) {
                                                                    if ($mRecord['stc_cc'] == "3") {
                                                                        echo "selected";
                                                                    }
                                                                }
                                                                ?> value="3">Minimum 5 no. permanent staff on payroll</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                </div>
                                            </section>
                                            <!-- Step 6 -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <input value="<?php echo $mRecord['stc_partner_field_1']; ?>" <?php echo $disable; ?> class="form-control" name="stc_partner_field_1" required="" />	  					
                                                        Proprietor/ Partner/ Director of M/s 
                                                        <input value="<?php echo $mRecord['stc_partner_field_2']; ?>" <?php echo $disable; ?> class="form-control" name="stc_partner_field_2" required="" />
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
                                                        <input <?php echo $disable; ?> class="form-check-input" type="checkbox" id="checkbox_17" name="stc_confirmation" value="1" required <?php
                                                        if (!empty($mRecord)) {
                                                            $data = $mRecord['stc_confirmation'];
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

            var countStepsChange = 0;
            var lastThirdYear = "";
            var form = $(".validation-wizard").show();
            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                        , transitionEffect: "none"
<?php if ($disable == "disabled") { ?>
                    , enableAllSteps: true
                            , enableFinishButton: false
<?php } else { ?>
                    , enableFinishButton: true
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
                                var stc_wpc_count = 0;
                                $('#sites_check').children().remove();
                                $("#stc_wpc_table tbody tr").each(function () {
                                    stc_wpc_count++;
                                    var currentRow = $(this); //Do not search the whole HTML tree twice, use a subtree instead
                                    var completiondate = currentRow.find(".site-value-7").val();
                                    if (new Date(completiondate) >= new Date(lastThirdYear)) {
                                        if (currentRow.find(".site-value").val()) {
                                            $('#sites_check').append('<div class="checkbox"><input value="' + currentRow.find(".site-value").val() + '" type="checkbox" name="stc_visit_a[]" id="stc_sites_visited' + stc_wpc_count + '"><label for="stc_sites_visited' + stc_wpc_count + '">' + currentRow.find(".site-value").val() + '</label></div>');
                                        }
                                    }

                                });

                                var stc_dcw_count = 10;
                                $("#stc_dcw_table tbody tr").each(function () {
                                    stc_wpc_count++;
                                    var currentRow = $(this); //Do not search the whole HTML tree twice, use a subtree instead
                                    var completiondate = currentRow.find(".site-value-9").val();
                                    if (new Date(completiondate) >= new Date(lastThirdYear)) {
                                        if (currentRow.find(".site-value").val()) {
                                            $('#sites_check').append('<div class="checkbox"><input value="' + currentRow.find(".site-value").val() + '" type="checkbox" name="stc_visit_a[]" id="stc_sites_visited' + stc_dcw_count + '"><label for="stc_sites_visited' + stc_dcw_count + '">' + currentRow.find(".site-value").val() + '</label></div>');
                                        }
                                    }

                                });

                                var stc_cc_count = 20;
                                $("#stc_cc_table tbody tr").each(function () {
                                    stc_wpc_count++;
                                    var currentRow = $(this); //Do not search the whole HTML tree twice, use a subtree instead
                                    var completiondate = currentRow.find(".site-value-9").val();
                                    if (new Date(completiondate) >= new Date(lastThirdYear)) {
                                        if (currentRow.find(".site-value").val()) {
                                            $('#sites_check').append('<div class="checkbox"><input value="' + currentRow.find(".site-value").val() + '" type="checkbox" name="stc_visit_a[]" id="stc_sites_visited' + stc_cc_count + '"><label for="stc_sites_visited' + stc_cc_count + '">' + currentRow.find(".site-value").val() + '</label></div>');
                                        }
                                    }
                                });
                            }
                        }
<?php } ?>

                    return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                    //return newIndex;
                }
                , onFinishing: function (event, currentIndex) {
                    //alert(form.validate().settings.ignore = ":disabled", form.valid());
                    return form.validate().settings.ignore = ":disabled", form.valid()
                }
                , onFinished: function (event, currentIndex) {
                    var form = document.getElementById("register_form");
                    form.submit();
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
                var start_date = $('#stc_wpc_details_sd_' + mRowId).val();
                var end_date = $('#stc_wpc_details_ed_' + mRowId).val();
                if (end_date) {
                    if (new Date(start_date).getTime() > new Date(end_date).getTime()) {
                        $('#stc_wpc_details_ed_' + mRowId).attr({
                            "min": start_date,
                        });
                    }
                } else {
                    $('#stc_wpc_details_ed_' + mRowId).attr({
                        "min": start_date,
                    });
                }
            }

            function getDcwStartDate(mRowId) {
                var start_date = $('#stc_dcw_details_sd_' + mRowId).val();
                var end_date = $('#stc_dcw_details_ed_' + mRowId).val();
                if (end_date) {
                    if (new Date(start_date).getTime() > new Date(end_date).getTime()) {
                        $('#stc_dcw_details_ed_' + mRowId).attr({
                            "min": start_date,
                        });
                    }
                } else {
                    $('#stc_dcw_details_ed_' + mRowId).attr({
                        "min": start_date,
                    });
                }
            }

            function getOrderValue(mRowId) {
                var order = $('#stc_dcw_details_ov_' + mRowId).val();
                $('#stc_dcw_details_bv_' + mRowId).attr({
                    "max": order,
                });
            }

            $(document).ready(function () {
                $('#stc_doi').on('change', function (e) {

                    var selectedDate = e.target.value;
                    var date1 = new Date(selectedDate);
                    var date2 = new Date();
                    var Difference_In_Time = date2.getTime() - date1.getTime();
                    var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24 * 365);
                    if (Difference_In_Days > 0) {
                        $('#stc_noy').val(Difference_In_Days.toFixed(1));
                    } else {
                        $('#stc_noy').val("0");
                    }

                    $(".site-value-6").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-7").attr({
                        "min": selectedDate,
                    });

                    $(".site-value-dcw-8").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-dcw-9").attr({
                        "min": selectedDate,
                    });

                    var year = new Date(selectedDate).getFullYear();
                    var month = new Date(selectedDate).getMonth();
                    var day = new Date(selectedDate).getDate();
                    var date = new Date(year - 3, month, day);
                    if (date) {
                        lastThirdYear = date;
                    }

                });

                ;

                $('#stc_others').on('change', function (e) {
                    if ($('#stc_others').is(':checked')) {
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
                $('#stc_wpc').on('change', function () {
                    countStepsChange = 0;
                    if (this.value === "1") {
                        $('#stc_wpc_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stc_wpc_table tr').length;
                        var count = rowCount;
                        if (count < 11) {
                            var times = 10;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stc_wpc_table").append(newRow);
                                counterscope++;
                            }
                        }
                    } else if (this.value === "2") {
                        $('#stc_wpc_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stc_wpc_table tr').length;
                        var count = rowCount;
                        if (count < 7) {
                            var times = 6;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stc_wpc_table").append(newRow);
                                counterscope++;
                            }
                        }
                    } else if (this.value === "3") {
                        $('#stc_wpc_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stc_wpc_table tr').length;
                        var count = rowCount;
                        if (count < 4) {
                            var times = 3;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stc_wpc_table").append(newRow);
                                counterscope++;
                            }
                        }
                    } else if (this.value === "4") {
                        $('#stc_wpc_table tbody tr').remove();
                        selectedWork = this.value;
                        var rowCount = $('#stc_wpc_table tr').length;
                        var count = rowCount;
                        if (count < 3) {
                            var times = 1;
                            for (var i = 0; i < times; i++) {
                                var newRow = $("<tr>");
                                var cols = "";
                                cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                                cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                                newRow.append(cols);
                                $("#stc_wpc_table").append(newRow);
                                counterscope++;
                            }
                        }
                    } else if (this.value === "5") {
                        selectedWork = this.value;
                        $('#stc_wpc_table tbody tr').remove();
                    }


                    var selectedDate = $("#stc_doi").val();

                    $(".site-value-6").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-7").attr({
                        "min": selectedDate,
                    });

                });
                $("#addrowscope").on("click", function () {
                    countStepsChange = 0;
                    var rowCount = $('#stc_wpc_table tr').length;
                    //alert(rowCount);
                    if (selectedWork == "1") {
                        if (rowCount >= "11") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_wpc_table").append(newRow);
                            counterscope++;
                        }
                    } else if (selectedWork == "2") {
                        if (rowCount >= "7" && rowCount <= "9") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_wpc_table").append(newRow);
                            counterscope++;
                        } else {
                            alert("Maximum 9 entries to be filled.");
                        }
                    } else if (selectedWork == "3") {
                        if (rowCount >= "4" && rowCount <= "5") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_wpc_table").append(newRow);
                            counterscope++;
                        } else {
                            alert("Maximum 5 entries to be filled.");
                        }
                    } else if (selectedWork == "4") {
                        if (rowCount <= "2") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelScope btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-2" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-3" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-4" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-5" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getStartDate(' + counterscope + ')" id="stc_wpc_details_sd_' + counterscope + '" class="form-control site-value-6" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getEndDate(' + counterscope + ')" id="stc_wpc_details_ed_' + counterscope + '" class="form-control site-value-7" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-8" name="stc_wpc_details[' + counterscope + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_wpc_table").append(newRow);
                            counterscope++;
                        } else {
                            alert("Maximum 2 entries to be filled.");
                        }
                    } else {
                        alert("Entry cannot be filled.");
                    }

                    var selectedDate = $("#stc_doi").val();

                    $(".site-value-6").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-7").attr({
                        "min": selectedDate,
                    });

                });
                $("#stc_wpc_table").on("click", ".ibtnDelScope", function (event) {
                    var rowCount = $('#stc_wpc_table tr').length;
                    if (selectedWork == "1") {
                        if (rowCount <= "11") {
                            alert("Minimum 10 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else if (selectedWork == "2") {
                        if (rowCount <= "7") {
                            alert("Minimum 6 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else if (selectedWork == "3") {
                        if (rowCount <= "4") {
                            alert("Minimum 3 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else if (selectedWork == "4") {
                        if (rowCount <= "2") {
                            alert("Minimum 1 entry to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterscope -= 1
                        }
                    } else {
                        $(this).closest("tr").remove();
                        counterscope -= 1
                    }
                });
                var counterdcw = 2;
                var selectedReg = 0;
                $('#stc_dcw').on('change', function () {
                    countStepsChange = 0;
                    if (this.value === "1") {
                        $('#stc_dcw_table tbody tr').remove();
                        selectedReg = this.value;
                        var rowCount = $('#stc_dcw_table tr').length;
                        var count = rowCount;
                        var times = 5;
                        for (var i = 0; i < times; i++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-dcw-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-4" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-5" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" class="form-control site-value-dcw-6" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" class="form-control site-value-dcw-7" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" class="form-control site-value-dcw-8" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" class="form-control site-value-dcw-9" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-dcw-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_dcw_table").append(newRow);
                            counterdcw++;
                        }
                    } else if (this.value === "2") {
                        $('#stc_dcw_table tbody tr').remove();
                        selectedReg = this.value;
                        var rowCount = $('#stc_dcw_table tr').length;
                        var count = rowCount;
                        var times = 4;
                        for (var i = 0; i < times; i++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-dcw-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-4" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-5" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" class="form-control site-value-dcw-6" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" class="form-control site-value-dcw-7" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" class="form-control site-value-dcw-8" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" class="form-control site-value-dcw-9" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-dcw-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_dcw_table").append(newRow);
                            counterdcw++;
                        }
                    } else if (this.value === "3") {
                        $('#stc_dcw_table tbody tr').remove();
                        selectedReg = this.value;
                        var rowCount = $('#stc_dcw_table tr').length;
                        var count = rowCount;
                        var times = 1;
                        for (var i = 0; i < times; i++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-dcw-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-4" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-5" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" class="form-control site-value-dcw-6" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" class="form-control site-value-dcw-7" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" class="form-control site-value-dcw-8" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" class="form-control site-value-dcw-9" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-dcw-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_dcw_table").append(newRow);
                            counterdcw++;
                        }
                    } else if (this.value === "4") {
                        selectedReg = this.value;
                        $('#stc_dcw_table tbody tr').remove();
                    }

                    var selectedDate = $("#stc_doi").val();

                    $(".site-value-dcw-8").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-dcw-9").attr({
                        "min": selectedDate,
                    });

                });
                $("#addrowdcw").on("click", function () {
                    countStepsChange = 0;
                    var rowCount = $('#stc_dcw_table tr').length;
                    //alert(rowCount);
                    if (selectedReg == "1") {
                        if (rowCount >= "6") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-dcw-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-4" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-5" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" class="form-control site-value-dcw-6" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" class="form-control site-value-dcw-7" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" class="form-control site-value-dcw-8" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" class="form-control site-value-dcw-9" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-dcw-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_dcw_table").append(newRow);
                            counterdcw++;
                        }
                    } else if (selectedReg == "2") {
                        if (rowCount > "4" && rowCount <= "5") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-dcw-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-4" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-5" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" class="form-control site-value-dcw-6" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" class="form-control site-value-dcw-7" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" class="form-control site-value-dcw-8" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" class="form-control site-value-dcw-9" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-dcw-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_dcw_table").append(newRow);
                            counterdcw++;
                        } else {
                            alert("Maximum 5 entries to be filled.");
                        }
                    } else if (selectedReg == "3") {
                        if (rowCount >= "2" && rowCount <= "3") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelDcw btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-2" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control site-value-dcw-3" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-4" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control site-value-dcw-5" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getOrderValue(' + counterdcw + ')" id="stc_dcw_details_ov_' + counterdcw + '" class="form-control site-value-dcw-6" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="number" onchange="getBilledValue(' + counterdcw + ')" id="stc_dcw_details_bv_' + counterdcw + '" class="form-control site-value-dcw-7" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwStartDate(' + counterdcw + ')" id="stc_dcw_details_sd_' + counterdcw + '" class="form-control site-value-dcw-8" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" onchange="getDcwEndDate(' + counterdcw + ')" id="stc_dcw_details_ed_' + counterdcw + '" class="form-control site-value-dcw-9" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control site-value-dcw-10" name="stc_dcw_details[' + counterdcw + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_dcw_table").append(newRow);
                            counterdcw++;
                        } else {
                            alert("Maximum 3 entries to be filled.");
                        }
                    } else if (selectedReg == "4") {
                        alert("Entry cannot be filled.");
                    } else {
                        alert("Please select REGISTERED WITH GOVERNEMENT DEPARTMENTS / PSUs / MAJOR DEVELOPERS");
                    }

                    var selectedDate = $("#stc_doi").val();

                    $(".site-value-dcw-8").attr({
                        "min": selectedDate,
                    });
                    $(".site-value-dcw-9").attr({
                        "min": selectedDate,
                    });

                });
                $("#stc_dcw_table").on("click", ".ibtnDelDcw", function (event) {
                    var rowCount = $('#stc_dcw_table tr').length;
                    if (selectedReg == "1") {
                        if (rowCount <= "6") {
                            alert("Minimum 5 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterdcw -= 1
                        }
                    } else if (selectedReg == "2") {
                        if (rowCount <= "5") {
                            alert("Minimum 4 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterdcw -= 1
                        }
                    } else if (selectedReg == "3") {
                        if (rowCount <= "2") {
                            alert("Minimum 1 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            counterdcw -= 1
                        }
                    } else {
                        $(this).closest("tr").remove();
                        counterdcw -= 1
                    }
                });
                var countercc = 2;
                var selectedCc = 0;
                $('#stc_cc').on('change', function () {
                    countStepsChange = 0;
                    if (this.value === "1") {
                        $('#stc_cc_table tbody tr').remove();
                        selectedCc = this.value;
                        var rowCount = $('#stc_cc_table tr').length;
                        var count = rowCount;
                        var times = 6;
                        for (var i = 0; i < times; i++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelCc btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_cc_table").append(newRow);
                            countercc++;
                        }
                    } else if (this.value === "2") {
                        $('#stc_cc_table tbody tr').remove();
                        selectedCc = this.value;
                        var rowCount = $('#stc_cc_table tr').length;
                        var count = rowCount;
                        var times = 3;
                        for (var i = 0; i < times; i++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelCc btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_cc_table").append(newRow);
                            countercc++;
                        }
                    } else if (this.value === "3") {
                        $('#stc_cc_table tbody tr').remove();
                        selectedCc = this.value;
                        var rowCount = $('#stc_cc_table tr').length;
                        var count = rowCount;
                        var times = 1;
                        for (var i = 0; i < times; i++) {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelCc btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_cc_table").append(newRow);
                            countercc++;
                        }
                    } else if (this.value === "4") {
                        selectedCc = this.value;
                        $('#stc_cc_table tbody tr').remove();
                    }
                });
                $("#addrowcc").on("click", function () {
                    countStepsChange = 0;
                    var rowCount = $('#stc_cc_table tr').length;
                    if (selectedCc == "1") {
                        if (rowCount >= "7") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelCc btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_cc_table").append(newRow);
                            countercc++;
                        }
                    } else if (selectedCc == "2") {
                        if (rowCount > "3" && rowCount <= "5") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelCc btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_cc_table").append(newRow);
                            countercc++;
                        } else {
                            alert("Maximum 5 entries to be filled.");
                        }
                    } else if (selectedCc == "3") {
                        if (rowCount >= "1" && rowCount <= "2") {
                            var newRow = $("<tr>");
                            var cols = "";
                            cols += '<td><input type="button" class="ibtnDelCc btn btn-sm btn-danger"  value="Delete"></td>';
                            cols += '<td><input required type="text" class="form-control site-value" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="text" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="number" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input max="<?php echo date("Y-m-d"); ?>" required type="date" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            cols += '<td><input required type="file" class="form-control" name="stc_cc_details[' + countercc + '][]"/></td>';
                            newRow.append(cols);
                            $("#stc_cc_table").append(newRow);
                            countercc++;
                        } else {
                            alert("Maximum 2 entries to be filled.");
                        }
                    } else if (selectedCc == "4") {
                        alert("Entry cannot be filled.");
                    } else {
                        alert("Please select Timely Completion Certification/ from Customers in last 5 years.");
                    }

                });
                $("#stc_cc_table").on("click", ".ibtnDelCc", function (event) {
                    var rowCount = $('#stc_cc_table tr').length;
                    if (selectedCc == "1") {
                        if (rowCount <= "7") {
                            alert("Minimum 6 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            countercc -= 1
                        }
                    } else if (selectedCc == "2") {
                        if (rowCount <= "4") {
                            alert("Minimum 3 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            countercc -= 1
                        }
                    } else if (selectedCc == "3") {
                        if (rowCount <= "2") {
                            alert("Minimum 1 entries to be filled.");
                        } else {
                            $(this).closest("tr").remove();
                            countercc -= 1
                        }
                    } else {
                        $(this).closest("tr").remove();
                        countercc -= 1
                    }
                });
            });
        </script>


        <script>

            function checkOne(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stc_9001_isoc_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stc_9001_isoc_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }


            function checkTwo(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stc_45001_isoc_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stc_45001_isoc_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }

            function checkThree(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stc_qap_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stc_qap_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }

            function checkFour(myRadio) {
                if (myRadio.value == "Yes") {
                    $("#stc_oca_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stc_oca_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            }

            $('#stc_epf').on('change', function () {
                if (this.value == "1") {
                    $("#stc_epf_modal_toggle").hide();
                    $("#stc_epf_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stc_epf_modal').modal('hide');
                    $("#stc_epf_to, #stc_epf_one, #stc_epf_two, #stc_epf_three, #stc_epf_four, #stc_epf_five, #stc_epf_six, #stc_epf_date").attr({
                        "required": false
                    });
                } else {
                    $("#stc_epf_modal_toggle").show();
                    $('.stc_epf_modal').modal('show');
                    $("#stc_epf_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stc_epf_to, #stc_epf_one, #stc_epf_two, #stc_epf_three, #stc_epf_four, #stc_epf_five, #stc_epf_six, #stc_epf_date").attr({
                        "required": true
                    });
                }
            });
            $('#stc_epf_modal_close').on('click', function () {
                $("#stc_epf_modal_toggle").hide();
                $('#stc_epf').val('1');
                $("#stc_epf_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stc_epf_modal').modal('hide');
                $("#stc_epf_to, #stc_epf_one, #stc_epf_two, #stc_epf_three, #stc_epf_four, #stc_epf_five, #stc_epf_six, #stc_epf_date").attr({
                    "required": false,
                });
                $("#stc_epf_to, #stc_epf_one, #stc_epf_two, #stc_epf_three, #stc_epf_four, #stc_epf_five, #stc_epf_six, #stc_epf_date").val("");
            });
            $('#stc_epf_modal_save').on('click', function () {
                $("#stc_epf_modal_toggle").show();
                if ($('#stc_epf_to').val() && $('#stc_epf_one').val() && $('#stc_epf_two').val() && $('#stc_epf_three').val()
                        && $('#stc_epf_four').val() && $('#stc_epf_five').val() && $('#stc_epf_six').val() && $('#stc_epf_date').val()) {
                    $('.stc_epf_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stc_esic').on('change', function () {
                if (this.value == "1") {
                    $("#stc_esic_modal_toggle").hide();
                    $("#stc_esic_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stc_esic_modal').modal('hide');
                    $("#stc_esic_to, #stc_esic_one, #stc_esic_two, #stc_esic_three, #stc_esic_four, #stc_esic_five, #stc_esic_six, #stc_esic_date").attr({
                        "required": false
                    });
                } else {
                    $("#stc_esic_modal_toggle").show();
                    $('.stc_esic_modal').modal('show');
                    $("#stc_esic_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stc_esic_to, #stc_esic_one, #stc_esic_two, #stc_esic_three, #stc_esic_four, #stc_esic_five, #stc_esic_six, #stc_esic_date").attr({
                        "required": true
                    });
                }
            });
            $('#stc_esic_modal_close').on('click', function () {
                $("#stc_esic_modal_toggle").hide();
                $('#stc_esic').val('1');
                $("#stc_esic_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stc_esic_modal').modal('hide');
                $("#stc_esic_to, #stc_esic_one, #stc_esic_two, #stc_esic_three, #stc_esic_four, #stc_esic_five, #stc_esic_six, #stc_esic_date").attr({
                    "required": false,
                    "value": ""
                });
                $("#stc_esic_to, #stc_esic_one, #stc_esic_two, #stc_esic_three, #stc_esic_four, #stc_esic_five, #stc_esic_six, #stc_esic_date").val("");
            });
            $('#stc_esic_modal_save').on('click', function () {
                $("#stc_esic_modal_toggle").show();
                if ($('#stc_esic_to').val() && $('#stc_esic_one').val() && $('#stc_esic_two').val() && $('#stc_esic_three').val()
                        && $('#stc_esic_four').val() && $('#stc_esic_five').val() && $('#stc_esic_six').val() && $('#stc_esic_date').val()) {
                    $('.stc_esic_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stc_lwf').on('change', function () {
                if (this.value == "1") {
                    $("#stc_lwf_modal_toggle").hide();
                    $("#stc_lwf_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stc_lwf_modal').modal('hide');
                    $("#stc_lwf_to, #stc_lwf_one, #stc_lwf_two, #stc_lwf_three, #stc_lwf_four, #stc_lwf_five, #stc_lwf_six, #stc_lwf_date").attr({
                        "required": false
                    });
                } else {
                    $("#stc_lwf_modal_toggle").show();
                    $('.stc_lwf_modal').modal('show');
                    $("#stc_lwf_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stc_lwf_to, #stc_lwf_one, #stc_lwf_two, #stc_lwf_three, #stc_lwf_four, #stc_lwf_five, #stc_lwf_six, #stc_lwf_date").attr({
                        "required": true
                    });
                }
            });
            $('#stc_lwf_modal_close').on('click', function () {
                $("#stc_lwf_modal_toggle").hide();
                $('#stc_lwf').val('1');
                $("#stc_lwf_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stc_lwf_modal').modal('hide');
                $("#stc_lwf_to, #stc_lwf_one, #stc_lwf_two, #stc_lwf_three, #stc_lwf_four, #stc_lwf_five, #stc_lwf_six, #stc_lwf_date").attr({
                    "required": false,
                    "value": ""
                });
            });
            $('#stc_lwf_modal_save').on('click', function () {
                $("#stc_lwf_modal_toggle").show();
                if ($('#stc_lwf_to').val() && $('#stc_lwf_one').val() && $('#stc_lwf_two').val() && $('#stc_lwf_three').val()
                        && $('#stc_lwf_four').val() && $('#stc_lwf_five').val() && $('#stc_lwf_six').val() && $('#stc_lwf_date').val()) {
                    $('.stc_lwf_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stc_ptrc').on('change', function () {
                if (this.value == "1") {
                    $("#stc_ptrc_modal_toggle").hide();
                    $("#stc_ptrc_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                    $('.stc_ptrc_modal').modal('hide');
                    $("#stc_ptrc_to, #stc_ptrc_one, #stc_ptrc_two, #stc_ptrc_three, #stc_ptrc_four, #stc_ptrc_five, #stc_ptrc_six, #stc_ptrc_date").attr({
                        "required": false
                    });
                } else {
                    $("#stc_ptrc_modal_toggle").show();
                    $('.stc_ptrc_modal').modal('show');
                    $("#stc_ptrc_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                    $("#stc_ptrc_to, #stc_ptrc_one, #stc_ptrc_two, #stc_ptrc_three, #stc_ptrc_four, #stc_ptrc_five, #stc_ptrc_six, #stc_ptrc_date").attr({
                        "required": true
                    });
                }
            });
            $('#stc_ptrc_modal_close').on('click', function () {
                $("#stc_ptrc_modal_toggle").hide();
                $('#stc_ptrc').val('1');
                $("#stc_ptrc_attach").attr({
                    "hidden": false,
                    "required": true
                });
                $('.stc_ptrc_modal').modal('hide');
                $("#stc_ptrc_to, #stc_ptrc_one, #stc_ptrc_two, #stc_ptrc_three, #stc_ptrc_four, #stc_ptrc_five, #stc_ptrc_six, #stc_ptrc_date").attr({
                    "required": false,
                    "value": ""
                });
            });
            $('#stc_ptrc_modal_save').on('click', function () {
                $("#stc_ptrc_modal_toggle").show();
                if ($('#stc_ptrc_to').val() && $('#stc_ptrc_one').val() && $('#stc_ptrc_two').val() && $('#stc_ptrc_three').val()
                        && $('#stc_ptrc_four').val() && $('#stc_ptrc_five').val() && $('#stc_ptrc_six').val() && $('#stc_ptrc_date').val()) {
                    $('.stc_ptrc_modal').modal('hide');
                } else {
                    alert("Please fill all the fields.");
                }
            });
            $('#stc_secn').on('change', function () {
                if (this.value == "1") {
                    $("#stc_secn_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stc_secn_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            });
            $('#stc_lin').on('change', function () {
                if (this.value == "1") {
                    $("#stc_lin_attach").attr({
                        "hidden": false,
                        "required": true
                    });
                } else {
                    $("#stc_lin_attach").attr({
                        "hidden": true,
                        "required": false
                    });
                }
            });
<?php if ($disable == "disabled") { ?>
                var ptrc = "<?php echo $mRecord['stc_ptrc']; ?>";
                if (ptrc == "0") {
                    $("#ptrc_panel").collapse('show');
                } else {
                    $("#ptrc_panel").collapse('hide');
                }

                var lwf = "<?php echo $mRecord['stc_lwf']; ?>";
                if (lwf == "0") {
                    $("#lwf_panel").collapse('show');
                } else {
                    $("#lwf_panel").collapse('hide');
                }

                var esic = "<?php echo $mRecord['stc_esic']; ?>";
                if (esic == "0") {
                    $("#esic_panel").collapse('show');
                } else {
                    $("#esic_panel").collapse('hide');
                }

                var epf = "<?php echo $mRecord['stc_epf']; ?>";
                if (epf == "0") {
                    $("#epf_panel").collapse('show');
                } else {
                    $("#epf_panel").collapse('hide');
                }
<?php } ?>
        </script>

    </body>
</html>