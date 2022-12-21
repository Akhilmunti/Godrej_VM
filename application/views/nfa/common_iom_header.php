

<?php if ( $mId == null){ ?>

<div class="content-header">

     <div class="row">
            <div class="col-lg-9">
                <h5 class="page-title br-0">Award Recommendation for <?php echo $hd_awdType;?> | Create IOM |<?php echo $records[0]->project_name ?> | <?php echo $records[0]->package_name ?></h5>

            </div>
            <div class="col-lg-3 text-right">
             <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
            </div>
    </div></div>
<?php } else{ ?>

    <div class="content-header">
            <div class="row">
                <div class="col-lg-9">
			<h5 class="page-title br-0">Award Recommendation for <?php echo $hd_awdType;?>| <?php echo ($updType=="RF") ? "Refloat" : "Edit" ?> IOM | <?php echo $records[0]['project_name'] ?> | <?php echo $records[0]['package_name'] ?></h5>
                </div>
                <div class="col-lg-3 text-right">
                         <button type="button" onclick="history.back()" class="btn btn-secondary rounded">Go Back</button>
                </div>
            </div>
						
    </div>
 <?php }?>







