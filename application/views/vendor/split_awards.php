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
                                    <h3 class="page-title br-0">
                                        Bid Management - Comparisons
                                    </h3>
                                </div>
                                <div class="col-md-6 text-right">
                                    <span class="mr-3"><?php echo $project['project_name']; ?> / Contracts / <?php echo $tow['name']; ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <div class="row">  
                                            <div class="col-md-12" id="dvExcel" style="overflow-x: scroll">
                                                <table class="table table-bordered table-template" border="1">
                                                    <tbody>
                                                        <tr>
                                                            <th class="bg-primary">Part No</th>
                                                            <th class="bg-primary">Specification</th>
                                                            <th class="bg-primary">Location</th>
                                                            <th class="bg-primary">Unit</th>
                                                            <th class="bg-primary">Basement</th>
                                                            <th class="bg-primary">Tower A</th>
                                                            <th class="bg-primary">Tower B</th>
                                                            <th class="bg-primary">Tower c</th>
                                                            <th class="bg-primary">Total Quantity</th>
                                                            <th class="bg-primary">Rate</th>
                                                            <th class="bg-primary">Amount in INR</th>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <b>1</b>
                                                            </td>
                                                            <td><b>Plaster</b></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td><b>1.1</b></td>
                                                            <td style="min-width: 400px">
                                                                <b>Providing &amp; Applying Gypsum plaster of GPL approved make on wall surfaces of average 10mm thk and finishing in line and level with neat and smooth surfaces free of undulations, cracks, leveling marks etc or any other deformities arising out of poor workmanship. Rate to include ceiling corner Gypsum plaster of 4 to 5mm thickness at Wall-Ceiling Junction for a width of 300mm, Surface Preparation, filling cracks in the background if any, surface cleaning, applicationg of Bondit++ or equivalent approved make, curing (if required), 5mmx5mm Fiber Mesh of 150 mm wide with lapping of 75mm 145 GSM,  of Saint Gobain or equivalent approved make with nominal thickness of individual thread . All Corners, Sill, Jambs, to be in line &amp; level, Right angle. Rate to include providing &amp; Erecting MS H frame scaffolding, for finishing of Electrical Switch Boxes, light points, fan hook points, DB’s, Junction box, Corecut areas etc.. as per the directions of Engineer-in-charge.
                                                                    NOTE: 
                                                                    1. At any location, If thickness of button mark found more than 15mm, carry out RMP back coat plaster (ensure the applied bonding agent is suitable to receive RMP) and to be water cured for 3 days. 
                                                                    2.In case of conventional construction, please ensure that external plaster is completed for block walls before gypsum plaster. If internal wall plastering to be done prior to external plaster, adopt RMP or MR- Moisture Resistant Gypsum plaster from Gyproc or equivalent instead of normal gypsum plaster for the internal face of External walls.
                                                                    3.Fix level pads (tikka) in grid form, first bottom and then top @ 1 m c/c after applying bonding agent
                                                                    4.Apply bonding agent (Bondit++ or equivalent) on RCC elements to avoid hacking and date of application to be marked on the wall. 
                                                                    5.Allow 24 hours drying time for bonding agent or as per manufacturer’s recommendation. If the gypsum plaster is not applied within 7 days, bonding agent to be reapplied after cleaning the existing surface. 
                                                                    6.Fix the Fibre mesh of 150mm width between RCC / Blockwork joint, Electrical conduits (chased area filled with RMP) and at all applicable locations like vertical stiffeners and RCC bands at window sills with 75 mm overlap on both sides 
                                                                    7.Inward and Outward Register, Material Consumption statement, Reconciliation statement to be submitted along with each RA Bill.
                                                                    8. Testing to be carried out as per GPL approved ITP
                                                                </b>
                                                            </td>
                                                            <td><input value="Typical Floors : Living, Dining, Foyer, Bedrooms, Kitchen,balcony Utility (Walls)" class="form-control"></td>
                                                            <td><input value=" Sqm " class="form-control min-width-200"></td>
                                                            <td><input value="QRO" class="form-control min-width-200"></td>
                                                            <td><input value=" 17,796.57 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,504.92 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,440.13 " class="form-control min-width-200"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                1
                                                            </td>
                                                            <td class="bg-primary" style="min-width: 400px">
                                                                <b>
                                                                    Sanmitha Enterprises - 1st Quotation
                                                                </b>
                                                            </td>
                                                            <td><input value="Typical Floors : Living, Dining, Foyer, Bedrooms, Kitchen,balcony Utility (Walls)" class="form-control"></td>
                                                            <td><input value=" Sqm " class="form-control min-width-200"></td>
                                                            <td><input value="QRO" class="form-control min-width-200"></td>
                                                            <td><input value=" 17,796.57 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,504.92 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,440.13 " class="form-control min-width-200"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                2
                                                            </td>
                                                            <td class="bg-warning" style="min-width: 400px">
                                                                <b>
                                                                    Sanmitha Enterprises - 2nd Quotation
                                                                </b>
                                                            </td>
                                                            <td><input value="Typical Floors : Living, Dining, Foyer, Bedrooms, Kitchen,balcony Utility (Walls)" class="form-control"></td>
                                                            <td><input value=" Sqm " class="form-control min-width-200"></td>
                                                            <td><input value="QRO" class="form-control min-width-200"></td>
                                                            <td><input value=" 17,796.57 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,504.92 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,440.13 " class="form-control min-width-200"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                3
                                                            </td>
                                                            <td class="bg-warning" style="min-width: 400px">
                                                                <b>
                                                                    Akhil Enterprises - 1st Quotation
                                                                </b>
                                                            </td>
                                                            <td><input value="Typical Floors : Living, Dining, Foyer, Bedrooms, Kitchen,balcony Utility (Walls)" class="form-control"></td>
                                                            <td><input value=" Sqm " class="form-control min-width-200"></td>
                                                            <td><input value="QRO" class="form-control min-width-200"></td>
                                                            <td><input value=" 17,796.57 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,504.92 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,440.13 " class="form-control min-width-200"></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                4
                                                            </td>
                                                            <td class="bg-danger" style="min-width: 400px">
                                                                <b>
                                                                    Akhil Enterprises - 2nd Quotation
                                                                </b>
                                                            </td>
                                                            <td><input value="Typical Floors : Living, Dining, Foyer, Bedrooms, Kitchen,balcony Utility (Walls)" class="form-control"></td>
                                                            <td><input value=" Sqm " class="form-control min-width-200"></td>
                                                            <td><input value="QRO" class="form-control min-width-200"></td>
                                                            <td><input value=" 17,796.57 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,609.39 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,504.92 " class="form-control min-width-200"></td>
                                                            <td><input value=" 16,440.13 " class="form-control min-width-200"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
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

        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Break Up Quantity</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <table id="tender-docs-table" class="table table-bordered">
                            <thead class="bg-primary">
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Tower
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        1
                                    </td>
                                    <td>
                                        Tower One
                                    </td>
                                    <td>
                                        268
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        2
                                    </td>
                                    <td>
                                        Tower Two
                                    </td>
                                    <td>
                                        300
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">
                                        <b>
                                            Total Quantity
                                        </b>
                                    </td>
                                    <td>
                                        <b>
                                            568
                                        </b>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger text-left" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <!--Modal-->
        <div class = "modal modal-right fade" id = "modal-right-2" tabindex = "-1">
            <div class = "modal-dialog">
                <div class = "modal-content">
                    <div class = "modal-header">
                        <h5 class = "modal-title">Vendors Details : Sona Infrabuild</h5>
                        <button type = "button" class = "close" data-dismiss = "modal">
                            <span aria-hidden = "true">&times;
                            </span>
                        </button>
                    </div>
                    <div class = "modal-body">
                        <div class = "row">
                            <div class = "col-md-12">
                                <b>Email</b> : sona@gmail.com
                            </div>
                            <div class = "col-md-12">
                                <b>Phone</b> : 9090909090
                            </div>
                        </div>
                    </div>
                    <div class = "modal-footer modal-footer-uniform">
                        <button type = "button" class = "btn btn-secondary" data-dismiss = "modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!--/.modal-->

        <?php $this->load->view('buyer/partials/scripts'); ?>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>

    </body>
</html>