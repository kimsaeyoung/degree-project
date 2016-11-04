

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
</style>
    <div class="container">
        @foreach($results as $result)
            @if($result)
        <a href="/designer/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">포트로그</a>
        <a href="/designerpage/pf_modifyView/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">포트폴리오 등록</a>
        <a href="/designerpage/project/{{$result->m_num}}" id="sub_menu_btn" class="btn btn-default">지원한 프로젝트</a>
        <!-- 디자이너 개인정보  -->
<br><br><br><br>
<h1>

                <img src="{{asset('img/member_face/'.$result->m_face)}}" id="face_img" style="width: 300px; height: 300px;"><br>
                디자이너 이름 : {{ $result->m_name }} <br>
                연락처 : {{ $result->m_phone }} <br>
                이메일 : {{ $result->m_email }} <br>
                지역 : {{ $result->m_area }} <br>
                소개 : {{ $result->ds_info}} <br>



            @endif
        @endforeach

@include('layouts.footer')