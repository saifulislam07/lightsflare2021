<?php
$dataArray = array(
    "status" => "Active",
    "season" => "2020",
    "type" => "District",
);

$uni = array(
    "status" => "Active",
    "season" => "2020",
    "type" => "University",
);
$ambassadors = $this->Common_model->get_data_list_by_many_columnss('ambassador', $dataArray);
$university = $this->Common_model->get_data_list_by_many_columnss('ambassador', $uni);
// dumpVar($ambassadors);
?>

<div class="section gray-bg clearfix">
    <div class="container">
        <h1 class="page-title">Area Ambassadors</h1>
        <div class="separator-2"></div>

        <div class="row grid-space-20">
            <?php if (!empty($ambassadors)): ?>
                <?php foreach ($ambassadors as $each): ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="box-style-1 white-bg team-member">
                            <div class="overlay-container">
                                <?php if (!empty($each->image)): ?>
                                    <img src="<?php echo base_url('assets/admin/ambassador/' . $each->image) ?>" >
                                <?php endif; ?>

                                <div class="overlay">
                                    <ul class="social-links clearfix">
                                    <li class="facebook">
                                        
                                        <a target="_blank" href="<?php echo $each->fb_id?>"><i class="fa fa-facebook"></i></a>
                                    
                                    </li>
                                    </ul>
                                </div>
                            </div>
                            <h3 ><?php echo $each->name ?></h3>
                            <?php echo $each->area ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>

    <div class="container">

        <h1 class="page-title">University Ambassadors</h1>
        <div class="separator-2"></div>

        <div class="row grid-space-20">
            <?php if (!empty($university)): ?>
                <?php foreach ($university as $eachs): ?>


                    <div class="col-md-3 col-sm-6">
                        <div class="box-style-1 white-bg team-member">
                            <div class="overlay-container">
                                <?php if (!empty($eachs->image)): ?>
                                    <img src="<?php echo base_url('assets/admin/ambassador/' . $eachs->image) ?>" >
                                <?php endif; ?>

                                <div class="overlay">
                                    <ul class="social-links clearfix">

                                         <a target="_blank" href="<?php echo $eachs->fb_id?>"><i class="fa fa-facebook"></i></a>
                                    </ul>
                                </div>
                            </div>
                            <h3><?php echo $eachs->name ?></h3>
                            <?php echo $eachs->University ?>
                        </div>
                    </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>
    </div>
</div>