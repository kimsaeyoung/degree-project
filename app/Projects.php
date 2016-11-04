<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

class Projects extends Model
{
    protected $table = 'projects';
    protected $fillable = ['pj_num','pj_title', 'pj_content', 'big_num', 'pj_area', 'sc_num', 'pj_date', 'pj_price', 'pj_file', 'pj_people', 'expect_date', 'created_at'];
    protected $dates = ['created_at','updated_at'];


    public function setUpdatedAt($value)
    {
        // Do nothing.
    }

    public function getCreatedAtAttribute($date)
    {
        return $this->attributes['created_at'] = Carbon::createFromFormat('Y-m-d', $date);
    }
    
    public function smartmaching_1($pj_keyword)
    {
        $matching = DB::table('members')
            ->select(DB::raw('DISTINCT(members.m_num),members.m_id, members.m_name, members.m_phone, members.m_area, members.m_face, members.m_email, skill.sk_name'))
            ->join('contract','contract.m_num','=','members.m_num')
            ->join('skill','members.m_num','=','skill.m_num')
            ->whereBetween('ct_money',array(1,100000))
            ->where('sk_name',$pj_keyword[0]);
        if(count($pj_keyword) > 1){
            for($i=1; $i<count($pj_keyword); $i++)
            {
                $query=$matching->Orwhere('sk_name',$pj_keyword[$i]);
            }
        }
        $smart=$query->get();
        return $smart;
    }

    public function smartmaching_2($pj_keyword)
    {
        $matching = DB::table('members')
            ->select(DB::raw('DISTINCT(members.m_num),members.m_id, members.m_name, members.m_phone, members.m_area, members.m_face, members.m_email, skill.sk_name'))
            ->join('contract','contract.m_num','=','members.m_num')
            ->join('skill','members.m_num','=','skill.m_num')
            ->whereBetween('ct_money',array(100001,500000))
            ->where('sk_name',$pj_keyword[0]);
        if(count($pj_keyword) > 1){
            for($i=1; $i<count($pj_keyword); $i++)
            {
                $query=$matching->Orwhere('sk_name',$pj_keyword[$i]);
            }
        }
        $smart=$query->get();
        return $smart;
    }
    
    public function smartmaching_3($pj_keyword)
    {
        $matching = DB::table('members')
            ->select(DB::raw('DISTINCT(members.m_num),members.m_id, members.m_name, members.m_phone, members.m_area, members.m_face, members.m_email, skill.sk_name'))
            ->join('contract','contract.m_num','=','members.m_num')
            ->join('skill','members.m_num','=','skill.m_num')
            ->whereBetween('ct_money',array(500001,1000000))
            ->where('sk_name',$pj_keyword[0]);
        if(count($pj_keyword) > 1){
            for($i=1; $i<count($pj_keyword); $i++)
            {
                $query=$matching->Orwhere('sk_name',$pj_keyword[$i]);
            }
        }
        $smart=$query->get();
        return $smart;
    }
    
    public function smartmaching_4($pj_keyword)
    {
        $matching = DB::table('members')
            ->select(DB::raw('DISTINCT(members.m_num),members.m_id, members.m_name, members.m_phone, members.m_area, members.m_face, members.m_email, skill.sk_name'))
            ->join('contract','contract.m_num','=','members.m_num')
            ->join('skill','members.m_num','=','skill.m_num')
            ->whereBetween('ct_money',array(1000001,5000000))
            ->where('sk_name',$pj_keyword[0]);
        if(count($pj_keyword) > 1){
            for($i=1; $i<count($pj_keyword); $i++)
            {
                $query=$matching->Orwhere('sk_name',$pj_keyword[$i]);
            }
        }
        $smart=$query->get();
        return $smart;
    }
       
    public function smartmaching_5($pj_keyword)
    {
        $matching = DB::table('members')
            ->select(DB::raw('DISTINCT(members.m_num),members.m_id, members.m_name, members.m_phone, members.m_area, members.m_face, members.m_email, skill.sk_name'))
            ->join('contract','contract.m_num','=','members.m_num')
            ->join('skill','members.m_num','=','skill.m_num')
            ->whereBetween('ct_money',array(5000000,9999999999999))
            ->where('sk_name',$pj_keyword[0]);
        if(count($pj_keyword) > 1){
            for($i=1; $i<count($pj_keyword); $i++)
            {
                $query=$matching->Orwhere('sk_name',$pj_keyword[$i]);
            }
        }
        $smart=$query->get();
        return $smart;
    }
   

    protected $dateFormat = 'U';

    //자동 타임스탬프를 사용하지 않도록 설정
/*    public $timestamps = false;*/

}
