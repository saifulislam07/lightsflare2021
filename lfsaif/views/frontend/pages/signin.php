<section class="main-container light-translucent-bg">

    <div class="container">
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
                        <h2 class="title">Login</h2>
                        <hr>
                      
                        <h6 class="text-center" style="color:red">
                            <?php if ($this->session->flashdata('msg')) { ?>
                                <?php echo $this->session->flashdata('msg'); ?>
                            <?php }
                            ?>
                        </h6>
                        <form class="form-horizontal" method="post" action="<?php echo site_url('login'); ?>">
                            <div class="form-group has-feedback">
                                <label for="inputUserName" class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="hidden" name="user_type" value="user">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="User Name" required>
                                    <i class="fa fa-user form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>
                                    <i class="fa fa-lock form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" > Remember me.
                                        </label>
                                    </div>											
                                    <button type="submit" class="btn btn-group btn-default btn-sm">Log In</button>
                                    <ul>
                                        <li><a href="<?php echo base_url('forgot-password');?>">Forgot your password?</a></li>
                                    </ul>
<!--                                    <span class="text-center text-muted">Login with</span>
                                    <ul class="social-links colored circle clearfix">
                                        <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
                                        <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
                                        <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>-->
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="text-center space-top">Don't have an account yet? <a href="<?php echo site_url('user-signup') ?>">Sing up</a> now.</p>
                </div>

            </div>
            <!-- main end -->

        </div>
    </div>
</section>