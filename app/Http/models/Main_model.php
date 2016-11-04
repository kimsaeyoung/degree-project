<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Main_model extends Model {
    
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

    public function area_count(){

        $result = DB::table('members')
            ->select(DB::raw('count(*) as count, m_area'))
            ->where('div_member','1')
            ->groupBy('m_area')
            ->get();

        return $result;
    }

    public function count_going_pj(){

        $result = DB::table('projects')
            ->select(DB::raw('count(*) st_num'))
            ->where('st_num','4')
            ->get();

        return $result;
    }

    public function project_ranking(){

        $result = DB::select('select members.m_name,members.m_num,count(c.m_num) as count from contract c,projects p,members where c.pj_num=p.pj_num AND p.st_num=5 AND members.m_num=c.m_num group by c.m_num order by count desc');

        return $result;
    }

    public function portfolio_ranking(){

        $result = DB::select('select members.m_name,members.m_num,count(*) as count from master_portfolio,members where master_portfolio.m_num = members.m_num group by master_portfolio.m_num order by count desc');

        return $result;
    }


    public function app_count(){        //app 개수

        $result = DB::table('projects')
            ->select(DB::raw('count(*) as count'))
            ->where('bc_num','2')
            ->get();

        return $result;

    }

    public function web_count(){        //web 개수

        $result = DB::table('projects')
            ->select(DB::raw('count(*) as count'))
            ->where('bc_num','1')
            ->get();

        return $result;

    }

    public function new_project(){

        $result= DB::table('projects')
            ->join('big_category','big_category.bc_num','=','projects.bc_num')
            ->select('projects.pj_num','projects.pj_title','projects.created_at','big_category.bc_name')
            ->orderBy('pj_num','DESC')
            ->skip(0)
            ->take(10)
            ->get();

       /* $result= DB::table('projects')
            ->orderBy('pj_num','DESC')
            ->skip(0)
            ->take(10)
            ->get();*/

        return $result;
    }

    // 디자이너가 지원한 프로젝트
    public function support_list($m_num)
    {
        $result=  DB::table('project')
            ->where('members.m_num','=',$m_num)
            ->join('support','support.m_num','=','members.m_num')
            ->and('support','support.pj_num','=','project.pj_num')
            ->get();

        /*$result = DB::select("select p.pj_title,m.m_name,m.m_phone,m.m_area,p.pj_num
                              from project p,member m, support s
                              where s.m_num=m.m_num
                              AND s.pj_num=p.pj_num
                              ");*/
        return $result;
    }

    // 개발사의 등록 프로젝트
    public function project_list($m_num){


        //$result = DB::select('select projects.pj_title, projects.pj_num, count(support.pj_num) as count from projects,support where projects.m_num='.$m_num.' AND st_num < 3 AND projects.pj_num=support.pj_num group by projects.pj_title');
        //$result = DB::select('select projects.pj_title, projects.pj_num, count(support.pj_num) as count from projects left join support on projects.pj_num=support.pj_num  where projects.m_num='.$m_num.' AND st_num < 3 group by projects.pj_title');
        $result = DB::select('select projects.pj_title, projects.pj_num, count(support.pj_num) as count from projects left join support on projects.pj_num=support.pj_num  where projects.m_num='.$m_num.' AND st_num < 3 group by projects.pj_title');

        //$result = DB::select('select * from projects where m_num='.$m_num.' AND st_num < 3');
            return $result;



    }



}