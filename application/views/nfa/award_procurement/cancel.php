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

                    <div class="content-header">
                        <div class="row">
                            <div class="col-lg-9">
                                <h3 class="page-title br-0">Cancel IOM - Award Recommendation Procurement</h3>
                            </div>
                            <div class="col-lg-3 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
						<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/Award_procurement/actionCancelNfa/'. $mRecord['id']); ?>" >
                           <table class="table rs-table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">ENFA NO</th>
                                        <th scope="col">IOM Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;"><?php echo $mRecord['version_id']; ?></td>
                                        <td>
                                            <?php foreach($mRecordApprovers as $key => $record) {
										
                                                    echo $record['buyer_name']; ?> -<?php echo ($record['approved_status']==0) ? "Pending" : "Approved"; 
                                                    echo "(Level - ".$record['approver_level'].")<br>";
										 }?></td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="d-block mt-4 mb-4">
                                <h5 class="page-title br-0 font-weight-bold">Cancel IOM with Remarks(Optional)</h5>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class='form-group'>
                                        <label>Logic Note</label>
                                        <input type="text" class="form-control h-50" placeholder="" name="cancelled_remarks">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-right">
                                    <a href="<?php echo base_url('nfa/Award_procurement/list'); ?>">
                                        <button type="submit" class="btn btn-primary border-secondary font-weight-bold" name="cancel_remarks">Cancel IOM</button>
                                    </a>
                                </div>
                            </div>
						</form>
                        </div>
                    </div>

                </section>

                <!-- Maincontent -->

            </div>

        </div>

        <!-- Content-wrapper -->
        <?php $this->load->view('buyer/partials/footer'); ?>

        <!-- Control Sidebar -->
        <?php $this->load->view('buyer/partials/control'); ?>
        <!-- Control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- Wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

</body>

</html>