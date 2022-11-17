<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- fullscreen -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/screenfull/screenfull.js"></script>

<!-- popper -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap/dist/js/bootstrap.js"></script>	

<!-- Slimscroll -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- amchart -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- apexcharts -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

<!-- Bootstrap Select -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-select/dist/js/bootstrap-select.js"></script>

<!-- Bootstrap tagsinput -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

<!-- Bootstrap touchspin -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>

<!-- Select2 -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/select2/dist/js/select2.full.js"></script>

<!-- InputMask -->
<script src="<?php echo base_url('assets/'); ?>vendor_plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendor_plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendor_plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- date-range-picker -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- bootstrap datepicker -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- bootstrap color picker -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>

<!-- bootstrap time picker -->
<script src="<?php echo base_url('assets/'); ?>vendor_plugins/timepicker/bootstrap-timepicker.min.js"></script>

<!-- SlimScroll -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/'); ?>vendor_plugins/iCheck/icheck.min.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- DashboardX Admin App -->
<script src="<?php echo base_url('assets/'); ?>js/template.js"></script>

<!-- DashboardX Admin dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/'); ?>js/pages/dashboard.js"></script>

<!-- DashboardX Admin for demo purposes -->
<script src="<?php echo base_url('assets/'); ?>js/demo.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/pages/advanced-form-element.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<!-- easypiechart -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>

<script src="<?php echo base_url('assets/'); ?>vendor_plugins/weather-icons/WeatherIcon.js"></script>


<!-- steps  -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-steps-master/build/jquery.steps.js"></script>

<!-- validate  -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>

<!-- Sweet-Alert  -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/sweetalert/sweetalert.min.js"></script>

<!-- wizard  -->
<!--<script src="<?php echo base_url('assets/'); ?>js/pages/steps.js"></script>-->

<!-- Form validator JavaScript -->
<script src="<?php echo base_url('assets/'); ?>js/pages/validation.js"></script>
<script src="<?php echo base_url('assets/'); ?>js/pages/form-validation.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">

    $('#nature_of_business').change(function () {
        $.post("<?php echo base_url('home/getTypeOfWorksByBusinessId'); ?>",
                {
                    id: this.value,
                },
                function (data, status) {
                    $('#type_of_work').html(data);
                });
    });
    
    $('#nature_of_business_dash').change(function () {
        $.post("<?php echo base_url('home/getTypeOfWorksByBusinessIdDash'); ?>",
                {
                    id: this.value,
                },
                function (data, status) {
                    $('#type_of_work').html(data);
                });
    });
    
    $('#nature_of_business_process').change(function () {
        $.post("<?php echo base_url('home/getTypeOfWorksByBusinessIdProcess'); ?>",
                {
                    id: this.value,
                },
                function (data, status) {
                    $('#type_of_work').html(data);
                });
    });
    
    $("input[type='number']").prop('min', 0);
</script>