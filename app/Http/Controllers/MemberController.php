<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\member;
use Illuminate\Http\Request;
use DB;
use Session;

class MemberController extends Controller{
    

    public function signin(Request $request)
    {
        $id = $request->input('m_id');
        $pw = $request->input('m_pw');
        
        $result = DB::select ("select * from members where m_id = '{$id}' and m_pw = '{$pw}'");


        if($result)
        {

            /*Session::put('m_info', $result);*/
            Session::put('m_info', $result);
            Session::put('div_member',$result[0]->div_member);
            Session::put('m_num',$result[0]->m_num);
            Session::put('m_name',$result[0]->m_name);
            Session::put('m_face',$result[0]->m_face);
        }else{
            return view('/');
        }
        return redirect('/');
    }

    public function signup(Request $request)
    {
        //dd($request->all());
        $id      = $request->input('m_id');
        $pw      = $request->input('m_pw');
        $name    = $request->input('m_name');
        $tel     = $request->input('m_phone');
        $mail    = $request->input('m_email');
        $area    = $request->input('m_area');
        $assort  = $request->input('div_member');

        member::create([
            'm_id'=>$id,
            'm_pw'=>$pw,
            'm_name'=>$name,
            'm_phone'=>$tel,
            'm_email'=>$mail,
            'm_area'=>$area,
            'div_member'=>$assort
        ]);


        $result = DB::select ("select * from members where m_id = '{$id}'");

        $m_num = $result[0]->m_num;

        //dd($m_num);

        if($assort==1){ //designer의 경우
            DB::insert ("insert into designer SET m_num = '{$m_num}'");
        }else{ //development
            DB::insert ("insert into development SET m_num = '{$m_num}'");
        }


        return redirect('/');
        //return view('/',compact('val'));

    }

    public function logout(Request $request){
        $request->session()->forget('m_info');
        $request->session()->flush();

        return redirect('/');
    }

    public function id_check(Request $request){

        //dd($request->all());

        $id = $request->input('m_id');

        $result = DB::select ("select * from members where m_id = '{$id}'");

        if($result){
            echo 1;
        }else{
            echo 0;
        }

    }
}