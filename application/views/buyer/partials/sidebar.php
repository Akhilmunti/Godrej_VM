<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <?php
            $mSessionPm = $this->session->userdata('session_pm');
            $mSessionZone = $this->session->userdata('session_zone');
            $mSessionRole = $this->session->userdata('session_role');
            $mSessionEmail = $this->session->userdata('session_email');
            $mSessionId = $this->session->userdata('session_id');
            ?>
            <?php if ($mSessionRole == "COO" || $mSessionRole == "Managing Director" || $mSessionRole == "Head of Contracts & Procurement" || $mSessionRole == "HO - C&P" || $mSessionRole == "HO Operations") { ?>
                <li class="treeview <?php
                if ($home == "process" || $home == "home") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <i class="mdi mdi-home"></i>
                        <span>Dashboard</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php
                        if ($home == "home") {
                            echo "active";
                        }
                        ?>">
                            <a href="<?php echo base_url('buyer/vendor/dashboard'); ?>">Dashboard</a>
                        </li>
                        <li class="<?php
                        if ($home == "process") {
                            echo "active";
                        }
                        ?>">
                            <a href="<?php echo base_url('buyer/vendor/process'); ?>">Zonal Data</a>
                        </li>
                    </ul>
                </li>  
            <?php } else { ?>
                <li class="<?php
                if ($home == "home") {
                    echo "active";
                }
                ?>">
                    <a href="<?php echo base_url('buyer/vendor/dashboard'); ?>">
                        <i class="ti-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php } ?> 

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
                    <?php
                    $mSessionLinkNcr = $this->session->userdata('session_link_ncr');
                    $mSessionLinkSouth = $this->session->userdata('session_link_south');
                    $mSessionLinkMumbai = $this->session->userdata('session_link_mumbai');
                    $mSessionLinkPune = $this->session->userdata('session_link_pune');
                    $mSessionLinkKolkata = $this->session->userdata('session_link_kolkata');
                    ?>

                    <?php if ($mSessionId == $mSessionLinkNcr || $mSessionId == $mSessionLinkSouth || $mSessionId == $mSessionLinkMumbai || $mSessionId == $mSessionLinkPune || $mSessionId == $mSessionLinkKolkata) { ?>
                        <li class="<?php
                        if ($home == "vendor") {
                            echo "active";
                        }
                        ?>">
                            <a href="<?php echo base_url('buyer/vendor'); ?>">Assigned Tasks</a>
                        </li>
                    <?php } ?>
                    <?php if ($mSessionRole != "Regional Safety" || $mSessionRole != "Ho Safety" || $mSessionRole != "Regional Quality" || $mSessionRole != "Regional Planning" || $mSessionRole != "Regional C&B" || $mSessionRole != "Others") { ?>
                        <li class="<?php
                        if ($home == "delisting") {
                            echo "active";
                        }
                        ?>">
                            <a href="<?php echo base_url('buyer/vendor/delisting'); ?>">Delisting</a>
                        </li>
                    <?php } ?>

                    <?php if ($mSessionRole == "Regional C&P Head" || $mSessionRole == "Regional C&P Team" || $mSessionRole == "PCM") { ?>
                        <li class="<?php
                        if ($home == "transferred") {
                            echo "active";
                        }
                        ?>">
                            <a href="<?php echo base_url('buyer/vendor/transferred'); ?>">Transferred</a>
                        </li>
                    <?php } ?>
                    <?php if ($mSessionRole == "Regional C&P Head" || $mSessionRole == "Regional C&P Team") { ?>
                        <li class="<?php
                        if ($home == "feedback") {
                            echo "active";
                        }
                        ?>">
                            <a href="<?php echo base_url('buyer/vendor/feedback'); ?>">Feedback</a>
                        </li>
                    <?php } ?>

                </ul>
            </li>  
            <?php if ($mSessionEmail == "bchoudhary@godrejproperties.com" || $mSessionEmail == "priyobrata.ganguly@godrejproperties.com" || $mSessionEmail == "rajiv.nair@godrejproperties.com" || $mSessionEmail == "punam.ingle@godrejproperties.com" || $mSessionEmail == "preeti.puranik@godrejproperties.com" || $mSessionEmail == "lav.singhal@godrejproperties.com" || $mSessionEmail == "priyobrata.ganguly@godrejproperties.com" || $mSessionEmail == "rajashree.sonawane@godrejproperties.com" || $mSessionEmail == "ravi.dhotre@godrejproperties.com" || $mSessionEmail == "neeraj.kalra@godrejproperties.com" || $mSessionEmail == "bharatbhooshan@godrejproperties.com" || $mSessionEmail == "poonamdeep.minhas@godrejproperties.com" || $mSessionEmail == "anant.chauhan@godrejproperties.com" || $mSessionEmail == "ketki.zope@godrejproperties.com" || $mSessionEmail == "sagar.k@godrejproperties.com") { ?>
                <li class="treeview <?php
                if ($home == "users" || $home == "privileges") {
                    echo "active";
                }
                ?>">
                    <a href="#">
                        <i class="mdi mdi-lock-reset"></i>
                        <span>Rapid Configuration</span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php
                        if ($home == "users") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/users'); ?>">Buyer Management</a></li>
                        <li class="<?php
                        if ($home == "projects_link") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/users/projects'); ?>">Project mapping</a></li>
                        <li class="<?php
                        if ($home == "zonal_specification") {
                            echo "active";
                        }
                        ?>"><a href="<?php echo base_url('buyer/users/zonal'); ?>">Zonal Spoc</a></li>
                    </ul>
                </li>  
            <?php } ?>

            <?php if ($mSessionRole == "Project Manager" || $mSessionRole == "Project Execution Team") { ?>

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