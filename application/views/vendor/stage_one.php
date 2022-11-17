 
<!-- Main content -->
<section class="content">

    <!-- Content Header (Page header) -->	  
    <div class="content-header">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-block">
                <h3 class="page-title br-0">Stage One Form</h3>
            </div>
        </div>
    </div> 
    <div class="row">
        <div class="col-12">
            <!-- Step wizard -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h4 class="box-title">Stage One</h4>
                </div>
                <div class="box-body pb-0">
                    <?php foreach ($stageOne as $data) { ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wlastName2"> Type of agency: <span class="danger">*</span> </label>
                                    <input type="text" class="form-control required" id="website" name="website" value="<?php echo $data->natureName; ?>" disabled> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wlastName2"> Package name :<span class="danger">*</span> </label>
                                    <input type="text" class="form-control required" id="website" name="website" value="<?php echo $data->typeOfWork; ?>" disabled> 
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Company Name : <span class="danger">*</span> </label>
                                    <input type="text" class="form-control required" id="wfirstName2" name="company_name" value="<?php echo $data->company_name; ?>" disabled> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wlastName2"> User Name : <span class="danger">*</span> </label>
                                    <input type="text" class="form-control required" id="wlastName2" name="user_name" value="<?php echo $data->user_name; ?>" disabled> </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wemailAddress2"> Email Address : <span class="danger">*</span> </label>
                                    <input type="email" class="form-control required" id="wemailAddress2" name="email" value="<?php echo $data->email; ?>" disabled> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wlastName2">Phone Number : <span class="danger">*</span></label>
                                    <input type="tel" class="form-control required" id="phno" name="contact_number" value="<?php echo $data->contact_number; ?>" disabled> </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wdate2">
                                        Average Turn Over for Last 3 yrs (In Crores) :
                                        <span class="danger">*</span></label>
                                    <input type="number" class="form-control required" id="turnovlast3y" name="turn_over_of_last_3years" value="<?php echo $data->turn_over_of_last_3years; ?>" placeholder="Turn Over for Last 3 yrs" disabled> </div>
                            </div> 
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="wfirstName2"> Primary Location : <span class="danger">*</span> </label>
                                    <select class="custom-select form-control required" id="location" name="location" disabled>
                                        <option value="<?php echo $data->location; ?>" selected disabled><?php echo 'NCR'; ?></option>


                                    </select>
                                </div>    
                            </div>  
                            <div class="col-md-6"  style="display:none">
                                <label for="typeOfWork"><b>Interested Zones (Other than Primary location) :</b></label> 
                                <div id="interested_zones" >
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_1" name="interested_zones[]" value="NCR">
                                        <label class="form-check-label" for="checkbox_1">NCR</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_2" value="Mumbai" name="interested_zones[]">
                                        <label class="form-check-label" for="checkbox_2">Mumbai</label>
                                    </div>    
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_3" value="Pune" name="interested_zones[]">
                                        <label class="form-check-label" for="checkbox_3">Pune</label>
                                    </div> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_4" value="South" name="interested_zones[]">
                                        <label class="form-check-label" for="checkbox_4">South</label>
                                    </div> 
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="checkbox_5" value="East" name="interested_zones[]">
                                        <label class="form-check-label" for="checkbox_5">Kolkata</label>
                                    </div>
                                </div>
                            </div> 
                        <?php }
                        ?>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wfirstName2"> City Name : <span class="danger">*</span> </label>
                                <select class="custom-select form-control required" id="wLocation2" name="city_name" disabled>
                                    <option value="" selected><?php echo $data->city_name; ?></option>
                                    <option value="India">India</option> 
                                </select>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlastName2"> Clientele : <span class="danger">*</span> </label>
                                <input type="text" class="form-control required" id="Clientele" name="clientele" value="<?php echo $data->clientele; ?>" disabled > </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wfirstName2"> Registered Address (Agency) : <span class="danger">*</span> </label>
                                <textarea class="form-control required" id="address" name="address" value="" disabled><?php echo $data->address; ?></textarea>
                                <!-- <input type="text" class="form-control required" id="address" name="address">  -->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wlastName2"> Website : </label>
                                <input type="text" class="form-control required" id="website" name="website" value="<?php echo $data->website; ?>" disabled> 
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="wfirstName2"> Profile :  </label>
                                <?php if ($data->profile) { ?>
                                    <a href="<?php echo base_url('assets/' . $data->profile); ?>" download="" class="btn btn-sm btn-primary">Download</a>
                                <?php } ?>
                            </div>
                        </div> 
                    </div>

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
