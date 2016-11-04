<style>

/*main div*/
    .container {
        margin: 10px auto;
        padding: 10px;
        width: 1000px;
        height: 1050px;
    }
    .projectlist{
        margin-top: 1%;
        margin-left: 81%;
        position: fixed;
        height: auto;
        width: 300px;
        border-style: dotted;
        border-color: #add8e6;
    }

    .ranking_chart {
        margin-top: 3%;
        width: 49%;
        height: 49%;
        float: left;
    }

    .ranking_chart2 {
        margin-top: 3%;
        width: 49%;
        height: 49%;
        float: right;
    }

    .project {
        background: lightblue;
        color: #fff;
        font-size: 20px;
        height: 60px;
        width: 230px;
        line-height: 60px;
        margin: 25px 25px;
        text-align: center;
        border: 0;
        border-radius: 10em;
        transition: all 0.3s ease 0s;
}

/*랭킹 css*/
.table-wrap {
    max-width: 1000px;
    margin: 0 auto;
}
.table {
    border: 5px solid SlateGray;
}
@-moz-document url-prefix() {
    fieldset {
        display: table-cell;
    }
}
tr:nth-child(odd) {
    background: WhiteSmoke;
}
thead tr {
    background: SlateGray !important;
    color: WhiteSmoke;
}
td,
th {
    padding-top: 1em !important;
    padding-bottom: 1em !important;
    border: 0px !important;
    vertical-align: middle !important;
}
th {}
tr {
    font-size: 1.5em;
    color: SlateGray;
}
tr td:nth-child(1) {
    padding-left: 1.5em !important;
}
tr td:nth-child(2) {
    padding-left: 0em !important;
}
tr td:nth-child(3) {
    text-align: right;
    width: 60%;
    padding-right: 1.5em !important;
}
tr th:nth-child(1) {
    padding-left: 1.5em !important;
}
tr th:nth-child(2) {
    padding-left: 0em !important;
}
tr th:nth-child(3) {
    text-align: right;
    width: 20%;
    padding-right: 1.5em !important;
}
.circle {
    font-size: 1.5em;
    width: 45px !important;
    height: 45px !important;
    background: DimGray;
    color: white;
    display: table-cell;
    vertical-align: middle;
    text-align: center;
    border-radius: 100%;
}
.first {
    background: Coral;
}
.second {
    background: Goldenrod;
}
.third {
    background: Grey;
}

    #ctlTitle {
        width: 100%;
        height: 60px;
        border: none;
        border-radius: 5px 5px 0px 0px;
        background-color: lightblue;
    }

    #ctlTitle h2 {
        margin: 0;
        padding: 10px;
        width: 100%;
        height: 100%;
    }

    #ctlBox {
        padding: 10px;
        width: 100%;
        height: 240px;
        border: 1px solid lightgray;
        border-radius: 0px 0px 5px 5px;
        white-space: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
    }

    .pjBox {
        display: inline-block;
        position: relative;
        padding: 20px;
        width: 320px;
        height: 200px;
    }

    .pjBox a {
        color: black;
        text-decoration: none;
    }

    .pjTextBox {
        padding: 10px;
        width: 100%;
        height: 100%;
        border: 1px solid lightgray;
        border-radius: 5px;
        background-color: aliceblue;
    }

    .pjBox .pjTextBox h4{
        padding: 5px;
        margin: 0;
        margin-top: 5px;
        width: 100%;
        font-weight: bold;
    }

    .pjBox .pjTextBox h4:nth-child(even){
        padding-left: 15px;
        font-size: 16px;
        font-weight: lighter;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
    }
    
    #projecting {
        overflow:hidden;
        text-overflow:ellipsis;
        white-space:nowrap;
    }
</style>

<body>

    <div class="projectlist">
        <center>
        <h2>登録中プロジェクト</h2>

        <?php if($project_list): ?>
        <?php foreach($project_list as $result): ?>

            <?php if($result): ?>
                <button type="button" id="projecting" class="project" onclick="location.href='/projectView/<?php echo e($result->pj_num); ?>'"><?php echo e($result->pj_title); ?>,<?php echo e($result->count); ?></button><br>
            <?php endif; ?>

            <?php endforeach; ?>
            <?php endif; ?>
            <?php if(!$project_list): ?>
                <h3>現在ありません</h3>
                <button type="button" class="project" onclick="location.href='/projectwrite'">いま登録する</button><br>
            <?php endif; ?>
        </center>
    </div>


    <div class="container">

        <div id="ctlTitle">
            <h2>進行中プロジェクト</h2>
        </div>
        <div id="ctlBox">
            <?php foreach($results as $result): ?>
            <?php if($result): ?>
            <div class="pjBox">
                <a href="/work/<?php echo e($result->pj_num); ?>">
                    <div class="pjTextBox">
                        <h4>プロジェクト名</h4>
                        <h4><?php echo e($result->pj_title); ?></h4>
                        <h4>開発期間</h4>
                        <h4><?=substr($result->pj_date, 0, 11)?></h4>
                    </div>
                </a>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <div class="ranking_chart">

            <h2>デザイナーランキング</h2>
            <h3>完了したプロジェクトの数</h3>

            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>　　</th>
                                <th colspan="2">名前</th>
                                <th>数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="circle first">
                                        1
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($project_ranking[0]) ? $project_ranking[0]->m_num:null); ?>">
                                    <?php echo e(isset($project_ranking[0]) ? $project_ranking[0]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($project_ranking[0]) ? $project_ranking[0]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle second">
                                        2
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($project_ranking[1]) ? $project_ranking[1]->m_num:null); ?>">
                                    <?php echo e(isset($project_ranking[1]) ? $project_ranking[1]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($project_ranking[1]) ? $project_ranking[1]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle third">
                                        3
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($project_ranking[2]) ? $project_ranking[2]->m_num:null); ?>">
                                    <?php echo e(isset($project_ranking[2]) ? $project_ranking[2]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($project_ranking[2]) ? $project_ranking[2]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle">
                                        4
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($project_ranking[3]) ? $project_ranking[3]->m_num:null); ?>">
                                    <?php echo e(isset($project_ranking[3]) ? $project_ranking[3]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($project_ranking[3]) ? $project_ranking[3]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle">
                                        5
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($project_ranking[4]) ? $project_ranking[4]->m_num:null); ?>">
                                    <?php echo e(isset($project_ranking[4]) ? $project_ranking[4]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($project_ranking[4]) ? $project_ranking[4]->count:""); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="ranking_chart2">
            <h2>　</h2>
            <h3>ポートフォリオの数</h3>
            <div class="table-wrap">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>　　</th>
                                <th colspan="2">名前</th>
                                <th>数</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="circle first">
                                        1
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($portfolio_ranking[0]) ? $portfolio_ranking[0]->m_num:null); ?>">
                                    <?php echo e(isset($portfolio_ranking[0]) ? $portfolio_ranking[0]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($portfolio_ranking[0]) ? $portfolio_ranking[0]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle second">
                                        2
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($portfolio_ranking[1]) ? $portfolio_ranking[1]->m_num:null); ?>">
                                    <?php echo e(isset($portfolio_ranking[1]) ? $portfolio_ranking[1]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($portfolio_ranking[1]) ? $portfolio_ranking[1]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle third">
                                        3
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($portfolio_ranking[2]) ? $portfolio_ranking[2]->m_num:null); ?>">
                                    <?php echo e(isset($portfolio_ranking[2]) ? $portfolio_ranking[2]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($portfolio_ranking[2]) ? $portfolio_ranking[2]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle">
                                        4
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($portfolio_ranking[3]) ? $portfolio_ranking[3]->m_num:null); ?>">
                                    <?php echo e(isset($portfolio_ranking[3]) ? $portfolio_ranking[3]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($portfolio_ranking[3]) ? $portfolio_ranking[3]->count:""); ?>

                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="circle">
                                        5
                                    </div>
                                </td>
                                <td colspan="2">
                                    <a href="/designer/<?php echo e($num=isset($portfolio_ranking[4]) ? $portfolio_ranking[4]->m_num:null); ?>">
                                    <?php echo e(isset($portfolio_ranking[4]) ? $portfolio_ranking[4]->m_name:"no date"); ?>

                                    </a>
                                </td>
                                <td>
                                    <?php echo e(isset($portfolio_ranking[4]) ? $portfolio_ranking[4]->count:""); ?>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</body>
