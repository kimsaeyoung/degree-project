<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>

    .container {
        margin-top: 20px;
    }
    
    #ctlTitle {
        width: 100%;
        height: 60px;
        border: none;
        border-radius: 5px 5px 0px 0px;
        background-color: lightblue;
    }
    
    #ctlTitle h2 {
        margin: 0;
        padding: 10px;
        width: 100%;
        height: 100%;
    }
    
    #ctlBox {
        padding: 20px;
        width: 100%;
        height: auto;
        border: 1px solid lightgray;
        border-radius: 0px 0px 5px 5px;
    }
    
    .pjBox {
        display: inline-block;
        padding: 20px;
        width: 33%;
        height: 200px;      
    }
    
    .pjBox a {
        color: black;
        text-decoration: none;
    }
    
    .pjTextBox {
        padding: 10px;
        width: 100%;
        height: 100%;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: aliceblue;
    }
    
    .pjBox .pjTextBox h4{
        padding: 5px;
        margin: 0;
        margin-top: 5px;
        width: 100%;
        font-weight: bold;
    }
    
    .pjBox .pjTextBox h4:nth-child(even){
        padding-left: 15px;
        font-size: 16px;
        font-weight: lighter;
    }
</style>

<div class="container">
  
    <div id="ctlTitle">
        <h2>진행중인 프로젝트</h2>
    </div>
    <div id="ctlBox">
        <?php foreach($results as $result): ?>
        <?php if($result): ?>
        <div class="pjBox">
            <a href="/work/<?php echo e($result->pj_num); ?>">
                <div class="pjTextBox">
                    <h4>프로젝트명</h4>
                    <h4><?php echo e($result->pj_title); ?></h4>
                    <h4>개발기간</h4>
                    <h4><?php echo e($result->pj_date); ?></h4>
                </div>
            </a>
        </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>

</div>
