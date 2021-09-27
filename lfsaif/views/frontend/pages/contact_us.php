<section class="main-container">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-12">

                <!-- page-title start -->
                <!-- ================ -->
                <h1 class="page-title">Contact Us</h1>
                <!-- page-title end -->
                <div class="row">
                    <div class="col-md-6">

                        <div class="alert alert-success hidden" id="MessageSent">
                            We have received your message, we will contact you very soon.
                        </div>
                        <div class="alert alert-danger hidden" id="MessageNotSent">
                            Oops! Something went wrong please refresh the page and try again.
                        </div>
                        <?php if ($this->session->flashdata('msg')) { ?>
                            <div class="alert alert-danger " >
                                <h6 class="text-center" style="color:red">
                                    <?php if ($this->session->flashdata('msg')) { ?>
                                        <?php echo $this->session->flashdata('msg'); ?>
                                    <?php }
                                    ?>
                                </h6>
                            </div> <?php }
                                ?>
                        <?php if ($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success " >
                                <h6 class="text-center" style="color:white">
                                    <?php if ($this->session->flashdata('success')) { ?>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    <?php }
                                    ?>
                                </h6>
                            </div> <?php }
                                ?>

                        <div class="contact-form">


                            <form  role="form" method="post" action="<?php echo site_url('contact-data') ?>">
                                <div class="form-group has-feedback">
                                    <label for="name">Name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="" required="" maxlength="50">
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email*</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="" required="">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="subject">Subject*</label>
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="" required="" maxlength="50">
                                    <i class="fa fa-navicon form-control-feedback"></i>

                                </div>
                                <div class="form-group has-feedback">
                                    <label for="message">Message*</label>
                                    <textarea class="form-control" rows="6" id="message" name="message" placeholder="" required=""></textarea>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>

                                <div class="form-group has-feedback" >
                                   
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" value="<?php echo $randcode; ?>" style="background: black; color: white; font-weight: bold; text-align: center" readonly="" class="form-control"  placeholder="" >
                                        </div> 
                                        <div class="col-md-6 col-sm-6">
                                            <input type="hidden"  value="<?php echo $randcode; ?>" name="genaratedvcode"  >
                                            <input type="text"   class="form-control" id="" name="vcode" placeholder="Enter the code" required="">
                                        </div>
                                 
                                </div>
                                <button class="submit-button btn btn-default " type="submit">SUBMIT</button>


                            </form>
                        </div>
                    </div><br><br>
                    <div class="col-md-6">
                        <!-- google maps start -->

                        <div class="mapouter" style="border:1px solid black">
                            <div class="gmap_canvas">
                                <iframe width="550" height="373" id="gmap_canvas" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d47353119.088647895!2d85.10927646021301!3d18.58256657708523!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sen!2sus!4v1595913275941!5m2!1sen!2sus" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">

                                </iframe>

                            </div>

                        </div>

                        <!-- google maps end -->
                    </div>
                </div>
            </div>
            <!-- main end -->

        </div>
    </div>
</section>