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
                            <div class="col-lg-6">
                                <h3>Draft NFA's</h3>
                            </div>
                            <!-- <div class="col-lg-6 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div> -->
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">
									<?php $this->load->view('buyer/partials/alerts'); ?>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                    <th>Sl. No</th>
													<th>ENFA No.</th>
                                                    <th>Subject</th>
                                                    <th>Contractor</th>
                                                    <th>Package</th>
                                                  
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class='text-center'>
											    <?php if (!empty($records)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($records as $key => $record) {
                                                            $mCount++;
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
                                                        <p><?php echo $record['contractor_name']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['package_name']; ?></p>
                                                    </td>
                                                    <td>
														<!--<a href="#" data-toggle="modal" data-target="#modal-right">
                                                            <button type="button" class="btn btn-primary rounded border-secondary font-weight-bold mr-5">NFA Actions</button> -->
                                                        </a>
                                                        <a href="<?php echo base_url('nfa/LdWaiver/view/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                        </a>
														
                                                        <a href="<?php echo base_url('nfa/ldWaiver/actionEdit/' . $record['id']); ?>">
                                                            <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                        </a>
														<a href="<?php echo base_url('nfa/LdWaiver/cancel/'.$record['id']); ?>">
                                                                    <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Cancel</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                
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
                                <a href="<?php echo base_url('nfa/LdWaiver/approve'); ?>">
                                    <div class="box primary-gradient">
                                        <div class="box-body p-10 text-center text-white ">
                                            <h3>
                                                Approve NFA
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
                            </div> -->
                            <div class="col-md-12">
                                <a href="<?php echo base_url('nfa/LdWaiver/return_nfa'); ?>">
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
                                <a href="<?php echo base_url('nfa/LdWaiver/return_text'); ?>">
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
        </div> <?php */?>
        <!-- /.modal -->

    </div>

    <!-- ./wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

</body>

</html>