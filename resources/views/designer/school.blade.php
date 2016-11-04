@extends('designer.header')
@section('d_style')
<style>
    .middle{
        margin: 30px auto;
        width: 1000px;
        height: auto;
        color: black;
    }
    section {
        margin: 20px auto;
        border-radius: 8px;
        background-color: rgba(255,255,255,0.5);
        box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
    }
    section .hs_subject{
        font-weight: lighter;
        margin: 0;
        padding: 10px 20px;
        font-size: 20px;
    }
    .hs_title{
        border-top: 1px dotted #000;
        border-bottom: 1px dotted #000;
        width: 100%;
        height: 40px;
    }
    .hs_title_3 {
        display: inline-block;
        width: 33%;
        text-align: center;
        line-height: 40px;
    }
    .hs_title_4 {
        display: inline-block;
        width: 23.7%;
        text-align: center;
        line-height: 40px;
    }
    .hs_menu {
        width: 100%;
        min-height: 50px;
        height: auto;
    }
    .hs_menu_3 {
        display: inline-block;
        width: 33%;
        text-align: center;
        line-height: 50px;
    }
    .hs_menu_4 {
        display: inline-block;
        width: 23.7%;
        text-align: center;
        line-height: 50px;
    }
    #start_selectbox {
        width: 100px;
        display: inline-block;
    }
    #end_selectbox{
        width: 100px;
        display: inline-block;
    }
    #start_month{
        width: 60px;
        display: inline-block;
    }
    #end_month{
        width: 60px;
        display: inline-block;
    }
</style>
@stop

@section('d_content')
    <div class="middle animsition" data-animsition-in-class="fade-in-down" data-animsition-in-duration="1000" data-animsition-out-class="fade-out-down" data-animsition-out-duration="800">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <section>
                <h4 class="hs_subject">学歴</h4>
                <div class="hs_title">
                    <div class="hs_title_3">学校名</div>
                    <div class="hs_title_3">専攻</div>
                    <div class="hs_title_3">在学期間</div>
                </div>
                <div id="hs_menu1">
                @foreach($academy_list as $row)
                    <div id="ac_{{$row->ac_num}}">
                        <div class="hs_menu_3">{{$row->ac_name}}</div>
                        <div class="hs_menu_3">{{$row->ac_specialty}}</div>
                        <div class="hs_menu_3">{{$row->ac_start_date}} ~ {{$row->ac_end_date}}</div>
                        @if($designer_num == Session::get('m_num'))
                        <a class="btn btn-primary"  onclick="academy_delete('{{$row->ac_num}}')">消す</a>
                        @endif
                    </div>
                @endforeach
                </div>
                @if($designer_num == Session::get('m_num'))
                <a class="btn btn-primary" data-toggle="modal" data-target="#academy_modal">
                    追加
                </a>
                @endif

                <div class="modal fade" id="academy_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="width: 600px;">
                            <div class="modal-header myBgColorB">
                                <button type="button" class="close myBgColorB" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">学歴追加</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">学校名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ac_name"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">専攻</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="ac_specialty"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">在学期間</label>
                                    <div class="col-sm-10">
                                        <?php
                                        // 보여질 년도의 범위 - 현재년부터 50년전까지 표시됩니다.
                                        $yearRange = 50;
                                        // 선택되어질 년도 - 현재년 기준 20년전의 년도가 선택되어집니다.
                                        $ageLimit = 10;

                                        $currentYear = date('Y')+10;
                                        $startYear = ($currentYear - $yearRange);
                                        $selectYear = ($currentYear - $ageLimit);
                                        echo '<select name="year" class="form-control" id="start_selectbox">';
                                        foreach (range($currentYear, $startYear) as $year) {
                                            $selected = "";
                                            if($year == $selectYear) { $selected = " selected"; }
                                            echo '<option' . $selected . ' >' . $year . '</option>';
                                        }
                                        echo '</select>';
                                        ?>年
                                            <select class="form-control" id="start_month">
                                                <?php
                                                for($i=1; $i<=12; $i++)
                                                    echo '<option>'.$i.'</option>';
                                                ?>
                                            </select>月
                                            ~
                                            <?php
                                            // 보여질 년도의 범위 - 현재년부터 50년전까지 표시됩니다.
                                            $yearRange = 50;
                                            // 선택되어질 년도 - 현재년 기준 20년전의 년도가 선택되어집니다.
                                            $ageLimit = 10;

                                            $currentYear = date('Y')+10;
                                            $startYear = ($currentYear - $yearRange);
                                            $selectYear = ($currentYear - $ageLimit);
                                            echo '<select name="year" class="form-control" id=end_selectbox>';
                                            foreach (range($currentYear, $startYear) as $year) {
                                                $selected = "";
                                                if($year == $selectYear) { $selected = " selected"; }
                                                echo '<option' . $selected . '>' . $year . '</option>';
                                            }
                                            echo '</select>';
                                            ?>年
                                            <select class="form-control" id="end_month">
                                                <?php
                                                    for($i=1; $i<=12; $i++)
                                                        echo '<option>'.$i.'</option>';
                                                    ?>
                                            </select>月
                                      </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="margin-top: 85px">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn myBgColorB" onclick="academy_add()">追加</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <script>
                    function academy_add(){
                        var ac_name = $('#ac_name').val();
                        var ac_specialty = $('#ac_specialty').val();
                        var start_year=$("#start_selectbox option:selected").val();
                        var end_year=$("#end_selectbox option:selected").val();
                        var start_month=$("#start_month option:selected").val();
                        var end_month=$("#end_month option:selected").val();

                        $.ajax({
                            headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                            url:'/designer/academy_add',
                            data:{
                                ac_name:ac_name,
                                ac_specialty:ac_specialty,
                                start_year:start_year,
                                end_year:end_year,
                                start_month:start_month,
                                end_month:end_month
                            },
                            dataType:'json',
                            type:'post',
                            success:function(data){
                                $('#academy_modal').modal('hide');
                                var one = $('<div></div>').attr('id','ac_'+data).addClass('nav');
                                
                                $('<div></div>').addClass('hs_menu_3').text(ac_name).appendTo(one);
                                $('<div></div>').addClass('hs_menu_3').text(ac_specialty).appendTo(one);
                                $('<div></div>').addClass('hs_menu_3').text(start_year+'-'+start_month+' ~ '+end_year+'-'+end_month).appendTo(one);
                                
                                $('<a></a>').addClass('btn btn-danger').attr('onclick','academy_delete('+data+')').text('削除').appendTo(one);
                                
                                one.appendTo('#hs_menu1');

                            },error:function(data){

                            }
                        });

                    }


                    //디자이너 학력 없애기
                    function academy_delete(ac_num){
                        $.ajax({
                            headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                            url:'/designer/academy_delete',
                            data:{
                                ac_num:ac_num
                            },
                            dataType:'json',
                            type:'post',
                            success:function(data){
                                $('#ac_'+ac_num+'').remove();
                            },
                            error:function(data){

                            }
                        });
                    }
                </script>
            </section>

            <section>
                <h4 class="hs_subject">経歴</h4>
                <div class="hs_title">
                    <div class="hs_title_4">会社名</div>
                    <div class="hs_title_4">部署</div>
                    <div class="hs_title_4">職位</div>
                    <div class="hs_title_4">勤務期間</div>
                </div>
                <div id="cr_menu">
                    @foreach($career_list as $row)
                        <div id="cr_{{$row->cr_num}}">
                            <div class="hs_menu_4">{{$row->cr_name}}</div>
                            <div class="hs_menu_4">{{$row->cr_content}}</div>
                            <div class="hs_menu_4">{{$row->cr_position}}</div>
                            <div class="hs_menu_4">{{$row->cr_start_date}}~{{$row->cr_end_date}}</div>
                            @if($designer_num == Session::get('m_num'))
                            <a class="btn btn-primary"  onclick="cr_delete('{{$row->cr_num}}')">消す</a>
                            @endif
                        </div>
                    @endforeach
                </div>
                @if($designer_num == Session::get('m_num'))
                <a class="btn btn-primary" data-toggle="modal" data-target="#career_modal">
                    追加
                </a>
                @endif

                <div class="modal fade" id="career_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="width: 600px;">
                            <div class="modal-header myBgColorB">
                                <button type="button" class="close myBgColorB" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">経歴追加</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">会社名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="col-xs-2 form-control" id="cr_name"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">部署</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="cr_content"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">職位</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="cr_position"  required>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">勤務期間</label>
                                    <div class="col-sm-10">
                                        <input type="date" id="cr_start_date">
                                        <input type="date" id="cr_end_date">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="margin-top: 120px">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button class="btn myBgColorB" onclick="career_add()">追加</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function career_add(){
                        var cr_name=$('#cr_name').val();
                        var cr_content=$('#cr_content').val();
                        var cr_position=$('#cr_position').val();
                        var cr_start_date=$('#cr_start_date').val();
                        var cr_end_date=$('#cr_end_date').val();

                        $.ajax({
                            headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                            url:'/designer/career_add',
                            dataType:'json',
                            data:{
                                cr_name:cr_name,
                                cr_content:cr_content,
                                cr_position:cr_position,
                                cr_start_date:cr_start_date,
                                cr_end_date:cr_end_date
                            },
                            type:'post',
                                success:function(data){
                                    $('#career_modal').modal('hide');
                                    $('#cr_menu').append('<div id=cr_'+data+' class=nav>' +
                                            '<div class="hs_menu_4">'+cr_name+'</div>' +
                                            '<div class="hs_menu_4">'+cr_content+'</div>' +
                                            '<div class="hs_menu_4">'+cr_position+'</div>' +
                                            '<div class="hs_menu_4">'+cr_start_date+'~'+cr_end_date+'</div>' +
                                            '<a class="btn btn-danger"  onclick="cr_delete('+data+')">削除</a>' +
                                            '</div>');
                            },
                            error:function(data){

                            }
                        });
                    }
                    function cr_delete(cr_num){
                        $.ajax({
                            headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                            url: '/designer/career_delete',
                            data: {
                                cr_num:cr_num
                            },
                            type: 'post',
                            dataType: 'json',
                            success: function (data) {
                                $('#cr_'+cr_num+'').remove();
                            },
                            error: function (data) {

                            }
                        });
                    }
                </script>
            </section>






            <section>
                <h4 class="hs_subject">資格所</h4>
                <div class="hs_title">
                    <div class="hs_title_3">資格名</div>
                    <div class="hs_title_3">発行機関</div>
                    <div class="hs_title_3">取得日</div>
                </div>
                <div class="lic_menu">
                    @foreach($licenese_list as $row)
                        <div id="lic_{{$row->lic_num}}">
                            <div class="hs_menu_3">{{$row->lic_name}}</div>
                            <div class="hs_menu_3">{{$row->lic_pyot}}</div>
                            <div class="hs_menu_3">{{$row->lic_date}}</div>
                            @if($designer_num == Session::get('m_num'))
                            <a class="btn btn-primary"  onclick="licenese_delete('{{$row->lic_num}}')">消す</a>
                            @endif
                        </div>
                    @endforeach
                </div>

                @if($designer_num == Session::get('m_num'))
                <a class="btn btn-primary" data-toggle="modal" data-target="#licenese_modal">
                    追加
                </a>
                @endif

                <div class="modal fade" id="licenese_modal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content" style="width: 600px;">
                            <div class="modal-header myBgColorB">
                                <button type="button" class="close myBgColorB" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">技術追加</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">技術名</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lic_name"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">発行機関</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="lic_pyot"  required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">取得日</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="lic_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="margin-top: 85px">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Ｘ</button>
                                <button class="btn myBgColorB" onclick="licenese_add()">追加</button>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function licenese_add(){
                        var lic_name = $('#lic_name').val();
                        var lic_pyot = $('#lic_pyot').val();
                        var lic_date = $('#lic_date').val();

                        $.ajax({
                            headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                            url:'/designer/licenese_add',
                            type:'post',
                            data:{
                                lic_name:lic_name,
                                lic_pyot:lic_pyot,
                                lic_date:lic_date
                            },
                            dataType:'json',
                            success:function(data){
                                $('#licenese_modal').modal('hide');
                                $('.lic_menu').append('<div id=lic_'+data+' class="nav"> '+
                                        '<div class="hs_menu_3">'+lic_name+'</div>' +
                                        '<div class="hs_menu_3">'+lic_pyot+'</div>' +
                                        '<div class="hs_menu_3">'+lic_date+'</div>' +
                                        '<a class="btn btn-danger"  onclick="licenese_delete('+data+')">削除</a></div>');
                            },
                            error:function(data){

                            }
                        })
                    }
                    function licenese_delete(lic_num){
                        $.ajax({
                            headers:
                            {
                                'X-CSRF-Token': $('input[name="_token"]').val()
                            },
                            url: '/designer/licenese_delete',
                            data: {
                                lic_num:lic_num
                            },
                            type: 'post',
                            dataType: 'json',
                            success: function (data) {
                                $('#lic_'+lic_num+'').remove();
                            }
                        });
                    }
                </script>
            </section>

            <section>
                <h4 class="hs_subject">技術</h4>
                <div class="hs_title">
                    <div class="hs_title_3">技術名</div>
                    <div class="hs_title_3">練度</div>
                    <div class="hs_title_3">年次</div>
                </div>

                <div class="sk_menu">
                    @foreach($skill_list as $row)
                        <div id="sk_{{$row->sk_num}}">
                            <div class="hs_menu_3">{{$row->sk_name}}</div>
                            <div class="hs_menu_3" >{{$row->sk_grade}}</div>
                            <div class="hs_menu_3" >{{$row->sk_time}}年</div>
                            @if($designer_num == Session::get('m_num'))
                            <a class="btn btn-primary"  onclick="sk_delete('{{$row->sk_num}}')">消す</a>
                            @endif
                        </div>
                    @endforeach
                </div>
                @if($designer_num == Session::get('m_num'))
                    <a class="btn btn-primary" data-toggle="modal" data-target="#skill_modal">
                        追加
                    </a>
                @endif
            </section>
    </div>
    <!-- skill_modal Start -->

    <div class="modal fade" id="skill_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 500px;">
                <div class="modal-header myBgColorB">
                    <button type="button" class="close myBgColorB" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">技術追加</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">名前</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sk_name"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">練度</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sk_grade"  required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">年次</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sk_time" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="margin-top: 85px">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button class="btn myBgColorB" onclick="skill_add()">追加</button>
                </div>
            </div>
        </div>
    </div>

    <!-- skill 관련 ajax script 문장!!!! -->
    <script>
        function skill_add(){

            var sk_name = $('#sk_name').val();
            var sk_grade = $('#sk_grade').val();
            var sk_time = $('#sk_time').val();
            $.ajax({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url:'/designer/skill_modify',
                type:'post',
                data:{
                    'sk_name':sk_name,
                    'sk_grade':sk_grade,
                    'sk_time':sk_time,
                    'm_num':'{{Session::get('m_num')}}'
                },
                dataType:'json',
                success:function(data){
                    $('#skill_modal').modal('hide');
                    $('.sk_menu').append('<div id=sk_'+data+' class=nav>' +
                            '<div class="hs_menu_3">'+sk_name+'</div>' +
                            '<div class="hs_menu_3">'+sk_grade+'</div>'+
                            '<div class="hs_menu_3">'+sk_time+'年</div>'+
                            '<a class="btn btn-danger" id="delete" onclick="sk_delete('+data+')">削除' +
                            '</a></div>');
                },
                error:function(data){
                    window.alert('ちゃんと書いてください');
                }
            });
        }

        function sk_delete(sk_num) {
            $.ajax({
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                url: '/designer/skill_delete',
                data: {
                    sk_num:sk_num
                },
                type: 'post',
                dataType: 'json',
                success: function (data) {
                    $('#sk_'+sk_num+'').remove();
                }
            });
        }
        
        $(document).ready(function() {
            $(".animsition").animsition({
                linkElement: '.animsition-link',
                // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
                loading: true,
                loadingParentElement: 'body', //animsition wrapper element
                loadingClass: 'animsition-loading',
                loadingInner: '', // e.g '<img src="loading.svg" />'
                timeout: false,
                timeoutCountdown: 5000,
                onLoadEvent: true,
                browser: [ 'animation-duration', '-webkit-animation-duration'],
                // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
                // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
                overlay : false,
                overlayClass : 'animsition-overlay-slide',
                overlayParentElement : 'body',
                transition: function(url){ window.location.href = url; }
            });
        });
    </script>
    <!-- skill 관련 ajax script 문장 !!!!  END  !!!!! -->
        @stop