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

            if (response == 11) {
                $('.error11').show();
                setTimeout(function () {
                    $('.error11').hide();
                }, 4000);
            }
            if (response == 00) {
                $('.error00').show();
                setTimeout(function () {
                    $('.error00').hide();
                }, 4000);
            }
            if (response == 44) {
                $('.error44').show();
                setTimeout(function () {
                    $('.error44').hide();
                }, 4000);
            }
            if (response == 200) {
                $('.success').show();
                setTimeout(function () {
                    $('.success').hide();
                }, 4000);
            } 
        }

    };









</script>


<section class="content">

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12 " >

            <div class="col-md-12 float-right" style="font-size: 10px">
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
                <div class="card-body">
                    <form action="<?= base_url('fileUpload2021') ?>" class="dropzone" id='fileupload'>
                </div>
                <div class="success alert-success" style="color:white;display: none;text-align: center; padding: 10px 0" >File successfully uploaded!</div>
                <div class="error alert-success" style="color:white;display: none; text-align: center; padding: 10px 0" > </div>
                <div class="error11 alert-danger" style="color:white;display: none; text-align: center; padding: 10px 0" >Your limit is over!</div>
                <div class="error00 alert-warning" style="color:white;display: none; text-align: center; padding: 10px 0" >Please recharge your wallet !</div>
                <div class="error44 alert-danger" style="color:white;display: none; text-align: center; padding: 10px 0" >Something wrong, Please try again! !</div>
            </div>

        </div>
    </div>



</section>
