<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Pagination\Paginator;

class Designer_model extends Model
{

    //디자이너의 인원수를 구해준다.
    public function m_list($value){
        //바로들어갔을때 OR 진행한 프로젝트 순
        if($value =='project' || $value == 'nomal'){
            $result = DB::table('members')
                ->select(DB::raw('(select count(m_num)
                                           from   master_portfolio
                                           where  members.m_num=master_portfolio.m_num) as pj_count,
                              (select  count(c.m_num)
		                                   from contract c,projects p
		                                   where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num
                                           group by c.m_num) as pt_count, members.m_num , members.m_name, designer.ds_info, members.m_face'))
                ->join('designer','designer.m_num','=','members.m_num')
                ->where('div_member', '=', '1')
                ->orderBy('pt_count','desc')->paginate(6);
/*
 * select (select count(m_num) from portfolio where members.m_num=portfolio.m_num) as pt_count,
(select  count(c.m_num)from contract c,projects p
where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num
group by c.m_num) as pj_count, m_num , m_name
from members
where div_member=1
order by pt_count desc
 * */
            //포트폴리오의 갯수가 많은 순으로
        }elseif($value =='portfolio'){
            $result = DB::table('members')
                ->select(DB::raw('(select count(m_num)
                                           from   master_portfolio
                                           where  members.m_num=master_portfolio.m_num) as pj_count,
                              (select  count(c.m_num)
		                                   from contract c,projects p
		                                   where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num
                                           group by c.m_num) as pt_count, members.m_num , members.m_name, designer.ds_info, members.m_face'))
                ->where('div_member', '=', '1')
                ->join('designer','designer.m_num','=','members.m_num')
                ->orderBy('pj_count','desc')
                ->paginate(6);
        }

        return $result;
    }
    
    //디자이너가 얼마나있는지 확인하는 쿼리
    public function m_count(){
        $result = DB::table('members')
            ->join('designer','designer.m_num','=','members.m_num')
            ->where('div_member','=','1')
            ->count();
        
        return $result;
    }

    //디자이너 검색 쿼리
    public function designer_search($m_name){
        $result = DB::table('members')
            ->select(DB::raw('(select count(m_num)
                                           from   master_portfolio
                                           where  members.m_num=master_portfolio.m_num) as pj_count,
                              (select  count(c.m_num)
		                                   from contract c,projects p
		                                   where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num
                                           group by c.m_num) as pt_count, members.m_num , members.m_name, designer.ds_info, members.m_face'))
            ->join('designer','designer.m_num','=','members.m_num')
            ->where('div_member', '=', '1')
            ->where('members.m_name','like','%'.$m_name.'%')
            ->paginate(6);

        return $result;
    }
    //디자이너 검색 카운터 쿼리
    public function designer_search_count($m_name){
        $result = DB::table('members')
            ->select(DB::raw('(select count(m_num)
                                           from   master_portfolio
                                           where  members.m_num=master_portfolio.m_num) as pj_count,
                              (select  count(c.m_num)
		                                   from contract c,projects p
		                                   where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num
                                           group by c.m_num) as pt_count, members.m_num , members.m_name, designer.ds_info, members.m_face'))
            ->join('designer','designer.m_num','=','members.m_num')
            ->where('div_member', '=', '1')
            ->where('members.m_name','like','%'.$m_name.'%')
            ->count();
        
        return $result;
    }

    //디자이너 경력 학력 등을 불러온다.
    public function academy($m_num){
        $result=DB::table('academy')
            ->where('m_num','=',$m_num)->get();

        return $result;
    }
    //학력 삭제
    public function academy_delete($ac_num){
        DB::table('academy')
            ->where('ac_num', '=', $ac_num)->delete();
    }

    
    //경력 추가 쿼리
    public function academy_add($academy){
        $id=DB::table('academy')
            ->insertGetId(array('ac_name'=>$academy['ac_name'],
                'ac_specialty'=>$academy['ac_specialty'],
                'ac_start_date'=>$academy['start_year'].'-'.$academy['start_month'],
                'ac_end_date'=>$academy['end_year'].'-'.$academy['end_month'],
                'm_num'=>$academy['m_num']));
        return $id;
    }
    ///////////////////////////////////////////


    //디자이너 스킬을 불러온다.
    public function skill($m_num){
        $result=DB::table('skill')
            ->where('m_num','=',$m_num)->get();

        return $result;

    }
    //추가
    public function add_skill($skill){
        $id = DB::table('skill')
            ->insertGetId(
                array('sk_name'=>$skill['sk_name'],'sk_grade'=>$skill['sk_grade'],'sk_time'=>$skill['sk_time'],'m_num'=>$skill['m_num'])
            );
        return $id;
    }
    //삭제
    public function delete_skill($sk_num){
        DB::table('skill')
            ->where('sk_num', '=', $sk_num)->delete();
    }
    ///////////////////////////////////////////
    //디자이너 경력을 불러온다.
    public function career($m_num){
        $result=DB::table('career')
            ->where('m_num','=',$m_num)->get();

        return $result;

    }
    public function career_add($cr_info){
        $id=DB::table('career')
            ->insertGetId(array('cr_name'=>$cr_info['cr_name'],
                'cr_content'=>$cr_info['cr_content'],
                'cr_position'=>$cr_info['cr_position'],
                'cr_start_date'=>$cr_info['cr_start_date'],
                'cr_end_date'=>$cr_info['cr_end_date'],
                'm_num'=>$cr_info['m_num']));

        return $id;
    }

    public function career_delete($cr_num){
        DB::table('career')
            ->where('cr_num', '=', $cr_num)->delete();
    }

    ///////////////////////////////////////////////


    //디자이너 수상 경력을 불러온다.
    public function prize($m_num){
        $result=DB::table('prize')
            ->where('m_num','=',$m_num)->get();

        return $result;
    }

    ////////////////////////////////////////////////
    //디자이너의 자격증 등을 불러온다.

    public function licenese($m_num){
        $result=DB::table('licenese')
            ->where('m_num','=',$m_num)->get();

        return $result;
    }

    public function licenese_add($lic_info){

        $id=DB::table('licenese')
            ->insertGetId(array('lic_name'=>$lic_info['lic_name'],
                'lic_pyot'=>$lic_info['lic_pyot'],
                'lic_date'=>$lic_info['lic_date'],
                'm_num'=>$lic_info['m_num']));

        return $id;
    }

    public function licenese_delete($lic_num){
        DB::table('licenese')
            ->where('lic_num','=',$lic_num)->delete();
    }

    //////////////////////////////////////////////////

    //디자이너의 소개페이지에서 디자이너의 정보를 불러올때 사용
    public function intro($m_num){



        $result=DB::table('members')
            ->join('designer','designer.m_num','=','members.m_num')
            ->where('designer.m_num','=',$m_num)->get();

        return $result;
    }

    public function intro_modify($intro_info){

        DB::table('members')
            ->where('m_num', $intro_info['m_num'])
            ->update(array('m_name' => $intro_info['m_name'],
                'm_phone'=>$intro_info['m_phone'],
                'm_email'=>$intro_info['m_email'],
                'm_area'=>$intro_info['m_area']));

        DB::table('designer')
            ->where('m_num',$intro_info['m_num'])
            ->update(array('ds_info'=>$intro_info['ds_info']));

    }

    public function intro_face_modify($designer_face,$intro_info){

        DB::table('members')
            ->where('m_num',$intro_info['m_num'])
            ->update(array('m_face'=>$designer_face));

    }


    //현재 보류단계
    /*public function m_list_grade(){
        $result=DB::select('select m_num,round(avg(gd_professional),2) as gd_professional,round(avg(gd_plan),2) as gd_plan, round(avg(gd_satisfaction),2) as gd_satisfaction
                            from grade
                            group by m_num');
        return $result;
    }*/

    //디자이너의 포트폴리오를 가져올때 사용 =>ajax이용한것임
    public function select($m_num,$position,$items_per_group){
        $result=DB::select('select * from master_portfolio  where m_num='.$m_num.' limit '.$position.','.$items_per_group);
        return $result;
    }

    //디자이너의 포트폴리오 총 갯수를 가져옴
   /* public function portfolio(){
        $result=DB::select('select * from portfolio where m_num=1');
        return $result;
    }*/

    //디자이너의 포트폴리오가 총 몇개인지 보여준다.
    public function count($m_num){
        $result=DB::select('select count(*) count from master_portfolio where m_num='.$m_num);
        return $result;
    }

    //디자이너가 지금까지 했던 총 평점을 계산해서 평균을 구해준다.
    public function grade($m_num){
        $result=DB::select('select round(avg(gd_professional),2) as gd_professional,round(avg(gd_plan),2) as gd_plan,round(avg(gd_satisfaction),2) as gd_satisfaction from grade where m_num='.$m_num);
        return $result;
    }

    //디자이너가 총 몇개의 웹을 만들었는지 카운터 해서 보여준다.
    public function web_count($m_num){
        $result=DB::select('select count(bc_num) as web_count
                            from projects p , contract c
                            where p.pj_num=c.pj_num AND p.st_num=5 AND c.m_num='.$m_num.' AND bc_num=1');
        return $result;
    }

    //디자이너가 총 몇개의 앱을 만들었는지 카운터 해서 보여준다.
    public function app_count($m_num){
        $result=DB::select('select count(bc_num) as app_count
                            from projects p , contract c
                            where p.pj_num=c.pj_num AND p.st_num=5 AND c.m_num='.$m_num.' AND bc_num=2');
        return $result;
    }

    //끝난 프로젝트를 보여준다.
    public function end_project($m_num){
        $result= DB::table('contract')       
            ->join('projects','contract.pj_num','=','projects.pj_num')
            ->join('members','projects.m_num','=','members.m_num')
            ->where('projects.st_num','=','5')
            ->where('contract.m_num','=',$m_num)
            ->paginate(3);

        return $result;
    }

    //사용자의 평점을 볼때 하나의 프로젝트 평점 점수를 가져온다.
    public function end_grade($m_num,$pj_num){
        $result=DB::table('grade')
            ->where('m_num','=',$m_num)
            ->where('pj_num','=',$pj_num)->paginate(3);
        return $result;
    }

    //모달창을 띄울때 필요한 뷰정보를 가져온다.
    public function modal_view($m_num,$pf_num){
        $result=DB::table('portfolio')
            ->where('m_num','=',$m_num)
            ->where('pf_num','=',$pf_num)->get();
        return $result;
    }

    //이전 뷰나 다음뷰의 정보를 가져온다.
    public function pn_view($pf_num,$button){

        if($button =='left') {
            $result = DB::select('select *,@num:=@num+1 as num
                            from portfolio,(SELECT @num:=0) num
                            where m_num=1 AND pf_num < ' . $pf_num . '
                            order by pf_num desc');

        }elseif($button =='right') {
            $result = DB::select('select *,@num:=@num+1 as num
                            from portfolio,(SELECT @num:=0) num
                            where m_num=1 AND pf_num > ' . $pf_num);
        }

        return $result;
    }

    public function master_portpolio($m_num){

        $result=DB::table('master_portfolio')
            ->where('m_num','=',$m_num)
            ->get();

        return $result;
    }
    public function portfolio($mpf_num){

        $result = DB::table('portfolio')
            ->where('mpf_num','=',$mpf_num)
            ->get();
        return $result;
    }

    public function s_portfolio($pf_num){

        $result = DB::table('portfolio')
            ->where('pf_num','=',$pf_num)
            ->get();

        return $result;
    }
    public function mpf_portfolio($mpf_num){
        $result = DB::table('master_portfolio')
            ->where('mpf_num',$mpf_num)
            ->get();
        return $result;
    }

    public function LR_button($pf_num,$mpf_num,$value){
        if($value =='left') {
            $result = DB::select('select *,@num:=@num+1 as num
                            from portfolio,(SELECT @num:=0) num
                            where mpf_num='.$mpf_num.' AND pf_num < ' . $pf_num . '
                            order by pf_num desc');

        }elseif($value =='right') {
            $result = DB::select('select *,@num:=@num+1 as num
                            from portfolio,(SELECT @num:=0) num
                            where mpf_num='.$mpf_num.' AND pf_num > ' . $pf_num);
        }

        return $result;
    }

    public function master_portpolio_add($newFileName, $info){
        $id=DB::table('master_portfolio')
            ->insertGetId(array(
                'mpf_content'=>$info['mpf_content'],
                'mpf_date'=>'now()',
                'mpf_subject'=>$info['mpf_subject'],
                'start_date'=>$info['start_date'],
                'end_date'=>$info['end_date'],
                'mpf_division'=>$info['mpf_division'],
                'm_num'=>$info['m_num'],
                'mpf_picture'=>$newFileName));

        return $id;
    }

    public function portfolio_add($newFileName, $info){
        $id=DB::table('portfolio')
            ->insertGetId(array('mpf_num'=>$info['mpf_num'],
                'pf_picture'=>$newFileName));
        return $id;
    }
    
    public function division($div_value,$num_value){
        $num_count=count($num_value);
        $div_count=count($div_value);

        $select=DB::table('members')
            ->select(DB::raw('(select count(m_num)
                                           from   master_portfolio
                                           where  members.m_num=master_portfolio.m_num) as pj_count,
                              (select  count(c.m_num)
		                                   from contract c,projects p
		                                   where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num
                                           group by c.m_num) as pt_count, members.m_num , members.m_name, designer.ds_info, members.m_face'))
            ->join('designer','designer.m_num','=','members.m_num');
        if($num_count == null ) {
            for($i=0; $i<count($div_value); $i++) {
                $query=$select->orWhere('m_area',$div_value[$i]);
            }
        }elseif($num_count == 1){
            if($num_value[0] == 'portfolio')
                $division='pj_count';
            elseif($num_value[0] == 'project')
                $division='pt_count';
            for($i=0; $i<count($div_value); $i++) {
                $query=$select->orWhere('m_area',$div_value[$i]);
            }
            $select->orderby($division,'desc');
        }elseif($num_count == 2){
            for($i=0; $i<count($div_value); $i++) {
                $query=$select->orWhere('m_area',$div_value[$i]);
        }
            $select->orderby('pt_count','desc')
                ->orderby('pj_count','desc');
        }
        $query=$select->where('div_member', '1')->paginate(6);

        return $query;
    }
    
    
    public function division_count($div_value,$num_value){
        $num_count=count($num_value);
        $div_count=count($div_value);

        $select=DB::table('members')
            ->join('designer','designer.m_num','=','members.m_num');
        if($num_count == null ) {
            for($i=0; $i<count($div_value); $i++) {
                $query=$select->orWhere('m_area',$div_value[$i]);
            }
        }elseif($num_count == 1){
            for($i=0; $i<count($div_value); $i++) {
                $query=$select->orWhere('m_area',$div_value[$i]);
            }
            
        }elseif($num_count == 2){
            for($i=0; $i<count($div_value); $i++) {
                $query=$select->orWhere('m_area',$div_value[$i]);
            }    
        }
        $query=$select->where('div_member', '1')->count();

        return $query;
        
    }


}
