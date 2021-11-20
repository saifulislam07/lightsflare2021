<?php //include 'lfsaif/views/frontend/include/banner.php'; 
?>
<?php include 'lfsaif/views/frontend/include/countdown.php'; ?>
<style>
	sections.download-section {
		padding: 80px 0 60px 0;
	}

	sections {
		width: 100%;
		float: left;
	}


	.containers {
		padding-right: 15px;
		padding-left: 15px;
		margin-right: auto;
		margin-left: auto;
	}

	.download-content ul li a:hover {
		color: rgb(244, 121, 32);
		text-decoration: none;
	}

	.download-content ul li a {
		color: rgb(255, 255, 255);
		padding: 15px 0;
		border-bottom: 1px solid rgba(255, 255, 255, .05);
		float: left;
		width: 100%;
		font-size: 16px;
	}

	a {
		background-color: transparent;
		text-decoration: none;
	}

	.download-content ul {
		margin: 0 0 20px 0;
		padding: 0 60px;
		float: left;
		width: 100%;
	}

	.social-responsibility h3,
	.download-content h3 {
		text-align: center;
		color: #fff;
		text-transform: uppercase;
		font-family: 'DIN Next W01 Ultra-Light';
		font-size: 26px;
	}

	ul {
		display: block;
		list-style-type: disc;
		margin-block-start: 1em;
		margin-block-end: 1em;
		margin-inline-start: 0px;
		margin-inline-end: 0px;
		padding-inline-start: 40px;
	}

	.download-content ul li {
		list-style: none;
		float: left;
		width: 100%;
	}

	li {
		display: list-item;
		text-align: -webkit-match-parent;
	}
</style>

<?php
$aboutSection = $this->Common_model->get_single_data_by_single_column('home_about', 'status', 'Active', 'id', 'DESC');
$home_watch = $this->Common_model->get_single_data_by_single_column('home_watch', 'status', 'Active', 'id', 'DESC');
//dumpVar($address);
?>

<div class="section clearfix">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-lg-12">
				<div class="clearfix"></div>
				<br>
				<div class="row">
					<?php if (!empty($aboutSection->left_side_title)) : ?>
						<div class="col-md-12">
							<?php echo $aboutSection->left_side_title; ?><br><br>
							<?php echo $aboutSection->left_side_desccription; ?>
						</div>
					<?php endif; ?>

				</div>
				<div class="section text-muted footer-top clearfix">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="owl-carousel clients">
									<?php


									foreach ($featuredin as $key => $value) { ?>
										<div class="client">
											<a target="_blank" href="<?php echo $value->url; ?>">
												<img src="<?php echo base_url('assets/publication/' . $value->logo); ?>" />
											</a>
										</div>

									<?php	} ?>

								</div>
							</div>

						</div>
					</div>
				</div>













				<div class="row">
					<div class="col-md-12 text-center">
						<a class="btn btn-success" href="<?php echo site_url('user-signup') ?>">SUBMIT PHOTOS</a>
					</div>
				</div>
				<br>
			</div>
		</div>
	</div>
</div>
<?php
if (!empty($home_watch)) :
?>
	<section class="main-container">

		<div class="container">
			<div class="row">

				<!-- main start -->
				<!-- ================ -->
				<div class="main col-md-12">

					<!-- page-title start -->
					<!-- ================ -->
					<!-- page-title end -->
					<div class="row">
						<div class="col-md-6">
							<h1 class="page-title margin-top-clear"><?php echo $home_watch->title; ?></h1>
							<p><?php echo $home_watch->description; ?></p>
						</div>
						<div class="col-md-6">
							<div class="tab-pane" id="portfolio-video">
								<div class="embed-responsive embed-responsive-16by9">
									<iframe class="embed-responsive-item" src="<?php echo $home_watch->embaded_video; ?>?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

								</div>
							</div>
						</div>
					</div>
					<hr>

				</div>
				<!-- main end -->

			</div>
		</div>
	</section>
<?php endif; ?>
