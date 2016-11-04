<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Pagination\Paginator;

class Android_model extends Model
{

    public function login($id,$pw)
    {
        $result = DB::table('members')
            ->where('m_id','=',$id)
            ->where('m_pw','=',$pw)
            ->get();
        return $result;
    }
    public function token_add($token,$m_num){
        DB::table('members')
            ->where('m_num', $m_num)
            ->update(array('m_token' => $token));
    }
    public function taken_select($token){
        $result=DB::table('deviceinfo')
                ->where('tokenid',$token)
                ->select('count(*) count')
                ->get();
        return $result;
    }
    public function token_select($num){
    $result=DB::table('members')
            ->where('m_num',$num)
            ->select('m_token')
            ->get();
        
        return $result;
    }

}