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
                                <h3>Procurement IOM</h3>
                            </div>
                          
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">
                                    <?php $this->load->view('buyer/partials/alerts');

                                    $selUrl =   base_url('nfa/award_procurement/award_recomm_procurement_list');
				                    $mSessionRole = $this->session->userdata('session_role');
                                    $selUrl =   $_SERVER['REQUEST_URI'];
                                    $current_page = base_url($_SERVER['REDIRECT_QUERY_STRING']);
                                    if ($current_page == $selUrl)
                                        $selOption = "selected";
                                    else
                                        $selOption = "";

                                    ?>

                                    <?php $this->load->view('nfa/award_recomm_listing'); ?>                        
                               
                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                    <th>Sl. No</th>
                                                    <th>ENFA No.</th>
                                                    <th>Zone</th>
                                                    <th>Scope of Work</th>
                                                    <th>Package Name</th>
                                                    <th>Project Name</th>

                                                    <th>IOM Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class='text-center'>
                                                <?php if (!empty($records)) { ?>

                                                    <?php
                                                    $mCount = 0;
                                                    $CI=&get_instance();
                                                    foreach ($records as $key => $record) {
                                                        $mCount++;
                                                        $salient_id=$record['id'];
                                                        $mRecordLevelsObj = $CI->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_procurement","view");
				                                        $mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <p> <?php echo $mCount; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $record['version_id']; ?></p>
                                                            </td>
                                                            <td>
                                                            <p><?php echo $record['zone']; ?></p>
                                                            </td>
                                                            <td>
                                                            <p><?php echo $record['scope_of_work']; ?></p>
                                                            </td>
                                                            <td>
                                                            <p><?php echo $record['package_name']; ?></p>
                                                            </td>
                                                            <td>
                                                            <p><?php echo $record['project_name']; ?></p>
                                                            </td>
                                                           
                                                            <td>
                                                                 <p class="badge badge-primary">

                                                                    <?php 
                                                                      
                                                                        foreach ($mRecordLevels as $keyLevel => $valLevel) {
                                                                            $approver_name = $valLevel['approver_name'];
                                                                            $level = $valLevel['level'];
                                                                            $role = $valLevel['role'];
                                                                            $approver_id = $valLevel['approver_id'];
                                                                           
                                                                            if($approver_id==0)
                                                                            {
                                                                                $approver_name = "Not Applicable"; 
                                                                            }
                                                                            else
                                                                            {
                                                                                $getUser = $CI->getRoleUsers_approval($role,$mSessionZone,$approver_id);
                                                                               
                                                                                $approver_name = $getUser[0]->buyer_name;
                                                                            }
                                                                           
                                                                            echo $approver_name; ?> - <?php 
                                                                            if($approver_id!=0)
                                                                                echo ($valLevel['approved_status']==0 ) ? "Pending" : "Approved"; 
                                                                            echo "(Level - ".$level.")<br>";
                                                                        }

                                                                    ?>			
                                                                </p>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo base_url('nfa/award_procurement/view_nfa/' . $record['id']); ?>">
                                                                    <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                                </a>

                                                                 <?php if($mSessionRole=="PCM" && $record['status']==0)
                                                                 {
                                                                    if($record['nfa_status']=='AMD')
                                                                    { ?>
                                                                        <a href="<?php echo base_url('nfa/award_procurement/actionEdit/' . $record['id']."/AMD"); ?>">
                                                                        <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                        </a>
                                                                <?php }
                                                                   else if($record['nfa_status']!='C')
                                                                   {?>

                                                                        <a href="<?php echo base_url('nfa/award_procurement/actionEdit/' . $record['id']); ?>">
                                                                        <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                        </a>
                                                                        <a href="<?php echo base_url('nfa/award_procurement/cancel/' . $record['id']); ?>">
                                                                        <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Cancel</button>
                                                                        </a>
                                                                    <?php 
                                                                    }
                                                                ?>
                                                               
                                                                <?php 
                                                                }
                                                                if($mSessionRole == "PCM" && $record['status']==1 && $record['nfa_status']=='AMD')
                                                                { 
                                                                ?>
                                                                    <a href="<?php echo base_url('nfa/award_procurement/actionEdit/'. $record['id']."/AMD"); ?>">
                                                                    <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Edit</button>
                                                                    </a>
                                                                <?php 
                                                                }
 								                                if($mSessionRole == "PCM" && $record['status']!=0 && $record['nfa_status']=='R')
                                                                { 
                                                                ?>
                                                                    <a href="<?php echo base_url('nfa/award_procurement/actionEdit/' . $record['id']."/RF"); ?>">
                                                                    <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Refloat</button>
                                                                    </a>
                                                                <?php 
                                                                }                                                                
                                                                if($mSessionRole == "PCM" && $record['status']==1 && $record['nfa_status']=='RT')
                                                                { 
                                                                ?>
                                                                    <a href="<?php echo base_url('nfa/award_procurement/actionEdit/' . $record['id']); ?>">
                                                                    <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                    </a>
                                                                <?php 
                                                                }
                                                                 if ($mSessionRole == "PCM" && $record['nfa_status']=='A') { ?>
                                                                    <a href="<?php echo base_url('nfa/award_procurement/amend_nfa/'. $record['id']); ?>">
                                                                        <button type="button" class="btn btn-danger rounded ml-2 buttonPadding">Ammend</button>
                                                                    </a>
                                                                <?php }
                                                                
                                                                if ($mSessionRole != "PCM" && $record['nfa_status']=='A' ) { 
                                                                ?>
                                                                    <a href="<?php echo base_url('nfa/award_procurement/view_nfa/'. $record['id']."/E"); ?>">
                                                                        <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Esign</button>
                                                                    </a>
                                                                <?php 
                                                                }?>
                                                                <a href="<?php echo base_url('nfa/Award_procurement/view_logs/'. $record['id']); ?>">
                                                                    <button type="button" class="btn btn-primary rounded buttonPadding ml-2">IOM Logs</button>
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

    });
</script>