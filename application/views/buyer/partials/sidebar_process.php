<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <?php
            $mSessionPm = $this->session->userdata('session_pm');
            $mSessionZone = $this->session->userdata('session_zone');
            if ($mSessionPm == 1 && $mSessionZone) {
                ?>

                <li class="treeview <?php
                if ($home == "vendor") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <i class="mdi mdi-monitor-multiple"></i>
                        <span>Vendor Management</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php
                        if ($home == "vendor") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/vendor'); ?>">Assigned</a></li>
                        <li class="<?php
                        if ($home == "transferred") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/vendor/transferred'); ?>">Transferred</a></li>
                        <li class="<?php
                        if ($home == "feedback") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/vendor/feedback'); ?>">Feedback</a></li>
                        <li class="<?php
                        if ($home == "process") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/vendor/process'); ?>">Dashboard</a></li>
                        <li class="<?php
                        if ($home == "short") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/vendor/shortlisting'); ?>">Short Listing</a></li>
                    </ul>
                </li>  

                <li class="<?php
                if ($home == "users") {
                    echo "active";
                }
                ?>">
                    <a href="<?php echo base_url('buyer/users'); ?>">
                        <i class="ti-user"></i>
                        <span>Buyer Management</span>
                    </a>
                </li>

                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="<?php echo base_url('buyer/privileges'); ?>">
                        <i class="ti-lock"></i>
                        <span>Privilege Management</span>
                    </a>
                </li>

                <li class="<?php
                if ($home == "site_reports") {
                    echo "active";
                }
                ?>">
                    <a href="<?php echo base_url('buyer/vendor/getSiteReports'); ?>">
                        <i class="ti-bar-chart"></i>
                        <span>Site Visit Report</span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="ti-loop"></i>
                        <span>Logs</span>
                    </a>
                </li> 

            <?php } else if ($mSessionPm == 1) { ?>
                <li class="<?php
                if ($home == "site_reports") {
                    echo "active";
                }
                ?>">
                    <a href="<?php echo base_url('buyer/vendor/getSiteReports'); ?>">
                        <i class="ti-bar-chart"></i>
                        <span>Site Visit Report</span>
                    </a>
                </li>
                <li class="<?php
                if ($home == "feedback") {
                    echo "active";
                }
                ?>">
                    <a href="<?php echo base_url('buyer/vendor/getfeedback'); ?>">
                        <i class="ti-bar-chart-alt"></i>
                        <span>Feedback</span>
                    </a>
                </li>
            <?php } else { ?>

                <li class="active">
                    <a href="#">
                        <span>Package Details</span>
                    </a>
                </li>
                
                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <span>EOI</span>
                    </a>
                </li>
                
                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <span>Short Listing</span>
                    </a>
                </li>
                
                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <span>Bid Management</span>
                    </a>
                </li>
                
                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <span>Award <br> Recommendations</span>
                    </a>
                </li>
                
                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <span>Contract Agreement</span>
                    </a>
                </li>
                
                <li class="<?php
                if ($home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <span>SAP WO</span>
                    </a>
                </li>
                
            <?php } ?>

            <li>
                <a href="<?php echo base_url('buyer/home/logout'); ?>">
                    <i class="ti-power-off"></i>
                    <span>Log Out</span>
                </a>
            </li> 

        </ul>
    </section>
</aside>