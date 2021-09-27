<?php $user_id = $this->session->userdata('admin_id'); ?>
<script>
    $(document).ready(function () {

        document.getElementById("example1").classList.remove('collapsed');
    });
</script>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">

                <div class="col-md-12 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">Payments Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                        <th>Replied by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //     dumpVar($submission_details);
                                    $i = 1;
                                    foreach ($user_queries as $each):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $each->name; ?></td>
                                            <td><?php echo $each->email; ?></td>
                                            <td><?php echo $each->subject; ?></td>
                                            <td><?php echo $each->message; ?></td>
                                            <td><?php if($each->status == 'unread'){ echo '<b style="color: red">Unread</b>';}else{ echo '<b style="color: green">Replied</b>';}  ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($each->created_at)); ?></td>
                                            <?php if ($each->status == 'unread') { ?>

                                                <td style = "padding: 0 0;"><a href = "<?php echo site_url('reject-reply/' . $each->id) ?>" onclick = "return confirm('Are you sure , reply not yet ?')" style = "color: white" class = "btn btn-xs btn-success">Replied</a></td>
                                            <?php } else { ?>
                                                <td style = "padding: 0 0;"><a href = "<?php echo site_url('reply-query/' . $each->id) ?>" onclick = "return confirm('Are you sure , you replied the Queries ?')" style = "color: white" class = "btn btn-xs btn-danger">Unread</a></td>

                                            <?php }
                                            ?> 
                                            <td><?php echo $this->Common_model->table_info('admin', 'admin_id', $each->admin_id)->name ?></td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>



