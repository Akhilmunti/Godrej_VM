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
                                <h3>Draft NFA's</h3>
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
								
										<?php $this->load->view('buyer/partials/alerts'); 
									
									/*  $selUrl =   $_SERVER['REQUEST_URI'];
									//echo "<br>";
									
									//echo $current_page = $config['base_url'].$_SERVER['REDIRECT_QUERY_STRING'];
									//echo $current_page = base_url($_SERVER['REQUEST_URI']);
									$current_page = base_url('nfa/Award_contract/award_recomm_contract_list');
									
									
									//if($current_page==$selUrl)
									if(strpos($current_page, $selUrl) !== false)
										$selOption="selected";
									else
										$selOption="";
									 */
									
									?>
									
									 <div class="row">
                                        <div class="col-lg-6">
                                            <div class='form-group'>
                                                <label>NFA Type</label>
                                              <?php echo $nfa_select;?>
                                            </div>
                                        </div>
                                    </div>
									
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                    <th>Sl. No</th>
													<th>ENFA No.</th>
                                                    <th>Subject</th>
                                                    <th>Budget</th>
                                                    
                                                    <th>NFA Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class='text-center'>
											    <?php if (!empty($records)) { ?>

                                                        <?php
                                                        $mCount = 0;
                                                        foreach ($records as $key => $record) {
                                                            $mCount++;
                                                            ?>
                                                <tr>
                                                    <td>
                                                        <p> <?php echo $mCount; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['version_id']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['subject']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['budget_with_escalation']; ?></p>
                                                    </td>
                                                   
                                                    <td>
                                                        <p>Pending</p>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('nfa/BidderListContractor/view_nfa/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                        </a>
														
                                                        <a href="<?php echo base_url('nfa/BidderListContractor/actionEdit/' . $record['id']); ?>">
                                                            <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                        </a>
														<a href="<?php echo base_url('nfa/BidderListContractor/cancel/'.$record['id']); ?>">
                                                                    <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Cancel</button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                
 <?php } ?>

                                                    <?php } ?>
                                            </tbody>
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
  // set the window's location property to the value of the option the user has selected
  window.location = $(this).val();
/*  <?php $pg_url ?> = $(this).val();
  url =  "<?php echo base_url('.$pg_url.'); ?>";
  
  alert(url); */
});
</script>