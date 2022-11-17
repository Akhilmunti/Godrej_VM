 
<body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader theme-blueindigo bg-img" style="background-image: url(https://managequote.in/V1/assets/images/godrej-back.jpeg);">

    <div class="h-p100">
        <div class="row align-items-center justify-content-md-center h-p100 mt-30">
            <div class="col-lg-12 col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-xl-6 col-lg-7 col-md-6 col-12">
                        <div class="bg-opacity-90 depth-4 rounded">
                            <div class="box-body wizard-content">

                                <div class="row">
                                    <div class="col-md-12">
                                        <a class="text-black" href="<?php echo base_url(); ?>">
                                            <span class="fa fa-home fa-2x"></span>
                                        </a>
                                    </div>
                                </div>

                                <div class="content-top-agile p-30 pb-0">
                                    <h2 class="text-primary text-left">Registration</h2>                            
                                </div>
                                <form id="register_form" action="<?php echo base_url('home/insert_register'); ?>" method="POST" class="validation-wizard" enctype="multipart/form-data">
                                    <!-- Step 1 -->
                                    <h6> </h6>
                                    <section>  
                                        <div class="row">
                                            <div class="col-md-6">
                                                <!-- <div class="form-group"> -->
                                                <!-- <div class="controls">  -->
                                                <label for="wlocation2">Select Type of agency: <span class="text-danger">*</span> </label>
                                                <select id="nature_of_business" name="nature_of_business" required  class="form-control">
                                                    <option value="" disabled="" selected="">Select Type of agency</option>
                                                    <?php foreach ($getVendor as $vendor) { ?>
                                                        <option value="<?php echo $vendor->id; ?>"><?php echo $vendor->name; ?></option> 
                                                    <?php }
                                                    ?>
                                                </select> 
                                            </div> 
                                            <div class="col-md-6" id="vendor">
                                                <label for="typeOfWork">Type of Work    :</label> 
                                                <select id="type_of_work" name="type_of_work" required="" class="form-control">
                                                    <option value="" disabled="" selected="">Select Type of Work</option>
                                                </select> 
                                            </div>
                                            <div class="col-md-6" id="consultant" style="display: none">
                                                <label for="lastName1">Package name    :</label>
                                                <select class="form-control">
                                                    <option>Select Package name  </option>
                                                    <option value="vendor" id="vendor">Structural Design</option>
                                                    <option>Services Design</option>
                                                    <option>Geo – Technical Investigation</option>
                                                    <option>Topographical Survey</option> 
                                                    <option value="vendor" id="vendor">Quantity Survey & Cost Planning</option>
                                                    <option>PMC</option>
                                                    <option>Miscellaneous (any service not mentioned above)</option>          
                                                </select>
                                            </div>
                                            <div class="col-md-6" id="contractor" style="display: none">
                                                <label for="lastName1">Package name    :</label>
                                                <select class="form-control">
                                                    <option>Select Package name </option>
                                                    <option value="vendor" id="vendor">Excavation & Shore Piling</option>
                                                    <option>Core & Shell</option>
                                                    <option>HVAC</option>
                                                    <option>Plumbing</option> 
                                                    <option value="vendor" id="vendor">Firefighting</option>
                                                    <option>Electrical</option>
                                                    <option>External development including boundary wall</option>
                                                    <option>Landscaping</option> 
                                                    <option>Water Proofing</option>
                                                    <option value="vendor" id="vendor">STP & WTP</option>
                                                    <option>Miscellaneous works (Any type of work not mentioned above)</option> 
                                                </select>
                                            </div>
                                        </div>
                                    </section>
                                    <!-- Step 2 -->
                                    <h6> </h6>
                                    <section>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="company"> Company Name : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="wfirstName2" name="company_name"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="username"> User Name : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="wlastName2" name="user_name"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email"> Email Address : <span class="danger">*</span> </label>
                                                    <input type="email" class="form-control required" id="wemailAddress2" name="email"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone">Phone Number : <span class="danger">*</span></label>
                                                    <input type="tel" class="form-control required" id="phno" name="contact_number"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password">  Password : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="password" name="password"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="cpassword">Confirm Password :<span class="danger">*</span>
                                                    </label>
                                                    <input type="password" class="form-control required" id="comfpassword" name="comf_password"> </div>
                                            </div>

                                        </div>
                                        <div class="row"> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wdate2">
                                                        Average Turn Over for Last 3 yrs (In Crores) :
                                                        <span class="danger">*</span></label>
                                                    <input type="number" class="form-control required" id="turnovlast3y" name="turn_over_of_last_3years" value="" placeholder="Turn Over for Last 3 yrs" >
                                                </div>
                                            </div> 
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Primary Location (Zone) : <span class="danger">*</span> </label>
                                                    <select class="custom-select form-control required" id="location" name="location">
                                                        <option value="">Select Location</option>
                                                        <?php
                                                        foreach ($getlocation as $location) {
                                                            ?>
                                                            <option value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
                                                            <?php
                                                        }
                                                        ?>

                                                    </select>
                                                </div>    
                                            </div>  
                                            <div class="col-md-6" >
                                                <label for="typeOfWork"><b>Interested Zones (Other than Primary location) :</b></label> 
                                                <div id="interested_zones" style="display:none">
                                                    <div class="form-check form-check-inline" id="ncrBlock">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_1" name="interested_zones[]" value="NCR">
                                                        <label class="form-check-label" for="checkbox_1">NCR</label>
                                                    </div>
                                                    <div class="form-check form-check-inline" id="mumbaiBlock">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_2" value="Mumbai" name="interested_zones[]">
                                                        <label class="form-check-label" for="checkbox_2">Mumbai</label>
                                                    </div>    
                                                    <div class="form-check form-check-inline" id="puneBlock">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_3" value="Pune" name="interested_zones[]">
                                                        <label class="form-check-label" for="checkbox_3">Pune</label>
                                                    </div> 
                                                    <div class="form-check form-check-inline" id="southBlock">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_4" value="South" name="interested_zones[]">
                                                        <label class="form-check-label" for="checkbox_4">South</label>
                                                    </div> 
                                                    <div class="form-check form-check-inline" id="eastBlock">
                                                        <input class="form-check-input" type="checkbox" id="checkbox_5" value="Kolkata" name="interested_zones[]">
                                                        <label class="form-check-label" for="checkbox_5">Kolkata</label>
                                                    </div>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Clientele : <span class="danger">*</span> </label>
                                                    <textarea class="form-control required" id="Clientele" name="clientele"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Registered Address (Agency) : <span class="danger">*</span> </label>
                                                    <textarea class="form-control required" id="address" name="address"></textarea>
                                                    <!-- <input type="text" class="form-control required" id="address" name="address">  -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> City Name : <span class="danger">*</span> </label>
                                                    <input type="text" class="form-control required" id="wLocation2" name="city_name">
                                                </div>    
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wlastName2"> Website : </label>
                                                    <input type="text" class="form-control" id="website" name="website"> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> Profile : </label>
                                                    <input type="file" class="form-control" id="profile" name="profile">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="wfirstName2"> PAN No : </label>
                                                    <input type="text" class="form-control required" id="pan" name="pan">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="controls" id="controls" style="display: none">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </section>

                                    <!-- <button type="submit" style="display:none;"></button> -->
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
