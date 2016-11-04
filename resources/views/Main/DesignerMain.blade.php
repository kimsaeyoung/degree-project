<head>
    <script type="text/javascript" src="js/jquery.loopmovement.min.js"></script>
    <link rel="stylesheet" href="css/jquery.loopmovement.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<?php
    $app = isset($app_count[0]->count)?$app_count[0]->count:0;
    $web = isset($web_count[0]->count)?$web_count[0]->count:0;
    $total = $app+$web;
?>

<style>         /*메인div*/


    .chart {
        margin-top: 1%;
        margin-left: 81%;
        position: fixed;
        height: 475px;
        width: 300px;

    }

    .container {
        margin: 10px auto;
        padding: 10px;
        width: 1000px;
        height: 1000px;
    }
    .profile_card{
        margin-left: 3%;
        width:36%;
        height:60%;
        float:left;
    }
    .local_chart{

    }
    .project_table{
        margin-top:1%;
        width:100%;
        height:67%;
        float:left;
    }

    /*프로필 style*/

    @import url(https://fonts.googleapis.com/css?family=Lato:400,700,300);

    body .card {
        width: 100%;
        border: solid;
        border-color: #FF7E4E;
        border-radius: 5px;
        background: white;
        position: relative;
    }
    body .card:after {

        height: 90%;
        width: 80%;
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        margin: 0 auto;
        z-index: -10;

    }
    body .card .cover {
        height: 200px;
        overflow: hidden;
        position: relative;
        border-radius: 5px 5px 0 0;
    }
    body .card .cover .image {
        background-image: url(http://www.aelite.co.uk/wp-content/uploads/2016/05/mobile-friendly.jpg);
        background-size: cover;
        background-position: center;
        height: 100%;
    }
    body .card .cover .corner {
        position: absolute;
        bottom: 0;
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 0 40px 400px;
        border-color: transparent transparent white transparent;
    }
    body .card .profile {
        -webkit-transform: translateY(-70%);
        transform: translateY(-70%);
        height: 80px;
        width: 80px;
        background-image: url(../img/member_face/{{$name=Session::get('m_face')}});         /*프로필사진*/
        background-size: cover;
        background-position: center;
        border-radius: 100%;
        margin: 0 auto;
    }
    body .card .info {
        margin-top: -30px;
        font-size: 0;
        text-align: center;

    }
    body .card .info .title {
        font-size: 22px;
        text-align: center;
        margin-bottom: 18px;
    }
    body .card .info .description {
        width: 250px;
        font-size: 14px;
        color: rgba(0, 0, 0, 0.6);
        margin: 0 auto;
        text-align:center;
        font-weight: 300;
        letter-spacing: 1px;
        
    }
    body .card .info .data {
        margin-top: 40px;
        padding: 30px 0 35px;
        border-top: solid 1px rgba(0, 0, 0, 0.1);
    }
    body .card .info .data .tweets, body .card .info .data .followers, body .card .info .data .following {
        font-size: 1rem;
        display: inline-block;
        width: calc(100% / 3);
        text-align: center;
    }
    body .card .info .data .tweets .number, body .card .info .data .followers .number, body .card .info .data .following .number {
        font-size: 20px;
        margin-bottom: 15px;
        color: rgba(0, 0, 0, 0.8);
    }
    body .card .info .data .tweets .tag, body .card .info .data .followers .tag, body .card .info .data .following .tag {
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: rgba(255, 0, 0, 0.6);
    }
     /*앱웹 차트*/
    .wrapper {
        height: 50%;
        width: 100%;
        top: 50%;
        left: 50%;
        /*-webkit-transform: translate(-50%, -50%);*/
        transform: translate(0%, 20%);
    }

    .graph {
        height: 100%;
        width: 100%;
        background: -webkit-linear-gradient(45deg, #fff 50%, #eef 50%) repeat;
        background: linear-gradient(45deg, #fff 50%, #eef 50%) repeat;
        background-size: 15px;
        padding: 20px;
        border-radius: 5px;
        font-family: 'Ubuntu';
        box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.6);
    }

    .head-box {
        background: #ADD8E6;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        position: absolute;
        color: #152B39;
        top: -40px;
        left: 85%;
        box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.6);
        -webkit-transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        overflow: hidden;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-flex-flow: space-around;
        -ms-flex-flow: space-around;
        flex-flow: space-around;
        -webkit-box-align: center;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .head-box:hover {
        cursor: pointer;
    }

    .max {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
        top: 0;
        left: 0;
        position: absolute;
        height: 100%;
        width: 100%;
        border-radius: 5px;
        -webkit-transition: all 300ms ease-in-out;
        transition: all 300ms ease-in-out;
        font-size: 4em;
        color: #152B39;
    }

    .fa-bar-chart {
        font-size: 2em;
        display: block;
    }

    .bar {
        padding: 30px;
        /*margin: 20px 0;*/
        margin-top: 30px;
        height: 30%;
        width: 10%;
        background: -webkit-linear-gradient(0deg, #ADD8E6, #204056);
        background: linear-gradient(90deg, #ADD8E6, #204056);
        white-space: nowrap;
        overflow: hidden;
        border-radius: 3px;
        color: rgba(255, 255, 255, 0);
        font-size: 1.2em;
        font-weight: 500;
        text-align: right;
        box-shadow: 2px 5px 5px rgba(0, 0, 0, 0.2);
        -webkit-transition: all 600ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        transition: all 600ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
    }

    .one {
        width: <?=$app/$total*100?>%;
        color: white;
        -webkit-transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        -webkit-transition-delay: 100ms;
        transition-delay: 100ms;
    }

    .two {
        width: <?=$web/$total*100?>%;
        color: white;
        -webkit-transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        -webkit-transition-delay: 150ms;
        transition-delay: 150ms;
    }

    .three {            /*만약 차트 추가시*/
        width: 50%;
        color: white;
        -webkit-transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        transition: all 300ms cubic-bezier(0.8, 0.79, 0.51, 1.31);
        -webkit-transition-delay: 200ms;
        transition-delay: 200ms;
    }

    #country-list {
        font-size: 16px;
        width: 100%;
    }

    #country-list .country-table-head {
        border: 1px solid #bfbfbf;
        width: 100%;
        border-radius: 4px;
        -o-border-radius: 4px;
        -moz-border-radius: 4px;
        -webkit-border-radius: 4px;
        background: linear-gradient(to bottom, #fcfcfc, #dddcdb 99%);
        background: -o-linear-gradient(top, #fcfcfc, #dddcdb 99%);
        background: -ms-linear-gradient(top, #fcfcfc 0%, #dddcdb 99%);
        background: -moz-linear-gradient(top, #fcfcfc 0%, #dddcdb 99%);
        background: -webkit-linear-gradient(top, #fcfcfc 0%, #dddcdb 99%);
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0, #fcfcfc), color-stop(1, #dddcdb));
        filter: progid: DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr=#fcfcfc, EndColorStr=#dddcdb);
        -ms-filter: "progid:DXImageTransform.Microsoft.Gradient(GradientType=0,StartColorStr=#fcfcfc,EndColorStr=#dddcdb)";
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        -o-box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        -webkit-box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    #country-list tbody tr:nth-child(2n+2) {
        background: none repeat scroll 0 0 #F6F6F6;
    }

    #country-list td {
        padding: 15px 0 15px 15px;
        color: #686868;
        text-shadow: 0px 1px 0 #ddd;
        border-left: 1px solid #999;
        box-shadow: inset 10px 0 10px -10px rgba(0, 0, 0, 0.5), inset -10px 0 10px -10px rgba(0, 0, 0, 0.5);
    }

    #country-list a {
        color: #a50101;
        text-decoration: none;
    }

    .country-table-head th {
        padding: 15px 0 15px 15px;
        text-align: left;
        border-right: 1px solid #c1c1c1;
        border-left: 1px solid #fff;
    }

    .country-table-head th:first-child {
        border-left: none;
        width: 200px;
    }

    .country-table-head span {
        font-size: 12px;
    }
    
    #ctlTitle {
        width: 100%;
        height: 60px;
        border: none;
        border-radius: 5px 5px 0px 0px;
        background-color: lightblue;
    }
    
    #ctlTitle h2 {
        margin: 0;
        padding: 10px;
        width: 100%;
        height: 100%;
    }
    
    #ctlBox {
        padding: 10px;
        width: 100%;
        height: 240px;
        border: 1px solid lightgray;
        border-radius: 0px 0px 5px 5px;
        white-space: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
    }
    
    .pjBox {
        display: inline-block;
        position: relative;
        padding: 20px;
        width: 320px;
        height: 200px;      
    }
    
    .pjBox a {
        color: black;
        text-decoration: none;
    }
    
    .pjTextBox {
        padding: 10px;
        width: 100%;
        height: 100%;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: aliceblue;
    }
    
    .pjBox .pjTextBox h4{
        padding: 5px;
        margin: 0;
        margin-top: 5px;
        width: 100%;
        font-weight: bold;
    }
    
    a.pjBox .pjTextBox h4:nth-child(even){
        padding-left: 15px;
        font-size: 16px;
        font-weight: lighter;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
    }

</style>

<body>
<div class="chart">                       {{--웹앱 차트 시작--}}
    <center><b><h3>APP / WEB <br>プロジェクトの割合</h3></b></center>
    <div class="wrapper">
        <div class="graph">
            <div class="head-box max"><i class="fa fa-bar-chart"></i></div>
            <div id="bar-one" class="bar">APP ({{$app}})</div>
            <div id="bar-two" class="bar">WEB ({{$web}})</div>
        </div>
    </div>
    {{--{{$app_count[0]->count}}/{{$app_web_count[0]->count}}*100;--}}

    <script>
        //! WORK IN PROGRESS !//

        // TO DO //
        // percentage on .bar to change based on percentage width.

        $(document).ready(function() {

            var barOne = $('#bar-one');
            var barTwo = $('#bar-two');
            var barThree = $('#bar-three');
            var barFour = $('#bar-four');
            var barFive = $('#bar-five');
            var barOneWidth = 100;
            var barTwoWidth = 40;
            var barThreeWidth = 50;
            var barFourWidth = 90;
            var barFiveWidth = 70;

            // var getPercentWidth = function(element) {
            //   var parentWidth = element.offsetParent().width();
            //   var percent = 100 * width / parentWidth;
            //   return percent;
            // };

            $('.head-box').click(function() {
                $(this).toggleClass('max');
                barOne.toggleClass('one');
                barTwo.toggleClass('two');
                barThree.toggleClass('three');
                barFour.toggleClass('four');
                barFive.toggleClass('five');
            });

        });
    </script>

</div>

<div class="container">
   
    <div id="ctlTitle">
        <h2>進行中プロジェクト</h2>
    </div>
    <div id="ctlBox">
        @foreach($results as $result)
        @if($result)
        <div class="pjBox">
            <a href="/work/{{$result->pj_num}}">
                <div class="pjTextBox">
                    <h4>プロジェクト名</h4>
                    <h4>{{ $result->pj_title }}</h4>
                    <h4>開発期間</h4>
                    <h4><?=substr($result->pj_date, 0, 11)?></h4>
                </div>
            </a>
        </div>
        @endif
        @endforeach
    </div>
   
    <!--<div class="profile_card">      {{--프로필 시작--}}
        <h2>マイプロフィール</h2>
        <div class="card">
            <div class="cover">
                <div class="image"></div>
                <div class="corner"></div>
            </div>
            <div class="profile"></div>
            <div class="info">
                <div class="title">
                    {{$name=Session::get('m_name')}}
                </div>
                <div class="description">
                    <button class="btn btn-danger" onclick="location.href='/designerpage/modify'">情報変更</button>
                </div>
                
                <div class="description">
                    <button class="btn btn-danger" onclick="location.href='/designer/{{Session::get('m_num')}}'">MyPortlog</button>
                </div>
                
                <div class="data">
                </div>
            </div>
        </div>
    </div>    -->                                      {{--프로필 끝 profile end--}}



    <div class="project_table">                     {{--최근 등록 프로젝트 테이블 시작--}}

        <h2>最近登録されたプロジェクト</h2>

        <table id="country-list" class="sortable-table">
            <thead>
            <tr class="country-table-head">
                <th class="sort-down"><em>カテゴリー</em> <span>&#9660;</span></th>
                <th><em>タイトル</em> <span>&nbsp;</span></th>
                <th class="date-sort" data-date-format="Y-m-d H:i:s"><em>登録時間</em> <span>&nbsp;</span></th>
            </tr>
            </thead>
            <tbody>
            <tr><td><a href="/projectView/{{isset($new_project[0]->pj_num)?$new_project[0]->pj_num:'#'}}">{{isset($new_project[0]->bc_name)?$new_project[0]->bc_name:'no data'}}</a></td><td>{{isset($new_project[0]->pj_title)?$new_project[0]->pj_title:'no data'}}</td><td>{{isset($new_project[0]->created_at)?$new_project[0]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[1]->pj_num)?$new_project[1]->pj_num:'#'}}">{{isset($new_project[1]->bc_name)?$new_project[1]->bc_name:'no data'}}</a></td><td>{{isset($new_project[1]->pj_title)?$new_project[1]->pj_title:'no data'}}</td><td>{{isset($new_project[1]->created_at)?$new_project[1]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[2]->pj_num)?$new_project[2]->pj_num:'#'}}">{{isset($new_project[2]->bc_name)?$new_project[2]->bc_name:'no data'}}</a></td><td>{{isset($new_project[2]->pj_title)?$new_project[2]->pj_title:'no data'}}</td><td>{{isset($new_project[2]->created_at)?$new_project[2]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[3]->pj_num)?$new_project[3]->pj_num:'#'}}">{{isset($new_project[3]->bc_name)?$new_project[3]->bc_name:'no data'}}</a></td><td>{{isset($new_project[3]->pj_title)?$new_project[3]->pj_title:'no data'}}</td><td>{{isset($new_project[3]->created_at)?$new_project[3]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[4]->pj_num)?$new_project[4]->pj_num:'#'}}">{{isset($new_project[4]->bc_name)?$new_project[4]->bc_name:'no data'}}</a></td><td>{{isset($new_project[4]->pj_title)?$new_project[4]->pj_title:'no data'}}</td><td>{{isset($new_project[4]->created_at)?$new_project[4]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[5]->pj_num)?$new_project[5]->pj_num:'#'}}">{{isset($new_project[5]->bc_name)?$new_project[5]->bc_name:'no data'}}</a></td><td>{{isset($new_project[5]->pj_title)?$new_project[5]->pj_title:'no data'}}</td><td>{{isset($new_project[5]->created_at)?$new_project[5]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[6]->pj_num)?$new_project[6]->pj_num:'#'}}">{{isset($new_project[6]->bc_name)?$new_project[6]->bc_name:'no data'}}</a></td><td>{{isset($new_project[6]->pj_title)?$new_project[6]->pj_title:'no data'}}</td><td>{{isset($new_project[6]->created_at)?$new_project[6]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[7]->pj_num)?$new_project[7]->pj_num:'#'}}">{{isset($new_project[7]->bc_name)?$new_project[7]->bc_name:'no data'}}</a></td><td>{{isset($new_project[7]->pj_title)?$new_project[7]->pj_title:'no data'}}</td><td>{{isset($new_project[7]->created_at)?$new_project[7]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[8]->pj_num)?$new_project[8]->pj_num:'#'}}">{{isset($new_project[8]->bc_name)?$new_project[8]->bc_name:'no data'}}</a></td><td>{{isset($new_project[8]->pj_title)?$new_project[8]->pj_title:'no data'}}</td><td>{{isset($new_project[8]->created_at)?$new_project[8]->created_at:'no data'}}</td></tr>
            <tr><td><a href="/projectView/{{isset($new_project[9]->pj_num)?$new_project[9]->pj_num:'#'}}">{{isset($new_project[9]->bc_name)?$new_project[9]->bc_name:'no data'}}</a></td><td>{{isset($new_project[9]->pj_title)?$new_project[9]->pj_title:'no data'}}</td><td>{{isset($new_project[9]->created_at)?$new_project[9]->created_at:'no data'}}</td>
            </tbody>
        </table>

    </div>
    <script>
        $(document).ready(function() {

            $(".sortable-table th").click(function() {
                sort_table($(this));
            });

        });

        function sort_table(clicked) {
            var current_table = clicked.parents(".sortable-table"),
                    sorted_column = clicked.index(),
                    column_count = current_table.find("th").length,
                    sort_it = [];

            current_table.find("tbody tr").each(function() {
                var new_line = "",
                        sort_by = "";
                $(this).find("td").each(function() {
                    if ($(this).next().length) {
                        new_line += $(this).html() + "+";
                    } else {
                        new_line += $(this).html();
                    }
                    if ($(this).index() == sorted_column) {
                        sort_by = $(this).text();
                    }
                });

                new_line = sort_by + "*" + new_line;
                sort_it.push(new_line);
                //console.log(sort_it);

            });

            sort_it.sort();
            $("th span").text("");
            if (!clicked.hasClass("sort-down")) {
                clicked.addClass("sort-down");
                clicked.find("span").text("▼");
            } else {
                sort_it.reverse();
                clicked.removeClass("sort-down");
                clicked.find("span").text("▲");
            }

            $("#country-list tr:not('.country-table-head')").each(function() {
                $(this).remove();
            });

            $(sort_it).each(function(index, value) {
                $('<tr class="current-tr"></tr>').appendTo(clicked.parents("table").find("tbody"));
                var split_line = value.split("*"),
                        td_line = split_line[1].split("+"),
                        td_add = "";

                //console.log(td_line.length);
                for (var i = 0; i < td_line.length; i++) {
                    td_add += "<td>" + td_line[i] + "</td>";
                }
                $(td_add).appendTo(".current-tr");
                $(".current-tr").removeClass("current-tr");

            });
        }
    </script>



</body>

