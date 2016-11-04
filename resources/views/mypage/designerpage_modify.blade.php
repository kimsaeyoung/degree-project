@include('layouts.link')
@include('layouts.header')
<style>
    #sub_menu_btn{
        margin-right: 20px;
        margin-left: 20px;
        margin-top: 20px;
        display: inline-block;
        float: left;
        width: 19%;
        color: black;
    }


     .subject{
         border-bottom: 3px solid #ff6666;
     }

    .info {
        width: 300px;
        height: 400px;
        display: inline-block;
    }
    .wrapper{
        width:400px;
        height: 400px;
        display: inline-block;
    }
    .td_left{
        text-align: center;
        border-right: 3px solid #000;
        border-bottom: 3px solid #000;
        width:150px;
        font-size:25px;
    }
    .td_right{
        border-bottom: 3px solid #000;
    }
    #table{
        margin-top:30px;
        width: 570px;
        height: 400px;
        margin-left: 20px;
    }
    #comment{
        resize: none;
    }

    #face_img{
        margin-top:30px;
        margin-left:20px;
        width: 350px;
        height: 350px;
        border-radius: 20px;
        border:solid 1px #000;
    }


</style>

<div class="container">

    @foreach($results as $result)
        @if($result)

    <a href="/designerpage/modify/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">개인정보 수정</a>
            <a href="/designerpage/pf_modifyView/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">포트폴리오 등록</a>
    <a href="/designerpage/project/{{$result->m_num}}" id="sub_menu_btn" class="btn btn-default">지원한 프로젝트</a>
        <!-- 디자이너 개인정보 수정 -->

            <br><br>
             {{--   <form method="post" action="/designerpage/modify/{{$result->m_num}}" >
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name='m_num'value="{{$result->m_num}}" >
                    디자이너 이름 : <input type="text" name='m_name' value="{{ $result->m_name }}" maxlength="20"/> <br>
                    연락처 : <input type="text" name='m_phone' value="{{ $result->m_phone }}" maxlength="20"/> <br>
                    이메일 : <input type="text" name='m_email' value="{{ $result->m_email }}" maxlength="20"/> <br>
                    지역 : <input type="text" name='m_area' value="{{ $result->m_area }}" maxlength="20"/> <br>
                    디자이너 소개 : <input type="text" name='ds_info' value="{{ $result->ds_info }}" maxlength="20"/> <br>
                    <br>
                    <input type="submit" value="수정하기">
                </form>--}}


            <form action="/designerpage/modify" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <h2 class="subject">정보</h2>
                <script>
                    $(document).ready(function(){
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
                                reader.onload = function (e) {
                                    //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
                                    $('#face_img').attr('src', e.target.result);
                                    //이미지 Tag의 SRC속성에 읽어들인 File내용을 지정
                                    //(아래 코드에서 읽어들인 dataURL형식)
                                }
                                reader.readAsDataURL(input.files[0]);
                                //File내용을 읽어 dataURL형식의 문자열로 저장
                            }
                        }//readURL()--

                        //file 양식으로 이미지를 선택(값이 변경) 되었을때 처리하는 코드
                        $("#designer_face").change(function(){
                            //alert(this.value); //선택한 이미지 경로 표시
                            readURL(this);
                        });
                    });
                </script>
                <div class="wrapper">
                    @if($result->m_face != null)
                        <img src="{{asset('img/member_face/'.$result->m_face)}}" id="face_img">
                    @else
                        <img src="{{asset('img/member_face/no_face.jpg')}}" id="face_img">
                    @endif
                    <div class="file_upload" style="margin-top: 5px; height: 25px; width: 350px; margin-left: 20px; display: inline-block; text-align: center">
                        @if(Session::get('m_num') == $result->m_num)
                            <span style="display: inline-block; margin: 0 auto; text-align: center">
                                <input type="file" id="designer_face" name="designer_face">
                                <input type="hidden" value="{{$result->m_face}}" name="m_face" >
                            </span>
                        @endif
                    </div>
                </div>
                <div class="info">
                    <table id="table">
                        <tr>
                            <td class="td_left">이름</td>
                            <td class="td_right">
                                <div style="margin-left: 20px">
                                    <h4>
                                        @if($result->m_num != Session::get('m_num'))
                                            {{$result->m_name}}
                                        @else
                                            <input type="text" value="{{$result->m_name}}" class="form-control" name="m_name">
                                        @endif
                                    </h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_left">연락처</td>
                            <td class="td_right">
                                <div style="margin-left: 20px">
                                    <h4>
                                        @if($result->m_num != Session::get('m_num'))
                                            {{$result->m_phone}}
                                        @else
                                            <input type="text" value="{{$result->m_phone}}" class="form-control" name="m_phone">
                                        @endif</h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_left">E-mail</td>
                            <td class="td_right">
                                <div style="margin-left: 20px">
                                    <h4>
                                        @if($result->m_num != Session::get('m_num'))
                                            {{$result->m_email}}
                                        @else
                                            <input type="text" value="{{$result->m_email}}" class="form-control"  name="m_email">
                                        @endif</h4>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="td_left">거주지</td>
                            <td class="td_right">
                                <div style="margin-left: 20px">
                                    <h4>
                                        @if($result->m_num != Session::get('m_num'))
                                            {{$result->m_area}}
                                        @else
                                            <input type="text" name="m_area" list="area_list" class="form-control" value="{{$result->m_area}}">
                                            <datalist id="area_list">
                                                <option value="서울">서울특별시</option>
                                                <option value="경기권">경기도</option>
                                                <option value="인천">인천광역시</option>
                                                <option value="대전">대전광역시</option>
                                                <option value="대구">대구광역시</option>
                                                <option value="울산">울산</option>
                                                <option value="부산">부산</option>
                                                <option value="광주">광주</option>
                                                <option value="제주도">제주도</option>
                                            </datalist>
                                            </input>
                                        @endif</h4>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <h2 class="subject">자기소개</h2>
                <div class="form-group">
                    <textarea class="form-control" rows="5" cols="65" name="ds_info" id="comment" @if($result->m_num != Session::get('m_num'))readonly @endif>{{$result->ds_info}}</textarea>
                </div>
                @if(Session::get('m_num') == $result->m_num   )
                    <div style="text-align: center">
                        <input type="submit" class="btn btn-success" value="수정하기">
                    </div>
                @endif
            </form>
</div>












@endif
        @endforeach
@include('layouts.footer')