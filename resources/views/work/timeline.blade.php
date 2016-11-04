
<!DOCTYPE html>
<html>
<head>
    
    @include('layouts.link')

    <meta charset="UTF-8">
    <title>D&D</title>
    
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">

    <style>
        .modal-content{
            width: 50%;
        }
        #gd_content{
            width:100px;
            height:50px;
        }
        #timeline .content {
            width: 600px !important;
        }
    </style>
</head>
<body>

@include('layouts.header')

<script type="text/javascript">

    /*메세지 보내기 창 열기 */
    $(document).ready(function(){
        $('#timeline_write').click(function(){

            var currentPage = document.location.href;

            currentPage = currentPage.slice(7);
            var arr = currentPage.split("/");
           /* $ssa = $("#ss").val();

            alert($ssa);*/
            //alert(arr[2]);
            $.ajax({

                url: '/work/timeline/' + arr[2],
                type : 'get',

                success:function(data) {
                    window.open('/work/timeline_write/'+data, 'write', 'width=600, height=630, scrollbars=0, resizable=0');
                },
                error:function(request,status,error){
                    alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
                }
            })

       });
    });
    
</script>
    <div class="container">
       
        <div id="dTitle">
            <h5>
                @if($project->st_num != 5 )
                <div id="img" class="btn btn-warning btn-lg">進行中</div>&nbsp;&nbsp;
                @else
                <div id="end" class="btn btn-danger btn-lg">完了</div>&nbsp;&nbsp;
                @endif
                {{--글쓰기 Ajax처리 id: timeline_write --}}
                <div id="timeline_write" class="btn btn-info btn-lg" >追加</div>&nbsp;&nbsp;
                {{--onclick="window.alert('write')"--}}

                <div class="btn btn-info btn-lg" onclick="return openFullWindow(true);">会議</div>
                <?php $div_number = Session::get('div_number') ?>
            
                @if($project->st_num != 5 && Session::get('div_member') == 2 )
                <div class="btn btn-success btn-lg" data-toggle="modal" data-target="#success_modal">プロジェクト終了</div>
                @elseif($project->st_num !=5 && Session::get('div_member') == 1)
                <div class="btn btn-success btn-lg" data-toggle="modal" data-target="#ds_success_modal">プロジェクト終了</div>
                @endif
            </h5>
        </div>
        
        
        
        <div id="timelineBox">

            <h1>Timeline</h1>

            <div id="timelineCont">
                <?php for($i = 0 ; $i < count($result) ; $i++) { 
                    $tl_time = substr($result[$i]->tl_time, 0, 10)
                ?>
                    <ul id='timeline'>
                        <li class='work'>
                            <input class='radio' id='work<?=$i?>' name='works' type='checkbox' checked>
                            <div class="relative">
                                <label  for='work<?=$i?>'>{{$m_name[$i]->m_name}}</label>
                                <span  class='date'><?=$tl_time?></span>
                                <span class='circle'></span>
                            </div>
                            <div class='content'>
                                <p><?=nl2br($result[$i]->tl_content)?></p>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
            </div>

        </div>

    </div>
</body>
   
   
    <!-- desgienr Success Modal -->
<div id="ds_success_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">완료되었습니까?</h4>
      </div>
      <div class="modal-body">
          <button class="btn btn-primary" id="ds_success" data-dismiss="modal" onclick="ds_success({{$project->pj_num}},{{Session::get('m_num')}})">예</button>
          <button class="btn btn-danger" data-dismiss="modal">아니오</button>
      </div>
    </div>
      
  </div>
</div>

    <!-- Developer Modal content-->
    
<div id="success_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">평점 입력</h4>
      </div>
      <div class="modal-body">
          <p>전문성
              <select id="gd_professional">
                  <option value="">평점선택</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
              </select> 
          </p>
          <p>만족도 
              <select id="gd_satisfaction">
                  <option value="">평점선택</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
              </select> 
          </p>
          <p>일정준수
              <select id="gd_plan">
                  <option value="">평점선택</option>
                  <option value="5">5</option>
                  <option value="4">4</option>
                  <option value="3">3</option>
                  <option value="2">2</option>
                  <option value="1">1</option>
              </select> 
          </p>
          한마디
          <p>
              <textarea id="gd_content"></textarea>
          </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"
                onclick="project_clear({{$project->pj_num}},{{$ds_num[0]->m_num}})">확인</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">취소</button>
      </div>
    </div>
  </div>
</div>
<script>
    
    function ds_success(pj_num,m_num){
        $.ajax({
            headers:{ 'X-CSRF-Token': $('input[name="_token"]').val()},
            url:"/work/timeline/ds_project_clear",
            data:{
                pj_num:pj_num,
                m_num:m_num
            },
            type:'post',
            dataType:'json',
            success:function(data){
                location.reload();
            },
            error:function(data){
                
            }
            
        })
    }
    
    function project_clear(pj_num,ds_num){
        
        var gd_professional = $('#gd_professional').val();
        var gd_satisfaction = $('#gd_satisfaction').val();
        var gd_plan = $('#gd_plan').val();
        var gd_content = $('#gd_content').val();
        
        $.ajax({
            headers:{ 'X-CSRF-Token': $('input[name="_token"]').val()},
            url:"/work/timeline/project_clear",
            data:{
                
                gd_professional:gd_professional,
                gd_satisfaction:gd_satisfaction,
                gd_plan:gd_plan,
                gd_content:gd_content,
                pj_num:pj_num,
                ds_num:ds_num
            },  
            type:'post',
            dataType:'json',
            success:function(data){
                //$("#img").remove();
                /*
                $("#dTitle h5").append('<div id="end" class="btn btn-danger btn-lg">프로젝트 완료</div>')*/
                location.reload();
            },
            error:function(data){
                
            }
        });
        
        
    }
    
    function openFullWindow(Option) {   
        var screenSizeWidth,screenSizeHeight;

        if (self.screen) { 
           screenSizeWidth = screen.width ;  
           screenSizeHeight = screen.height;
        }  

        documentURL = "https://133.130.120.89:1337";
        windowname = "DND uid tool";
        intWidth = screenSizeWidth;
        intHeight = screenSizeHeight;
        intXOffset = 0 ;
        intYOffset = 0 ;

        if(Option){
           obwindow = window.open(documentURL,windowname, "fullscreen=yes, toolbar=no, location=no, directories=no, status=no, menubar=no,scrollbars=no,resizable=no") ;
        } else {
           obwindow = window.open(documentURL,windowname, " toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes,resizable=no") ;
           obwindow.resizeTo(intWidth, intHeight) ;
           obwindow.moveTo(intXOffset, intYOffset);
        }
    }
</script>

</html>