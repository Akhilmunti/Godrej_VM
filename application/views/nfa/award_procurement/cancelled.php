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

                <!-- Main content -->

                <section class="content">

                    <!-- Content Header (Page header) -->

                    <div class="content-header">
                        <div class="row">
                            <div class="col-md-9">
                                <h3 class="page-title br-0">Cancelled NFA's</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">
									<?php $this->load->view('buyer/partials/alerts');

									$selUrl =   base_url('nfa/Award_procurement/cancelled_nfa');
									
									//echo $current_page = $config['base_url'].$_SERVER['REDIRECT_QUERY_STRING'];
									$current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
									if($current_page==$selUrl)
										$selOption="selected";
									else
										$selOption="";
									
									?>
									<div class="row">
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label>NFA Type</label>
												<?php echo $nfa_select;?>
                                                <?php /*<select id="nfaType" name="nfaType" required="" class="form-control">
                                                    <option value="">Select NFA Type</option>
                                                    <option value="">Short Listing Approval For Contractor</option>
                                                    <option value="">Short Listing Approval For Supplier</option>
                                                    <option value="<?php echo base_url('nfa/Award_contract/award_recomm_contract_list')?>">Award Recommendation for Contracts</option>
                                                    <option value="<?php echo base_url('nfa/Award_procurement/cancelled_nfa')?>">Award Recommendation for Procurement</option> 
                                                    <option value="">Amendment in Contract</option>
                                                    <option value="">Descoping IOM</option>
                                                    <option value="">Termination IOM</option>
                                                    <option value="">BG Encashment</option>
                                                    <option value="<?php echo base_url('nfa/LdWaiver')?>">LD Waiver</option>
                                                    <option value="">Contractual Deviations</option>
                                                </select> <?php */?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                     <th>Sl. No</th>
													<th>ENFA No.</th>
                                                    <th>Subject</th>
                                                    <th>Award Synopsis </th>
                                                    <th>NFA Status</th>
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
                                                        <p><?php echo $mCount; ?></p>
                                                    </td>
                                                     <td>
                                                        <p><?php echo $record['version_id']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['subject']; ?></p>
                                                    </td>
                                                     <td>
                                                        <p><?php echo $record['synopsis_label']; ?></p>
                                                    </td>
                                                     <td>
                                                        <p>Cancelled</p>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('nfa/Award_procurement/view_nfa/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                        </a>
                                                       
                                                    </td>
                                                </tr>
                                               
											  <?php } 
											 }
											  ?>

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