<?php foreach($results as $row) { ?>
    <a class="mainList" href="/projectView/<?php echo $row->pj_num?>">
            <div class="div_1" style="text-align: left">
                <?php
                //오늘
                $now = Carbon\Carbon::now();

                //DB에서 가져온 프로젝트 등록 일자
                $today = $row->created_at;

                //DB에서 가져온 프로젝트 등록일자를 날짜 포맷하여 형식 변경
                $today_1 = Carbon\Carbon::parse($today)->format('Y-m-d');

                //오늘에서 하루 더한 값
                $today_add_1 = $now->addDays(1);

                //DB에서 가져온 프로젝트 마감 일자
                $expire_project_date = $row->pj_date;

                //DB에서 가져온 프로젝트 마감일자를 날짜 포맷하여 형식 변경
                $expire_project_date1 = Carbon\Carbon::parse($expire_project_date)->format('Y-m-d');

                //마감일자에서 3일 남은 경우 마감기한 마크 표시를 위한 변수

                $expire_project_date2 = Carbon\Carbon::parse($expire_project_date1)->diffInDays(Carbon\Carbon::parse($today_1));

                    if($row->st_num==4)
                    {
                        echo '<div class="a_div" style="text-align: center; background: lightgrey; opacity: 1">';
                    }
                    elseif($row->st_num==5)
                    {
                        echo '<div class="a_div" style="text-align: center; opacity: 0.5">';
                    }
                    else
                    {
                        echo ' <div class="a_div" style="text-align: center">';
                    }
                    echo '<div class="div_1" style="text-align: left">';
                    echo '<span class="db_data_form">';
                    echo  $row->pj_title;
                    echo  '</span>';
                    echo  '<div id="pj_edge">';

                    if($row->st_num==1)
                    {
                        echo '<div class="edge" style="background-color: green;">';
                        echo '募集中';
                        echo '</div>';

                        if($row->created_at < $today_add_1)
                        {
                            echo'<div class="edge" style="background-color: hotpink;">';
                            echo'NEW';
                            echo'</div>';
                        }
                        if($expire_project_date2 <= 3)
                        {
                            echo'<div class="edge" style="background-color: red;">';
                            echo'締切間近';
                            echo'</div>';
                        }
                    }

                    else if($row->st_num==4)
                    {
                        echo '<div class="edge" style="background-color: darkslategrey;">';
                        echo '募集終了';
                        echo '</div>';
                    }
                    else
                    {
                        echo '<div class="edge" style="background-color: darkgray;">';
                        echo '完了';
                        echo '</div>';
                    }
                echo '</div>';

                ?>
            </div>
            <div class="div_2" style="text-align: center">
                <div class="div_2_a"><span>募集の締切日</span><div class="circle">5/21</div></div>
                <div class="div_2_a"><span>予想期間</span><div class="circle"><?= $row->expect_date; ?>日</div></div>
                <div class="div_2_a"><span>募集人員</span><div class="circle"><?= $row->pj_people; ?>名</div></div>
                <div class="div_2_a"><span>地　域</span><div class="circle"><?= $row->pj_area; ?></div></div>
            </div>

            <div class="div_3"><?= $row->pj_content; ?></div>
            <div class="div_4">
                <span class="db_pj_price">予想金額 : <?= number_format($row->pj_price); ?>円</span>
                <span class="glyphicon glyphicon-pencil" >要求技術</span>
                <!--사용자로부터 받은 기술키워드를 카테고리화할때-->
                <?php
                if(($row->HTML5)=='1')
                {
                    echo '<span class="label label-default" style="margin-left: 10px">';
                    echo 'Html5';
                    echo '</span>';
                }
                if(($row->CSS)=='1')
                {
                    echo '<span class="label label-default" style="margin-left: 10px">';
                    echo 'CSS';
                    echo '</span>';
                }
                if(($row->JavaScript)=='1')
                {
                    echo '<span class="label label-default" style="margin-left: 10px">';
                    echo 'Javascript';
                    echo '</span>';
                }
                if(($row->Jquery)=='1')
                {
                    echo '<span class="label label-default" style="margin-left: 10px">';
                    echo 'Jquery';
                    echo '</span>';
                }
                if(($row->Angular)=='1')
                {
                    echo '<span class="label label-default" style="margin-left: 10px">';
                    echo 'Angular';
                    echo '</span>';
                }
                if(($row->React)=='1')
                {
                    echo '<span class="label label-default" style="margin-left: 10px">';
                    echo 'React';
                    echo '</span>';
                }
                ?>
                <span class="db_pj_categoray">
                   <?php
                   if(($row->bc_num)=='1')
                   {
                       $row->bc_num='ウェブ';
                   }else{
                       $row->bc_num='アプリ';
                   }
                   ?>
                    <?=$row->bc_num?>&nbsp;>&nbsp;<?=$row->sc_name?>
                </span>
            </div>
        </div>
    </a>

<?php } ?>
<div class="pagenate">
    <?=$results->render(); ?>
</div>
