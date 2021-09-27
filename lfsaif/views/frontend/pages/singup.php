<section class="main-container light-translucent-bg">

    <div class="container">
        <div class="row">

            <!-- main start -->
            <!-- ================ -->
            <div class="main col-md-8 col-md-offset-2">

                <!-- logo -->
                <div class="logo">
                    <a href="<?php echo site_url('user-signup') ?>">
                        <img width="150px" src="<?php echo base_url(); ?>assets/admin/dist/img/logo.png" alt=" Logo" id="logo" class="" style="">
                    </a>
                </div>

                <!-- name-and-slogan -->
                <div class="site-slogan">
                    <br>
                </div>

                <div class="object-non-visible" data-animation-effect="fadeInDownSmall" data-effect-delay="300">
                    <div class="form-block center-block">
                        <h2 class="title">Sign Up</h2>
                        <h6 class="text-center " style="color:red;">
                            <?php  if ($this->session->flashdata('error')) {  ?>
                                <?php
                                echo $this->session->flashdata('error');
                            

                                
                                ?>
                            <?php } ?>        

                        </h6>
                        <hr>
                        <form class="form-horizontal" role="form" method="post" action="">
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label">Full Name <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="name" minlength="5" maxlength="35"  class="form-control" id="inputName" placeholder="Full Name" required>
                                    <i class="fa fa-pencil form-control-feedback"></i>
                                </div>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" onblur="checkDuplicateEmail(this.value)" class="form-control" id="inputEmail" placeholder="Email" required="">
                                    <i class="fa fa-envelope form-control-feedback"></i>
                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Country <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <select class="form-control " name="country" >
                                        <option  selected="true" disabled="disabled">Select</option>
                                        <?php foreach ($countrys as $e_country): ?>
                                            <option  value="<?php echo $e_country->id ?>" ><?php echo $e_country->name ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="password" name="password" class="form-control" minlength="6" maxlength="12"  id="inputPassword" placeholder="Password" required>
                                    <i class="fa fa-lock form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-3 control-label"> Re-Password <span class="text-danger small">*</span></label>
                                <div class="col-sm-8">
                                    <input type="password" name="re_password" class="form-control" minlength="6" maxlength="12" id="inputPassword" placeholder="Password" required>
                                    <i class="fa fa-lock form-control-feedback"></i>
                                </div>
                            </div>
                            <div class="form-group has-feedback ">
                                <label for="inputPassword" class="col-sm-3 control-label">  </label>
                                <div class="col-sm-8 ">
                                    <div class="col-sm-5">
                                        <input type="hidden" name='sessionrandcode' value="<?php echo $randcode; ?>">
                                        <input type="text" readonly class="form-control" style="color: red; text-align: center" value="<?php echo $randcode; ?>">
                                    </div>
                                    <div class="col-sm-7">
                                        <input type="text" name="randomcode" class="form-control" id="inputPassword" placeholder="Enter the Number" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-8">
                                    <button type="submit"  id="subBtn"  class="btn btn-default">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="text-center space-top">Have an account ! <a href="<?php echo site_url('user-signin') ?>">Sing In</a> now.</p>
                </div>

            </div>
            <!-- main end -->

        </div>
    </div>

</section>

<script>
    function checkDuplicateEmail(email) {
        var url = '<?php echo site_url("FrontendController/duplicate_email_check") ?>';
        $.ajax({
            type: 'POST',
            url: url,
            data: {'email': email},
            success: function (data)
            {
                if (data == 1) {
                    $("#subBtn").attr('disabled', true);
                    $("#errorMsg").show();
                } else {
                    $("#subBtn").attr('disabled', false);
                    $("#errorMsg").hide();
                }
            }
        });

    }

</script>