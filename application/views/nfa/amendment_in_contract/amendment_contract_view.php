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

    .table-view {
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

                <style>
                    .primary-gradient {
                        background-color: #2a2a72;
                        background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                    }
                </style>

                <!-- Main content -->

                <section class="content">

                    <!-- Content Header (Page header) -->

                    <div class="content-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3>View NFA - Amendment in Contract</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">

                        <div class="box-body">
							 <div class="row mt-4">
									<?php
									$mSessionRole = $this->session->userdata('session_role');
									$upload_path = $this->config->item('upload_path'); 
									if ($mSessionRole != "PCM" && $pgType != 'A' && $pgType != 'C' && $pgType != 'E' && $preChkRecords == 1) { ?>
										<div class="col-lg-12 text-right">
											<a href="#" data-toggle="modal" data-target="#modal-right">
												<button type="button" class="btn btn-primary border-secondary rounded font-weight-bold">NFA Actions</button>
											</a>
										</div>
									<?php } ?>

								 
								</div>
							

                            <div class="paddingLine mt-4">

                                <h5>
                                    <span class="font-weight-bold">ENFA NO</span> : <span class="font-size-14"><?php echo $mRecord['version_id']; ?></span>
                                </h5>

                                <hr class='hr-bold-line' />

                                <h5>
                                    <span class="font-weight-bold">Initiator</span> : <span class="font-size-14"><?php echo $mRecord['buyer_name']; ?></span>
                                </h5>

                            </div>

                            <div class="row mt-4">
                                <?php
                                $mSessionRole = $this->session->userdata('session_role');
                                //echo $preChkRecords;
                               /*if ($mSessionRole != "PCM" && $pgType != 'A' && $pgType != 'C' && $pgType != 'E' && $preChkRecords == 1) { ?>
                                    <div class="col-lg-12 text-right">
                                        <a href="#" data-toggle="modal" data-target="#modal-right">
                                            <button type="button" class="btn btn-primary border-secondary rounded font-weight-bold">NFA Actions</button>
                                        </a>
                                    </div>
                                <?php } */ ?>
                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Zone / Project Name</td>
                                                <td><?php echo $mRecord['project_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Package Name</td>
                                                <td><?php echo $mRecord['package_name'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">Contractor name</td>
                                                <td><?php echo $mRecord['contractor_name'] ?></td>
                                            </tr>

                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Awarded Towers / Scope</td>
                                                <td><?php echo $mRecord['awarded_towers'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Award Date / NTP</td>
                                                <td><?php echo $mRecord['award_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Completion Date (As per original Contract)</td>
                                                <td><?php echo $mRecord['completion_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Revised Completion Date (As per approved EOT)</td>
                                                <td><?php echo $mRecord['revised_completion_date'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Original Awarded Value</td>
                                                <td><?php echo $mRecord['original_award_value'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Last approved Amended Contract Value</td>
                                                <td><?php echo $mRecord['last_approved_value'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Proposed value of Amendments (in crores)</td>
                                                <td><?php echo $mRecord['proposed_value_amendment'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Proposed Amendment no.</td>
                                                <td><?php echo $mRecord['proposed_amendment_no'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Revised value of Contract post this amendment (cr)</td>
                                                <td><?php echo $mRecord['revised_value_contract'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">Reason for Amendment</td>
                                                <td><?php echo $mRecord['reason_amendment'] ?></td>
                                            </tr>
                                            <tr>
                                                <td class='font-weight-bold' style="width: 350px;">History /Background</td>
                                                <td><?php echo $mRecord['history'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Bifurcation of Proposed value of Amendments (in crores).</h5>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">

                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th>#</th>
                                                    <th style="width:30%">Heads</th>
                                                    <th style="width:30%">In This Proposed amendment</th>
                                                    <th style="width:30%">Cumulative in Cr (and %age change wrt original contract Value)</th>
                                                </tr>
                                            </thead>
                                            <tbody id="bidderList">
                                                <tr>
                                                    <th>1</th>
                                                    <td>A. Extra Item</td>
                                                    <td><?php echo $mRecord['extra_item_proposed'] ?></td>
                                                    <td><?php echo $mRecord['extra_iem_cumulative'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>2</th>
                                                    <td>B. Scope Change(addition/Deletion)</td>
                                                    <td><?php echo $mRecord['scope_change_proposed'] ?></td>
                                                    <td><?php echo $mRecord['scope_change_cumulative'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>3</th>
                                                    <td>C. Qty Variation</td>
                                                    <td><?php echo $mRecord['qty_variation_proposed'] ?></td>
                                                    <td><?php echo $mRecord['qty_variation_cumulative'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>4</th>
                                                    <td>Total (A+B+C)</td>
                                                    <td><?php echo $mRecord['total_proposed'] ?></td>
                                                    <td><?php echo $mRecord['total_cumulative'] ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <table class="table rs-table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="font-weight-bold" style="width: 40%;">PCM</td>
                                                <td><?php echo $mRecord['buyer_name']; ?></td>
                                            </tr>
                                             <?php
											 if($mSessionRole!='PCM')
											 {
												
												$this->load->view('nfa/view_approvers_details');
											 }

                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
						<div class="modal modal-right fade" id="modal-right" tabindex="-1">
												<?php 
												//print_r($mRecord);
							$data['mId']=$mRecord['id'];
							$data['title']="Amendmentin Contract";
							$data['url']="nfa/amendment_in_contract";
							
							$this->load->view('nfa/nfa_actions',$data); ?></div>
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