<?php

namespace App\Http\Controllers;

use App\Http\Models\Designer_model;
use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\Console\Input\Input;
use Session;


class DesignerController extends Controller{
    public $model;

    public function __construct(){

        $this->model=new Designer_model();
    }

    //디자이너 리스트 뷰로 가는 곳
    public function index($value = 'nomal'){
        
        $count = $this->model->m_count();
        $m_list=$this->model->m_list($value);

        return view('designer.list')
            ->with('m_list',$m_list)
            ->with('count',$count)
            ->with('m_name',null);  
    }

    //디자이너 포트로그 페이지
    //아직 디자인 단계
    public function show($id){
        $m_name = null;
        $intro=$this->model->intro($id);
        return view('designer.portlog')
            ->with('m_num',$id)
            ->with('intro',$intro[0])
            ->with('m_name',$m_name);  
    }


    //디자이너 포트폴리오로 가는 부분
    //ajax 활용을 위해 각종 변수들을 계산해서 넘겨줌
    public function portfolio_temp($m_num = null){

        if($m_num) {
            $name = 'Portfolio';
            $items_per_group = 9;
            $count = $this->model->count($m_num);
            $total_group = ceil($count[0]->count / $items_per_group);
            return view('designer.portfolio')->with('total_group', $total_group)
                ->with('name', $name)
                ->with('m_num',$m_num);
        }else{
            App::abort(404);
        }
    }

    //받은 변수들을 이용해 ajax 무한스크롤을 하는 부분
    public function post(Request $request){

        $group_no = $request->input('group_no');
        $m_num    = $request->input('m_num');
        $items_per_group = 9;

        $group_number = filter_var($group_no,FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
        $position = ($group_number * $items_per_group);
        $results = $this->model->select($m_num,$position, $items_per_group);


        foreach($results as $row){
            echo "<a class='picture' id='picimg_".$row->pf_num."' ondblclick='picture($row->m_num,$row->pf_num)' draggable='true' ondragstart='drag(".$row->pf_num.")'>";
            echo '<img class="pf_img" id="pf_img_'.$row->pf_num.'" src="'.asset('img/portfolio/'.$row->pf_picture).'"  alt="D&D" >';
            echo "</a>";
        }
    }

    //디자이너 소개페이지로 가는 부분
    public function intro($m_num){

        $name='소개';
        $results = $this->model->intro($m_num);
        return view('designer.intro')
            ->with('results',$results[0])
            ->with('name',$name)
            ->with('m_num',$m_num);

    }
    public function intro_modify(Request $request){
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

        $this->model->intro_modify($intro_info);

        return redirect('/designer/intro/'.$intro_info['m_num']);

    }

    //디자이너 경력 페이지로 가는 부분
    public function school($m_num){
        $name='경력,학력';
        $academy_list=$this->model->academy($m_num);
        $career_list=$this->model->career($m_num);
        $skill_list=$this->model->skill($m_num);
        $prize_list=$this->model->prize($m_num);
        $licenese_list=$this->model->licenese($m_num);
        return view('designer.school')
            ->with('designer_num',$m_num)
            ->with('name',$name)
            ->with('academy_list',$academy_list)
            ->with('career_list',$career_list)
            ->with('skill_list',$skill_list)
            ->with('prize_list',$prize_list)
            ->with('licenese_list',$licenese_list)
            ->with('m_num',$m_num);
    }


    //디자이너가 완료된 프로젝트로 가는부분
    //완료된 평점등을 확인가능
    public function career($m_num){
        $name='평점';
        $grade=$this->model->grade($m_num);
        $web_count=$this->model->web_count($m_num);
        $app_count=$this->model->app_count($m_num);
        $end_project=$this->model->end_project($m_num);
    

        return view('designer.career')->with('name',$name)
                                       ->with('grade',$grade[0])
                                       ->with('web_count',$web_count[0])
                                       ->with('app_count',$app_count[0])
                                       ->with('end_project',$end_project)
                                       ->with('m_num',$m_num);

    }


    //평점 페이지에서 끝난 프로젝트의
    //하나하나 평점확인 가능
    //ajax형식 활용
    public function user_grade(Request $request){

        $m_num = $request->input('m_num');
        $pj_num = $request->input('pj_num');
        $one_grade=$this->model->end_grade($m_num,$pj_num);

        echo json_encode(array('grade',$one_grade[0]));

    }


    //모달창을 눌렀을때 알맞은 그림을 ajax 형식을 통해
    //DB에서 불러와 json형식으로 보내주는 곳
    public function pf_view(Request $request){
        $m_num=$request->input('m_num');
        $pf_num=$request->input('pf_num');

        $modal_view=$this->model->modal_view($m_num,$pf_num);

        echo json_encode($modal_view[0]);
    }

    //모달창을 띄어 버튼을 눌렀을때 ajax를 이용하여
    //그림이 바뀌도록 할수 있게 정보들을 DB 불러와 json형식으로 보내주는 곳
    public function pn_view(Request $request){
        $pf_num=$request->input('pf_num');
        $button=$request->input('button');

        $pn_view = $this->model->pn_view($pf_num,$button);

        echo json_encode(array('pn_view',$pn_view[0]));

    }
    //디자이너 학력 추가
    public function academy_add(Request $request){

        $academy['ac_name']=$request->input('ac_name');
        $academy['ac_specialty']=$request->input('ac_specialty');
        $academy['start_year']=$request->input('start_year');
        $academy['end_year']=$request->input('end_year');
        $academy['start_month']=$request->input('start_month');
        $academy['end_month']=$request->input('end_month');
        $academy['m_num']=Session::get('m_num');

        $ac_num=$this->model->academy_add($academy);

        echo json_encode(array($ac_num));
    }

    //디자이너 학력 삭제
    public function academy_delete(Request $request){
        $ac_num=$request->input('ac_num');
        $this->model->academy_delete($ac_num);
        echo json_encode('success');
    }

    //디자이너 경력 추가
    public function career_add(Request $request){

        $cr_info['cr_name'] = $request->input('cr_name');
        $cr_info['cr_content'] = $request->input('cr_content');
        $cr_info['cr_position'] = $request->input('cr_position');
        $cr_info['cr_start_date'] = $request->input('cr_start_date');
        $cr_info['cr_end_date'] = $request->input('cr_end_date');
        $cr_info['m_num']=Session::get('m_num');

        $cr_num=$this->model->career_add($cr_info);

        echo json_encode($cr_num);
    }
    //디자이너 경력 삭제
    public function career_delete(Request $request){

        $cr_num=$request->input('cr_num');
        $this->model->career_delete($cr_num);

        echo json_encode('success');
    }

    //디자이너 보유기술 추가
    public function licenese_add(Request $request){
        $lic_info['lic_name']=$request->input('lic_name');
        $lic_info['lic_pyot']=$request->input('lic_pyot');
        $lic_info['lic_date']=$request->input('lic_date');
        $lic_info['m_num']=Session::get('m_num');
        $lic_num=$this->model->licenese_add($lic_info);

        echo json_encode($lic_num);
    }
    //디자이너 보유기술 삭제
    public function licenese_delete(Request $request){

        $lic_num=$request->input('lic_num');
        $this->model->licenese_delete($lic_num);

        echo json_encode('success');

    }

    //디자이너 보유기술 추가 부분
    public function skill_modify(Request $request){
        $skill['sk_name']=$request->input('sk_name');
        $skill['sk_grade']=$request->input('sk_grade');
        $skill['sk_time']=$request->input('sk_time');
        $skill['m_num']=$request->input('m_num');
        $id=$this->model->add_skill($skill);
        echo json_encode(array($id));
    }

    //디자이너 보유기술 삭제 부분
    public function skill_delete(Request $request){
        $sk_num=$request->input('sk_num');
        $this->model->delete_skill($sk_num);
        echo json_encode('success');

    }

    //디자이너 찾기 부분
    public function designer_search(Request $request){

        $m_name=$request->input('m_name');
        $count = $this->model->designer_search_count($m_name);
        $m_list=$this->model->designer_search($m_name);


        return view('designer.list')
            ->with('m_list',$m_list)
            ->with('count',$count)
            ->with('m_name',$m_name);
    }

    public function portfolio($m_num)
    {

        $name = 'ポートフォリオ';
        $port_info = $this->model->master_portpolio($m_num);

        if($port_info != null) {
            $s_port_info = $this->model->portfolio($port_info[0]->mpf_num);
        }else{
            $s_port_info=null;
        }
            return view('designer.portfolio')->with('port_info', $port_info)
                ->with('s_port_info', $s_port_info)
                ->with('name', $name)
                ->with('m_num',$m_num);

    }

    public function s_portfolio(Request $request){
        $mpf_num=$request->input('mpf_num');

        $s_port_info = $this->model->portfolio($mpf_num);
        $mpf_port_info = $this->model->mpf_portfolio($mpf_num);

        echo json_encode(array('s_port_info'=>$s_port_info,'mpf_port_info'=>$mpf_port_info));
    }
    public function s_img(Request $request){

        $pf_num = $request->input('pf_num');

        $s_port_view=$this->model->s_portfolio($pf_num);

        echo json_encode($s_port_view);
    }
    public function LR_button(Request $request){

        $pf_num=$request->input('pf_num');
        $mpf_num=$request->input('mpf_num');
        $value=$request->input('value');

        $LR_button=$this->model->LR_button($pf_num,$mpf_num,$value);

       echo json_encode($LR_button[0]);
    }
    public function pf_modifyView($m_num){

        return view('designer.pt_Modify');

    }
    public function portfolio_upload(Request $request){


        $info['mpf_subject']=$request->input('subject');
        $info['mpf_content']=$request->input('content');
        $info['start_date']=$request->input('first_date');
        $info['end_date']=$request->input('second_date');
        $info['mpf_division']=$request->input('division');
        $info['m_num']=Session::get('m_num');
        

        $portfolio=$request->file('images');

        $newFileName = time() . '-' . $portfolio[0]->getClientOriginalName();
        $newFileName = iconv("UTF-8", "EUC-KR", $newFileName);
        $portfolio[0]->move('img/portfolio', $newFileName);

        $mpf_num=$this->model->master_portpolio_add($newFileName, $info);

        $info['mpf_num']=$mpf_num;

        for($i=1; $i<count($portfolio); $i++) {
            $newFileName = time() . '-' . $portfolio[$i]->getClientOriginalName();
            $newFileName = iconv("UTF-8", "EUC-KR", $newFileName);
            $portfolio[$i]->move('img/portfolio', $newFileName);

            $this->model->portfolio_add($newFileName, $info);
        }

        return redirect('/designer/portfolio2/'.Session::get("m_num").'');

    }


    //디자인 리스트 부분 checkbox형식으로 가져올수 있게 하기 위함
    public function division(Request $request){

        $division=$request->input('division');
        $number=$request->input('number');


        for($i = 0; $i < count($division); $i++) {
            if ($division[$i] == "") {
                $div_value=null;
            }
        }
        $div_value=array_values(array_filter(array_map('trim',$division)));

        for($i=0; $i<count($number); $i++){
            if($number[$i] ==null){
                $num_value[]=null;
            }
        }
        $num_value=array_values(array_filter(array_map('trim',$number)));

        $m_count =$this->model->division_count($div_value,$num_value);
        
        $count=0;
        
        if($m_count) {
            $m_list=$this->model->division($div_value,$num_value);
            foreach ($m_list as $row) {
                
                $data[$count] ="<div class='des_box_a'>";
                $data[$count] .="<div class='des_box_b'>";
                $data[$count] .="<div class='des_inner_title'>".$row->m_name."</div>";
                $data[$count] .="<div class='des_inner_1'>";
                $data[$count] .="<figure class='effect-bubba'>";
                if($row->m_face != null)
                    $data[$count] .=  "<img src='http://133.130.120.89/img/member_face/".$row->m_face."'>";
                else
                    $data[$count] .=  "<img src='http://133.130.120.89/img/member_face/no_face.jpg'>";
                $data[$count] .="<figcaption>";
                $data[$count] .="<p>".$row->ds_info."</p>";
                $data[$count] .= "<a href='/designer/".$row->m_num."' style='border-radius:20px'></a>";
                $data[$count] .="</figcaption>";
                $data[$count] .="</figure></div>";
                
                $data[$count] .="<p class='des_inner_2'>";
                $data[$count] .="<a href='/designer/portfolio2/".$row->m_num."'>";
                $data[$count] .="<img src='http://133.130.120.89/img/project.png'><br>";
                $data[$count] .="<span>PORTFOLO :";
                if($row->pj_count == null)
                    $data[$count] .="0";
                else
                    $data[$count] .= $row->pj_count;
                $data[$count] .="</span></a></p>";
                
                $data[$count] .="<p class='des_inner_3'>";
                $data[$count] .="<a href='/designer/career/".$row->m_num."'>";
                $data[$count] .="<img src='http://133.130.120.89/img/money.png'><br>";
                $data[$count] .="<span>取引件数 : ";
                if($row->pt_count == null)
                    $data[$count] .="0";
                else
                    $data[$count] .=$row->pt_count;
                $data[$count] .="</span></a></p></div>";
                    
                $count++;
            }
        }else{
            $data[$count]= "";
        }

        return json_encode(array('data'=>$data,'count'=>$m_count));
    }
}
?>

