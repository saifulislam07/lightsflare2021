<style>
    * {
        box-sizing: border-box;
    }
    .zoom:hover {
        -ms-transform: scale(2.5); /* IE 9 */
        -webkit-transform: scale(2.5); /* Safari 3-8 */
        transform: scale(2.5); 
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <!-- /.card -->

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">All Admin </h3>
                    </div>

                    <header class="panel-heading pull-right">
                        <button onclick="location.href = '<?php //echo base_url(); ?>AdminController/contactDownload'" class="btn btn-success"><i class="icon-download-alt "></i>User Email</button>
                    </header>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="5%">Sl</th>
                                    <th>Name</th>
                                    <th width="10%">Phone</th>
                                    <th>Email</th>
                                    <th width="7%">Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($userList as $key => $value): ?>
                                    <tr>
                                        <td><?php echo $key + 1; ?></td>
                                        <td><?php echo $value->name; ?></td>
                                        <td><?php echo $value->phone; ?></td>
                                        <td><?php echo $value->email; ?></td>

                                        <td>
                                            <?php
                                            if ($value->status == 1):
                                                ?>
                                                <a onclick="userStatusChanges('<?php echo $value->admin_id; ?>', '2')"  class="label label-danger arrowed">
                                                    <i class="ace-icon fa fa-fire bigger-110"></i>
                                                    Inactive</a>
                                            <?php else: ?>
                                                <a onclick="userStatusChanges('<?php echo $value->admin_id; ?>', '1')"  class="label label-success arrowed">
                                                    <i class="ace-icon fa fa-check bigger-110"></i>
                                                    Active
                                                </a>
                                            <?php endif; ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


