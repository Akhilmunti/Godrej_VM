<?php 
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
$mSessionRole = $this->session->userdata('session_role');

?>
<div class="row text-right mt-20">
    <?php if($hd_awdType =="Contract"){?>

        <div class="col-lg-12">
        <?php if($mSessionRole=="PCM")
        { ?>
            <a href="<?php echo base_url('nfa/Award_contract/actionAdd/' . $hd_project_id . "/$hd_zone/$hd_type_work_id" ); ?>">
            <button type="button" class="btn btn-primary border-secondary rounded mr-10" style="width:25%;">Create IOM</button>
            </a>
        <?php 
        }
        ?>
        <a href="<?php echo base_url('nfa/Award_contract/reports')?>">
        <button type="button" class="btn btn-primary border-secondary rounded" style="width:25%;">IOM Reports</button>
        </a>
    </div>

   <?php } ?>

   <?php if($hd_awdType =="Procurement"){?>

        <div class="col-lg-12">
        <?php if($mSessionRole=="PCM")
        { ?>
            <a href="<?php echo base_url('nfa/Award_procurement/actionAdd/' . $hd_project_id . "/$hd_zone/$hd_type_work_id" ); ?>">
            <button type="button" class="btn btn-primary border-secondary rounded mr-10" style="width:25%;">Create IOM</button>
            </a>
        <?php 
        }
        ?>
        <a href="<?php echo base_url('nfa/Award_procurement/reports')?>">
        <button type="button" class="btn btn-primary border-secondary rounded" style="width:25%;">IOM Reports</button>
        </a>
        </div>

    <?php } ?>
    
</div>

<form id="nfaForm" method="POST" action="<?php echo base_url('nfa/ListNfa/award_recomm_list'); ?>" >
<div class="row mt-4">
<?php 
if ($hd_project_id == null && $hd_type_work_id == null){

    if($mSessionRole=="MD" || $mSessionRole=="COO" || $mSessionRole=="HO - C&P" || $mSessionRole=="HO" || $mSessionRole=="Zonal CEO"|| $mSessionRole=="RH"|| $mSessionRole=="OH"|| $mSessionRole=="Project Director"|| $mSessionRole=="CH"|| $mSessionRole=="Regional C&P Head"|| $mSessionRole=="Regional C&P Team")
    {
    ?>
        <div class="col-lg-3">
            <div class='form-group'>
                <label>Type</label>
                <select id="awdType" name="awdType"  class="form-control">
                    <!--<option value="">All</option>-->
                    <option value="Contract" <?php echo ($awdType=="Contract") ? "selected": ""?>>Contract</option>
                    <option value="Procurement" <?php echo ($awdType=="Procurement") ? "selected": ""?>>Procurement</option>
                
                </select>
            </div>
        </div>

        <div class="col-lg-3">
            <div class='form-group'>
                <label>Project Name</label>
                <select id="project_id" name="project_id" class="form-control">
                    <option value="">All</option>
                    <?php foreach ($projects as $key => $pro) { ?>
                    <option <?php
                    if ($project_id == $pro['project_id'] ) {
                        echo "selected";
                    }
                    ?> value="<?php echo $pro['project_id']; ?>"><?php echo $pro['project_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <?php 
    }
}
?>
    <div class="col-lg-3">
        <div class='form-group'>
            <label>Status</label>
            <select id="nfaStatus" name="nfaStatus" class="form-control">
                <option value="">All</option>
                <option value="Pending" <?php echo ($nfaStatus=="Pending") ? "selected": ""?>>Pending</option>
                <option value="Approved" <?php echo ($nfaStatus=="Approved") ? "selected": ""?>>Approved</option>
                <?php if($mSessionRole=="PCM")
                 { ?>
                <option value="Draft" <?php echo ($nfaStatus=="Draft") ? "selected": ""?>>Draft</option>
                <option value="Returned" <?php echo ($nfaStatus=="Returned") ? "selected": ""?>>Returned</option>
                <option value="Cancelled" <?php echo ($nfaStatus=="Cancelled") ? "selected": ""?>>Cancelled</option>
                <option value="Amended" <?php echo ($nfaStatus=="Amended") ? "selected": ""?>>Amended</option>
               <?php }?>
            </select>
        </div>
    </div>
    <?php 
if ($hd_project_id == null && $hd_type_work_id == null){
    if($mSessionRole=="MD" || $mSessionRole=="COO" || $mSessionRole=="HO - C&P" || $mSessionRole=="HO" )
    {
    ?>
        <div class="col-lg-3">
            <div class='form-group'>
                <label>Zone</label>
                <select id="zone" name="zone" class="form-control">
                    <option value="">All</option>
                    <option value="NCR" <?php echo ($zone=="NCR") ? "selected": ""?>>NCR</option>
                    <option value="Mumbai" <?php echo ($zone=="Mumbai") ? "selected": ""?>>Mumbai</option>
                    <option value="Pune" <?php echo ($zone=="Pune") ? "selected": ""?>>Pune</option>
                    <option value="South" <?php echo ($zone=="South") ? "selected": ""?>>South</option>
                    <option value="Kolkata" <?php echo ($zone=="Kolkata") ? "selected": ""?>>Kolkata</option>
                    <option value="PAN India" <?php echo ($zone=="PAN India") ? "selected": ""?>>PAN India</option>
                </select>
            </div>
        </div>
<?php 
    }
}
?>
</div>
<div class="row ">
    <div class="col-lg-12 text-right">
    <input type="hidden" name="hd_awdType" id="hd_awdType" value="<?php echo ($awdType) ? $awdType : $hd_awdType; ?>">
        <input type="hidden" name="hd_project_id" id="hd_project_id" value="<?php echo $hd_project_id ?>">
        <input type="hidden" name="hd_zone" id="hd_zone" value="<?php echo $hd_zone ?>">
        <input type="hidden" name="hd_type_work_id" id="hd_type_work_id" value="<?php echo $hd_type_work_id ?>">
        <button type="submit" name="filter" class="btn btn-primary border-secondary rounded font-weight-bold">Filter</button>
    </div>
</div>
</form>