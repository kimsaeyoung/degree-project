<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <title>D&D</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }
        html, body {
            width: 100%;
            height: 100%;
        }
        .container {
            margin: 0 auto;
            width: 1000px;
            height: 500px;
            border: 1px solid black;
        }
        
        .timeline {
            width: 80%;
            float: left;
        }
        
        .tl_box {
            margin: 10px auto;
            padding: 10px 20px;
            width: 85%;
            height: 80px;
            border: 5px solid #213B96;
            border-radius: 10px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
        }
        
        .side_bar {
            width: 19%;
            float: right;
        }
        
        .side_box {
            margin: 10px auto;
            width: 90%;
            height: 100px;
            line-height: 100px;
            font-size: 30px;
            text-align: center;
            color: white;
            border-radius: 20px;
            box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.2), 0 3px 10px 0 rgba(0, 0, 0, 0.19);
        }
        
        .status {
            background-color: #FF7E4E;
        }
        
        .btn {
            cursor: pointer;
            background-color: #213B96;
        }
        
        .tl_date {
            font-size: 14px;
        }
        
        .tl_content {
            margin-top: 10px;
            font-size: 16px;
        }
    </style>
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
            <div class="side_box btn" onclick="window.alert('write')">글쓰기</div>
            <div class="side_box btn" onclick="window.alert('tool')">UID Tool</div>
        </div>
    </div>
    
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
</body>
</html>