<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <style>
        table tr input[type='number']{
            width: 150px;
        }

        table tr input[type='text']{
            width: 150px;
        }

        table tr input[type='file']{
            width: 200px;
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
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h3 class="page-title br-0">Expression Of Interest</h3>
                                </div>

                                <div class="col-md-6 text-right">
                                    <a>
                                        NCR / Project / Package
                                    </a>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">

                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <!-- /.box-header -->
                                    <div class="box-body wizard-content">
                                        <?php $this->load->view('buyer/partials/alerts'); ?>
                                        <form id="register_form" action="<?php echo base_url('buyer/vendor/shortlisting'); ?>" method="POST" class=" validation-wizard" enctype="multipart/form-data">
                                            <!-- step -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="wlastName2"> Budget (Basic value of Work in crores) : <span class="danger">*</span> </label>
                                                            <input required="" type="number" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="wlastName2"> Scope of Work : <span class="danger">*</span> </label>
                                                            <input readonly="" value="Tower 1"  required="" type="text" class="form-control"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="wlastName2"> Estimated Start Date: <span class="danger">*</span> </label>
                                                        <input required="" type="date" class="form-control"/>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="wlastName2"> Completion Schedule <b>(Number of Months)</b>: <span class="danger">*</span> </label>
                                                        <input required="" type="number" class="form-control"/>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                            <!-- Step 1 -->
                                            <!-- Step 6 -->
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>
                                                                        Select
                                                                    </th>
                                                                    <th>
                                                                        Vendor
                                                                    </th>
                                                                    <th>
                                                                        Financial Categorization
                                                                    </th>
<!--                                                                    <th>
                                                                        Email
                                                                    </th>
                                                                    <th>
                                                                        Contact No.
                                                                    </th>-->
                                                                    <th>
                                                                        PQ Score
                                                                    </th>
                                                                    <th>
                                                                        FB Score
                                                                    </th>
                                                                    <th>
                                                                        Latest PQ/FB Date
                                                                    </th>
                                                                    <th>
                                                                        Action
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr class="bg-danger">
                                                                    <td>
                                                                        <input disabled="" class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#modal-right-2">
                                                                            Sona Infrabuild
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        Small	
                                                                    </td>
<!--                                                                    <td>
                                                                        abc@gmail.com
                                                                    </td>
                                                                    <td>
                                                                        9090909090
                                                                    </td>-->
                                                                    <td>
                                                                        -
                                                                    </td>
                                                                    <td>
                                                                        37
                                                                    </td>
                                                                    <td>
                                                                        12-04-22
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" data-toggle="modal" data-target="#modal-right" class="btn btn-sm btn-primary">Override</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#modal-right-2">
                                                                            ABC Vendor
                                                                        </a>

                                                                    </td>
                                                                    <td>
                                                                        Large	
                                                                    </td>
                                                                    <td>
                                                                        -
                                                                    </td>
                                                                    <td>
                                                                        77
                                                                    </td>
                                                                    <td>
                                                                        03-04-22
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                                <tr class="bg-danger">
                                                                    <td>
                                                                        <input disabled="" class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#modal-right-2">
                                                                            ABC Vendor
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        Large	
                                                                    </td>
                                                                    <td>
                                                                        47
                                                                    </td>
                                                                    <td>
                                                                        -
                                                                    </td>
                                                                    <td>
                                                                        23-04-19
                                                                    </td>
                                                                    <td>
                                                                        <a href="#" data-toggle="modal" data-target="#modal-right" class="btn btn-sm btn-primary">Override</a>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <input class="form-check-input" type="checkbox" id="checkbox_23" name="stv_confirmation" value="1"> 
                                                                        <label class="form-check-label" for="checkbox_23"></label>
                                                                    </td>
                                                                    <td>
                                                                        <a class="btn btn-xs btn-primary" href="#" data-toggle="modal" data-target="#modal-right-2">
                                                                            ABC Vendor
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        Large	
                                                                    </td>
                                                                    <td>
                                                                        -
                                                                    </td>
                                                                    <td>
                                                                        77
                                                                    </td>
                                                                    <td>
                                                                        25-04-22
                                                                    </td>
                                                                    <td>

                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </section>
                                            <h6></h6>
                                            <section>
                                                <div class="row">  
                                                    <div class="col-12">
                                                        <div class="row">
                                                            
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Quantity: <span class="danger">*</span> </label>
                                                                    <input value="" required="" type="number" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Brief Scope: <span class="danger">*</span> </label>
                                                                    <input value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Special Conditions: <span class="danger">*</span> </label>
                                                                    <input value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="wlastName2"> Delivery Address : <span class="danger">*</span> </label>
                                                                    <input value="" required="" type="text" class="form-control"/>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                            <!-- End -->
                                        </form>
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

        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right-2" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Vendors Details : Sona Infrabuild</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <b>Email</b> : sona@gmail.com
                            </div>
                            <div class="col-md-12">
                                <b>Phone</b> : 9090909090
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script>

            var countStepsChange = 0;
            var form = $(".validation-wizard").show();
            $(".validation-wizard").steps({
                headerTag: "h6"
                , bodyTag: "section"
                , transitionEffect: "none"
                , enableAllSteps: true
                , enableFinishButton: true
                , titleTemplate: '<span class="step">Step #index# </span>  '
                , labels: {

                    finish: "Submit"

                }
                , onStepChanging: function (event, currentIndex, newIndex) {
                    //return currentIndex > newIndex || (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
                    return newIndex;
                }
                , onFinishing: function (event, currentIndex) {
                    //alert(form.validate().settings.ignore = ":disabled", form.valid());
                    //return form.validate().settings.ignore = ":disabled", form.valid()
                    return currentIndex;
                }
                , onFinished: function (event, currentIndex) {
                    var form = document.getElementById("register_form");
                    form.submit();
                }
            }), $(".validation-wizard").validate({
                ignore: "input[type=hidden]"
                , errorClass: "text-danger"
                , successClass: "text-success"
                , highlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , unhighlight: function (element, errorClass) {
                    $(element).removeClass(errorClass)
                }
                , errorPlacement: function (error, element) {
                    error.insertAfter(element)
                }
                , rules: {

                    email: {
                        email: !0
                    }
                }
            });



        </script>

        <!-- Modal -->
        <div class="modal modal-right fade" id="modal-right" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Override Sona Infrabuild</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label>Justification Comments</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary float-right" data-dismiss="modal">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.modal -->

    </body>
</html>