<!DOCTYPE html>

<html>

<head>
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpN_JXSjsmYGfRTBmQLWkjz-F_XA3OrDo&libraries=places"
                        type="text/javascript"></script>
</head>

<body bgproperties="fixed" oncontextmenu="return false" ondragstart="return false" onselectstart="return false">
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>

    function sendMessage() {

        var currentPage = document.location.href;

        currentPage = currentPage.slice(7);
        var arr = currentPage.split("/");
        
        console.log(arr);

        $.ajax({

            url: '/Message/get_development/' + arr[2],
            type : 'get',

            success:function(data) {
                window.open('/message/'+data, 'sender', 'width=500, height=500, scrollbars=0, resizable=0');
                //sender : 새창이름
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        })
    };
    
</script>

    <style>
        
        html, body, #map-canvas  {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        #map-canvas {
            width:100%;
            height:480px;
            border-radius: 5px;
        }
        
        .container {
            margin: 10px auto;
            padding: 10px;
            width: 1000px;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        a:active {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }
        
        .modal-header {
            border-radius: 6px 6px 0px 0px;
            background-color: lightblue;
        }
        
        #wrapper {
            position: relative;
            margin:0 auto;
            width: 99%;
            text-align:center;
            border:1px solid lightgray;
            border-radius: 10px;
            height:auto;
            margin-bottom: 50px;
        }
        
        #pj_title {
            padding: 10px 10px;
            border-bottom: 1px solid lightgray;
            border-radius: 10px 10px 0 0;
            text-align: left;
            background-color: lightblue;
        }
        
        #pj_title h1 {
            margin: 0;
        }
        
        #pj_title span {
            font-size: 15px;
            color: gray;
        }
        
        #info_container {
            width: 100%;
            height: 300px;
            border: none;
        }
        
        #pj_info {
            display: inline-block;
            width: 70%;
            height: 100%;
        }
        
        #pj_info div {
            font-size:20px;
            text-align:left;
            width: 100%;
            height: 50px;
            border-bottom: 1px solid lightgray;
        }
        
        #pj_info div span {
            vertical-align: middle;
            height: 100%;
            line-height: 40px;
            padding-left: 10px;
            top: 0;
        }
        
        #pj_info div span:nth-child(1) {
            background-color: lightblue;
            width: 40%;
        }
        
        #pj_company_info {
            padding: 10px;
            border-left: 1px solid lightgray;
            float: right;
            width: 30%;
            height: 100%;
        }
        
        #pj_company_info #pj_company_logo {
            margin: 10px 0px;
        }
        
        #pj_company_info #pj_company_btn {
            margin-top: 30px;
        }
        
        #pj_explain {
            width: 100%;
            height: auto;
        }
        
        .pj_subject {
            /*font-family: 'testFont';*/
            background-color: lightblue;
            text-align: left;
            width: 100%;
            padding: 10px;
            font-size: 20px;
        }
        
        #pj_explain #pj_explain_con {
            padding: 0;
            border: none;
            border-radius: 0px;
            width: 100%;
            height: auto;
            margin-bottom: -2px;
        }
        
        #pj_explain #pj_content {
            display: block;
            padding: 20px;
            margin-top: -16px;
            margin-bottom: -35px;
            resize:none;
            line-height:150%;
            width:100%;
            overflow-y:hidden;
            height:30px;
            font-size: 15px;
            border:none;
        }
        
        #pj_matching {
            width: 100%;

        }
        
        #pj_matching .pj_subject span {
            font-size: 15px;
            color: darkred;
            float: right;
            margin-top: 15px;
        }
        
        #pj_matching #pj_matching_con {
            padding: 10px;
            width: 100%;
            height: auto;
            text-align: left;
            border : 5px solid darkred;
        }
        #pj_request {
            width: 100%;
            text-align: left;
        }
        
        #pj_request .pj_req_con {
            padding: 10px;
            width: 100%;
            height: auto;
            text-align: left;
        }

        
        #pj_inquiry {
            padding: 20px;
            width: 100%;
            border-top: 1px solid lightgray;
            text-align: center;
        }
        
        #pj_inquiry button {
            margin: 0px 10px;
            top: 0;
        }
        
        .memberInfo {
            position: relative;
            display: inline-block;
            width:231px;
            height:280px;
            border: 1px solid lightgray;
            border-radius: 5px;
            margin: 5px;
        }
        .memberInfo figure {
            margin:0;
            padding:0;
            width: 100%;
            height: 100%;
            position:relative;
            cursor:pointer;
        }
        .memberInfo figure img {
            display:block;
            position:relative;
            width: 100%;
            height: 100%;
            z-index:10;
            border-radius: 5px;
        }
        .memberInfo figure figcaption {
            display:block;
            position:absolute;
            border-radius: 5px;
            z-index:5;
            -webkit-box-sizing:border-box;
            -moz-box-sizing:border-box;
            box-sizing:border-box
        }
        .memberInfo figure h2 {
            font-family:'Lato';
            color: black;
            font-size:20px;
            text-align:left
        }
        .memberInfo figure p {
            display:block;
            font-family:'Lato';
            font-size:12px;
            line-height:18px;
            margin:0;
            color: black;
            text-align:left
        }
        .memberInfo figure figcaption {
            top:0;
            left:0;
            width:100%;
            height:100%;
            padding: 10px 20px;
            background-color: lightblue;
            text-align:center;
            backface-visibility:hidden;
            -webkit-transform:rotateY(-180deg);
            -moz-transform:rotateY(-180deg);
            transform:rotateY(-180deg);
            -webkit-transition:all .5s;
            -moz-transition:all .5s;
            transition:all .5s
        }
        .memberInfo figure img {
            backface-visibility:hidden;
            -webkit-transition:all .5s;
            -moz-transition:all .5s;
            transition:all .5s
        }
        .memberInfo figure:hover img,figure.hover img {
            -webkit-transform:rotateY(180deg);
            -moz-transform:rotateY(180deg);
            transform:rotateY(180deg)
        }
        .memberInfo figure:hover figcaption,figure.hover figcaption {
            -webkit-transform:rotateY(0);
            -moz-transform:rotateY(0);
            transform:rotateY(0)
        }
        #contractWriteTable {
            font-size: 18px;
            width: 100%;
            border: 1px solid lightgray;
            border-radius: 5px;
        }
        #contractWriteTable * {
            padding: 5px;
        }
        #contractWriteTable .col-md-3 {
            padding-top: 10px;
            text-align: center;
        }
        #contractWriteTable .col-md-7 input {
            border: 1px solid lightgray;
            border-radius: 5px;
        }
        input[name=devel_name], input[name=design_name], input[name=pj_title] {
            width: 100%;
            border: none !important;
        }
        input[name=tmp_money] {
            width: 90%;
            padding: 0px 3px;
            text-align: right;
        }
        input[name=tmp_start_date], input[name=tmp_end_date] {
            font-size: 15px;
            width: 46%;
        }
        textarea[name=tmp_content] {
            padding: 10px;
            border: 1px solid lightgray;
            border-radius: 5px;
            resize: none;
        }
    </style>
    
    <?php if(!Session::has('m_num')): ?>
     <script>
         window.alert('ログインした後サービスを利用することができます。');
     </script>
     <?php echo \Illuminate\Support\Facades\Redirect::route('projectList/nologin'); ?>

     <?php else: ?>
     
     
    <!-- Contract Write Modal -->
    <div class="modal fade" id="contractWriteModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content for contract 계약 모달창-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Contract Write</h4>
                </div>
                <form action="/contractInsert" method="post">
                    <div class="modal-body" style="padding: 30px">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <input type="hidden" name="pj_num" value="">
                        <input type="hidden" name="design_num" value="">
                        <div id="contractWriteTable">
                            <div class="row">
                                <div class="col-md-3">開発者</div>
                                <div class="col-md-7"><input type="text" name="devel_name" value="" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">デザイナー</div>
                                <div class="col-md-7"><input type="text" name="design_name" value="" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">プロジェクト</div>
                                <div class="col-md-7"><input type="text" name="pj_title" value="" readonly></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">進行期間</div>
                                <div class="col-md-7"><input type="text" name="tmp_start_date" value="" data-date-format="YYYY-MM-DD">&nbsp;~&nbsp;<input type="text" name="tmp_end_date" value="" data-date-format="YYYY-MM-DD"></div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">契約金額</div>
                                <div class="col-md-7"><input type="text" name="tmp_money" value="" onchange="getNumber(this);" onkeyup="getNumber(this);">&nbsp;円</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">プロジェクトの内容</div>
                                <div class="col-md-7"><textarea name="tmp_content" id="" cols="40" rows="10"></textarea></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">クローズ</button>
                            <button type="submit" class="btn btn-info">契約</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
     
    <div class="container">
    <div id="wrapper">
        <!--프로젝트 자세히 보기 뷰에서 글 정보 폼-->
        <div id="pj_title">
            <h1>
               <?php echo $pj_view->pj_title; ?>

                <span>
                    <?php if($pj_view->bc_num== 1): ?>
                        ウェブ
                    <?php elseif($pj_view->bc_num ==2): ?>
                        アプリ
                    <?php endif; ?><?php echo '>'; ?><?php echo $pj_view->sc_name; ?>

                </span>
            </h1>
        </div>
        
        <div id="info_container">
            <div id="pj_info">
                <div>
                    <span class="glyphicon glyphicon-time">&nbsp;プロジェクトの予想期間</span>
                    <span>~<?php echo $pj_view->expect_date; ?>日</span>
                </div>
                <div>
                    <span class="glyphicon glyphicon-hourglass">&nbsp;登録の締切日</span>
                    <span><?php echo Carbon\Carbon::parse($pj_view->pj_date)->format('Y-m-d'); ?></span>
                </div>
                <div>
                    <span class="glyphicon glyphicon-yen">&nbsp;金額</span>
                    <span><?=number_format($pj_view->pj_price)?>円</span>
                </div>
                <div>
                    <span class="glyphicon glyphicon-user">&nbsp;募集の人員</span>
                    <span><?php echo $pj_view->pj_people; ?>名</span>
                </div>
                <div>
                    <span class="glyphicon glyphicon-home">&nbsp;会社の位置</span>
                    <span><?php echo $pj_view->pj_area; ?></span>
                </div>
                <div>
                    <span class="glyphicon glyphicon-ok">&nbsp;添付のパイル</span>
                    <?php if(!'<?php echo $pj_view->pj_file; ?>'): ?>
                    <span>ファイルなし</span>
                    <?php endif; ?>
                    <a class="glyphicon glyphicon-download" href="<?php echo route('projectView/{id}download',$pj_view->pj_file); ?>" download="../storage/public/img/<?php echo $pj_view->pj_file; ?>"><?php echo $pj_view->pj_file; ?></a>
                </div>      
            </div>

            <!--지원하기 버튼 누를시, modal창으로 post값으로 보내는 것-->
            <div id="pj_company_info">
            <script>
                function pj_volunterr(){
                    $.ajax({
                        //라라벨에서는 token를 같이 보내줘야함 post
                        headers:
                        {
                            'X-CSRF-Token': $('input[name="_token"]').val()
                        },
                        url:'<?php echo route('projectvolunteer'); ?>',
                        data:{
                            'volunteer':'yes',
                            'num' : '<?php echo $pj_view->pj_num; ?>',
                            'm_num':'<?php echo e($pj_view->m_num); ?>'
                        },
                        dataType:'json',　//어떤형식으로 응답 받을 건가
                        type:'post',
                        success:function(data)
                        {
                            location.reload(true);
                        },
                        error:function(data)
                        {
                            window.alert('error');
                        }
                    })
                }
            </script>

                <!--support Modal 프로젝트 지원 모달-->
                <div id="supportModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">申請</h4>
                            </div>
                            <div class="modal-body">
                                <p>このプロジェクトに申請しますか?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">クローズ</button>
                                <button type="button" class="btn btn btn-info" onclick="pj_volunterr()" data-dismiss="modal">申請</button>
                            </div>
                        </div>

                    </div>
                </div>

                <!--프로젝트 자세히 보기 뷰에서 사이드 정보 폼-->
                <!--개발사 일 경우 사진 띄우기-->
                <div id='pj_company_logo'>
                    <img src="<?php if($company_info[0]->m_face): ?> <?php echo e(asset('img/member_face/'.$company_info[0]->m_face)); ?> <?php else: ?> <?php echo e(asset('img/member_face/no_company_face.png')); ?> <?php endif; ?>" class="img-circle" alt="user_image" width="210" height="195">
                </div>

                <div id="pj_company_btn">
                    <?php if(Session::get('div_member')==1): ?>
                    <div class="btn btn-info" id="side_contents_btn" data-toggle="modal" data-target="#supportModal">申請する</div>
                    <?php endif; ?>
                    <a id="message" class="btn btn-default" style="font-size: 11px" onclick="showMessage()">メッセージ</a>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#company_Modal">会社の情報</button>
                </div>
            </div>
            
        </div>

        <!-- 프로젝트 설명 부분 -->
        <div id="pj_explain">
            <div class="pj_subject">プロジェクトの説明</div>
            <pre id="pj_explain_con">
                <textarea id="pj_content" readonly><?php echo $pj_view->pj_content; ?></textarea>
            </pre>
        </div>

        <!-- 프로젝트 스마트 매칭 -->
        <?php if(Session::get('m_num')==$pj_view->m_num): ?>
        <div id="pj_matching">
            <div class="pj_subject">
                スマート推薦
                <span>*このプロジェクトと合うデザイナーは総~人です</span>
            </div>
        <?php if($matching): ?>
            <div id="pj_matching_con">
                <?php foreach($matching as $index): ?>
                <div class="memberInfo">
                    <figure>
                        <img src="<?php if($index->m_face): ?> <?php echo e(asset('img/member_face/'.$index->m_face)); ?> <?php else: ?> <?php echo e(asset('img/member_face/no_face.jpg')); ?> <?php endif; ?>" alt=""/>
                        <figcaption>
                            <h2><?php echo e($index->m_name); ?></h2>
                            <p>
                                携帯番号<br>
                                &nbsp;&nbsp;<?php echo e($index->m_phone); ?><br>
                                メール<br>
                                &nbsp;&nbsp;<?php echo e($index->m_email); ?><br>
                                地域<br>
                                &nbsp;&nbsp;<?php echo e($index->m_area); ?><br>
                            </p>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <a class="btn btn-info btn-sm" href="/designer/<?php echo e($index->m_num); ?>">ポートログ</a>
                                <a class="btn btn-info btn-sm" onclick="contractWrite(<?php echo e($pj_view->pj_num); ?> , <?php echo e($index->m_num); ?>)">契約する</a>

                        </figcaption>
                    </figure>
                </div> 
                <?php endforeach; ?>
            </div>
            <?php else: ?>
            <div class="no_smart_matching" >
                <img src ="<?php echo e(asset('/img/member_face/smart_matching_no_data.jpg')); ?> " style="width: 250px">
            </div>
        <?php endif; ?>
        </div>

        <!--프로젝트 참여신청자 부분-->
        <div id="pj_request">
            <div class="pj_subject">プロジェクトの参加申請者</div>
            <div class="pj_req_con">
                <?php foreach($supports as $index): ?>
                <div class="memberInfo">
                    <figure>
                        <img src="<?php if($index->m_face): ?> <?php echo e(asset('img/member_face/'.$index->m_face)); ?> <?php else: ?> <?php echo e(asset('img/member_face/no_face.jpg')); ?> <?php endif; ?>" alt=""/>
                        <figcaption>
                            <h2><?php echo e($index->m_name); ?></h2>
                            <p>
                                携帯番号<br>
                                &nbsp;&nbsp;<?php echo e($index->m_phone); ?><br>
                                メール<br>
                                &nbsp;&nbsp;<?php echo e($index->m_email); ?><br>
                                地域<br>
                                &nbsp;&nbsp;<?php echo e($index->m_area); ?>

                            </p>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <a class="btn btn-info btn-sm" href="/designer/<?php echo e($index->m_num); ?>">ポートログ</a>
                            <a class="btn btn-info btn-sm" onclick="contractWrite(<?php echo e($pj_view->pj_num); ?> , <?php echo e($index->m_num); ?>)">契約する</a>
                        </figcaption>
                    </figure>
                </div> 
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <div id="pj_inquiry">
            <button type="button" class="btn btn-default btn-lg" onclick="window.location='<?php echo route('projectList'); ?>'"> リスト</button>
            <button class="btn btn-default btn-lg" data-toggle="modal">お問い合わせ</button>
        </div>
        
    </div>
    </div>
    <?php endif; ?>

    <!--company information modal-->
    <div class="modal fade" id="company_Modal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">会社の情報</h4>
                </div>
                <div class="modal-body">
                    <div id="map-canvas"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">クローズ</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">

        //[] <--문자 범위 [^] <--부정 [0-9] <-- 숫자
        //[0-9] => \d , [^0-9] => \D
        var rgx1 = /\D/g;  // /[^0-9]/g 와 같은 표현
        var rgx2 = /(\d+)(\d{3})/;

        cmaTextareaSize('pj_content', 150);

        function getNumber(obj){

             var num01;
             var num02;
             num01 = obj.value;
             num02 = num01.replace(rgx1,"");
             num01 = setComma(num02);
             obj.value =  num01;

        }

    function setComma(inNum){

         var outNum;
         outNum = inNum; 
         while (rgx2.test(outNum)) {
              outNum = outNum.replace(rgx2, '$1' + ',' + '$2');
          }
         return outNum;

    }       
    
    $('input[name=tmp_start_date]').datetimepicker();
    $('input[name=tmp_end_date]').datetimepicker({
        useCurrent: false //Important! See issue #1075
    });
    $("input[name=tmp_start_date]").on("dp.change", function (e) {
        $('input[name=tmp_end_date]').data("DateTimePicker").minDate(e.date);
    });
    $("input[name=tmp_end_date]").on("dp.change", function (e) {
        $('input[name=tmp_start_date]').data("DateTimePicker").maxDate(e.date);
    });
    
    function contractWrite($pj_num, $m_num) {
        
        $.ajax({

            //laravel 은 X-CSRF-Token을 이용해 post를..
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: "POST",
            url: '/contractWrite',
            data: { 'pj_num' : $pj_num, 'm_num' : $m_num },
            dataType : "json",
            success: function(data){
                
                var $data = data[0];
                
                $('input[name=pj_num]').val($data.pj_num);
                $('input[name=design_num]').val($data.design_num);
                $('input[name=devel_name]').val($data.devel_name);
                $('input[name=design_name]').val($data.design_name);
                $('input[name=pj_title]').val($data.pj_title);
                
                console.log($data);
            },
            error: function(xhr, status, error) {
                console.log(xhr);
            }

        });
        
        $('#contractWriteModal').modal();
    }

    function initialize() {
        var mapLocation = new google.maps.LatLng('<?php echo $pj_view->company_lat; ?>','<?php echo $pj_view->company_lng; ?>'); // 지도에서 가운데로 위치할 위도와 경도
        var markLocation = new google.maps.LatLng('<?php echo $pj_view->company_lat; ?>','<?php echo $pj_view->company_lng; ?>'); // 마커가 위치할 위도와 경도

        var mapOptions = {
            center: mapLocation, // 지도에서 가운데로 위치할 위도와 경도(변수)
            zoom: 16, // 지도 zoom단계
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };


        // id: map-canvas, body에 있는 div태그의 id와 같아야 함
        var map = new google.maps.Map(document.getElementById("map-canvas"),mapOptions);


        var size_x = 60; // 마커로 사용할 이미지의 가로 크기
        var size_y = 60; // 마커로 사용할 이미지의 세로 크기

        //마커로 사용할 이미지 주소
        /* var image = new google.maps.MarkerImage( 'http://www.larva.re.kr/home/img/boximage3.png',
         new google.maps.Size(size_x, size_y), '', '',
         new google.maps.Size(size_x, size_y));
         */

        //회사정보를 모달창에서 사용하기 위한 $company foreach
        <?php foreach($company_info as $company): ?>
            var marker;
            marker = new google.maps.Marker({
                position: markLocation, // 마커가 위치할 위도와 경도(변수)
                map: map,
                //icon: image, // 마커로 사용할 이미지(변수)
                //info: '말풍선 안에 들어갈 내용',
                title: '클릭하시면 회사 정보를 볼 수 있습니다.' // 마커에 마우스 포인트를 갖다댔을 때 뜨는 타이틀
            });

        // 말풍선 안에 들어갈 내용
            var content = "会社の名前 : <?php echo $company->m_id; ?><br>会社のリーダー : <?php echo $company->cp_represent; ?><br>会社のメール : <?php echo $company->m_email; ?><br>リーダーの携帯番号 : <?php echo $company->cp_tel; ?><br>";

        <?php endforeach; ?>
        // 마커를 클릭했을 때의 이벤트. 말풍선 뿅~
        var infowindow = new google.maps.InfoWindow({ content: content});

        google.maps.event.addListener(marker, "click", function() {
            infowindow.open(map,marker);
        });

    }

    google.maps.event.addDomListener(window, 'load', initialize);

    //shown 모달창을 띄우고 function를 사용하겠다..
    $("#company_Modal").on("shown.bs.modal", function() {
        initialize();
    });
    
    function cmaTextareaSize(obj, bsize) { // 객체명, 기본사이즈
        var sTextarea = document.getElementById(obj);
        var csize = (sTextarea.scrollHeight >= bsize) ? sTextarea.scrollHeight+"px" : bsize+"px";
        sTextarea.style.height = bsize+"px"; 
        sTextarea.style.height = csize;
    }
    
    function showMessage() {
        $('#msgReceiverNum').val(<?php echo $pj_view->m_num; ?>);
        $('#msgReceiverName').val('<?php echo $company->cp_represent; ?>');
        $('#msgModal').modal();
    }
</script>

</html>


