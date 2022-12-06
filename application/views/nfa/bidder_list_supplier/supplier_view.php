<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<style>
    table.rs-table-bordered {
        border: 1px solid grey;
        margin-top: 20px;
    }

    table.rs-table-bordered>thead>tr>th {
        border: 1px solid grey;
    }

    table.rs-table-bordered>tbody>tr>td {
        border: 1px solid grey;
    }
    .table-view{
        border: 1.5px solid grey;
        padding: 10px;
    }

    .paddingLine {
        padding: 20px 10px;
        border: 1.5px solid grey;
    }

    .hr-bold-line {
        border: 1px solid gray;
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
                        <div class="row">
                            <div class="col-lg-9">
                                <h3>View NFA - Short Listing Approval For Supplier</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">
                        

                            <div class="paddingLine mt-4">
                                
                                <h5>
                                    <span class="font-weight-bold">ENFA NO</span> : <span class="font-size-14"><?php echo $mRecord['version_id']; ?></span>
                                </h5>
                               
                                <hr class='hr-bold-line' />
                                
                                <h5>
                                    <span class="font-weight-bold">Initiator</span> : <span class="font-size-14"><?php echo $mRecord['buyer_name']; ?></span>
                                </h5>
                              
                                <hr class='hr-bold-line' />

                                <h5 style="margin-bottom: -2px;">
                                    <span class="font-weight-bold">Subject</span> : <span class="font-size-14"><?php echo strip_tags($mRecordBidSupplier['subject']); ?></span>
                                </h5>

                            </div>

                            <div class="row mt-4">
                              
                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Budget With Escalation</td>
                                                <td>  <?php echo $mRecordBidSupplier['budget_with_escalation'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Budget Without Escalation</td>
                                                <td>  <?php echo $mRecordBidSupplier['budget_without_escalation'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Material Name</td>
                                                <td>  <?php echo $mRecordBidSupplier['material_name'] ?></td>
                                            </tr>

                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Is HO approval required</td>
                                                <td>  <?php echo $mRecordBidSupplier['ho_approval'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Award Strategy</td>
                                                <td>  <?php echo $mRecordBidSupplier['award_strategy'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Proposed Bidderlist for the Subject Works</h5>
                            </div>

                            <div class="table-responsive ">
                                <table class="table rs-table-bordered mb-0" id="t1">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th>Sl. No.</th>
                                            <th>Name of Contractor</th>
                                            <th>PQ/Feedback Score</th>
                                            <th>Bidder’s Category</th>
                                            <th>On-going/Completed</th>
                                        </tr>
                                    </thead>
                                    <tbody id="">

                                    <?php foreach ($mRecordSubWorks as $key => $val) { 
                                            $slNo  = $key + 1;
                                            $name_contractor = $val->name_contractor;                          
                                            $score = $val->feedback_score;
                                            $bid_category = $val->bid_category;
                                            $ongoing_complete_project = $val->ongoing_complete_project;
                                        ?>
                                        <tr>
                                            <td><?php echo $slNo ?></td>
                                            <td><?php echo $name_contractor ?></td>
                                            <td><?php echo $score ?></td>
                                            <td><?php echo $bid_category ?></td>
                                            <td><?php echo $ongoing_complete_project ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
							
                            <div class="d-block mt-4">
                                <h5 class="page-title br-0 font-weight-bold">Award Efficiency</h5>
                            </div>

                            <div class="table-responsive">

                                <table class="table rs-table-bordered mb-0">
                                    <thead class="bg-primary">
                                        <tr class='text-center'>
                                            <th style="width: 15%;">Actitivity</th>
                                            <th style="width: 20%;">Receipt of Tender Document</th>
                                            <th style="width: 20%;">Start date of Bidder List approval</th>
                                            <th style="width: 20%;">Finish date Approval of Award Recommendation</th>
                                            <th style="width: 25%;">Remarks (If any)</th>
                                        </tr>
                                    </thead>
                                    <tbody id="bidderList">
                                        <tr class='text-center'>
                                            <td>Date</td>
                                                <td>
                                                    <?php echo $mRecordBidSupplier['receipt_date']; ?>
                                                </td>
                                                
                                                <td>
                                                    <?php echo $mRecordBidSupplier['bidder_approval_date']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $mRecordBidSupplier['award_recomm_date']; ?>
                                                </td>

                                                <td>
                                                    <?php echo $mRecordBidSupplier['remarks_date']; ?>
                                                </td>
                                        </tr>
                                        <tr class='text-center'>
                                            <td>No of Days</td>
                                            <td>
                                            <?php echo $mRecordBidSupplier['receipt_days']; ?> 
                                            </td>
                                            <td>
                                            <?php echo $mRecordBidSupplier['bidder_approval_days']; ?>

                                            </td>
                                            <td>
                                            <?php echo $mRecordBidSupplier['award_recomm_days']; ?>

                                            </td>
                                            <td>
                                            <?php echo $mRecordBidSupplier ['remarks_days'];?>
 
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                            <div class="row mt-4">

                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">
                                                Background / Description
                                                </td>
                                                <td>
                                                    <?php echo $mRecordBidSupplier['background_description'];?>

                                                </td>
                                            </tr>
											 <tr>
                                                <td class="font-weight-bold" style="width: 40%;">
                                                    PCM
                                                </td>
                                                <td>
                                                <?php echo $mRecord['buyer_name']; ?>
                                                </td>
                                                
                                            </tr>
											
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-4">
                            <?php 

                                $mSessionRole = $this->session->userdata('session_role');

                               if ($mSessionRole != "PCM" && $pgType != 'A' && $pgType != 'C' && $pgType != 'E' && $preChkRecords == 1) {
												
                                    $data['mId']=$mRecord['id'];
                                    $data['title']=" Bidder List for Supplier";
                                    $data['url']="nfa/BidderListSupplier";
                                    
                                    $this->load->view('nfa/nfa_actions',$data); 
                                                
                               } 
                               if ($pgType == 'E') {?>
                                    
                                        <div class="row mt-4">
                                            <div class="col-lg-12 text-center" style="margin-left:190px">
                                                <a href="<?php echo base_url('nfa/BidderListSupplierEsign/esignedPdf/' . $mId . "/E"); ?>" target="_blank">
                                                    <button type="button" class="btn btn-primary border-secondary rounded font-weight-bold w-300">Print NFA</button>
                                                </a>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                            </div>

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

    <!-- ./wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>


</body>

</html>