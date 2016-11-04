@extends('designer.header')

@section('d_style')
    <style>
        #backGroundImg {
            height: 1500px !important;
        }
        #backGroundColor {
            height: 1500px !important;          
        }
        .cr_category{
            background-color: #29384D;
            color:#929DAF;
            text-align: center;
            line-height: 40px;
            font-size: 1.5em;
            text-shadow: 1px 1px #06060d;
            margin:0 auto;
            width: 100%;
            height: 40px;
            box-shadow: 0px 5px 10px 2px rgba(0,0,0,0.3);
        }
        .career_container {
            margin:0 auto;
            padding: 40px 70px;
            width:1000px;
        }
        #average_container{
            display: inline-block;
            margin: 0;
            width: 400px;
            height: 400px;
            background-color: rgba(255,255,255,0.5);
            box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
        }
        #average{
            margin-left: 30px;
        }
        .highcharts-container {
            width: 350px !important;
            margin-top: -20px !important;
        }
        .graph_container{
            float: right;
            margin: 0;
            width: 400px;
            height: 400px;
            background-color: rgba(255,255,255,0.5);
            box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
        }
        .chart-container{
            margin-top: 30px;
            text-align: center;
        }
        .end_container{
            margin: 40px auto;
            padding-bottom: 20px;
            width: 860px;
            height: auto;
            background-color: rgba(255,255,255,0.5);
            box-shadow: 0px 10px 30px 5px rgba(0,0,0,0.3);
        }
        .end_project {
            width: 90%;
            height: 200px;
            margin: 20px auto;
        }
        .end_project table {
            width: 100%;
            height: 200px;
            border: none;
            border-top: 1px dotted lightgray;
            border-bottom: 1px dotted lightgray;
            font-size: 18px;
            text-align: center;
        }
        .end_project table tr {
            border-bottom: 1px dotted lightgray;
        }
        #page_num{
            text-align:center;
        }
        .end_pj_title{
            margin-left:20px;
            font-weight: lighter;
        }
        .td_50{
            width:50px;
        }
        .td_450{
            width:450px;
        }
        .td_100{
            width:100px;
        }
        .th_title{
            width:650px;
            height:20px;
        }
        .grade_text{
            display: inline-block;
            width: 70px;
            background-color: #FFF;
        }
        .highcharts-root{
            width:400px !important;
            height:400px !important;
        }

        a{color:#000;}


        #modalLayer{display:none; position:relative;}
        #modalLayer .modalContent{width:440px; height:200px; padding:20px; border:1px solid #ccc; position:fixed; left:50%; top:50%; z-index:11; background:#fff;}
        #modalLayer .modalContent button{position:absolute; right:0; top:0; cursor:pointer;}

    </style>
@stop

@section('d_content')

    <div class="career_container animsition" data-animsition-in-class="fade-in-down" data-animsition-in-duration="1000" data-animsition-out-class="fade-out-down" data-animsition-out-duration="800">
        <div id="average_container">
            <div class="triengle">
                <div class="cr_category">Average</div>
                <div id="average"></div>
            </div>
        </div>
        <div class="graph_container">
            <div class="widget">
                <div class="cr_category">Category</div>
                <div id="chart" class="chart-container"></div>
            </div>
        </div>
        <div class="end_container">
            <div class="cr_category">End Project</div>



        @foreach($end_project as $row)
            @if($row->st_num == 5 )
          <div class="end_project">
                <table>
                    <tr>
                        <th colspan="5" class="th_title"><h3 class="end_pj_title">{{$row->pj_title}}</h3></th>
                    </tr>
                    <tr>
                        <td class="td_100">
                            デザイン
                        </td>
                        <td class="td_50">
                                @if($row->bc_num == 2)
                                    APP
                                @else
                                    WEP
                                @endif
                        </td>
                        <td class="td_100">
                            依頼者
                        </td>
                        <td class="td_450" colspan="2">
                            {{$row->m_id}}
                        </td>
                    </tr>
                    <tr>
                        <td>契約期間</td>
                        <td colspan="2">15日</td>
                        <td class="td_50" colspan="2">
                            {{$row->ct_date}}
                        </td>
                    </tr>
                    <tr>
                        <td>契約金額</td>
                        <td colspan="3">
                            <?=number_format($row->pj_price)?>&nbsp;円
                        </td>
                        <td width="50">
                            <button onclick="grade('{{$row->pj_num}}','{{$m_num}}')" class="modalLink">評点</button>
                        </td>
                    </tr>
                </table>

          </div>
            @endif
            @endforeach
        </div>
            <div id="page_num">
            {{$end_project->links()}}
            </div>
        </div>

    <div id="modalLayer">
                <div class="modalContent">
                    <div class="gd_professional" >
                        <div class="grade_text">専門性</div>:
                    </div>
                    <div class="gd_plan">
                        <div class="grade_text">日程遵守</div>:
                    </div>
                    <div class="gd_satisfaction">
                        <div class="grade_text">満足度</div>:
                    </div>
                    <div class="gd_content">
                        <textarea readonly="readonly" cols="55" rows="4" class="text" style="resize: none"></textarea>
                    </div>
                    <button type="button">X</button>
                </div>
            </div>

    <script>
        //grade function Start 
        function grade(pj_num,m_num){

            var modalLayer = $("#modalLayer");
            var modalLink = $(".modalLink");
            var modalCont = $(".modalContent");
            var marginLeft = modalCont.outerWidth()/2;
            var marginTop = modalCont.outerHeight()/2;

            modalLayer.fadeIn(500);
            modalCont.css({"margin-top" : -marginTop, "margin-left" : -marginLeft});

                  $.ajax({
                      url: '/designer/user_grade/1',
                      type: 'post',
                      dataType: 'json',
                      data: {'pj_num':pj_num,'m_num':m_num},
                      success: function (data) {
                          $('.professional').remove();
                          $('.plan').remove();
                          $('.satisfaction').remove();
                          
                          $(".modalContent > a").focus();
                          
                          for(var i=0; i<data[1].gd_professional; i++){
                                  $('.gd_professional').append('<img src="{{asset('star.png')}}"  class="professional">');
                              }
                          for(var i=0; i<data[1].gd_plan; i++){
                                  $('.gd_plan').append('<img src="{{asset('star.png')}}"  class="plan">');
                              }
                          for(var i=0; i<data[1].gd_satisfaction; i++){
                                  $('.gd_satisfaction').append('<img src="{{asset('star.png')}}"  class="satisfaction">');
                              }
                          
                            $('.text').text(data[1].gd_content);

                            return false;
                        },
                      error: function (data) {
                        alert('評点がまだつけられませんでした');
                          return false;
                    }
                });
        }

        $(".modalContent > button").click(function(){
            $('#modalLayer').fadeOut(500);
            $('.modalLink').focus();
        });
        //grade function End
        
        
        //
        var dataset = [
            { name: 'Web', percent: '{{$web_count->web_count}}' },
            { name: 'App', percent: '{{$app_count->app_count}}'},
            { name : '合 : {{$web_count->web_count + $app_count->app_count}}'}
        ];

        var pie=d3.layout.pie()
                .value(function(d){return d.percent})
                .sort(null)
                .padAngle(.03);

        var w=300,h=300;

        var outerRadius=w/2;
        var innerRadius=100;

        var color = d3.scale.category10();

        var arc=d3.svg.arc()
                .outerRadius(outerRadius)
                .innerRadius(innerRadius);

        var svg=d3.select("#chart")
                .append("svg")
                .attr({
                    width:w,
                    height:h,
                    class:'shadow'
                }).append('g')
                .attr({
                    transform:'translate('+w/2+','+h/2+')'
                });
        var path=svg.selectAll('path')
                .data(pie(dataset))
                .enter()
                .append('path')
                .attr({
                    d:arc,
                    fill:function(d,i){
                        return color(d.data.name);
                    }
                });

        path.transition()
                .duration(1000)
                .attrTween('d', function(d) {
                    var interpolate = d3.interpolate({startAngle: 0, endAngle: 0}, d);
                    return function(t) {
                        return arc(interpolate(t));
                    };
                });


        var restOfTheData=function(){
            var text=svg.selectAll('text')
                    .data(pie(dataset))
                    .enter()
                    .append("text")
                    .transition()
                    .duration(200)
                    .attr("transform", function (d) {
                        return "translate(" + arc.centroid(d) + ")";
                    })
                    .attr("dy", ".4em")
                    .attr("text-anchor", "middle")
                    .text(function(d){
                        return d.data.percent;
                    })
                    .style({
                        fill:'#fff',
                        'font-size':'20px'
                    });

            var legendRectSize=20;
            var legendSpacing=7;
            var legendHeight=legendRectSize+legendSpacing;


            var legend=svg.selectAll('.legend')
                    .data(color.domain())
                    .enter()
                    .append('g')
                    .attr({
                        class:'legend',
                        transform:function(d,i){
                            //Just a calculation for x & y position
                            return 'translate(-35,' + ((i*legendHeight)-65) + ')';
                        }
                    });
            legend.append('rect')
                    .attr({
                        width:legendRectSize,
                        height:legendRectSize,
                        rx:20,
                        ry:20
                    })
                    .style({
                        fill:color,
                        stroke:color
                    });

            legend.append('text')
                    .attr({
                        x:30,
                        y:15
                    })
                    .text(function(d){
                        return d;
                    }).style({
                fill:'#000000',
                'font-size':'15px'
            });
        };

        setTimeout(restOfTheData,1000);


    </script>

    <script>
        $(function () {
            $('#average').highcharts({

                chart: {
                    polar: true,
                    type: 'line'
                },

                title: {
                    x: -50
                },

                pane: {
                    size: '85%'
                },

                xAxis: {
                    categories: ['専門性','日程遵守','満足度'],
                    lineWidth: 0
                },
                yAxis: {
                    gridLineInterpolation: 'polygon',
                    lineWidth: 0,
                    min: 0,
                    max: 5
                },

                tooltip: {
                    shared: true,
                    pointFormat: '<span style="color:{series.color}"><b>{point.y:0f}/5</b><br/>'
                },

                legend: {
                    align: 'right',
                    verticalAlign: 'top',
                    y: 70,
                    layout: 'vertical'
                },

                series: [{
                    name: '',
                    data: [{{$grade->gd_professional}}, {{$grade->gd_plan}},{{$grade->gd_satisfaction}}],
                    pointPlacement: 'on'
                }]

            });

            /* remove link */
            $('.highcharts-background').remove();
            $('.highcharts-title').remove();
            $('.highcharts-legend-item').remove();
            $('#highcharts-0 > svg > text:last-child').remove();
            $('#highcharts-0 > svg').css({'height':'354px','width':'315px'});
            $('#highcharts-0').css({'height':'354px','width':'315px','margin':'0 auto'});
            $('.highcharts-tooltip text tspan:eq(2)').remove();
            
            $(document).ready(function() {
                $(".animsition").animsition({
                    linkElement: '.animsition-link',
                    // e.g. linkElement: 'a:not([target="_blank"]):not([href^="#"])'
                    loading: true,
                    loadingParentElement: 'body', //animsition wrapper element
                    loadingClass: 'animsition-loading',
                    loadingInner: '', // e.g '<img src="loading.svg" />'
                    timeout: false,
                    timeoutCountdown: 5000,
                    onLoadEvent: true,
                    browser: [ 'animation-duration', '-webkit-animation-duration'],
                    // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
                    // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
                    overlay : false,
                    overlayClass : 'animsition-overlay-slide',
                    overlayParentElement : 'body',
                    transition: function(url){ window.location.href = url; }
                });
            });
        });
    </script>

@stop
