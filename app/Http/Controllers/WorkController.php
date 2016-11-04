<?php

    namespace App\Http\Controllers;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Work;
    use Session;


    class WorkController extends Controller {

        public $model;

        public function __construct(){

            $this->model=new Work();
        }

        // 타임라인 들어가기 전 선택
        public function choice_timeline(){
            
            $m_num = Session::get('m_num');

            $results = $this->model->get_projects($m_num);
            
            //dd($m_num);

            return view('work.choice_timeline')->with('results',$results);

        }

        // 협업-타임라인 index
        public function index($pj_num)
        {
            $result = $this->model->select_timeline($pj_num);
            $m_name = $this->model->select_timeline_name($pj_num);
            $project = $this->model->select_project($pj_num);
            $ds_num   = $this->model->select_m_num($pj_num);
            
            return view('work.timeline')
                    ->with('m_name',$m_name)
                    ->with('result',$result)
                    ->with('project',$project[0])
                    ->with('ds_num',$ds_num);
        }

        // 글 쓰기 창
        public function timeline($result){
            echo $result;
        }

        // TimeLine write 프로젝트 title 보내기
        public function timeline_write($date){

            $result = $this->model->get_timeline($date);

            return view('work.timeline_write')
                    ->with('result',$result)
                ;
        }

        // (협업 타임라인 글쓰기->저장 Ajax 처리)
        public function timeline_save(Request $request){

            $pj_num = $request->input('pj_num');
            $tI_content = $request->input('tI_content');
            $m_num = $request->input('m_num');

            $this->model->timeline_save($pj_num,$tI_content,$m_num);

        }

        // UID Tool
        public function uid() {
            return view('work.uid');
        }
        
        public function contractWrite(Request $request) {
            
            $pj_num = $request->input('pj_num');
            $m_num = $request->input('m_num');
            
            $result = $this->model->getInfomation($pj_num, $m_num);
            
            //dd($result);
            
            echo json_encode($result);
            
            /*return view('work.contractWrite')
                ->with('result', $result[0]);*/
            
        }
        
        public function contractInsert(Request $request) {
            
            //dd($request);
            
            $data['pj_num'] = $request->input('pj_num');
            $data['m_num'] = $request->input('design_num');
            $data['tmp_start_date'] = $request->input('tmp_start_date');
            $data['tmp_end_date'] = $request->input('tmp_end_date');
            $data['tmp_money'] = $request->input('tmp_money');
            $data['tmp_content'] = $request->input('tmp_content');
            
            $result = $this->model->contractInsert($data);
            
            if($result) {
                return redirect('/projectView/'.$data['pj_num']);
            } else {
                dd($result);
            }
        }
        
        public function contractView(Request $request) {       
            
            $tmp_num = $request->input('tmp_num');
            
            $result = $this->model->contractView($tmp_num);
            
            $nameData = $this->model->getInfomation($result[0]->pj_num, $result[0]->m_num);
            
            echo json_encode(array('result'=>$result[0],'nameData'=>$nameData[0]));

        }
        
        public function contractAccept(Request $request) {
            
            $data['tmp_num'] = $request->input('tmp_num');
            $data['pj_num'] = $request->input('pj_num');
            $data['m_num'] = Session::get('m_num');
            $data['ct_start_date'] = $request->input('ct_start_date');
            $data['ct_end_date'] = $request->input('ct_end_date');
            $data['ct_money'] = $request->input('ct_money');
            $data['ct_content'] = $request->input('ct_content');
            
            $result = $this->model->contractAccept($data);
            
            if($result) {
                return redirect('/work/'.$data['pj_num']);
            } else {
                dd($result);
            }
            
        }
        
        public function contractList() {
            
            $m_num = Session::get('m_num');
            
            $result = $this->model->contractList($m_num);
            
            //dd($result);
            
            return view('work.contractList')
                ->with('result', $result);
        }
        
        public function project_clear(Request $request) {
            
            $grade['gd_professional']=$request->input('gd_professional');
            $grade['gd_satisfaction']=$request->input('gd_satisfaction');
            $grade['gd_plan']=$request->input('gd_plan');
            $grade['gd_content']=$request->input('gd_content');
            $grade['m_num'] = Session::get('m_num');
            $grade['ds_num'] = $request->input('ds_num');
            $grade['pj_num'] = $request->input('pj_num');
            
            $this->model->project_clear($grade);
            
            echo json_encode(array('one'=>"one"));
            
        }
        public function ds_project_clear(Request $request){
            
            $grade['pj_num'] = $request->input('pj_num');
            
            $this->model->ds_project_clear($grade);
            
            echo json_encode('success');
            
        }
    }

?>