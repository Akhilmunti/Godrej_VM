<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

    <style>
        .buttonPadding {
            padding: 7px;
            font-size: 13px;
        }
    </style>

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
                            <div class="col-md-6">
                                <h3 class="page-title br-0">Returned NFA's</h3>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display margin-top-10 w-p100">
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
                                                        <a href="<?php echo base_url('nfa/LdWaiver/view/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                        </a>
                                                        <a href="<?php echo base_url('nfa/LdWaiver/actionEdit/' . $record['id']."/RF"); ?>">
                                                            <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Refloat</button>
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

    </div>

    <!-- ./wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>

</body>

</html>