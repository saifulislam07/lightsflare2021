<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/4.5.2/minty/bootstrap.min.css" />-->
<style>
    .countdown.show .running {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-flow: wrap;
        flex-flow: wrap;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .countdown.show .running timer {
        font-size: 55px;
        font-weight: 600;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        line-height: 1;
        color: #8c0734;
    }

    .countdown.show .running timer .days,
    .countdown.show .running timer .hours,
    .countdown.show .running timer .minutes,
    .countdown.show .running timer .seconds{
        width: 70px;
        text-align: left;
        margin: 0 7px;
    }

    @media (max-width: 480px) {
        .countdown.show .running timer  {
            font-size: 40px;
        }
        .countdown.show .running timer .days,
        .countdown.show .running timer .hours,
        .countdown.show .running timer .minutes,
        .countdown.show .running timer .seconds {
            width: 49px;
        }
    }

    .countdown.show .running .labels{
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        font-size: 14px;
    }

    .countdown.show .running .labels span{
        width: 97px;
        text-align: center;
        margin: 0px 2px;
    }

    @media (max-width: 480px) {
        .countdown.show .running .labels span{
            width: 69px;
        }
    }

    .countdown.show .running .text{
        font-size: 20px;
        margin-top: 12px;
        font-weight: 600;
    }

    .countdown.show .running button{
        border: none;
        background-color: black;
        color: white;
        border-radius: 25px;
        padding: 10px 20px;
        margin: 10px;
    }

    .countdown.show .running .break{
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        height: 0;
    }

    .countdown.show .ended{
        display: none;
        -ms-flex-flow: wrap;
        flex-flow: wrap;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }

    .countdown.show .ended .text{
        font-size: 20px;
    }

    .countdown.show .ended button {
        border: none;
        background-color: blue;
        color: white;
        border-radius: 25px;
        padding: 10px 20px;
        margin: 10px;
    }

    .countdown.show .ended .break{
        -ms-flex-preferred-size: 100%;
        flex-basis: 100%;
        height: 0;
    }

</style>
<br>
<div class="container">

    <div class="jumbotron countdown show" data-Date='2020/11/20 23:59:59'>
        <!--<h3 class="text-center" style="color: red;">Submission close</h3>-->
        <h1 class="text-center" style="color: orange;">THANKYOU</h1>
        <h2 class="text-center">You are invited for next season</h2>
        <div class="running">
            <timer>
                <span class="days"></span>:<span class="hours"></span>:<span class="minutes"></span>:<span class="seconds"></span>
            </timer>
            <div class="break"></div>
            <div class="labels"><span>Days</span><span>Hours</span><span>Minutes</span><span>Seconds</span>
            </div>
            <div class="break"></div>
          
            <div class="text">
                <a class="btn btn-success btn-sm" href="<?php echo site_url('user-signup') ?>">SUBMIT PHOTOS</a>
            </div>

        </div>

    </div>

</div>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/countdown/multi-countdown.js"></script>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

</script>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {method: 'HEAD', mode: 'no-cors'})).then(function (response) {
            return true;
        }).catch(function (e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }
</script>
