
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
                            <div class="table-responsive">
                                <table id="brand_datatable" class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Photos</th>

                                        </tr>
                                    </thead>
                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<script>

    $(document).ready(function () {

        //datatables

        var table = $('#brand_datatable').DataTable({

            "processing": true, //Feature control the processing indicator.

            "serverSide": true, //Feature control DataTables' server-side processing mode.

            "order": [], //Initial no order.



            // Load data for the table's content from an Ajax source

            "ajax": {

                "url": "<?php echo site_url('ServerFilterController/allUsersPhotos') ?>",

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


    function primaryJudgint(pid) {
        var url = '<?php echo site_url("JudgingController/primaryMarkingUpdate") ?>';
        $.ajax({
            type: 'POST',
            url: url,
            data: {'pid': pid},
            dataType: "html",
            success: function (data)
            {
                // alert(data);
               // $("#shotsubcategory").html(data);

            }
        });
    }
</script>




