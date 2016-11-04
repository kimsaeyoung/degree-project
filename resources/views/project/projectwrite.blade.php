<!DOCTYPE html>
<head>
    @include('layouts.link')

</head>

<body>
    @include('layouts.header')
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpN_JXSjsmYGfRTBmQLWkjz-F_XA3OrDo&libraries=places"></script>

    <link href="{{ asset('css/jquery.multiselect.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.multiselect.js') }}"></script>

    <style>
        
        .container {
            margin: 10px auto;
            padding: 10px;
            width: 1000px;
            table-layout: fixed;

        }

        #reg_con {
            padding: 0;
            margin: 0 auto;
            margin-bottom: 30px;
            width: 99%;
            height: auto;
            border: 1px solid lightgray;
            border-radius: 10px;
        }
        
        #reg_title {
            width: 100%;
            padding: 10px;
            font-size: 25px;
            border-bottom: 1px solid white;
            border-radius: 10px 10px 0px 0px;
            background-color: lightblue;
        }
        
        #reg_form_table {
            width: 100%;
            border: none;
            table-layout: fixed;

        }
        
        #reg_form_table tr {
            border-bottom: 1px solid white;
        }
        
        #reg_form_table tr:nth-last-child(1) {
            border: none;
        }
        
        #reg_form_table th {
            padding: 10px;
            font-size: 15px;
            font-weight: normal;
            text-align: center;
            background-color: lightblue;
            width: 25%;
        }
        
        #reg_form_table tr:nth-child(10) td, #reg_form_table tr:nth-child(11) td {
            padding: 20px;
        }
        
        #reg_form_table tr:nth-child(9) td {
            padding-left: 20px;
        }
        
        #reg_form_table tr:nth-child(9) #tech_skill label {
            !important;
            position: relative;
            margin: 5px 5px;
            width: 80px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            border: 0.5px solid lightblue;
            border-radius: 5px;
        }
        
        #reg_form_table .reg_tech_chb {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }
        
        #reg_content {
            display: block;
            margin: 0 auto;
            resize: none;
            padding: 10px;
            width: 100%;
            height: 500px;
            border: 1px solid lightgray;
        }
        
        #map-canvas{
            margin-top: 5px;
            margin-bottom: -15px;
            border: 1px solid lightgray;
            border-radius: 5px;
            width: 100%;
            height: 250px;
        }
        
        #reg_form_table td {
            border-top: 1px solid lightgray;
        }
    </style>

    <div class="container">
    <div id="reg_con">
       
        <div id="reg_title">プロジェクト登録</div>

        <form method="post" action="{{route('projectregister')}}" enctype="multipart/form-data" accept-charset="utf-8">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            {{--게시물 등록 시간--}}
            <input type="hidden" name="created_at" value="{!! \Carbon\Carbon::now() !!}">

            {{--계약상태 5단계 임을 나타냄--}}
            <input type="hidden" name="st_num" value="1">

            {{--프로젝트 등록시 m_num를 구분--}}
            <input type="hidden" name="m_num" value="{!!Session::get('m_num')!!}">

            <table id="reg_form_table">
                <tr>
                    <th>大分類のカテゴリ</th>
                    <td>
                        <input type="text" name="big_num" list="bic_category" style="margin-left: 20px">
                        <datalist id="bic_category">
                            <option value="ウェブ">ウェブ</option>
                            <option value="アプリ">アプリ</option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <th>小分類のカテゴリ</th>
                    <td>
                        <input type="text" name="sc_num" list="small_category" style="margin-left: 20px">
                        <datalist id="small_category">
                            <option value="開発">開発</option>
                            <option value="ウェブデザイン">デザイン</option>
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <th>プロジェクトのタイトル</th>
                    <td>
                        <input type="text" class="pro_title" name="project_title" size="30" style="margin-left: 20px">
                    </td>
                </tr>
                <tr>
                    <th>募集の締め切りの日</th>
                    <td>
                        <input type="date" name="project_date" min="2016-05-01" max="2026-12-31" step=1 value="" style="margin-left: 20px;">
                    </td>

                </tr>
                <tr>
                    <th>募集の人員</th>
                    <td>
                        <input type="text" class="pj_people" name="pj_people" size="3" style="margin-left: 20px">名
                    </td>
                </tr>
                <tr>
                    <th>予想の金額</th>
                    <td>
                        <input name="mypay" type="text" style="text-align:right; margin-left: 20px">円
                    </td>
                </tr>
                <tr>
                    <th>予想の期間</th>
                    <td>
                        <input name="expect_date" type="text" style="text-align:right; margin-left: 20px">日
                    </td>
                </tr>
                <tr>
                    <th>地   　　域</th>
                    <td>
                        <input type="text" name="area" list="area_list" style="margin-left: 20px">
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
                    </td>
                </tr>
                <tr>
                    <th>スマート推薦</th>
                    <td>

                    <input type="checkbox" id="matching_chkbox" value="yes" onclick="div_show(this.value,'divshow');">はい

                        <div id="divshow" style="display: none; ">

                            <div class="smart_matching" style="border: 3px darkred solid; width:600px; height: 100px">
                                <h3 style="color:darkred; margin-top: -2px;">スマート推薦サービスは</h3>
                                <h5 style="margin-top: 2px">開発者がデザイナーを探す時、技術キーワードやプロジェクトの経験や平均金額を選択したら</h5>
                                <h5>この選択した情報にあうデザイナーを推薦するサービス</h5>
                            </div>

                            <div id="tech_skill">
                                <label><input class="reg_tech_chb" type="checkbox" name=tech[] value="HTML5">HTML5</label>
                                <label><input class="reg_tech_chb" type="checkbox" name=tech[] value="CSS">CSS</label>
                                <label><input class="reg_tech_chb" type="checkbox" name=tech[] value="JavaScript">JavaScript</label>
                                <label><input class="reg_tech_chb" type="checkbox" name=tech[] value="Jquery">Jquery</label>
                                <label><input class="reg_tech_chb" type="checkbox" name=tech[] value="Angular">Angular</label>
                                <label><input class="reg_tech_chb" type="checkbox" name=tech[] value="React">React</label>
                            </div>

                            <p><h3></h3>

                            <select name="basicOptgroup[]" multiple="multiple">

                                <optgroup label="プロジェクトの進行経験">
                                    <option value="yes">必要</option>
                                    <option value="no">無関係</option>
                                </optgroup>

                                <!--value를 5가지 케이스로 나눔-->
                                <optgroup label="平均金額">
                                    <option value="money_1">~100,000円</option>
                                    <option value="money_2">100,000円~500,000円</option>
                                    <option value="money_3">500,000円~1,000,000円</option>
                                    <option value="money_4">1,000,000円~5,000,000円</option>
                                    <option value="money_5">5,000,000円~</option>
                                </optgroup>
                            </select>
                            <p></p>

                            <script>
                                $('select[multiple]').multiselect({
                                    // text to use in dummy input
                                    placeholder   : '項目を洗濯してください。',

                                    // how many columns should be use to show options
                                    columns       : 3,

                                    // include option search box
                                    search        : false,

                                    // search filter options
                                    searchOptions : {
                                        default      : 'Search', // search input placeholder text
                                        showOptGroups: false     // show option group titles if no options remaining
                                    },

                                    // add select all option
                                    selectAll     : false,

                                    // select entire optgroup
                                    selectGroup   : false,

                                    // minimum height of option overlay
                                    minHeight     : 200,

                                    // maximum height of option overlay
                                    maxHeight     : null,

                                    // display the checkbox to the user
                                    showCheckbox  : true,

                                    // options for jquery.actual
                                    jqActualOpts  : {},

                                    // maximum width of option overlay (or selector)
                                    maxWidth      : null,

                                    // minimum number of items that can be selected
                                    minSelect     : false,

                                    // maximum number of items that can be selected
                                    maxSelect     : false

                                });
                            </script>

                            <script>
                            function div_show(s,ss) {


                                $("#matching_chkbox").change(function () {

                                    document.getElementById(ss).style.display = "";

                                    if ($("#matching_chkbox").is(":checked")) {
                                        //alert("체크박스 체크했음!");
                                        if (s == "yes") {
                                            document.getElementById(ss).style.display = "";
                                        }
                                    } else {
                                        //alert("체크박스 체크 해제!");
                                        document.getElementById(ss).style.display="none";

                                    }
                                });
                            }
                        </script>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>プロジェクトの内容</th>
                    <td id="reg_content_td">
                        <textarea id="reg_content" name="project_content">
1.プロジェクトのタイトル :

2.現在の開発の進行状況
1)

3.担当の業務
1)

4.業務の範囲:

5.伝達事項又は(開発)優待事項:
1)

6.必要人員:名

7.開発者が必要される技術
1)
2)

8.勤務地.:

9.開発の期間:

10.装備持参するかどうか

                        </textarea>
                    </td>
                </tr>
                
                <tr>
                    <th>会社の位置</th>
                    <td id="reg_map_td">
                        {{Form::open(array('url'=>'projectList','files'=>true))}}
                        <div class="form-group">
                            <label for="searchmap">住所の検索&nbsp;</label>
                            <input type="text" id="searchmap" style="width: 50%">
                            <div id="map-canvas"></div>
                            <input type="hidden" class="form-control input-sm" name="lat" id="lat">
                            <input type="hidden" class="form-control input-sm" name="lng" id="lng">
                        </div>
                        {{Form::close()}}
                    </td>
                </tr>
                <tr>
                    <th>添付のファイル</th>
                    <td>
                        <div class="form-group">
                            {!! Form::file('image',null)!!}
                            <input type="hidden" name="thumbnail" value=""/>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center" style="padding: 20px;">
                        <input type="submit" class="btn btn-default" value="登録">
                        <a href="/projectList" class="btn btn-danger" style="margin-left: 20px;">キャンセル</a>
                    </td>
                </tr>
            </table>   
        </form>
    
    </div>
    </div>
    
    <script>
        var map = new google.maps.Map(document.getElementById('map-canvas'),{
            center:{
                lat:35.6895,
                lng:139.69171
            },
            zoom:16
        });

        var marker = new google.maps.Marker({
            position:{
                lat:35.6895,
                lng:139.69171
            },
            map:map,
            draggable:true
        });

        var searchBox = new google.maps.places.SearchBox(document.getElementById('searchmap'));

        google.maps.event.addListener(searchBox,'places_changed',function(){

            var places = searchBox.getPlaces();
            var bounds = new google.maps.LatLngBounds();
            var i, place;

            for(i=0; place=places[i]; i++){
                bounds.extend(place.geometry.location);
                marker.setPosition(place.geometry.location);
            }
            map.fitBounds(bounds);
            map.setZoom(15);
        });

        google.maps.event.addListener(marker,'position_changed',function(){

            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

            $('#lat').val(lat);
            $('#lng').val(lng);
        });
        
        $(function() {
            $('.reg_tech_chb').on('click', function() {
                if($(this).is(":checked")) {
                    $(this).parent('label').css('box-shadow', '0px 0px 1px 2px Salmon');
                } else {
                    $(this).parent('label').css('box-shadow', 'none');
                }
            });
        });

    </script>


</body>
