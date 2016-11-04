<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model {

    protected $fillable = ['m_id','m_pw','m_name','m_phone','m_email','m_area','div_member'];
    public $timestamps = false;

}