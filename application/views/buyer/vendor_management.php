  <style type="text/css">
.btn{
 width: 50px;
}
.btn-sm{
    margin-top: 5px;
}
  </style>
                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">Vendor Management</h3>
                                    <?php if(isset($notification)){
                                        echo $notification;
                                    }  ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                                                <thead>
                                                    <tr>
                                                        <th>Sl. No</th>
                                                        <th>Date of Submission </th>
                                                        <th>Vendor Name</th>
                                                        <th>Type of agency </th>
                                                        <th>Package name  </th>
                                                        <th>Financial Categorization</th>
                                                        <th>Stage 1 Form</th>
                                                        <th>Stage 2 Form</th>
                                                        <th>Site Visit Report</th>
                                                        <th>PQ Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    
                                                        <?php 
                                                        $a=1; 
                                                        foreach($getVendorManagement as $data){ ?>
                                                        <tr>
                                                            <td><?php echo $a++ ; ?></td>
                                                            <td><?php echo $data->submissionDate; ?></td>
                                                            <td><?php echo $data->company_name;  ?></td>
                                                            <td><?php echo $data->natureName;  ?></td>
                                                            <td><?php echo $data->typeOfWork;  ?></td>
                                                            <td><?php 
                                                             
                                                                 if($data->turn_over_of_last_3years*0.5 < 100000000){ 
                                                                    echo "Very Small";
                                                             }else if($data->turn_over_of_last_3years*0.5 >100000000 && $data->turn_over_of_last_3years*0.5 < 500000000 ){
                                                                echo"Small";

                                                             }else if($data->turn_over_of_last_3years*0.5 >500000000 && $data->turn_over_of_last_3years*0.5 < 1000000000 ){
                                                                echo "Medium";
                                                             }else if($data->turn_over_of_last_3years*0.5 >1000000000 && $data->turn_over_of_last_3years*0.5 < 1500000000){echo "Large";
                                                                
                                                             }else if($data->turn_over_of_last_3years*0.5 >1500000000){echo "Very Large";}
                                                              ?></td>
                                                             <td>
                                                            <a href="<?php echo base_url('home/getStageOne')?>?id=<?= $data->id;?>" class="btn btn-sm btn-secondary">
                                                                View
                                                            </a>
                                                             
                                                            <a href="<?php echo base_url('home/acceptStageOne')?>?id=<?= $data->id;?>" class="btn btn-sm btn-primary">
                                                                Accept
                                                            </a>
                                                            <a href="<?php echo base_url('home/rejectStageOne')?>?id=<?= $data->id;?>" class="btn btn-sm btn-danger">
                                                                Reject
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('home/getStageTwo')?>?id=<?= $data->id;?>" class="btn btn-sm btn-secondary">
                                                                View
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
                                                                Accept
                                                            </a>
                                                            <a href="#" class="btn btn-sm btn-danger">
                                                                Reject
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('home/siteVisitReport')?>" class="btn btn-sm btn-secondary">
                                                                Add
                                                            </a>
                                                            
                                                        </td>
                                                        <td>
                                                            <a href="<?php echo base_url('home/pqscore')?>" class="btn btn-sm btn-primary">
                                                               Add
                                                            </a>
                                                        </td>
                                                    </tr>
 

                                                            <?php
                                                        }

                                                         ?>
                                                         
                                                       
                                                   

                                                   
                                                </tbody>			  
                                                <tfoot>
                                                    <tr>
                                                        <th>Sl. No</th>
                                                        <th>Date of Submission </th>
                                                        <th>Vendor Name</th>
                                                        <th>Type of agency </th>
                                                        <th>Package name  </th>
                                                        <th>Financial Categorization</th>
                                                        <th>Stage 1 Form</th>
                                                        <th>Stage 2 Form</th>
                                                        <th>Site Visit Report</th>
                                                        <th>PQ Score</th>
                                                    </tr>
                                                </tfoot>
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
<div class="modal fade" id="myModal" role="dialog" style="display:none">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
          <p>Approves successfuly.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-success btn-sm" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
 