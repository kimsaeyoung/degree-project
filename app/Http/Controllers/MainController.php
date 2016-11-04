<?php

namespace App\Http\Controllers;

use App\Http\models\Main_model;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;
use DB;

class MainController extends Controller
{
    public $model;

    public function __construct(){

        $this->model = new Main_model();

    }

    public function index()
    {
        //메인값
        $count_designer = DB::table('designer')//디자이너 수
        ->count();

        $count_developer = DB::table('development')//개발사 수
        ->count();

        $count_going_pj = $this->model->count_going_pj(); //진행중 프로젝트 수

        $m_num = Session::get('m_num');

        $results = $this->model->get_projects($m_num);

        //디벨로퍼값
        $area_count = $this->model->area_count();                      //지역별 디자이너 수

        $project_ranking = $this->model->project_ranking();           //프로젝트 끝낸수 랭킹


        $portfolio_ranking = $this->model->portfolio_ranking();       //포트폴리오 개수 랭킹

        //디자이너값
        $new_project = $this->model->new_project();               //새로운 프로젝트 목록

        $app_count = $this->model->app_count();
        $web_count = $this->model->web_count();

        if ($m_num) {

        $project_list = $this->model->project_list($m_num);
            
            return view('Main.MainView',compact('count_designer','count_developer','area_count','count_going_pj','project_ranking','portfolio_ranking','new_project','app_count','web_count', 'results','project_list'));

        }else{
            return view('Main.MainView',compact('count_designer','count_developer','area_count','count_going_pj','project_ranking','portfolio_ranking','new_project','app_count','web_count', 'results'));
        }
        //return view('Main.MainView0',compact('count_designer','count_developer'));

    }

}