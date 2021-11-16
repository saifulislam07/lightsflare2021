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
		<div class="col-md-12 ">
			<div class="col-md-6 float-left" style="font-size: 10px">
				<div class="card">

					<div class="card-body bg-info" style="text-align: center">
						<h3> <strong>Open Theme</strong></h3>
					</div>
				</div>
			</div>


			<div class="col-md-6 float-right" style="font-size: 13px; font-weight: bold">
				<div class="card">

					<div class="card-body">
						<strong style="margin-left: 30px; text-decoration: underline">Quick Rules : </strong>
						<ol>
							<!--                            <li  style="background: yellow">1 IMAGE $15, 3 IMAGES $30, 6 IMAGES $40</li>-->
							<li>Longest dimension: 1024 pixels, 300dpi, maximum 2MB.</li>
							<li>Saved as a jpeg / jpg</li>
							<li>No Watermarks / Copyright Units / Logos on images</li>
							<li>Photographs without borders</li>
							<li>Capture After 01 January 2019</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-12 col-lg-6 float-left">
				<div class="card ">
					<div class="card-body ">
						<div class="form-group ">
							<div class="col-md-12 float-left">
								<div class="card text-center">
									<div class="card-header bg-info">
										<h3>Packages List</h3>
									</div>
								</div>
							</div>
							<div class="col-md-4 float-left">
								<a href="">
									<a href="<?php echo base_url() . 'products/buy/' . 1; ?>">
										<div class="card">
											<div class="card-body  text-center bg-smokewhite">
												$15
											</div>
											<div class="card-footer bg-info  text-center">
												1 image
											</div>
										</div>
									</a>
							</div>
							<div class="col-md-4 float-left">
								<a href="<?php echo base_url() . 'products/buy/' . 2; ?>">
									<div class="card">
										<div class="card-body  text-center">
											$30
										</div>
										<div class="card-footer  bg-info text-center">
											3 images
										</div>
									</div>
								</a>
							</div>
							<div class="col-md-4 float-left">
								<a href="<?php echo base_url() . 'products/buy/' . 3; ?>">
									<div class="card">
										<div class="card-body  text-center">
											$40
										</div>
										<div class="card-footer  bg-info  text-center">
											6 images
										</div>
									</div>
								</a>
							</div>

							<div class="col-md-12 float-left">
								<div class="card text-center">
									<div class="card-header bg-info">After paying the picture submission option will open</div>
								</div>
							</div>


						</div>
					</div>
				</div>


			</div>

</section>

<script>
	$(document).ready(function() {
		$("#oneImage").hide();
		$("#threeImages").hide();
		$("#sixImages").hide();
		$("#buttonDiv").hide();
	});

	function popDistrictData(category_id) {

		if (category_id == 1) {
			$("#categoryID").val(1);
			$("#oneImage").show();
			$("#buttonDiv").show();
			$("#threeImages").hide();
			$("#sixImages").hide();
		} else if (category_id == 2) {
			$("#categoryID").val(3);
			$("#threeImages").show();
			$("#buttonDiv").show();
			$("#oneImage").hide();

			$("#sixImages").hide();
		} else if (category_id == 3) {
			$("#categoryID").val(6);
			$("#sixImages").show();
			$("#buttonDiv").show();
			$("#oneImage").hide();
			$("#threeImages").hide();
		}
	}
</script>
