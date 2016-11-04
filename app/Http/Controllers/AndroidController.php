<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Symfony\Component\Console\Input\Input;
use Session;
use App\Http\models\Android_model;

class AndroidController extends Controller{

    public $android;

    public function __construct(){

        $this->android = new Android_model();

    }

    public function login(Request $request){

        $id=$request->input('m_id');
        $pw=$request->input('m_pw');
        
        $reseult=$this->android->login($id,$pw);
        
        echo json_encode($reseult[0]);
        
    }
    
    public function deviceinfo(Request $request){
        
        $token=$request->input('m_token');
        $m_num=$request->input('m_num');
        
        $this->android->token_add($token,$m_num);
        
        echo json_encode($token);
        
    }
    public function message(Request $request){
        $message=$request->input('message');
        $num=$request->input('m_num');

        $token=$this->android->token_select($num);

        if($token)
        {
            $url = 'https://fcm.googleapis.com/fcm/send';
            $fields = array(
                'data' => array("message" => $message),
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
        
        
    }


}
