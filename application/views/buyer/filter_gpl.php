<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

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
                                <div class="col-md-12">
                                    <h3 class="page-title br-0">GPL Vendor Data</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-12">
                                <form method="POST" action="<?php echo base_url('buyer/vendor/actionFilterGplData/' . "/" . $zone . "/" . $nob . "/" . $tow); ?>">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Type Of Agency</label>
                                                <select id="nature_of_business_process" name="nature_of_business" required  class="form-control">
                                                    <option value="" disabled="" selected="">Select Type of agency</option>
                                                    <option <?php
                                                    if ($nob == "All") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="All">All</option>
                                                        <?php foreach ($getVendor as $vendor) { ?>
                                                        <option <?php
                                                        if ($nob == $vendor->id) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $vendor->id; ?>"><?php echo $vendor->name; ?></option> 
                                                        <?php }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Package Name</label>
                                                <select id="type_of_work" name="type_of_work" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Select Package name <?php echo $mTow; ?></option>
                                                    <option <?php
                                                    if ($tow == "All") {
                                                        echo 'selected';
                                                    }
                                                    ?> value="All">All</option>
                                                        <?php foreach ($packages as $package) { ?>
                                                        <option <?php
                                                        if ($tow == $package['id']) {
                                                            echo 'selected';
                                                        }
                                                        ?> value="<?php echo $package['id']; ?>"><?php echo $package['name']; ?></option> 
                                                        <?php }
                                                        ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Zone</label>
                                                <select class="form-control" name="zone_filter">
                                                    <option>Select Zone</option>
                                                    <option <?php
                                                    if ($zone == "All") {
                                                        echo "selected";
                                                    }
                                                    ?> value="All">All</option>
                                                    <option <?php
                                                    if ($zone == "NCR") {
                                                        echo "selected";
                                                    }
                                                    ?> value="NCR">NCR</option>
                                                    <option <?php
                                                    if ($zone == "South") {
                                                        echo "selected";
                                                    }
                                                    ?> value="South">South</option>
                                                    <option <?php
                                                    if ($zone == "Mumbai") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Mumbai">Mumbai</option>
                                                    <option <?php
                                                    if ($zone == "Pune") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Pune">Pune</option>
                                                    <option <?php
                                                    if ($zone == "Kolkata") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Kolkata">Kolkata</option>
                                                    <option <?php
                                                    if ($zone == "HO") {
                                                        echo "selected";
                                                    }
                                                    ?> value="HO">HO</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Financial Categorization</label>
                                                <select class="form-control" name="fc_filter">
                                                    <option>Select Financial Categorization</option>
                                                    <option <?php
                                                    if ($fc == "All") {
                                                        echo "selected";
                                                    }
                                                    ?> value="All">All</option>
                                                    <option <?php
                                                    if ($fc == "Very Large") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Very Large">Very Large</option>
                                                    <option <?php
                                                    if ($fc == "Large") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Large">Large</option>
                                                    <option <?php
                                                    if ($fc == "Medium") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Medium">Medium</option>
                                                    <option <?php
                                                    if ($fc == "Small") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Small">Small</option>
                                                    <option <?php
                                                    if ($fc == "Very Small") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Very Small">Very Small</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Score Type</label>
                                                <select class="form-control" name="score_filter">
                                                    <option>Select Score Type</option>
                                                    <option <?php
                                                    if ($scoretype == "All") {
                                                        echo "selected";
                                                    }
                                                    ?> value="All">All</option>
                                                    <option <?php
                                                    if ($scoretype == "PQ") {
                                                        echo "selected";
                                                    }
                                                    ?> value="PQ">PQ</option>
                                                    <option <?php
                                                    if ($scoretype == "Feedback") {
                                                        echo "selected";
                                                    }
                                                    ?> value="Feedback">Feedback</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-1" style="padding-top: 12px">
                                            <br>
                                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12">
                                <div class="box primary-gradient box-shadowed">
                                    <div class="box-body p-30">   

                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>SL No</th>
                                                        <th>Company Name</th>
                                                        <th>Financial Categorization</th>
                                                        <th>PQ Score</th>
                                                        <th>Feedback Score</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php if (!empty($mRecords)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        $mFc = "";
                                                        $mFeedbackScore = "";
                                                        foreach ($mRecords as $key => $mRecord) {
                                                            ?>

                                                            <?php if ($fc == $mRecord['financial_categorizarion'] || $fc == "All") { ?>
                                                                <tr>
                                                                    <td>
                                                                        <?php echo $mRecord['sl']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <a data-toggle="modal" data-target="#modal-right-record-<?php echo $mRecord['vendor_id']; ?>" href="#" class="btn btn-xs btn-primary">
                                                                            <?php echo $mRecord['company']; ?>
                                                                        </a>
                                                                        <div class="modal modal-right fade" id="modal-right-record-<?php echo $mRecord['vendor_id']; ?>" tabindex="-1">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title"><?php echo $mRecord['company']; ?></h5>
                                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        <div class="row">
                                                                                            <div class="col-md-4">
                                                                                                <h5>
                                                                                                    <b>
                                                                                                        Email :
                                                                                                    </b>
                                                                                                </h5>
                                                                                                <h5>
                                                                                                    <b>
                                                                                                        Phone :
                                                                                                    </b>
                                                                                                </h5>
                                                                                                <h5>
                                                                                                    <b>
                                                                                                        Location :
                                                                                                    </b>
                                                                                                </h5>
                                                                                            </div>
                                                                                            <div class="col-md-8">
                                                                                                <h5>
                                                                                                    <?php echo $mRecord['email']; ?>
                                                                                                </h5>
                                                                                                <h5>
                                                                                                    <?php echo $mRecord['contact_number']; ?>
                                                                                                </h5>
                                                                                                <h5>
                                                                                                    <?php echo $mRecord['location']; ?>
                                                                                                </h5>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer modal-footer-uniform">
                                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mRecord['financial_categorizarion']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($mRecord['fb_score'] == "-" || $mRecord['fb_score'] == "") { ?>
                                                                            <?php if ($scoretype == "PQ" || $scoretype == "All") { ?>
                                                                                <a target="_blank" href="<?php echo base_url('buyer/vendor/editPqcScore/' . $mRecord['pq_id'] . "/" . $mRecord['vendor_id']); ?>" class="btn btn-<?php
                                                                                if ($mRecord['pq_score'] >= 50) {
                                                                                    echo 'primary';
                                                                                } else {
                                                                                    echo 'danger';
                                                                                }
                                                                                ?> btn-block btn-xs mb-2">
                                                                                    View : <?php echo $mRecord['tow_name']; ?> </br> Score : <?php echo $mRecord['pq_score']; ?>
                                                                                </a>
                                                                            <?php } ?>
                                                                        <?php } else { ?>
                                                                            
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if ($mRecord['fb_score'] == "-") { ?>
                                                                            
                                                                        <?php } else { ?>
                                                                            <a href="#" class="btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#vendor_details_<?php echo $mRecord['vendor_id']; ?>">
                                                                                View : <?php echo $mRecord['tow_name']; ?> </br> <?php echo $mRecord['fb_score']; ?>
                                                                            </a>
                                                                            <div class="modal fade vendor_details_<?php echo $mRecord['vendor_id']; ?>" data-backdrop="false" id="vendor_details_<?php echo $mRecord['vendor_id']; ?>" tabindex="-1">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title text-bold">
                                                                                                <?php echo $mRecord['company']; ?>
                                                                                            </h5>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <div class="panel-body border border-info">
                                                                                                <div class="row">
                                                                                                    <div class="col-md-12">

                                                                                                        <table class="table">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th>
                                                                                                                        #
                                                                                                                    </th>
                                                                                                                    <th>
                                                                                                                        Q1
                                                                                                                    </th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
                                                                                                                <?php
                                                                                                                $mTotalScore = 0;
                                                                                                                foreach ($mRecord['fb_data'] as $key => $mFfRecord) {
                                                                                                                    $mTotalScore += $mFfRecord['ff_final_score'];
                                                                                                                    ?>
                                                                                                                    <tr>
                                                                                                                        <td>
                                                                                                                            <?php echo $mFfRecord['ff_project']; ?>
                                                                                                                        </td>

                                                                                                                        <td>
                                                                                                                            <?php echo $mFfRecord['ff_final_score']; ?>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                <?php } ?>
                                                                                                            </tbody>
                                                                                                            <tfoot>
                                                                                                                <tr>
                                                                                                                    <td colspan="1">
                                                                                                                        Total Score
                                                                                                                    </td>
                                                                                                                    <td colspan="1">
                                                                                                                        <b>
                                                                                                                            <?php echo $mTotalScore; ?>
                                                                                                                        </b>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td colspan="1">
                                                                                                                        Total Inputs
                                                                                                                    </td>
                                                                                                                    <td colspan="1">
                                                                                                                        <b>
                                                                                                                            <?php echo count($mFormRecord); ?>
                                                                                                                        </b>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td colspan="1">
                                                                                                                        Average Score
                                                                                                                    </td>
                                                                                                                    <td colspan="1">
                                                                                                                        <b>
                                                                                                                            <?php
                                                                                                                            echo $mFeedbackScore;
                                                                                                                            ?>
                                                                                                                        </b>
                                                                                                                    </td>
                                                                                                                </tr>
                                                                                                            </tfoot>
                                                                                                        </table>

                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="modal-footer modal-footer-uniform">
                                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $mRecord['date']; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php } ?>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
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

        <script type="text/javascript">
            function getSelectedPr(sel, selectedId) {
                if (confirm('Please confirm your selection')) {
                    var selectedPr = sel.value;
                    $.post("<?php echo base_url('buyer/vendor/transferFeedbackToPm'); ?>",
                            {
                                feedback_id: selectedId,
                                pm: selectedPr,
                            },
                            function (data, status) {
                                if (data == "1") {
                                    location.reload();
                                } else {
                                    alert("Something went wrong, Please try again later.");
                                }
                            });
                } else {
                    // Do nothing!
                    console.log('Thing was not saved to the database.');
                }
            }
        </script>

    </body>
</html>