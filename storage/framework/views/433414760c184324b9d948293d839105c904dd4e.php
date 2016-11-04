
<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>

</style>
<script>

  var socket = io.connect('http://133.130.120.89:3000');
    socket.on('note', function(data){
        if('<?php echo e(Session::get('m_num')); ?>' == data.receiver)
        {
            alert(data.msg_content);
            location.reload();

        }
    });


    function readCheck(msg_num, receiver) {

        $.ajax({

            headers:
            {
                'X-CSRF-Token': $('input[name="_token"]').val()
            },
            type : 'POST',
            url: '<?php echo route('Message_checked'); ?>',
            data: { 'msg_num' : msg_num, 'receiver' : receiver },
            datatype : "json",
            success:function(data) {
                var data_01 = JSON.parse(data);

                alert(data_01.msg_content);
                //alert(data_01.msg_date);
                //alert(data_01.sender);
                //alert(data_01.count);

                location.reload(); //새로고침

                window.open('/message/'+data_01.sender, 'sender', 'width=500, height=500, scrollbars=0, resizable=0');

                //nodeServer 연결 : connect
                var socket = io.connect('http://133.130.120.89:3000');

                // socket.emit
                socket.emit('second_message', {msg_content : data_01.msg_content,
                                            sender : data_01.sender,
                                            count : data_01.count,
                                            msg_date : data_01.msg_date
                                            });

            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }

        });

    };



</script>

<div class="container">


    <section id="main-content">
        <section class="wrapper">
            <div class="col-lg-9 main-chart">

                <div class="container">
                    <div id="new-message-notif"></div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="mytable" class="table table-bordred table-striped">
                                <thead>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Date</th>
                                <th>Read</th>
                                </thead>

                                <tbody id="message-tbody">

                                <?php
                                if(!empty($results)){

                                for($i = 0 ; $i < count($results) ; $i++) {
                                 ?>

                                <tr>

                                    <!-- 보낸사람 -->
                                    <!--일단 지금 sender 은 int 형으로서 ajax를 통해서 회원 이름을 찾아야함 -->
                                    <td><?php echo e($results[$i]->sender); ?></td>

                                    <!-- 내용 -->
                                    <td>
                                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                        <input type="hidden" id="msg_num" value="<?php echo e($results[$i]->msg_num); ?>"/>
                                        <input type="hidden" id="receiver" value="<?php echo e($results[$i]->receiver); ?>"/>

                                    <span id="msg_content" onclick="javascript:readCheck( <?php echo e($results[$i]->msg_num); ?> , <?php echo e($results[$i]->receiver); ?> );"><?php echo e($results[$i]->msg_content); ?></span>
                                        </input>
                                    </td>

                                    <!-- 보낸날짜 -->
                                    <td><?php echo e($results[$i]->msg_date); ?></td>
                                    <!--상세보기기-->
                                   <td>

                                       <?php if($results[$i]->checked==0): ?>
                                           <h4>X</h4>
                                           <?php else: ?>
                                           <h4>O</h4>
                                           <?php endif; ?>



                                    </td>
                                </tr>

                                <?php }?>

                                <?php }?>

                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>



<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>