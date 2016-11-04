<!DOCTYPE html>

<!--마우스 오른쪽 클릭금지, 드래그 금지-->
<body bgproperties="fixed" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">

<head>

    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php /*구글API 지도 사용*/ ?>
    <script type="text/javascript"
            src="http://maps.googleapis.com/maps/api/js?sensor=true">
    </script>

    <?php /*돈 스크롤바*/ ?>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.1.1/css/bootstrap-slider.min.css"
          type="text/css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-slider/9.1.1/bootstrap-slider.min.js"></script>

    <style>

        #pTitle {
            margin-bottom: 20px;
            width: 100%;
            height: auto;
            border: 0.5px solid lightgray;
            border-radius: 5px;
        }

        #pTitle * {
            display: inline-block;
        }

        #pTitle h1 {
            margin: 0;
            padding: 5px 10px;
            display: block;
            width: 100%;
            font-size: 20px;
            border-radius: 5px 5px 0px 0px;
            background-color: lightblue;
            color: white;
        }

        #pTitle h5 {
            padding: 0px 10px;
        }

        #pTitle #btn_write {
            margin: auto 7px;
            margin-top: 5px;
            width: 120px;
            height: 26px;
            font-size: 14px;
            line-height: 16px;
            color: black;
            background-color: transparent;
            box-shadow: 0px 0px 2px 1px lightblue;
        }

        .container {
            margin: 0 auto;
            padding: 10px;
            width: 1000px;
            height: auto;
        }

        #btn_write {
            display: inline-block;
            float: right;
            padding: 5px;
            width: 10%;
            color: #CCCCCC;
            background-color: #213B96;
        }

        .project_title_sec {
            margin: 0 auto;
            display: table-cell;
            text-align: left;
            vertical-align: middle;
        }

        .a_div {
            float: right;
            text-align: right;
            margin-top: 30px;
            margin-left: 10px;
            margin-bottom: 22px;
            width: 70%;
            height: 250px;
        }

        /* 마우스 올렸을때 해당 게시물 div border 변경*/
        .a_div:hover {
		box-shadow: 0px 0px 10px 0px red;
        }

        .left_side_menu {
            float: left;
            display: inline-block;
            width: 20%;
            text-align: center;
            border: 1px solid lightgray;
            border-radius: 5px;
        }

        .left_side_menu div {
            display: block;
        }

        #box {
            margin: 0px 0px;
            width: 100% !important;
            border: none !important;
        }

        #box1 {
            border: none !important;
            width: 100% !important;
        }

        .content {
            width: 100% !important;
            font-size: 15px !important;
        }

        .left_side_menu_a {
            margin: 5px 0px;
            width: 100%;
            height: 60px;
            border: none;
        }

        .left_side_menu_a div {
            display: block;
        }

        .left_side_menu_a .left-box {
            float: left;
            height: 100%;
            width: 50%;
        }

        .left_side_menu_a .right-box {
            float: right;
            height: 100%;
            width: 50%;
        }

        .left_side_menu_a .price_box1 {
            padding-top: 5px;
            width: 100%;
            height: 50%;
        }

        .left_side_menu_a .price_box2 {
            padding-top: 5px;
            width: 100%;
            height: 50%;
        }

        .left_side_menu_a .price_box3 {
            padding-top: 5px;
            width: 100%;
            height: 50%;
        }

        .left_side_menu_a .price_box4 {
            padding-top: 5px;
            width: 100%;
            height: 50%;
        }

        .left_side_menu_b {
            border-width: thin;
            height: 340px;
            text-align: left;
        }

        .left_side_menu_c {
            margin: 10px 0px;
            border-width: thin;
            text-align: center;
        }

        #pCategory, #keyword, #money {
            margin: 5px 0;
            width: 100%;
        }

        #pCategory label, #keyword label, #money label {
            position: relative;
            margin: 5px 5px;
            width: 80px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border: 0.5px solid lightblue;
            border-radius: 5px;
            font-size: 14px;
            font-weight: 400;
        }

        #pCategory label input, #keyword label input, #money label input {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .circle {
            text-align: center;
            display: inline-block;
            margin: 0 auto 0;
            margin-top: 5px;
        }

        #wrapper_a {
            display: inline-block;
            width: 100%;
        }

        .sort-box-title, .category-box-title {
            margin: 0 auto 0;
            padding: 5px 0;
            display: inline-block;
            text-align: center;
            width: 100%;
            font-size: 17px;
            background-color: lightblue;
        }

        .form-group-b {
            padding-left: 20px;
            padding-bottom: 10px;
        }

        .form-group-b input[name=area] {
            width: 130px;
        }

        .form-group-b button {
            margin: 0 auto;
            padding: 0;
            width: 26px;
            height: 26px;
        }

        #main {
            display: inline-block;
            width: 80%;
            margin-top: -10px;
            padding-left: 20px;
        }

        #main .mainList {
            color: black;
        }

        #pj_edge {
            margin-top: 5px;
            height: 20px;
            width: 240px;
            display: inline-block;
            float: right;
        }

        #pj_edge .edge {
            width: 65px;
            height: 30px;
            line-height: 30px;
            float: right;
            text-align: center;
            margin-right: 10px;
            color: white;
            font-weight: bold;

        }

        #main .a_div {
            margin: 10px 0;
            position: relative;
            width: 100%;
            height: auto;
            border: 1px solid lightgray;
            border-radius: 10px;
        }

        #main .a_div .div_1 {
            padding: 5px 0;
            border-radius: 10px 10px 0px 0px;
            background-color: lightblue;
        }

        .a_div .db_data_form {
            padding-left: 10px;
            font-size: 30px;
	        width: 500px;
	        display: inline-block;
            text-align: left;
            overflow:hidden;
	        text-overflow: ellipsis;
	        white-space: nowrap;

        }

        .a_div .div_pj_date {
            padding-top: 5px;
            padding-right: 10px;
            float: right;
        }

        #main .a_div .div_2 {
            padding: 10px;
            float: left;
            width: 30%;
            border-right: 1px solid lightgray;
        }

        #main .a_div .div_2 .div_2_a {
            float: left;
            display: inline-block;
            width: 50%;
            height: 50%;
            text-align: center;
            padding: 4px;
        }

        #main .a_div .div_2 .div_2_a * {
            display: block;
        }

        #main .a_div .div_2 .div_2_a span {
            width: 100%;
        }

        #main .a_div .div_2 .circle {
            width: 50px;
            height: 50px;
            border-radius: 25px;
            -moz-border-radius: 25px;
            -webkit-border-radius: 25px;
            -ms-border-radius: 25px;
            -khtml-border-radius: 25px;
            -o-border-radius: 25px;
            background: #66F;
            font: normal 11px/50px "나눔고딕", "돋움", "굴림";
            color: #fff;
            text-align: center;
        }

        #main .a_div .div_3 {
            padding: 17px;
            float: right;
            width: 70%;
            height: 186px;
            font-size: 16px;
            text-align: left;
            overflow: hidden;
            text-overflow: clip;
            display: -webkit-box;
            -webkit-line-clamp: 7; /* 라인수 */
            -webkit-box-orient: vertical;
            word-wrap: break-all;
            line-height: 1.5em;
            /* height: 3.9em;  line-height 가 1.2em 이고 3라인을 자르기 때문에 height는 1.2em * 3 = 3.6em */
        }

        #main .a_div .div_4 {
            padding-top: 10px;
            width: 100%;
            height: 40px;
            border-top: 1px solid lightgray;
            border-radius: 0px 0px 10px 10px;
            background-color: lightblue;
            text-align: left;
            display: inline-block;
            font-size: 16px;
        }

        #main .a_div .div_4 .db_pj_price {
            padding: 0 10px;
            border-right: 1px solid;
        }

        #main .a_div .div_4 .db_pj_categoray {
            float: right;
            margin-right: 10px;
        }

        .pagenate {
            list-style: none !important;
            text-align: center !important;
        }

        .step .col-md-2 {
            background-color: #fff;
            border: 1px solid #C0C0C0;
            border-right: none;
        }

        .step .col-md-2:last-child {
            border: 1px solid #C0C0C0;
        }

        .step .col-md-2:first-child {
            border-radius: 5px 0 0 5px;
        }

        .step .col-md-2:last-child {
            border-radius: 0 5px 5px 0;
        }

        .step .col-md-2:hover {
            color: #F58723;
            cursor: pointer;
        }

        .step .activestep {
            color: #F58723;
            height: 100px;
            margin-top: -7px;
            padding-top: 7px;
            border-left: 6px solid #5CB85C !important;
            border-right: 6px solid #5CB85C !important;
            border-top: 3px solid #5CB85C !important;
            border-bottom: 3px solid #5CB85C !important;
            vertical-align: central;
        }

        .step .fa {
            padding-top: 15px;
            font-size: 40px;
        }

        .label.label-default {
            font-size: 12px;
        }

        #custom-search-form {
            margin: 0;
            margin-top: 5px;
            margin-right: -15px;
            padding: 0;
        }

        #custom-search-form .search-query {
            padding-right: 3px;
            padding-right: 4px \9;
            padding-left: 3px;
            padding-left: 4px \9;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */

            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-transition: width 0.2s ease-in-out;
            -moz-transition: width 0.2s ease-in-out;
            -o-transition: width 0.2s ease-in-out;
            transition: width 0.2s ease-in-out;
        }

        #custom-search-form button {
            border: 0;
            background: none;
            /** belows styles are working good */
            padding: 2px 5px;
            margin-top: 2px;
            position: relative;
            left: -28px;
            /* IE7-8 doesn't have border-radius, so don't indent the padding */
            margin-bottom: 0;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
        }

        .search-query:focus + button {
            z-index: 3;
        }

        .search-query:focus {
            width: 260px;
        }

        .price_interval {
            margin-top: 10px;
            width: 100%;
            height: 50px;
            border: 1px solid darkred;
            border-radius: 10px;
            text-align: center;
        }

        .slider-selection {
            background-image: linear-gradient(to bottom, #000000 0, #f5f5f5 100%);
        }

        .price_min {
            font-size: 20px;
            margin-right: 10px;
        }

        .slider.slider-horizontal {
            width: 300px;
            height: 20px;
            margin-top: -10px;
        }



    </style>

    <!--레프트 퀵 메뉴-->
    <script type="text/javascript">
        var stmnLEFT = 10; // 오른쪽 여백
        var stmnGAP1 = 0; // 위쪽 여백
        var stmnGAP2 = 60; // 스크롤시 브라우저 위쪽과 떨어지는 거리
        var stmnBASE = 150; // 스크롤 시작위치
        var stmnActivateSpeed = 35; //스크롤을 인식하는 딜레이 (숫자가 클수록 느리게 인식)
        var stmnScrollSpeed = 20; //스크롤 속도 (클수록 느림)
        var stmnTimer;

        function RefreshStaticMenu() {
            var stmnStartPoint, stmnEndPoint;
            stmnStartPoint = parseInt(document.getElementById('STATICMENU').style.top, 10);
            stmnEndPoint = Math.max(document.documentElement.scrollTop, document.body.scrollTop) + stmnGAP2;
            if (stmnEndPoint < stmnGAP1) stmnEndPoint = stmnGAP1;
            if (stmnStartPoint != stmnEndPoint) {
                stmnScrollAmount = Math.ceil(Math.abs(stmnEndPoint - stmnStartPoint) / 15);
                document.getElementById('STATICMENU').style.top = parseInt(document.getElementById('STATICMENU').style.top, 10) + ( ( stmnEndPoint < stmnStartPoint ) ? -stmnScrollAmount : stmnScrollAmount ) + 'px';
                stmnRefreshTimer = stmnScrollSpeed;
            }
            stmnTimer = setTimeout("RefreshStaticMenu();", stmnActivateSpeed);
        }
        function InitializeStaticMenu() {
            document.getElementById('STATICMENU').style.left = stmnLEFT + 'px';  //처음에 오른쪽에 위치. left로 바꿔도.
            document.getElementById('STATICMENU').style.top = document.body.scrollTop + stmnBASE + 'px';
            RefreshStaticMenu();
        }
    </script>

    <style type="text/css">
        #STATICMENU {
            margin: 0pt;
            padding: 0pt;
            position: relative;
            right: 0px;
            top: 0px;
        }
    </style>
</head>


<!--body start-->

<body onload="InitializeStaticMenu();">
<div class="container">
    <div id="pTitle">
        <h1>プロジェクトの検索</h1>
        <h5>現在<?php echo e($count); ?>つのプロジェクトが登録されています。</h5>

        <!--프로젝트 검색 버튼-->
        <form id="custom-search-form" class="form-search form-horizontal pull-right" action="<?php echo e(route('projectList')); ?>"
              method="get">
            <div class="input-append span12">
                <input type="text" class="search-query mac-style" name="term" placeholder="Search..">
                <button type="submit" class="btn">
                    <i class="glyphicon glyphicon-search"></i></button>
            </div>
        </form>

        <!--프로젝트등록 버튼 -->
        <!--개발사 or 디자이너에 따라 프로젝트 등록 버튼이 활성 여부-->
        <?php if(Session::get('div_member')=='2'): ?>
            <a href="<?php echo route('projectwrite'); ?>" id="btn_write" class="btn btn-default"
               style="border-color: hotpink; border-width:2px">
                プロジェクト登録</a>
        <?php endif; ?>
        <?php /*<a href="<?php echo route('projectManage'); ?>"  id = "btn_write" class="btn btn-default">가등록관리</a>*/ ?>

    </div>
    <div id="wrapper_a">
        <div id="STATICMENU">
            <div class="left_side_menu">
                
                <div class="sort-box-title">プロジェクトの整列</div>

                <div class="left_side_menu_a">
                    <div class="left-box">
                        <div class="price_box1"><a href="<?php echo route('projectList/{post}','high'); ?>">金額高い順</a></div>
                        <div class="price_box2"><a href="<?php echo route('projectList/{post}','low'); ?>">金額低い順</a></div>
                    </div>
                    <div class="right-box">
                        <div class="price_box3"><a href="<?php echo route('projectList/{post}','new'); ?>">最新の登録順</a></div>
                        <div class="price_box4"><a href="<?php echo route('projectList/{post}','deadline'); ?>">締め切りの順</a></div>
                    </div>
                </div>

                <div class="category-box-title">プロジェクトカテゴリ</div>

                <div id="pCategory">
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">ウェブ</label>
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">アプリ</label>

                </div>

                <div class="category-box-title">技術キーワード</div>

                <div id="keyword">
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">HTML5</label>
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">CSS</label>
                    <label><input type="checkbox" class="category_cb" name="category_chkbox"
                                  value="0">JavaScript</label>
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">Jquery</label>
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">Angular</label>
                    <label><input type="checkbox" class="category_cb" name="category_chkbox" value="0">React</label>
                </div>

                <?php /* <div class="category-box-title">金額の整列</div>
                 <div id="money">
                     <label style="width: 150px"><input type="checkbox" class="category_cb" name="category_chkbox" value="0">１０円以下</label>
                     <label style="width: 150px"><input type="checkbox" class="category_cb" name="category_chkbox" value="0">１０円～５０円</label>
                     <label style="width: 150px"><input type="checkbox" class="category_cb" name="category_chkbox" value="0">５０円～１００円</label>
                     <label style="width: 150px"><input type="checkbox" class="category_cb" name="category_chkbox" value="0">１００円～５００円</label>
                     <label style="width: 150px"><input type="checkbox" class="category_cb" name="category_chkbox" value="0">５００円以上</label>
                 </div>*/ ?>


                <script type="text/javascript">
                    $(document).ready(function () {

                        var category_arr = new Array();  //같은 이름의 배열 값 담고

                        $('#spinner').ajaxStart(function () {
                            $(this).fadeIn('fast');
                        }).ajaxStop(function () {
                            $(this).stop().fadeOut('fast');
                        });
                        for (var iCount = 0; iCount < 8; iCount++) {
                            category_arr[iCount] = 0;
                        }

                        var price_interval = $("#ex2").slider({});
                        var max_price = 0;
                        var min_price = 0;

                        $("#ex2").on('slideStart', function () {
                            console.log('slider start');
                        });

                        $("#ex2").on('slideStop', function () {
                            var temp_price = price_interval.slider('getValue');
                            min_price = temp_price[0];
                            max_price = temp_price[1];
                            category_arr[8] = min_price;
                            category_arr[9] = max_price;

                            console.log(category_arr);

                            $.ajax
                            ({
                                method: 'post',
                                headers: {
                                    'X-CSRF-Token': $('input[name="_token"]').val()
                                },
                                url: '<?php echo route('divisionlist'); ?>',
                                data: {'division': category_arr},
                                datatype: 'json'
                            }).success(function (data) {
                                $("#search_info").html(data);
                            }).error(function (data) {
                                        console.log(data);
                                    })
                                    .always(function () {
                                        $('#loadingWrap').hide();
                                    })
                        });

                        $("#ex2").on('change', function () {
                            var temp_price = price_interval.slider('getValue');
                            min_price = temp_price[0] * 1;
                            max_price = temp_price[1] * 1;

                            min_price = min_price.toLocaleString('ja-JP', {"style": "currency", "currency": "JPY"});
                            max_price = max_price.toLocaleString('ja-JP', {"style": "currency", "currency": "JPY"});

                            $("#price_min").html(min_price);
                            $("#price_max").html(max_price);
                        });


                        //selector된 요소에 대한 변경 이벤
                        $(".category_cb").change(function () {
                            category_arr = new Array();

                            //jquery 만약 selector이 선택되었다면..
                            if ($(this).is(":checked")) {
                                $(this).parent('label').css('box-shadow', '0px 0px 1px 2px Salmon');

                                $(this).val('1');  //기존의 0값 -> 1로 변경

                                //jquery each 돌면서 selector과 같은 값을 찾아냄
                                $(".category_cb").each(function (i) {
                                    category_arr.push($(this).val());
                                })
                            } else {

                                $(this).parent('label').css('box-shadow', 'none');

                                $(this).val('0'); //체크 해제시

                                $(".category_cb").each(function (i) {
                                    category_arr.push($(this).val());
                                })
                            }

                            var temp_price = price_interval.slider('getValue');
                            min_price = temp_price[0];
                            max_price = temp_price[1];


                            category_arr[category_arr.length] = min_price; //length 값 그대로 줌
                            category_arr[category_arr.length] = max_price;

                            console.log(category_arr);

                            $.ajax
                            ({
                                method: 'post',
                                headers: {
                                    'X-CSRF-Token': $('input[name="_token"]').val()
                                },
                                url: '<?php echo route('divisionlist'); ?>',
                                data: {'division': category_arr},
                                datatype: 'json'
                            }).success(function (data) {
                                        $("#search_info").html(data);

                                    }
                            ).error(function (data) {
                                console.log(data);

                            });
                        });
                    });
                </script>

                <div class="category-box-title">プロジェクト地域</div>

                <div class="left_side_menu_c">
                    <form id="area_custom-search-form" class="form-search_a form-horizontal pull-left "
                          action="<?php echo e(route('projectList')); ?>" method="get">

                        <div class="form-group-b">
                            <input type="text" name="area" list="area_list" placeholder="地域の選択可能">
                            <button type="submit" class="btn btn-default">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                            <datalist id="area_list">
                                <option value="ソウル">ソウル</option>
                                <option value="キョンギ">キョンギ</option>
                                <option value="インチョン">インチョン</option>
                                <option value="テジョン">テジョン</option>
                                <option value="テグ">テグ</option>
                                <option value="ウルサン">ウルサン</option>
                                <option value="プサン">プサン</option>
                                <option value="クァンジュ">クァンジュ</option>
                                <option value="カンウォンド">カンウォンド</option>
                                <option value="チェジュド">チェジュド</option>
                            </datalist>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--게시물이 출력되는 폼-->
        <div id="main">
            <div class="price_interval">
                <span style="font-size: 18px; text-align: center">プロジェクトの金額</span>
                <div class="interval" style="text-align: center">
                    <span id="price_min"><b class="price_min" style="margin-left:30px">¥0</b></span>
                    <input id="ex2" type="text" class="span2" value="" data-slider-min="0" data-slider-max="5000000"
                           data-slider-step="1" data-slider-value="[0,5000000]" data-slider-tooltip="hide"
                           style="margin-top: -20px;"/> <span id="price_max"><b
                                style="font-size: 20px; margin-left:10px;">¥5,000,000</b></span>
                </div>
            </div>

            <div id="search_info">
                <?php foreach($results as $result): ?>

                    <?php
                    //오늘
                    $now = Carbon\Carbon::now();

                    //DB에서 가져온 프로젝트 등록 일자
                    $today = $result->created_at;

                    //DB에서 가져온 프로젝트 등록일자를 날짜 포맷하여 형식 변경
                    $today_1 = Carbon\Carbon::parse($today)->format('Y-m-d');

                    //오늘에서 하루 더한 값
                    $today_add_1 = $now->addDays(1);

                    //DB에서 가져온 프로젝트 마감 일자
                    $expire_project_date = $result->pj_date;

                    //DB에서 가져온 프로젝트 마감일자를 날짜 포맷하여 형식 변경
                    $expire_project_date1 = Carbon\Carbon::parse($expire_project_date)->format('Y-m-d');

                    //마감일자에서 3일 남은 경우 마감기한 마크 표시를 위한 변수

                    $expire_project_date2 = Carbon\Carbon::parse($expire_project_date1)->diffInDays(Carbon\Carbon::parse($today_1));
                    ?>

                    <a class="mainList" href="<?php echo route('projectView/{pj_num}',$result->pj_num); ?>">

                        <?php if($result->st_num==4): ?>
                            <div class="a_div" style="text-align: center; background: lightgrey; opacity: 1">
                        <?php elseif($result->st_num==5): ?>
                            <div class="a_div" style="text-align: center; opacity:0.5">
                        <?php else: ?>
                            <div class="a_div" style="text-align: center">
                        <?php endif; ?>

                            <div class="div_1" style="text-align: left">
                                <div class="db_data_form"><?php echo e($result->pj_title); ?></div>
                                <div id="pj_edge">
                                    <?php if($result->st_num==1): ?>
                                        <div class="edge" style="background-color: green;">募集中</div>
                                        <?php if($result->created_at < $today_add_1): ?>
                                            <div class="edge" style="background-color: hotpink;">NEW</div>
                                        <?php endif; ?>
                                        <?php if($expire_project_date2 <= 3): ?>
                                            <div class="edge" style="background-color: red;">締切間近</div>
                                        <?php endif; ?>
                                    <?php elseif($result->st_num==4): ?>
                                        <div class="edge" style="background-color: darkslategrey;">募集終了</div>
                                    <?php elseif($result->st_num==5): ?>
                                        <div class="edge" style="background-color: darkgray;">完了</div>
                                    <?php endif; ?>
                                </div>
                                <?php /*<span class="div_pj_date">登録日&nbsp;:&nbsp;<?php echo Carbon\Carbon::parse($result->created_at)->format('Y-m-d h:i:s'); ?></span>*/ ?>
                            </div>

                            <div class="div_2" style="text-align: center">
                                <div class="div_2_a">
                                    <span>募集の締切日</span>
                                    <div class="circle"><?php echo Carbon\Carbon::parse($result->pj_date)->format('m/d'); ?></div>
                                </div>
                                <div class="div_2_a">
                                    <span>予想期間</span>
                                    <div class="circle"><?php echo $result->expect_date; ?>日</div>
                                </div>
                                <div class="div_2_a">
                                    <span>募集人員</span>
                                    <div class="circle"><?php echo $result->pj_people; ?>名</div>
                                </div>
                                <div class="div_2_a">
                                    <span>地  域</span>
                                    <div class="circle"><?php echo $result->pj_area; ?></div>
                                </div>
                            </div>

                            <div class="div_3"><?php echo $result->pj_content; ?></div>

                            <div class="div_4">
                                <span class="db_pj_price">予想金額 : <?=number_format($result->pj_price)?>円</span>
                                <span class="glyphicon glyphicon-pencil">要求技術</span>
                                <?php foreach($pj_tech as $row): ?>
                                    <?php if($result->pj_num == $row->pj_num ): ?>
                                        <span class="label label-default" style="margin-left: 10px">
                                    <?php echo $row->pj_skill; ?>

                                </span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                                <span class="db_pj_categoray">
                                <?php if($result->bc_num == 1): ?>
                                        ウェブ
                                    <?php elseif($result->bc_num ==2): ?>
                                        アプリ
                                <?php endif; ?>
                                    &nbsp;>&nbsp;<?php echo $result->sc_name; ?>

                                </span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
                <div class="pagenate">
                    <?php echo $results->render(); ?>

                </div>
            </div>
        </div>
    </div>

</div>

<?php /*프로젝트롤업*/ ?>
<script type="text/javascript">
    $('#box1').loopmovement({
        'direction': 'top',
        'speed': 20
    });
</script>

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

</body>

</html>


