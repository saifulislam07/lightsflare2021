<marquee  direction="left" style="color: red; text-shadow: 0.1em 0.1em 0.15em #526ca7 ">Here is the summary of 𝗟𝗶𝗴𝗵𝘁𝘀𝗙𝗹𝗮𝗿𝗲 𝗜𝗻𝘁𝗲𝗿𝗻𝗮𝘁𝗶𝗼𝗻𝗮𝗹 𝗣𝗵𝗼𝘁𝗼𝗴𝗿𝗮𝗽𝗵𝘆 𝗔𝘄𝗮𝗿𝗱 𝟮𝟬𝟮𝟬, Season 1. We received  total of 4358 pictures in 5 categories with the participation of 632 participants from 𝟒𝟒 𝐜𝐨𝐮𝐧𝐭𝐫𝐢𝐞𝐬 of the world. From here  total 17 pictures will be selected for the Award.</marquee>

<section class="main-container">
    <div class="container">
        <h2 class="page-title margin-top-clear ">LightsFlare International Photography Awards list 2020</h2>
        <?php foreach ($allExhibitionData as $each): ?>


            <div class="row">
                <!-- main start -->
                <!-- ================ -->
                <div class="main col-md-8">
                    <!-- page-title start -->
                    <!-- ================ -->
                    
                    <!-- page-title end -->
                    <!-- Tab panes -->
                    <div class="tab-content clear-style">
                        <div class="tab-pane active" id="portfolio-images">
                            <div class="owl-carousel content-slider-with-controls">
                                <div class="overlay-container">
                                    <img src="<?php echo site_url('assets/admin/exhibition/' . $each->image); ?>" alt="">
                                    <a href="<?php echo site_url('assets/admin/exhibition/' . $each->image); ?>" class="popup-img overlay" title="<?php echo $each->uname.'( '.$each->nicename.' )' ?>"><i class="fa fa-search-plus"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- main end -->

                <!-- portfolio sidebar start -->
                <aside class="col-md-4">
                    <div class="sidebar">
                        <div class="portfolio-item side vertical-divider-left">
                            <div class="row">
                                <div class="col-xs-6 col-sm-3 col-md-12">
                                    <div class="block clearfix">
                                        <h3 class="title margin-top-clear">Photographer Info</h3>
                                        <ul class="list">
                                            <li><strong class="vertical-divider">Photographer </strong> <?php echo $each->uname ?></li>
                                            <li><strong class="vertical-divider">Country </strong> <?php echo $each->nicename ?></li>
                                            <li><strong class="vertical-divider">Category </strong> <?php echo $each->title ?></li>
                                            <li><strong class="vertical-divider">Place </strong> 
                                                <?php
                                                if($each->type == 1) {
                                                    echo '<b>Winner</b>';
                                                } elseif($each->type == 2) {
                                                    echo '<b>1st Runner Up</b>';
                                                } elseif($each->type == 3) {
                                                    echo '<b>2nd Runner Up</b>';
                                                } elseif ($each->type == 4) {
                                                    echo '<b>Honorable Mention</b>';
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                        <img width="200px" src="<?php echo site_url('assets/admin/exhibition/' . $each->tag); ?>" alt="">
                                    </div>

                                </div>  
                            </div>
                        </div>
                    </div>
                </aside>
                <!-- portfolio sidebar end -->

            </div>
        <?php endforeach; ?>

    </div>
</section>



