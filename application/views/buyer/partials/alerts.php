<?php $alert = $this->session->flashdata('error'); ?>
<?php if ($alert) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><?php echo $alert; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $this->session->set_flashdata('error', ''); ?>
<?php } ?>

<?php $alert2 = $this->session->flashdata('success'); ?>
<?php if ($alert2) { ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong><?php echo $alert2; ?></strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $this->session->set_flashdata('success', ''); ?>
<?php } ?>