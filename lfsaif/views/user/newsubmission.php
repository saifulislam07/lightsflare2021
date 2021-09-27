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
        maxFiles: 30,
        addRemoveLinks: true,
        success: function (file, response) {

            console.log(response);

            if (response == 200) {
                $('.success').show();
                setTimeout(function () {
                    $('.success').hide();
                }, 4000);
            } else {
                $('.error').show();
                setTimeout(function () {
                    $('.error').hide();
                }, 4000);
            }
        }

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

        <div class="col-md-12">
            <div class="card"> 
                <?php $category_id = $this->session->userdata('category_id'); ?>

                <div class="card-body">
                    <form action="<?= base_url('fileUpload') ?>" class="dropzone" id='fileupload'>
                </div>
                <div class="success alert-danger" style="color:white;display: none;text-align: center; padding: 10px 0" >File Uploaded Failed! File type is invalid</div>
                <div class="error alert-success" style="color:white;display: none; text-align: center; padding: 10px 0" >File successfully uploaded! </div>
            </div>

        </div>
        <div class="col-md-12">
            <div class="card"> 
                <a href="<?php echo base_url('category-wise') ?>" class="btn btn-info" style="color: white">Next For New Submission</a>
            </div>
        </div>
    </div>



</section>
