<?php $user_id = $this->session->userdata('admin_id'); ?>
<script>
    $(document).ready(function () {

        document.getElementById("example1").classList.remove('collapsed');
    });
</script>
<style>
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
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Source</th>
                                        <th>Amount</th>
                                        <th>TrxID</th>
                                        <th>Pay From</th>
                                        <th>Status</th>
                                        <th>Payment</th>
                                        <th>Received By </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    //     dumpVar($submission_details);
                                    $i = 1;
                                    foreach ($submission_details as $each):
                                        ?>
                                        <tr >
                                            <td><?php echo $i++; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($each->paytime)); ?></td>
                                            <td><?php echo $each->name; ?></td>

                                            <td><?php
                                                if ($each->currency_code == 'TK') {
                                                    echo '<b style="color: red">Bkash</b>';
                                                } else {
                                                    echo '<b style="color: green">PayPal</b>';
                                                }
                                                ?></td>

                                            <?php if ($each->currency_code == 'TK'): ?>
                                                <td><?php echo $each->amount; ?></td>
                                            <?php else: ?>
                                                <td><?php echo $each->payment_gross; ?></td>
                                            <?php endif; ?>




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
                                            <?php if ($each->payment_status == 'Completed') { ?>
                                                <td style = "padding: 0 0;"><a href = "<?php echo site_url('reject-paymnet/' . $each->payment_id) ?>" onclick = "return confirm('Are you sure , you Reject the Payment ?')" style = "color: white" class = "btn btn-xs btn-warning">Reject</a>
                                                    <?php if ($each->currency_code == 'TK'): ?>
                                                        <a onclick="getData('<?php echo $each->txn_id ?>', '<?php echo $each->number ?>', '<?php echo $each->amount ?>', '<?php echo $each->reference ?>', '<?php echo $each->payment_id ?>')" data-toggle="modal" data-target="#edit-payment" style = "color: white" class = "btn btn-xs btn-info">Edit</a>
                                                        <a href="<?php echo site_url('AdminController/delete_data/' . $each->payment_id) ?>" onclick="return confirm('Are you sure?')" style = "color: white" class = "btn btn-xs btn-danger">Delete</a>
                                                    </td>
                                                <?php endif; ?>
                                            <?php } else { ?>
                                                <td style = "padding: 0 0;"><a href = "<?php echo site_url('accept-paymnet/' . $each->payment_id) ?>" onclick = "return confirm('Are you sure , you Received the amount ?')" style = "color: white" class = "btn btn-xs btn-success">Received</a>
                                                    <?php if ($each->currency_code == 'TK'): ?>
                                                        <a onclick="getData('<?php echo $each->txn_id ?>', '<?php echo $each->number ?>', '<?php echo $each->amount ?>', '<?php echo $each->reference ?>', '<?php echo $each->payment_id ?>')" data-toggle="modal" data-target="#edit-payment" style = "color: white" class = "btn btn-xs btn-info">Edit</a>
                                                        <a href="<?php echo site_url('AdminController/delete_data/' . $each->payment_id) ?>" onclick="return confirm('Are you sure?')" style = "color: white" class = "btn btn-xs btn-danger">Delete</a>
                                                    </td>
                                                <?php endif; ?>
                                            <?php }
                                            ?>
                                            <td><?php
                                                $receiverdby = $this->Common_model->table_info('admin', 'admin_id', $each->receiver_id);
                                                if (!empty($receiverdby)) {
                                                    echo $receiverdby->name;
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
<div class="modal fade" id="edit-payment">
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
                    <form action="<?php echo site_url('AdminController/paymentUpdate'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">TrxID<span style="color: red"> *<span></label>
                                            <input type="text" class="form-control" name="txn_id" id="trx" placeholder="Enter Transection  ID" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">SEND FROM (Number)<span style="color: red"> *<span></label>
                                                            <input type="type" class="form-control" name="number" id="numbr" placeholder="Sender Number" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputPassword1">AMOUNT<span style="color: red"> *<span></label>
                                                                            <input type="type" class="form-control" name="amount" id="amount" placeholder="Total Amount" required>
                                                                            <input name="payment_id" id="payment_id" type="hidden">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="exampleInputPassword1">Reference<span style="font-size: 9px"> (If you have references)<span></label>
                                                                                            <input type="type" class="form-control" name="reference" id="ref" placeholder="Reference Group or Person name">
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
                                                                                                function getData(trx, numbr, amount, ref, payment_id) {
                                                                                                    $("#trx").val(trx);
                                                                                                    $("#numbr").val(numbr);
                                                                                                    $("#amount").val(amount);
                                                                                                    $("#ref").val(ref);
                                                                                                    $("#payment_id").val(payment_id);
                                                                                                }
                                                                                            </script>


