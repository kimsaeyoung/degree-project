<?php

namespace App\Http\Controllers;

use App\find_project_cate;
use App\Member;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App\Projects;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\Support;
use Carbon\Carbon;
use PDO;


class ProjectController extends Controller
{
    //default//프로젝트목록//
    public $model;

    public function __construct()
    {

        $this->model = new Projects();
    }

    
    public function index(Request $request)
    {
        //dd($request['checkbox1']);
        //dd($request->all());

        $pj_num = DB::table('find_project_cate')
            ->select('pj_num')
            ->get();


        $m_num = Session::get('m_num');
        $results = DB::table('projects');

        //debug 가격 높고 낮은 순을 하기위한
        //dd($request->post);

        $project_arrange = $request->post;

        //dd($project_arrange);


        //가격 높은순
        if ($project_arrange == 'high') {
            $results = $results->orderBy('pj_price', 'DESC');
            //dd($results);
        }

        //가격 낮은순
        if ($project_arrange == 'low') {
            $results = $results->orderBy('pj_price', 'ASC');
            //dd($results);
        }

        //최신 등록순
        if ($project_arrange == 'new') {
            $results = $results->orderBy('created_at', 'DESC');
            //dd($results);
        }


        //통합검색어가 있을때(제목, 내용)
        if ($request['term']) {
            $results = $results->Where('pj_title', 'LIKE', "%{$request['term']}%")
                ->orWhere('pj_content', 'LIKE', "%{$request['term']}%");
        }

        //지역검색어가 있을때
        if ($request['area']) {
            $results = $results->orWhere('pj_area', 'LIKE', "%{$request['area']}%");
        }

        $results = $results->orderBy('pj_num', 'desc')->paginate(5);

        /*if($request['']) */

        //한 프로젝트의 관한 기술을 관리하기 위한..
        $pj_tech = DB::table('pj_tech')
            ->join('projects', 'pj_tech.pj_num', '=', 'projects.pj_num')
            ->get();
        //debug
        //dd($pj_tech);

        //대분류, 소분류 조인 쿼리문
        $category = DB::table('projects')
            ->leftjoin('big_category', 'projects.bc_num', '=', 'big_category.bc_num')
            ->select('*')
            ->get();
        //debug
        //dd($category);

        $contract = DB::table('tmp_contract')
            ->select('tmp_num')
            ->where('m_num', '=', $m_num)
            ->get();
        //debug
        //dd($contract);

        $fact_contract = DB::table('contract')
            ->select('contract.pj_num')
            ->get();

        //ajax처리를 통한 프로젝트 갯수 구하기
        $count = DB::table('find_project_cate')
            ->count();

        return view('project.projectList', compact('results', 'pj_tech', 'category', 'contract', 'count'));
    }


    public function pj_volunteer(Request $request)
    {
        $volunteer = ($request['num']);
        $pj_num = ($request['volunteer']);
        $data = Session::get('m_num');
        $m_num = ($request['m_num']);
        $time = date('Y-m-d h:m:s');

        //dd($volunteer);
        //dd($pj_num);
        //dd($data);

        $support = DB::table('support')->insert(
            array(
                'pj_num' => $volunteer,
                'm_num' => $data,
                'sp_date' => $time
            )
        );

        /*$token = DB::table('members')->where('m_num',$m_num)->get();
        
        if($token){
            
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                'data' => array("message" => $msg_content,"title"=>$m_name[0]->m_name),
                'registration_ids' =>array($token[0]->m_token));
        
            $headers = array(
              'Authorization:key = AIzaSyDHtD5Tlyur8_wIb7zY-68hbFoqy63UygI',
                'Content-Type: application/json');

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));

            $result = curl_exec($ch);
            if($result === FALSE){
                die('Curl failed: '. curl_error($ch));
            }
            curl_close($ch);
        }*/


        $supports = DB::table('support')->select('pj_num', 'm_num')->get();

        echo json_encode(array('support', $supports));

    }

    public function pj_division(Request $request)
    {
        //dd($request);
        //echo json_encode($request['division']);
        $request_web = $request['division'];

        //dd($request->all());

        $category_check_info = [
            'web' => $request_web[0],
            'app' => $request_web[1],
            'html5' => $request_web[2],
            'css' => $request_web[3],
            'javascript' => $request_web[4],
            'jquery' => $request_web[5],
            'angular' => $request_web[6],
            'react' => $request_web[7],
            'min_price' => $request_web[8],
            'max_price' => $request_web[9],
        ];

        //dd($category_check_info);

        $category_check_info_cnt = count($category_check_info);

        if ($request['division']) {

            //현재 등록된 프로젝트에서 제일 마지막 프로젝트 가져오기
            //$pj = DB::table('projects')->latest()->first();

            $min_price = '';
            $max_price = '';

            $search = DB::table('find_project_cate');
            $search->select('*');
            foreach ($category_check_info as $key => $value) {
                if ($value == '1') {
                    $search->where($key, 'like', $value);
                } else {
                    if ($key == 'min_price') {
                        $min_price = $value;
                    } else if ($key == 'max_price') {
                        $max_price = $value;
                    }
                }
            }

            $search->leftjoin('projects', 'projects.pj_num', '=', 'find_project_cate.pj_num')
                ->leftjoin('big_category', 'projects.bc_num', '=', 'big_category.bc_num')
                ->whereBetween('find_project_cate.pj_money', array($min_price, $max_price))->get();

            $results = $search->orderBy('projects.pj_num', 'desc')->paginate(5);

            $ajax = require_once app_path() . '/Http/Controllers/ajax.php';

            Response::json(['ajax', $ajax]);
        }
    }


    //프로젝트 등록 폼
    public function writeview()
    {
        return view('project.projectwrite');
    }

    public function register(Request $request)
    {
        //dd($request->all());
        //dd($request['created_at']);

        //input에는 view에서 name값으로 넘어온거 insert//
        $big_num = $request->input('big_num');
        $sc_num = $request->input('sc_num');
        $pj_title = $request->input('project_title');
        $pj_date = $request->input('project_date');
        $mypay = $request->input('mypay');
        $area = $request->input('area');
        $m_num = $request->input('m_num');
        $pj_content = $request->input('project_content');
        $st_num = $request->input('st_num');
        $pj_file = $request->file('image');
        $newFileName = '';
        $pj_keyword = $request->input('tech');
        $pj_people = $request->input('pj_people');
        $expect_date = $request->input('expect_date');
        $now_time = $request->input('created_at');
        $company_lat = $request->input('lat');
        $company_lng = $request->input('lng');

        $smart_matching = $request->input('basicOptgroup');
        $smart_matching = isset($smart_matching)? $smart_matching : 0; //스마트매칭 여부 체크

        //dd($pj_keyword);
        //dd($smart_matching);

        // dd(var_dump($smart_matching));
        // dd(var_dump($smart_matching[0]));

        if($big_num == "ウェブ")
        {
            $big_num=1;
        }
        elseif($big_num == "アプリ")
        {
            $big_num = 2;
        }

        $is_smart_matching = "";
        $is_project_experience = "";
        $wanted_money_case = "";

        if($smart_matching == 0)
        {
            $pj_keyword=0;
            // 스마트매칭을 원하지 않는다면
            $is_smart_matching = 0;
            $is_project_experience = 0;
            $wanted_money_case = -1;
        }
        else
        {
            // 스마트매칭을 원한다면
            $is_smart_matching = 1;
            if(strcmp($smart_matching[0], "yes") === 0) {
                // 프로젝트 진행 경험이 필요하다면
                $is_project_experience = 1;

                switch($smart_matching[1])
                {
                    case "money_1":
                        $wanted_money_case = 0;
                        break;
                    case "money_2":
                        $wanted_money_case = 1;
                        break;
                    case "money_3":
                        $wanted_money_case = 2;
                        break;
                    case "money_4":
                        $wanted_money_case = 3;
                        break;
                    case "money_5":
                        $wanted_money_case = 4;
                        break;
                }
            }
            else
            {
                // 프로젝트 진행 경험이 필요하지 않다면
                $is_project_experience = 0;
                $wanted_money_case = -1;
            }
        }

        //dd($big_num);

        //업로드 파일이 있다면..
        if ($pj_file) {
            //dd($project_file);
            $newFileName = time() . '-' . $pj_file->getClientOriginalName();
            $newFileName = iconv("UTF-8", "EUC-KR", $newFileName);
            $pj_file->move(storage_path() . '/public/img', $newFileName);
        }

        //insertGetId
        //만약 테이블에 auto-incrementing id가 있다면,
        //insertGetId 메소드를 사용하여 레코드를 삽입하고 id를 조회
        $pj_num = DB::table('projects')
            ->insertGetId(
                array
                (
                    'bc_num' => $big_num,
                    'sc_name'=>$sc_num,
                    'pj_content' => $pj_content,
                    'pj_title' => $pj_title,
                    'pj_date' => $pj_date,
                    'pj_price' => $mypay,
                    'pj_area' => $area,
                    'pj_file' => $newFileName,
                    'st_num' =>$st_num,
                    'm_num' =>$m_num,
                    'expect_date' => $expect_date,
                    'pj_people' => $pj_people,
                    'company_lat' => $company_lat,
                    'company_lng' => $company_lng,
                    'smart_matching' => $is_smart_matching,
                    'smart_matching_ex' => $is_project_experience,
                    'smart_matching_money' => $wanted_money_case
                )
            );
       /*
       //소 카테고리 DB->INSERT
       $small_category = DB::table('small_category')
            ->insert(array(
                'sc_name' => $sc_num,
                'bc_num' => $big_category
            ));
       */

        //ajax에서 보낸 기술들을 배열에 담기//일단 0으로 초기화
        $tech_insert_data_arr = [
            'web' => '0',
            'app' => '0',
            'HTML5' => '0',
            'CSS' => '0',
            'JavaScript' => '0',
            'Jquery' => '0',
            'Angular' => '0',
            'React' => '0',
            'pj_money' => $mypay,
        ];

        if (strcmp($big_num, '2') == 0) {
            $tech_insert_data_arr['app'] = '1';
        } else {
            $tech_insert_data_arr['web'] = '1';
        }

        foreach ($tech_insert_data_arr as $key => $value)
        {
            if($pj_keyword){
                foreach ($pj_keyword as $select_tech)
                {
                    if (strcmp($key, $select_tech) == 0)
                    {
                        $tech_insert_data_arr[$key] = '1';
                        break;
                    }
                }
            }
            else{
                $pj_keyword=null;
            }
        }

        $find_project_cate = DB::table('find_project_cate')
                ->insert(array(
                    'pj_num' => $pj_num,
                    'web' => $tech_insert_data_arr['web'],
                    'app' => $tech_insert_data_arr['app'],
                    'HTML5' => $tech_insert_data_arr['HTML5'],
                    'CSS' => $tech_insert_data_arr['CSS'],
                    'JavaScript' => $tech_insert_data_arr['JavaScript'],
                    'Jquery' => $tech_insert_data_arr['Jquery'],
                    'Angular' => $tech_insert_data_arr['Angular'],
                    'React' => $tech_insert_data_arr['React'],
                    'pj_money' => $tech_insert_data_arr['pj_money'],
                ));

        //dd($find_project_cate);

        //해당 게시물 key값 가져오기
        //dd($pj_num);
        //dd(count($pj_keyword));
        //primary key를 다중으로 설정하게 되면 설정된 모든 키에 대한 중복데이터가 입력이 되지 않음
        for ($i = 0; $i < count($pj_keyword); $i++) {
            DB::table('pj_tech')->insert(
                array('pj_num' => $pj_num,
                    'pj_skill' => $pj_keyword[$i])
            );
        }

        // return Redirect::route('projectList',compact('tech'));
        return redirect('/projectList');
    }


    //프로젝트 자세히 보기 뷰
    public function view($pj_num)
    {
        //$pj_view = find_project_cate::findOrFail($pj_num);

        //프로젝트 자세히 보기 뷰를 위한 쿼리
        $pj_view = DB::table('projects')
            ->leftjoin('big_category', 'projects.bc_num', '=', 'big_category.bc_num')
            ->where('projects.pj_num', 'like', $pj_num)
            ->get();
        //dd($pj_view);

        $smart_matching = DB::table('projects')
            ->join('find_project_cate', 'projects.pj_num', '=', 'find_project_cate.pj_num')
            ->where('projects.pj_num', 'like', $pj_num)
            ->get();

        $skill = DB::table('find_project_cate')
            ->select('HTML5', 'CSS', 'JavaScript', 'Jquery', 'Angular', 'React')
            ->where('pj_num', $pj_num)
            ->get();

        //dd($skills);
        //dd(count($skills));

        $matching_skills = [];
        foreach ($skill[0] as $key => $value) {
            if ($value == 1) {
                $matching_skills[] = $key;
            }
        }
        $pj_keyword = $matching_skills;

        //dd($pj_keyword);

        //스마트 매칭을 원할때
        if ($smart_matching[0]->smart_matching == '1')
        {
            //프로젝트 경험이 있을때
            switch ($smart_matching[0]->smart_matching_ex ==1)
            {
                //스마트 매칭 평균금액 첫번째 케이스
                case 0 :
                    $smart = $this->model->smartmaching_1($pj_keyword);
                    break;
                case 1 :
                    $smart = $this->model->smartmaching_2($pj_keyword);
                    break;
                case 2 :
                    $smart = $this->model->smartmaching_3($pj_keyword);
                    break;
                case 3 :
                    $smart = $this->model->smartmaching_4($pj_keyword);
                    break;
                case 4 :
                    $smart = $this->model->smartmaching_5($pj_keyword);
                    break;
            }
        }
        else
        {
            $smart = null;
        }

        //스마트 매칭을 위한 쿼리
        /* $matching = DB::select('select members.m_num, m_id ,m_email ,m_face, m_name, m_phone,m_area,  count(*) as count
                     from skill,members
                     where members.m_num=skill.m_num AND
                     sk_name IN (select pj_skill from pj_tech where pj_num='.$pj_num.')
                     group by members.m_num , m_id, m_email,m_face, m_name, m_phone,m_area
                     order by count desc');*/

        //쓰지않는 코드//
        /*  $matching= DB::table('projects')
               ->join('pj_tech','projects.pj_num','=','pj_tech.pj_num')//프로젝트가 가진 기술
               ->join('skill','pj_tech.pj_skill','=','skill.sk_name')
               ->join('members','skill.m_num','=','members.m_num')
               ->where('projects.pj_num','like',$pj_num)
               ->groupby('')
               ->get();*/
        // ->select('projects.pj_num','pj_tech.pj_skill','skill.*')
        //->join('skill','projects.m_num','=','skill.m_num')
        // ->select('projects.pj_num','pj_tech.pj_skill','members.m_id','members.m_name','members.m_phone','members.m_email','members.m_face','members.m_area','skill.sk_name')
        //->groupby('pj_tech.pj_skill')
        //->distinct()

        //dd($matching);

        //구글 지도를 사용하기 위한 회사정보
        $company_info = DB::table('projects')
            ->leftjoin('members', 'projects.m_num', '=', 'members.m_num')
            ->leftjoin('development', 'members.m_num', '=', 'development.m_num')
            ->where('projects.pj_num', 'like', $pj_num)
            ->select('members.m_id', 'members.m_email', 'members.m_face', 'development.m_num', 'development.cp_info', 'development.cp_tel', 'development.cp_represent')
            ->get();
        //dd($company_info);

        //지원관리
        $supports = DB::table('support')
            ->join('members', 'support.m_num', '=', 'members.m_num')
            ->select('support.m_num', 'members.m_id', 'members.m_name', 'members.m_phone', 'members.m_email', 'members.m_area', 'members.m_face', 'support.sp_date')
            ->where('support.pj_num', '=', $pj_num)
            ->get();
        //dd($supports);
        
            return view('project.projectView')
                ->with('pj_view', $pj_view[0])
                ->with('company_info', $company_info)
                ->with('supports', $supports)
                ->with('matching', $smart);

    }

    public function priceArrange($post)
    {
        //dd($post);
        if($post=='high')
        {
            $results=Projects::orderBy('pj_price','DESC')->paginate(5);
            //dd($results);
        }

        //dd($results);

        elseif($post=="low")
        {
            $results=DB::table('projects')
                ->where('pj_price','ASC')->paginate(5);

        }

        return view('project.projectList')->with('results', $results);

    }

    public function getDownload($pj_file) {
        dd($pj_file);
        return '다운로드입니다';
    }

    public function projectManage(){
        return view('project.admin_projectView');
    }

}
