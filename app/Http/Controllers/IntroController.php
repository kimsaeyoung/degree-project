<?php

    namespace App\Http\Controllers;

    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use DB;
    use Session;


    class IntroController extends Controller {

        public function index() {
            return view('Intro.index');
        }

    }

?>