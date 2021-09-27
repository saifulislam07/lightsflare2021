<div class="banner">
    <?php
    $slider = $this->Common_model->get_data_list_by_single_column('home_slider', 'status', 'Active');
//      dumpVar($slider);
    ?>
    <!-- slideshow start -->
    <!-- ================ -->

    <div class="slideshow">

        <!-- slider revolution start -->
        <!-- ================ -->
        <div class="slider-banner-container">
            <div class="slider-banner">
                <ul>
                    <!-- slide 1 start -->
                    <?php foreach ($slider as $key => $value): ?>
                        <li data-transition="random" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="Premium HTML5 template">

                            <!-- main image -->

                            <img src="<?php echo base_url('assets/admin/' . $value->image) ?>"  alt="slidebg1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                            <!-- LAYER NR. 1 -->
                          

                        </li>
                    <?php endforeach; ?>
                    <!-- slide 1 end -->

                    <!-- slide 2 start -->

                    <!-- slide 3 end -->

                </ul>
                <div class="tp-bannertimer tp-bottom"></div>
            </div>
        </div>
        <!-- slider revolution end -->

    </div>
    </div>


    