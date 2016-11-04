<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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

    ul {
        padding: 0em;
    }

    ul li, ul li ul li {
        position:relative;
        top:0;
        bottom:0;
        padding-bottom: 7px;

    }

    ul li ul {
        margin-left: 4em;
    }

    li {
        list-style-type: none;
    }

    li a {
        padding:0 0 0 10px;
        position: relative;
        top:1em;
    }

    li a:hover {
        text-decoration: none;
    }

    a.addBorderBefore:before {
        content: "";
        display: inline-block;
        width: 2px;
        height: 28px;
        position: absolute;
        left: -47px;
        top:-16px;
        border-left: 1px solid gray;
    }

    li:before {
        content: "";
        display: inline-block;
        width: 25px;
        height: 0;
        position: relative;
        left: 0em;
        top:1em;
        border-top: 1px solid gray;
    }

    ul li ul li:last-child:after, ul li:last-child:after {
        content: '';
        display: block;
        width: 1em;
        height: 1em;
        position: relative;
        background: #fff;
        top: 9px;
        left: -1px;
    }
    a {
        color: black;
    }

    a:hover {
        color: black;
        text-decoration: none;
    }

    a:active {
        text-decoration: none;
    }

    a:visited {
        text-decoration: none;
    }


    .little_menu a {
        margin-right: 10px;
    }

    .container {
        margin: 0 auto;
        width: 1000px;
        height: 2500px;
    }

    #btn_write{
        display: inline-block;
        float:right;
        padding : 5px;
        width : 10%;
        color:#CCCCCC;
        background-color: #213B96;
    }

    .p{
        margin:0 auto;
        display:table-cell;
        text-align:left;
        vertical-align:middle;
    }

    .a_div{
        text-align:right;
        margin-top: 30px;
        margin-left : 10px;
        margin-bottom : 22px;
        border: 2px solid;
        width:70%;
        height:250px;
    }

    .left_side_menu{
        float: left;
        margin-top: 12px;
        display: inline-block;
        height: 2100px;
        width: 28%;
        text-align: center;

    }

    .left_side_menu_a{
        border-width: thin;
        border-style: solid;
        height: 80px;
    }

    .left_side_menu_b{
        border-width: thin;
        border-style: solid;
        height: 580px;
        text-align: left;
        padding-left: 20px;
    }
    .left_side_menu_c{
        border-width: thin;
        border-style: solid;
        height: 80px;
        text-align: center;

    }

    #title{
        margin:0 auto;
        width:1000px;
        margin-left:-15px;
    }

    .db_data_form{
        text-align: left;
    }


    .circle{
        text-align: center;
        display:inline-block;
        margin:0 auto 0;
        margin-top: 5px;
    }
    .div_2_a{
        display:inline-block;
        margin-right:1px;
        width:90px;
        height:80px;

        text-align:center;
        padding:4px;
        text-decoration: black solid;

    }


    .circle {
        width:50px;
        height:50px;
        border-radius:25px;
        -moz-border-radius : 25px;
        -webkit-border-radius : 25px;
        -ms-border-radius :25px;
        -khtml-border-radius : 25px;
        -o-border-radius :25px;
        background:#66F;
        font:normal 11px/50px "나눔고딕", "돋움", "굴림";
        color:#fff;
        text-align:center;
    }

    .div_3{
        font-size: 16px;
        margin-left: 18px;
        width: 95%;
        margin-top: 10px;
        display: inline-block;
        text-align: left;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 3; /* 라인수 */
        -webkit-box-orient: vertical;
        word-wrap:break-word;
        line-height: 1.3em;
        height: 3.9em; /* line-height 가 1.2em 이고 3라인을 자르기 때문에 height는 1.2em * 3 = 3.6em */
    }

    .div_4 {
        margin-top: 3px;
        text-align: left;
        display: inline-block;
        font-size: 16px;
        width: 95%;
    }

    .pagenate{
        list-style: none;
        text-align: center;
    }

    .step .col-md-2 {
        background-color: #fff;
        border: 1px solid #C0C0C0;
        border-right: none;
    }

    .step .col-md-2:last-child {
        border: 1px solid #C0C0C0;
    }

    .step .col-md-2:first-child {
        border-radius: 5px 0 0 5px;
    }

    .step .col-md-2:last-child {
        border-radius: 0 5px 5px 0;
    }

    .step .col-md-2:hover {
        color: #F58723;
        cursor: pointer;
    }

    .step .activestep {
        color: #F58723;
        height: 100px;
        margin-top: -7px;
        padding-top: 7px;
        border-left: 6px solid #5CB85C !important;
        border-right: 6px solid #5CB85C !important;
        border-top: 3px solid #5CB85C !important;
        border-bottom: 3px solid #5CB85C !important;
        vertical-align: central;
    }

    .step .fa {
        padding-top: 15px;
        font-size: 40px;
    }

    .label.label-default{
        font-size: 12px;
    }

</style>
<div class="container">
    <a href="/designer/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">포트로그</a>
    <a href="/designerpage/pf_modifyView/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">포트폴리오 등록</a>
    <?php $result=Session::get('m_num')?>
    <a href="/designerpage/project/<?php echo e($result); ?>" id="sub_menu_btn" class="btn btn-default">지원한 프로젝트</a>
    <br>
    <br><br><br>



    <div id="main">

        <?php foreach($results as $result): ?>
            <?php if($result): ?>

                <div class="a_div" style="text-align: center">
                    <div class="div_1" style="text-align: left">
                <span class="db_data_form" style="font-size: 35px;">
                     <a href="<?php echo route('projectView/{pj_num}',$result->pj_num); ?>">

                         <?php echo e($result->pj_title); ?>

                     </a>
                </span>
                    </div>

                    <div class="div_1_a">
                        <div class="div_pj_date" style="float: right; margin-top: -50px">
                            <ul><span class="glyphicon glyphicon-yen"></span>등록일자 : <?php echo e($result->created_at); ?> </ul>
                        </div>
                    </div>
                    <div style="width:100%;height:2px;margin:1px 0;background-color:#000;"></div>
                    <div class="div_2" style="text-align: center">
                        <div class="div_2_a"><span>대_카테고리</span><div class="circle">웹</div></div>
                        <div class="div_2_a">소_카테고리<div class="circle" style="background-color: #8c8c8c">은행</div></div>
                        <div class="div_2_a">마감일<div class="circle"><?php /*<?php echo e($result->pj_date); ?>*/ ?>5/14</div></div>
                        <div class="div_2_a">예상기간<div class="circle"><?php echo e($result->expect_date); ?></div></div>
                        <div class="div_2_a">모집인원<div class="circle"><?php echo e($result->pj_people); ?></div></div>
                        <div class="div_2_a">지 역<br><div class="circle"><?php echo e($result->pj_area); ?></div></div>
                        <div class="div_2_a" style="border: none">진행상태<div class="circle">진행중</div></div>
                    </div>
                    <div style="width:100%;height:2px;margin:1px 0;background-color:#000;"></div>
                    <div class="div_3">
                        <?php echo e($result->pj_content); ?>


                    </div>
                    <div style="width:100%;height:2px;margin:1px 0;background-color:#000;"></div>

                    <div class="div_4" style="text-align: left;  margin-left: 15px" >
                        <span class="glyphicon glyphicon-yen"></span><span style="border-right: 1px solid; padding-right: 10px">예상금액 : <?php echo e($result->pj_price); ?></span>
                        <div class="glyphicon glyphicon-pencil" style="margin-top: -100px">요구기술</div>
                        <?php /* <?php foreach($pj_tech as $row): ?>
                             <?php if($result->pj_num == $row->pj_num ): ?>*/ ?>
                        <span class="label label-default" style="margin-left: 5px">
                                 php
                                </span>
                        <?php /* <?php endif; ?>
                     <?php endforeach; ?>*/ ?>
                    </div>
                </div>


            <?php endif; ?>
        <?php endforeach; ?>

    </div>
    <div class="pagenate" style=" margin-top: 20px;">
        <?php /* <?php echo $results->render(); ?>*/ ?>
    </div>
</div>





<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>