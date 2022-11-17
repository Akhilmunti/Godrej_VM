 <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right d-none d-sm-inline-block">
                    <ul class="nav nav-primary nav-dotted nav-dot-separated justify-content-center justify-content-md-end">
                        <li class="nav-item">
                            <a class="nav-link" href="javascript:void(0)">FAQ</a>
                        </li>
                    </ul>
                </div>
                &copy; 2021 <a href="#">Godrej Marketplace</a>. All Rights Reserved.
            </footer>

        </div>
        <!-- ./wrapper -->



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

        <!-- apexcharts -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/apexcharts-bundle/irregular-data-series.js"></script>
        <script src="<?php echo base_url('assets/'); ?>vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>	

        <!-- FLOT CHARTS -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/Flot/jquery.flot.js"></script>
        <script src="<?php echo base_url('assets/'); ?>vendor_components/Flot/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url('assets/'); ?>js/pages/sampledata1.js"></script>

        <!-- easypiechart -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/easypiechart/dist/jquery.easypiechart.js"></script>

        <script src="<?php echo base_url('assets/'); ?>vendor_plugins/weather-icons/WeatherIcon.js"></script>

        <!-- DashboardX Admin App -->
        <script src="<?php echo base_url('assets/'); ?>js/template.js"></script>

        <!-- DashboardX Admin dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url('assets/'); ?>js/pages/dashboard6.js"></script>

        <!-- DashboardX Admin for demo purposes -->
        <script src="<?php echo base_url('assets/'); ?>js/demo.js"></script>

        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

        <!-- FastClick -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/fastclick/lib/fastclick.js"></script>

        <!-- Sparkline -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>

        <!-- DashboardX Admin App -->
        <script src="<?php echo base_url('assets/'); ?>js/template.js"></script>

        <!-- DashboardX Admin for demo purposes -->
        <script src="<?php echo base_url('assets/'); ?>js/demo.js"></script>

        <!-- steps  -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-steps-master/build/jquery.steps.js"></script>

        <!-- validate  -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/jquery-validation-1.17.0/dist/jquery.validate.min.js"></script>

        <!-- Sweet-Alert  -->
        <script src="<?php echo base_url('assets/'); ?>vendor_components/sweetalert/sweetalert.min.js"></script>

        <!-- wizard  -->
        <script src="<?php echo base_url('assets/'); ?>js/pages/steps.js"></script>

         <!-- Form validator JavaScript -->
        <script src="<?php echo base_url('assets/'); ?>js/pages/validation.js"></script>
        <script src="<?php echo base_url('assets/'); ?>js/pages/form-validation.js"></script>

        


    </body>
</html>
<script type="text/javascript">
  jQuery(document).delegate('a.add-record', 'click', function(e) {
             e.preventDefault();    
             var content = jQuery('#sample_table tr'),
             size = jQuery('#tbl_posts >tbody >tr').length + 1,
             element = null,    
             element = content.clone();
             element.attr('id', 'rec-'+size);
             element.find('.delete-record').attr('data-id', size);
             element.appendTo('#tbl_posts_body');
             element.find('.sn').html(size);
           });


        jQuery(document).delegate('a.delete-record', 'click', function(e) {
             e.preventDefault();    
             var didConfirm = confirm("Are you sure You want to delete");
             if (didConfirm == true) {
              var id = jQuery(this).attr('data-id');
              var targetDiv = jQuery(this).attr('targetDiv');
              jQuery('#rec-' + id).remove();
              
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
              //alert(index);
              $(this).find('span.sn').html(index+1);
            });
            return true;
          } else {
            return false;
          }
        });

        jQuery(document).delegate('a.add-record_2', 'click', function(e) {
             e.preventDefault();    
             var content = jQuery('#sample_table_2 tr'),
             size = jQuery('#tbl_posts_2 >tbody >tr').length + 1,
             element = null,    
             element = content.clone();
             element.attr('id', 'rec-'+size);
             element.find('.delete-record_2').attr('data-id', size);
             element.appendTo('#tbl_posts_2_body');
             element.find('.sn').html(size);
           });
        jQuery(document).delegate('a.delete-record_2', 'click', function(e) {
             e.preventDefault();    
             var didConfirm = confirm("Are you sure You want to delete");
             if (didConfirm == true) {
              var id = jQuery(this).attr('data-id');
              var targetDiv = jQuery(this).attr('targetDiv');
              jQuery('#rec-' + id).remove();
              
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
              //alert(index);
              $(this).find('span.sn').html(index+1);
            });
            return true;
          } else {
            return false;
          }
        });
        jQuery(document).delegate('a.add-record_3', 'click', function(e) {
             e.preventDefault();    
             var content = jQuery('#sample_table_3 tr'),
             size = jQuery('#tbl_posts_3 >tbody >tr').length + 1,
             element = null,    
             element = content.clone();
             element.attr('id', 'rec-'+size);
             element.find('.delete-record_3').attr('data-id', size);
             element.appendTo('#tbl_posts_3_body');
             element.find('.sn').html(size);
           });
        jQuery(document).delegate('a.delete-record_3', 'click', function(e) {
             e.preventDefault();    
             var didConfirm = confirm("Are you sure You want to delete");
             if (didConfirm == true) {
              var id = jQuery(this).attr('data-id');
              var targetDiv = jQuery(this).attr('targetDiv');
              jQuery('#rec-' + id).remove();
              
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
              //alert(index);
              $(this).find('span.sn').html(index+1);
            });
            return true;
          } else {
            return false;
          }
        });
        jQuery(document).delegate('a.add-record_4', 'click', function(e) {
             e.preventDefault();    
             var content = jQuery('#sample_table_4 tr'),
             size = jQuery('#tbl_posts_4 >tbody >tr').length + 1,
             element = null,    
             element = content.clone();
             element.attr('id', 'rec-'+size);
             element.find('.delete-record_4').attr('data-id', size);
             element.appendTo('#tbl_posts_4_body');
             element.find('.sn').html(size);
           });
        jQuery(document).delegate('a.delete-record_4', 'click', function(e) {
             e.preventDefault();    
             var didConfirm = confirm("Are you sure You want to delete");
             if (didConfirm == true) {
              var id = jQuery(this).attr('data-id');
              var targetDiv = jQuery(this).attr('targetDiv');
              jQuery('#rec-' + id).remove();
              
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
              //alert(index);
              $(this).find('span.sn').html(index+1);
            });
            return true;
          } else {
            return false;
          }
        });
        jQuery(document).delegate('a.add-record_5', 'click', function(e) {
             e.preventDefault();    
             var content = jQuery('#sample_table_5 tr'),
             size = jQuery('#tbl_posts_5 >tbody >tr').length + 1,
             element = null,    
             element = content.clone();
             element.attr('id', 'rec-'+size);
             element.find('.delete-record_5').attr('data-id', size);
             element.appendTo('#tbl_posts_5_body');
             element.find('.sn').html(size);
           });
        jQuery(document).delegate('a.delete-record_5', 'click', function(e) {
             e.preventDefault();    
             var didConfirm = confirm("Are you sure You want to delete");
             if (didConfirm == true) {
              var id = jQuery(this).attr('data-id');
              var targetDiv = jQuery(this).attr('targetDiv');
              jQuery('#rec-' + id).remove();
              
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
              //alert(index);
              $(this).find('span.sn').html(index+1);
            });
            return true;
          } else {
            return false;
          }
        });
        jQuery(document).delegate('a.add-record_6', 'click', function(e) {
             e.preventDefault();    
             var content = jQuery('#sample_table_6 tr'),
             size = jQuery('#tbl_posts_6 >tbody >tr').length + 1,
             element = null,    
             element = content.clone();
             element.attr('id', 'rec-'+size);
             element.find('.delete-record_6').attr('data-id', size);
             element.appendTo('#tbl_posts_6_body');
             element.find('.sn').html(size);
           });
        jQuery(document).delegate('a.delete-record_6', 'click', function(e) {
             e.preventDefault();    
             var didConfirm = confirm("Are you sure You want to delete");
             if (didConfirm == true) {
              var id = jQuery(this).attr('data-id');
              var targetDiv = jQuery(this).attr('targetDiv');
              jQuery('#rec-' + id).remove();
              
            //regnerate index number on table
            $('#tbl_posts_body tr').each(function(index) {
              //alert(index);
              $(this).find('span.sn').html(index+1);
            });
            return true;
          } else {
            return false;
          }
        });
        
</script>
