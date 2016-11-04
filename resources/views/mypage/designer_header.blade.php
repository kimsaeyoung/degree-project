@include('layouts.link')
@include('layouts.header')
<style>
    .nav{
        margin: 0 auto;
        width:1000px;
    }
    .container{
        width: 800px;
        border-top:3px solid #FF7E4E;
    }
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
<div class="nav">
    <div class="container">
        <a href="/designerpage/message" id="sub_menu_btn" class="btn btn-default">메세지</a>
        <a href="/designerpage/modify" id="sub_menu_btn" class="btn btn-default">개인정보 수정</a>
        <a href="/designer/pf_modifyView/{{Session::get('m_num')}}" id="sub_menu_btn" class="btn btn-default">포트폴리오 수정</a>
        <a href="/designerpage/project" id="sub_menu_btn" class="btn btn-default">지원한 프로젝트</a>
        <!-- 디자이너 개인정보  -->
    </div>

    @yield('designer_section')
</div>