<section class="main-container">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table  table-bordered">
						<tr>
							<td colspan="4" style="background-color: red;">
								<h4 style="color:wheat">FEATURED IN</h4>
							</td>
						</tr>
						<tr>
							<th>SL</th>
							<th>Name</th>
							<th>View</th>
						</tr>

						<?php $i = 1;
						foreach ($featuredin as $key => $value) { ?>
							<tr>
								<td style="width: 10%;"><?php echo $i++; ?></td>
								<td><a style="color: black" href="<?php echo $value->url; ?>"><?php echo $value->tile; ?></a></td>
								<td style="width: 10%;">
									<a target="_blank" href="<?php echo $value->url; ?>" class="btn btn-info btn-sm" style="font-size: 8px; padding:5px 0">Click Here</a>
								</td>

							</tr>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<a class="btn btn-success" href="<?php echo site_url('user-signup') ?>">SUBMIT PHOTOS</a>
			</div>
		</div>
	</div>
</section>
