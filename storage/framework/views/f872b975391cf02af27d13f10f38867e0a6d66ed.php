<?php echo $__env->make('layouts.link', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<style>
    .section{
        height: 800px;
        width: 1000px;
        margin: 0 auto;
    }
    .subject{
        text-align: center;
        font-size: 40px;
        padding-top:80px;
    }
    .port_table{
        margin: 0 auto;
        width: 800px;
        border: 1px solid #000;
    }
    tr {
        border: 1px solid #000;
    }
    .td_left{
        width:200px;
        height: 80px;
        text-align: center;
        border: 1px solid #000;
    }
    #area{
        width: 600px;
        height: 200px;
        resize:none;
    }
    #date{
        width: 280px;
        display: inline-block;
    }
    img{
        width: 148px;
        height: 155px;
    }
    .s_image_box{
        margin-top:5px;
        margin-left:10px;
        display: inline-block;
        text-align: center;
        border: 1px solid #000;
        width: 152px;
        height: 160px;
    }
    .buttonWrap {
        position:relative;
        float:left;
        overflow:hidden;
        cursor:pointer;
        background-image:url('http://wstatic.naver.com/w9/btn_sch.gif');
        width:52px;
        height:40px;
    }
    .buttonWrap input {
        margin-left:-10px;
        filter:alpha(opacity=0);
        opacity:0;
        -moz-opacity:0;
        cursor:pointer;
        width:74px;
        height:20px;
    }
</style>
<body>

<div class="section">
    <div class="subject">
        포트폴리오 정보 입력
    </div>
    <form action="/designer/portfolio_upload" method="post" enctype="multipart/form-data">
        <table class="port_table">
            <tr>
                <td class="td_left">제목</td>
                <td><input class="form-control" type="text" name="subject"></td>
            </tr>
            <tr>
                <td class="td_left">진행기간</td>
                <td><input id="date" class="form-control" type="date" name="first_date">~<input id="date" class="form-control" type="date" name="second_date"></td>
            </tr>
            <tr>
                <td class="td_left">내용</td>
                <td><textarea id="area" class="form-control" name="content"></textarea></td>
            </tr>
            <tr>
                <td class="td_left">분류</td>
                <td>
                    <label class="radio-inline">
                        <input type="radio" name="division" value="1">Web
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="division" value="2">App
                    </label>

                </td>
            </tr>
            <tr>
                <td class="td_left">이미지 첨부
                    <div style="margin-left: 65px; margin-top: 10px">
                    <span class="buttonWrap" onclick="img_remove()">
                        <input type="file" name="images[]" id="images" multiple>
                    </span>
                    </div>
                </td>
                <td>
                    <div>
                        <h4 style="color: red;">이미지 첨부할 시 가장 첫번째 이미지가 대표사진이 됩니다.</h4>
                    </div>
                    <div id="images-to-upload">
                    </div>
                </td>
            </tr>
        </table>

        <input type="submit" class="form-control" value="업로드">

    </form>
    <script>

        var fileCollection = new Array();

        $('#images').on('change',function(e){
            var files= e.target.files;

            $.each(files,function(i,file){

                fileCollection.push(file);

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function(e){
                    var img= e.target.result;
                    var template =  '<div class="s_image_box" ondblclick="remove()"><img src="'+img+'">'+
                            '</div>';
                    $('#images-to-upload').append(template);
                }
            });
        });

        function img_remove(){
            $('.s_image_box').remove();
        }


    </script>
</div>


</body>