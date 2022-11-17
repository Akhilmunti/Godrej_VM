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
                                    <h3 class="page-title br-0">Dealers Site Visit Report</h3>
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
                                    <form action="<?php echo base_url('home/insertSiteVisitReportProjectMgt'); ?>" method="POST">
                                        <div class="box-body pb-0">
                                            <div class="table-responsive">
                                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                NAME OF THE CONTRACTOR
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]" class="form-control">
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                NAME OF THE SITE VISTED
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]"  class="form-control">
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>
                                                                CATEGORY/TYPE/NATURE OF WORKS for PQ
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]"  class="form-control">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                NAME & DESIGNATION OF ASSESSOR 1
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]"  class="form-control">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                NAME & DESIGNATION OF ASSESSOR 2
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]"  class="form-control">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                NAME & DESIGNATION OF ASSESSOR 3
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]"  class="form-control">
                                                            </td>

                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                DATE OF VISIT
                                                            </td>
                                                            <td>
                                                                <input type="text" name="field[]"  class="form-control">
                                                            </td>

                                                        </tr>

                                                    </tbody>   
                                                </table>
                                            </div>  
                                            <br/> 
                                            <div class="table-responsive">
                                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>
                                                            <th>S.N.</th>
                                                            <th>CRITERIA</th>
                                                            <th colspan="2">Tick the most appropriate status (see the scores that'd result)</th>
                                                            <th>Provide qualifying remarks</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td rowspan="4">1</td>
                                                            <td rowspan="4">MOBILIZATION OF RESOURCES</td>
                                                            <td>All planned resources mobilized as per timelines</td>
                                                            <td>10</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>all resources mobilized but with some delay</td>
                                                            <td>7</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Shortfall in resources mobilized as well as timeline of mobilization</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>No mobilization plan in evidence</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">2</td>
                                                            <td rowspan="4">QUALITY OF HUMAN RESOURCES</td>
                                                            <td>Both the leadership and frontline staff well qualified and competent</td>
                                                            <td>30</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Leadership well qualified but shortfall in competence of number of frontline staff</td>
                                                            <td>20</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>A  mix of competent and ineffective employees at all level</td>
                                                            <td>10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Overall quality of human resource need improvement</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">3</td>
                                                            <td rowspan="4">QUALITY OF HUMAN RESOURCES</td>
                                                            <td>Both the leadership and frontline staff well qualified and competent</td>
                                                            <td>30</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Leadership well qualified but shortfall in competence of number of frontline staff</td>
                                                            <td>20</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>A  mix of competent and ineffective employees at all level</td>
                                                            <td>10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Overall quality of human resource need improvement</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">4</td>
                                                            <td rowspan="4">STATUS OF PROGRESS</td>
                                                            <td>Progress ahead of schedule</td>
                                                            <td>20</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Progress as per schedule with minor deviations</td>
                                                            <td>15</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Progress behind schedule but with effective catch up plan in evidence</td>
                                                            <td>10</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Progress behind schedule and  delay attributable to the PMC</td>
                                                            <td>0</td>
                                                        </tr>

                                                        <tr>
                                                            <td rowspan="4">5</td>
                                                            <td rowspan="4">QUALITY MANAGEMENT</td>
                                                            <td>Excellent control over quality of work with effective processes.</td>
                                                            <td>10</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Good QMS processes, but not well implemented as seen from product quality</td>
                                                            <td>7</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Product quality is good, but no evidence of robust QMS processes</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Bothe QMS processes and product quality require improvements</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">6</td>
                                                            <td rowspan="4">SAFETY MANAGEMENT</td>
                                                            <td>Effective Safety management system in place and excellent safety record</td>
                                                            <td>10</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Effective Occupational Health & Safety Management System in place and Occupational Health & Safety record is also good.</td>
                                                            <td>7</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Though the safety record is good, little evidence of proper safety management .</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Safety is fully client driven and the contractor is merely complying</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">7</td>
                                                            <td rowspan="4">FEEDBACK FROM CLIENT</td>
                                                            <td>Positive about most of the parameters</td>
                                                            <td>10</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Positive about some of the parameters</td>
                                                            <td>7</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Generally negative .</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Very negative about many parameters with specific inputs .</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td rowspan="4">8</td>
                                                            <td rowspan="4">FEEDBACK FROM CONTRACTORS</td>
                                                            <td>Positive about most of the parameters</td>
                                                            <td>10</td>
                                                            <td rowspan="4"><input type="text" name="provideQualifyingRemarks[]" class="form-control"></td>
                                                        </tr>
                                                        <tr> 
                                                            <td>Positive about some of the parameters</td>
                                                            <td>7</td> 
                                                        </tr>
                                                        <tr>
                                                            <td>Generally negative .</td>
                                                            <td>3</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Very negative about many parameters with specific inputs .</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Final score</td>
                                                            <td><input type="number" min="0" name="appropriateStatus[]" class="form-control"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2"></td>
                                                            <td>Final recommendations (GO / NOGO)</td>
                                                            <td><input type="number" min="0" name="appropriateStatus[]" class="form-control"></td>
                                                            <td></td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div> 
                                            <br/>
                                            <div class="table-responsive">
                                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                    <thead>
                                                        <tr>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>Sign of Assessor 1</td>
                                                            <td><input type="text" name="signOfAsessor1" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sign of Assessor 2</td>
                                                            <td><input type="text" name="signOfAsessor2" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sign of Assessor 3</td>
                                                            <td><input type="text" name="signOfAsessor3" class="form-control"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Remarks by Team</td>
                                                            <td>Subjective remarks to be filled by PM</td>
                                                        </tr>

                                                    </tbody>

                                                </table>
                                            </div>
                                            <br>

                                            <div class="text-xs-right" >
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