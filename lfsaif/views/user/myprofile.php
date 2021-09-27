<?php // dumpVar($userInfo)       ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="card card-widget widget-user">
                   
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username"><?php echo $userInfo->name; ?></h3>
                        <h5 class="widget-user-desc"><?php echo $userInfo->title; ?></h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="<?php echo base_url('assets/admin/user/' . $userInfo->image) ?>" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Email</h5>
                                    <span class=""><?php echo $userInfo->email; ?></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Country</h5>
                                    <span class="description-text"><?php echo $this->Common_model->table_info('country', 'id', $userInfo->country)->name ?></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">Phone</h5>
                                    <span class="description-text"><?php
                                        if (!empty($userInfo->phone)) {
                                            echo $userInfo->phone;
                                        } else {
                                            'Empty!';
                                        }
                                        ?></span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-12">
                                <div class="description-block">
                                    <hr>
                                    <h5 class="description-header">BIO</h5>
                                    <hr>
                                    <p style="text-align: justify; text-justify:inter-word;"><?php echo $userInfo->bio; ?></p>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#modal-profile">
                        <i class="fa fa-edit"> Edit</i>
                    </button>
                </div>
                <!-- /.widget-user -->
            </div>
            <!-- /.col -->
        </div>
    </div>
</section>

<div class="modal fade" id="modal-profile">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo site_url('profile-update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" value="<?php echo $userInfo->name; ?>" id="exampleInputEmail1" placeholder="Your Full name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" value="<?php echo $userInfo->title; ?>" name="title" id="exampleInputEmail1" placeholder="(Example : Documentary Photographer)">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="type" class="form-control"  readonly="" value="<?php echo $userInfo->email; ?>"  name="email" id="exampleInputPassword1" placeholder="Your Email Address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Phone</label>
                                <input type="type" class="form-control" value="<?php echo $userInfo->phone; ?>"  name="phone" id="exampleInputPassword1" placeholder="Your Phone Number">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Age</label>
                                <input type="type" class="form-control" value="<?php echo $userInfo->age; ?>"  name="age" id="exampleInputPassword1" placeholder="Your Age">
                            </div>

                            <?php if (empty($paymentstatus)): ?>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Country</label>
                                    <select class="form-control select2" name="country" >
                                        <option value="" disabled="">Select</option>
                                        <?php foreach ($countrys as $e_country): ?>
                                            <option <?php
                                            if ($e_country->id == $userInfo->country) {
                                                echo 'selected="selected"';
                                            }
                                            ?> value="<?php echo $e_country->id ?>" ><?php echo $e_country->name ?></option>
                                            <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php else: ?>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Country</label>
                                    <input type="hidden" value="<?php echo $userInfo->country?>" name="country"  class="form-control"> : <?php echo $this->Common_model->table_info('country','id',$userInfo->country)->name ;?>
                                </div>
                            <?php endif; ?>


                            <div class="form-group">
                                <label for="exampleInputPassword1">BIO</label>
                                <textarea type="type" name="bio" class="form-control" id="exampleInputPassword1" placeholder="About yourself"><?php echo $userInfo->bio; ?> </textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="old_image" value="<?php echo $userInfo->image; ?>">
                                <label for="exampleInputPassword1">Profile Image  <u style="color: red; font-size: 10px">Minimum 50kb, maximum 500kb</u></label>
                                <input type="file"  onchange="getFileExtension(this)" id="images" class="form-control" name="image">
                               
                                <img width="50px" src="<?php echo base_url('assets/admin/user/' . $userInfo->image) ?>" alt="No User image">
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
   
    function getFileExtension(file){
            var fileID = file.id;
       
       
            var fileName = file.value;
            var url = '<?php echo site_url("AuthController/fileCheck") ?>';
            $.ajax({
                type: 'POST',
                url: url,
                data: {'fileName' : fileName},
                success: function (data){
                
                    if(data == 2){
                        $("#" + fileID).val(""); 
                        alert('File Not supported ! (file extension should be JPG, JPEG)');
                    }
            
                }
            });
         
        }
</script>