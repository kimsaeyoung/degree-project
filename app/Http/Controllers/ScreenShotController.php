<?php

    namespace App\Http\Controllers;
    use App\Http\Requests;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Session;


    class ScreenShotController extends Controller {

        public function index(Request $request){
            
            die($request);
            
            // 데이터 형식 체크
            if(isset($_REQUEST["data"])) {
                if(strlen($_REQUEST["data"])>0 || strpos($_REQUEST["data"], "data:image/png;base64,") !== false) {
                    
                    $canvas = $_REQUEST["data"];
                    
                    $canvas = preg_replace("/data:[^,]+,/i","",$canvas);
                    
                    $canvas = base64_decode($canvas);
                    
                    $image = imagecreatefromstring($canvas);
                    
                    $newFileName = data('YmdHis').".png";
                    $newFileName = iconv("UTF-8", "EUC-KR", $newFileName);
                    $image->move('img/test', $newFileName);
                    
                    echo "success";
                }
            }
        }
        
    }

?>