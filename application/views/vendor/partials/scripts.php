<!-- jQuery 3 -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/jquery-3.3.1/jquery-3.3.1.js"></script>

<!-- fullscreen -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/screenfull/screenfull.js"></script>

<!-- popper -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="<?php echo base_url('assets'); ?>/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	

<!-- Slimscroll -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- Sparkline -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

<!-- chart-js -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/chart.js-master/Chart.min.js"></script>

<!-- peity -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/jquery.peity/jquery.peity.js"></script>

<!-- FLOT CHARTS -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/Flot/jquery.flot.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor_components/Flot/jquery.flot.resize.js"></script>
<!-- Bootstrap tagsinput -->
<script src="<?php echo base_url('assets/'); ?>vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js"></script>

<!-- apexcharts -->
<script src="<?php echo base_url('assets'); ?>/vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
<script src="<?php echo base_url('assets'); ?>/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>	

<!-- DashboardX Admin App -->
<script src="<?php echo base_url('assets'); ?>/js/template.js"></script>

<!-- DashboardX Admin dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets'); ?>/js/pages/dashboard3.js"></script>

<!-- DashboardX Admin for demo purposes -->
<script src="<?php echo base_url('assets/'); ?>js/demo.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

<script>
    $(document).ready(function () {
        $('#example').DataTable();
        $('#example2').DataTable();
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

    $("input[type='number']").prop('min', 0);
</script>