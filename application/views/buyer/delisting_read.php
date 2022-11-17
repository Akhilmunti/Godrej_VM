<!DOCTYPE html>
<html lang="en">

    <?php $this->load->view('buyer/partials/header'); ?>

    <style>
        table tr input[type='number']{
            width: 150px;
        }

        table tr input[type='text']{
            width: 150px;
        }

        table tr input[type='file']{
            width: 200px;
        }
    </style>

    <body class="hold-transition light-skin sidebar-mini theme-blueindigo onlyheader">

        <div class="wrapper">

            <div class="art-bg">
                <img src="<?php echo base_url('assets/'); ?>images/art1.svg" alt="" class="art-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art2.svg" alt="" class="art-img dark-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg.svg" alt="" class="wave-img light-img">
                <img src="<?php echo base_url('assets/'); ?>images/art-bg2.svg" alt="" class="wave-img dark-img">
            </div>

            <?php $this->load->view('buyer/partials/navbar'); ?>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <div class="container-full clearfix position-relative">	

                    <?php $this->load->view('buyer/partials/sidebar'); ?>

                    <!-- Main content -->
                    <section class="content">

                        <!-- Content Header (Page header) -->	  
                        <div class="content-header">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-block">
                                    <h3 class="page-title br-0">De-listing of vendors</h3>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <form method="POST" action="<?php echo base_url('buyer/vendor/actionSendForDelisting'); ?>">
                                    <!-- Step wizard -->
                                    <div class="box box-default">
                                        <!-- /.box-header -->
                                        <div class="box-body wizard-content">
                                            <?php $this->load->view('buyer/partials/alerts'); ?>
                                            <div class="row">
                                                <?php
                                                $mReason = json_decode($record['delisting_reason']);
                                                ?>
                                                <div class="col-md-12 mt-4">
                                                    <input <?php
                                                    if (in_array("Misrepresentation of information by agency during pre-qualification or bidding process", $mReason)) {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="checkbox_delisting_reason1" name="delisting_reason[]" value="Misrepresentation of information by agency during pre-qualification or bidding process">
                                                    <label class="form-check-label" for="checkbox_delisting_reason1">
                                                        Misrepresentation of information by agency during pre-qualification or bidding process
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <input <?php
                                                    if (in_array("Fraud or Forgery committed by agency or his authorized representative", $mReason)) {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="checkbox_delisting_reason2" name="delisting_reason[]" value="Fraud or Forgery committed by agency or his authorized representative">
                                                    <label class="form-check-label" for="checkbox_delisting_reason2">
                                                        Fraud or Forgery committed by agency or his authorized representative
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <input <?php
                                                    if (in_array("Gross error or negligence in provision of service", $mReason)) {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="checkbox_delisting_reason3" name="delisting_reason[]" value="Gross error or negligence in provision of service">
                                                    <label class="form-check-label" for="checkbox_delisting_reason3">
                                                        Gross error or negligence in provision of service
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <input <?php
                                                    if (in_array("Termination of Contract on contractor’s risk & cost", $mReason)) {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="checkbox_delisting_reason4" name="delisting_reason[]" value="Termination of Contract on contractor’s risk & cost">
                                                    <label class="form-check-label" for="checkbox_delisting_reason4">
                                                        Termination of Contract on contractor’s risk & cost
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <input <?php
                                                    if (in_array("Legal non – compliance by agency", $mReason)) {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="checkbox_delisting_reason5" name="delisting_reason[]" value="Legal non – compliance by agency">
                                                    <label class="form-check-label" for="checkbox_delisting_reason5">
                                                        Legal non – compliance by agency
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <input <?php
                                                    if (in_array("Others", $mReason)) {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="checkbox_delisting_reason6" name="delisting_reason[]" value="Others">
                                                    <label class="form-check-label" for="checkbox_delisting_reason6">
                                                        Others
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <label>More details of reason for de-listing</label>
                                                    <textarea name="delisting_reason_more" required class="form-control" disabled rows="5"><?php echo $record['delisting_reason_more'] ?></textarea>  
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <label>Email Sent</label>
                                                    <input <?php
                                                    if ($record['delisting_mail'] == "1") {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="radio" id="checkbox_delisting_mail33" name="delisting_mail" value="1">
                                                    <label class="form-check-label mr-3" for="checkbox_delisting_mail33">
                                                        Yes
                                                    </label>
                                                    <input <?php
                                                    if ($record['delisting_mail'] == "0") {
                                                        echo 'checked';
                                                    }
                                                    ?> class="form-check-input" type="radio" id="checkbox_delisting_mail44" name="delisting_mail" value="0">
                                                    <label class="form-check-label" for="checkbox_delisting_mail44">
                                                        No
                                                    </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Recommender Name*</label>
                                                    <input name="delisting_recommender" value="<?php echo $this->session->userdata('session_name'); ?>" readonly="" class="form-control" disabled type="text" />
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Approver 1 RO C&P Head *</label>
                                                    <select name="delisting_ro" required="" class="form-control" disabled>
                                                        <option disabled="" selected="" value="">Select</option>
                                                        <?php foreach ($RO as $key => $recordr) { ?>
                                                            <option <?php
                                                            if ($record['delisting_ro'] == $recordr['buyer_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $recordr['buyer_id']; ?>"><?php echo $recordr['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Approver 2 OH *</label>
                                                    <select name="delisting_oh" required="" class="form-control" disabled>
                                                        <option disabled="" selected="" value="">Select</option>
                                                        <?php foreach ($OH as $key => $recordr) { ?>
                                                            <option <?php
                                                            if ($record['delisting_oh'] == $recordr['buyer_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $recordr['buyer_id']; ?>"><?php echo $recordr['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>Approver 3 HO C&P *</label>
                                                    <select name="delisting_ho" required="" class="form-control" disabled>
                                                        <option disabled="" selected="" value="">Select</option>
                                                        <?php foreach ($HO as $key => $recordr) { ?>
                                                            <option <?php
                                                            if ($record['delisting_ho'] == $recordr['buyer_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $recordr['buyer_id']; ?>"><?php echo $recordr['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label>COO*</label>
                                                    <select name="delisting_coo" required="" class="form-control" disabled>
                                                        <option disabled="" selected="" value="">Select</option>
                                                        <?php foreach ($COO as $key => $recordr) { ?>
                                                            <option <?php
                                                            if ($record['delisting_coo'] == $recordr['buyer_id']) {
                                                                echo 'selected';
                                                            }
                                                            ?> value="<?php echo $recordr['buyer_id']; ?>"><?php echo $recordr['buyer_name']; ?></option>
                                                            <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </form>
                            </div>
                        </div>			
                    </section>
                    <!-- /.content -->
                </div>
            </div>
            <!-- /.content-wrapper -->
            <?php $this->load->view('buyer/partials/footer'); ?>

            <!-- Control Sidebar -->
            <?php $this->load->view('buyer/partials/control'); ?>
            <!-- /.control-sidebar -->

            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>

        </div>
        <!-- ./wrapper -->

        <?php $this->load->view('buyer/partials/scripts'); ?>

        <script>
            $('#type_of_work').change(function () {
                $.post("<?php echo base_url('buyer/vendor/getVendorsByTypeOfWork'); ?>",
                        {
                            id: this.value,
                        },
                        function (data, status) {
                            $('#vendors').html(data);
                        });
            });
        </script>

    </body>
</html>