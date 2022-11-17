 

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative"> 

                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="main-sidebar">
                        <!-- sidebar-->
                        <section class="sidebar">
                            <ul class="sidebar-menu" data-widget="tree">
 
                                <li class="<?php if($page== "stageOne"){echo "active";} ?>">
                                    <a href="<?php echo base_url('home/stageOne'); ?>">
                                        <i class="ti-window"></i>
                                        <span>Stage 1 Form</span>
                                    </a>
                                </li>    

                                <li class="<?php if($page== "stageTwo"){echo "active";} ?>">
                                    <a href="<?php echo base_url('home/stageTwo'); ?>">
                                        <i class="ti-window"></i>
                                        <span>Stage 2 Form</span>
                                    </a>
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