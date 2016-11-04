@extends('designer.header') @section('d_style')

<style>
    body {
        color: black;
    }
    .designer_information {
        margin: 0 auto;
        margin-top: 50px;
        padding-bottom: 10px;
        width: 1000px;
        background-color: rgba(255,255,255,0.5);
        box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
    }
    .subject {
        margin: 0;
        padding: 20px;
        text-align: center;
        font-size: 25px;
    }
    .info {
        width: 590px;
        height: 400px;
        display: inline-block;
    }    
    .wrapper {
        float: left;
        width: 400px;
        height: 400px;
        text-align: center;
    }
    #face_img {
        width: 300px;
        height: 400px;
        border-radius: 10px;
        border: 1px dotted lightgray;
        box-shadow: 0px 5px 20px 2px rgba(0,0,0,0.4);
    }
    #table {
        width: 550px;
        height: 400px;
    }
    .td_left {
        text-align: center;
        border-top: 1px dotted black;
        border-bottom: 1px dotted black;
        font-size: 20px;
        padding: 20px;
        width: 150px;
    }
    .td_center {
        padding: 0;
        margin: 0;
        width: 2px;
    }
    .td_center div {
        width: 1px;
        height: 65px;
        border-right: 1px dotted black;
    }
    .td_right {
        width: 398px;
        border-top: 1px dotted black;
        border-bottom: 1px dotted black;
        font-size: 18px;
    }
    #comment {
        width: 900px; 
        margin: 20px auto; 
        resize: none;
        font-size: 20px;
        color: black;
        border: 1px dotted lightgray;
        background-color: transparent;
    }
</style>

@stop @section('d_content')

<div class="designer_information animsition" data-animsition-in-class="fade-in-down" data-animsition-in-duration="1000" data-animsition-out-class="fade-out-down" data-animsition-out-duration="800">
    <form action="/designer/intro_modify" method="post" enctype="multipart/form-data" style="">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <p class="subject">PROFILE</p>
        <script>
            $(document).ready(function() {
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
                        reader.onload = function(e) {
                            //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
                            $('#face_img').attr('src', e.target.result);
                            //이미지 Tag의 SRC속성에 읽어들인 File내용을 지정
                            //(아래 코드에서 읽어들인 dataURL형식)
                        }
                        reader.readAsDataURL(input.files[0]);
                        //File내용을 읽어 dataURL형식의 문자열로 저장
                    }
                } //readURL()--

                //file 양식으로 이미지를 선택(값이 변경) 되었을때 처리하는 코드
                $("#designer_face").change(function() {
                    //alert(this.value); //선택한 이미지 경로 표시
                    readURL(this);
                });
            });
        </script>
        <div class="wrapper">
            @if($results->m_face != null)
            <img src="{{asset('img/member_face/'.$results->m_face)}}" id="face_img"> @else
            <img src="{{asset('img/member_face/no_face.jpg')}}" id="face_img"> @endif
            <div class="file_upload" style="margin-top: 5px; height: 25px; width: 350px; margin-left: 20px; display: inline-block; text-align: center">
                @if(Session::get('m_num') == $results->m_num)
                <span style="display: inline-block; margin: 0 auto; text-align: center">
                                <input type="file" id="designer_face" name="designer_face">
                                <input type="hidden" value="{{$results->m_face}}" name="m_face" >
                            </span> @endif
            </div>
        </div>
        <div class="info">
            <table id="table">
                <tr>
                    <td class="td_left">名前</td>
                    <td class="td_center"><div></div></td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            @if($results->m_num != Session::get('m_num'))
                            {{$results->m_name}}
                            @else
                                <input type="text" value="{{$results->m_name}}" class="form-control" name="m_name">
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_left">ＴＥＬ</td>
                    <td class="td_center"><div></div></td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            @if($results->m_num != Session::get('m_num'))
                                {{$results->m_phone}}
                            @else
                                <input type="text" value="{{$results->m_phone}}" class="form-control" name="m_phone">
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_left">E-mail</td>
                    <td class="td_center"><div></div></td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            @if($results->m_num != Session::get('m_num'))
                                {{$results->m_email}}
                            @else
                                <input type="text" value="{{$results->m_email}}" class="form-control"  name="m_email">
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_left">住所</td>
                    <td class="td_center"><div></div></td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            @if($results->m_num != Session::get('m_num'))
                                {{$results->m_area}}
                            @else
                                <input type="text" name="m_area" list="area_list" class="form-control" value="{{$results->m_area}}">
                                <datalist id="area_list">
                                    <option value="서울">ソウル</option>
                                    <option value="경기권">キョンギ</option>
                                    <option value="인천">インチョン</option>
                                    <option value="대전">テジョン</option>
                                    <option value="대구">テグ</option>
                                    <option value="울산">ウルサン</option>
                                    <option value="부산">ブサン</option>
                                    <option value="광주">クァンジュ</option>
                                    <option value="제주도">チェジュ</option>
                                </datalist>
                            @endif
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div class="form-group">
            <textarea class="form-control" rows="5" cols="65" name="ds_info" id="comment" @if($results->m_num != Session::get('m_num'))readonly @endif>{{$results->ds_info}}</textarea>
        </div>
        @if(Session::get('m_num') == $results->m_num)
        <div style="text-align: center">
            <input type="submit" class="btn btn-success" value="修正">
        </div>
        @endif
    </form>
</div>

<script>
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
@stop