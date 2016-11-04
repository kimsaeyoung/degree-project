<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use DB;
use Session;

    class  Mypage extends Model{


    /*
     * 개발사 개인페이지
     */


    // 개발사 정보

    public function select($m_num){
        $result = DB::table('members')
            ->where('members.m_num','=',$m_num)
            ->get();
        /*$result = DB::select("select * from development LEFT JOIN member ON member.m_num=development.m_num");*/
        return $result;
    }

    // 개발사 정보 수정

 /*   'development.cp_info'=>$request['cp_info'],
    'development.cp_represent'=>$request['cp_represent']*/
    public function info_update($request){
       $result = DB::table('members')
           ->where('members.m_num',$request['m_num'])
           ->join('development','members.m_num','=','development.m_num')
            ->update(array('members.m_name'=>$request['m_name'],
                            'members.m_phone'=>$request['m_phone'],
                            'members.m_email'=>$request['m_email']
            ));
        /*$result = DB::table('members')
            ->where('members.m_num',$m_num['m_num'])
            ->join('development','members.m_num','=','development.m_num')
            ->update(array('members.m_name'=>$m_num['m_name'],
                'members.m_phone'=>$m_num['m_phone'],
                'members.m_email'=>$m_num['m_email']
            ));*/
        return $result;
    }
    // 개발사에 지원한 디자이너
    public function designer_list($m_num){
       /* $result=  DB::table('members')
            ->join('support','support.m_num','=','members.m_num')
            ->where('members.m_num','=',$m_num)
            ->and('support','support.pj_num','=','project','project.pj_num')
            ->get();*/

       /* $result = DB::select("select projects.pj_title,members.m_name,members.m_phone,members.m_area,projects.pj_num
                              from projects ,members , support
                              where support.$m_num=members.$m_num
                              AND s.pj_num=p.pj_num
                              ");*/

        $result = DB::select("select projects.pj_title,members.m_name,members.m_phone,members.m_area,projects.pj_num
                              from projects ,members , support
                              where $m_num=$m_num
                              AND support.pj_num=projects.pj_num
                              ");
        return $result;
    }
    // 개발사의 등록 프로젝트
    public function project_list($m_num){

        /*$result=  DB::table('development')
            ->join('projects','projects.m_num','=','development','development.m_num')
            ->where('members.m_num','=',$m_num)
            ->get();*/

        $result = DB::select("select * from development LEFT JOIN projects ON $m_num=$m_num");
        return $result;
    }

     // 개발사의 일정관리
     public function company_calendar(){
     }

    /*
     * 디자이너 개인 페이지
     */

    // 디자이너 정보
        public function designerpage($m_num){
            $result=  DB::table('members')
                ->where('m_num','=',$m_num)
                ->get();
           /* $result=  DB::table('designer')
                ->join('members','members.m_num','=','designer.m_num')
                ->where('members.m_num','=',$m_num)
                ->get();
           */
            return $result;
        }

        //디자이너 자기소개
        public function designer($m_num){
            $result = DB::table('designer')
                ->where('m_num','=',$m_num)
                ->get();
            return $result;
        }
        //디자이너 스킬/////////////////////////////////////
        public function skill($m_num){
            $result = DB::table('skill')
                ->where('m_num','=',$m_num)
                ->get();
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
        //////////////////////////////////////////////////////

        //디자이너 학력 /////////////////////////////////////


    // 디자이너 정보 수정
    public function info_update_designer($request){
        $result = DB::table('members')
            ->where('members.m_num',$request)
            ->join('designer','members.m_num','=','designer.m_num')
            ->update(array('members.m_name'=>$request['m_name'],
                'members.m_phone'=>$request['m_phone'],
                'members.m_email'=>$request['m_email'],
                'designer.ds_info'=>$request['ds_info']
            ));
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

    // 개발자 메시지 목록
    public function company_message($m_num){
        $result=  DB::table('members')
            ->where('members.m_num','=',$m_num)
            ->join('message','message.m_num','=','members.m_num')
            ->get();

        return $result;
    }

}
?>