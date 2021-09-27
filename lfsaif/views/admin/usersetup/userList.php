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
                        <h3 class="card-title">All User </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table  id="brand_datatable" class="table ">
                                <thead>
                                    <tr>
                                        <th width="5%">Sl</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th width="7%">Status</th>
                                        <th width="15%">Action</th>
                                    </tr>
                                </thead>

                                <tbody>








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
<div class="modal fade" id="user-pass-change">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">User Password Change</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo site_url('user-pass-change'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" name="password"  id="" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control"  name="c_password" id="" placeholder="Confirm Password">
                                <input type="hidden" name="updateIde" id="updateIde">
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

<div class="modal fade" id="user-mail">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="card card-primary">

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?php echo base_url('reminder-email') ?>" method="post" >
                        <div class="card-body">

                            <div class="form-group">
                                <input type="hidden" name="u_name" id="u_name">
                                <input type="hidden" name="userid" id="userid">
                                <input type="hidden" name="email" id="email">
                                <label for="exampleInputPassword1">Mail Body</label>
                                <textarea style="height:  300px" type="type" class="form-control" name="detailsmail" id="" placeholder="Total Amount">
                                
                               Thank you so much for registering on the 'Lightsflare International Photography Award 2020' website. But you have not yet completed your submission.

                               &#13;&#10; Only few Days left for you to enter the LightsFlare International Photography Award 2020. Make sure to complete by October 31th 2020.

                               &#13;&#10; This is an excellent opportunity for Photographers like yourself to receive promotional awards,Cash Prizes and connect with the international Photography community! 
                                Enter the competition now before it's too late https://www.lightsflare.com/user-signin

                               &#13;&#10; Regards,

                                &#13;&#10;Razia Sultana
                                &#13;&#10;Executive, Lightsflare
                                &#13;&#10;LightsFlare Photography Award
                                &#13;&#10;+88013 1395 1100
                                &#13;&#10;info@lightsflare.com
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
    function userStatusChanges(userId, status) {


        if (status == 2) {
            status = 'Inactive';
        } else {
            status = 'Active';
        }

        var url = '<?php echo site_url("AdminController/userStatusChange") ?>';
        $.ajax({
            type: 'POST',
            url: url,
            data: {'userId': userId, 'status': status},
            dataType: "html",
            success: function (data) {

                location.reload();
            }
        });
    }

    function getDataRe(admin_id) {

        $("#updateIde").val(admin_id);
    }
    function getUsrData(userid, name, email) {
        $("#u_name").val(name);
        $("textarea").prepend("Dear " + name);
        $("#e_name").val(name);
        $("#userid").val(userid);
        $("#email").val(email);
    }
</script>




<script>

    $(document).ready(function () {

        //datatables

        var table = $('#brand_datatable').DataTable({

            "processing": true, //Feature control the processing indicator.

            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "paging":   false,

            "order": [], //Initial no order.



            // Load data for the table's content from an Ajax source

            "ajax": {

                "url": "<?php echo site_url('ServerFilterController/userList') ?>",

                "type": "POST"

            },

            //Set column definition initialisation properties.

            "columnDefs": [

                {

                    "targets": [0], //first column / numbering column

                    "orderable": false, //set not orderable

                },
            ],

            //            "columns": [

            //                {data: 'brandName'},

            //                ]

        });

    });



</script>

