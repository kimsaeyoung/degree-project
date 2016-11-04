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
            <a href="/companypage/calendar" id="sub_menu_btn" class="btn btn-default">일정관리 </a>
            <a href="/companypage/modify/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">회사정보 수정</a>
            <a href="/companypage/designer/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">지원한 디자이너</a>
            <a href="/companypage/development" id="sub_menu_btn" class="btn btn-default">등록 프로젝트</a>
            {{--{{ $result->cp_info }}
            {{ $result->cp_represent }}--}}
                    <!-- 회사정보 불러오기 -->

        <br><br><br><br> <br><br><br><br>
@foreach($results as $result)
    @if($result)
        <h1>
            <img src="{{asset('img/member_face/'.$result->m_face)}}" id="face_img" style="width: 300px; height: 300px;"><br>
            회사 이름 : {{ $result->m_name }} <br>
            대표 성함 : {{ $result->cp_represent}} <br>
            연락처 : {{ $result->cp_tel }} <br>
            이메일 : {{ $result->m_email }} <br>
            지역 : {{ $result->m_area}} <br>
            회사 정보 {{ $result->cp_info}} <br>
        </h1>

    @endif
@endforeach


@include('layouts.footer')