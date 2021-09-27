    <?php
        $dataArray = array(
            "status" => "Active",
            "season" => "2020",
        );
        $jurys = $this->Common_model->get_data_list_by_many_columns('jury', $dataArray);
        //  dumpVar($jurys);
        ?>
<section class="main-container">
    <div class="container">
        <div class="row">
            <div class="main col-md-10 col-md-offset-1">
                <div class="default-bg text-muted clearfix pr-20 pl-20">
                    <h2 class="text-center">OUR JURY</h2>
                </div>
            </div>
        </div>
     
        <?php if (empty($jurys)): ?>
        <div class="row">
            <div class="main col-md-10 col-md-offset-1">
                <div class="default-bg text-muted clearfix pr-20 pl-20">
                    <h2 class="text-center">Will be announced soon</h2>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="space"></div>
        
    

        <!-- main start -->
        <!-- ================ -->
        <div class="row">
            <div class="main col-md-10 col-md-offset-1">
                <?php if (!empty($jurys)): ?>
                    <?php foreach ($jurys as $each): ?>
                        <div class="default-bg text-muted clearfix pr-20 pl-20">
                            <div class="testimonial clearfix">
                                <div class="testimonial-image">
                                    <?php if (!empty($each->image)): ?>
                                        <img src="<?php echo base_url('assets/admin/jurys/' . $each->image) ?>" alt="Jane Doe" title="Jane Doe" class="img-circle">
                                    <?php endif; ?>

                                </div>
                                <div class="testimonial-body">
                                    <h3 class="title"><?php echo $each->name ?></h3>
                                    <h4 class="title"><?php echo $each->title ?></h4>
                                    <?php echo $each->bio; ?>
                                </div>
                            </div>
                        </div>
                        <div class="space"></div>
                    <?php endforeach; ?>

                <?php endif; ?>


            </div>
        </div>

    </div>
</section>