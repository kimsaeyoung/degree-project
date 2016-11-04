@include('layouts.link') 
@include('layouts.header')
<style>
    @font-face {
        font-weight: normal;
        font-style: normal;
        font-family: 'codropsicons';
    }
    
    .container {
        margin: 10px auto;
        padding: 10px;
        width: 1000px;
    }
    
    #dTitle{
        margin-bottom: 20px;
        width: 100%;
        height: auto;
        border: 0.5px solid lightgray;
        border-radius: 5px;
    }

    #dTitle * {
        display: inline-block;
    }

    #dTitle h1{
        margin: 0;
        padding: 5px 10px;
        display: block;
        width: 100%;
        font-size: 20px;
        border-radius: 5px 5px 0px 0px;
        background-color: lightblue;
        color: white;
    }

    #dTitle h5 {
        padding: 0px 10px;
    }

    #dTitle #btn_write {
        margin: auto 7px;
        margin-top: 5px;
        width: 97px;
        height: 26px;
        font-size: 14px; 
        line-height: 16px;
        color: black;
        background-color: transparent;
        box-shadow: 0px 0px 2px 1px lightblue;
    }
    
    #custom-search-form {
        margin:0;
        margin-top: 5px;
        margin-right: -15px;
        padding: 0;
    }

    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */

        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: width  0.2s ease-in-out;
        -moz-transition:width  0.2s ease-in-out;
        -o-transition: width  0.2s ease-in-out;
        transition: width  0.2s ease-in-out;
    }

    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .left_side_menu{
        float: left;
        display: inline-block;
        width: 20%;
        text-align: center;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    
    .side_menu_title {
        margin:0 auto 0;
        padding: 5px 0;
        display: inline-block;
        text-align: center;
        width: 100%;
        font-size: 17px;
        background-color: lightblue;
    }

    .area_box, .sort_box {
        padding: 10px 0;
        width: 100%;
        height: auto;
    }
    
    .sort_box {
        padding: 10px;
    }
    
    .area_box label {
        position: relative;
        margin: 5px 5px;
        width: 80px;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
    }
    
    .sort_box label {
        margin: 5px 0;
        position: relative;
        width: 100%;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
    }
    
    .num_box {
        margin-right: 10px;
    }
    
    .num_box label {
        position: relative;
        margin-top: 3px;
        width: 120px;
        height: 24px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
        text-align: center;
    }
    
    .num_info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    #middle {
        display: inline-block;
        margin: 0;
        padding: 0 10px;
        padding-left: 15px;
        margin-top: -10px;
        width: 80%;
    }
    .contractBox {
        float: left;
        width: 230px;
        height: 300px;
        margin: 10px;
        padding: 20px;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    .contractBox .cbText {
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        color: black;
        text-decoration: none;
    }
    
    .contractBox .cbText h4{
        padding: 5px;
        margin: 0;
        width: 100%;
        font-weight: bold;
    }
    
    .contractBox .cbText h4:nth-child(even){
        padding-left: 15px;
        font-size: 16px;
        font-weight: lighter;
    }
    
    #contractViewTable {
        font-size: 18px;
        width: 100%;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    #contractViewTable * {
        padding: 5px;
    }
    #contractViewTable .col-md-3 {
        padding-top: 10px;
        text-align: center;
    }
    #contractViewTable .col-md-7 input {
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    input[name=devel_name], input[name=design_name], input[name=pj_title] {
        width: 100%;
        border: none !important;
    }
    input[name=ct_money] {
        width: 90%;
        padding: 0px 3px;
        text-align: right;
    }
    input[name=ct_start_date], input[name=ct_end_date] {
        font-size: 15px;
        width: 46%;
    }
    textarea[name=ct_content] {
        padding: 10px;
        border: 1px solid lightgray;
        border-radius: 5px;
        resize: none;
    }
</style>

<!-- Contract View Modal -->
<div class="modal fade" id="contractViewModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Contract Write</h4>
            </div>
            <form action="/contractAccept" method="post">
                <div class="modal-body" style="padding: 30px">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="tmp_num" value="">
                    <input type="hidden" name="pj_num" value="">
                    <div id="contractViewTable">
                        <div class="row">
                            <div class="col-md-3">개발사</div>
                            <div class="col-md-7"><input type="text" name="devel_name" value="" readonly></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">디자이너</div>
                            <div class="col-md-7"><input type="text" name="design_name" value="" readonly></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">프로젝트</div>
                            <div class="col-md-7"><input type="text" name="pj_title" value="" readonly></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">진행기간</div>
                            <div class="col-md-7"><input type="text" name="ct_start_date" value="" readonly>&nbsp;~&nbsp;<input type="text" name="ct_end_date" value="" readonly></div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">계약금액</div>
                            <div class="col-md-7"><input type="text" name="ct_money" value="" readonly>&nbsp;원</div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">프로젝트내용</div>
                            <div class="col-md-7"><textarea name="ct_content" id="" cols="40" rows="10" readonly></textarea></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">계약</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
    
    <div id="dTitle">
       
        <h1>계약 목록</h1>
        <h5>현재 <span>{{--$count--}}</span>개의 계약이 등록되어 있습니다.</h5>

        <form id="custom-search-form" class="form-search form-horizontal pull-right" action="/designer/search" method="post">
            <div class="input-append spancustom">
                <input type="text" class="search-query" name="m_name" placeholder="Search..">
                <button type="submit" class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </form>

    </div>
    
    <div class="left_side_menu">

        <div class="side_menu_title">정렬</div>

        <div class="sort_box">
            {{--<label><input class="num_info" id="project" type="checkbox" value="" name="number">프로젝트 높은순</label>
            <label><input class="num_info" id="portfolio" type="checkbox" value="" name="number">포트폴리오 높은순</label>--}}
        </div>

    </div>

    <div id="middle">
        @foreach($result as $row)
            <div class="contractBox">
                <a class="cbText" onclick="contractViewModal({{$row->tmp_num}})">
                    <h4>개발사</h4>
                    <h4>{{$row->devel_name}}</h4>
                    <h4>프로젝트</h4>
                    <h4>{{$row->pj_title}}</h4>
                    <h4>금액</h4>
                    <h4>{{$row->tmp_money}}&nbsp;원</h4>
                    <h4>기간</h4>
                    <h4>{{$row->tmp_start_date}}<br>~&nbsp;{{$row->tmp_end_date}}</h4>
                </a>
            </div>
        @endforeach
    </div>
    
</div>


<script>
    
    function contractViewModal($tmp_num) {
        
        $.ajax({

            //laravel 은 X-CSRF-Token을 이용해 post를..
            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type: "POST",
            url: '/contractView',
            data: { 'tmp_num' : $tmp_num },
            dataType : "json",
            success: function(data){
                
                var $nameData = data.nameData;
                var $data = data.result;
                
                $('input[name=tmp_num]').val($tmp_num);
                $('input[name=pj_num]').val($data.pj_num);
                $('input[name=devel_name]').val($nameData.devel_name);
                $('input[name=design_name]').val($nameData.design_name);
                $('input[name=pj_title]').val($nameData.pj_title);
                $('input[name=ct_start_date]').val($data.tmp_start_date);
                $('input[name=ct_end_date]').val($data.tmp_end_date);
                $('input[name=ct_money]').val($data.tmp_money);
                $('textarea[name=ct_content]').val($data.tmp_content);

            },
            error: function(xhr, status, error) {
                console.log(xhr);
            }

        });
        
        $('#contractViewModal').modal();
            
    }

</script>