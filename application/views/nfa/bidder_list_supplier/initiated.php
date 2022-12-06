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
                                <h3 class="page-title br-0">Current NFA's  - Short Listing Approval For Supplier</h3>
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
                                                    <th>Budget With Escalation</th>
                                                    <th>NFA Status</th>
                                                   
                                                    <th>Actions</th>
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
																$preChkRecords = $CI->nfaAction->chkPreApproved($salient_id,$approver_level,"bidder_supplier");
															else
																$preChkRecords=1;
															//$CI->model_name->method_name();
                                                            ?>
                                                <tr>
                                                    <td>
                                                        <p> <?php echo $mCount; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['version_id']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['subject']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['budget_with_escalation']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p>Pending</p>
                                                    </td>
                                                    <td>
                                                     <?php if($preChkRecords==1)
													{	
													?>    
                                                       <!-- <a href="#" data-toggle="modal" data-target="#modal-right<?php //echo $record['id']?>">
                                                            <button type="button" class="btn btn-primary rounded border-secondary font-weight-bold mr-5 buttonPadding">NFA Actions</button>
                                                        </a> -->
														<?php 
													}
													?>
                                                       <a href="<?php echo base_url('nfa/BidderListSupplier/view_nfa/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-success rounded buttonPadding">View</button>
                                                        </a>
                                                      
                                                    </td>
                                                </tr><div class="modal modal-right fade" id="modal-right<?php echo $record['id']?>" tabindex="-1">
												<?php 
		$data['mId']=$record['id'];
		$data['title']="Short Listing Approval For Supplier";
		$data['url']="nfa/BidderListSupplier";
		//$this->load->vars($mid);
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
		<?php 
		//$data['mId']=$record['id'];
		
		//$this->load->view('nfa/nfa_actions',$data); ?>
		        <!-- Modal -->
        <?php /*<div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            LD Waiver
                        </h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
						
                            <div class="col-md-12">
                                <a href="<?php echo base_url('nfa/LdWaiver/approve/'.$record['id']); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Approve NFA1
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
						
                            <div class="col-md-12">
                                <a href="<?php echo base_url('nfa/LdWaiver/cancel'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Cancel NFA
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!--<div class="col-md-12">
                                <a href="">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Transfer NFA
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
							-->
                            <div class="col-md-12">
                                <a href="<?php echo base_url('nfa/LdWaiver/return'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Return NFA
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-12">
                                <a href="<?php echo base_url('nfa/LdWaiver/return_text/'.$record['id']); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Return with Text Correction
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- <div class="col-md-12">
                                <a href="">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Esign NFA
                                            </h3>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div> */?>
        <!-- /.modal -->

    </div>

    <!-- ./wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

</body>

</html>
<script type="text/javascript" src="<?php echo base_url('assets/'); ?>js/nfa_scripts.js" ></script>