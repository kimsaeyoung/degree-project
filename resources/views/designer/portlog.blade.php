@extends('designer.header')
@section('d_style')

<style>
    hr {
        margin: 0;
    }
    #portSubMenu {
        position: relative;
        float: right;
        padding-right: 20px;
        width: 20%;
        height: 100%;
    }
    #portCont {
        position: relative;
        margin: 0 auto;
        margin-top: 70px;
        width: 800px;
        height: 600px;
    }
    #faceCont {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        margin: auto;
        width: 200px;
        height: 200px;
        border: 7px solid white;
        border-radius: 50%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .portLine {
        position: absolute;
        border-color: rgba(255,255,255,.4);
    }
    #topLeftBtn {
        top: 120px;
        left: 72px;
    }
    #topLeftLine1 {
        width: 152px;
        top: 227px;
        left: 130px;
        -webkit-transform: rotateZ(39deg);
        transform: rotateZ(39deg);
    }
    #topLeftLine2 {
        width: 38px;
        top: 275px;
        left: 265px;
    }
    #topRightBtn {
        top: 70px;
        right: 96px;
    }
    #topRightLine1 {
        width: 157px;
        top: 157px;
        right: 166px;
        -webkit-transform: rotateZ(-25deg);
        transform: rotateZ(-25deg);
    }
    #topRightLine2 {
        width: 38px;
        top: 208px;
        right: 305px;
        -webkit-transform: rotateZ(-65deg);
        transform: rotateZ(-65deg);
    }
    #bottomLeftBtn {
        bottom: 99px;
        left: 139px;
    }
    #bottomLeftLine1 {
        width: 139px;
        bottom: 170px;
        left: 214px;
        -webkit-transform: rotateZ(-13deg);
        transform: rotateZ(-13deg);
    }
    #bottomLeftLine2 {
        width: 24px;
        bottom: 196px;
        left: 345px;
        -webkit-transform: rotateZ(-60deg);
        transform: rotateZ(-60deg);
    }
    #bottomRightBtn {
        bottom: 155px;
        right: 67px;
    }
    #bottomRightLine1 {
        width: 145px;
        bottom: 200px;
        Right: 146px;
    }
    #bottomRightLine2 {
        width: 47px;
        bottom: 216px;
        Right: 285px;
        -webkit-transform: rotateZ(43deg);
        transform: rotateZ(43deg);
    }
    .portBtn {
        position: absolute;
        width: 80px;
        height: 80px;
        border: 1px solid rgba(255,255,255,.6);
        border-radius: 50%;
    }
    .insideBtn {
        margin: 10px auto;
        position: relative;
        width: 40px;
        height: 40px;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .portBtn p{
        margin: 0 auto;
        margin-top: -6px;
        color: white;
        text-align: center;
        font-size: 10px;
        font-weight: 100;
    }
    #message{
        width:100px;
        height:100px;
        position: relative;
        top:420px;
        left:380px;
    }
</style>
    
@stop @section('d_content')

<body>
   
    <div class="portlogContainer">
        
        <div id="portCont">
           
            <hr id="topLeftLine1" class="portLine">
            <hr id="topLeftLine2" class="portLine">
            <a href="/designer/portfolio/{{$m_num}}">
                <div id="topLeftBtn" class="portBtn">
                    <div class="insideBtn" style="background-image: url({{asset('img/portfolio.png')}});"></div>
                    <p>PORTFOLIO</p>
                </div>
            </a>
            
            <hr id="topRightLine1" class="portLine">
            <hr id="topRightLine2" class="portLine">
            <a href="/designer/intro/{{$m_num}}">
                <div id="topRightBtn" class="portBtn">
                    <div class="insideBtn" style="background-image: url({{asset('img/profile.png')}});"></div>
                    <p>PROFILE</p>
                </div>
            </a>
            
            <hr id="bottomLeftLine1" class="portLine">
            <hr id="bottomLeftLine2" class="portLine">
            <a href="/designer/career/{{$m_num}}">
                <div id="bottomLeftBtn" class="portBtn">
                    <div class="insideBtn" style="background-image: url({{asset('img/career.png')}});"></div>
                    <p>CAREER</p>
                </div>
            </a>
            
            <hr id="bottomRightLine1" class="portLine">
            <hr id="bottomRightLine2" class="portLine">
            <a href="/designer/school/{{$m_num}}">
                <div id="bottomRightBtn" class="portBtn">
                    <div class="insideBtn" style="background-image: url({{asset('img/history.png')}});"></div>
                    <p>HISTROY</p>
                </div>
            </a>
            
            <div id="message">
                <img src="{{asset('/img/message.png')}}">
            </div>
            
            <div id="faceCont" style="background-image: url(@if($intro->m_face !=null) {{asset('img/member_face/'.$intro->m_face)}}) @else {{asset('img/member_face/no_face.jpg')}} @endif"></div>
        </div>
        
    </div>

</body>
@stop