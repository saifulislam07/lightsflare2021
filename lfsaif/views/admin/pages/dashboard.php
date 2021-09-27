
<?php
$admin_type = $this->session->userdata('type');
$username = $this->session->userdata('username');
$admin_id = $this->session->userdata('admin_id');
//dumpVar($admin_type);
?>

<?php if ($admin_type == 'Admin'): ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="small-box bg-purple" style="text-align: center; padding: 10px 0">
                        Hello, <?php echo $username; ?> Today is :  <a  class="" href="<?php echo site_url('dashboard'); ?>" style=" text-transform: uppercase; color: white"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp; &nbsp;<span id="clock"><?php echo date("Y-m-d h:i:sa") ?></span> &nbsp;<?php echo date('l') ?></a>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning" style="min-height: 122px;">
                        <div class="inner">
                            <h3 style="color:white"><?php echo $registered->userregi; ?></h3>

                            <p style="color: white">User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger" style="min-height: 122px;">
                        <div class="inner">
                            <h3><?php echo $usersubmission; ?></h3>

                            <p>Number of participant</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3 col-6" >
                    <!-- small box -->
                    <div class="small-box bg-info" style="min-height: 122px;">
                        <div class="inner">
                            <h3><?php echo $totalsubmission->total ?></h3>

                            <p>Number of Submission</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>

                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="min-height: 122px;">
                    <!-- small box -->
                    <div class="small-box bg-success" style="min-height: 122px;">
                        <div class="inner">
                            <h5>Bkash : TK. <?php
                                if (!empty($bkash->totaltk)) {
                                    echo $bkash->totaltk;
                                }
                                ?></h5>
                            <h5>Paypal : $ <?php
                                if (!empty($paypal->totalusd)) {
                                    echo $paypal->totalusd;
                                }
                                ?></h5>
                            <h4>Total : 
                                <?php
                                $total = 0;
                                echo 'TK. ' . $total = $bkash->totaltk + $paypal->totalusd * 85;
                                ?>
                            </h4>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>

                    </div>
                </div>

                <!-- ./col -->

                <!-- ./col -->

                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="small-box bg-orange" style="text-align: center; padding: 30px 0">
                        <h5 style="color: white">
                            Unpaid : <?php echo $this->db->where(['disabled' => 1])->from("submissions")->count_all_results(); ?>, 
                            Primary Judging: <?php echo $this->db->where(['deleted' => 1])->from("submissions")->count_all_results(); ?></h5>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <div class="col-md-6">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">


                        <div id="accordion">
                            <div class="card-header">
                                <h4 class="card-title w-100">
                                    <a class="d-block w-100" data-toggle="collapse" href="#countrywise">
                                        <div class="widget-user-header bg-info">
                                            <h5>Country Wise Total Submission <button class="btn btn-default btn-sm">Click</button></h5>
                                        </div>
                                    </a>
                                </h4>
                            </div>
                            <div id="countrywise" class="collapse" data-parent="#accordion">
                                <div class="card-body">
                                    <?php
                                    $i = 1;
                                    foreach ($countrysubmission as $each):
                                        ?>
                                        <div class="card-footer p-0">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a href="#" class="nav-link">
                                                        <?php echo $i++ . '. ' . $each->name ?> <span class="float-right badge bg-primary"><?php echo $each->totalcounty ?></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <!-- Add the bg color to the header using any of the bg-* classes -->

                    </div>
                    <!-- /.widget-user -->
                </div>
                <div class="col-md-6">
                    <!-- Widget: user widget style 2 -->
                    <div class="card card-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-info">
                            <h5>Per Category Total Submission</h5>
                        </div>
                        <?php foreach ($categorys as $each): ?>
                            <div class="card-footer p-0">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <?php echo $each->title ?> <span class="float-right badge bg-primary"><?php echo $numberofsubmission = $this->Common_model->count_category_submission($each->id)->totalcatsub; ?></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<?php elseif ($admin_type == 'Judge') : ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-12 col-12">
                    <div class="col-lg-4 col-4 float-left"><div class="card">
                            <div class="card-body">
                                <?php if ($admin_id == 1336): ?>

                                    <img width="100%"  src="<?php echo base_url('assets/admin/jurys/3e57f-_mario-bejagan-cardenas_profile-photo-2.jpg') ?>" alt="judge image">
                                <?php endif; ?>
                                <?php if ($admin_id == 1338): ?>
                                    <img width="100%"  src="<?php echo base_url('assets/admin/jurys/8db20-sal.jpg') ?>" alt="judge image">

                                <?php endif; ?>
                                <?php if ($admin_id == 1337): ?>
                                    <img width="100%"  src="<?php echo base_url('assets/admin/jurys/9c967-dsc_4693-01.jpg') ?>" alt="judge image">

                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-8 float-right">
                        <div class="card">
                            <div class="card-body">
                                <div class="small-box bg-info">
                                    <h5 style="text-align: center; padding: 10px 0">Hello, <?php echo $username; ?> <br>
                                        Welcome to <a style="color: white; font-weight: bold" href="http://lightsflare.com/">LightsFlare</a></h5>
                                </div>
                                <div class="small-box bg-info" style="text-align: center; padding: 10px 0">
                                    <a  class="" href="<?php echo site_url('dashboard'); ?>" style=" text-transform: uppercase; color: white"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp; &nbsp;<span id="clock"><?php echo date("Y-m-d h:i:sa") ?></span><br><span><?php echo date('l') ?></span></a>
                                </div>

                                <hr>
                                <div class="" >
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-center">
                                                <strong>Gave your number according to the category</strong>
                                            </p>


                                            <?php
                                            foreach ($totalImagesByCateogrys as $each):
                                                $markedByJudge = $this->Common_model->getTotalMarkCount($each->category_id, $admin_id);
                                                $percentage = round(( $markedByJudge / $each->totalImge) * 100);
                                                ?>
                                                <div class="progress-group">
                                                    <?php echo $each->title ?>
                                                    <span class="float-right"><b><?php echo $markedByJudge; ?></b>/<?php echo $each->totalImge ?></span>
                                                    <div class="progress progress-sm">
                                                        <div class="progress-bar <?php
                                                        if ($each->category_id == 1) {
                                                            echo 'bg-success';
                                                        } elseif ($each->category_id == 2) {
                                                            echo 'bg-danger';
                                                        } elseif ($each->category_id == 3) {
                                                            echo 'bg-primary';
                                                        } elseif ($each->category_id == 4) {
                                                            echo 'bg-warning';
                                                        } elseif ($each->category_id == 5) {
                                                            echo 'bg-info';
                                                        }
                                                        ?>" style="width: <?php echo round($percentage); ?>%"></div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>



                                            <!-- /.progress-group -->

                                            <!--                                            <div class="progress-group">
                                                                                            Complete Purchase
                                                                                            <span class="float-right"><b>310</b>/400</span>
                                                                                            <div class="progress progress-sm">
                                                                                                <div class="progress-bar bg-danger" style="width: 75%"></div>
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                         /.progress-group 
                                                                                        <div class="progress-group">
                                                                                            <span class="progress-text">Visit Premium Page</span>
                                                                                            <span class="float-right"><b>480</b>/800</span>
                                                                                            <div class="progress progress-sm">
                                                                                                <div class="progress-bar bg-success" style="width: 60%"></div>
                                                                                            </div>
                                                                                        </div>
                                            
                                                                                         /.progress-group 
                                                                                        <div class="progress-group">
                                                                                            Send Inquiries
                                                                                            <span class="float-right"><b>250</b>/500</span>
                                                                                            <div class="progress progress-sm">
                                                                                                <div class="progress-bar bg-warning" style="width: 50%"></div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="progress-group">
                                                                                            Send Inquiries
                                                                                            <span class="float-right"><b>250</b>/500</span>
                                                                                            <div class="progress progress-sm">
                                                                                                <div class="progress-bar bg-info" style="width: 50%"></div>
                                                                                            </div>
                                                                                        </div>-->
                                            <!-- /.progress-group -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- small box -->




                </div>

                <!-- ./col -->

                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<?php elseif ($admin_type == 'User') : ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="col-lg-8 float-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="small-box bg-info ">
                                    <h5 style="text-align: center; padding: 10px 0">Hello, <?php echo $username; ?> <br>
                                        Welcome to <a style="color: white; font-weight: bold" href="http://lightsflare.com/">LightsFlare</a></h5>
                                </div>

                                <div class="small-box bg-info" style="text-align: center; padding: 10px 0">
                                    <a  class="" href="<?php echo site_url('dashboard'); ?>" style=" text-transform: uppercase; color: white"><i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;&nbsp; &nbsp;<span id="clock"><?php echo date("Y-m-d h:i:sa") ?></span><br><span><?php echo date('l') ?></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 float-left">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-body bg-primary">
                                        <h3> Total Balance : <?php
                                            if (!empty($totalBalance)) {
                                                echo '$' . $totalBalance;
                                            } else {
                                                echo '$' . '0.00';
                                            }
                                            ?></h3>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body bg-primary">
                                        <h3> Total Uploaded : <?php
                                            if (!empty($totalImages)) {
                                                echo $totalImages;
                                            } else {
                                                echo '0';
                                            }
                                            ?></h3>
                                    </div>
                                </div>


                           
                            </div>
                        </div>
                    </div>



                    <?php if ($country_check == 18): ?>


                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-body ">
                                    <div class="col-md-6 float-left ">
                                        <div class="card">
                                            <strong style="text-decoration: underline; text-align: center ">Entry Process Guides : </strong>
                                            <div class="card-body  bg-gray-light" style="font-size : 12px">
                                                <ul>

                                                    <li>Step 1 : Goto My Submission > New Submit </li>
                                                    <li>Step 2 : Select your category and check the agreed rules then submit</li>
                                                    <li>Step 3 : click on upload area (drop files here to upload)</li>
                                                    <li>Step 4 : If you want to upload different categories then do it some ways</li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 float-right">
                                        <div class="card">
                                            <div class="card-body text-center bg-gray-light">
                                                <h6>When the submission process is complete, send the money to the specified number and enter the details of the transaction.</h6>
                                                <h6 style="color: green">menu : Payment > new payment -> bkash button</h6>
                                                <h4 style="color: blue; ">bKash : 01916 66 58 32  (personal) </h4>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <div class="col-lg-12 col-12">
                            <!-- small box -->


                            <div class="col-lg-4 col-sm-12 float-left text-center">
                                <div class="card">
                                    <div class="card-header bg-success">How to submit</div>
                                    <div class="card-body">
                                        <iframe  height="150" width="260" src="https://www.youtube.com/embed/Q7XoLW4ogcI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-12 float-left text-center">
                                <div class="card">
                                    <div class="card-header bg-success">bKash Payment by APP</div>
                                    <div class="card-body">
                                        <iframe  height="150" width="260" src="https://www.youtube.com/embed/tyjzj7Jp06I" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> 
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-sm-12 float-right text-center">
                                <div class="card">
                                    <div class="card-header bg-success">bKash Payment by Button Phone</div>
                                    <div class="card-body">
                                        <iframe  height="150" width="260" src="https://www.youtube.com/embed/TSKRqLxJBGA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php endif; ?>
                    <!-- ./col -->

                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
    </section>
<?php endif; ?>

<!-- Main content -->

