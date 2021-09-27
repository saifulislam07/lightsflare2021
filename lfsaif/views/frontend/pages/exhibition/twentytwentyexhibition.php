<marquee  direction="left" style="color: red; text-shadow: 0.1em 0.1em 0.15em #526ca7 ">Here is the summary of 𝗟𝗶𝗴𝗵𝘁𝘀𝗙𝗹𝗮𝗿𝗲 𝗜𝗻𝘁𝗲𝗿𝗻𝗮𝘁𝗶𝗼𝗻𝗮𝗹 𝗣𝗵𝗼𝘁𝗼𝗴𝗿𝗮𝗽𝗵𝘆 𝗔𝘄𝗮𝗿𝗱 𝟮𝟬𝟮𝟬, Season 1. We received  total of 4358 pictures in 5 categories with the participation of 632 participants from 𝟒𝟒 𝐜𝐨𝐮𝐧𝐭𝐫𝐢𝐞𝐬 of the world. From here  total of 100 pictures will be Finalist and 17 pictures will be selected for the Award.</marquee>

<section class="main-container">
    <div class="container">
        <h2 class="page-title margin-top-clear ">LightsFlare International Photography Exhibition 2020</h2>
        <div class="row">
            <?php foreach ($allExhibitionDataExhi as $each): ?>
                <div class="main col-md-3" >
                    <div class="box-style-1 white-bg" >
                        <div class="overlay-container" style="height: 335px;">
                            <div class="tab-content clear-style"  >
                                <div class="tab-pane active" id="portfolio-images">
                                    <div class=" content-slider-with-controls ">
                                        <div class="overlay-container">
                                            <img style="height: 170px; overflow-x: hidden; margin: 0 auto"  src="<?php echo site_url('assets/admin/exhibition/' . $each->image); ?>" alt="">
                                            <a href="<?php echo site_url('assets/admin/exhibition/' . $each->image); ?>" class="popup-img overlay" title="<?php echo $each->uname.' ( '.$each->nicename.' )' ?>"><i class="fa fa-search-plus"></i></a>
                                        </div>

                                    </div>

                                    <div>
                                        <strong class="vertical-divider">Photographer </strong>: <?php echo $each->uname ?><br>
                                        <strong class="vertical-divider">Country </strong>: <?php echo $each->nicename ?><br>
                                        <strong class="vertical-divider">Category </strong>: <?php echo $each->title ?><br>
                                        <strong class="vertical-divider">Place </strong>:
                                        <?php
                                        if ($each->type == 1) {
                                            echo '<b>Winner</b>';
                                        } elseif ($each->type == 2) {
                                            echo '<b>1st Runner Up</b>';
                                        } elseif ($each->type == 3) {
                                            echo '<b>2nd Runner Up</b>';
                                        } elseif ($each->type == 4) {
                                            echo '<b>Honorable Mention</b>';
                                        } elseif ($each->type == 5) {
                                            echo '<b>Finalist</b>';
                                        }
                                        ?>
                                  
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>



