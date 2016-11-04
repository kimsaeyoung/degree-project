<html>
<head>
<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script src="<?php echo e(asset('js/moment.js')); ?>"></script>
</head>
<body>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<script>

    $(document).ready(function() {
        $('#calendar').fullCalendar({
            defaultView: 'agendaDay',
            header: {
                left: 'prev, next today',
                center : 'title',
                right: 'month, basicWeek, agendaDay'
            },
            height: 560,
            editable: true,
            defaultDate: '2016-05-12',
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: '대구은행 사이트 구축  - 김세영 디자이너 미팅',
                    start: '2016-05-12T09:40:00',
                    end: '2016-05-12T11:30:00'
                },
                {
                    title: '홍대성 디자이너 면접',
                    start: '2016-05-12T11:30:00',
                    end: '2016-05-12T12:30:00'
                },
                {
                    title: '주창민 디자이너 면접',
                    start: '2016-05-12T14:30:00',
                    end: '2016-05-12T15:30:00'
                },
                {
                    title: '심정훈 디자이너 면접',
                    start: '2016-05-12T16:30:00',
                    end: '2016-05-12T17:30:00'
                },

                {
                    title: 'Lunch',
                    start: '2016-05-12T13:00:00',
                    end: '2016-05-12T14:00:00'
                },

            ]

        });
    });

</script>


<div class="container">
    <a href="/companypage/calendar" id="sub_menu_btn" class="btn btn-default">일정관리 </a>
    <a href="/companypage/modify/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">회사정보 수정</a>
    <a href="/companypage/designer/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">지원한 디자이너</a>
    <a href="/companypage/development" id="sub_menu_btn" class="btn btn-default">등록 프로젝트</a>


    <div id='calendar'></div>

    <script src="<?php echo e(asset('js/fullcalendar.js')); ?>"></script>




<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>