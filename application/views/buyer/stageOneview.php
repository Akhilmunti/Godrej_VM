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
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Step wizard -->
                                <div class="box box-default">
                                    <div class="box-body pb-0">
                                        <h4><b>Stage One</b></h4>
                                <section>  
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="wlocation2">Type of agency: <span class="danger">*</span> </label>
                                                <select class="custom-select form-control required" id="registration" name="location">
                                                    <option value="">Select Type of agency</option> 
                                                    <option value="1" >Vendor</option>
                                                    <option value="2">Consultant</option>
                                                     <option value="3">Contractor</option>
                                                     <option value='4'>Dealers</option> 
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-md-6" id="vendor"  >
                                                    <label for="lastName1">Package name   :</label>
                                                    <select class=" custom-select form-control required" id="typeofwork" name="typeofwork">
                                                                <option>Select Package name  </option>
                                                                <option value="vendor" id="vendor">Lifts</option>
                                                                <option>RMC</option>
                                                                <option>Contractor</option>
                                                                <option>Steel (rebar & structural steel)</option> 
                                                                <option value="vendor" id="vendor">Cement</option>
                                                                <option>Flooring (tiles, various stone, wooden, vinyl etc.</option>
                                                                <option>Doors, windows & hardware (wooden, aluminium, steel, PVC, UPVC</option>
                                                                <option>Air conditioners / air-conditioning system</option> 
                                                                <option>Electrical equipment and fitting  </option>
                                                                <option value="vendor" id="vendor">Modular kitchen</option>
                                                                <option>Formwork</option>
                                                                <option>Furnitures</option>
                                                                <option>CP & sanitary ware</option> 
                                                                <option value="vendor" id="vendor">Structural glazing</option>
                                                                <option>Miscellaneous (any supplies not mentioned above)</option>
                                                                
                                                    </select>
                                                </div>
                                                  <div class="col-md-6" id="consultant" style="display: none">
                                                       <label for="lastName1">Type of Work    :</label>
                                                     <select class="form-control">
                                                        <option>Select Type of Work  </option>
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
                                                      <label for="lastName1">Type of Work    :</label>
                                                     <select class="form-control">
                                                        <option>Select Type of Work  </option>
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
                                    </div>
                                </div>
                                <!-- /.box -->
                            </div>
                        </div>

                    </section>
                    <!-- /.content -->
                </div>
            </div> 
}
}
