<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
    #sub_menu_btn{
        margin-right: 20px;
        margin-left: 20px;
        margin-top: 20px;
        display: inline-block;
        float: left;
        width: 19%;
        color: black;
    }
    .subject{
        border-bottom: 3px solid #ff6666;
    }

    .info {
        width: 300px;
        height: 400px;
        display: inline-block;
    }
    .wrapper{
        width:400px;
        height: 400px;
        display: inline-block;
    }
    .td_left{
        text-align: center;
        border-right: 3px solid #000;
        border-bottom: 3px solid #000;
        width:150px;
        font-size:25px;
    }
    .td_right{
        border-bottom: 3px solid #000;
    }
    #table{
        margin-top:30px;
        width: 570px;
        height: 400px;
        margin-left: 20px;
    }
    #comment{
        resize: none;
    }

    #face_img{
        margin-top:30px;
        margin-left:20px;
        width: 350px;
        height: 350px;
        border-radius: 20px;
        border:solid 1px #000;
    }

</style>
<div class="container">
    <a href="/companypage/calendar" id="sub_menu_btn" class="btn btn-default">일정관리 </a>
    <a href="/companypage/modify/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">회사정보 수정</a>

    <a href="/companypage/designer/<?php echo e(Session::get('m_num')); ?>" id="sub_menu_btn" class="btn btn-default">지원한 디자이너</a>
    <a href="/companypage/development" id="sub_menu_btn" class="btn btn-default">등록 프로젝트</a>


<br><br>

    <?php foreach($results as $result): ?>
        <?php if($result): ?>

    <form action="/companypage/update" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <h2 class="subject">정보</h2>
        <script>
            $(document).ready(function(){
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader(); //파일을 읽기 위한 FileReader객체 생성
                        reader.onload = function (e) {
                            //파일 읽어들이기를 성공했을때 호출되는 이벤트 핸들러
                            $('#face_img').attr('src', e.target.result);
                            //이미지 Tag의 SRC속성에 읽어들인 File내용을 지정
                            //(아래 코드에서 읽어들인 dataURL형식)
                        }
                        reader.readAsDataURL(input.files[0]);
                        //File내용을 읽어 dataURL형식의 문자열로 저장
                    }
                }//readURL()--

                //file 양식으로 이미지를 선택(값이 변경) 되었을때 처리하는 코드
                $("#company_face").change(function(){
                    //alert(this.value); //선택한 이미지 경로 표시
                    readURL(this);
                });
            });
        </script>
        <div class="wrapper">
            <?php if($result->m_face != null): ?>
                <img src="<?php echo e(asset('img/member_face/'.$result->m_face)); ?>" id="face_img">
            <?php else: ?>
                <img src="<?php echo e(asset('img/member_face/no_face.jpg')); ?>" id="face_img">
            <?php endif; ?>
            <div class="file_upload" style="margin-top: 5px; height: 25px; width: 350px; margin-left: 20px; display: inline-block; text-align: center">
                <?php if(Session::get('m_num') == $result->m_num): ?>
                    <span style="display: inline-block; margin: 0 auto; text-align: center">
                                <input type="file" id="company_face" name="company_face">
                                <input type="hidden" value="<?php echo e($result->m_face); ?>" name="m_face" >
                            </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="info">
            <table id="table">
                <tr>
                    <td class="td_left">회사 명</td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            <h4>
                                <?php if($result->m_num != Session::get('m_num')): ?>
                                    <?php echo e($result->m_name); ?>

                                <?php else: ?>
                                    <input type="text" value="<?php echo e($result->m_name); ?>" class="form-control" name="m_name">
                                <?php endif; ?>
                            </h4>
                        </div>
                    </td>
                <tr>
                    <td class="td_left">대표이사</td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            <h4>
                                <?php if($result->m_num != Session::get('m_num')): ?>
                                    <?php echo e($result->m_name); ?>

                                <?php else: ?>
                                    <input type="text" value="<?php echo e($result->cp_represent); ?>" class="form-control" name="cp_represent">
                                <?php endif; ?>
                            </h4>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_left">연락처</td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            <h4>
                                <?php if($result->m_num != Session::get('m_num')): ?>
                                    <?php echo e($result->m_phone); ?>

                                <?php else: ?>
                                    <input type="text" value="<?php echo e($result->cp_tel); ?>" class="form-control" name="cp_tel">
                                <?php endif; ?></h4>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_left">E-mail</td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            <h4>
                                <?php if($result->m_num != Session::get('m_num')): ?>
                                    <?php echo e($result->m_email); ?>

                                <?php else: ?>
                                    <input type="text" value="<?php echo e($result->m_email); ?>" class="form-control"  name="m_email">
                                <?php endif; ?></h4>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="td_left">지역</td>
                    <td class="td_right">
                        <div style="margin-left: 20px">
                            <h4>
                                <?php if($result->m_num != Session::get('m_num')): ?>
                                    <?php echo e($result->m_area); ?>

                                <?php else: ?>
                                    <input type="text" name="m_area" list="area_list" class="form-control" value="<?php echo e($result->m_area); ?>">
                                    <datalist id="area_list">
                                        <option value="서울">서울특별시</option>
                                        <option value="경기권">경기도</option>
                                        <option value="인천">인천광역시</option>
                                        <option value="대전">대전광역시</option>
                                        <option value="대구">대구광역시</option>
                                        <option value="울산">울산</option>
                                        <option value="부산">부산</option>
                                        <option value="광주">광주</option>
                                        <option value="제주도">제주도</option>
                                    </datalist>
                                    </input>
                                <?php endif; ?></h4>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <h2 class="subject">자기소개</h2>
        <div class="form-group">
            <textarea class="form-control" rows="5" cols="65" name="cp_info" id="comment" <?php if($result->m_num != Session::get('m_num')): ?>readonly <?php endif; ?>><?php echo e($result->cp_info); ?></textarea>
        </div>
        <?php if(Session::get('m_num') == $result->m_num   ): ?>
            <div style="text-align: center">
                <input type="submit" class="btn btn-success" value="수정하기">
            </div>
        <?php endif; ?>
    </form>



<?php endif; ?>
<?php endforeach; ?>

<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>