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

</style>

        <div class="container">
            <a href="/companypage/calendar" id="sub_menu_btn" class="btn btn-default">일정관리 </a>
            <a href="/companypage/modify/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">회사정보 수정</a>
            <a href="/companypage/designer/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">지원한 디자이너</a>
            <a href="/companypage/development" id="sub_menu_btn" class="btn btn-default">등록 프로젝트</a>
            <?php /*<?php echo e($result->cp_info); ?>

            <?php echo e($result->cp_represent); ?>*/ ?>
                    <!-- 회사정보 불러오기 -->

        <br><br><br><br> <br><br><br><br>
<?php foreach($results as $result): ?>
    <?php if($result): ?>
        <h1>
            <img src="<?php echo e(asset('img/member_face/'.$result->m_face)); ?>" id="face_img" style="width: 300px; height: 300px;"><br>
            회사 이름 : <?php echo e($result->m_name); ?> <br>
            대표 성함 : <?php echo e($result->cp_represent); ?> <br>
            연락처 : <?php echo e($result->cp_tel); ?> <br>
            이메일 : <?php echo e($result->m_email); ?> <br>
            지역 : <?php echo e($result->m_area); ?> <br>
            회사 정보 <?php echo e($result->cp_info); ?> <br>
        </h1>

    <?php endif; ?>
<?php endforeach; ?>


<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>