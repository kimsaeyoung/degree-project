<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use DB;
use Session;


class  Work extends Model
{


    // 타임라인 프로젝트 찾기
    public function get_projects($m_num)
    {

        /*div_member가 1이면 디자이너(designerpage) or 2이면 개발사(development)*/

        $div_member = DB::table('members')
            ->where('m_num', '=', $m_num)
            ->value('div_member');

        if ($div_member == 2) { //개발사인 경우 진행중인 프로젝트 찾기

            $result = DB::table('projects')
                ->where('m_num', '=', $m_num)
                ->get();
            //$member = $result[0]->st_num; // 프로젝트 상태가 진행 중인 것만 뽑기
            return $result;

        } else if ($div_member == 1) { //디자이너의 경우 진행중인 프로젝트 찾기

            /*$first = DB::table('contract')
                ->where('m_num', '=', $result)
                ->get();
            
            $project = $first[0]->pj_num;

            $result = DB::table('projects')
                ->where('pj_num', '=', $project)
                ->get();*/
            
            $result = DB::table('contract')
                ->join('projects','contract.pj_num','=','projects.pj_num')
                ->join('members','projects.m_num','=','members.m_num')
                ->where('contract.m_num','=',$m_num)
                ->get();

            return $result;
        }
    }

    //프로젝트 num을 통해 timeline
    public function select_timeline($pj_num){

        $result = DB::table('timeline')
            ->where('pj_num', '=', $pj_num)
            ->orderBy('tl_time','desc')
            ->get();

        return $result;
    }

    //프로젝트 num을 통해 timeline 작성자 찾기
    public function select_timeline_name($pj_num){

        $result = DB::select("select members.m_name from timeline,members WHERE pj_num =$pj_num AND  members.m_num = timeline.m_num ORDER by timeline.tl_time desc");

        return $result;

    }


    // 타임라인 해당 프로젝트 찾기
    public function get_timeline($date)
    {

        $result = DB::table('projects')
            ->where('pj_num', '=', $date)
            ->get();

        return $result;
    }

    // (협업 타임라인 글쓰기->저장 Ajax 처리)
    public function timeline_save($pj_num,$tI_content,$m_num){

        DB::table('timeline')->insert([
            'pj_num' => $pj_num,
            'tl_content' => $tI_content,
            'm_num' => $m_num,
        ]);
    }
    
    public function getInfomation($pj_num, $m_num) {
        
        $result = DB::table('members')
            ->join('projects', 'projects.m_num','=','members.m_num')
            ->select(DB::raw('projects.pj_num, projects.pj_title, members.m_name as devel_name, members.m_num as devel_num, (select m_name from members where m_num='.$m_num.') as design_name, (select m_num from members where m_num='.$m_num.') as design_num'))
            ->where('projects.pj_num','=',$pj_num)
            ->get();

        return $result;
    }
    
    public function contractInsert($data) {
        
        $result = DB::table('tmp_contract')->insert([
            'pj_num' => $data['pj_num'],
            'm_num' => $data['m_num'],
            'tmp_money' => $data['tmp_money'],
            'tmp_start_date' => $data['tmp_start_date'],
            'tmp_end_date' => $data['tmp_end_date'],
            'tmp_content' => $data['tmp_content']
        ]);
        
        return $result;
        
    }
    
    public function contractView($tmp_num) {
        
        $result = DB::table('tmp_contract')
            ->where('tmp_num', '=', $tmp_num)
            ->get();
        
        return $result;
        
    }
    
    public function contractAccept($data) {
        
        $result = DB::table('contract')
            ->insert([
                'pj_num' => $data['pj_num'],
                'm_num' => $data['m_num'],
                'ct_money' => $data['ct_money'],
                'ct_start_date' => $data['ct_start_date'],
                'ct_end_date' => $data['ct_end_date'],
                'ct_content' => $data['ct_content']
            ]);
        
        DB::table('tmp_contract')->where('tmp_num', '=', $data['tmp_num'])->delete();
        
        DB::table('projects')
            ->where('pj_num', '=', $data['pj_num'])
            ->update(array('st_num' => 4));
        
        return $result;
        
    }
    
    public function contractList($m_num) {
        
        $result = DB::select('select tmp_contract.*, projects.pj_title, members.m_name as devel_name from tmp_contract, projects, members where projects.pj_num=tmp_contract.pj_num and tmp_contract.m_num='.$m_num.' and projects.m_num=members.m_num and projects.pj_num IN (select pj_num from tmp_contract where m_num='.$m_num.')');
            
        return $result;
        
    }
    public function select_project($pj_num){
        
        $result = DB::table('projects')
            ->where('pj_num',$pj_num)
            ->get();
        
        return $result;
    }
    public function select_m_num($pj_num){
        
        $result = DB::table('contract')
            ->where('pj_num',$pj_num)
            ->select('m_num')
            ->get();
        
        return $result;
    }
    
    public function project_clear($grade){
        
        $result = DB::table('grade')->insert(
            array(
                'pj_num' => $grade['pj_num'], 
                'm_num' => $grade['ds_num'],
                'gd_professional'=>$grade['gd_professional'],
                'gd_plan'=>$grade['gd_plan'],
                'gd_satisfaction'=>$grade['gd_satisfaction'],
                'gd_content'=>$grade['gd_content'])
        );
    }
    
    public function ds_project_clear($grade){
        DB::table('projects')
            ->where('pj_num',$grade['pj_num'])
            ->update(array('st_num'=>5));
    }
    

}
