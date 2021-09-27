<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin - <?php echo isset($title) ? $title : ''; ?></title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bootstrap 4 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- JQVMap -->
<!--        <link rel="stylesheet" href="<?php //echo base_url(); ?>assets/admin/plugins/jqvmap/jqvmap.min.css">-->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/dist/css/adminlte.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.css">
        <!-- summernote -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2/css/select2.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">


        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.css">
        <link href='<?= base_url() ?>assets/resources/dropzone.css' type='text/css' rel='stylesheet'>
        
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src='<?= base_url() ?>assets/resources/dropzone.js' type='text/javascript'></script>
        <style>
            .tablestyle{
                margin: 0;
                padding: 0;
                line-height: 0;
                font-size: 12px;
            }
            .tablestyle2{
                margin: 0;
                padding: 0;
                line-height: 0;
                font-size: 8px;
            }
        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">

            <!-- Navbar -->
            <?php include 'lfsaif/views/admin/include/header.php'; ?>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <?php include 'lfsaif/views/admin/include/leftmenu.php'; ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!--                <div class="content-header">
                                    <div class="container-fluid">
                                        <div class="row mb-2">
                                            <div class="col-sm-6">
                                                <h1 class="m-0 text-dark"><?php //echo $heading;     ?></h1>
                                            </div> /.col 
                                         
                                        </div> /.row 
                                    </div> /.container-fluid 
                                </div>-->
                <?php include 'lfsaif/views/admin/include/message.php'; ?>
                <hr>
                <!-- /.content-header -->
                <?php
                if (!empty($mainContent)) {
                    echo $mainContent;
                }
                ?>
                <!-- /.content-wrapper -->

                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">

                </aside>
            </div>
            <?php include 'lfsaif/views/admin/include/footer.php'; ?>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->


        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
<!--        <script src="<?php //echo base_url(); ?>assets/admin/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="<?php //echo base_url(); ?>assets/admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>-->
        <!-- jQuery Knob Chart -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->

        <!-- DataTables -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


        <script src="<?php echo base_url(); ?>assets/admin/plugins/moment/moment.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="<?php echo base_url(); ?>assets/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/admin/dist/js/adminlte.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>assets/admin/dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/admin/dist/js/demo.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/plugins/select2/js/select2.full.min.js"></script>
        <script>
            $(function () {


                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })


                $("#example1").DataTable({
                    "responsive": true,
                    "autoWidth": false,
                });
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script>
        <script>
            function updateClock( )
            {
                var currentTime = new Date();
                var current_date = currentTime.getDate( );
                var current_month = currentTime.getMonth() + 1;
                var current_year = currentTime.getFullYear();
                var currentHours = currentTime.getHours( );
                var currentMinutes = currentTime.getMinutes( );
                var currentSeconds = currentTime.getSeconds( );

                // Pad the minutes and seconds with leading zeros, if required
                currentMinutes = (currentMinutes < 10 ? "0" : "") + currentMinutes;
                currentSeconds = (currentSeconds < 10 ? "0" : "") + currentSeconds;

                // Choose either "AM" or "PM" as appropriate
                var timeOfDay = (currentHours < 12) ? "AM" : "PM";

                // Convert the hours component to 12-hour format if needed
                currentHours = (currentHours > 12) ? currentHours - 12 : currentHours;

                // Convert an hours component of "0" to "12"
                currentHours = (currentHours == 0) ? 12 : currentHours;

                // Compose the string for display
                var currentTimeString = current_date + " : " + current_month + " : " + current_year + " : " + currentHours + ":" + currentMinutes + ":" + currentSeconds + " " + timeOfDay;


                $("#clock").html(currentTimeString);

            }

            $(document).ready(function ()
            {
                setInterval('updateClock()', 1000);
            });
        </script>
    </body>
</html>
