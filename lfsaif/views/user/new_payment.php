<?php $user_id = $this->session->userdata('admin_id'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
                <div class="col-md-3 col-sm-6 col-12 float-left">
                    <div class="col-md-12 col-sm-6 col-12">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-image"></i></span>


                            <div class="info-box-content">
                                <span class="info-box-text">Total Amount</span>
                                <?php
                                // dumpVar($country_check);
                                $totalSubmit = $this->Common_model->getTotalSumbmission($user_id)->counts;
                                if (!empty($country_check) && $country_check != 18):
                                    ?>
                                    <span class="info-box-number">$<?php echo $totalSubmit; ?></span>
                                <?php else: ?>
                                    <span class="info-box-number">TK. <?php
                                        if (!empty($country_check) && $country_check == 18) {

                                            echo $valueofttlsub = $totalSubmit * 85;
                                        }
                                        ?></span>
                                <?php endif; ?>



                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-image"></i></span>


                            <div class="info-box-content">
                                <span class="info-box-text">Total Pay</span>
                                <?php if (!empty($country_check) && $country_check != 18): ?>
                                    <?php $totalPay = $this->Common_model->getTotalSumbmissionAmount($user_id)->amount ?>
                                    <span class="info-box-number">$<?php echo $totalPay; ?></span>
                                <?php else: ?>
                                    <?php $totalPay = $this->Common_model->getTotalSumbmissionAmountbd($user_id)->amount ?>
                                    <span class="info-box-number">TK. <?php
                                        if (!empty($country_check) && $country_check == 18) {
                                            echo $totalPay;
                                        }
                                        ?></span>
                                <?php endif; ?>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-image"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Due</span>

                                <?php if (!empty($country_check) && $country_check != 18): ?>

                                    <span class="info-box-number">$<?php echo $totalDue = $totalSubmit - $totalPay ?></span>
                                <?php else: ?>  

                                    <span class="info-box-number">TK. <?php echo $totalDue = $valueofttlsub - $totalPay ?></span>
                                <?php endif; ?>
                            </div>
                            <!-- /.info-box-content -->
                        </div>
                        <!-- /.info-box -->
                    </div>
                    <div class="col-md-12 col-sm-6 col-12">
                        <div class="info-box text-center">
                            <div class="card-body">
                                <h5> Payment</h5>

                                <?php if (empty($country_check)): ?>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-update">
                                        Update Country
                                    </button>
                                <?php elseif ($country_check == 18): ?>
                                <strong style="color: blue; font-size: 10px">Send money to bKash and provide the required information by clicking on the bKash icon below.</strong><br>
                                
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal-bkash">
                                        <img src="<?php echo base_url('assets/admin/payment/bkash.jpg') ?>" style="width: 50px">
                                    </button>
                                    <br><strong style="color: blue; font-size: 10px">bKash : 01916 66 58 32 (personal) </strong>
                                <?php endif; ?>
                                <?php if ($country_check != 18): ?>
                                    <button type="button"  class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-paypal">
                                        <a href="<?php echo base_url() . 'products/buyProduct/' . $user_id; ?>" style="color: white">
                                            <img src="<?php echo base_url('assets/admin/payment/paypal.png') ?>" style="width: 50px">
                                        </a>
                                    </button>

                                <?php endif; ?>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-9 col-sm-6 col-12 float-right">
                    <div class="card tablestyle2">
                        <div class="card-header">
                            <h3 class="card-title">Payments Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th >Date</th>
                                        <th>Amount</th>
                                        <th>Source</th>
                                        <th>TrxID</th>
                                        <th>Pay From</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($submission_details as $each):
                                        ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo $each->created_at; ?></td>
                                            <?php if ($each->currency_code == 'TK'): ?>

                                                <td><?php echo $each->amount; ?></td>
                                            <?php else: ?>
                                                <td><?php echo $each->payment_gross; ?></td>

                                            <?php endif; ?>


                                            <td><?php
                                                if ($each->currency_code == 'TK') {
                                                    echo 'Bkash';
                                                } else {
                                                    echo 'PayPal';
                                                }
                                                ?></td>

                                            <td><?php echo $each->txn_id; ?></td>
                                            <?php if ($each->currency_code == 'TK'): ?>
                                                <td><?php echo $each->number; ?></td>
                                            <?php else: ?>
                                                <td><?php echo $each->payer_email; ?></td>
                                            <?php endif; ?>

                                            <td><?php
                                                if ($each->payment_status == 'Completed') {
                                                    echo '<b style="color: green">Completed</b>';
                                                } else {
                                                    echo '<b style="color: red">Pending</b>';
                                                }
                                                ?></td>
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



<div class="modal fade" id="modal-bkash">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Bkash</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Payment Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TrxID<span style="color: red"> *<span></label>
                                <input type="text" class="form-control" name="txn_id" id="exampleInputEmail1" placeholder="Enter Transection  ID" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">SEND FROM (Number)<span style="color: red"> *<span></label>
                                <input type="type" class="form-control" name="number" id="exampleInputPassword1" placeholder="Sender Number" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">AMOUNT<span style="color: red"> *<span></label>
                                <input type="type" class="form-control" name="amount" id="exampleInputPassword1" placeholder="Total Amount" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Reference<span style="font-size: 9px"> (If you have references)<span></label>
                                <input type="type" class="form-control" name="reference" id="exampleInputPassword1" placeholder="Reference Group or Person name">
                            </div>


                        </div>
                        <!-- /.card-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Your Country</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Country</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo site_url('country-update'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Country</label>
                                <select class="form-control select2" name="country" >
                                    <option value="" >Select</option>
                                    <?php foreach ($countrys as $e_country): ?>
                                        <option value="<?php echo $e_country->id ?>" ><?php echo $e_country->name ?></option>
                                    <?php endforeach; ?>
                                </select>
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

