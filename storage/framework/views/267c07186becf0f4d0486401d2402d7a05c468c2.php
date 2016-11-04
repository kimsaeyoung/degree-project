<!DOCTYPE html>
<html>
<head>
    <?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php /*<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>*/ ?>

    <title>메시지</title>


    <style type="text/css">body { padding-top: 60px; }</style>

</head>

<body>
<script>


</script>


<div class="container">
    <div class="row">
        <div id="notif"></div>
        <div class="col-md-6 col-md-offset-3">
            <div class="well well-sm">
                <form class="form-horizontal">
                    <fieldset>
                        <legend class="text-center">TimeLine 글 쓰기</legend>
                        <div class="form-group">
                            <div class="col-md-9">
                                <label class="col-md-3 control-label" for="tI_content">프로젝트 명</label>
                                <?php echo e($result[0]->pj_title); ?>

                                <input type="hidden" id ="pj_num" class="form-control" value="<?php echo e($result[0]->pj_num); ?>"/></input>
                                <br>
                                <label class="col-md-3 control-label" for="tI_content">작성자</label>
                                <?php echo e(Session::get('m_name')); ?>

                                <?php $put=Session::get('m_num')?>
                                <input type="hidden" id ="m_num" class="form-control" value="<?php echo e($put); ?>"> </input>
                                <br>
                                <?php /*<label class="col-md-3 control-label" for="tI_content" >작성시간</label>
                                <input type="date" id="tI_date"class="form-control" MAXLENGTH="5" value=""> </input>*/ ?>

                            </div>
                        </div>
                        <div class="form-group">
                                <label class="col-md-3 control-label" for="tI_content">글 내용</label>
                            <div class="col-md-9">
                                <textarea class="form-control" id="tI_content" name="tI_content" placeholder="내용입력" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12 text-right">

                                <?php /*메시지를 Ajax를 사용하여 post형식으로  보내주기 위함 */ ?>
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <button type="button" id="submit_write" class="btn btn-primary">글 등록</button>

                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

<script>

   $(document).ready(function(){

        $("#submit_write").click(function(){


            var pj_num = $("#pj_num").val();
            var tI_content = $("#tI_content").val();
            var tI_date = $("#tI_date").val();
            var m_num = $("#m_num").val();

            $.ajax({

                headers:
                {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                },
                type: "POST",
                url: '<?php echo route('timeline_save'); ?>',
                data: { "pj_num" : pj_num, "tI_content" : tI_content, "m_num" : m_num},

                cache : false,
                success: function(data){
                    alert('글이 저장되었습니다');
                    self.close();
                    opener.location.reload();     // 부모창 새로 고침
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