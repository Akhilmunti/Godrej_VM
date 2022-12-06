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

                <!-- Main content -->

                <section class="content">

                    <div class="content-header">
                        <div class="d-flex align-items-center">
                            <div class="d-block">
                                <h3 class="page-title br-0">NFA Reports</h3>
                            </div>
                        </div>
                    </div>

                    <div class="box">
                        <div class="box-body">
							<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/ldWaiver/report/'); ?>" >
                            <div class="row">

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Filter Type</label>
                                        <select id="nfaType" name="nfaType" required="" class="form-control">
											 <option value="" >Select Type</option>
                                            <option value="Initiated" <?php echo ($nfaType=="Initiated") ? "selected": ""?>>Initiated</option>
                                            <option value="Approved" <?php echo ($nfaType=="Approved") ? "selected": ""?>>Approved</option>
                                            <option value="Returned" <?php echo ($nfaType=="Returned") ? "selected": ""?>>Returned</option>
                                            <option value="Cancelled" <?php echo ($nfaType=="Cancelled") ? "selected": ""?> >Cancelled</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>User</label>
                                        <select id="buyer_id" name="buyer_id"  class="form-control">
                                            <option value="">Select User</option>
											<?php 
											 foreach ($recordBuyers as $key => $valUser) {
												 $bId= $valUser->buyer_id;
												 $sel ="";
												 if($buyer_id==$bId)
													 echo $sel = "selected";
												 
												 $result = $result . "<option value='" . $valUser->buyer_id . "' ".$sel." >" . $valUser->buyer_name . "</option>" . PHP_EOL;
											}
											echo $result;
                                          ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>Start Date</label>
                                        <input type="date" class="form-control" placeholder="" name="start_date" value="<?php echo $start_date;?>">
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class='form-group'>
                                        <label>End Date</label>
                                        <input type="date" class="form-control" placeholder="" name="end_date" value="<?php echo $end_date;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-lg-12 text-right">
                                  
                                        <button type="submit" name="filter" class="btn btn-primary border-secondary rounded font-weight-bold">Filter</button>
                                    
                                </div>
                            </div>
							</form>
                            <div class="table-responsive mt-20">
                                <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                    <thead>
                                        <tr class='text-center'>
                                             <th>Sl. No</th>
											<th>ENFA No.</th>
											<th>Subject</th>
											<th>Contractor</th>
											<th>Package</th>
										  
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
                                                        <p><?php echo $record['contractor_name']; ?></p>
                                                    </td>
                                                    <td>
                                                        <p><?php echo $record['package_name']; ?></p>
                                                    </td>
                                            <td>
                                                 <a href="<?php echo base_url('nfa/LdWaiver/view/'. $record['id']); ?>">
                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
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

                </section>

                <!-- Maincontent -->

            </div>

        </div>

        <!-- Content-wrapper -->
        <?php $this->load->view('buyer/partials/footer'); ?>

        <!-- Control Sidebar -->
        <?php $this->load->view('buyer/partials/control'); ?>
        <!-- Control-sidebar -->

        <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>

    </div>
    <!-- Wrapper -->

    <?php $this->load->view('buyer/partials/scripts'); ?>
	<script>
		$('#nfaType').change(function () {
			//alert("test"+$('#nfaType').val());
			nfaType= this.value;
			//alert("level"+level);
			
			$.post("<?php echo base_url('nfa/ldWaiver/getReportUsers'); ?>",
					{
						nfaType: this.value,
						//contract_value:$('#original_contract_value').val()
					},
					function (data, status) {
						//alert(data);
						
						$('#buyer_id').html(data);
						
					});
		});
		</script>
</body>

</html>