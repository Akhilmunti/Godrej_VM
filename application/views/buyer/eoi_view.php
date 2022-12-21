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
                                    <h3 class="page-title br-0">EOI Details</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default border-primary">
                                    <div class="box-body pb-0">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <div class="table-responsive">
                                            <?php //print_r($mRecord); ?>
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <th colspan="2" class="bg-primary">
                                                            <span class="text-uppercase" style="font-size: 17px">
                                                                Project Details
                                                            </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Vendor Selected : 
                                                        </td>
                                                        <td>
                                                            <?php $mVendors = json_decode($mRecord['eoi_vendors_selected']); ?>
                                                            <?php 
                                                            foreach ($mVendors as $key => $value) {
                                                                $mVendor = $this->vendor->getParentByKey($value);
                                                                ?>
                                                                <span class="badge badge-primary"><?php echo $mVendor['company_name']; ?></span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Project Name : 
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['project_name']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Project Location :
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['project_zone']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">

                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="bg-primary">
                                                            <span class="text-uppercase" style="font-size: 17px">
                                                                Scope of Work 
                                                            </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Scope of Work :
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_scope']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">

                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="bg-primary">
                                                            <span class="text-uppercase" style="font-size: 17px">
                                                                Configuration Details 
                                                            </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Project Configuration :
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_configuration']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Total BUA (in sq. ft) :
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_total_bua']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">

                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" class="bg-primary">
                                                            <span class="text-uppercase" style="font-size: 17px">
                                                                Contractual Details 
                                                            </span>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Type of Contract :
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_toc']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Contract Period (In Months):
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_schedule']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Basic Rate Items :
                                                        </td>
                                                        <td>
                                                            <?php $mBasics = json_decode($mRecord['eoi_bri']); ?>

                                                            <?php foreach ($mBasics as $key => $value) { ?>
                                                                <span class="badge badge-primary"><?php echo $value; ?></span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Free Issue Items:
                                                        </td>
                                                        <td>
                                                            <?php $mFree = json_decode($mRecord['eoi_fii']); ?>
                                                            
                                                            <?php foreach ($mFree as $key => $value) { ?>
                                                                <span class="badge badge-primary"><?php echo $value; ?></span>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Performance Deposit:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_pd']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Water:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_water']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Electricity:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_electicity']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Labour Accommodation:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_labour']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Defects Liability Period:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_dlp']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Deposit against DLP:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_dadlp']; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Others:
                                                        </td>
                                                        <td>
                                                            <?php echo $mRecord['eoi_others']; ?>
                                                        </td>
                                                    </tr>
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