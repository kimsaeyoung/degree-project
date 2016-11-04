<?php
namespace App;
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

        $result=DB::table('members')
            ->join('development','development.m_num','=','members.m_num')
            ->where('development.m_num','=',$m_num)
            ->get();


        return $result;
    }

    // 개발사 정보 수정
    public function info_update($request){

        DB::table('members')
            ->where('m_num', $request['m_num'])
            ->update(array(
                'm_name' => $request['m_name'],
                'm_email'=>$request['m_email'],
                'm_area'=>$request['m_area']
            ));

        DB::table('development')
            ->where('m_num',$request['m_num'])
            ->update(array(
                'cp_info'=>$request['cp_info'],
                'cp_tel'=>$request['cp_tel'],
                'cp_represent'=>$request['cp_represent']
            ));

    }

    // 디자이너 정보 수정(얼굴 포함 )
    public function intro_face_company_modify($company_face, $intro_info){

        DB::table('members')
            ->where('m_num',$intro_info['m_num'])
            ->update(array('m_face'=>$company_face));

    }


    // 개발사에 지원한 디자이너
    public function designer_list($m_num){

        $result = DB::select("select projects.pj_title, members.m_name, members.m_phone, members.m_area, members.m_face
                              from projects,members , support
                              WHERE projects.m_num = $m_num
                              AND projects.pj_num = support.pj_num
                              AND support.m_num = members.m_num
                              ");

        return $result;


    }
    // 개발사의 등록 프로젝트
    public function project_list($m_num){

        $result=  DB::table('projects')
            ->join('development','development.m_num','=','projects.m_num')
            ->where('projects.m_num','=',$m_num)
            ->get();

        return $result;
    }



     // 개발사의 일정관리
     public function company_calendar()
     {
     }


    // 개발자 메시지 목록
    public function company_message($m_num){
        $result=  DB::table('members')
            ->where('members.m_num','=',$m_num)
            ->join('message','message.m_num','=','members.m_num')
            ->get();

        return $result;
    }


    /*
     * 디자이너 개인 페이지
     */

    // 디자이너 정보
    public function designerpage($m_num){

        $result=  DB::table('members')
            ->join('designer','designer.m_num','=','members.m_num')
            ->where('designer.m_num','=',$m_num)
            ->get();

        return $result;
    }

    // 디자이너 정보 수정
    public function info_update_designer($request){

        DB::table('members')
            ->where('m_num', $request['m_num'])
            ->update(array('m_name' => $request['m_name'],
                'm_phone'=>$request['m_phone'],
                'm_email'=>$request['m_email'],
                'm_area'=>$request['m_area']));

        DB::table('designer')
            ->where('m_num',$request['m_num'])
            ->update(array('ds_info'=>$request['ds_info']));

    }


    // 디자이너 정보 수정(얼굴 포함 )
    public function intro_face_modify($designer_face, $intro_info){

        DB::table('members')
            ->where('m_num',$intro_info['m_num'])
            ->update(array('m_face'=>$designer_face));

    }

    // 디자이너가 지원한 프로젝트
    public function support_list($m_num)
    {

       $result = DB::select("select *
                              from projects,members , support
                              WHERE support.m_num = $m_num
                              AND support.m_num = members.m_num
                              AND support.pj_num = projects.pj_num
                              ");

        return $result;
    }



}
?>