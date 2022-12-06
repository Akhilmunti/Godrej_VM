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
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>View NFA Logs</h3>
                            </div>
                            <div class="col-lg-6 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">

                            <table class="table rs-table-bordered">
                                <tbody>

                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">ENFA NO</tds>
                                        <td>Lorem</td>
                                    </tr>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Subject</td>
                                        <td>Lorem</td>
                                    </tr>
                                    <tr>
                                        <td class='font-weight-bold' style="width: 350px;">Contractor</td>
                                        <td>Lorem</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 1 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 2 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 3 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 4 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 5 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 6 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 7 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 8 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 9 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                    <tr>
                                        <td class="font-weight-bold" style="width: 40%;">Level 10 Approver</td>
                                        <td>Approval Pending</td>
                                    </tr>
                                </tbody>
                            </table>
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
        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right<?php echo $record['id'] ?>" tabindex="-1">
            <?php
            $data['mId'] = $mRecord['id'];
            $data['mSessionRole'] = $mSessionRole;
            //$this->load->vars($mid);
            $this->load->view('nfa/nfa_actions', $data); ?>
        </div>


    </div>
    <!-- Wrapper -->



    <?php $this->load->view('buyer/partials/scripts'); ?>

</body>

</html>