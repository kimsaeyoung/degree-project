<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>메시지</title>


    <style type="text/css">body { padding-top: 60px; }</style>

    <script>
        $(document).ready(function(){
            var currentPage = document.location.href;
            //현재 전체 주소를 가져온다. 예) http://www.naver.com

            currentPage = currentPage.slice(7);
            //slice를 이용하여 앞에 http:// 빼고 가져올 수 있다. slice는 특정 인덱스부터 잘라낸다.

            arr = currentPage.split("/");
            //URL의 "/" 뒤에 나오는 값을 화용하여 split 이용하여 자를 수 있다.

            currentPage = arr[2];
            //  "/"에서 자른 것들을 배열로 저장되는데 2로 하면 2번째 위치 값이 내가 얻고자하는 값이다.

            /*$('#receiver_message').val(currentPage);*/
            $('#receiver').val(currentPage);
        });
    </script>

</head>

<body>

    <div class="container">
        <div class="row">
            <div id="notif"></div>
            <div class="col-md-6 col-md-offset-3">
                <div class="well well-sm">
                    <form class="form-horizontal">
                        <fieldset>
                            <legend class="text-center">Contact us</legend>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">받는 사람</label>
                                <div class="col-md-9">

                                    <?php /* 받는 사람 -> receiver(int)  id ="receiver" */ ?>
                                    <input type="hidden" id ="receiver"class="form-control"  value="">
                                    <?php /* 보내는 사람 -> sender(int) id="sender"*/ ?>
                                    <input type="hidden" id ="sender"class="form-control"  value="<?php echo e($myid); ?>">

                                    <input type="text" class="form-control" value="<?php echo e($results[0]->m_name); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="message">Your message</label>
                                <div class="col-md-9">
                                    <?php /* 메시지 내용 -> msg_content  id ="msg_content" */ ?>
                                    <textarea class="form-control" id="msg_content" name="message" placeholder="메세지를 입력해주세요" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text-right">
                                    <?php /*메시지를 Ajax를 사용하여 post형식으로  보내주기 위함 */ ?>
                                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                    <button type="button" id="submit_message" class="btn btn-primary">보내기</button>

                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- End #messages -->

<script>

    $(document).ready(function(){

        $("#submit_message").click(function(){

            /*
            DB 저장 내용
            * msg_content : 메시지 내용
            * msg_date : 메시지 보낸 날짜/시간(자동)
            * receiver : 받는 사람
            * sender : 보내는 사람
            * checked : 읽은 상태
            */

            var receiver = $("#receiver").val();
            var sender = $("#sender").val();
            var msg_content = $("#msg_content").val();


            $.ajax({

                //laravel 은 X-CSRF-Token을 이용해 post를..
                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                type: "POST",
                url: '<?php echo route('message_save'); ?>',
                data: { 'receiver' : receiver, 'msg_content' : msg_content, 'sender' : sender },
                datatype : "json",
                success: function(data){

                    //alert(data);
                    // 묶여져있던 JSON을 parse를 이용해 풀어줌
                    var data_01 = JSON.parse(data);
                    //alert(data_01.sender);

                    //nodeServer 연결 : connect
                    var socket = io.connect('http://133.130.120.89:3000');
                    // socket.emit
                    // ('서버로 전송되는 변수이름',{지정한 변수이름:$arr['message'].$message,지정한 변수이름:$arr['receiver'].$receiver});
                    socket.emit('new_message', {msg_content : data_01.msg_content, receiver:data_01.receiver, sender : data_01.sender});
                    window.open("about:blank","_self").close();
                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });

        });

    });
</script>
</body>
</html>