<style>
	* {
		box-sizing: border-box;
	}

	.zoom:hover {
		-ms-transform: scale(2.5);
		/* IE 9 */
		-webkit-transform: scale(2.5);
		/* Safari 3-8 */
		transform: scale(2.5);
	}
</style>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">

				<!-- /.card -->
				<div class="col-md-12">
					<a class="btn btn-success btn-xs" href="<?php echo base_url('publications') ?>">New Entry</a>
				</div>
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">All Publications </h3>
					</div>


					<!-- /.card-header -->
					<div class="card-body">
						<table id="example1" class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th width="5%">Sl</th>
									<th width="10%">Title</th>
									<th width="25%">Url</th>
									<th width="25%">Description</th>
									<th width="15%">Logo</th>
									<th width="25%">Action</th>
								</tr>
							</thead>

							<tbody>
								<?php foreach ($publicationslist as $key => $value) : ?>
									<tr>
										<td><?php echo $key + 1; ?></td>
										<td><?php echo $value->tile; ?></td>
										<td><a target="_blank" href="<?php echo $value->url; ?>">URL</a></td>
										<td><?php echo $value->description; ?></td>
										<td><?php echo $value->logo; ?></td>
										<td>
											<a class="btn btn-xs btn-info" href="<?php echo base_url('edit_publication/' . $value->publication_id) ?>">Edit</a>
											<a class="btn btn-xs btn-danger" onclick="return confirm('Are you sure you want to search Google?')" href="<?php echo base_url('delete_publication/' . $value->publication_id) ?>">Delete</a>
										</td>
									</tr>
								<?php endforeach; ?>
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
