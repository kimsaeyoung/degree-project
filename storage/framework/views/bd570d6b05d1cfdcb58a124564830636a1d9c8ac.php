<?php
$app = $app_count[0]->count;
$web = $web_count[0]->count;
$total = $app+$web;
?>
<script>
    $(document).ready(function() {
        $("#testbanner").scrollFollow({
            speed: 500, // 꿈지럭 거리는 속도
            offset: 330 // 웹페이지 상단에서 부터의 거리(바꿔보면 뭔지 안다)
        });
    });
</script>
<style>
    @media  screen and (max-width: 500px) {
        .cont_login {
            display: none;
        }
        .container2 br {
            display: none;
        }
        .container2 {
            margin-top: -40px;
            padding-top: 40px;
            height: 100% !important;
        }
        .container2 section label:nth-child(even) {
            left: 20px !important;
            top: 50% !important;
            opacity: 0.5;
        }
        .container2 section label:nth-child(odd) {
            right: 20px !important;
            top: 50% !important;
            opacity: 0.5;
        }
        #rad2_h1 {
            display: none;
        }
        div.chart_content {
            display: none;
        }
        #rad3_h1 {
            font-size: 20px !important;
            padding-bottom: 20px !important;
        }
        #rad3_h4 {
            margin: auto;
            width: 190px !important;
            font-size: 15px !important;
            font-weight: 100 !important;
        }
        .slider {
            position: relative !important;
            margin: 0 auto !important;
            width: 100% !important;
        }
        .slider .slide {
            position: absolute !important;
            margin: auto !important;
            top: 0 !important;
            bottom: 0 !important;
            left: 0 !important;
            right: 0 !important;
            width: 150px !important;
            height: 150px !important;
        }
        #rad3_h3 {
            width: 100% !important;
            top: 50% !important;
            bottom: 50% !important;
            left: 0 !important;
            right: 0 !important;
            margin: auto !important;
            font-size: 20px !important;
            display: none;
        }
    }
    
    @media  screen and (min-width: 501px) {
        .calorie-counter {
            display: none;
        }
    }
    
    @import  url(http://weloveiconfonts.com/api/?family=entypo);
    #testbanner {
        position: absolute;
        left: 80%;
        top: 330px;
        width: 350px;
        height: 300px;
    }
    input[type="radio"] {
        display: none;
    }
    input[type="radio"]:checked + section {
        display: block;
    }
    body {
        font-family: 'Open Sans', sans-serif;
        font-weight: lighter;
        margin: 0;
    }
    
    .container2 {
        /*position: absolute;*/
        width: 100%;
        margin-top: -80px;
        padding-top: 80px;
        height: 100%;
    }
    
    .container2 section {
        display: none;
        height: 100%;
        padding: 15px;
        background: #449df5;
        color: #fff;
        text-align: center;
    }
    
    .container2 section h1 {
        margin-bottom: 0;
        font-family: 'Nunito', sans-serif;
        font-weight: lighter;
        font-size: 2em;
    }
    
    .container2 section p {
        width: 75%;
        margin: 0 auto;
        padding: 10px;
    }
    
    .container2 section label {
        position: absolute;
        display: inline-block;
        cursor: pointer;
        font-size: 1.5em;
        top: 50%;
    }
    
    .container2 section label:nth-child(odd) {
        /*화살표*/
        top: 68%;
        right: 120px;
    }
    
    .container2 section label:nth-child(even) {
        top: 68%;
        left: 120px;
    }
    
    .container2 section > i {
        font-size: 6em !important;
        margin-top: 50px;
        margin-bottom: 25px;
    }
    /* entypo */
    
    [class*="entypo-"]:before {
        font-family: 'entypo', sans-serif;
    }
    
    * {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        box-sizing: border-box;
    }
    
    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 50px;
        height: 100%;
        background-color: #222;
        color: #fff;
        overflow: hidden;
        transition: width .3s ease-in-out;
        box-shadow: 0 0 10px #000;
        z-index: 100;
    }
    
    .sidebar:hover {
        width: 200px;
    }
    
    .sidebar:hover .main-nav ul li a {
        opacity: 1;
        left: 0;
        transition-delay: .2s;
    }
    
    .sidebar .main-nav ul li {
        min-height: 50px;
        line-height: 50px;
        position: relative;
        border-bottom: 1px solid #333;
        transition: all .3s ease-in-out;
    }
    
    .sidebar .main-nav ul li.logo {
        margin-bottom: 50px;
    }
    
    .sidebar .main-nav ul li.logo a {
        text-transform: uppercase;
        font-weight: 800;
    }
    
    .sidebar .main-nav ul li.logo span:before {
        color: #ea4c89;
        font-size: 1.5em;
    }
    
    .sidebar .main-nav ul li.logo + li {
        border-top: 1px solid #333;
    }
    
    .sidebar .main-nav ul li a {
        display: block;
        padding-left: 50px;
        position: relative;
        left: 15px;
        opacity: 0;
        transition: all .3s ease-in-out;
        transition-delay: 0s;
        cursor: pointer;
        font-weight: 300;
    }
    
    .sidebar .main-nav ul li span {
        position: absolute;
        width: 50px;
        height: 50px;
        top: 0;
        left: 0;
        text-align: center;
    }
    
    .sidebar .main-nav ul li span:before {
        font-size: 1.25em;
        transition: all .3s ease-in-out;
    }
    
    .sidebar .main-nav ul li:hover {
        background-color: #111;
    }
    
    .sidebar .main-nav ul li:hover span:before {
        color: #ea4c89;
    }
    
    .sidebar a {
        color: #ffffff;
    }
    
    .sidebar a:hover {
        color: #ff9900;
    }
    
    .chart {
        min-height: 400px;
        border-bottom: 1px solid #eee;
        padding: 1em;
        /*background: #449DF5;*/
    }
    
    .chart--headline,
    .chart--subHeadline {
        text-align: center;
    }
    
    .chart--headline {
        position: relative;
        font-weight: 200;
        font-size: 28px;
    }
    
    .chart--headline:before {
        position: absolute;
        content: '';
        bottom: 133%;
        left: 50%;
        width: 25%;
        margin: 0 0 0 -12.5%;
        border-top: 1px dashed #999999;
    }
    
    .chart--subHeadline {
        font-weight: 400;
        font-size: 14px;
        letter-spacing: 1px;
    }
    
    .charts--container {
        background-color: #fff;
        width: 100%;
        border-radius: 12px;
    }
    
    @media  screen and (min-width: 800px) {
        .charts--container {
            max-width: 800px;
            left: 50%;
            top: 10%;
            margin: 5em auto;
            /*box-shadow: 0 1em 1em #333;*/
        }
    }
    
    .charts--headline {
        text-align: center;
        color: #444;
        background-color: #fff;
        padding: 1em;
    }
    
    .lineChart--area {
        fill: url(#lineChart--gradientBackgroundArea);
    }
    
    .lineChart--areaLine {
        fill: none;
        stroke: #6bb7c7;
        stroke-width: 3;
    }
    
    .lineChart--bubble--label {
        fill: none;
        stroke: #6bb7c7;
        font-size: 12.6px;
        font-style: italic;
        font-weight: 100;
    }
    
    .lineChart--bubble--value {
        fill: #fff;
        stroke: #fff;
        font-size: 21px;
        font-weight: 100;
    }
    
    .lineChart--circle {
        fill: #6bb7c7;
        stroke: #fff;
        stroke-width: 3;
    }
    
    .lineChart--circle__highlighted {
        fill: #fff;
        stroke: #3f95a7;
    }
    
    .lineChart--gradientBackgroundArea--top {
        stop-color: #6bb7c7;
        stop-opacity: 0.1;
    }
    
    .lineChart--gradientBackgroundArea--bottom {
        stop-color: #6bb7c7;
        stop-opacity: 0.6;
    }
    
    .lineChart--svg {
        border: 1px solid #eee;
    }
    
    .lineChart--xAxisTicks .domain,
    .lineChart--xAxis .domain,
    .lineChart--yAxisTicks .domain {
        display: none;
    }
    
    .lineChart--xAxis .tick line {
        display: none;
    }
    
    .lineChart--xAxisTicks .tick line,
    .lineChart--yAxisTicks .tick line {
        fill: none;
        stroke: #b3b3b3;
        stroke-width: 1;
        stroke-dasharray: 2, 2;
    }
    
    .pieChart--center--innerCircle {
        fill: #fff;
    }
    
    .pieChart--center--text {
        font-size: 28px;
    }
    
    .pieChart--center--outerCircle {
        fill: rgba(255, 255, 255, 0.75);
    }
    
    .pieChart--detail--divider {
        stroke: gray;
        stroke-width: 1;
    }
    
    .pieChart--detail--percentage {
        font-size: 62px;
        font-weight: 100;
        fill: #333;
        stroke-width: 1px;
    }
    
    .pieChart--detail--textContainer {
        background-color: transparent;
        padding: 40px;
        margin: 0;
        color: #666;
        font-style: italic;
    }
    
    .pieChart--detail__left {
        text-align: left;
    }
    
    .pieChart--detail__right {
        text-align: left;
    }
    
    .pieChart__blue {
        fill: #6bb7c7;
    }
    
    .pieChart__red {
        fill: #d79d91;
    }
    /**
         * Helper classes
         */
    
    .hidden {
        display: none;
    }
</style>

<body>
    <?php /*프로젝트목록 css*/ ?>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <script src="js/snap.svg-min.js"></script>
    <script type="text/javascript" src="js/jssor.slider.min.js"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>

    <script type="text/javascript" src="js/jquery.scrollfollow.js"></script> <?php /*리모콘*/ ?>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"> <?php /*프로젝트롤업??*/ ?> <?php /*

    <div id="testbanner">
        <center>
            <h1>최근 모집중 프로젝트</h1>
            <div id="box">
                <div id="box1">
                    <div class="content toLeft"><i class="fa fa-hashtag"></i> <a href="/">웹 모바일 디자인 리뉴얼</a></div>
                    <div class="content toLeft"><i class="fa fa-hashtag"></i> <a href="/">앱디자인</a></div>
                    <div class="content toLeft"><i class="fa fa-hashtag"></i> <a href="/">TEST</a></div>
                </div>
            </div>
            <br> */ ?><?php /*
            <button type="button" class="btn btn-info" onclick="location.href='/projectwrite'">프로젝트등록하기</button>*/ ?><?php /*
        </center>
    </div>*/ ?>

    <div class="container2"> <?php /*메인스크롤페이지*/ ?>
        <input id="rad1" type="radio" name="rad" checked>
        <section style="background-image: linear-gradient(to bottom right, #002f4b, #dc4225); opacity: .6;">
            <br>
            <br>

            <script>
                jssor_html5_AdWords_slider_init = function() {

                    var jssor_html5_AdWords_SlideoTransitions = [
                        [{
                            b: -1,
                            d: 1,
                            o: -1,
                            rY: -120
                        }, {
                            b: 2600,
                            d: 500,
                            o: 1,
                            rY: 120,
                            e: {
                                rY: 17
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 1480,
                            d: 20,
                            o: 1
                        }, {
                            b: 1500,
                            d: 500,
                            y: -20,
                            e: {
                                y: 19
                            }
                        }, {
                            b: 2300,
                            d: 300,
                            x: -20,
                            e: {
                                x: 19
                            }
                        }, {
                            b: 3100,
                            d: 300,
                            o: -1,
                            sY: 9
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 2300,
                            d: 300,
                            x: 20,
                            o: 1,
                            e: {
                                x: 19
                            }
                        }, {
                            b: 3100,
                            d: 300,
                            o: -1,
                            sY: 9
                        }],
                        [{
                            b: -1,
                            d: 1,
                            sX: -1,
                            sY: -1
                        }, {
                            b: 0,
                            d: 1000,
                            sX: 2,
                            sY: 2,
                            e: {
                                sX: 7,
                                sY: 7
                            }
                        }, {
                            b: 1000,
                            d: 500,
                            sX: -1,
                            sY: -1,
                            e: {
                                sX: 16,
                                sY: 16
                            }
                        }, {
                            b: 1500,
                            d: 500,
                            y: 20,
                            e: {
                                y: 19
                            }
                        }],
                        [{
                            b: 1000,
                            d: 1000,
                            r: -30
                        }, {
                            b: 2000,
                            d: 500,
                            r: 30,
                            e: {
                                r: 2
                            }
                        }, {
                            b: 2500,
                            d: 500,
                            r: -30,
                            e: {
                                r: 3
                            }
                        }, {
                            b: 3000,
                            d: 3000,
                            x: 70,
                            y: 40,
                            rY: -20,
                            tZ: -20
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 0,
                            d: 1000,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1,
                            r: 30
                        }, {
                            b: 1000,
                            d: 1000,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 2780,
                            d: 20,
                            o: 1
                        }, {
                            b: 2800,
                            d: 500,
                            y: -70,
                            e: {
                                y: 3
                            }
                        }, {
                            b: 3300,
                            d: 1000,
                            y: 180
                        }, {
                            b: 4300,
                            d: 500,
                            y: -40,
                            e: {
                                y: 3
                            }
                        }, {
                            b: 5300,
                            d: 500,
                            y: -40,
                            e: {
                                y: 3
                            }
                        }, {
                            b: 6300,
                            d: 500,
                            y: -40,
                            e: {
                                y: 3
                            }
                        }, {
                            b: 7300,
                            d: 500,
                            y: -40,
                            e: {
                                y: 3
                            }
                        }, {
                            b: 8300,
                            d: 400,
                            y: -30
                        }],
                        [{
                            b: -1,
                            d: 1,
                            c: {
                                y: 200
                            }
                        }, {
                            b: 4300,
                            d: 4400,
                            c: {
                                y: -200
                            },
                            e: {
                                c: {
                                    y: 1
                                }
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 4300,
                            d: 20,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 5300,
                            d: 20,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 6300,
                            d: 20,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 7300,
                            d: 20,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 8300,
                            d: 20,
                            o: 1
                        }],
                        [{
                            b: 2000,
                            d: 1000,
                            o: -0.5,
                            r: 180,
                            sX: 4,
                            sY: 4,
                            e: {
                                r: 5,
                                sX: 5,
                                sY: 5
                            }
                        }, {
                            b: 3000,
                            d: 1000,
                            o: -0.5,
                            r: 180,
                            sX: -4,
                            sY: -4,
                            e: {
                                r: 6,
                                sX: 6,
                                sY: 6
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1,
                            c: {
                                m: -35.0
                            }
                        }, {
                            b: 0,
                            d: 1500,
                            x: 150,
                            o: 1,
                            e: {
                                x: 6
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1,
                            c: {
                                y: 35.0
                            }
                        }, {
                            b: 0,
                            d: 1500,
                            x: -150,
                            o: 1,
                            e: {
                                x: 6
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 6500,
                            d: 2000,
                            o: 1
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 2000,
                            d: 1000,
                            o: 0.5,
                            r: 180,
                            sX: 4,
                            sY: 4,
                            e: {
                                r: 5,
                                sX: 5,
                                sY: 5
                            }
                        }, {
                            b: 3000,
                            d: 1000,
                            o: 0.5,
                            r: 180,
                            sX: -4,
                            sY: -4,
                            e: {
                                r: 6,
                                sX: 6,
                                sY: 6
                            }
                        }, {
                            b: 4500,
                            d: 1500,
                            x: -45,
                            y: 60,
                            e: {
                                x: 12,
                                y: 3
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 4500,
                            d: 1500,
                            o: 1,
                            e: {
                                o: 5
                            }
                        }, {
                            b: 6500,
                            d: 2000,
                            o: -1,
                            r: 10,
                            rX: 30,
                            rY: 20,
                            e: {
                                rY: 6
                            }
                        }],
                        [{
                            b: -1,
                            d: 1,
                            o: -1
                        }, {
                            b: 2000,
                            d: 1000,
                            o: 0.5,
                            r: 180,
                            sX: 4,
                            sY: 4,
                            e: {
                                r: 5,
                                sX: 5,
                                sY: 5
                            }
                        }, {
                            b: 3000,
                            d: 1000,
                            o: 0.5,
                            r: 180,
                            sX: -4,
                            sY: -4,
                            e: {
                                r: 6,
                                sX: 6,
                                sY: 6
                            }
                        }],
                    ];

                    var jssor_html5_AdWords_options = {
                        $AutoPlay: true,
                        $Idle: 1600,
                        $SlideDuration: 300,
                        $SlideEasing: $Jease$.$InOutSine,
                        $CaptionSliderOptions: {
                            $Class: $JssorCaptionSlideo$,
                            $Transitions: jssor_html5_AdWords_SlideoTransitions
                        },
                        $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$,
                            $ChanceToShow: 1
                        },
                        $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$,
                            $ActionMode: 2
                        }
                    };

                    var jssor_html5_AdWords_slider = new $JssorSlider$("jssor_html5_AdWords", jssor_html5_AdWords_options);
                };
            </script>




            <div id="jssor_html5_AdWords" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 300px; height: 250px; overflow: hidden; visibility: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 300px; height: 250px; overflow: hidden;">
                    <div data-p="68.75" style="display: none;">
                        <?php /*<img data-u="image" src="#" /> 배경이미지*/ ?>
                        <div data-u="caption" data-t="0" data-3d="1" data-to="100% 50%" style="position: absolute; top: 85px; left: 90px; width: 120px; height: 40px; font-size: 26px; line-height: 40px; text-align: center;">Developer</div>
                        <div data-u="caption" data-t="1" style="position: absolute; top: 105px; left: 130px; width: 40px; height: 40px; font-size: 26px; line-height: 40px; text-align: center;">Designer</div>
                        <div data-u="caption" data-t="2" style="position: absolute; top: 160px; left: 130px; width: 40px; height: 40px; font-size: 26px; line-height: 40px; text-align: center;">And</div>
                        <div data-u="caption" data-t="3" style="position: absolute; top: 105px; left: 90px; width: 120px; height: 40px; background-color: #f65256; font-size: 26px; color: #ffffff; line-height: 40px; text-align: center;">D & D</div>
                    </div>
                    <div data-p="68.75" style="display: none;">
                        <?php /*<img data-u="image" src="" /> 배경이미지*/ ?>
                        <div data-u="caption" data-t="14" style="position: absolute; top: 90px; left: 75px; width: 150px; height: 70px;">
                            <div data-u="caption" data-t="15" style="position: absolute; top: 0px; left: -150px; width: 150px; height: 70px; background-color: rgba(244,189,20,0.35); font-size: 30px; line-height: 70px; text-align: center;">D&D에서</div>
                            <div data-u="caption" data-t="16" style="position: absolute; top: 0px; left: 150px; width: 150px; height: 70px; background-color: rgba(244,189,20,0.35); font-size: 30px; line-height: 70px; text-align: center;">D&D에서</div>
                        </div>
                        <div data-u="caption" data-t="17" style="position: absolute; top: 70px; left: 85px; width: 150px; height: 70px; font-size: 50px; color: #000000; line-height: 70px; text-align: center;">D&DTool</div>
                        <div data-u="caption" data-t="18" style="position: absolute; top: 90px; left: 75px; width: 160px; height: 70px; background-color: rgba(244,189,20,0.35); font-size: 30px; line-height: 70px; text-align: center;">파트너와</div>
                        <div data-u="caption" data-t="19" data-3d="1" data-to="100% 50%" style="position: absolute; top: 70px; left: 85px; width: 150px; height: 70px; background-color: rgba(244,189,20,0.35); font-size: 30px; line-height: 70px; text-align: center;">함께하는</div>
                    </div>
                    <div data-p="68.75" data-po="70% 50%" style="display: none;">
                        <?php /*<img data-u="image" src="" /> 배경이미지*/ ?>
                        <div data-u="caption" data-t="4" data-3d="1" data-to="0% 30%" style="position: absolute; top: 100px; left: 60px; width: 180px; height: 130px;">
                            <div data-u="caption" data-t="5" data-to="0% 100%" style="position: absolute; top: 0px; left: 10px; width: 180px; height: 40px; font-size: 24px; line-height: 40px; text-align: center;">D&D Tool</div>
                            <div data-u="caption" data-t="6" data-to="0% 0%" style="position: absolute; top: 50px; left: -10px; width: 180px; height: 40px; font-size: 24px; line-height: 40px; text-align: center;">스마트매칭</div>
                        </div>
                        <div data-u="caption" data-t="7" data-to="0% 0%" style="position: absolute; top: 80px; left: 70px; width: 80px; height: 40px; font-size: 22px; line-height: 40px; text-align: center;">만족도</div>
                        <div data-u="caption" data-t="8" style="position: absolute; top: 25px; left: 30px; width: 40px; height: 200px; background-color: #ff6666; font-size: 20px;"></div>
                        <div data-u="caption" data-t="9" style="position: absolute; top: 190px; left: 70px; width: 80px; height: 40px; font-size: 20px; line-height: 40px; text-align: center;">20%↑</div>
                        <div data-u="caption" data-t="10" style="position: absolute; top: 150px; left: 70px; width: 80px; height: 40px; font-size: 20px; line-height: 40px; text-align: center;">40%↑</div>
                        <div data-u="caption" data-t="11" style="position: absolute; top: 110px; left: 70px; width: 80px; height: 40px; font-size: 20px; line-height: 40px; text-align: center;">60%↑</div>
                        <div data-u="caption" data-t="12" style="position: absolute; top: 70px; left: 70px; width: 80px; height: 40px; font-size: 20px; line-height: 40px; text-align: center;">80%↑</div>
                        <div data-u="caption" data-t="13" style="position: absolute; top: 30px; left: 70px; width: 80px; height: 40px; font-size: 20px; line-height: 40px; text-align: center;">100%↑</div>
                    </div>
                    <div data-p="68.75" style="display: none;">
                        <?php /*<img data-u="image" src="" /> 배경이미지*/ ?>
                        <div data-u="caption" data-t="14" style="position: absolute; top: 90px; left: 75px; width: 150px; height: 70px;">
                            <div data-u="caption" data-t="15" style="position: absolute; top: 0px; left: -150px; width: 150px; height: 70px; background-color: rgba(0,0,153,100); font-size: 30px; color: #ffffff;  line-height: 70px; text-align: center;">D&D에서</div>
                            <div data-u="caption" data-t="16" style="position: absolute; top: 0px; left: 150px; width: 150px; height: 70px; background-color: rgba(0,0,153,100); font-size: 30px; color: #ffffff;  line-height: 70px; text-align: center;">D&D에서</div>
                        </div>

                        <div data-u="caption" data-t="20" style="position: absolute; top: 90px; left: 75px; width: 160px; height: 70px; background-color: rgba(255,102,0,100); font-size: 30px; color: #ffffff;  line-height: 70px; text-align: center;">함께하세요</dv>

                        </div>


                    </div>
                    <!-- Bullet Navigator -->
                    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
                        <!-- bullet navigator item prototype -->
                        <div data-u="prototype" style="width:16px;height:16px;"></div>
                    </div>
                    <!-- Arrow Navigator -->
                    <span data-u="arrowleft" class="jssora12l" style="top:0px;left:0px;width:30px;height:46px;" data-autocenter="2"></span>
                    <span data-u="arrowright" class="jssora12r" style="top:0px;right:0px;width:30px;height:46px;" data-autocenter="2"></span>
                </div>
                <script>
                    jssor_html5_AdWords_slider_init();
                </script>
            </div>

            <style>
                .login_sing * {
                    margin: 0px auto;
                    padding: 0px;
                    text-align: center;
                    font-family: 'Open Sans', sans-serif;
                }
                
                .cont_centrar {
                    position: relative;
                    float: left;
                    width: 100%;
                }
                
                .cont_login {
                    position: relative;
                    width: 640px;
                    left: 50%;
                    margin-left: -320px;
                }
                
                .cont_back_info {
                    position: relative;
                    float: left;
                    width: 640px;
                    height: 280px;
                    overflow: hidden;
                    background-color: #fff;
                    margin-top: 100px;
                    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
                }
                
                .cont_forms {
                    position: absolute;
                    overflow: hidden;
                    top: 100px;
                    left: 0px;
                    width: 320px;
                    height: 280px;
                    background-color: #eee;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_forms_active_login {
                    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
                    height: 420px;
                    top: 20px;
                    left: 0px;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_forms_active_sign_up {
                    box-shadow: 1px 10px 30px -10px rgba(0, 0, 0, 0.5);
                    height: 420px;
                    top: 20px;
                    left: 320px;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_img_back_grey {
                    position: absolute;
                    width: 950px;
                    top: -80px;
                    left: -116px;
                }
                
                .cont_img_back_grey > img {
                    width: 100%;
                    -webkit-filter: grayscale(100%);
                    filter: grayscale(100%);
                    opacity: 0.2;
                    animation-name: animar_fondo;
                    animation-duration: 20s;
                    animation-timing-function: linear;
                    animation-iteration-count: infinite;
                    animation-direction: alternate;
                }
                
                .cont_img_back_ {
                    position: absolute;
                    width: 950px;
                    top: -80px;
                    left: -116px;
                }
                
                .cont_img_back_ > img {
                    width: 100%;
                    opacity: 0.3;
                    animation-name: animar_fondo;
                    animation-duration: 20s;
                    animation-timing-function: linear;
                    animation-iteration-count: infinite;
                    animation-direction: alternate;
                }
                
                .cont_forms_active_login > .cont_img_back_ {
                    top: 0px;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_forms_active_sign_up > .cont_img_back_ {
                    top: 0px;
                    left: -435px;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_info_log_sign_up {
                    position: absolute;
                    width: 640px;
                    height: 280px;
                    top: 100px;
                    z-index: 1;
                }
                
                .col_md_login {
                    position: relative;
                    float: left;
                    width: 50%;
                }
                
                .col_md_login > h2 {
                    font-weight: 400;
                    margin-top: 70px;
                    color: #757575;
                }
                
                .col_md_login > p {
                    font-weight: 400;
                    margin-top: 15px;
                    width: 80%;
                    color: #37474F;
                }
                
                .btn_login {
                    background-color: #26C6DA;
                    border: none;
                    padding: 10px;
                    width: 200px;
                    border-radius: 3px;
                    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
                    color: #fff;
                    margin-top: 10px;
                    cursor: pointer;
                }
                
                .col_md_sign_up {
                    position: relative;
                    float: left;
                    width: 50%;
                }
                
                .cont_ba_opcitiy > h2 {
                    font-weight: 400;
                    color: #fff;
                }
                
                .cont_ba_opcitiy > p {
                    font-weight: 400;
                    margin-top: 15px;
                    color: #fff;
                }
                /* ----------------------------------
                background text
                ------------------------------------
                 */
                
                .cont_ba_opcitiy {
                    position: relative;
                    background-color: rgba(120, 144, 156, 0.55);
                    width: 80%;
                    border-radius: 3px;
                    margin-top: 60px;
                    padding: 15px 0px;
                }
                
                .btn_sign_up {
                    background-color: #ef5350;
                    border: none;
                    padding: 10px;
                    width: 200px;
                    border-radius: 3px;
                    box-shadow: 1px 5px 20px -5px rgba(0, 0, 0, 0.4);
                    color: #fff;
                    margin-top: 10px;
                    cursor: pointer;
                }
                
                .cont_forms_active_sign_up {
                    z-index: 2;
                }
                
                @-webkit-keyframes animar_fondo {
                    from {
                        -webkit-transform: scale(1) translate(0px);
                        -moz-transform: scale(1) translate(0px);
                        -ms-transform: scale(1) translate(0px);
                        -o-transform: scale(1) translate(0px);
                        transform: scale(1) translate(0px);
                    }
                    to {
                        -webkit-transform: scale(1.5) translate(50px);
                        -moz-transform: scale(1.5) translate(50px);
                        -ms-transform: scale(1.5) translate(50px);
                        -o-transform: scale(1.5) translate(50px);
                        transform: scale(1.5) translate(50px);
                    }
                }
                
                @-o-keyframes identifier {
                    from {
                        -webkit-transform: scale(1);
                        -moz-transform: scale(1);
                        -ms-transform: scale(1);
                        -o-transform: scale(1);
                        transform: scale(1);
                    }
                    to {
                        -webkit-transform: scale(1.5);
                        -moz-transform: scale(1.5);
                        -ms-transform: scale(1.5);
                        -o-transform: scale(1.5);
                        transform: scale(1.5);
                    }
                }
                
                @-moz-keyframes identifier {
                    from {
                        -webkit-transform: scale(1);
                        -moz-transform: scale(1);
                        -ms-transform: scale(1);
                        -o-transform: scale(1);
                        transform: scale(1);
                    }
                    to {
                        -webkit-transform: scale(1.5);
                        -moz-transform: scale(1.5);
                        -ms-transform: scale(1.5);
                        -o-transform: scale(1.5);
                        transform: scale(1.5);
                    }
                }
                
                @keyframes  identifier {
                    from {
                        -webkit-transform: scale(1);
                        -moz-transform: scale(1);
                        -ms-transform: scale(1);
                        -o-transform: scale(1);
                        transform: scale(1);
                    }
                    to {
                        -webkit-transform: scale(1.5);
                        -moz-transform: scale(1.5);
                        -ms-transform: scale(1.5);
                        -o-transform: scale(1.5);
                        transform: scale(1.5);
                    }
                }
                
                .cont_form_login {
                    position: absolute;
                    opacity: 0;
                    display: none;
                    width: 320px;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_forms_active_login {
                    z-index: 2;
                }
                
                .cont_forms_active_login >.cont_form_login {}
                
                .cont_form_sign_up {
                    position: absolute;
                    width: 320px;
                    float: left;
                    opacity: 0;
                    display: none;
                    -webkit-transition: all 0.5s;
                    -moz-transition: all 0.5s;
                    -ms-transition: all 0.5s;
                    -o-transition: all 0.5s;
                    transition: all 0.5s;
                }
                
                .cont_form_sign_up > input {
                    text-align: left;
                    padding: 15px 5px;
                    margin-left: 10px;
                    margin-top: 20px;
                    width: 260px;
                    border: none;
                    color: #757575;
                }
                
                .cont_form_sign_up > h2 {
                    margin-top: 50px;
                    font-weight: 400;
                    color: #757575;
                }
                
                .cont_form_login > input {
                    padding: 15px 5px;
                    margin-left: 10px;
                    margin-top: 20px;
                    width: 260px;
                    border: none;
                    text-align: left;
                    color: #757575;
                }
                
                .cont_form_login > h2 {
                    margin-top: 110px;
                    font-weight: 400;
                    color: #757575;
                }
                
                .cont_form_login > a,
                .cont_form_sign_up > a {
                    color: #757575;
                    position: relative;
                    float: left;
                    margin: 10px;
                    margin-left: 30px;
                }
            </style>


            <div class="login_sing">
                <div class="cont_centrar">

                    <div class="cont_login">
                        <div class="cont_info_log_sign_up">
                            <div class="col_md_login">
                                <div class="cont_ba_opcitiy">

                                    <h2>LOGIN</h2>
                                    <p></p>
                                    <button class="btn_login" data-toggle="modal" data-target="#loginModal">LOGIN</button>
                                </div>
                            </div>
                            <div class="col_md_sign_up">
                                <div class="cont_ba_opcitiy">
                                    <h2>SIGN UP</h2>


                                    <p></p>

                                    <button class="btn_sign_up" data-toggle="modal" data-target="#joinModal">SIGN UP</button>
                                </div>
                            </div>
                        </div>


                        <div class="cont_back_info">
                            <div class="cont_img_back_grey">
                                <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
                            </div>

                        </div>
                        <div class="cont_forms">
                            <div class="cont_img_back_">
                                <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
                            </div>
                            <div class="cont_form_login">
                                <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                                <h2>LOGIN</h2>
                                <input type="text" placeholder="Email" />
                                <input type="password" placeholder="Password" />
                                <button class="btn_login">LOGIN</button>
                            </div>

                            <div class="cont_form_sign_up">
                                <a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
                                <h2>SIGN UP</h2>
                                <input type="text" placeholder="Email" />
                                <input type="text" placeholder="User" />
                                <input type="password" placeholder="Password" />
                                <input type="password" placeholder="Confirm Password" />
                                <button class="btn_sign_up">SIGN UP</button>

                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <label for="rad2"><i class="fa fa-chevron-right fa-2x"></i></label>
            <label for="rad3"><i class="fa fa-chevron-left fa-2x"></i></label>
        </section>
        <input id="rad2" type="radio" name="rad">
        <section style="background: #40CCB5">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h1 id="rad2_h1">D&D에 가입된 디자이너 / 개발사</h1>
            <br>
            <br>
            <style>
                /*html {
                    background-image: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiB2aWV3Qm94PSIwIDAgMSAxIiBwcmVzZXJ2ZUFzcGVjdFJhdGlvPSJub25lIj48bGluZWFyR3JhZGllbnQgaWQ9Imxlc3NoYXQtZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIxMDAlIiB5Mj0iMTAwJSI+PHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzRlYmRjMCIgc3RvcC1vcGFjaXR5PSIxIi8+PHN0b3Agb2Zmc2V0PSIxMDAlIiBzdG9wLWNvbG9yPSIjNTNjOWIzIiBzdG9wLW9wYWNpdHk9IjEiLz48L2xpbmVhckdyYWRpZW50PjxyZWN0IHg9IjAiIHk9IjAiIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIGZpbGw9InVybCgjbGVzc2hhdC1nZW5lcmF0ZWQpIiAvPjwvc3ZnPg==);
                    background-image: -webkit-linear-gradient(-45deg, #4ebdc0, #53c9b3);
                    background-image: -moz-linear-gradient(-45deg, #4ebdc0, #53c9b3);
                    background-image: -o-linear-gradient(-45deg, #4ebdc0, #53c9b3);
                    background-image: linear-gradient(135deg, #4ebdc0, #53c9b3);
                    height: 100%;
                }*/
                
                div.chart_content {
                    /*min-height: 100%;*/
                    position: relative;
                    text-align: center;
                    padding-top: 100px;
                    color: #E7F7F5;
                    font-family: 'Helvetica Neue', 'Arial';
                    font-weight: 200;
                    letter-spacing: 1px;
                    line-height: 1;
                    align-content: center;
                }
                
                ul.chart_content {
                    margin-bottom: 4em;
                }
                
                .chart {
                    display: inline-block;
                    width: 195px;
                    height: 195px;
                    margin: 0 10px;
                    vertical-align: top;
                    position: relative;
                    -webkit-box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    box-sizing: border-box;
                    padding-top: 22px;
                    font-size: 17px;
                }
                
                .chart span {
                    display: block;
                    font-size: 2em;
                    font-weight: normal;
                }
                
                .chart canvas {
                    position: absolute;
                    left: 20;
                    top: 0;
                }
                
                .chart li {}
            </style>

            <div class="chart_content">
                <ul class="chart_content">
                    <li class="chart" data-percent="75"><span><?php echo e($count_designer); ?></span>
                        <br>
                        <br>Designer</li>
                    <li class="chart" data-percent="50"><span><?php echo e($count_going_pj[0]->st_num); ?></span>
                        <br>진행중
                        <br>
                        <br>프로젝트</li>
                    <li class="chart" data-percent="83"><span><?php echo e($count_developer); ?></span>
                        <br>
                        <br>Developer</li>
                </ul>
                <?php /*
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#joinModal">회원가입하기</button>*/ ?>


            </div>



            <script>
                ! function() {
                    var a = function(a, b) {
                            var c = document.createElement("canvas");
                            "undefined" != typeof G_vmlCanvasManager && G_vmlCanvasManager.initElement(c);
                            var d = c.getContext("2d");
                            if (c.width = c.height = b.size, a.appendChild(c), window.devicePixelRatio > 1) {
                                var e = window.devicePixelRatio;
                                c.style.width = c.style.height = [b.size, "px"].join(""), c.width = c.height = b.size * e, d.scale(e, e)
                            }
                            d.translate(b.size / 2, b.size / 2), d.rotate((-0.5 + b.rotate / 180) * Math.PI);
                            var f = (b.size - b.lineWidth) / 2;
                            b.scaleColor && b.scaleLength && (f -= b.scaleLength + 2);
                            var g = function(a, b, c) {
                                    c = Math.min(Math.max(0, c || 1), 1), d.beginPath(), d.arc(0, 0, f, 0, 2 * Math.PI * c, !1), d.strokeStyle = a, d.lineWidth = b, d.stroke()
                                },
                                h = function() {
                                    var a, c, e = 24;
                                    d.lineWidth = 1, d.fillStyle = b.scaleColor, d.save();
                                    for (var e = 24; e >= 0; --e) 0 === e % 6 ? (c = b.scaleLength, a = 0) : (c = .6 * b.scaleLength, a = b.scaleLength - c), d.fillRect(-b.size / 2 + a, 0, c, 1), d.rotate(Math.PI / 12);
                                    d.restore()
                                };
                            Date.now = Date.now || function() {
                                return +new Date
                            };
                            var i = function() {
                                return window.requestAnimationFrame || window.webkitRequestAnimationFrame || window.mozRequestAnimationFrame || function(a) {
                                    window.setTimeout(a, 1e3 / 60)
                                }
                            }();
                            this.clear = function() {
                                d.clearRect(b.size / -2, b.size / -2, b.size, b.size)
                            }, this.draw = function(a) {
                                this.clear(), b.scaleColor && h(), b.trackColor && g(b.trackColor, b.lineWidth), d.lineCap = b.lineCap;
                                var c;
                                c = "function" == typeof b.barColor ? b.barColor(a) : b.barColor, a > 0 && g(c, b.lineWidth, a / 100)
                            }.bind(this), this.animate = function(a, c) {
                                var d = Date.now();
                                b.onStart(a, c);
                                var e = function() {
                                    var f = Math.min(Date.now() - d, b.animate),
                                        g = b.easing(this, f, a, c - a, b.animate);
                                    this.draw(g), b.onStep(a, c, g), f >= b.animate ? b.onStop(a, c) : i(e)
                                }.bind(this);
                                i(e)
                            }.bind(this)
                        },
                        b = function(b, c) {
                            var d, e = {
                                    barColor: "#ef1e25",
                                    trackColor: "#f9f9f9",
                                    scaleColor: "#dfe0e0",
                                    scaleLength: 5,
                                    lineCap: "round",
                                    lineWidth: 3,
                                    size: 110,
                                    rotate: 0,
                                    animate: 1e3,
                                    renderer: a,
                                    easing: function(a, b, c, d, e) {
                                        return (b /= e / 2) < 1 ? d / 2 * b * b + c : -d / 2 * (--b * (b - 2) - 1) + c
                                    },
                                    onStart: function() {},
                                    onStep: function() {},
                                    onStop: function() {}
                                },
                                f = {},
                                g = 0,
                                h = function() {
                                    this.el = b, this.options = f;
                                    for (var a in e) e.hasOwnProperty(a) && (f[a] = c && "undefined" != typeof c[a] ? c[a] : e[a], "function" == typeof f[a] && (f[a] = f[a].bind(this)));
                                    f.easing = "string" == typeof f.easing && "undefined" != typeof jQuery && jQuery.isFunction(jQuery.easing[f.easing]) ? jQuery.easing[f.easing] : e.easing, d = new f.renderer(b, f), d.draw(g), b.dataset && b.dataset.percent && this.update(parseInt(b.dataset.percent, 10))
                                }.bind(this);
                            this.update = function(a) {
                                return a = parseInt(a, 10), f.animate ? d.animate(g, a) : d.draw(a), g = a, this
                            }.bind(this), h()
                        };
                    window.EasyPieChart = b
                }();

                var options = {
                    scaleColor: false,
                    trackColor: 'rgba(255,255,255,0.3)',
                    barColor: '#E7F7F5',
                    lineWidth: 6,
                    lineCap: 'butt',
                    size: 155
                };

                window.addEventListener('DOMContentLoaded', function() {
                    var charts = [];
                    [].forEach.call(document.querySelectorAll('.chart'), function(el) {
                        charts.push(new EasyPieChart(el, options));
                    });
                });
            </script>

            <!-- mobile chart -->
            <div class="calorie-counter">
                <div class="calorie-counter__title">D&D 현황</div>
                <!--  /.calorie-counter__title -->

                <div class="mChart chart--calorie js-chart" data-goal="1700" data-count="550">
                    <div class="chart__container">

                        <svg class="chart__background" x="0px" y="0px" height="220px" viewBox="0 0 220 220">
                            <g>
                                <path d="M110,210c-55.1,0-100-44.9-100-100C10,54.9,54.9,10,110,10s100,44.9,100,100C210,165.1,165.1,210,110,210z" />
                            </g>
                        </svg>
                        <!-- /.cchart__background -->

                        <svg class="chart__foreground" x="0px" y="0px" height="220px" viewBox="0 0 220 220">
                            <g>
                                <path d="M110,210c-55.1,0-100-44.9-100-100C10,54.9,54.9,10,110,10s100,44.9,100,100C210,165.1,165.1,210,110,210z" />
                            </g>
                        </svg>
                        <!-- /.chart__foreground -->

                    </div>
                    <!--  /.chart__container -->

                    <div class="chart__count">
                        <div>
                            <span class="js-count" data-count="<?php echo e($count_going_pj[0]->st_num); ?>"><?php echo e($count_going_pj[0]->st_num); ?></span> / <span class="js-count" data-count="<?php echo e($total); ?>"><?php echo e($total); ?></span>
                        </div>
                        진행중 / 총개수
                    </div>
                    <!--  /.chart__count -->

                </div>
                <!-- /.chart .chart--calorie -->

                <div class="mChart chart--protein js-chart" data-goal="<?php echo e($count_designer+$count_developer); ?>" data-count="<?php echo e($count_designer); ?>">
                    <div class="chart__container">

                        <svg class="chart__background" x="0px" y="0px" height="220px" viewBox="0 0 220 220">
                            <g>
                                <path d="M110,210c-55.1,0-100-44.9-100-100C10,54.9,54.9,10,110,10s100,44.9,100,100C210,165.1,165.1,210,110,210z" />
                            </g>
                        </svg>
                        <!-- /.chart__background -->

                        <svg class="chart__foreground" x="0px" y="0px" height="220px" viewBox="0 0 220 220">
                            <g>
                                <path d="M110,210c-55.1,0-100-44.9-100-100C10,54.9,54.9,10,110,10s100,44.9,100,100C210,165.1,165.1,210,110,210z" />
                            </g>
                        </svg>
                        <!-- /.chart__foreground -->

                    </div>
                    <!--  /.chart__container -->

                    <div class="chart__count .chart__count--protein">
                        <div>
                            <span class="js-count" data-count="<?php echo e($count_designer); ?>">0</span>g / <span class="js-count" data-count="<?php echo e($count_designer+$count_developer); ?>">0</span>g
                        </div>
                        Designer
                    </div>
                    <!--  /.chart__count--protein -->

                </div>
                <!--  /.chart  chart--protein -->

                <div class="mChart chart--carbs js-chart" data-goal="<?php echo e($count_designer+$count_developer); ?>" data-count="<?php echo e($count_developer); ?>">
                    <div class="chart__container">

                        <svg class="chart__background" x="0px" y="0px" height="220px" viewBox="0 0 220 220">
                            <g>
                                <path d="M110,210c-55.1,0-100-44.9-100-100C10,54.9,54.9,10,110,10s100,44.9,100,100C210,165.1,165.1,210,110,210z" />
                            </g>
                        </svg>
                        <!-- /.chart__background -->

                        <svg class="chart__foreground" x="0px" y="0px" height="220px" viewBox="0 0 220 220">
                            <g>
                                <path d="M110,210c-55.1,0-100-44.9-100-100C10,54.9,54.9,10,110,10s100,44.9,100,100C210,165.1,165.1,210,110,210z" />
                            </g>
                        </svg>
                        <!-- /.chart__foreground -->

                    </div>
                    <!--  /.chart__container -->

                    <div class="chart__count .chart__count--carbs">
                        <div>
                            <span class="js-count" data-count="<?php echo e($count_developer); ?>">0</span>g / <span class="js-count" data-count="<?php echo e($count_developer+$count_designer); ?>">0</span>g
                        </div>
                        Developer
                    </div>
                    <!--  /.chart__count--carbs -->

                </div>
                <!--  /.chart  chart--carbs -->

            </div>
            <!--  /.calorie-counter -->

            <style>
                .calorie-counter {
                    background: -webkit-linear-gradient(top left, #4d4d4d, #000);
                    background: linear-gradient(to bottom right, #4d4d4d, #000);
                    -webkit-animation: load 1s ease-out forwards;
                    -moz-animation: load 1s ease-out forwards;
                    animation: load 1s ease-out forwards;
                    background-color: #4d4d4d;
                    border-radius: 4px;
                    box-shadow: 26px 26px 76px 0px rgba(0, 0, 0, 0.26), 26px 26px 136px 0px #0b2b08;
                    color: #fff;
                    height: 500px;
                    font-family: "proxima-nova-soft", sans-serif;
                    font-weight: 500;
                    left: 50%;
                    opacity: 0;
                    padding: 20px 0px;
                    position: absolute;
                    text-align: center;
                    bottom: 50%;
                    top: 50%;
                    width: 300px;
                }
                
                .calorie-counter__title {
                    color: #666;
                    font-size: 30px;
                    margin-bottom: 30px;
                }
                
                .mchart svg {
                    height: 100%;
                    width: 100%;
                }
                
                .chart__background {
                    fill: none;
                    height: 100%;
                    position: relative;
                    stroke: #5a5a59;
                    stroke-width: 20px;
                    width: 100%;
                }
                
                .chart__foreground {
                    -webkit-transform: rotate(180deg);
                    -moz-transform: rotate(180deg);
                    -ms-transform: rotate(180deg);
                    -o-transform: rotate(180deg);
                    transform: rotate(180deg);
                    -webkit-transition: stroke-dashoffset 1s ease-in;
                    -moz-transition: stroke-dashoffset 1s ease-in;
                    transition: stroke-dashoffset 1s ease-in;
                    fill: none;
                    height: 100%;
                    left: 0;
                    position: absolute;
                    stroke-dasharray: 630px;
                    stroke-dashoffset: 630px;
                    stroke-linecap: round;
                    stroke-width: 20px;
                    stroke: #b6feb7;
                    top: 0;
                    width: 100%;
                }
                
                .chart__count {
                    color: #999;
                    font-size: 16px;
                    position: relative;
                }
                
                .chart__count div {
                    color: #fff;
                    font-size: 22px;
                }
                
                .mchart .chart__container {
                    display: inline-block;
                    height: 100%;
                    position: relative;
                    width: 100%;
                }
                
                .chart--calorie .chart__container {
                    height: 220px;
                    width: 220px;
                }
                
                .chart--calorie .chart__count {
                    top: -135px;
                }
                
                .chart--protein,
                .chart--carbs {
                    float: left;
                    margin-bottom: 50px;
                    text-align: left;
                    width: 50%;
                }
                
                .chart--protein .chart__container,
                .chart--carbs .chart__container {
                    height: 30px;
                    width: 100%;
                }
                
                .chart--protein .chart__foreground,
                .chart--carbs .chart__foreground {
                    stroke: #b1fff8;
                }
                
                .chart--protein .chart__count,
                .chart--carbs .chart__count {
                    color: #999;
                    display: inline-block;
                    font-size: 14px;
                    text-align: center;
                    position: relative;
                    width: 100%;
                    top: 2px;
                    overflow: hidden;
                }
                
                .chart--protein .chart__count div,
                .chart--carbs .chart__count div {
                    color: #fff;
                    font-size: 14px;
                }
                
                .chart--carbs {
                    float: none;
                    overflow: hidden;
                }
                
                .chart--carbs .chart__foreground {
                    stroke: #fec6a8;
                }
                
                .calorie__count {
                    background-color: #b584ff;
                    padding: 23px;
                }
                
                .calorie__count__consumed,
                .calorie__count__remaining {
                    font-size: 16px;
                }
                
                .calorie__count__consumed span,
                .calorie__count__remaining span {
                    display: block;
                    font-size: 22px;
                }
                
                .calorie__count__consumed {
                    overflow: hidden;
                }
                
                .calorie__count__remaining {
                    background-color: #fff;
                    box-shadow: 19px 19px 49px 0px rgba(0, 0, 0, 0.36);
                    color: #4d4d4d;
                    float: right;
                    padding: 24px;
                    position: relative;
                    right: -15px;
                    top: -35px;
                    width: 60%;
                }
                
                @-webkit-keyframes load {
                    from {
                        -webkit-transform: translate3d(-50%, -40%, 0);
                        opacity: 0;
                    }
                    to {
                        -webkit-transform: translate3d(-50%, -50%, 0);
                        opacity: 1;
                    }
                }
                
                @-moz-keyframes load {
                    from {
                        -moz-transform: translate3d(-50%, -40%, 0);
                        opacity: 0;
                    }
                    to {
                        -moz-transform: translate3d(-50%, -50%, 0);
                        opacity: 1;
                    }
                }
                
                @keyframes  load {
                    from {
                        -webkit-transform: translate3d(-50%, -40%, 0);
                        -moz-transform: translate3d(-50%, -40%, 0);
                        -ms-transform: translate3d(-50%, -40%, 0);
                        -o-transform: translate3d(-50%, -40%, 0);
                        transform: translate3d(-50%, -40%, 0);
                        opacity: 0;
                    }
                    to {
                        -webkit-transform: translate3d(-50%, -50%, 0);
                        -moz-transform: translate3d(-50%, -50%, 0);
                        -ms-transform: translate3d(-50%, -50%, 0);
                        -o-transform: translate3d(-50%, -50%, 0);
                        transform: translate3d(-50%, -50%, 0);
                        opacity: 1;
                    }
                }
            </style>

            <script>
                (function($) {

                    // Chart Functionality
                    $.fn.setChart = function() {
                        return this.each(function() {
                            // Variables
                            var chart = $(this),
                                path = $('.chart__foreground path', chart),
                                dashoffset = path.get(0).getTotalLength(),
                                goal = chart.attr('data-goal'),
                                consumed = chart.attr('data-count');

                            $('.chart__foreground', chart).css({
                                'stroke-dashoffset': Math.round(dashoffset - ((dashoffset / goal) * consumed))
                            });
                        });
                    }; // setChart()

                    // Count
                    $.fn.count = function() {
                        return this.each(function() {
                            $(this).prop('Counter', 0).animate({
                                Counter: $(this).attr('data-count')
                            }, {
                                duration: 1000,
                                easing: 'swing',
                                step: function(now) {
                                    $(this).text(Math.ceil(now));
                                }
                            });
                        });
                    }; // count()

                    $(window).load(function() {
                        $('.js-chart').setChart();
                        $('.js-count').count();
                    });

                })(jQuery);
            </script>

            <label for="rad1"><i class="fa fa-chevron-left fa-2x"></i></label>
            <label for="rad3"><i class="fa fa-chevron-right fa-2x"></i></label>

        </section>
        <input id="rad3" type="radio" name="rad">
        <section style="background: #FFC765">
            <i class="fa fa-file-text-o"></i>
            <h1 id="rad3_h1">포트폴리오를 쉽고 간편하게 저장</h1>
            <br>
            <h4 id="rad3_h4">디자이너 분들은 자신의 포트폴리오를 간편하게 저장, 개발사 측에서는 포트폴리오를 보고 자신과 맞는 디자이너를 컨택팅 가능</h4>
            <style>
                .slider div p {
                    color: #1c1c1c;
                    position: static;
                    bottom: -65px;
                    font-family: font;
                    font-size: 20px;
                }
                
                .slider {
                    -webkit-animation: animation ease 1s;
                    animation-delay: .8s;
                    animation-fill-mode: backwards;
                    margin: 60px auto 0 auto;
                    height: 20%;
                    width: 16%;
                    padding: 40px;
                    top: 100px;
                    perspective: 1000px;
                    transition: ease-in-out .2s;
                    /*-webkit-transform:rotateX(45deg);
                           -webkit-transform-style:preserve-3d;
                               position:absolute;*/
                }
                /*.slider:active{ -webkit-transform:rotateZ(10deg);}*/
                
                .slide img {
                    text-align: center;
                    width: 100%;
                    height: 100%;
                    -webkit-user-drag: none;
                    user-drag: none;
                    -moz-user-drag: none;
                    border-radius: 2px;
                }
                
                .slide {
                    -webkit-user-select: none;
                    user-select: none;
                    -moz-user-select: none;
                    position: absolute;
                    height: 320px;
                    width: 280px;
                    box-shadow: 0px 10px 30px 0px rgba(0, 0, 0, 0.3);
                    background: #fcfcfc;
                    -webkit-transform-style: preserve-3d;
                    transform-style: preserve-3d;
                    -moz-transform-style: preserve-3d;
                    text-align: center;
                    /*overflow:hidden;*/
                    border: 12px white solid;
                    box-sizing: border-box;
                    border-bottom: 55px white solid;
                    border-radius: 5px;
                }
                
                .transition {
                    -webkit-transition: cubic-bezier(0, 1.95, .49, .73) .4s;
                    -moz-transition: cubic-bezier(0, 1.95, .49, .73) .4s;
                    transition: cubic-bezier(0, 1.95, .49, .73) .4s;
                }
            </style>
            <div class="slider"> <?php /*포트폴리오 슬라이드 portfolio siled*/ ?>
                <div class="slide"><img src="http://cdn.business2community.com/wp-content/uploads/2015/12/5-Web-Design-Tricks-to-Make-Your-Website-SEO-Friendly.jpg" />
                    <p>김우민</p>
                </div>
                <div class="slide"><img src="http://newadvantage.net/wp-content/uploads/2015/02/website-design-hawaiian-sunset2.jpg" />
                    <p>박성민</p>
                </div>
                <div class="slide"><img src="http://www.awwwards.com/awards/images/2012/05/inspiring_websites_web_design_agencies_37.jpg" />
                    <p>성오열</p>
                </div>
                <div class="slide"><img src="http://ginva.com/wp-content/uploads/2013/06/3-illustration-web-design.jpg" />
                    <p>박학규</p>
                </div>

            </div>
            <h3 id="rad3_h3" style="position: absolute;top: 700px;left: 1200px">사진을 드래그 해보세요 !</h3>

            <script>
                /*! Elastic Slider (c) 2014 // Taron Mehrabyan // Ruben Sargsyan
                 */

                window.addEventListener('load', onWndLoad, false);

                function onWndLoad() {

                    var slider = document.querySelector('.slider');
                    var sliders = slider.children;

                    var initX = null;
                    var transX = 0;
                    var rotZ = 0;
                    var transY = 0;

                    var curSlide = null;

                    var Z_DIS = 50;
                    var Y_DIS = 10;
                    var TRANS_DUR = 0.4;

                    var images = document.querySelectorAll('img');
                    for (var i = 0; i < images.length; i++) {
                        images[i].onmousemove = function(e) {
                            e.preventDefault()

                        }
                        images[i].ondragstart = function(e) {
                            return false;

                        }
                    }

                    function init() {

                        var z = 0,
                            y = 0;

                        for (var i = sliders.length - 1; i >= 0; i--) {
                            sliders[i].style.transform = 'translateZ(' + z + 'px) translateY(' + y + 'px)';

                            z -= Z_DIS;
                            y += Y_DIS;
                        }

                        attachEvents(sliders[sliders.length - 1]);

                    }

                    function attachEvents(elem) {
                        curSlide = elem;

                        curSlide.addEventListener('mousedown', slideMouseDown, false);
                        curSlide.addEventListener('touchstart', slideMouseDown, false);
                    }
                    init();

                    function slideMouseDown(e) {

                        if (e.touches) {
                            initX = e.touches[0].clientX;
                        } else {
                            initX = e.pageX;
                        }

                        document.addEventListener('mousemove', slideMouseMove, false);
                        document.addEventListener('touchmove', slideMouseMove, false);

                        document.addEventListener('mouseup', slideMouseUp, false);
                        document.addEventListener('touchend', slideMouseUp, false);
                    }
                    var prevSlide = null;

                    function slideMouseMove(e) {
                        var mouseX;

                        if (e.touches) {
                            mouseX = e.touches[0].clientX;
                        } else {
                            mouseX = e.pageX;
                        }

                        transX += mouseX - initX;
                        rotZ = transX / 20;

                        transY = -Math.abs(transX / 15);

                        curSlide.style.transition = 'none';
                        curSlide.style.webkitTransform = 'translateX(' + transX + 'px)' + ' rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
                        curSlide.style.transform = 'translateX(' + transX + 'px)' + ' rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
                        var j = 1;
                        //remains elements
                        for (var i = sliders.length - 2; i >= 0; i--) {

                            sliders[i].style.webkitTransform = 'translateX(' + transX / (2 * j) + 'px)' + ' rotateZ(' + rotZ / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';
                            sliders[i].style.transform = 'translateX(' + transX / (2 * j) + 'px)' + ' rotateZ(' + rotZ / (2 * j) + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';
                            sliders[i].style.transition = 'none';
                            j++;
                        }

                        initX = mouseX;
                        e.preventDefault();
                        if (Math.abs(transX) >= curSlide.offsetWidth - 30) {

                            document.removeEventListener('mousemove', slideMouseMove, false);
                            document.removeEventListener('touchmove', slideMouseMove, false);
                            curSlide.style.transition = 'ease 0.2s';
                            curSlide.style.opacity = 0;
                            prevSlide = curSlide;
                            attachEvents(sliders[sliders.length - 2]);
                            slideMouseUp();
                            setTimeout(function() {

                                slider.insertBefore(prevSlide, slider.firstChild);

                                prevSlide.style.transition = 'none';
                                prevSlide.style.opacity = '1';
                                slideMouseUp();

                            }, 201);

                            return;
                        }
                    }

                    function slideMouseUp() {
                        transX = 0;
                        rotZ = 0;
                        transY = 0;

                        curSlide.style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR + 's';

                        curSlide.style.webkitTransform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
                        curSlide.style.transform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + transY + 'px)';
                        //remains elements
                        var j = 1;
                        for (var i = sliders.length - 2; i >= 0; i--) {
                            sliders[i].style.transition = 'cubic-bezier(0,1.95,.49,.73) ' + TRANS_DUR / (j + 0.9) + 's';
                            sliders[i].style.webkitTransform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';
                            sliders[i].style.transform = 'translateX(' + transX + 'px)' + 'rotateZ(' + rotZ + 'deg)' + ' translateY(' + (Y_DIS * j) + 'px)' + ' translateZ(' + (-Z_DIS * j) + 'px)';

                            j++;
                        }

                        document.removeEventListener('mousemove', slideMouseMove, false);
                        document.removeEventListener('touchmove', slideMouseMove, false);

                    }

                }
            </script>
            <label for="rad1"><i class="fa fa-chevron-right fa-2x"></i></label>
            <label for="rad2"><i class="fa fa-chevron-left fa-2x"></i></label>

        </section>
        <input id="rad4" type="radio" name="rad">
        <section style="background: #2491f9">
            <i class="fa fa-check-circle"></i>
            <h1>Tellus</h1>
            <p>Vivamus pretium ac ex nec tincidunt.</p>
            <label for="rad3"><i class="fa fa-chevron-left"></i></label>
            <label for="rad1"><i class="fa fa-chevron-right"></i></label>
        </section>
    </div>
</body>