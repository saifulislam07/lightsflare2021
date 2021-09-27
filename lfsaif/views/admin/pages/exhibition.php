
<script>
    $(document).ready(function () {
        document.getElementById("example1").classList.remove('collapsed');
    });
</script>
<style>
    .zoom:hover {
        -ms-transform: scale(3.5); /* IE 9 */
        -webkit-transform: scale(3.5); /* Safari 3-8 */
        transform: scale(3.5); 
    }
    @media only screen and (max-width: 600px) {
        .tablestyle2 {
            margin: 0;
            padding: 0;
            line-height: 0;
            font-size: 5px;
        }
    }


</style>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">

                <div class="col-md-12 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title float-left">Exhibition list</h3>
                            <a href="<?php echo site_url('new-exhibition-data') ?>" class="btn btn-info btn-xs float-right" style="color: white">+ Add Data</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Country</th>
                                        <th>Category</th>
                                        <th>Type</th>
                                        <th>Image</th>
                                        <th>Tag</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($allExhibitionData as $each):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $each->uname ?></td>
                                            <td><?php echo $each->nicename ?></td>
                                            <td><?php echo $each->title ?></td>
                                             <td>
                                                <?php
                                                if ($each->type == 1) {
                                                    echo 'Winner';
                                                } elseif ($each->type == 2) {
                                                   echo '1st Runner Up'; 
                                                } elseif ($each->type == 3) {
                                                    echo '2nd Runner Up';
                                                } elseif ($each->type == 4) {
                                                    echo 'Honorable Mention';
                                                } elseif ($each->type == 5) {
                                                    echo 'Finalist';
                                                }
                                                ?>
                                            </td>
                                            <td><img class="zoom" width="50px" src="<?php echo site_url('assets/admin/exhibition/' . $each->image); ?>" alt="<?php echo $each->image ?>" /></td>
                                            <?php if (!empty($each->tag)): ?>
                                                <td><img class="zoom" width="50px" src="<?php echo site_url('assets/admin/exhibition/' . $each->tag); ?>" alt="<?php echo $each->tag ?>" /></td>
                                            <?php endif; ?>

                                          <td><a href="<?php echo site_url('AdminController/delete_exhi_data/' . $each->exhibition_id) ?>" onclick="return confirm('Are you sure?')" style = "color: white" class = "btn btn-xs btn-danger">Delete</a></td>
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
