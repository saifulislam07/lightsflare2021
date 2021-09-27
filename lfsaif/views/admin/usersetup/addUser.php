<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
                        <h4 style="text-decoration: underline">Add User</h4>
                        <form class="form-horizontal" role="form" method="post" action="">
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label">Full Name <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" required>

                                </div>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Email <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="email" name="email" onblur="checkDuplicateEmail(this.value)" class="form-control" id="inputEmail" placeholder="Email" required>

                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Country <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control " name="country" >
                                        <option  selected="true" disabled="disabled">Select</option>
                                        <?php foreach ($country as $e_country): ?>
                                            <option  value="<?php echo $e_country->id ?>" ><?php echo $e_country->name ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-3 control-label">Password <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" required>

                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-4 control-label"> Re-Password <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="password" name="re_password" class="form-control" id="inputPassword" placeholder="Password" required>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-12">
                                    <button type="submit"  id="subBtn"  class="btn btn-info">Sign Up</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
</section>

<script>
    function checkDuplicateEmail(email){
        var url = '<?php echo site_url("FrontendController/duplicate_email_check") ?>';
        $.ajax({
            type: 'POST',
            url: url,
            data:{ 'email': email},
            success: function (data)
            {
                if(data == 1){
                    $("#subBtn").attr('disabled',true);
                    $("#errorMsg").show();
                }else{
                    $("#subBtn").attr('disabled',false);
                    $("#errorMsg").hide();
                }
            }
        });
        
    }

</script>