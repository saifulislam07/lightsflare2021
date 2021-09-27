<style>
    .content {
        width: 100%;
        padding: 5px;
        margin: 0 auto;
    }

    .content span {
        width: 250px;
    }

    .dz-message {
        text-align: center;
        font-size: 28px;
    }

</style>
<script>
    // Add restrictions
    Dropzone.options.fileupload = {
        acceptedFiles: ".jpg,.jpeg",
        maxFilesize: 0.5, // MB



    };

</script>


<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 " >
            <div class="col-md-6 float-left" style="font-size: 10px">
                <div class="card">

                    <div class="card-body">
                        <strong style="margin-left: 30px; text-decoration: underline">Themes : </strong>
                        <ol>
                            <li>Travel / Lifestyle / Documentary / Street / Portrait</li>
                            <li>Wildlife / Macro</li>
                            <li>Landscape / Cityscape / Long-exposure</li>
                            <li>Drone / Aerial</li>
                            <li>Mobile (theme open)</li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-md-6 float-right" style="font-size: 10px">
                <div class="card">

                    <div class="card-body">
                        <strong style="margin-left: 30px; text-decoration: underline">Quick Rules : </strong>
                        <ol>
                            <li>Longest dimension: 1000 pixels, 72dpi, maximum 500kb.</li>
                            <li>Saved as a JPG</li>
                            <li>No Watermarks / Copyright Units / Logos on images</li>
                            <li>Only bleed photographs without borders</li>
                            <li style="color: red">Rename file <b>(No space)</b> : CategoryName_FullName_serial (example : Lifestyle_JhonSmith_1.jpg)</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 " >
            <div class="col-md-12" >
         
                <div class="card " >
                    <div class="card-body ">
                        <form class="form-inline" method="post" action="">
                            <div class="form-group ">
                                <label for="email">Category:</label> &nbsp;
                                <select  class="form-control " name="category_id" required>
                                    <option disabled selected="selected">Select A Category</option>
                                    <?php foreach($categorys as $each): ?>
                                    <option value="<?php echo $each->id?>"> <?php echo $each->title?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label >&nbsp;I agree with &nbsp;<a style="color: red" target="_blank" href="<?php echo site_url('sub-rules')?>">rules</a></label> &nbsp;
                                <input type="checkbox" name="agreerules" value="1" required>
                            </div> &nbsp;
                           
                            <button type="submit"  class="btn btn-success">NEXT STEP</button>
                        </form>
                    </div>
                </div>
                </div>
            </div>

        </div>


    </div>

</section>
