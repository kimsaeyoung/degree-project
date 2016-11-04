<!DOCTYPE html>
<html>
<head>
   
    <meta charset="UTF-8">
    
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <title>D&D</title>

    <link rel="stylesheet" href="<?php echo e(asset('css/work.css')); ?>">
</head>
<body>
   
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div class="container">
        <form id="contractForm" action="/contractAccept" method="post">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" name="tmp_num" value="<?php echo e($result->tmp_num); ?>">
            <input type="hidden" name="pj_num" value="<?php echo e($result->pj_num); ?>">
            <input type="hidden" name="m_num" value="<?php echo e($result->m_num); ?>">
            <table>
                <tr>
                    <th>개발사</th>
                    <td><?php echo e($nameData->devel_name); ?></td>
                </tr>
                <tr>
                    <th>디자이너</th>
                    <td><?php echo e($nameData->design_name); ?></td>
                </tr>
                <tr>
                    <th>프로젝트</th>
                    <td><?php echo e($nameData->pj_title); ?></td>
                </tr>
                <tr>
                    <th>진행기간</th>
                    <td>
                        <input type="text" name="ct_start_date" value="<?php echo e($result->tmp_start_date); ?>" readonly>
                        &nbsp;~&nbsp;
                        <input type="text" name="ct_end_date" value="<?php echo e($result->tmp_end_date); ?>" readonly>
                    </td>
                </tr>
                <tr>
                    <th>계약금액</th>
                    <td><input type="text" name="ct_money" value="<?php echo e($result->tmp_money); ?>" readonly></td>
                </tr>
                <tr>
                    <th>프로젝트내용</th>
                    <td><input type="text" name="ct_content" value="<?php echo e($result->tmp_content); ?>" readonly></td>
                </tr>
                <tr>
                    <th colspan="2">
                        <input type="button" class="btn btn-default" value="취소">
                        <input type="submit" class="btn btn-info" value="계약">
                    </th>
                </tr>
            </table>
        </form>
    </div>
    
</body>
</html>