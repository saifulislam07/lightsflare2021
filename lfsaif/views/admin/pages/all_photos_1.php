
<style>
    * {
        box-sizing: border-box;
    }
    .zoom:hover {
        -ms-transform: scale(3.5); /* IE 9 */
        -webkit-transform: scale(3.5); /* Safari 3-8 */
        transform: scale(3.5); 
    }


</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">

                <div class="col-md-12 col-sm-6 col-12">
                    <div class="card ">
                        <div class="card-header">
                            <h3 class="card-title">All Photos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Photos</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //     dumpVar($submission_details);
                                    $i = 1;
                                    foreach ($allsubmission as $each):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $each->name; ?></td>
                                            <td>
                                                <?php
                                                $allphotosbyuser = $this->Common_model->get_data_list_by_single_column('submissions', 'user_id', $each->user_id);

                                                foreach ($allphotosbyuser as $each_p):
                                                    ?>

                                                    <img class="zoom" width="50px" src="<?php echo site_url('assets/admin/all_submissions/' . $each_p->image); ?>" alt="<?php echo $each_p->image ?>" />
                                                <?php endforeach; ?>
                                            </td>

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



