<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('buyer/partials/header'); ?>

<style>
    .buttonPadding {
        padding: 7px;
        font-size: 13px;
    }

    .word {
        width: 350px;
    }
</style>

<?php //print_r($records);?>
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
                                <h3>Award IOM</h3>
                            </div>
                           
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-12">

                            <!-- Step wizard -->

                            <div class="box box-default">
                                <div class="box-body pb-0">

                                    <?php $this->load->view('buyer/partials/alerts');
                                    $mSessionRole = $this->session->userdata('session_role');
                                    $selUrl =   $_SERVER['REQUEST_URI'];
                                   
                                        if($records['Contract'])
                                        { 
                                           
                                          $current_page = base_url('nfa/Award_contract/award_contract_listing');
                                        } 

                                        if($records['Procurement'])
                                        { 
                                            
                                          $current_page = base_url('nfa/Award_procurement/award_recomm_procurement_list');
                                        } 
                                        
                                        
                                    if (strpos($current_page, $selUrl) !== false)
                                        $selOption = "selected";
                                    else
                                        $selOption = "";


                                    ?>

                                    <?php $this->load->view('nfa/award_recomm_listing'); ?>
                                  
                                    <div class="row mt-4">
                                        <div class="col-lg-6">
                                            
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table id="example" class="table table-bordered table-hover display margin-top-10 w-p100">
                                            <thead>
                                                <tr class='text-center'>
                                                    <th>Sl. No</th>
                                                    <th>EIOM No.</th>
                                                    <?php if($mSessionRole=="COO" || $mSessionRole=="HO - C&P" || $mSessionRole=="Head of Contracts & Procurement" || $mSessionRole=="Managing Director")
                                                    {
                                                    
                                                    ?>
                                                        <th>Zone</th>  
                                                    <?php 
                                                    }
                                                    ?>                                           
                                                    <th>Project Name</th>
                                                    <th>Package Name</th>
                                                    <th style="white-space: nowrap;">Actions</th>
                                                    <th style="white-space: nowrap;">Scope of Work</th>
                                                    <th style="white-space: nowrap;">IOM Status</th>
                                                        
                                                </tr>
                                            </thead>
                                            <tbody class='text-center'>
                                                <?php if (!empty($records)) {
                                                   
                                                    $CI=&get_instance();
                                                    foreach ($records['Contract'] as $key => $record)
                                                 {

                                                        $mCount++;
                                                        
                                                             $salient_id=$record['id'];
                                                             $mRecordLevelsObj = $CI->nfaAction->getAllLevelRole_approvers('',$salient_id,"award_contract","view");
                                                       

				                                        $mRecordLevels = json_decode(json_encode($mRecordLevelsObj), true);
				
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <p> <?php echo $mCount; ?></p>
                                                            </td>
                                                            <td>
                                                                <p><?php echo $record['version_id']; ?></p>
                                                            </td>
                                                            <?php if($mSessionRole=="COO" || $mSessionRole=="HO - C&P" || $mSessionRole=="Head of Contracts & Procurement" || $mSessionRole=="Managing Director" )
                                                            {                                                            
                                                            ?>
                                                                <td>                                                            
                                                                <p><?php echo $record['zone']; ?></p>
                                                                </td> 
                                                            <?php 
                                                            }?>
                                                            <td>
                                                            <p>
                                                                <?php echo $record['project_name']; ?>
                                                            </p>
                                                            </td>
                                                            <td>
                                                            <p><?php echo $record['package_name']; ?></p>
                                                            </td>
                                                            
                                                              <td style="white-space: nowrap;">
                                                               
                                                                        <?php if( $record['status']==1 && $record['nfa_status'] =='SA' && $mSessionRole =="PCM")
                                                                    { ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/actionEdit/' . $record['id']); ?>">
                                                                                    <button type="button" class="btn btn-success rounded buttonPadding mr-2">Edit</button>
                                                                                </a>
                                                                    <?php }?>
                                                                    <?php if( $record['status']==1 && $record['nfa_status']=='SA' && $record['approved_status']== 0 && $mSessionRole !=="PCM")
                                                                    { ?>
                                                                        
                                                                    <a href="<?php echo base_url('nfa/Award_contract/view_nfa/' . $record['id']); ?>">
                                                                        <button type="button" class="btn btn-primary rounded buttonPadding"> Approve IOM</button>
                                                                    </a>
                                                                        <?php } else {

                                                                                    if ($mSessionRole != "PCM" && $record['nfa_status']=='A' ) { 
                                                                                         ?>
                                                                                        <a href="<?php echo base_url('nfa/Award_contract/view_nfa/'. $record['id']."/E"); ?>">
                                                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                                                        </a> 
                                                                                    <?php 
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    ?>
                                                                                        <a href="<?php echo base_url('nfa/Award_contract/view_nfa/' . $record['id']); ?>">
                                                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                                                        </a>
                                                                            <?php 
                                                                                    }
                                                                            } ?>
                                                                        <?php if($mSessionRole=="PCM" && $record['status']==0)
                                                                        {                                                                    
                                                                            if($record['nfa_status']=='AMD')
                                                                            { ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/actionEdit/'. $record['id']."/AMD"); ?>">
                                                                            <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Edit</button>
                                                                        </a>
                                                                        <?php 
                                                                        }
                                                                        else if($record['nfa_status']!='C')
                                                                        {
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/actionEdit/' . $record['id']); ?>">
                                                                                <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                            </a>
                                                                    
                                                                        <a href="<?php echo base_url('nfa/Award_contract/cancel/' . $record['id']); ?>">
                                                                            <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Cancel</button>
                                                                        </a>
                                                               
                                                                
                                                                        <?php 
                                                                            }
                                                                        }
                                                                        if($mSessionRole == "PCM" && $record['status']==1 && $record['nfa_status']=='AMD')
                                                                        { 
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/actionEdit/'. $record['id']."/AMD"); ?>">
                                                                            <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Edit</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        if($mSessionRole == "PCM" && $record['status']!=0 && $record['nfa_status']=='R')
                                                                        { 
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/actionEdit/' . $record['id']."/RF"); ?>">
                                                                            <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Refloat</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        if($mSessionRole == "PCM" && $record['status']==1 && $record['nfa_status']=='RT')
                                                                        { 
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/actionEdit/' . $record['id']); ?>">
                                                                            <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        if ($mSessionRole == "PCM" && $record['nfa_status']=='A') { ?>
                                                                            <a href="<?php echo base_url('nfa/Award_contract/amend_nfa/'. $record['id']); ?>">
                                                                                <button type="button" class="btn btn-danger rounded ml-2 buttonPadding">Ammend</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        
                                                                        // if ($mSessionRole != "PCM" && $record['nfa_status']=='A' ) { 
                                                                        // ?>
                                                                            <!-- <a href="<?php //echo base_url('nfa/Award_contract/view_nfa/'. $record['id']."/E"); ?>">
                                                                        //         <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Esign</button>
                                                                        //     </a> -->
                                                                        <?php 
                                                                        // }?>
                                                                        <a href="<?php echo base_url('nfa/Award_contract/view_logs/'. $record['id']); ?>">
                                                                            <button type="button" class="btn btn-primary rounded buttonPadding ml-2">IOM Logs</button>
                                                                        </a>
                                                            </td>

                                                            <td>
                                                            <p class="word"><?php echo $record['scope_of_work']; ?></p>
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
                                                           
                                                        </tr>

                                                    <?php } ?>

                                                <?php } ?>
                                            
                                                <?php if (!empty($records)) {
                                                   
                                                    $CI=&get_instance();
                                                    foreach ($records['Procurement'] as $key => $record)
                                                 {

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
                                                            <?php if($mSessionRole=="COO" || $mSessionRole=="HO - C&P" || $mSessionRole=="Head of Contracts & Procurement" || $mSessionRole=="Managing Director" )
                                                            {                                                            
                                                            ?>
                                                                <td>                                                            
                                                                <p><?php echo $record['zone']; ?></p>
                                                                </td> 
                                                            <?php 
                                                            }?>
                                                            <td>
                                                            <p>
                                                                <?php echo $record['project_name']; ?>
                                                            </p>
                                                            </td>
                                                            <td>
                                                            <p><?php echo $record['package_name']; ?></p>
                                                            </td>
                                                            
                                                              <td style="white-space: nowrap;">
                                                               
                                                                        <?php if( $record['status']==1 && $record['nfa_status'] =='SA' && $mSessionRole =="PCM")
                                                                    { ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/actionEdit/' . $record['id']); ?>">
                                                                                    <button type="button" class="btn btn-success rounded buttonPadding mr-2">Edit</button>
                                                                                </a>
                                                                    <?php }?>
                                                                    <?php if( $record['status']==1 && $record['nfa_status']=='SA' && $record['approved_status']== 0 && $mSessionRole !=="PCM")
                                                                    { ?>
                                                                        
                                                                    <a href="<?php echo base_url('nfa/Award_procurement/view_nfa/' . $record['id']); ?>">
                                                                        <button type="button" class="btn btn-primary rounded buttonPadding"> Approve IOM</button>
                                                                    </a>
                                                                        <?php } else {

                                                                                    if ($mSessionRole != "PCM" && $record['nfa_status']=='A' ) { 
                                                                                         ?>
                                                                                        <a href="<?php echo base_url('nfa/Award_procurement/view_nfa/'. $record['id']."/E"); ?>">
                                                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                                                        </a> 
                                                                                    <?php 
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                    ?>
                                                                                        <a href="<?php echo base_url('nfa/Award_procurement/view_nfa/' . $record['id']); ?>">
                                                                                            <button type="button" class="btn btn-primary rounded buttonPadding">View</button>
                                                                                        </a>
                                                                            <?php 
                                                                                    }
                                                                            } ?>
                                                                        <?php if($mSessionRole=="PCM" && $record['status']==0)
                                                                        {                                                                    
                                                                            if($record['nfa_status']=='AMD')
                                                                            { ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/actionEdit/'. $record['id']."/AMD"); ?>">
                                                                            <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Edit</button>
                                                                        </a>
                                                                        <?php 
                                                                        }
                                                                        else if($record['nfa_status']!='C')
                                                                        {
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/actionEdit/' . $record['id']); ?>">
                                                                                <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                            </a>
                                                                    
                                                                        <a href="<?php echo base_url('nfa/Award_procurement/cancel/' . $record['id']); ?>">
                                                                            <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Cancel</button>
                                                                        </a>
                                                               
                                                                
                                                                        <?php 
                                                                            }
                                                                        }
                                                                        if($mSessionRole == "PCM" && $record['status']==1 && $record['nfa_status']=='AMD')
                                                                        { 
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/actionEdit/'. $record['id']."/AMD"); ?>">
                                                                            <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Edit</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        if($mSessionRole == "PCM" && $record['status']!=0 && $record['nfa_status']=='R')
                                                                        { 
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/actionEdit/' . $record['id']."/RF"); ?>">
                                                                            <button type="button" class="btn btn-danger rounded buttonPadding ml-2">Refloat</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        if($mSessionRole == "PCM" && $record['status']==1 && $record['nfa_status']=='RT')
                                                                        { 
                                                                        ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/actionEdit/' . $record['id']); ?>">
                                                                            <button type="button" class="btn btn-success rounded buttonPadding ml-2">Edit</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        if ($mSessionRole == "PCM" && $record['nfa_status']=='A') { ?>
                                                                            <a href="<?php echo base_url('nfa/Award_procurement/amend_nfa/'. $record['id']); ?>">
                                                                                <button type="button" class="btn btn-danger rounded ml-2 buttonPadding">Ammend</button>
                                                                            </a>
                                                                        <?php 
                                                                        }
                                                                        
                                                                        // if ($mSessionRole != "PCM" && $record['nfa_status']=='A' ) { 
                                                                        // ?>
                                                                            <!-- <a href="<?php //echo base_url('nfa/Award_contract/view_nfa/'. $record['id']."/E"); ?>">
                                                                        //         <button type="button" class="btn btn-success rounded ml-2 buttonPadding">Esign</button>
                                                                        //     </a> -->
                                                                        <?php 
                                                                        // }?>
                                                                        <a href="<?php echo base_url('nfa/Award_procurement/view_logs/'. $record['id']); ?>">
                                                                            <button type="button" class="btn btn-primary rounded buttonPadding ml-2">IOM Logs</button>
                                                                        </a>
                                                            </td>

                                                            <td>
                                                            <p class="word"><?php echo $record['scope_of_work']; ?></p>
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