<?php
$mymenu = $this->uri->segment(1);

$admin_id = $this->session->userdata('admin_id');
$type = $this->session->userdata('type');
$username = $this->session->userdata('username');
//dumpVar($type);
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">

		<!-- Toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav navbar-right" style="font-size: 10px">
				<li class="<?php echo ($mymenu == "home" or $mymenu == "") ? "active" : ""; ?>"><a href="<?php echo base_url('home') ?>">Home</a></li>
				<!--<li class=""><a href="<?php // echo base_url('home')                     
											?>" class="active">About Lights Flare</a></li>-->
				<li class="<?php echo ($mymenu == "jurys") ? "active" : ""; ?>"><a href="<?php echo base_url('jurys') ?>">JURY</a></li>

				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Details</a>
					<ul class="dropdown-menu">
						<li class="<?php echo ($mymenu == "sub-rules") ? "active" : ""; ?>"><a href="<?php echo base_url('sub-rules') ?>" class="active">RULES</a></li>
						<li class="<?php echo ($mymenu == "Frequently-Asked-Questions") ? "active" : ""; ?>"><a href="<?php echo base_url('Frequently-Asked-Questions') ?>" class="active">FAQ</a></li>
					</ul>
				</li>


				<!-- mega-menu start -->
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Results</a>
					<ul class="dropdown-menu">
						<li><a href="<?php echo base_url('2020-winners') ?>">2020 Winners</a></li>
					</ul>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Exhibition</a>
				</li>
				<li class="<?php echo ($mymenu == "featuredIn") ? "active" : ""; ?>"><a href="<?php echo base_url('featuredIn') ?>">FEATURED IN</a></li>
				<li class="<?php echo ($mymenu == "contact-us") ? "active" : ""; ?>"><a href="<?php echo base_url('contact-us') ?>">Contact US</a></li>
				<li class="<?php echo ($mymenu == "check-Number") ? "active" : ""; ?>"><a style="color: white" href="<?php echo base_url('check-Number') ?>"><button class="btn-xs btn-success">ENTER NOW</button></a></li>

			</ul>
		</div>

	</div>
</nav>
