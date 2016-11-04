<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\member;
use Illuminate\Http\Request;
use DB;
use Session;

class HelpController extends Controller
{


    public function index()
    {
        return view('layouts.HelpView');
    }
}