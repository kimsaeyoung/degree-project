@include('layouts.link') @include('layouts.header')
<style>
    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: 'codropsicons';
    }
    
    .container {
        margin: 10px auto;
        padding: 10px;
        width: 1000px;
    }
    
    #dTitle{
        margin-bottom: 20px;
        width: 100%;
        height: auto;
        border: 0.5px solid lightgray;
        border-radius: 5px;
    }

    #dTitle * {
        display: inline-block;
    }

    #dTitle h1{
        margin: 0;
        padding: 5px 10px;
        display: block;
        width: 100%;
        font-size: 20px;
        border-radius: 5px 5px 0px 0px;
        background-color: lightblue;
        color: white;
    }

    #dTitle h5 {
        padding: 0px 10px;
    }

    #dTitle #btn_write {
        margin: auto 7px;
        margin-top: 5px;
        width: 97px;
        height: 26px;
        font-size: 14px; 
        line-height: 16px;
        color: black;
        background-color: transparent;
        box-shadow: 0px 0px 2px 1px lightblue;
    }
    
    #custom-search-form {
        margin:0;
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
        -webkit-transition: width  0.2s ease-in-out;
        -moz-transition:width  0.2s ease-in-out;
        -o-transition: width  0.2s ease-in-out;
        transition: width  0.2s ease-in-out;
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
    
    .left_side_menu{
        float: left;
        display: inline-block;
        width: 20%;
        text-align: center;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    
    .side_menu_title {
        margin:0 auto 0;
        padding: 5px 0;
        display: inline-block;
        text-align: center;
        width: 100%;
        font-size: 17px;
        background-color: lightblue;
    }

    .area_box, .sort_box {
        padding: 10px 0;
        width: 100%;
        height: auto;
    }
    
    .sort_box {
        padding: 10px;
    }
    
    .area_box label {
        position: relative;
        margin: 5px 5px;
        width: 80px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
    }
    
    .sort_box label {
        margin: 5px 0;
        position: relative;
        width: 100%;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
    }
    
    .chk_info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    .num_box {
        margin-right: 10px;
    }
    
    .num_box label {
        position: relative;
        margin-top: 3px;
        width: 120px;
        height: 24px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
        text-align: center;
    }
    
    .num_info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    #middle {
        display: inline-block;
        margin: 0;
        padding: 0 10px;
        margin-top: -10px;
        width: 80%;
    }
    
    .des_box_a {
        padding: 10px;
        width: 33.3%;
        height: 400px;
        display: inline-block;
        float: left;
    }
    
    .des_box_b {
        width: 100%;
        height: 100%;
        border: 1px solid lightgray;
        border-radius: 10px;
    }
    
    .des_inner_title {
        padding: 5px;   
        width: 100%;
        height: 10%;
        text-align: center;
        font-size: 20px;
        font-weight: 500;
        background-color: lightblue;
        border-radius: 10px 10px 0px 0px;
    }
    
    .des_inner_1 {
        position: relative;
        margin: 0 auto;
        width: 100%;
        height: 70%;
        list-style: none;
        padding: 20px;
    }
    
    .des_inner_2 {
        margin: 0;
        padding-top: 10px;
        border-top: 1px solid #D3D3D3;
        border-right: 1px solid #D3D3D3; 
        width: 50%; 
        height: 20%; 
        text-align: center; 
        float: left;
    }
    
    .des_inner_3 {
        margin: 0;
        padding-top: 12px;
        border-top: 1px solid #D3D3D3; 
        width: 50%; 
        height: 20%; 
        text-align: center; 
        float: left;
    }
    
    .des_inner_2 img, .des_inner_3 img {
        margin-bottom: 5px;
    }
    
    .des_inner_2 span, .des_inner_3 span {
        color: dodgerblue;
    }
    
    /*---------------*/
    /***** Bubba *****/
    /*---------------*/
    
    figure.effect-bubba {
        width: 100%;
        height: 100%;
        background: #9e5406;
        position: relative;
        float: left;
        overflow: hidden;
        text-align: center;
        cursor: pointer;
        border-radius: 10px;
    }
    
    figure.effect-bubba img {
        position: relative;
        display: block;
        width: 100%;
        height: 100%;
        opacity: 0.7;
        -webkit-transition: opacity 0.35s;
        transition: opacity 0.35s;
    }
    
    figure.effect-bubba:hover img {
        opacity: 0.4;
    }
    
    figure.effect-bubba figcaption,
    figure.effect-bubba figcaption > a {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    
    figure.effect-bubba figcaption {
        padding: 10px;
        color: #fff;
        text-transform: uppercase;
        font-size: 1.25em;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    
    figure.effect-bubba figcaption > a {
        z-index: 1000;
        text-indent: 200%;
        white-space: nowrap;
        font-size: 0;
        opacity: 0;
    }
    
    figure.effect-bubba figcaption::before,
    figure.effect-bubba figcaption::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        content: '';
        opacity: 0;
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
    }
    
    figure.effect-bubba figcaption::before {
        border-top: 1px solid #fff;
        border-bottom: 1px solid #fff;
        -webkit-transform: scale(0, 1);
        transform: scale(0, 1);
    }
    
    figure.effect-bubba figcaption::after {
        border-right: 1px solid #fff;
        border-left: 1px solid #fff;
        -webkit-transform: scale(1, 0);
        transform: scale(1, 0);
    }
    
    figure.effect-bubba p {
        font-size: 0.8em;
        padding: 10px;
        opacity: 0;
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(0, 20px, 0);
        transform: translate3d(0, 20px, 0);
    }
    
    figure.effect-bubba:hover figcaption::before,
    figure.effect-bubba:hover figcaption::after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
    
    figure.effect-bubba:hover h2,
    figure.effect-bubba:hover p {
        opacity: 1;
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }
    
    #page_num {
        text-align: center;
    }

</style>
<script type="text/javascript">
    $(document).ready(function() {

        //selector된 요소에 대한 변경 이벤트
        $(".chk_info, .num_info").change(function() {
            //같은 이름의 배열 값 담고

            var category_arr = [];
            var number_arr = [];

            //jquery 만약 selector이 선택되었다면..
            if ($(this).is(":checked")) {

                $(this).parent('label').css('box-shadow', '0px 0px 1px 2px Salmon');

                $(this).val($(this).attr('id')); //기존의 0값 -> 1로 변경

                //jquery each 돌면서 selector과 같은 값을 찾아냄
                $(".chk_info").each(function(i) {
                    category_arr.push($(this).val());
                });

                $(".num_info").each(function(i) {
                    number_arr.push($(this).val());
                });
            } else {
                $(this).val(""); //체크 해제시

                $(this).parent('label').css('box-shadow', 'none');

                $(".chk_info").each(function(i) {
                    category_arr.push($(this).val());
                });

                $(".num_info").each(function(i) {
                    number_arr.push($(this).val());
                });
            }

            $.ajax({
                url: '/designer/division',
                data: {
                    'division': category_arr,
                    'number': number_arr
                },
                dataType: 'json',
                type: 'post',
                success: function(data) {
                    $('h5 span').text(data['count']);
                    $('.des_box_a').remove();
                    $('#num').remove();
                    for (var i = 0; i < data['data'].length; i++) {
                        $('#middle').append(data['data'][i]);
                    }
                },
                error: function(data) {
                    window.alert('실패');
                }
            });
        });
    });
</script>
<div class="container">
    
    <div id="dTitle">
       
        <h1>任数</h1>
        <h5>現在 <span>{{$count}}</span>名のデザイナーが登録されています。</h5>

        <form id="custom-search-form" class="form-search form-horizontal pull-right" action="/designer/search" method="post">
            <div class="input-append spancustom">
                <input type="text" class="search-query" name="m_name" placeholder="Search..">
                <button type="submit" class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </form>

    </div>
    
    <div class="left_side_menu">

        <div class="side_menu_title">プロジェクト整列</div>

        <div class="sort_box">
            <label><input class="num_info" id="project" type="checkbox" value="" name="number">プロジェクト個数の高い</label>
            <label><input class="num_info" id="portfolio" type="checkbox" value="" name="number">ポートフォリオ個数の高い</label>
        </div>

        <div class="side_menu_title">地域</div>

        <div class="area_box">
            <label>
                <input class="chk_info" id="ソウル" type="checkbox" name="chk_info" value="">ソウル</label>
            <label>
                <input class="chk_info" id="キョンギ" type="checkbox" name="chk_info" value="">キョンギ</label>
            <label>
                <input class="chk_info" id="インチョン" type="checkbox" name="chk_info" value="">インチョン</label>
            <label>
                <input class="chk_info" id="テジョン" type="checkbox" name="chk_info" value="">テジョン</label>
            <label>
                <input class="chk_info" id="テグ" type="checkbox" name="chk_info" value="">テグ<</label>
            <label>
                <input class="chk_info" id="ウルサン" type="checkbox" name="chk_info" value="">ウルサン</label>
            <label>
                <input class="chk_info" id="ブサン" type="checkbox" name="chk_info" value="">ブサン</label>
            <label>
                <input class="chk_info" id="クァンジュ" type="checkbox" name="chk_info" value="">クァンジュ</label>
            <label>
                <input class="chk_info" id="チェジュ" type="checkbox" name="chk_info" value="">チェジュ</label>
            <label>
                <input class="chk_info" id="カンウォン" type="checkbox" name="chk_info" value="">カンウォン</label>
            <label>
                <input class="chk_info" id="チョンブク" type="checkbox" name="chk_info" value="">チョンブク</label>
            <label>
                <input class="chk_info" id="ジョンナム" type="checkbox" name="chk_info" value="">ジョンナム</label>
            <label>
                <input class="chk_info" id="キョンブク" type="checkbox" name="chk_info" value="">キョンブク</label>
            <label>
                <input class="chk_info" id="キョンナム" type="checkbox" name="chk_info" value="">キョンナム</label>
        </div>
    </div>

    <div id="middle">
        @foreach($m_list as $row)
        <div class="des_box_a">
            <div class="des_box_b">
                   
                <div class="des_inner_title">{{$row->m_name}}</div>

                <div class="des_inner_1">
                    <figure class="effect-bubba">
                        @if($row->m_face != null)
                        <img src="{{asset('img/member_face/'.$row->m_face)}}"> @else
                        <img src="{{asset('img/member_face/no_face.jpg')}}"> @endif
                        <figcaption>
                            <p>{{$row->ds_info}}</p>
                            <a href="/designer/{{$row->m_num}}" style="border-radius: 20px"></a>
                        </figcaption>
                    </figure>
                </div>

                <p class="des_inner_2">
                    <a href="/designer/portfolio2/{{$row->m_num}}">
                        <img src="{{ asset('img/project.png') }}"><br>
                        <span>PORTFOLIO : @if($row->pj_count==null) 0 @else {{$row->pj_count}} @endif</span>
                    </a>
                </p>

                <p class="des_inner_3">
                    <a href="/designer/career/{{$row->m_num}}">
                        <img src="{{ asset('img/money.png') }}"><br>
                        <span>取引件数 : @if($row->pt_count == null) 0 @else {{$row->pt_count}} @endif</span>
                    </a>
                </p>
            </div>
        </div>
        @endforeach
    </div>
    
    <div id="page_num">
        @if($m_name)
        <div id="num">
            {{$m_list->appends(['m_name' => $m_name])->render()}}
        </div>
        @else
        <div id="num">
            {{$m_list->links()}}
        </div>
        @endif
    </div>
    
</div>