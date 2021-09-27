<section class="main-container" style="min-height: 1000px">
    <div class="container">
        <div class="row">
            <div class=" col-md-6" style="min-height: 200px ">
                <div class="default-bg text-muted clearfix pr-20 pl-20" style="min-height:426px">
                    <h5 class="text-center">SHORT RULES</h5>
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
                <div class="default-bg text-muted clearfix pr-20 pl-20" style="min-height:401px">
                    <div class="col-md-12 col-sm-12">

                        <h5 class="text-center">PACKAGE LIST</h5>
                        <div class="col-sm-12" style="color: black; text-align: center">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                            
                                <h5  style="color: black"><span> 1 IMAGE $</span><span>15</span></h5>
                                <p>Submit one image to the photo competition</p>
                                <!--<a style="background: red" href="page-services.html" class="btn-default btn btn-sm">SELECT</a>-->
                            </div>
                        </div>
                        <div class="col-sm-12" style="color: black; text-align: center">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                          
                                <h5  style="color: black"> <span>3 IMAGES $</span><span>30</span></h5>
                                <p>Submit Three images to the photo competition</p>
                                <!--<a style="background: red" href="page-services.html" class="btn-default btn btn-sm">SELECT</a>-->
                            </div>
                        </div>
                        <div class="col-sm-12" style="color: black; text-align: center">
                            <div class="box-style-1 white-bg object-non-visible" data-animation-effect="fadeInUpSmall" data-effect-delay="0">
                     
                                <h5  style="color: black"><span>6 IMAGES $</span><span>40</span></h5>
                                <p>Submit six images to the photo competition</p>
                                <!--<a style="background: red" href="page-services.html" class="btn-default btn btn-sm">SELECT</a>-->
                            </div>
                        </div>
                        <div class="col-sm-12" style="color: black; text-align: center">
                          <a class="btn btn-success" href="<?php echo site_url('user-signin') ?>">SUBMIT PHOTOS</a>
                        </div>
                    </div>
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