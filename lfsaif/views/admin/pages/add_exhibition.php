<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">
                        <h4 style="text-decoration: underline">Add Exhibition Details</h4>
                        <form class="form-horizontal" role="form" method="post" action="<?php echo site_url('new-exhibition-data'); ?>" enctype="multipart/form-data">
                            <div class="form-group has-feedback">
                                <label for="inputName" class="col-sm-3 control-label">Full Name <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Full Name" >

                                </div>
                            </div>


                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Country <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="country" >
                                        <option  selected="true" disabled="disabled">Select Country</option>
                                        <?php foreach ($country as $e_country): ?>
                                            <option  value="<?php echo $e_country->id ?>" ><?php echo $e_country->name ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Category <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control " name="category" >
                                        <option  selected="true" disabled="disabled">Select Category</option>
                                        <?php foreach ($categorys as $category): ?>
                                            <option  value="<?php echo $category->id ?>" ><?php echo $category->title ?></option>
                                        <?php endforeach; ?>
                                    </select>

                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputEmail" class="col-sm-3 control-label">Type <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <select class="form-control " name="type" >
                                        <option  selected="true" disabled="disabled">Select type</option>
                                        <option  value="1" >Winner</option>
                                        <option  value="2" >1st Runner Up</option>
                                        <option  value="3" >2nd Runner Up</option>
                                        <option  value="4" >Honorable Mention</option>
                                        <option  value="5" >Finalist</option>
                                    </select>

                                    <span id="errorMsg"  style="color:red;display: none;"><i class="ace-icon fa fa-spinner fa-spin orange bigger-120"></i> &nbsp;&nbsp;Email already Exits!!</span>
                                </div>
                            </div>

                         
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-4 control-label"> Image <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="file" name="image" class="form-control" >
                                </div>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="inputPassword" class="col-sm-4 control-label"> Tag <span class="text-danger small">*</span></label>
                                <div class="col-sm-12">
                                    <input type="file" name="tag" class="form-control" >
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-12">
                                    <button type="submit"  id="subBtn"  class="btn btn-info">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>


    </div>
</section>

