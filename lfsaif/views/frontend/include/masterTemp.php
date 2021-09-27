<!DOCTYPE html>
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php
            if (!empty($title)) {
                echo $title . " - ";
            }
            ?>LightsFlare</title>

        <meta name="title" content="lightsflare international photography award street lifestyle contest portrait drone aerial dailylife travel mobile etc.">
        <meta name="description" content="lightsflare international photography award"/>
        <meta name="keywords" content="contest award prize money photo photocontest photography award dollar"/>
        <meta name="subject" CONTENT="photo contest ">
        <meta name="Geography" CONTENT="lightsflare international photography award">
        <meta name="Language" CONTENT="English">
        <meta name="Copyright" CONTENT="Lightsflare">
        <meta name="Publisher" CONTENT="Lightsflare photocontest">
        <meta name="distribution" CONTENT="Global">
        <meta name="Robots" CONTENT="INDEX,FOLLOW">
        <meta name="zipcode" CONTENT="1206">
        <meta name="city" CONTENT="Dhaka">
        <meta name="country" CONTENT="BD">
        <meta name="revisit-after" content="1">
        <meta name="geo.region" content="BD-13"/>
        <meta name="geo.placename" content="Dhaka"/>
        <meta name="geo.position" content="23.78542,90.3834122"/>
        <meta name="ICBM" content="223.78542, 90.3834122"/>

        <link rel="alternate" href="http://lightsflare.com/" hreflang="en-us"/>
        <link rel="alternate" hreflang="en-us" href="http://lightsflare.com/"/>

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url() ?>assets/frontend/images/favicon.ico">

        <!-- Web Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=PT+Serif' rel='stylesheet' type='text/css'>

        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url() ?>assets/frontend/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Font Awesome CSS -->
        <link href="<?php echo base_url() ?>assets/frontend/fonts/font-awesome/css/font-awesome.css" rel="stylesheet">

        <!-- Fontello CSS -->
        <link href="<?php echo base_url() ?>assets/frontend/fonts/fontello/css/fontello.css" rel="stylesheet">

        <!-- Plugins -->
        <link href="<?php echo base_url() ?>assets/frontend/plugins/rs-plugin/css/settings.css" media="screen" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/frontend/plugins/rs-plugin/css/extralayers.css" media="screen" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/frontend/plugins/magnific-popup/magnific-popup.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/frontend/css/animations.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/frontend/plugins/owl-carousel/owl.carousel.css" rel="stylesheet">

        <!-- iDea core CSS file -->
        <link href="<?php echo base_url() ?>assets/frontend/css/style.css" rel="stylesheet">

        <!-- Style Switcher Styles (Remove these two lines) -->
        <link href="#" data-style="styles" rel="stylesheet">


        <!-- Custom css -->
        <link href="<?php echo base_url() ?>assets/frontend/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
                <script src="<?php echo base_url() ?>assets/frontend/https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                <script src="<?php echo base_url() ?>assets/frontend/https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <style>
            .fontstyleHome{
                color: rgba(0,0,0,1);
                margin: 0;
                text-transform: uppercase;
                font-family: 'DIN Next W01 Ultra-Light';
                text-align: justify;

            }
            .btnstyle {

                background: rgb(255,140,0);
                color: #fff;
                padding: 5px 50px;
                border: 1px solid rgb(255,140,0);
                border-radius: 5px;
                font-family: 'DIN Next W01 Regular';
                font-size: 16px;

            }
            .btnstyle:hover{

                background: white;
                color: orange;
                padding: 5px 50px;
                border: 1px solid rgb(255,140,0);
                border-radius: 5px;
                font-family: 'DIN Next W01 Regular';
                font-size: 16px;

            }
            .fixedFooter {
                min-height: 1000px;
            }

        </style>
    </head>

    <!-- body classes: 
                    "boxed": boxed layout mode e.g. <body class="boxed">
                    "pattern-1 ... pattern-9": background patterns for boxed layout mode e.g. <body class="boxed pattern-1"> 
    -->
    <body class="front no-trans">
        <!-- scrollToTop -->
        <!-- ================ -->
        <div class="scrollToTop"><i class="icon-up-open-big"></i></div>

        <!-- page wrapper start -->
        <!-- ================ -->
        <div class="page-wrapper">
            <header class="header fixed clearfix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <!-- header-left start -->
                            <!-- ================ -->
                            <div class="header-left clearfix">
                                <!-- logo -->
                                <div class="logo" style="">
                                    <a href="<?php echo base_url('home') ?>"><img style="max-width: 50%;" id="logo" src="<?php echo base_url() ?>assets/frontend/images/logo_dark_red.png" alt="LightsFlare Logo"></a>
                                </div>
                            </div>

                            <!-- header-left end -->
                        </div>
                        <div class="col-md-10" >

                            <!-- header-right start -->
                            <!-- ================ -->
                            <div class="header-right clearfix">

                                <!-- main-navigation start -->
                                <!-- ================ -->
                                <div class="main-navigation animated">

                                    <!-- navbar start -->
                                    <!-- ================ -->
                                    <?php include 'lfsaif/views/frontend/include/menu.php'; ?>
                                    <!-- navbar end -->

                                </div>
                                <!-- main-navigation end -->

                            </div>
                            <!-- header-right end -->

                        </div>
                    </div>
                </div>
            </header>
            <!-- header end -->

            <!-- banner start -->
            <!-- ================ -->

            <!-- banner end -->

            <!-- page-top start-->
            <!-- ================ -->

            <!-- page-top end -->

            <!-- main-container start -->
            <!-- ================ -->

            <!-- main-container end -->

            <!-- section start -->
            <!-- ================ -->
            <?php
            if (!empty($mainContent)) {
                echo $mainContent;
            }
            ?>
            <!-- section end -->


            <!-- footer start (Add "light" class to #footer in order to enable light footer) -->
            <!-- ================ -->
            <?php include 'lfsaif/views/frontend/include/footer.php'; ?>
            <!-- footer end -->

        </div>
        <!-- page-wrapper end -->

        <!-- JavaScript files placed at the end of the document so the pages load faster
        ================================================== -->
        <!-- Jquery and Bootstap core js files -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/bootstrap/js/bootstrap.min.js"></script>

        <!-- Modernizr javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/modernizr.js"></script>

        <!-- jQuery REVOLUTION Slider  -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

        <!-- Isotope javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/isotope/isotope.pkgd.min.js"></script>

        <!-- Owl carousel javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/owl-carousel/owl.carousel.js"></script>

        <!-- Magnific Popup javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Appear javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/jquery.appear.js"></script>

        <!-- Count To javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/jquery.countTo.js"></script>

        <!-- Parallax javascript -->
        <script src="<?php echo base_url() ?>assets/frontend/plugins/jquery.parallax-1.1.3.js"></script>

        <!-- Contact form -->
        <script src="<?php echo base_url() ?>assets/frontend/plugins/jquery.validate.js"></script>

        <!-- SmoothScroll javascript -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/jquery.browser.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/plugins/SmoothScroll.js"></script>

        <!-- Initialization of Plugins -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/template.js"></script>

        <!-- Custom Scripts -->
        <script type="text/javascript" src="<?php echo base_url() ?>assets/frontend/js/custom.js"></script>
        <!-- Color Switcher (Remove these lines) -->

        <!-- GetButton.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    facebook: "114077237059224", // Facebook page ID
                    whatsapp: "01313951100", // WhatsApp number
                    call_to_action: "Message us", // Call to action
                    button_color: "#FF6550", // Color of button
                    position: "left", // Position may be 'right' or 'left'
                    order: "facebook,whatsapp", // Order of buttons
                };
                var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () {
                    WhWidgetSendButton.init(host, proto, options);
                };
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /GetButton.io widget -->
        <!-- Color Switcher End -->

    </body>
</html>
