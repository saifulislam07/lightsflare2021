<style>
    * {
        box-sizing: border-box;
    }
    .zoom:hover {
        -ms-transform: scale(2.5); /* IE 9 */
        -webkit-transform: scale(2.5); /* Safari 3-8 */
        transform: scale(2.5); 
    }

    .tablestyle3{
        margin: 0;
        padding: 0;
        line-height: 0;
        font-size: 10px;
    }
    @media only screen and (max-width: 600px) {
        .tablestyle3 {
            margin: 0;
            padding: 0;
            line-height: 0;
            font-size: 8px;
        }
    }
</style>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-12">

                <!-- /.card -->

                <div class="card tablestyle3">
                    <div class="card-header">
                        <h3 class="card-title">All Submissions</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body ">
                        <table id="example1" class="table table-bordered table-striped table-responsive-sm">

                            <?php $type = $this->session->userdata('type'); ?>

                            <?php if ($type == 'Admin'): ?>
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
    <!--                                        <th>Email</th>-->
                                        <th>Mobile</th>
                                        <th>Currency </th>
                                        <th>Images</th>
                                        <th>Amount($)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $ctype = '';

                                    $j = 1;


                                    foreach ($allsubmission as $eachs):
                                        ?>
                                        <tr>
                                            <td><?php echo $j++ ?></td>
                                            <td>

                                                <a onclick="getData('<?php echo $eachs->user_id ?>')" data-toggle="modal" data-target="#user-details" href="" >
                                                    <?php
                                                    echo '<h6>' . $eachs->name . '</h6>';

                                                    echo '<h6 style="color: blue">' . $eachs->email . '</h6>';
                                                    ?>
                                                </a>



                                            </td>

                                            <td><?php echo $eachs->phone ?></td>
                                            <td><?php
                                                $ctype = $this->Common_model->table_info('payments', 'user_id', $eachs->user_id);
                                                if (!empty($ctype)) {
                                                    echo $ctype->currency_code;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $totalSubmit = $this->Common_model->getTotalSumbmission($eachs->user_id)->counts; ?></td>
                                            <td>
                                                <?php if (!empty($ctype->currency_code) && $ctype->currency_code == 'TK'): ?>
                                                    <?php echo $totalAmount = $this->Common_model->getTotalSumbmissionAmountChk($eachs->user_id)->amounts; ?>
                                         
                                            <?php else: ?>
                                                    <?php echo $totalSubmit * 1 ?>$
                                                <?php endif; ?>
                                            </td>
                                          
                                            <td>


                                                <?php
                                                if (!empty($ctype->payment_status)) {

                                                    if (!empty($ctype->currency_code) && $ctype->currency_code == 'TK'):
                                                        $numberAsString = number_format($totalSubmit * 85, 2);
                                                        if ($numberAsString > $totalAmount):
                                                            echo '<b style="color: red">DUE</p>';
                                                        else:
                                                            echo '<b style="color :green">' . $ctype->payment_status . '</b>';
                                                        endif;
                                                    else:
                                                        echo '<b style="color :green">' . $ctype->payment_status . '</b>';
                                                    endif;
                                                } else {
                                                    echo '<b style="color: red">Pending</p>';
                                                }
                                                ?>
                                            </td>
                                            <td style="color: white">
                                                <a onclick="getUsrData(
                                                                '<?php echo $eachs->name ?>',
                                                                '<?php echo $eachs->user_id ?>',
                                                                '<?php echo $eachs->email ?>'
                                                                )" class="btn btn-info btn-xs" data-toggle="modal" data-target="#user-mail"  >
                                                    <i class="fa fa-envelope" aria-hidden="true"> Confirm</i>
                                                </a> 

                                                <b style="color: red">
                                                    <?php
                                                    $countvalue = $this->Common_model->getTotalMailCount($eachs->user_id);
                                                    if (!empty($countvalue->ttlidcount)) {
                                                        echo $countvalue->ttlidcount;
                                                    }
                                                    ?>
                                                </b>
                                                <a onclick="getUsrData2(
                                                                '<?php echo $eachs->name ?>',
                                                                '<?php echo $eachs->user_id ?>',
                                                                '<?php echo $eachs->email ?>'
                                                                )" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#user-mail-alarm"  >
                                                    <i class="fa fa-forward" aria-hidden="true"> Alarm</i>
                                                </a> 
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php elseif ($type == 'User'): ?>

                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Date</th>
                                        <th>Category</th>
                                        <!--<th>Image Name</th>-->
                                        <th>Images</th>
                                        <th width="5%" >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($allsubmission as $each):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++ ?></td>
                                            <td><?php echo $each->create_at; ?></td>
                                            <td><?php echo $this->Common_model->table_info('category', 'id', $each->category_id)->title ?></td>
                                            <!--<td><?php //echo $each->image;     ?></td>-->
                                            <td>
                                                <img class="zoom" width="50px" src="<?php echo site_url('assets/admin/all_submissions/' . $each->image); ?>" alt="<?php echo $each->image ?>" />
                                            </td>
                                            <td style = "padding: 0 0; text-align: center"><a href = "<?php echo site_url('delete-image/' . $each->id) ?>" onclick = "return confirm('Are you sure , You Want to Delete this photo ?')" style = "color: white" class = "btn btn-xs btn-danger">Delete</a></td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>




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

<div class="modal fade" id="user-details">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">User Details</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">

                    <div class="card-body">
                        <div id="showdata"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="user-mail">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url('confirm-email') ?>" method="post" >
                        <div class="card-body">

                            <div class="form-group">
                                <input type="hidden" name="u_name" id="u_name">
                                <input type="hidden" name="userid" id="userid">
                                <input type="hidden" name="email" id="email">
                                <label for="exampleInputPassword1">Email for confirmation</label>
                                <textarea style="height:  300px" type="type" class="form-control" name="detailsmail" id="exampleInputPassword1" placeholder="Total Amount">


                                    We are happy to confirm that we have received your submission and payment into the Lightsflare International Photography Award 2020.

                                    NB : You can upload more pictures in any categories until submission close.

                                    Good luck.
                                    Minha Chawdhuri
                                    Sr. Executive of Lightflare
                                </textarea>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Mail</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="user-mail-alarm">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url('alarm-email') ?>" method="post" >
                        <div class="card-body">

                            <div class="form-group">
                                <input type="hidden" name="u_name2" id="u_name">
                                <input type="hidden" name="userid2" id="userid">
                                <input type="hidden" name="email2" id="email">
                                <label for="exampleInputPassword1">Email for Payment</label>
                                <textarea style="height:  300px" type="type" class="form-control" name="detailsmail" id="exampleInputPassword1" placeholder="Total Amount">


                                   CONGRATULATIONS!
We are happy to confirm your submission to the Lightsflare International Photography Awards 2020.
But you have not submitted the entry fee yet, please confirm your submission by pay the entry fee.
Follow the steps below to submit the entry fee. Log in Your Account > Go to My Payment menu> Payment Details> Pay Your Entry fee.
After complete the payment process then you will received an Final email confirmation.
Should you have any further questions please do not hesitate to get in touch.
                                </textarea>
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Send Mail</button>
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
    function getData(userid) {

        var url = '<?php echo site_url("AdminController/get_single_data_by_id") ?>';
        $.ajax({
            type: 'POST',
            url: url,
            data: {'userid': userid},
            dataType: "html",
            success: function (data) {

                $("#showdata").html(data);
            }

        });
    }

    function getUsrData(name, userid, email) {
        $("#u_name").val(name);
        $("textarea").prepend("Dear " + name);
        $("#e_name").val(name);
        $("#userid").val(userid);
        $("#email").val(email);
    }
    function getUsrData2(name2, userid, email) {
        $("#u_name2").val(name);
        $("textarea").prepend("Dear " + name2);
        $("#e_name2").val(name);
        $("#userid2").val(userid);
        $("#email2").val(email);
    }
</script>
