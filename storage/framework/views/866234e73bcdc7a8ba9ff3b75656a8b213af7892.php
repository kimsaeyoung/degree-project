<?php echo $__env->make('designer.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
    #backGroundImg {
        height: 1280px !important;
    }
    #backGroundColor {
        height: 1200px !important;          
    }
    #DB_banner3 ul, #DB_banner3 li {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    #DB_banner3 {
        margin: 0 auto;
        margin-bottom: 50px;
        position: relative;
        width: 1000px; 
        height: 200px;
    }
    #DB_banner3 .DB_mask {
        position: relative;
        width: 900px ;
        margin: 0 auto;
        height: 250px;
        overflow: hidden; 
    }
    #DB_banner3 .DB_imgSet {
        position:absolute; 
        margin-top:23px;
    }
    #DB_banner3 .DB_imgSet li {
        border: none;
        position: absolute;
        width: 180px;
        margin-right: 10px
    }

    #DB_banner3 .DB_dir{
        position:absolute;
        top:50%;
        margin-top:-30px;
        cursor:pointer;
        font-size: 30px;
        color: white;
    }
    #DB_banner3 .DB_prev{
        left:0; 
        margin-top: 10px;
    }
    #DB_banner3 .DB_next{
        right:0; 
        margin-top:10px;
    }
    
    .image_slide{
        border-radius: 3px;
        width: 180px;
        height: 200px;
        box-shadow: 0px 2px 5px 1px rgba(0,0,0,0.3);
    }
    
    .section{
        width: 1000px;
        height: auto;
        margin: 0 auto;
        margin-top: 50px;
        padding-bottom: 30px;
        background-color: rgba(255,255,255,0.5);
        box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
    }
    .img{
        width: 830px;
        height: 480px;
    }
    .p_img{
        width:488px;
        height:606px;
    }
    .pf_subject{
        margin: 0 auto;
        padding-top: 25px;
        width: 800px;
        height:100px;
    }
    .pf_content{
        margin: 0 auto;
        margin-top: 20px;
        padding: 10px;
        width: 850px;
        height: 140px;
        border: 1px dotted lightgray;
        border-radius: 3px;
        overflow-x: auto;
        font-size: 18px;
        color: black;
    }
    .h1_pf_subject{
        margin: 0 auto;
        text-align: center;
        font-size: 30px;
        font-weight: lighter;
    }

    figure{

        position: relative;
        margin: 0;
        padding: 0;
        background: #fff;

    }
    figure img{
        opacity: 1;
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }
    figure:hover .img{
        opacity: .5;
    }
    figure.effect-bubba {
        box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
    }
    figure.effect-bubba figcaption::before,
    figure.effect-bubba figcaption::after {
        position: absolute;
        top: 30px;
        right: 30px;
        bottom: 30px;
        left: 30px;
        content: '';
        opacity: 0;
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
    }
    figure.effect-bubba figcaption::before {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        -webkit-transform: scale(0,1);
        transform: scale(0,1);
    }

    figure.effect-bubba figcaption::after {
        border-right: 1px solid #000;
        border-left: 1px solid #000;
        -webkit-transform: scale(1,0);
        transform: scale(1,0);
    }

    figure.effect-bubba:hover figcaption::before,
    figure.effect-bubba:hover figcaption::after {
        opacity: 1;
        -webkit-transform: scale(1);
        transform: scale(1);
    }
        
    .full_image{
        margin: 0 auto;
        width:850px;
    }
    .full_image figure figcaption {
        position: absolute;
        top: 0;
        left: 0;
        width: 830px;
        height: 500px;
    }
    .full_image figure figcaption {
        position: absolute;
        z-index: 3;
        padding: 2em;
        color: #000;
        text-transform: uppercase;
        font-size: 1.25em;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    .full_image figure figcaption:hover .s_img{
        opacity :1;
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
    .s_img{
        position: absolute;
        z-index: 99;
        opacity: 0;
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(0,20px,0);
        transform: translate3d(0,20px,0);
        overflow: auto;
        height: 400px;
    }
    .s_img a{
        cursor: pointer;
        margin-left:5px;
        margin-top:10px;
        display: inline-block;
    }
    
    .appfull_image{
        margin: 0 auto;
        width:488px;
        height:606px;
    }
    .appfull_image figure figcaption {
        position: absolute;
        top: 0;
        left: 0;
        width: 480px;
        height: 606px;
    }
    .appfull_image figure figcaption {
        position: absolute;
        z-index: 3;
        padding: 2em;
        color: #000;
        text-transform: uppercase;
        font-size: 1.25em;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }
    .appfull_image figure figcaption:hover .s_img{
        opacity :1;
        -webkit-transform: translate3d(0,0,0);
        transform: translate3d(0,0,0);
    }
    
    .s_img{
        position: absolute;
        z-index: 99;
        opacity: 0;
        -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
        transition: opacity 0.35s, transform 0.35s;
        -webkit-transform: translate3d(0,20px,0);
        transform: translate3d(0,20px,0);
        overflow: auto;
        height: 500px;
    }
    .s_img a{
        cursor: pointer;
        margin-left:5px;
        margin-top:10px;
        display: inline-block;
    }
    #web_dialog{
        margin-top: 100px;
        width: 800px;
    }
    #app_dialog{
        margin-top:100px;
        width:550px;
    }
    .modal_img{
        z-index:1;
        height:500px;
        position: relative;
        border: 30px solid #000000;
        border-radius: 10px;
    }
    .appmodal_img{
        z-index: 1;
        height:700px;
        position:relative;
        border-top: 40px solid #000000;
        border-right: 15px solid #000000;
        border-left: 15px solid #000000;
        border-bottom: 55px solid #000000;
        border-radius: 20px;
    }
    #phone_button{
        z-index:2;
        position: relative;
        left:240px;
        top:-45px;
        width:40px;
        height:40px;
        border-radius: 50px;
        background-color: #FFFFFF;
        
    }
    
    .modal_left{
        text-align: center;
        z-index: 3;
        top:43px;
        left:15px;
        position: absolute;
        height:450px;
        width:100px;
        opacity: 0;
        background-color: #0f0f0f;
    }
    .modal_right{
        text-align: center;
        vertical-align: middle;
        z-index: 3;
        top:43px;
        right:15px;
        position: absolute;
        height:450px;
        width:100px;
        opacity: 0;
        background-color: #0f0f0f;
    }
    .modal_left:hover,
    .modal_right:hover{
        opacity: .5;
    }
    .modal_left_app{
        text-align: center;
        z-index: 3;
        top:43px;
        left:15px;
        position: absolute;
        height:650px;
        width:100px;
        opacity: 0;
        background-color: #0f0f0f;
        
    }
    .modal_right_app{
        text-align: center;
        vertical-align: middle;
        z-index: 3;
        top:43px;
        right:15px;
        position: absolute;
        height:650px;
        width:100px;
        opacity: 0;
        background-color: #0f0f0f;
    }
    .modal_left_app:hover,
    .modal_right_app:hover{
        opacity:.5;
    }
    
    .modal_img_view{
        width:710px;
        height: 440px;
    }
    .modal_appimg_view{
        width:488px;
        height:606px;
    }
    .a_tag{
        cursor: pointer;
    }
    #web_title{
        font-weight: lighter;
        text-align: center;
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

    .port_section{
        width: 1000px;
        height: auto;
        margin: 0 auto;
        margin-left:50px;
        background-color: rgba(255,255,255,0.5);
        box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
    }
    .subject{
        text-align: center;
        font-size: 40px;
        padding-top:80px;
    }
    .port_table{
        margin: 0 auto;
        width: 800px;
        border: 1px solid #000;
    }
    tr {
        border: 1px solid #000;
    }
    .td_left{
        width:200px;
        height: 80px;
        text-align: center;
        border: 1px solid #000;
    }
    #area{
        width: 600px;
        height: 200px;
        resize:none;
    }
    #date{
        width: 280px;
        display: inline-block;
    }
    img{
        width: 148px;
        height: 155px;
    }
    .s_image_box{
        margin-top:5px;
        margin-left:10px;
        display: inline-block;
        text-align: center;
        border: 1px solid #000;
        width: 152px;
        height: 160px;
    }
    .buttonWrap {
        position:relative;
        float:left;
        overflow:hidden;
        cursor:pointer;
        background-image:url('http://wstatic.naver.com/w9/btn_sch.gif');
        width:52px;
        height:40px;
    }
    .buttonWrap input {
        margin-left:-10px;
        filter:alpha(opacity=0);
        opacity:0;
        -moz-opacity:0;
        cursor:pointer;
        width:74px;
        height:20px;
    }
    #portfolio{
        width:1150px;
    }
    #port_dialog{
        width:1150px;
    }
</style>

<div class="animsition" data-animsition-in-class="fade-in-down" data-animsition-in-duration="1000" data-animsition-out-class="fade-out-down" data-animsition-out-duration="800">
    
    <?php if($port_info != null): ?>
    <div id="DB_banner3">
        <div class="DB_mask">
            <ul class="DB_imgSet">
                <?php foreach($port_info as $row): ?>
                <li><a onclick="slide_img('<?php echo e($row->mpf_num); ?>')" target="_self" style="cursor:pointer"><img class="image_slide" src="<?php echo e(asset('img/portfolio/'.$row->mpf_picture)); ?>" alt=""/></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <span class="DB_dir DB_prev glyphicon glyphicon-chevron-left"></span>
        <span class="DB_dir DB_next glyphicon glyphicon-chevron-right"></span>
    </div>
    <?php endif; ?>
    <?php if($port_info != null): ?>
    <div class="section">
        <div class="pf_subject">
            <h1 class="h1_pf_subject"><?php echo e($port_info[0]->mpf_subject); ?></h1>
        </div>
            <!-- web view -->
        <div class="image_box">
        <?php if($port_info[0]->mpf_division == 1): ?>
        <div class="full_image">
            <figure class="effect-bubba">
                <a href="#">
                    <img class="img" src="<?php echo e(asset('img/portfolio/'.$port_info[0]->mpf_picture)); ?>">
                </a>
                <figcaption>
                    <?php if($s_port_info !=null): ?>
                    <div class="s_img" >
                        <?php foreach($s_port_info as $row): ?>
                        <a onclick="web_img('<?php echo e($row->mpf_num); ?>','<?php echo e($row->pf_num); ?>')" class="a_tag"><img class="image_slide" src="<?php echo e(asset('img/portfolio/'.$row->pf_picture)); ?>"></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </figcaption>
            </figure>
        </div>
        <?php elseif($port_info[0]->mpf_division == 2): ?>
        <!-- app image -->
        <div class="appfull_image">
        <figure class="effect-bubba">
                <a href="#">
                    <img class="appfull_image" src="<?php echo e(asset('img/portfolio/'.$port_info[0]->mpf_picture)); ?>">
                </a>
                <figcaption>
                    <?php if($s_port_info !=null): ?>
                    <div class="s_img" >
                        <?php foreach($s_port_info as $row): ?>
                        <a onclick="app_img('<?php echo e($row->mpf_num); ?>','<?php echo e($row->pf_num); ?>')" class="a_tag"><img class="image_slide" src="<?php echo e(asset('img/portfolio/'.$row->pf_picture)); ?>"></a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </figcaption>
            </figure>
        </div>
        </div>
        <?php endif; ?>
        
        <div class="pf_content">
            <?php echo e($port_info[0]->mpf_content); ?>

        </div>
    </div>
    <?php elseif($port_info != null && $port_info[0]->mpf_division == 2): ?>

    <?php endif; ?>
    
    <!--Body End-->
    <?php if($m_num == Session::get('m_num')): ?>
    <!--<center>
        <div class="button">
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#port_modal">Portfolio追加</button>
        </div>
    </center>-->
<?php endif; ?>
</div>


<!-- Port_modal Start -->
    <div id="port_modal" class="modal fade" role="dialog">
        <div class="modal-dialog" id="port_dialog">
            <!-- Modal content-->
            <div class="modal-content" id="portfolio">
                
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
                <div class="modal-body">
                    
                    <div class="container">
                        <br><br><br><br>
                        <div class="port_section">
                            <div class="subject">
                                ポートフォリオ登録
                            </div>
                            <form action="/designer/portfolio_upload" method="post" enctype="multipart/form-data" id="port_upload">
                                <table class="port_table">
                                    <tr>
                                        <td class="td_left">タイトル</td>
                                        <td>
                                            <input class="form-control" type="text" name="subject">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_left">進行期限</td>
                                        <td>
                                            <input id="date" class="form-control" type="date" name="first_date">~<input id="date" class="form-control" type="date" name="second_date">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_left">内容</td>
                                        <td>
                                            <textarea id="area" class="form-control" name="content"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_left">分流</td>
                                        <td>
                                            <label class="radio-inline">
                                                <input type="radio" name="division" value="1">Web
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="division" value="2">App
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="td_left">イメージ
                                            <div style="margin-left: 65px; margin-top: 10px">
                                                <span class="buttonWrap" onclick="img_remove()">
                                                    <input type="file" name="images[]" id="images" multiple>
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h4 style="color: red;">
                                                    イメージをアップロドする時最初のイメージが代表イメージになります。</h4>
                                            </div>
                                            <div id="images-to-upload">
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <center>
                                    <input type="submit" class="form-control" value="업로드" style="width:100px;">
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    <!-- port_modal Modal End -->
    </div>
<?php if($port_info !=null): ?>
    <?php if($s_port_info !=null): ?>
        <!-- web modal start -->
        <div id="webModal" class="modal fade" role="dialog">
            <div class="modal-dialog" id="web_dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                        <h3 class="modal-title" id="web_title"><?php echo e($port_info[0]->mpf_subject); ?></h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?php echo e($port_info[0]->mpf_num); ?>" id="modal_body">
                        <input type="hidden" value="" id="LR_button">
                        <div class="modal_img">
                        </div>
                        <div style="margin: 0 auto; width: 50px; height: 80px; background-color: #0f0f0f">
                        </div>
                        <div style="margin: 0 auto; width: 300px; height: 20px; background-color: #0f0f0f">
                        </div>

                        <div class="modal_left" onclick="button('left')">
                            <i class="icon-chevron-left"></i>
                        </div>
                        <div class="modal_right" onclick="button('right')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- web modal end -->

        <!-- app modal start -->
        <div id="appModal" class="modal fade" role="dialog">
            <div class="modal-dialog" id="app_dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                        <h3 class="modal-title" id="web_title"><?php echo e($port_info[0]->mpf_subject); ?></h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" value="<?php echo e($port_info[0]->mpf_num); ?>" id="modal_body">
                        <input type="hidden" value="" id="LR_button">
                        <div class="appmodal_img">
                        </div>
                        <div id="phone_button">
                        </div>
                        <div class="modal_left_app" onclick="app_button('left')">
                            <i class="icon-chevron-left"></i>
                        </div>
                        <div class="modal_right_app" onclick="app_button('right')">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- app modal end -->

    <?php endif; ?>
<?php endif; ?>

<script>
    var fileCollection = new Array();
    $('#images').on('change',function(e){
        var files= e.target.files;
        $.each(files,function(i,file){
            fileCollection.push(file);
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                var img= e.target.result;
                var template =  '<div class="s_image_box" ondblclick="remove()"><img src="'+img+'">'+
                    '</div>';
                $('#images-to-upload').append(template);
                }
            });
        });
    
    function img_remove(){
        $('.s_image_box').remove();
    }

    function slide_img(mpf_num){
        $.ajax({
            url:'/designer/s_portfolio',
            data:{
                mpf_num:mpf_num
            },
            dataType:'json',
            type:'post',
            success:function(data){
                
                $('.h1_pf_subject').text(data.mpf_port_info[0].mpf_subject);
                
                $('.full_image').remove();
                $('.appfull_image').remove();
                $('.pf_content').remove();
                
                if(data.mpf_port_info[0].mpf_division == 1){
                
                    var item = $("<div class='full_image'><figure class='effect-bubba'><a href='#'><img class='img' src='http://133.130.120.89/img/portfolio/"+data.mpf_port_info[0].mpf_picture+"'</a><figcaption><div class='s_img'></div></figcaption></figure></div>").fadeIn(1000);  
                    $('.image_box').append(item);
                    
                }else if(data.mpf_port_info[0].mpf_division == 2){
                    
                    var item = $("<div class='appfull_image'><figure class='effect-bubba'><a href='#'><img class='p_img' src='http://133.130.120.89/img/portfolio/"+data.mpf_port_info[0].mpf_picture+"'</a><figcaption><div class='s_img'></div></figcaption></figure></div>").fadeIn(1000);
                    $('.image_box').append(item);
                }
                
                $('#web_title').text(data.mpf_port_info[0].mpf_subject);
                $('.section').append('<div class="pf_content">'+data.mpf_port_info[0].mpf_content+'</div>')

                if(data.mpf_port_info[0].mpf_division == 1){      
                    for(var i in data.s_port_info){                          
                        $('.s_img').append('<a class="a_tag" onclick="web_img('+data.s_port_info[i].mpf_num+','+data.s_port_info[i].pf_num+')"><img class="image_slide" src="http://133.130.120.89/img/portfolio/'+data.s_port_info[i].pf_picture+'"></a>');                        
                    }                       
                }else if(data.mpf_port_info[0].mpf_division == 2){
                    for(var i in data.s_port_info){
                      $('.s_img').append('<a class="a_tag" onclick="app_img('+data.s_port_info[i].mpf_num+','+data.s_port_info[i].pf_num+')"><img class="image_slide" src="http://133.130.120.89/img/portfolio/'+data.s_port_info[i].pf_picture+'"></a>');
                    }
                }
            }
        });
    }
    function app_img(mpf_num,pf_num){
        $.ajax({
            url:'/designer/s_img',
            data:{
                pf_num:pf_num,
            },
            type:'post',
            dataType:'json',
            success:function(data){
                $('#modal_body').attr('value',mpf_num);
                $('#LR_button').attr('value',data[0].pf_num);

                $('#appModal').modal('show');
                $('.appmodal_img img').remove();
                $('.appmodal_img').append("<img class='modal_appimg_view' src='http://133.130.120.89/img/portfolio/"+data[0].pf_picture+"'>");
            }
        });
    }
    
    function web_img(mpf_num,pf_num){
        $.ajax({
            url:'/designer/s_img',
            data:{
                pf_num:pf_num,
            },
            type:'post',
            dataType:'json',
            success:function(data){
                $('#modal_body').attr('value',mpf_num);
                $('#LR_button').attr('value',data[0].pf_num);

                $('#webModal').modal('show');
                $('.modal_img img').remove();
                $('.modal_img').append("<img class='modal_img_view' src='http://133.130.120.89/img/portfolio/"+data[0].pf_picture+"'>");
            }
        });
    }
    
    function button(value){
        var pf_num = $("#LR_button").val();
        var mpf_num = $("#modal_body").val();

        $.ajax({
            url:'/designer/LR_button',
            data:{
                pf_num:pf_num,
                mpf_num:mpf_num,
                value:value
            },
            type:'post',
            dataType:'json',
            success:function(data){
                $('.modal_img_view').remove();
                $('#myModal').modal('show');
                $('#LR_button').attr('value',data.pf_num);
                var picture=$("<img class='modal_img_view' src='http://133.130.120.89/img/portfolio/"+data.pf_picture+"'>").fadeIn(1000);
                $('.modal_img').append(picture);

            },error:function(data) {
                window.alert('写真がもうないです');

            }
        });
    }
    function app_button(value){
        var pf_num = $("#LR_button").val();
        var mpf_num = $("#modal_body").val();

        $.ajax({
            url:'/designer/LR_button',
            data:{
                pf_num:pf_num,
                mpf_num:mpf_num,
                value:value
            },
            type:'post',
            dataType:'json',
            success:function(data){
                $('.modal_appimg_view').remove();
                $('#myModal').modal('show');
                $('#LR_button').attr('value',data.pf_num);
                var picture=$("<img class='modal_appimg_view' src='http://133.130.120.89/img/portfolio/"+data.pf_picture+"'>").fadeIn(1000);
                $('.appmodal_img').append(picture);

            },error:function(data) {
                window.alert('写真がもうないです');

            }
        });
    }
    $('#DB_banner3').DB_slideMove({
        moveSpeed:10,
        overMoveSpeed:1,
        dir:'left',
        overAlpha:0.8
    });
    $('#DB_banner3').children().last().remove();
    
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