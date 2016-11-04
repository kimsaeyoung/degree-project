<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<style>
    
    @media  screen and (max-width:500px) {
        .container {
            width: 100% !important;
        }
        #msgTitle {
            display: none;
        }
        .left_side_menu {
            display: none !important;
        }
        #msgList {
            padding: 0 !important;
            width: 100% !important;
        }
        #mbt_sender, .msg_sender {
            width: 30% !important;
        }
        #mbt_content, .msg_content {
            width: 70% !important;
            border: none !important;
            border-radius: 0px 5px 5px 0px !important;
        }
        #mbt_date, .msg_date {
            display: none !important;
        }
    }
    @media  screen and (min-width:501px) {
    }
    
    .container {
        margin: 10px auto;
        padding: 10px;
        width: 1000px;
        height: auto;
    }
    
    #msgTitle{
        margin-bottom: 20px;
        width: 100%;
        height: auto;
        border: 0.5px solid lightgray;
        border-radius: 5px;
    }

    #msgTitle * {
        display: inline-block;
    }

    #msgTitle h1{
        margin: 0;
        padding: 5px 10px;
        display: block;
        width: 100%;
        font-size: 20px;
        border-radius: 5px 5px 0px 0px;
        background-color: lightblue;
        color: white;
    }

    #msgTitle h5 {
        padding: 0px 10px;
    }

    #msgTitle #btn_write {
        margin: auto 7px;
        margin-top: 5px;
        width: 97px;
        height: 26px;
        font-size: 14px; 
        line-height: 16px;
        color: black;
        background-color: transparent;
        box-shadow: 0px 0px 2px 1px lightblue;
    }
    
    #custom-search-form {
        margin:0;
        margin-top: 5px;
        margin-right: -15px;
        padding: 0;
    }

    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */

        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-transition: width  0.2s ease-in-out;
        -moz-transition:width  0.2s ease-in-out;
        -o-transition: width  0.2s ease-in-out;
        transition: width  0.2s ease-in-out;
    }

    #custom-search-form button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        /* IE7-8 doesn't have border-radius, so don't indent the padding */
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
    
    .left_side_menu{
        float: left;
        display: inline-block;
        width: 20%;
        text-align: center;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    
    .side_menu_title {
        margin:0 auto 0;
        padding: 5px 0;
        display: inline-block;
        text-align: center;
        width: 100%;
        font-size: 17px;
        background-color: lightblue;
    }
    
    .list_box {
        position: relative;
        padding: 10px;
        width: 100%;
        height: auto;
    }
    
    .list_box label {
        position: relative;
        margin: 5px 0;
        width: 100%;
        height: 30px;
        text-align: center;
        line-height: 30px;
        border: 0.5px solid lightblue;
        border-radius: 5px;
    }
    
    .chk_info {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        cursor: pointer;
    }
    
    #msgList {
        display: inline-block;
        margin: 0;
        padding: 0;
        padding-left: 20px;
        width: 80%;
    }
    
    #msgBoxTitle {
        width: 100%;
        height: 40px;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    
    #msgBoxTitle * {
        float: left;
        font-size: 18px;
        line-height: 40px;
        text-align: center;
        height: 100%;
        border-right: 1px solid white;
        background-color: lightblue;
    }
    
    #msgBoxTitle #mbt_sender {
        border-radius: 5px 0px 0px 5px;
        width: 15%;
    }
    
    #msgBoxTitle #mbt_content {
        width: 60%;
    }
    
    #msgBoxTitle #mbt_date {
        width: 25%;
        border: none;
        border-radius: 0px 5px 5px 0px;
    }
    
    .msgBox {
        margin-top: 10px;
        width: 100%;
        height: 50px;
        border: 1px solid lightgray;
        border-radius: 5px;
    }
    
    .msgBox * {
        float: left;
        font-size: 18px;
        line-height: 40px;
        text-align: center;
        height: 100%;
        border-right: 1px solid white;
        background-color: transparent;
    }
    
    .msgBox .msg_sender {
        border-radius: 5px 0px 0px 5px;
        width: 15%;
    }
    
    .msgBox .msg_content {
        padding: 0 10px;
        text-align: left;
        width: 60%;
        white-space:nowrap; 
        overflow:hidden;
        text-overflow: ellipsis;
    }
    
    .msgBox .msg_date {
        width: 25%;
        font-size: 15px;
        border: none;
        border-radius: 0px 5px 5px 0px;
    }

</style>

<script>
    
    socket.on('note', function(data){
        if('<?php echo e(Session::get('m_num')); ?>' == data.receiver) location.reload();
    });

</script>

<div class="container">

    <div id="msgTitle">
       
        <h1>메세지</h1>
        <h5>&nbsp;</h5>

        <form id="custom-search-form" class="form-search form-horizontal pull-right" action="/designer/search" method="post">
            <div class="input-append spancustom">
                <input type="text" class="search-query" name="m_name" placeholder="Search..">
                <button type="submit" class="btn btn-default">
                    <i class="glyphicon glyphicon-search"></i>
                </button>
            </div>
        </form>

    </div>
    
    <div class="left_side_menu">

        <div class="side_menu_title">메세지 정렬</div>

        <div class="list_box">
            <?php if(!empty($senders)){ for($i = 0 ; $i < count($senders) ; $i++) { ?>
            <label><input class="chk_info" type="radio" name="sender" value="<?php echo e($senders[$i]->sender); ?>" onclick="chk_info(<?php echo e($senders[$i]->sender); ?>)"><?php echo e($senders[$i]->m_name); ?></label>
            <?php } } ?>
        </div>
    </div>
    
    <div id="msgList">
        <div id="msgBoxTitle">
            <div id="mbt_sender">보낸사람</div>
            <div id="mbt_content">내용</div>
            <div id="mbt_date">날짜</div>
        </div>
        <?php if(!empty($results)){ for($i = 0 ; $i < count($results) ; $i++) { ?>
        <form class="msgBox" onclick="javascript:readCheck( <?php echo e($results[$i]->msg_num); ?> , <?php echo e($results[$i]->receiver); ?> , <?php echo e($results[$i]->sender); ?>, '<?php echo e($results[$i]->m_name); ?>');" style="
        <?php if($results[$i]->checked==0): ?> background-color:lightgray <?php else: ?> background-color:lightblue <?php endif; ?>">
            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
            <input type="hidden" id="msg_num" value="<?php echo e($results[$i]->msg_num); ?>"/>
            <input type="hidden" id="receiver" value="<?php echo e($results[$i]->receiver); ?>"/>
            <div class="msg_sender"><?php echo e($results[$i]->m_name); ?></div>
            <div class="msg_content"><?php echo e($results[$i]->msg_content); ?></div>
            <div class="msg_date"><?php echo e($results[$i]->msg_date); ?></div>
        </form>
        <?php } } ?>
    </div>
</div>


<script>
    
    function chk_info(sender){
        $.ajax({
            headers:
            {
            'X-CSRF-Token': $('input[name="_token"]').val()
            },
            url:'/message/one_message',
            data:{
                sender:sender
            },
            dataType:'json',
            type:'post',
            success:function(data){
                $('.msgBox').remove();
                for(var i=0; i<data['data'].length; i++)
                    {
                        $('#msgList').append(data['data'][i]);
                    }
            },
            error:function(data){
                window.alert('ddddd');

            }

        });
    }
    
    function readCheck(msg_num, receiver, sender, m_name) {

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
            
                $('#msgReceiverNum').val(sender);
                $('#msgReceiverName').val(m_name);
                $('#msgModal').modal();

            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }

        });

    };
    
</script>