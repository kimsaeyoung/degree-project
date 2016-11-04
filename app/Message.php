<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;
use DB;


class  Message extends Model
{

    // 메세지(url을 통해  개발사의 m_num을 얻는다)
    public function get_development_model($result) {
        //$result = DB::select("select cp_represent from development where m_num = $result;");

        //$result=DB::select('select  as gd_professional,round(avg(gd_plan),2) as gd_plan,round(avg(gd_satisfaction),2) as gd_satisfaction from grade where m_num='.$m_num);
        $result=  DB::table('projects')
            ->where('pj_num','=',$result)
            ->get();

        //$result = DB::select('select cp_represent from development where m_num = '.$result);

        return $result;
    }

    // 메세지를 보낼 때, 보내는 사람 이름을 적어주기 위함
    public function get_development_name($data){

        $result = DB::table('members')
                ->where('m_num','=',$data)
                ->get();

        return $result;

    }

    //메시지 내용을 저장한다.
    public function message_save($sender, $msg_content, $receiver){

        DB::table('message')->insert([
            'sender' => $sender,
            'msg_content' => $msg_content,
            'receiver' => $receiver,
        ]);
    }

    // 개발사 및 디자이너 메시지함 보기
    public function message_select($m_num){

        $result = DB::table('message')
            ->join('members','message.sender','=','members.m_num')
            ->select('msg_content','msg_date','sender','checked','receiver','msg_num','m_name')
            ->where('receiver','=',$m_num)
            ->orderBy('msg_num', 'desc')
            ->get();

        return $result;
    }
    
    // 보낸 사람 찾기
    public function sender_select($m_num) {
        
        $result = DB::table('message')
            ->join('members','message.sender','=','members.m_num')
            ->select(DB::raw('DISTINCT message.sender, members.m_name'))
            ->where('receiver','=',$m_num)
            ->get();
        
        return $result;
        
    }

    //보내는 사람을 찾기위한 DB
    public function member_select($sender_name){

        $result = DB::table('members')
            ->where('m_num','=',$sender_name)
            ->get();

        return $result;
    }

    //개발사 메시지함 상세보기
    public function development_checked($msg_num)
    {

        DB::table('message')
            ->where('msg_num', '=', $msg_num)
            ->update(array(
                'checked' => 1
            ));
    }

    // 메시지 넘버를 통한 메시지 자세히 보기
    // receiver->받는사람, sender->보내는사람
    public function company_message_view($msg_num){

       /* $result = DB::select("select msg_content, msg_date, sender, checked, receiver, msg_num
                              from message
                              WHERE msg_num = $msg_num
                              AND checked = 0
                              ");*/

        $result = DB::table('message')
            ->select('msg_content','msg_date','sender','checked','receiver','msg_num')
            ->where('msg_num','=',$msg_num)
            ->get();

        return $result;

    }

    public function company_message_count($receiver){

        $result = DB::select("select count(checked) as count
                              from message
                              WHERE receiver = $receiver
                              AND checked = 0
                              ");

        return $result;

    }
    public function message_token($receiver){
        $result = DB::table('members')
            ->where('m_num',$receiver)
            ->select('m_token')
            ->get();
        return $result;
    }
    public function message_m_name($m_num){
        $result= DB::table('members')
            ->where('m_num',$m_num)
            ->select('m_name')
            ->get();
        
        return $result;
    }
    
    public function one_message($sender,$receiver){
        
        $result= DB::table('message')
            ->join('members','message.sender','=','members.m_num')
            ->where('receiver',$receiver)
            ->where('sender',$sender)
            ->get();
        
        return $result;
    }


}
