<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<style>
    .buttonPadding {
        padding: 7px;
        font-size: 13px;
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
                            <div class="col-md-9">
                                <h3 class="page-title br-0">Current NFA's  - Award Recommendation for Contracts</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">
									<?php $this->load->view('buyer/partials/alerts'); ?>
									<div class="row">
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label>NFA Type</label>
												<?php echo $nfa_select;?>
                                             
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                    <th>Sl. No</th>
													<th>ENFA No.</th>
                                                    <th>Subject</th>
                                                    <th>Award Synopsis</th>
                                                    <th>NFA Status</th>
                                                   
                                                    <th style="width:25% !important;">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class='text-center'>
											 <?php if (!empty($records)) { ?>

                                                        <?php
														$CI =& get_instance();
														
                                                        $mCount = 0;
                                                        foreach ($records as $key => $record) {
                                                            $mCount++;
															$approver_level = $record['approver_level'];
															$salient_id = $record['id'];
															if($approver_level>1)
																$preChkRecords = $CI->nfaAction->chkPreApproved($salient_id,$approver_level,"award_contract");
															else
																$preChkRecords=1;
															
                                                            ?>
                                                <tr>
                                                    <td>
                                                        <p> <?php echo $mCount; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['version_id']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo strip_tags($record['subject']); ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['synopsis_label']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p>Pending</p>
                                                    </td>
                                                    <td>
                                                
                                                       <a href="<?php echo base_url('nfa/Award_contract/view_nfa/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-success rounded buttonPadding">View</button>
                                                        </a>
                                                      
                                                    </td>
                                                </tr><div class="modal modal-right fade" id="modal-right<?php echo $record['id']?>" tabindex="-1">
												<?php 
		$data['mId']=$record['id'];
		$data['title']="Award Recommendation for Contracts";
		$data['url']="nfa/Award_contract";
		
		$this->load->view('nfa/nfa_actions',$data); ?></div>
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

</body>

</html>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js" ></script>