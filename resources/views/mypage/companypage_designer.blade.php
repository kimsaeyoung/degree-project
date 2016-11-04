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

    <br> <br> <br><br> <br> <br> <br> <br> <br>
        <!-- 지원한 디자이너 목록 불러오기  -->

   <div class="row">

       @foreach($results as $result)
           @if($result)
        <div class="col-lg-4">
                <div class="form_hover " style="background-color: #428BCA;">
                <p style="text-align: center; margin-top: 20px;">
                    <i class="fa fa-user" style="font-size: 147px;"><img src="{{asset('img/member_face/'.$result->m_face)}}" id="face_img" style="width: 230px; height: 140px;"></i>
                </p>
                <div class="header">
                    {{--<div class="blur"></div>--}}

                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #428BCA;">지원자 정보</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    프로젝트 명 : {{ $result->pj_title }}
                                </div>
                                <div class="form-group">
                                    지원자 성명 : {{ $result->m_name }}
                                </div>
                                <div class="form-group">
                                    지원자 연락처 : {{ $result->m_phone }}
                                <br><br>
                                    <div class="form-group">
                                        지원자 지역 : {{ $result->m_area }}

                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
           @endif
       @endforeach
</div>
      {{--  @endif
    @endforeach--}}
<style>
    .form_hover {
        padding: 0px;
        position: relative;
        overflow: hidden;
        height: 240px;
    }

    .form_hover:hover .header {
        opacity: 1;
        transform: translateY(-172px);
        -webkit-transform: translateY(-172px);
        -moz-transform: translateY(-172px);
        -ms-transform: translateY(-172px);
        -o-transform: translateY(-172px);
    }

    .form_hover img {
        z-index: 4;
    }

    .form_hover .header {
        position: absolute;
        top: 170px;
        -webkit-transition: all 0.3s ease;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -ms-transition: all 0.3s ease;
        transition: all 0.3s ease;
        width: 100%;
    }

    .form_hover .blur {
        height: 240px;
        z-index: 5;
        position: absolute;
        width: 100%;
    }

    .form_hover .caption-text {
        z-index: 10;
        color: #fff;
        position: absolute;
        height: 240px;
        text-align: center;
        top: -20px;
        width: 100%;
    }
</style>


@include('layouts.footer')