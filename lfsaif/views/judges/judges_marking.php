
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
                        <div class="card-body text-center">
                            <form class="form-inline" method="post" action="">
                                <div class="form-group ">
                                    <label for="email">Category:</label> &nbsp;
                                    <select  class="form-control " name="category_id"  onchange="CatWisePhotoView(this.value)">
                                        <option disabled selected="selected">Select A Category</option>
                                        <?php foreach ($categorys as $each): ?>
                                            <option value="<?php echo $each->id ?>"> <?php echo $each->title ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12 col-12">
                <div class="card ">
                    <div class="card-header">
                        <h3 class="card-title">Category : </h3>
                    </div>
                    <div id="shotsubcategory">

                    </div>
                </div>
            </div>
        </div>
</section>
<script>
    
    function CatWisePhotoView(category_id) {
        var url = '<?php echo site_url("JudgingController/CatWisePhotoViewFrom") ?>';
        $.ajax({
            type: 'POST',
            url: url,
            data: {'category_id': category_id},
            dataType: "html",
            success: function (data)
            {
                // alert(data);
                $("#shotsubcategory").html(data);

            }
        });
    }


    $(document).ready(function() {
        $(document).on('blur', '.marks, .note', function (e) {
            e.preventDefault();
            //alert('hello');
            let element = $(this).closest('tr');
            data_update(element);
        });

        $(document).on('change', '.awarded', function (e) {
                e.preventDefault();
            let element = $(this).closest('tr');
            data_update(element);
        });

        function data_update(element) {
           // debugger;
            let photo_id = element.attr('data-id');
            let marks = element.find('.marks').val();
//            let awarded = element.find('awarded').val($(this).is(':checked'));
            let awarded = element.find('.awarded').is(":checked");
            let note = element.find('.note').val();
            let category_id = element.find('.category_id').val();

          //  alert(photo_id);
            var url = '<?php echo site_url("JudgingController/save_data") ?>';
            $.ajax({
                type: 'POST',
                url: url,
                data: {'photo_id': photo_id, 'marks': marks, 'awarded': awarded, 'note': note, 'category_id': category_id},
                // dataType: "html",
                success: function (data)
                {
    //                alert(data);
                  //  console.log(data);
                }
            });
             return false;
        }
    });
</script>

