@include('designer.header')
<head>
<style>
    a{
        text-decoration: none;
    }
    .portfolio_container{
        width: 100%;
    }
    #main{
        margin :0 auto;
        width: 1000px;
        background-color: #0f0f0f;

    }
    .d_one{
        display: inline-block ;
        height:350px ;
        width: 1000px ;
        border:1px solid #000;
    }
    #d_two{
        display: inline-block;
        margin-left:25px;
        height:350px;
        width: 300px;
        border:1px solid #000;
    }
    #d_three{
        display: inline-block;
        margin-left:25px;
        height:350px;
        width: 300px;
        border:1px solid #000;
    }

    .picture{
        display: inline-block !important ;
        margin-top:30px;
        margin-left:25px;
        width:300px;
        height:350px;
        cursor:pointer;
    }
    .pf_img{
        width:290px;
        height:340px;
    }

    .modal.modal-center {
        text-align: center;
    }

    #pf_picture{
        margin-left:3px;
        display:inline-block ;
        width: 75px;
        height:500px;
        background-color: gray;
        vertical-align: middle;
        border:none;
    }
    .modal.modal-center:before {
        display: inline-block;
        vertical-align: middle;
        content: " ";
        height: 100%;
    }

    .modal-dialog.modal-center {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
        margin-right:410px;
    }
    .modal-content{
        background-color : gray;
        height:1000px;
        width:1000px;
    }

    .modal-body-content{
        margin-top: 30px;
        width: 100px;
        height: 500px;
        vertical-align: middle;
    }
    #right_button{
        display: inline-block;
        width:75px;
        height:500px;
        background-color: green;
        vertical-align: middle;

    }
    #p_img{
        margin-left: auto;
        margin-right: auto;
        width: 800px;
        height:500px;
    }

</style>
</head>
<body>

<script>

        $(document).ready(function(){
            var track_load=0;
            var total_groups='{{$total_group}}';
            var m_num = '{{$m_num}}';

            $("#main").load("/designer/post",{'group_no':track_load,'m_num':m_num},function(){track_load++;});

            $(window).scroll(function(){
                if($(window).scrollTop()+window.innerHeight== $(document).height()){
                    if(track_load <= total_groups){
                        $.post('/designer/post',{'group_no':track_load,'m_num':m_num},function(data){
                            $('#main').append(data);
                            track_load++;
                        });
                    }
                }
            });
        });

    </script>


    <!-- Modal -->
    <script>
        function picture(m_num,pf_num){
            $.ajax({
                url:'/designer/pf_view',
                type: 'post',
                dataType: 'json',
                data:{'m_num':m_num, 'pf_num':pf_num},
                success:function(data){
                    $('#my80sizeCenterModal').modal('show');
                    $('#myModalLabel').text(data['pf_content']);
                    $('#pf_picture').attr('value',data['pf_num']);
                    $('#p_img').attr('src','http://127.0.0.1/img/portfolio/'+data['pf_picture']);
                },
                error:function(data){
                    window.alert('실패');
                }
            });
        }

        function pn_view(value)
        {
            var pf_num = $('#pf_picture').val();
            $.ajax({
                url:'/designer/pn_view',
                data:{
                    button:value,
                    pf_num:pf_num
                },
                dataType:'json',
                type:'post',
                success:function(data){

                    $('#p_img').removeAttr("src");
                    $('#myModalLabel').text(data[1].pf_content);
                    $('#pf_picture').removeAttr("value");
                    $('#pf_picture').attr('value',data[1].pf_num);
                    $('#p_img').attr('src','http://127.0.0.1/img/portfolio/'+data[1].pf_picture);

                },error:function(data){
                    window.alert('마지막 사진입니다.');
                }
            });
        }

    </script>

    <div class="modal modal-center fade" id="my80sizeCenterModal" tabindex="-1" role="dialog" aria-labelledby="my80sizeCenterModalLabel">
        <div class="modal-dialog modal-80size modal-center" role="document">
            <div class="modal-content modal-80size">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"></h4>
                </div>
                <div class="modal-body">

                        <button id="pf_picture" class="glyphicon glyphicon-chevron-left" onclick="pn_view('left')">
                        </button>

                        <img id="p_img">

                        <button id="pf_picture" class="glyphicon glyphicon-chevron-right" onclick="pn_view('right')" >
                        </button>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio_container">

        <script>

            function drag(pf_num){
                var picimg = "#picimg_"+pf_num;


                $(function(){

                    $( "a",'.main_container' ).draggable({
                        cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                        revert: "invalid", // when not dropped, the item will revert back to its initial position
                        containment: "document",
                        helper: "clone",
                        cursor: "move"
                    });

                   $(picimg).draggable({
                       addClasses:false,
                       helper:'clone'
                   });
                });

                $('#one').droppable({
                    addClasses:false,
                    drop: function (event, ui) {
                        deleteimage(ui.draggable);
                    }
                });

                function deleteimage($item){
                    $item.fadeOut(function(){

                        var $list = $("div",".main_container2").length ?
                                $("div",".main_container2") :
                                $("<div class='d_one' />").appendTo(".main_container2");

                        $item.appendTo($list).fadeIn(function(){
                            $item
                                    .animate({ width: "300px" })
                                    .find( "img" )
                                    .animate({ height: "350px" });
                        });
                    })
                }
            }


        </script>
        <script>
            $(function() {
                // there's the gallery and the trash
                var $gallery = $( "#gallery" ),
                        $trash = $( "#trash" );

                // let the gallery items be draggable
                $( "li", $gallery ).draggable({
                    cancel: "a.ui-icon", // clicking an icon won't initiate dragging
                    revert: "invalid", // when not dropped, the item will revert back to its initial position
                    containment: "document",
                    helper: "clone",
                    cursor: "move"
                });

                // let the trash be droppable, accepting the gallery items
                $trash.droppable({
                    accept: "#gallery > li",
                    drop: function( event, ui ) {
                        deleteImage( ui.draggable );
                    }
                });

                // let the gallery be droppable as well, accepting items from the trash
                $gallery.droppable({
                    accept: "#trash li",
                    drop: function( event, ui ) {
                        recycleImage( ui.draggable );
                    }
                });

                // image deletion function
                 function deleteImage( $item ) {
                    $item.fadeOut(function() {
                        var $list = $( "ul", $trash ).length ?
                                $( "ul", $trash ) :
                                $( "<ul class='gallery ui-helper-reset'/>" ).appendTo( $trash );

                        $item.find( "a.ui-icon-trash" ).remove();
                        $item.appendTo( $list ).fadeIn(function() {
                            $item
                                    .animate({ width: "48px" })
                                    .find( "img" )
                                    .animate({ height: "36px" });
                        });
                    });
                }

                // image recycle function
                var trash_icon = "<a href='link/to/trash/script/when/we/have/js/off' title='Delete this image' class='ui-icon ui-icon-trash'>Delete image</a>";
                function recycleImage( $item ) {
                    $item.fadeOut(function() {
                        $item
                                .find( "a.ui-icon-refresh" )
                                .remove()
                                .end()
                                .css( "width", "96px")
                                .append( trash_icon )
                                .find( "img" )
                                .css( "height", "72px" )
                                .end()
                                .appendTo( $gallery )
                                .fadeIn();
                    });
                }
            });
        </script>

        <div id="one" class="main_container2" style="width: 1000px; height: 500px; background-color: #1b6d85; margin: 0 auto;">

        </div>
    </div>

<div class="main_container" id="main">

</div>

</body>

