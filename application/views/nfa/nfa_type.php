<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<style>
    .buttonPadding {
        padding: 7px;
        font-size: 13px;
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

                    <!-- Content Header (Page header) -->

                    <div class="content-header">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3><?php echo $title;?></h3>
                            </div>
                            <!-- <div class="col-lg-6 text-right">
                                <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                            </div> -->
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">
									<?php $this->load->view('buyer/partials/alerts'); ?>
									
									 <div class="row">
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label>NFA Type</label>
												<?php echo $nfa_select;?>
                                                <?php /*<select id="nfaType" name="nfaType" required="" class="form-control">
                                                    <option value="">Select NFA Type</option>
                                                    <option value="">Short Listing Approval For Contractor</option>
                                                    <option value="">Short Listing Approval For Supplier</option>
                                                    <option value="<?php echo base_url('nfa/Award_contract/award_recomm_contract_list')?>">Award Recommendation for Contracts</option>
                                                    <option value="">Award Recommendation for Procurement</option>
                                                    <option value="">Amendment in Contract</option>
                                                    <option value="">Descoping IOM</option>
                                                    <option value="">Termination IOM</option>
                                                    <option value="">BG Encashment</option>
                                                    <option value="<?php echo base_url('nfa/LdWaiver')?>">LD Waiver</option>
                                                    <option value="">Contractual Deviations</option>
                                                </select> <?php */?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-4">
                                        <table id="empty_table" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                    <th>Sl. No</th>
													<th>ENFA No.</th>
                                                    <th>Subject</th>
                                                    <th>NFA Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                        </table>
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

</body>

</html>
<script>
// get your select element and listen for a change event on it
$('#nfaType').change(function() {
	//alert("test");
	//return;
  // set the window's location property to the value of the option the user has selected
 // alert($(this).val());
  window.location = $(this).val();
/*  <?php $pg_url ?> = $(this).val();
  url =  "<?php echo base_url('.$pg_url.'); ?>";
  
  alert(url); */
});

$(document).ready( function () {
  var table = $('#empty_table').DataTable();
  
  $(".dataTables_empty").text("Please Select an NFA type");
} );
</script>