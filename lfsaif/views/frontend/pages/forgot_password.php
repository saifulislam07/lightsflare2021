<section class="main-container fixedFooter" >
    <div class="container"> 
        <div class="row">
           <div class="row">
            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-8 col-md-offset-2">
                <!-- logo -->
                <div class="logo">
                    <a href="<?php echo site_url('user-signin') ?>">
                        <img width="150px" src="<?php echo base_url(); ?>assets/admin/dist/img/logo.png" alt=" Logo" id="logo" class="" style="">
                    </a>
                </div>
                <div class="site-slogan">
                    <br>
                </div>

                <div class="object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
                    <div class="form-block center-block">
                        <h2 class="title">Forgot Password</h2>
                        <hr>
                      
                        <h6 class="text-center" style="color:red;">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg'); echo '<hr>'; ?>
                            <?php } ?>        
                            
                        </h6>
                        <form class="form-horizontal" method="post" action="<?php echo site_url('forgot-password'); ?>">
                            <div class="form-group has-feedback">
                                <label for="inputUserName" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" >
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                            </div>
                         
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">								
                                    <button type="submit" class="btn btn-group btn-default btn-sm">SEND</button>
                                </div>
                            </div>
                        </form>
                    </div>
                   
                </div>

            </div>
            <!-- main end -->

        </div>
        </div>
    </div>
</section>
