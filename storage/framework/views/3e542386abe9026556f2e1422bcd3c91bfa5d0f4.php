<link href="<?php echo e(asset('css/header.css')); ?>" rel="stylesheet">

<script>
    
    var socket = io.connect('http://133.130.120.89:3000');

    socket.on('note', function(data) {
        
        if ('<?php echo e(Session::get('m_num')); ?>' == data.receiver ) {
            $('#alertMsg').text('새로운 메세지가 도착했습니다.').slideDown();
            setTimeout(function() {$('#alertMsg').slideUp()}, 3000);
        }
        
    });
    
</script>

<style>
    
    .container {
        background-color: rgba(255,255,255,0.8);
    }
    
    .alert_message {
        border: 3px solid indianred;
    }
    
    .container content {
        resize: none;
    }
    
    body {
        padding-top: 80px !important;
        background: url(<?php echo e(asset('img/mainback.jpg')); ?>) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
    }

    #alertMsg {
        top: 90px;
        right: 20px;
        position: absolute;
        width: 250px;
        height: 60px;
        line-height: 60px;
        text-align: center;
        color: white;
        font-size: 15px;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: deepskyblue;
        box-shadow: 0px 0px 5px 3px rgba(100, 100, 100, 0.5);
        z-index: 99999;
        display: none;
    }
    #contractListBody {
        max-height: 500px;
        overflow-x: hidden;
        overflow-y: scroll;
    }
    .mainheader{
        
    }
</style>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Login</h4>
            </div>
            <form class="form-horizontal" action="/member/signin" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="m_id" name="m_id" placeholder="ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">PW</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="m_pw" name="m_pw" placeholder="PW" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-info" onclick="login()">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">ログオフ</h4>
            </div>
            <div class="modal-body">
                ログオフしますか？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <a href="/member/logout" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Join Modal -->
<div class="modal fade" id="joinModal" role="dialog">
    <div class="modal-dialog modal-sm">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Join</h4>
            </div>
            <form id="join_form" class="form-horizontal" action="/member/signup" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                <div class="modal-body">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <center>
                                <div class="btn-group" data-toggle="buttons">
                                    <label class="btn btn-info active">
                                        <input type="radio" name="div_member" id="option1" autocomplete="off" value="1" checked> Designer
                                    </label>
                                    <label class="btn btn-info">
                                        <input type="radio" name="div_member" id="option2" autocomplete="off" value="2"> Developer
                                    </label>
                                </div>
                            </center>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputID" class="col-sm-3 control-label">ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="m_id" id="inputID" placeholder="ID" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPW" class="col-sm-3 control-label">PW</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="m_pw" id="inputPW" placeholder="PW" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputName" class="col-sm-3 control-label">NAME</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="m_name" id="inputName" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputTel" class="col-sm-3 control-label">TEL</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="m_phone" id="inputTel" placeholder="Tel" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-sm-3 control-label">EMAIL</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="m_email" id="inputEmail" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputArea" class="col-sm-3 control-label">AREA</label>
                        <div class="col-sm-9">
                            <div class="form-group">
                                <select class="form-control" name="m_area" id="inputArea">
                                    <option>地域</option>
                                    <option>----------</option>
                                    <option>ソウル</option>
                                    <option>プサン</option>
                                    <option>テグ</option>
                                    <option>インチョン</option>
                                    <option>クァンジュ</option>
                                    <option>テジョン</option>
                                    <option>キョンギド</option>
                                    <option>カンウォンド</option>
                                    <option>チェジュ</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_btn" class="btn btn-info">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>

<!-- Message Modal -->
<div class="modal fade" id="msgModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Message</h4>
            </div>
            <div class="modal-body">
                <form>
                   <?php /* 보내는 사람 -> sender(int) id="sender"*/ ?>
                    <input type="hidden" id ="msgSender" name="sender" class="form-control"  value="<?php echo e(Session::get('m_num')); ?>">
                    <?php /*메시지를 Ajax를 사용하여 post형식으로  보내주기 위함 */ ?>
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                    <label for="name">받는 사람</label><br>
                    <?php /* 받는 사람 -> receiver(int)  id ="receiver" */ ?>
                    <input type="text" id ="msgReceiverName" class="form-control"  value="" readonly>
                    <input type="hidden" id ="msgReceiverNum" name="receiver" class="form-control"  value=""><br>

                    <label for="message">내용</label><br>
                    <textarea class="form-control" id="msgContent" name="msg_content" placeholder="메세지를 입력해주세요" rows="5"></textarea>
                </form>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit_message" class="btn btn-info">보내기</button>
            </div>
        </div>
    </div>
</div>

<div class="mainheader">
    
    <div id="alertMsg">새로운 메세지가 도착했습니다.</div>

    <!--<div id="hLeft">
        <div id="hTitle"><a href="/">Designer & Developer</a></div>
    </div>-->
    
    <div id="hCenter">
        <ul id="hContent">
            <li><a href="/projectList">Project</a><div class="hLine"></div></li>
            <li><a href="/">D&D<!--Designer & Developer--></a><div class="hLine"></div></li>
            <li><a href="/designer">Designer</a><div class="hLine"></div></li>
            <!--<?php if(!Session::has('m_info')): ?>
                <li><a href="#" onclick="window.alert('로그인 후 이용가능')">Work</a><div class="hLine"></div></li>
            <?php else: ?> <?php $result=Session::get('m_num')?>
                <li><a href="/work/choice_timeline/<?php echo e($result); ?>">Work</a><div class="hLine"></div></li>
            <?php endif; ?>-->
        </ul>
    </div>
    
    <div id="hRight">
        <ul id="hIcon">
            <?php if(!Session::has('m_info')): ?>
            <li><a data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-log-in"></span>&nbsp;login</a></li>
            <li><a data-toggle="modal" data-target="#joinModal"><span class="glyphicon glyphicon-edit"></span>&nbsp;join</a></li>
            <?php else: ?>
            <li><a href="/messageList/<?php echo e(Session::get('m_num')); ?>"><span class="glyphicon glyphicon-envelope"></span>&nbsp;message</a></li>
            <li><a href="/contractList"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;contract</a></li>
            <li><a data-toggle="modal" data-target="#logoutModal"><span class="glyphicon glyphicon-log-out"></span>&nbsp;logout</a></li>
            <?php /*<!-- div_member가 1이면 디자이너(designerpage)-->
                <?php if(Session::get('div_member') == 1): ?>
                    <li><a href="/designerpage"><span class="glyphicon glyphicon-cog"></span>&nbsp;mypage</a></li>
                <!-- div_member가 2이면 개발사(companypage)-->
                <?php elseif(Session::get('div_member') == 2): ?>
                    <li><a href="/companypage"><span class="glyphicon glyphicon-cog"></span>&nbsp;mypage</a></li>
                <?php endif; ?>*/ ?>
            
            <?php endif; ?>
        </ul>
    </div>

</div>

<div class="mHeader">

    <button id="mMenu"><span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span></button>
    <a href="/" id="mTitle">Designer & Developer</a>
    <button id="mLogin">
        <?php if(!Session::has('m_info')): ?>
        <span id="mMenuLogin" class="glyphicon glyphicon-minus" aria-hidden="true"></span> <?php else: ?>
        <span id="mMenuLogout" class="glyphicon glyphicon-minus" aria-hidden="true"></span> <?php endif; ?>
    </button>

</div>

<div id="mMenuBox">
    <a href="/projectList" class="btn btn-default">Project</a>
    <a href="/designer" class="btn btn-default">Desigener</a>
    <a href="/messageList/<?php echo e(Session::get('m_num')); ?>" class="btn btn-default">Message</a>
</div>

<div id="mMenuBg"></div>

<script>
    var global_id_check = false;

    $(function() {

        //$.ajaxSetup({ headers: { 'csrf_token' : '<?php echo e(csrf_token()); ?>' } });

        $('#inputID').keyup(function() {

            var form_data = {
                "m_id": $('#inputID').val(),
                "_token": '<?php echo e(csrf_token()); ?>'
            };

            $.ajax({
                url: '/member/id_check',
                dataType: 'json', //어떤 형식으로 응답받을 것인가?
                type: 'post', //어떤 형식으로 전달할 것인가?
                data: form_data, //객체형체로 기술
                success: function(data) { //서버가 리턴해준 값
                    global_id_check = data
                    if (data) {
                        $('#inputID').css('border', '1px solid red');
                        $('#inputID').css('box-shadow', '0 0 5px 0 red');
                    } else {
                        $('#inputID').css('border', '1px solid lightgreen');
                        $('#inputID').css('box-shadow', '0 0 5px 0 lightgreen');
                    }
                },
                error: function(err) {
                    $(".address").html(err.responseText);
                }
            })
        });

        $('#mMenu').on('click', function() {

            if ($('#mMenuBox').css('display') == 'none') {
                $('.glyphicon-menu-hamburger').addClass('glyphicon-remove').removeClass('glyphicon-menu-hamburger');
                $('#mMenuBg').show();
                $('#mMenuBox').slideDown('slow');
            } else if ($('#mMenuBox').css('display') == 'block') {
                $('.glyphicon-remove').addClass('glyphicon-menu-hamburger').removeClass('glyphicon-remove');
                $('#mMenuBox').slideUp('slow', function() {
                    $('#mMenuBg').hide();
                });
            }

        });

        $('#mMenuLogin').on('click', function() {

            if ($('#mMenuBox').css('display') == 'block') {
                $('.glyphicon-remove').addClass('glyphicon-menu-hamburger').removeClass('glyphicon-remove');
                $('#mMenuBox').slideUp('fast', function() {
                    $('#loginModal').modal();
                    $('#mMenuBg').hide();
                });
            } else {
                $('#loginModal').modal();
            }

        });

        $('#mMenuLogout').on('click', function() {
            if ($('#mMenuBox').css('display') == 'block') {
                $('.glyphicon-remove').addClass('glyphicon-menu-hamburger').removeClass('glyphicon-remove');
                $('#mMenuBox').slideUp('fast', function() {
                    $('#logoutModal').modal();
                    $('#mMenuBg').hide();
                });
            } else {
                $('#logoutModal').modal();
            }
        });
        
        $('.divMember').change(function() {
            
            if($(this).is(':checked')) {
                $(this).parent('label').css('background-color','deepskyblue');
            } else {
                $(this).parent('label').css('background-color','lightblue');
            }
            
        });
        
        $("#submit_message").click(function(){

            /*
            DB 저장 내용
            * msg_content : 메시지 내용
            * msg_date : 메시지 보낸 날짜/시간(자동)
            * receiver : 받는 사람
            * sender : 보내는 사람
            * checked : 읽은 상태
            */

            var receiver = $("#msgReceiverNum").val();
            var sender = $("#msgSender").val();
            var msg_content = $("#msgContent").val();


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
                    //var socket = io.connect('http://133.130.120.89:3000');
                    // socket.emit
                    // ('서버로 전송되는 변수이름',{지정한 변수이름:$arr['message'].$message,지정한 변수이름:$arr['receiver'].$receiver});
                    socket.emit('new_message', {msg_content : data_01.msg_content, receiver:data_01.receiver, sender : data_01.sender});
                    //window.open("about:blank","_self").close();
                    $(".containertent").val('');
                    $('#msgModal').modal('hide');
                },
                error: function(xhr, status, error) {
                    alert(error);
                }

            });

        });

    });
    
    function login() {

        var m_id = $('#m_id').val();
        var m_pw = $('#m_pw').val();

        $.ajax({
            url: '/android/login',
            data: {
                m_id: m_id,
                m_pw: m_pw
            },
            dataType: 'json',
            type: 'post',
            success: function(data) {
                android.test(data.m_id, data.m_num, data.m_token);
            },
            error(data) {
                android.test("안됨");

            }
        });
    }
</script>