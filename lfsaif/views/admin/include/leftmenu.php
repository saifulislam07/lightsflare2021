<?php
$admin_id = $this->session->userdata('admin_id');
$type = $this->session->userdata('type');
$mymenu = $this->uri->segment(1);
//dumpVar($mymenu);
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="<?php echo site_url('dashboard'); ?>" class="brand-link">
		<h3 class="text-center" style="color:white">Lightsflare</h3>

	</a>
	<div class="sidebar">
		<?php if ($type == 'Admin') : ?>
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="has-treeview">
						<a href="<?php echo site_url('dashboard') ?>" class="<?php echo ($mymenu == "dashboard") ? "active" : ""; ?> nav-link">
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="<?php echo ($mymenu == "add-User" or $mymenu == "user-List") ? "active" : ""; ?> nav-link">
							<p>
								Admin
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item">
								<a href="<?php echo site_url('add-User'); ?>" class="<?php echo ($mymenu == "add-User") ? "active" : ""; ?> nav-link">
									<p>Add Admin</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('user-List'); ?>" class="<?php echo ($mymenu == "user-List") ? "active" : ""; ?> nav-link">
									<p>Admin List</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="<?php echo ($mymenu == "new-use" or $mymenu == "all-user") ? "active" : ""; ?> nav-link">
							<p>
								User
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">

							<li class="nav-item">
								<a href="<?php echo site_url('new-use'); ?>" class="<?php echo ($mymenu == "new-use") ? "active" : ""; ?> nav-link">
									<p>Add User</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('all-user'); ?>" class="<?php echo ($mymenu == "all-user") ? "active" : ""; ?> nav-link">
									<p>User List</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="<?php echo ($mymenu == "home_slider" or $mymenu == "home_about" or $mymenu == "home_watch") ? "active" : ""; ?> nav-link">
							<p>
								Home Page
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item">
								<a href="<?php echo site_url('home_slider'); ?>" class="<?php echo ($mymenu == "home_slider") ? "active" : ""; ?> nav-link">
									<p>Slider Section</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('home_about'); ?>" class="<?php echo ($mymenu == "home_about") ? "active" : ""; ?> nav-link">
									<p>About Section</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('home_watch'); ?>" class="<?php echo ($mymenu == "home_watch") ? "active" : ""; ?> nav-link">
									<p> Watch Section</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item has-treeview">
						<a href="#" class="<?php echo ($mymenu == "category-wise" or $mymenu == "all-submission") ? "active" : ""; ?> nav-link">
							<p>
								My Submission
								<i class="fas fa-angle-left right"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<!-- <li class="nav-item">
								<a href="<?php echo site_url('category-wise'); ?>" class="<?php echo ($mymenu == "category-wise") ? "active" : ""; ?> nav-link">
									<p>New Submit</p>
								</a>
							</li> -->
							<li class="nav-item">
								<a href="<?php echo site_url('all-submission'); ?>" class="<?php echo ($mymenu == "all-submission") ? "active" : ""; ?> nav-link">
									<p>All Submission</p>
								</a>
							</li>
							<li class="nav-item">
								<a href="<?php echo site_url('all-photos'); ?>" class="<?php echo ($mymenu == "all-photos") ? "active" : ""; ?> nav-link">
									<p>User Photos</p>
								</a>
							</li>
						</ul>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('publications'); ?>" class="<?php echo ($mymenu == "publications") ? "active" : ""; ?> nav-link">
							<p>Publication</p>
						</a>
					</li>


					<li class="nav-item">
						<a href="<?php echo site_url('all-detail'); ?>" class="<?php echo ($mymenu == "all-detail") ? "active" : ""; ?> nav-link">
							<p>Payment Details</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('all-marks'); ?>" class="<?php echo ($mymenu == "all-marks") ? "active" : ""; ?> nav-link">
							<p>Markings</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('all-exhibition-data'); ?>" class="<?php echo ($mymenu == "all-exhibition-data") ? "active" : ""; ?> nav-link">
							<p>Exhibition</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('all-awarded'); ?>" class="<?php echo ($mymenu == "all-awarded") ? "active" : ""; ?> nav-link">
							<p>Awarded</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo site_url('queries'); ?>" class="<?php echo ($mymenu == "queries") ? "active" : ""; ?> nav-link">
							<p>User Query</p>
							<b class="float-right">

								<?php
								$totalUnread = $this->Common_model->totalUnreadQuerys();
								?>
								<span class="badge badge-danger" style="padding: 5px; font-size: 15px"><?php echo $totalUnread; ?></span>
							</b>
						</a>

					</li>

					<li class="has-treeview">
						<a href="<?php echo site_url('jury') ?>" class="<?php echo ($mymenu == "jury") ? "active" : ""; ?> nav-link">
							<p>
								Jury
							</p>
						</a>
					</li>

					<!-- 
                    <li class="has-treeview" >
                        <a href="<?php echo site_url('ambassador') ?>" class="<?php echo ($mymenu == "ambassador") ? "active" : ""; ?> nav-link">
                            <p>
                                Ambassador
                            </p>
                        </a>
                    </li> -->
					<li class="has-treeview">
						<a href="<?php echo site_url('rules') ?>" class="<?php echo ($mymenu == "rules") ? "active" : ""; ?> nav-link">
							<p>
								rules
							</p>
						</a>
					</li>
					<li class="has-treeview">
						<a href="<?php echo site_url('question-answers') ?>" class="<?php echo ($mymenu == "question-answers") ? "active" : ""; ?> nav-link">
							<p>
								FAQ
							</p>
						</a>
					</li>
					<li class="has-treeview">
						<a href="<?php echo site_url('signout') ?>" class="nav-link">
							<p style="color: red">
								Logout
							</p>
						</a>
					</li>
				</ul>
			</nav>
		<?php elseif ($type == 'Judge') : ?>
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="has-treeview">
						<a href="<?php echo site_url('dashboard') ?>" class="<?php echo ($mymenu == "dashboard") ? "active" : ""; ?> nav-link">
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="has-treeview">
						<a href="<?php echo site_url('judges-marking') ?>" class="<?php echo ($mymenu == "judges-marking") ? "active" : ""; ?> nav-link">
							<p>
								Marking
							</p>
						</a>
					</li>


					<li class="has-treeview">
						<a href="<?php echo site_url('signout') ?>" class="nav-link">
							<p style="color: red">
								Logout
							</p>
						</a>
					</li>
				</ul>
			</nav>
		<?php else : ?>
			<nav class="mt-2">
				<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
					<li class="has-treeview">
						<a href="<?php echo site_url('dashboard') ?>" class="<?php echo ($mymenu == "dashboard") ? "active" : ""; ?> nav-link">
							<p>
								Dashboard
							</p>
						</a>
					</li>
					<li class="has-treeview">
						<a href="<?php echo site_url('my-profile') ?>" class="<?php echo ($mymenu == "my-profile") ? "active" : ""; ?> nav-link">
							<p>
								My Profile
							</p>
						</a>
					</li>
					<li class="has-treeview">
						<a href="<?php echo site_url('submit-photos') ?>" class="<?php echo ($mymenu == "submit-photos") ? "active" : ""; ?> nav-link">
							<p>
								Payment
							</p>
						</a>
					</li>
					<?php
					$totalBalance = 0;
					$totalBalance = $this->Common_model->getUserBalance($this->session->userdata('admin_id'));
					?>
					<?php if (!empty($totalBalance)) { ?>
						<li class="nav-item has-treeview">
							<a href="#" class="<?php echo ($mymenu == "category-wise" or $mymenu == "all-submission") ? "active" : ""; ?> nav-link">
								<p>
									My Submission
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo site_url('new-submit-2021'); ?>" class=" <?php echo ($mymenu == "new-submit-2021") ? "active" : ""; ?> nav-link">
										<p>New Submit</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo site_url('all-submission_2021'); ?>" class="<?php echo ($mymenu == "all-submission_2021") ? "active" : ""; ?> nav-link">
										<p>All Submission</p>
									</a>
								</li>
							</ul>
						</li>
					<?php } ?>



					<!--                    <li class="nav-item has-treeview">
                                            <a href="#" class="<?php //echo ($mymenu == "new-payment" or $mymenu == "payment-details" ) ? "active" : "";     
																?> nav-link">
                                                <p>
                                                    Payment
                                                    <i class="fas fa-angle-left right"></i>
                                                </p>
                                            </a>
                                            <ul class="nav nav-treeview">
                                                <li class="nav-item">
                                                    <a href="<?php //echo site_url('new-payment');     
																?>" class="<?php //echo ($mymenu == "new-payment") ? "active" : "";     
																			?> nav-link">
                                                        <p>New Payment</p>
                                                    </a>
                                                </li>
                                                                            <li class="nav-item">
                                                                                <a href="<?php //echo site_url('payment-details');                    
																							?>" class="<?php //echo ($mymenu=="payment-details")?"active":"";                    
																										?> nav-link">
                                                                                    <p>Payment Status</p>
                                                                                </a>
                                                                            </li>
                                            </ul>
                                        </li>-->
					<li class="has-treeview">
						<a href="<?php echo site_url('signout') ?>" class="nav-link">
							<p style="color: red">
								Logout
							</p>
						</a>
					</li>
				</ul>
			</nav>
		<?php endif; ?>
	</div>
	<!-- /.sidebar -->
</aside>
