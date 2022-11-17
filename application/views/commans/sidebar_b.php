
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative"> 

                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="main-sidebar">
                        <!-- sidebar-->
                        <section class="sidebar">
                            <ul class="sidebar-menu" data-widget="tree">

                                <li class="<?php if($page=="index"){echo "active";} ?>">
                                    <a href="<?php echo base_url('dashboard'); ?>">
                                        <i class="mdi mdi-minus-network"></i>
                                        <span>Dashboard</span>
                                    </a>
                                </li>  

                                 

                                <li class="treeview <?php if($page == "vendorManagement" OR "privilegeManagement" OR "siteReport"){echo "active";}  ?>">
                                    <a href="#">
                                        <i class="mdi mdi-access-point"></i>
                                        <span>Management</span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li class=""><a href="<?php echo base_url('home/vendorManagement'); ?>">Users</a></li>
                                        <li><a href="<?php echo base_url('home/privilegeManagement'); ?>">Privilege</a></li>
                                        <li><a href="<?php echo base_url('home/pqManagement'); ?>">PQ</a></li>
                                        <li><a href="<?php echo base_url('home/siteReport'); ?>">Assessment Report</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <a href="<?php echo base_url(); ?>">
                                        <i class="ti-power-off"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li> 

                            </ul>
                        </section>
                    </aside>