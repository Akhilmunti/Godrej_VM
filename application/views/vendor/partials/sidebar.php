<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="<?php
            if ($home == "home") {
                echo "active";
            }
            ?>">
                <a href="<?php echo base_url('vendor/home/dashboard'); ?>">
                    <i class="mdi mdi-home"></i>
                    <span>Dashboard</span>
                </a>
            </li> 


            <li class="treeview <?php
            if ($home == "stage_one" || $home == "stage_two") {
                echo "active";
            }
            ?>">
                <a href="#">
                    <i class="mdi mdi-account"></i>
                    <span>Vendor Profile</span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php
                    if ($home == "stage_one") {
                        echo "active";
                    }
                    ?>"><a href="<?php echo base_url('vendor/home/getStageOneData'); ?>">Stage One</a></li>
                        <?php
                        $mSessionStatus = $this->session->userdata('session_vendor_status');
                        if ($mSessionStatus != "7") {
                            ?>
                        <li class="<?php
                        if ($home == "stage_two") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('vendor/home/getStageTwoData'); ?>">Stage Two</a></li>
                        <?php } ?>
                </ul>
            </li>  

            <li class="<?php
            if ($home == "short") {
                echo "active";
            }
            ?>">
                <a href="<?php echo base_url('vendor/home/eoi'); ?>">
                    <i class="ti-window"></i>
                    <span>EOI</span>
                </a>
            </li>
            
            <li class="<?php
            if ($home == "tendering") {
                echo "active";
            }
            ?>">
                <a href="<?php echo base_url('vendor/home/listApprovalBidders'); ?>">
                    <i class="ti-window"></i>
                    <span>Tendering</span>
                </a>
            </li>

            <li>
                <a href="<?php echo base_url('vendor/home/logout'); ?>">
                    <i class="ti-power-off"></i>
                    <span>Log Out</span>
                </a>
            </li> 

        </ul>
    </section>
</aside>