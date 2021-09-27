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



            <div class=" col-md-6 " style="margin-top: 2px; ">
             <div class="default-bg text-muted clearfix pr-20 pl-20">
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
                        <h2 class="text-center">Upload Image</h2> 
                        <h6 class="text-center" style="color: red">Upload carefully, You can not able to edit submission.</h6> <hr>
                        <?php if ($imageNumebr == 1): ?>
                            <input type="file" class="form-control" value="1" />
                        <?php elseif ($imageNumebr == 3): ?>
                            <input type="file" class="form-control" value="1" /><br>
                            <input type="file" class="form-control" value="2" /><br>
                            <input type="file" class="form-control" value="3" />
                        <?php elseif ($imageNumebr == 6): ?>
                            <input type="file" class="form-control" value="1" /><br>
                            <input type="file" class="form-control" value="2" /><br>
                            <input type="file" class="form-control" value="3" /><br>
                            <input type="file" class="form-control" value="4" /><br>
                            <input type="file" class="form-control" value="5" /><br>
                            <input type="file" class="form-control" value="6" />
                        <?php else: ?>
                            <div class="alert alert-danger">
                                <h3 style="color: red">Opps !! Something Wrong , Please Contact with organizer.</h3>
                            </div>
                        <?php endif; ?>
                        <button class="submit-button btn btn-default " type="submit">SUBMIT</button>
                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>
