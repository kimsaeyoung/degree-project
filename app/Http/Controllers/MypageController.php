<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\mypage;
use Illuminate\Support\Facades\Validator;
use Session;

class MypageController extends Controller{


   public function __construct()
    {
        $this->model = new mypage();
    }

    /*
     * 개발사 개인 페이지
     */

    // 개발사 정보
    public function companypage()
    {
        $results = $this->model->select(Session::get('m_num'));
        //dd($results);
        return view('mypage.companypage')->with('results',$results);

    }

    // 개발사 정보 수정
    public function modify($m_num){

        $results = $this->model->select($m_num);
        return view('mypage.companypage_modify')->with('results',$results);
    }

    // 개발사 정보 수정(submit)
    public function update(Request $request){

        /*$m_info['m_num']=$request->input('m_num');
        $m_info['m_name']=$request->input('m_name');
        $m_info['m_phone']=$request->input('m_phone');
        $m_info['m_email']=$request->input('m_email');
        $m_info['m_area']=$request->input('m_area');
        $m_info['cp_tel']=$request->input('cp_tel');
        $m_info['cp_info']=$request->input('cp_info');
        $m_info['cp_represent']=$request->input('cp_represent');

        $this->model->info_update($m_info);

        return redirect()->action('MypageController@companypage');*/

///////////////////////////////////////////////////////////////////////

        $intro_info['m_name']=$request->input('m_name');
        $intro_info['cp_tel']=$request->input('cp_tel');
        $intro_info['m_email']=$request->input('m_email');
        $intro_info['m_area']=$request->input('m_area');
        $intro_info['cp_info']=$request->input('cp_info');
        $intro_info['cp_represent']=$request->input('cp_represent');
        $intro_info['m_face']=$request->input('m_face');
        $intro_info['m_num']=Session::get('m_num');

        $company_face=$request->file('company_face');

        if ($company_face) {
            if($intro_info['m_face'])
            {
                unlink('img/member_face/'.$intro_info['m_face']);
            }
            $newFileName = time() . '-' . $company_face->getClientOriginalName();
            $newFileName = iconv("UTF-8", "EUC-KR", $newFileName);
            $company_face->move('img/member_face', $newFileName);

            $this->model->intro_face_company_modify($newFileName,$intro_info);
        }

        $this->model->info_update($intro_info);

        return redirect('companypage/modify/'.$intro_info['m_num']);
    }

    // 개발사에 지원한 디자이너
    public function designer($m_num){

       $results = $this->model->designer_list($m_num);

        return view('mypage.companypage_designer')
                ->with('results',$results);
    }

    // 개발사의 등록 프로젝트
    public function development(){

        $results = $this->model->project_list(Session::get('m_num'));

        //dd($results);

        return view('mypage.companypage_development')->with('results',$results);
    }


    //개발사 일정관리
    public function company_calendar(){
        $results = $this->model->company_calendar();
        return view('mypage.company_calendar')->with('results',$results);
    }

    // 개발사 메시지
    public function chat(){
        return view('mypage.message');
    }





    /*
     * 디자이너 개인 페이지
     */

    // 디자이너 정보
    public function designerpage(){
        $results = $this->model->designerpage(Session::get('m_num'));
        $myId = Session::get('m_id');
        return view('mypage.designerpage')
                ->with('results',$results)
                ->with('myId', $myId);

    }

    // 디자이너 정보 수정
    public function designer_modify($m_num){

        $results = $this->model->designerpage($m_num);
        return view('mypage.designerpage_modify')->with('results',$results);
    }

    // 디자이너 정보 수정(submit)
    public function designerpage_update(Request $request){

        $intro_info['m_name']=$request->input('m_name');
        $intro_info['m_phone']=$request->input('m_phone');
        $intro_info['m_email']=$request->input('m_email');
        $intro_info['m_area']=$request->input('m_area');
        $intro_info['ds_info']=$request->input('ds_info');
        $intro_info['m_face']=$request->input('m_face');
        $intro_info['m_num']=Session::get('m_num');

        $designer_face=$request->file('designer_face');

        if ($designer_face) {
            if($intro_info['m_face'])
            {
                unlink('img/member_face/'.$intro_info['m_face']);
            }
            $newFileName = time() . '-' . $designer_face->getClientOriginalName();
            $newFileName = iconv("UTF-8", "EUC-KR", $newFileName);
            $designer_face->move('img/member_face', $newFileName);

            $this->model->intro_face_modify($newFileName,$intro_info);
        }

        $this->model->info_update_designer($intro_info);

        return redirect('designerpage/modify/'.$intro_info['m_num']);




        //$this->model->info_update_designer($intro_info); 내꺼


    }

    // 디자이너 포토폴리오 등록
    public function pf_modifyView($m_num){

        return view('mypage.pt_Modify');

    }

    // 디자이너가 지원한 프로젝트
    public function support_list($m_num){
        //dd($m_num);
        $results = $this->model->support_list($m_num);
        //dd($results);

        return view('mypage.support_list')->with('results',$results);
    }















    // main
    public function main(){
        $result = DB::select ("select * from members where m_id = '{$id}' and m_pw = '{$pw}'");
        dd($result);

        if($result)
        {

            Session::put('m_info', $result);
        }else{
            return view('/');
        }
        return redirect('/');
        return view('main.mainview');
    }







}
?>