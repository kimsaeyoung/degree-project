
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html lang="ko">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Designer & Developer</title>
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{asset('js/jquery.DB_slideMove.min.js')}}"></script>
    <script src="http://d3js.org/d3.v3.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <link href="{{ asset('css/animsition.css') }}" rel="stylesheet">
    <script src="{{ asset('js/animsition.js') }}"></script>
    <link href="{{ asset('css/ds_header.css') }}" rel="stylesheet">

    @yield('d_style')
    
    <style>
        * {
            font-family: 'ㅜNoto Sans', sans-serif;
        }
        html, body {
            width: 100%;
            height: 100%;
        }
        a {
            color: white;
        }
        a:hover {
            text-decoration: none;
        }    
        #backGroundImg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url({{asset('img/portlogback.jpeg')}}) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            filter: blur(5px); 
            -webkit-filter: blur(5px); 
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
        }
        #backGroundColor {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: black;
            opacity: 0.5;
        }
        #portlogHeader {
            position: relative;
            font-family: 'Exo 2', sans-serif;
            width: 100%;
            height: 80px;
            background-color: rgba(255,255,255,0.5);
        }
        #portTitle {
            float: left;
            position: relative;
            padding-left: 30px;
            width: 25%;
            height: 100%;
            line-height: 80px;
            font-size: 25px;
            font-weight: lighter;
        }
        #portMenu {
            display: inline-block;
            position: relative;
            width: 50%;
            height: 100%;
            z-index: 1000;
        }
        #hContent {
            text-align: center;
            list-style: none;
            width: 100%;
            min-width: 590px;
            height: 100%;
        }
        #hContent li {
            display: inline-block;
            height: 100%;
            width: 100px;
            line-height: 80px;
            font-size: 18px;
            text-align: center;
            font-weight: 100;
        }
        #hContent li:hover .hLine {
            width: 70px
        }
        #hContent li a {
            color: black;
        } 
        .hLine {
            margin: 0 auto;
            margin-top: -22px;
            width: 0px;
            height: 2px;
            background-color: black;
            -webkit-transition: .5s;
            /* Safari */
            transition: .5s;
        }
    </style>
</head>
<body>
    <div id="backGroundImg"></div>
    <div id="backGroundColor"></div>
    
    <div id="portlogHeader">
        <div id="portTitle"><a href="/designer">HOME</a></div>

        <div id="portMenu">
            <ul id="hContent">
                <li><a href="/designer/{{$m_num}}">PORTLOG</a><div class="hLine"></div></li>
                <li><a href="/designer/intro/{{$m_num}}">PROFILE</a><div class="hLine"></div></li>
                <li><a href="/designer/portfolio/{{$m_num}}">PORTFOLIO</a><div class="hLine"></div></li>
                <li><a href="/designer/career/{{$m_num}}">CAREER</a><div class="hLine"></div></li>
                <li><a href="/designer/school/{{$m_num}}">HISTORY</a><div class="hLine"></div></li>
            </ul>
        </div>

        <div id="portSubMenu"></div>
    </div>
    @yield('d_content')
</body>
</html>


