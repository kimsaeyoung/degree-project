<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8"> <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <title>D&D</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/timeline.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/work.css')); ?>">

</head>

<body>
   
    <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
    <div class="container">

        <div class="side_bar">
            <div class="side_box status">진행중</div>

            <div class="side_box work_btn" onclick="window.alert('write')">글쓰기</div>
            <div class="side_box work_btn" onclick="window.location.href='https://133.130.120.89:1338'">UID Tool</div>
        </div>
        
        <br><br>

        <h2>Timeline</h2>

        <ul id='timeline'>
            <li class='work'>
                <input class='radio' id='work5' name='works' type='radio' checked>
                <div class="relative">
                    <label for='work5'>개발사 - 김세영</label>
                    <span class='date'>12 May 2013</span>
                    <span class='circle'></span>
                </div>
                <div class='content'>
                    <p>안녕하세요. 저는 dnd 개발사의 담당자 김세영입니다. 먼저 시안을 보내주시면 검토하겠습니다. dsflfkew7@naver.com 으로 보내주세요. 기한은 2016-06-10일까지 입니다
                    </p>
                </div>
            </li>
            <li class='work'>
                <input class='radio' id='work4' name='works' type='radio'>
                <div class="relative">
                    <label for='work4'>디자이너 - 심정훈</label>
                    <span class='date'>11 May 2013</span>
                    <span class='circle'></span>
                </div>
                <div class='content'>
                    <p>
                        안녕하세요. 디자이너 심정훈입니다. 잘부탁드립니다. 시안은 보냈습니다. 혹시 디자인기획서라든가 기타등의 서류를 보내주시기 바랍니다. 디자인 기획서가 없을 시, 보내드린 양식에 맞춰서 보내주세요. 감사합니다
                    </p>
                </div>
            </li>
            <li class='work'>
                <input class='radio' id='work3' name='works' type='radio'>
                <div class="relative">
                    <label for='work3'>Lorem ipsum dolor sit amet</label>
                    <span class='date'>10 May 2013</span>
                    <span class='circle'></span>
                </div>
                <div class='content'>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
                    </p>
                </div>
            </li>
            <li class='work'>
                <input class='radio' id='work2' name='works' type='radio'>
                <div class="relative">
                    <label for='work2'>Lorem ipsum dolor sit amet</label>
                    <span class='date'>09 May 2013</span>
                    <span class='circle'></span>
                </div>
                <div class='content'>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
                    </p>
                </div>
            </li>
            <li class='work'>
                <input class='radio' id='work1' name='works' type='radio'>
                <div class="relative">
                    <label for='work1'>Lorem ipsum dolor sit amet</label>
                    <span class='date'>06 May 2013</span>
                    <span class='circle'></span>
                </div>
                <div class='content'>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odio ea necessitatibus quo velit natus cupiditate qui alias possimus ab praesentium nostrum quidem obcaecati nesciunt! Molestiae officiis voluptate excepturi rem veritatis eum aliquam qui laborum non ipsam ullam tempore reprehenderit illum eligendi cumque mollitia temporibus! Natus dicta qui est optio rerum.
                    </p>
                </div>
            </li>

        </ul>

    </div>
    <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>

</html>