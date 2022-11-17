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
                                    <h3 class="page-title br-0">Feedback Management</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <b>
                                                    <?php echo $records[0]['porg_project']; ?>
                                                </b>
                                            </div>
                                            <div class="col-md-6">
                                                <select onchange="getSelectedZone(this.value, <?php echo $feedback['feedback_purchase'] ?>);" style="width: 200px" class="form-control form-control-sm float-right" name="zone">
                                                    <option>Select</option>
                                                    <option value="1" <?php
                                                    if ($zone == "1") {
                                                        echo 'selected';
                                                    }
                                                    ?>>Pan India</option>
                                                    <option value="2" <?php
                                                    if ($zone == "2") {
                                                        echo 'selected';
                                                    }
                                                    ?>>NCR</option>
                                                    <option value="3" <?php
                                                    if ($zone == "3") {
                                                        echo 'selected';
                                                    }
                                                    ?>>Mumbai</option>
                                                    <option value="4" <?php
                                                    if ($zone == "4") {
                                                        echo 'selected';
                                                    }
                                                    ?>>Pune</option>
                                                    <option value="5" <?php
                                                    if ($zone == "5") {
                                                        echo 'selected';
                                                    }
                                                    ?>>South</option>
                                                    <option value="6" <?php
                                                    if ($zone == "6") {
                                                        echo 'selected';
                                                    }
                                                    ?>>East</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12">
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <?php if (!empty($records)) { ?>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>
                                                                #
                                                            </th>
                                                            <th>
                                                                Q1 (2022)
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <?php
                                                        $mTotalScore = 0;
                                                        foreach ($records as $key => $mFfRecord) {
                                                            $mTotalScore += $mFfRecord['ff_final_score'];
                                                            $mData = $this->feedback->getParentByKey($mFfRecord['feedback_id']);
                                                            ?>
                                                            <tr>
                                                                <td>
                                                                    Project : <?php echo $mFfRecord['ff_project'] . "/" . $mData['feedback_wo']; ?>
                                                                </td>

                                                                <td>
                                                                    <?php echo $mFfRecord['ff_final_score']; ?>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td colspan="1">
                                                                Total Score
                                                            </td>
                                                            <td colspan="1">
                                                                <b>
                                                                    <?php echo $mTotalScore; ?>
                                                                </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1">
                                                                Total Inputs
                                                            </td>
                                                            <td colspan="1">
                                                                <b>
                                                                    <?php echo count($records); ?>
                                                                </b>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="1">
                                                                Average Score
                                                            </td>
                                                            <td colspan="1">
                                                                <b>
                                                                    <?php
                                                                    echo $mTotalScore / count($records);
                                                                    ?>
                                                                </b>
                                                            </td>
                                                        </tr>
                                                    </tfoot>

                                                </table>
                                            <?php } ?>
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

        <script>
            function getSelectedZone(sel, sel2) {
                if (sel && sel2) {
                    window.location = "<?php echo base_url('buyer/vendor/filterFeedback/'); ?>" + sel + "/" + sel2; // redirect
                }
            }
        </script>

    </body>
</html>