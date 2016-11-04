<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Message;
use Illuminate\Support\Facades\Validator;
use Session;



class MessageController extends Controller
{
    public $model;

    public function __construct(){

        $this->model=new Message();
    }

    // 메세지 클릭 시 회사 이름 들고오기 위한 메서드
    public function get_development($result)
    {

        $projects_m_num = $this->model->get_development_model($result);
        //var_dump($development_name[0]->cp_represent);


        // Ajax는 성공시 echo의 정보를 들고온다. echo로 !!
        echo $projects_m_num[0] -> m_num;
        //echo $result;


    }

    // 메시지 보내기 창 열림
    public function message($data)
    {
        $results = $this->model->get_development_name($data);

        //보내는 사람을 같이 메시지보낼때 저장시켜주기 위함
        $myid = Session::get('m_num');

        return view('message.message')
                ->with('results',$results)
                ->with('myid',$myid);

    }


    // 메세지 전송 시 전송한 메세지 저장
    public function submit(Request $request){

        $receiver = $request->input('receiver');
        $msg_content = $request->input('msg_content');
        $sender = $request->input('sender');

        //Ajax의 경우 echo로 인식하여 alert창으로 확인
        // echo "이건 오나?";
        // echo $receiver."<br>".$message;
        //echo $sender;
    
        $this->model->message_save($sender, $msg_content, $receiver);
        
        $m_name=$this->model->message_m_name(Session::get('m_num'));
        $token=$this->model->message_token($receiver);
        
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
        }
        
        $arr['receiver'] = $receiver;
        $arr['msg_content'] = $msg_content;
        $arr['sender'] = $sender;

        //Ajax는 echo 로 인식
        echo json_encode($arr);
    }

    // 메시지함
    public function messageList($m_num){

        $results = $this->model->message_select($m_num);
        $senders = $this->model->sender_select($m_num);
        $myid = Session::get('m_num');
        
       return view('message.messageList')
            ->with('myid',$myid)
            ->with('results',$results)
            ->with('senders',$senders);

    }

    //개발사 메시지함 상세보기
    public function development_checked(Request $request){

        $msg_num = $request->input('msg_num');
        $receiver = $request->input('receiver');

        // update를 통해서 checked 값  변환
        $this->model->development_checked($msg_num);


        // select를 통해서 해당 메시지 가져오기
        $results=$this->model->company_message_view($msg_num);

        //읽지 않은 메시지 개수
        $results_count = $this->model->company_message_count($receiver);

        $msg_content = $results[0]->msg_content;
        $msg_date = $results[0]->msg_date;
        $sender = $results[0]->sender;
        $count = $results_count[0]->count; // 읽지 않은 메시지 개수 체크



        /*json 파일로 변환하기 위해...*/
        $arr['msg_content'] = $msg_content;
        $arr['msg_date'] = $msg_date;
        $arr['sender'] = $sender;
        $arr['count'] = $count; // 읽지 않은 메시지 개수 체크

            echo json_encode($arr);


        //echo $msg_content.$msg_date.$sender;

    }
    
    //메세지 한명씩 볼수 있게 하기 위함
    public function one_message(Request $request){
        $sender=$request->input('sender');
        $receiver=Session::get('m_num');
    
        $message=$this->model->one_message($sender,$receiver);

        if($message)
        {
            for($i=0; $i<count($message); $i++)
            {
                
                $data[$i] = '<div class="msgBox" onclick="javascript:readCheck('.$message[$i]->msg_num.',' .$message[$i]->receiver.')" style="';
                if($message[$i]->checked==0) 
                    $data[$i] .= 'background-color:lightgray ">';
                else
                    $data[$i] .= 'background-color:lightblue">';
                $data[$i] .= '<input type="hidden" name="_token" value="'.csrf_token().'">';
                $data[$i] .= '<input type="hidden" id="msg_num" value="'.$message[$i]->msg_num.'"/>';
                $data[$i] .= '<input type="hidden" id="receiver" value="'.$message[$i]->receiver.'"/>';
                $data[$i] .= '<div class="msg_sender">'.$message[$i]->m_name.'</div>';
                $data[$i] .= '<div class="msg_content">'.$message[$i]->msg_content.'</div>';
                $data[$i] .= '<div class="msg_date">'.$message[$i]->msg_date.'</div>';
                $data[$i] .= '</div>';
            }
        }else{
            echo $data="";
        }
        echo json_encode(array('data'=>$data));
    }
    
}