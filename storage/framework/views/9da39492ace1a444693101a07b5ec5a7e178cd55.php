<!DOCTYPE html>
<html lang="en">
<head>
   
    <meta charset="UTF-8">
    
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <title>D&D</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/work.css')); ?>">
    
</head>
<body>
   
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div class="container">
        <div class="timeline">
            <div class="tl_box">
                <p class="tl_date">2015-11-11</p>
                <p class="tl_content">회의내용</p>
            </div>
            <div class="tl_box"></div>
            <div class="tl_box"></div>
            <div class="tl_box"></div>
        </div>
        <div class="side_bar">
            <div class="side_box status">진행중</div>
            <div class="side_box status">계약금 완료</div>
            <div class="side_box work_btn" onclick="window.alert('write')">글쓰기</div>
            <div class="side_box work_btn" onclick="window.location.href='https://133.130.120.89:1338'">UID Tool</div>
        </div>
    </div>
    
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
</body>
</html>