<html>
<head>
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Fixed headers - fullPage.js</title>
    <meta name="author" content="Alvaro Trigo Lopez" />
    <meta name="description" content="fullPage fixed header and footer." />
    <meta name="keywords"  content="fullpage,jquery,demo,screen,fixed, header,footer, absolute, positioned,css" />
    <meta name="Resource-type" content="Document" />

    <link rel="stylesheet" type="text/css" href="css/jquery.fullPage.css" /> <?php /*원페이지css*/ ?>

    <style>

        /* Style for our header texts
        * --------------------------------------- */
        /*h1{
            font-size: 5em;
            font-family: arial,helvetica;
            color: #fff;
            margin:0;
            padding:0;
        }*/
        .intro p{
            color: #d43f3a;
        }

        /* Centered texts in each section
        * --------------------------------------- */
        .section{
            text-align:center;
        }

        /* Fixed header and footer.
        * --------------------------------------- */
        #header{
            position:fixed;
            height: 130px;
            display:block;
            width: 100%;
            background: #FFFFFF;
            z-index:9;
            color: #f2f2f2;
            padding: 0px 0 0 0;
        }

        #footer{
            position:fixed;
            height: 50px;
            display:block;
            width: 100%;
            background: #ffffff;
            z-index:9;
            text-align:center;
            color: #000000;
            padding: 20px 0 0 0;
        }

        #header{
            top:0px;
        }
        #footer{
            bottom:0px;
        }


    </style>    <?php /*원페이지 전용css*/ ?>

    <!--[if IE]>
    <script type="text/javascript">
        var console = { log: function() {} };
    </script>
    <![endif]-->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="js/jquery.fullPage.js"></script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#fullpage').fullpage({
                anchors: ['firstPage', 'secondPage', '3rdPage', '4rdPage'],
                sectionsColor: ['#ff9933', '#003399', '#AAAAAA' , '#000000'],
                css3: true
            });
        });
    </script>

</head>
<body>

<?php /*프로젝트목록 css*/ ?>
<link rel="stylesheet" type="text/css" href="css/normalize.css" />
<link rel="stylesheet" type="text/css" href="css/demo.css" />
<link rel="stylesheet" type="text/css" href="css/component.css" />


<script src="js/snap.svg-min.js"></script>
<script type="text/javascript" src="js/jssor.slider.min.js"></script>


<div id="header">
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>

<div id="footer">
    영진전문대학 일본취업반 1조

</div>

<div id="fullpage">
    <div class="section" id="section0">
        <div class="intro">
            
        </div>

    </div>

    <div class="section" id="section1">     <?php /*두번째페이지 시작*/ ?>
        <div class="slide" id="slide1">
            <div class="intro">



            </div>
        </div>

        <div class="slide" id="slide2">
            <h1>Slide 2</h1>
            <img src="imgs/iphone-blue.png" alt="iphone" id="iphone-two" />
        </div>

    </div>                                  <?php /*두번째페이지 끝*/ ?>

    <div class="section" id="section2">
        <div class="intro">
            <h1>Enjoy it</h1>
        </div>
    </div>

    <div class="section" id="section3">
        <div class="intro">


        </div>
    </div>
</div>

</body>
</html>
