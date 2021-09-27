<section class="main-container">
    <div class="container">
        <div class="row">
            <?php $rules = $this->Common_model->get_single_data_by_single_column('rules', 'status', 'Active', 'id', 'DESC'); ?>
            <div class="box-style-1 white-bg object-non-visible animated object-visible fadeInUpSmall" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                <?php echo $rules->details ?>
            </div>
        </div><div class="row" >
            <div class="col-md-12 text-center" >
                <a class="btn btn-success" href="<?php echo site_url('user-signup') ?>">SUBMIT PHOTOS</a>
            </div>
        </div>

    </div>
</section>