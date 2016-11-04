

<?php $__env->startSection('style'); ?>
    a {
    color: black;
    }

    a:hover {
    color: black;
    text-decoration: none;
    }

    a:active {
    text-decoration: none;
    }

    a:visited {
    text-decoration: none;
    }

    .header {
    margin: 0 auto;
    width: 1000px;
    height: 130px;
    }

    .logo {
    width: 50px;
    height: 50px;
    }

    .title {
    display: inline;
    left: 0;
    width: 400px;
    height: 70px;
    line-height: 70px;
    text-align: center;
    font-size: 40px;
    }

    .little_menu {
    display: inline-block;
    float: right;
    margin-top: 50px;
    font-size: 15px;
    }

    .little_menu a {
    margin-right: 10px;
    }

    .menu_bar {
    margin-top: 5px;
    padding-top: 5px;
    width: 100%;
    border-top: 4px solid #FF7E4E;
    }

    #top_menu_btn {
    margin-right: 5px;
    margin-left: 5px;
    display: inline-block;
    float: left;
    width: 19%;
    color: white;
    background-color: #213B96;
    }

    #top_menu_btn:hover { background-color: #182B6E; }

    .container {
    margin: 0 auto;
    width: 1000px;
    height: auto;
    }

    .slide_img {
    display: inline-block;
    width: 49%;
    height: 200px;
    border: 1px solid red;
    }

    .left_slide_img {left: 0;}
    .right_slide_img {float: right;}

    .service_flow {
    margin: 10px auto;
    width: 100%;
    height: 200px;
    border: 1px solid blue;
    }

    .service_info {
    margin: 10px auto;
    width: 100%;
    height: 200px;
    border: 1px solid blue;
    }


    .footer {
    position: absolute;
    left: 0;
    right: 0;
    margin: 0 auto;
    bottom: 0;
    width: 1000px;
    height: 90px;
    background-color: #CCCCCC;
    }

    .container .text-muted {
    margin: 20px 0;
    }


    .address {
    width: 100%;
    font-size: 20px;
    }

    .copyright {
    width: 100%;
    font-size: 20px;
    text-align: right;
    }

    .myBgColorB {
    color: #CCCCCC;
    background-color: #213B96;
    }

    .myBgColorB:hover {
    color: #CCCCCC;
    background-color: #182B6E;
    }

    .myBgColorB:active {
    color: #CCCCCC;
    background-color: #182B6E;
    }

    .myBgColorB:focus {
    color: #CCCCCC;
    background-color: #182B6E;
    }

    <?php $__env->stopSection(); ?>

<?php $__env->startSection('sub_body'); ?>
    <body style="padding:0px; margin:0px; background-color:#fff;font-family:Arial, sans-serif">
    <div class="header">
        <div class="title">
            <img class="logo" src="logo.png" alt="D&D">
            Designer & Developer
        </div>
        <div class="little_menu">
            <a href="/">홈</a>
            <?php if(!Session::has('m_info')): ?>
            <a href="#" data-toggle="modal" data-target="#loginModal" >로그인</a>
            <a href="#" data-toggle="modal" data-target="#joinModal" >회원가입</a>
            <?php else: ?>
            <a href="/member/logout" >로그아웃</a>
            <?php endif; ?>
            <a href="/help/index">고객센터</a>
        </div>

        <!-- Login Modal -->
        <div class="modal fade" id="loginModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header myBgColorB">
                        <button type="button" class="close myBgColorB" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Login</h4>
                    </div>
                    <form class="form-horizontal" action="/member/signin" method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">ID</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="m_id" placeholder="ID" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">PW</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="m_pw" placeholder="PW" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn myBgColorB">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Join Modal -->
        <div class="modal fade" id="joinModal" role="dialog">
            <div class="modal-dialog modal-sm">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header myBgColorB">
                        <button type="button" class="close myBgColorB" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Join</h4>
                    </div>
                    <form id="join_form" class="form-horizontal" action="/member/signup" method="post">
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="modal-body">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label class="radio-inline"><input type="radio" name="div_member" value="1" checked>Designer</label>
                                    <label class="radio-inline"><input type="radio" name="div_member" value="2">Developer</label>
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
                                    <input type="text" class="form-control" name="m_area" id="inputArea" placeholder="Area" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" id="submit_btn" class="btn myBgColorB">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="menu_bar">
            <a href="" id="top_menu_btn" class="btn btn-default">소개</a>
            <a href="" id="top_menu_btn" class="btn btn-default">프로젝트</a>
            <a href="" id="top_menu_btn" class="btn btn-default">디자이너</a>
            <a href="" id="top_menu_btn" class="btn btn-default">마이페이지</a>
            <a href="" id="top_menu_btn" class="btn btn-default">협업</a>
        </div>
    </div>
    <div class="container">
        <div class="slide_img left_slide_img">
            <script type="text/javascript" src="js/jssor.slider.min.js"></script>
            <!-- use jssor.slider.debug.js instead for debug -->
            <script>
                jssor_1_slider_init = function() {

                    var jssor_1_SlideshowTransitions = [
                        {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2},
                        {$Duration:1200,x:0.3,$SlideOut:true,$Easing:{$Left:$Jease$.$InCubic,$Opacity:$Jease$.$Linear},$Opacity:2}
                    ];

                    var jssor_1_options = {
                        $AutoPlay: true,
                        $SlideshowOptions: {
                            $Class: $JssorSlideshowRunner$,
                            $Transitions: jssor_1_SlideshowTransitions,
                            $TransitionsOrder: 1
                        },
                        $ArrowNavigatorOptions: {
                            $Class: $JssorArrowNavigator$
                        },
                        $BulletNavigatorOptions: {
                            $Class: $JssorBulletNavigator$
                        },
                        $ThumbnailNavigatorOptions: {
                            $Class: $JssorThumbnailNavigator$,
                            $Cols: 1,
                            $Align: 0,
                            $NoDrag: true
                        }
                    };

                    var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                    //responsive code begin
                    //you can remove responsive code if you don't want the slider scales while window resizing
                    function ScaleSlider() {
                        var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                        if (refSize) {
                            refSize = Math.min(refSize, 600);
                            jssor_1_slider.$ScaleWidth(refSize);
                        }
                        else {
                            window.setTimeout(ScaleSlider, 30);
                        }
                    }
                    ScaleSlider();
                    $Jssor$.$AddEvent(window, "load", ScaleSlider);
                    $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                    $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                    //responsive code end
                };
            </script>

            <style>

                /* jssor slider bullet navigator skin 01 css */
                /*
                .jssorb01 div           (normal)
                .jssorb01 div:hover     (normal mouseover)
                .jssorb01 .av           (active)
                .jssorb01 .av:hover     (active mouseover)
                .jssorb01 .dn           (mousedown)
                */
                .jssorb01 {
                    position: absolute;
                }
                .jssorb01 div, .jssorb01 div:hover, .jssorb01 .av {
                    position: absolute;
                    /* size of bullet elment */
                    width: 12px;
                    height: 12px;
                    filter: alpha(opacity=70);
                    opacity: .7;
                    overflow: hidden;
                    cursor: pointer;
                    border: #000 1px solid;
                }
                .jssorb01 div { background-color: gray; }
                .jssorb01 div:hover, .jssorb01 .av:hover { background-color: #d3d3d3; }
                .jssorb01 .av { background-color: #fff; }
                .jssorb01 .dn, .jssorb01 .dn:hover { background-color: #555555; }

                /* jssor slider arrow navigator skin 05 css */
                /*
                .jssora05l                  (normal)
                .jssora05r                  (normal)
                .jssora05l:hover            (normal mouseover)
                .jssora05r:hover            (normal mouseover)
                .jssora05l.jssora05ldn      (mousedown)
                .jssora05r.jssora05rdn      (mousedown)
                */
                .jssora05l, .jssora05r {
                    display: block;
                    position: absolute;
                    /* size of arrow element */
                    width: 40px;
                    height: 40px;
                    cursor: pointer;
                    background: url('img/a17.png') no-repeat;
                    overflow: hidden;
                }
                .jssora05l { background-position: -10px -40px; }
                .jssora05r { background-position: -70px -40px; }
                .jssora05l:hover { background-position: -130px -40px; }
                .jssora05r:hover { background-position: -190px -40px; }
                .jssora05l.jssora05ldn { background-position: -250px -40px; }
                .jssora05r.jssora05rdn { background-position: -310px -40px; }

                /* jssor slider thumbnail navigator skin 09 css */

                .jssort09-600-45 .p {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 600px;
                    height: 45px;
                }

                .jssort09-600-45 .t {
                    font-family: verdana;
                    font-weight: normal;
                    position: absolute;
                    width: 100%;
                    height: 100%;
                    top: 0;
                    left: 0;
                    color:#fff;
                    line-height: 45px;
                    font-size: 20px;
                    padding-left: 10px;
                }

            </style>


            <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden; visibility: hidden;">
                <!-- Loading Screen -->
                <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
                    <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
                    <div style="position:absolute;display:block;background:url('img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
                </div>
                <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 600px; height: 300px; overflow: hidden;">
                    <div data-p="112.50" style="display: none;">
                        <img data-u="image" src="http://timg.danawa.com/prod_img/500000/869/844/img/2844869_1.jpg" />
                        <div data-u="thumb">리버덕 / 웹디자이너 / 평균평점 3.37</div>
                    </div>
                    <div data-p="112.50" style="display: none;">
                        <img data-u="image" src="http://timg.danawa.com/prod_img/500000/869/844/img/2844869_1.jpg" />
                        <div data-u="thumb">리버덕 / 웹디자이너 / 평균평점 3.37</div>
                    </div>
                    <div data-p="112.50" style="display: none;">
                        <img data-u="image" src="http://timg.danawa.com/prod_img/500000/869/844/img/2844869_1.jpg" />
                        <div data-u="thumb">리버덕 / 웹디자이너 / 평균평점 3.37</div>
                    </div>
                    <div data-p="112.50" style="display: none;">
                        <img data-u="image" src="http://timg.danawa.com/prod_img/500000/869/844/img/2844869_1.jpg" />
                        <div data-u="thumb">리버덕 / 웹디자이너 / 평균평점 3.37</div>
                    </div>
                    <a data-u="ad" href="http://www.jssor.com" style="display:none">jQuery Slider</a>

                </div>
                <!-- Thumbnail Navigator -->
                <div data-u="thumbnavigator" class="jssort09-600-45" style="position:absolute;bottom:0px;left:0px;width:600px;height:45px;">
                    <div style="position: absolute; top: 0; left: 0; width: 100%; height:100%; background-color: #ff6666; filter:alpha(opacity=40.0); opacity:0.4;"></div>
                    <!-- Thumbnail Item Skin Begin -->
                    <div data-u="slides" style="cursor: default;">
                        <div data-u="prototype" class="p">
                            <div data-u="thumbnailtemplate" class="t"></div>
                        </div>
                    </div>
                    <!-- Thumbnail Item Skin End -->
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
                    <div data-u="prototype" style="width:12px;height:12px;"></div>
                </div>
                <!-- Arrow Navigator -->
                <span data-u="arrowleft" class="jssora05l" style="top:0px;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
                <span data-u="arrowright" class="jssora05r" style="top:0px;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
            </div>
            <script>
                jssor_1_slider_init();
            </script>
        </div>
        <div class="slide_img right_slide_img">
            개발사
        </div>

        <div>

            <section id="grid" class="grid clearfix">
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/1.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2><b>프로젝트명</b></h2>
                            <p>간단내용</p>
                            <?php /*<button>View</button>*/ ?>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/3.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Cacophony</h2>
                            <p>Two greens tigernut soybean radish.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/5.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Languid</h2>
                            <p>Beetroot water spinach okra water.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/7.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Serene</h2>
                            <p>Water spinach arugula pea tatsoi.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/2.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Nebulous</h2>
                            <p>Pea horseradish azuki bean lettuce.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/4.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Iridescent</h2>
                            <p>A grape silver beet watercress potato.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/6.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Resonant</h2>
                            <p>Chickweed okra pea winter purslane.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
                    <figure>
                        <img src="../img/project/8.png" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>Zenith</h2>
                            <p>Salsify taro catsear garlic gram.</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
            </section>

        </div>

        <script>
            (function() {

                function init() {
                    var speed = 250,
                            easing = mina.easeinout;

                    [].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
                        var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
                                pathConfig = {
                                    from : path.attr( 'd' ),
                                    to : el.getAttribute( 'data-path-hover' )
                                };

                        el.addEventListener( 'mouseenter', function() {
                            path.animate( { 'path' : pathConfig.to }, speed, easing );
                        } );

                        el.addEventListener( 'mouseleave', function() {
                            path.animate( { 'path' : pathConfig.from }, speed, easing );
                        } );
                    } );
                }

                init();

            })();
        </script>

        <?php /*<div class="service_flow">
            흐름도
        </div>
        <div class="service_info">
            소개
        </div>*/ ?>
    </div>

<?php /*    <footer class="footer">
        <div class="container">
            <p class="text-muted">
            <div class="address">영진전문대</div>
            <div class="copyright">Copyright by A.O.A</div>
            </p>
        </div>
    </footer>*/ ?>



    <script>

        var global_id_check = false;

        $(function() {

            //$.ajaxSetup({ headers: { 'csrf_token' : '<?php echo e(csrf_token()); ?>' } });

            $('#inputID').keyup(function() {

                var form_data = { "m_id" : $('#inputID').val(), "_token": '<?php echo e(csrf_token()); ?>'};

                $.ajax({
                    url:'/member/id_check',
                    dataType:'json', //어떤 형식으로 응답받을 것인가?
                    type:'post',     //어떤 형식으로 전달할 것인가?
                    data: form_data, //객체형체로 기술
                    success:function(data){ //서버가 리턴해준 값
                        global_id_check = data
                        if(data) {
                            $('#inputID').css('border', '1px solid red');
                            $('#inputID').css('box-shadow', '0 0 5px 0 red');
                        } else {
                            $('#inputID').css('border', '1px solid lightgreen');
                            $('#inputID').css('box-shadow', '0 0 5px 0 lightgreen');
                        }
                    },
                    error:function(err) {
                        $(".address").html(err.responseText);
                    }
                })
            });

        });

    </script>

    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>