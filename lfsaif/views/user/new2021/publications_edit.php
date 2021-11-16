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
		<div class="col-md-8 offset-2 ">
			<div class="col-md-12">
				<a class="btn btn-success btn-xs" href="<?php echo base_url('publications_list') ?>">Publications List</a>
			</div>


			<div class="col-md-12 col-sm-12 col-lg-12 float-left">
				<div class="card ">
					<div class="card-body ">

						<div class="form-group ">
							<form method="POST" action="" enctype="multipart/form-data">
								<div class="form-group">

									<div class="col-md-12">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Title * </label>
										<div class="col-sm-12">
											<input type="text" id="form-field-1" value="<?php echo $publicationsDetails->tile ?>" name="title" class="form-control required" placeholder="Title" />
										</div>
									</div>
									<div class="col-md-12">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> URL </label>
										<div class="col-sm-12">
											<input type="text" id="form-field-1" value="<?php echo $publicationsDetails->url ?>" name="url" class="form-control required" placeholder="Url" />
										</div>
									</div>
									<div class="col-md-12">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Discription </label>
										<div class="col-sm-12">
											<textarea type="text" id="form-field-1" name="description" class="form-control required" placeholder="Details">
											<?php echo $publicationsDetails->description ?>
											</textarea>
										</div>
									</div>
									<div class="col-md-12">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Logo </label>
										<div class="col-sm-12">
											<input type="file" id="form-field-1" name="logo" class="form-control required" placeholder="logo" />
											<input type="hidden" name="oldLogo" value="<?php echo $publicationsDetails->logo ?>">
											<img width="100px" src="<?php echo base_url('assets/publication/' . $publicationsDetails->logo); ?>" />
										</div>

									</div>
									<br>
									<div class="col-md-12">
										<div class="col-sm-12">
											<button type="submit" class="btn-success">UPDATE</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>


			</div>

</section>
