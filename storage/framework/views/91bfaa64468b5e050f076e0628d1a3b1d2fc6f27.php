

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
        <?php foreach($results as $result): ?>
            <?php if($result): ?>
        <a href="/designer/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">포트로그</a>
        <a href="/designerpage/pf_modifyView/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">포트폴리오 등록</a>
        <a href="/designerpage/project/<?php echo e($result->m_num); ?>" id="sub_menu_btn" class="btn btn-default">지원한 프로젝트</a>
        <!-- 디자이너 개인정보  -->
<br><br><br><br>
<h1>

                <img src="<?php echo e(asset('img/member_face/'.$result->m_face)); ?>" id="face_img" style="width: 300px; height: 300px;"><br>
                디자이너 이름 : <?php echo e($result->m_name); ?> <br>
                연락처 : <?php echo e($result->m_phone); ?> <br>
                이메일 : <?php echo e($result->m_email); ?> <br>
                지역 : <?php echo e($result->m_area); ?> <br>
                소개 : <?php echo e($result->ds_info); ?> <br>



            <?php endif; ?>
        <?php endforeach; ?>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>