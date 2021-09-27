<section class="main-container" style="min-height: 1000px">
    <div class="container">
        <div class="row">
            <div class=" col-md-6" style="min-height: 200px ">
                <div class="default-bg text-muted clearfix pr-20 pl-20">
                    <h2 class="text-center">SHORT RULES</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered ">
                            <tr style="color: black">
                                <td>Theme</td>
                                <td>OPEN</td>
                            </tr>
                            <tr style="color: black">
                                <td>Formate</td>
                                <td>jpeg / jpg</td>
                            </tr>
                            <tr style="color: black">
                                <td>Longer side</td>
                                <td>Maximum 1024 px</td>
                            </tr>
                            <tr style="color: black">
                                <td>Image Size</td>
                                <td> Maximum 2MB</td>
                            </tr>
                            <tr style="color: black">
                                <td>Capture Duration</td>
                                <td>After 01 January 2020</td>
                            </tr>
                            <tr style="color: black">
                                <td>Entry Fee</td>
                                <td>
                                    <table class="table table-bordered">
                                        <tr style="color: black">
                                            <td>1 Image</td>                                       
                                            <td>$15</td>                                       
                                        </tr>
                                        <tr style="color: black">
                                            <td>3 images</td>                                       
                                            <td>$30</td>                                       
                                        </tr>
                                        <tr style="color: black">
                                            <td>6 images</td>                                       
                                            <td>$40</td>                                       
                                        </tr>


                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" col-md-6" >
                <div class="default-bg text-muted clearfix pr-20 pl-20" style="min-height:431px">
                    <div class="col-md-12 col-sm-12">

                        <h2 class="text-center">PACKAGE LIST</h2>
                        <div class="col-sm-4" style="color: black; text-align: center">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                <p> 1 IMAGE</p>
                                <h2  style="color: black"><span>$</span><span>15</span></h2>
                                <p>Submit one image to the photo competition</p>
                                <a style="background: red" href="page-services.html" class="btn-default btn btn-sm">SELECT</a>
                            </div>
                        </div>
                        <div class="col-sm-4" style="color: black; text-align: center">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                <p> 3 IMAGES</p>
                                <h2  style="color: black"><span>$</span><span>30</span></h2>
                                <p>Submit Three images to the photo competition</p>
                                <a style="background: red" href="page-services.html" class="btn-default btn btn-sm">SELECT</a>
                            </div>
                        </div>
                        <div class="col-sm-4" style="color: black; text-align: center">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                                <p> 6 IMAGES</p>
                                <h2  style="color: black"><span>$</span><span>40</span></h2>
                                <p>Submit six images to the photo competition</p>
                                <a style="background: red" href="page-services.html" class="btn-default btn btn-sm">SELECT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class=" col-md-12 " style="margin-top: 2px; ">
                <div class="col-md-6" >
                    <div class=" text-muted clearfix pr-20 pl-20">
                        <h2 class="text-center">Contact Information</h2> <hr>

                        <form  role="form" method="post" action="" >
                            <div class="form-group has-feedback" >
                                <label for="name" >First Name*</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your First Name" required="" maxlength="50">
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Last Name*</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Last Name" required="" maxlength="50">
                                <i class="fa fa-user form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email*</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" >
                                <i class="fa fa-envelope form-control-feedback"></i>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="subject">Instagram / Facebook</label>
                                <input type="text" class="form-control" id="subject" name="sociel_link" placeholder="Facebook Url or Instagram Url" >
                                <i class="fa fa-navicon form-control-feedback"></i>
                            </div>
                            <button class="submit-button btn btn-default " type="submit">SUBMIT</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class=" text-muted clearfix pr-20 pl-20" style="text-align: center">
                        <h2 class="text-center">Select Your package</h2>
                        <hr>
                        <form  role="form" method="post" action="" class="">
                            <label class="radio-inline">
                                <input type="radio"  name="numberofimages" value="1"  >1 Image
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="numberofimages" value="3" >3 Images
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="numberofimages" value="6" >6  Images
                            </label>
                        </form>
                    </div>
                    <div class="oneimage " style="  display: none;">
                        <h1>Payment For 1 Image</h1>
                        <a href="<?php echo base_url() . 'products/buy/' . 1; ?>">
                            <img src="<?php echo base_url(); ?>assets/images/unnamed.png" style="width: 70px;"></a>
                        </a>
                    </div>
                    <div class="threeimages " style="  display: none;">
                        <h1>Payment For 3 Images</h1>
                        <a href="<?php echo base_url() . 'products/buy/' . 2; ?>">
                           <img src="<?php echo base_url(); ?>assets/images/unnamed.png" style="width: 70px;"></a>
                        </a>
                    </div>
                    <div class="siximages " style="  display: none;">
                        <h1>Payment For 6 Images</h1>
                        <a href="<?php echo base_url() . 'products/buy/' . 3; ?>">
                          <img src="<?php echo base_url(); ?>assets/images/unnamed.png" style="width: 70px;"></a>
                        </a>
                    </div>
                    <?php
                    if (!empty($this->session->flashdata('error'))) {
                        echo '<div class = "alert-danger alert ">';
                        echo '<h5 style="color: red">' . $this->session->flashdata('error') . '</h5>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            if (inputValue == '1') {
                $(".oneimage").show();
                $(".threeimages").hide();
                $(".siximages").hide();
            } else if (inputValue == '3') {
                $(".oneimage").hide();
                $(".threeimages").show();
                $(".siximages").hide();
            } else if (inputValue == '6') {
                $(".oneimage").hide();
                $(".threeimages").hide();
                $(".siximages").show();
            }
        });
    });
</script>