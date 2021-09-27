<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                
                <div class="card">
                    <div class="card-body">
                        <h4 style="text-decoration: underline">Add Admin</h4>
                        <form id="publicForm" action=""  method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Full Name </label>
                                <div class="col-sm-12">
                                    <input type="text" id="form-field-1" name="name" class="form-control required" placeholder="User Name" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phone</label>
                                <div class="col-sm-12">
                                    <input type="text" maxlength="11" id="form-field-1" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"  name="phone" placeholder="Phone" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>
                                <div class="col-sm-12">
                                    <input type="email" onblur="checkDuplicateEmail(this.value)" id="form-field-1" name="email" placeholder="Email" class="form-control" />
                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Password</label>
                                <div class="col-sm-12">
                                    <input type="password" id="form-field-1" name="password" placeholder="Password" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Re-Password</label>
                                <div class="col-sm-12">
                                    <input type="password" id="form-field-1" name="re_password" placeholder="Password Again" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" >SUBMIT</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
</section>

<script>
    function checkDuplicateEmail(email) {
        var url = '<?php echo site_url("SetupController/checkDuplicateEmailForUser") ?>';
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
