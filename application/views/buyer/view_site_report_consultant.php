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
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">Consultant Site Visit Report</h3>
                                </div>
                                <div class="col-md-6 text-right">
<!--                                    <a href="<?php echo base_url('buyer/users/actionAdd'); ?>" class="btn btn-primary">Add User</a>-->
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <form action="<?php echo base_url('buyer/vendor/actionSaveSvcon/' . $mVendorData['id']); ?>" method="POST">
                                        <div class="box-body pb-0">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover display nowrap margin-top-10 w-p100" border="1px">
                                                    <thead>
                                                        <tr>
                                                            <th>PROJECT NAME:</th>
                                                            <th rowspan="2"><input name="csvr_project_name" type="text" name="projectName" class="form-control"></th>
                                                            <th>DATE</th>
                                                            <th colspan="2"><input name="csvr_date" type="date" name="date" class="form-control"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>TITLE :</td>
                                                            <td colspan="2">CHECKLIST FOR CONSULTANTD PRE-QUALIFICATION (PQ)</td>
                                                            <td >CHECKED</td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SL NO</td>
                                                            <td>DESCRIPTION</td>
                                                            <td> CONSULTANT</td>
                                                            <td>WEIGHTAGE(%)</td>
                                                            <td>RATING (%)</td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Competence and relevant experience of Team members for proposed project</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>15</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>Number of projects currently handled by proposed team lead and total team strength</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>Timeline adherence proof, if available any</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>Quality check process, Analysis and drawing check or checklist</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>15</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Standard documents templates</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>6</td>
                                                            <td>Sample drawing made in revit models</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>7</td>
                                                            <td>Sample drawing for any live project</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>8</td>
                                                            <td>Attrition rate of employee</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>9</td>
                                                            <td>Any one past example on value engineering.</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>10</td>
                                                            <td>Handling of coordination and architectural changes for ongoing projects .</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>11</td>
                                                            <td>Minimum drafting standard as per GPL Scope of services </td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>12</td>
                                                            <td>Value engineering on peer review projects .</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>13</td>
                                                            <td>Sample peer review reports or format .</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>14</td>
                                                            <td>Project with new revised codes in any</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>5</td>
                                                            <td>Site support during Project execution</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>15</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>16</td>
                                                            <td>General</td>
                                                            <td><input type="text" name="consultant[]" class="form-control"></td>
                                                            <td>5</td>
                                                            <td><input type="number" name="rating[]" class="form-control" min="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3">
                                                                <b>
                                                                    Total
                                                                </b>
                                                            </td>
                                                            <td colspan="2">
                                                                <b>
                                                                    100
                                                                </b>
                                                            </td>
                                                        </tr>
                                                    </tbody> 
                                                </table>
                                            </div>
                                            <div class="box-footer" style="float: right">
                                                <button type="submit" class="btn btn-primary subbutton btn-info">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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