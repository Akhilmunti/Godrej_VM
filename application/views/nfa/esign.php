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

                <style>
                    .primary-gradient {
                        background-color: #2a2a72;
                        background-image: linear-gradient(315deg, #2a2a72 0%, #009ffd 74%);
                    }
                </style>

                <!-- Main content -->

                <section class="content">

                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="page-title br-0">E-Signed NFA </h3>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">

                            <table class="table rs-table-bordered">
                                <tbody>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Subject</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Contractor</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Package</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Awarded Towers / Scope</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Award Date / NTP</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Completion Date</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Revised Completion Date</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Latest Average Feedback Score</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Original Contract Value</td>
                                        <td>Lorem</td>
                                    </tr>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Last approved Amended Contract Value</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Total value of Work Done Till Date</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Applicable LD Amount</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Reason for LD Waiver</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Description Background</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Delay due to Contractor</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Delay due to Company</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Delay due to other reasons (beyond the control of Contractors/Company)</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Impact on OC/Handover Timelines</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Is LD applicable</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">In case of No Please specify reason</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Recommendations</td>
                                        <td>Lorem</td>
                                    </tr>

                                    <tr>
                                        <td class='font-weight-bold col-2' style="width: 350px;" rowspan="3">Attachments</td>
                                        <td>
                                            <button type="button" class="btn btn-secondary rounded">Download</button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 1 (File Name: Lorem Statement)</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-secondary rounded">Download</button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 2 (File Name: Lorem Statement)</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <button type="button" class="btn btn-secondary rounded">Download</button>
                                            <span class='ml-3 font-weight-bold'>Attachments - 3 (File Name: Lorem Statement)</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Level 1 Approver</td>
                                        <td>Nanda Kumar - pending(L1)</td>
                                    </tr>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Level 2 Approver</td>
                                        <td>Sanmitha - pending(L2)</td>
                                    </tr>

                                </tbody>
                            </table>
                            <div class="row mt-4">
                                <div class="col-lg-12 text-center">
                                    <a href="#" data-toggle="modal" data-target="#modal-right">
                                        <button type="button" class="btn btn-primary border-secondary rounded font-weight-bold w-300">Print NFA</button>
                                    </a>
                                </div>
                            </div>


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