<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


//메인
Route::get('/', 'MainController@index');

//Android 라우터
Route::post('android/login','AndroidController@login');
Route::post('android/deviceinfo','AndroidController@deviceinfo');
Route::post('android/message','AndroidController@message');

//로그인 / 회원가입 / 로그아웃 / id체크
Route::post('member/signup','MemberController@signup');

Route::post('member/signin','MemberController@signin');

Route::get('member/logout','MemberController@logout');

Route::post('member/id_check','MemberController@id_check');

// 소개
Route::get('/intro', 'IntroController@index');

//협업
Route::get('/work', 'WorkController@index');
Route::get('/work/uid', 'WorkController@uid');
Route::post('/work/timeline/ds_project_clear','WorkController@ds_project_clear');

// 협업 전 선택
Route::get('/work/choice_timeline/{result}','WorkController@choice_timeline');

// 협업 index 페이지
Route::get('work/{pj_num}', [
    'as' =>'work',
    'uses' => 'WorkController@index'
]);

// 협업 타임라인 등록 창
Route::get('/work/timeline/{result}', 'WorkController@timeline');

// 협업 완료 창
Route::post('/work/timeline/project_clear','WorkController@project_clear');

//(협업 타임라인 글쓰기 팜업창)
Route::get('work/timeline_write/{data}','WorkController@timeline_write');

// (협업 타임라인 글쓰기->저장 Ajax 처리)
Route::post('timeline_save',[
    'as' => 'timeline_save',
    'uses' => 'WorkController@timeline_save'
]);

//고객센터
Route::get('help/index','HelpController@index');

//프로젝트 라우터//
Route::get('projectList',[
    'as' => 'projectList',
    'uses'=> 'ProjectController@index'
]);

Route::get('projectList/{post}',[
    'as' => 'projectList/{post}',
    'uses'=> 'ProjectController@index'
]);

Route::get('projectList/nologin',[
    'as' =>  'projectList/nologin',
    'uses'=> 'ProjectController@login'
]);


Route::post('projectregister',[
    'as' => 'projectregister',
    'uses' => 'ProjectController@register'
]);

Route::get('projectwrite',[
    'as' => 'projectwrite',
    'uses'=> 'ProjectController@writeview'
]);

Route::post('divisionlist',[
    'as' => 'divisionlist',
    'uses' => 'ProjectController@pj_division'
]);

Route::post('projectvolunteer',[
    'as'=>'projectvolunteer',
    'uses' => 'ProjectController@pj_volunteer'
]);


Route::get('projectView/{pj_num}', [

    'as' => 'projectView/{pj_num}',
    'uses' => 'ProjectController@view'
]);

//파일다운로드 라우터
Route::get('projectView/{id}download', [
    'as' => 'projectView/{id}download',
    'uses' => 'ProjectController@getDownload'
]);

Route::get('projectList/arrangePrice/{post}',[
    'as' => 'projectList/arrangePrice/{post}',
    'uses'=> 'ProjectController@priceArrange'
]);

// 개발사 개인 페이지
Route::get('companypage','MypageController@companypage');

// 개발사 정보 수정
Route::get('companypage/modify/{m_num}',[
    'as' => 'company_modify',
    'uses' => 'MypageController@modify'
]);

// 개발사 정보 수정 한것 -> 저장
Route::post('companypage/update',[
    'as' => 'update',
    'uses' => 'MypageController@update'
]);

Route::get('companypage/designer/{m_num}','MypageController@designer');
Route::get('companypage/development','MypageController@development');
Route::get('companypage/calendar', 'MypageController@company_calendar');

// 디자이너 개인 페이지
Route::get('designerpage','MypageController@designerpage');
Route::get('designerpage/modify/{m_num}','MypageController@designer_modify');

Route::post('designerpage/modify',[
    'as' => 'designerpage_update',
    'uses' => 'MypageController@designerpage_update'
]);

Route::get('designerpage/project/{m_num}','MypageController@support_list');

// 디자이너 포트로그 수정
Route::get('designerpage/pf_modifyView/{m_num?}','MypageController@pf_modifyView');

// 메세지
Route::get('Message/get_development/{result}',[

    'as' => 'Message/get_development/{result}',
    'uses' => 'MessageController@get_development'
]);
Route::get('/message/{data}', 'MessageController@message');

Route::post('message_save',[
    'as' => 'message_save',
    'uses' => 'MessageController@submit'
]);
Route::post('message/one_message','MessageController@one_message');
// 메세지함
Route::get('/messageList/{m_num}','MessageController@messageList');

//(개발사 메시지 함)
//Route::get('/companypage/message/{m_num}','MessageController@company_message');

//(개발사 메시지 함 상세보기)
Route::post('Message_checked',[
   'as' =>'Message_checked',
    'uses' => 'MessageController@development_checked'
]);

//(디자이너 메시지함)
//Route::get('/designerpage/message/{m_num}','MessageController@designerpage_message');

// 디자이너 & 포트로그
Route::get('designer/portfolio/{m_num?}','DesignerController@portfolio');
Route::get('designer/pf_modifyView/{m_num?}','DesignerController@pf_modifyView');
Route::post('designer/pf_view','DesignerController@pf_view');
Route::post('designer/pn_view','DesignerController@pn_view');
Route::get('designer/index/{value?}','DesignerController@index');
Route::get('designer/modal','DesignerController@modal');
Route::get('designer/career/{m_num?}','DesignerController@career');
Route::post('designer/user_grade/{m_num?}','DesignerController@user_grade');
Route::get('designer/school/{m_num?}','DesignerController@school');
Route::get('designer/portfolio_temp/{m_num?}','DesignerController@portfolio_temp');
Route::post('designer/post','DesignerController@post');
Route::get('designer/intro/{m_num?}','DesignerController@intro');

//디자이너 학력 삭제    
Route::post('designer/academy_delete','DesignerController@academy_delete');
//디자이너 학력 추가 라우터
Route::post('designer/academy_add','DesignerController@academy_add');
//디자이너 경력 추가 라우터
Route::post('designer/career_add','DesignerController@career_add');
//디자이너 경력 삭제 라우터
Route::post('designer/career_delete','DesignerController@career_delete');
//디자이너 자격증 추가 라우터
Route::post('designer/licenese_add','DesignerController@licenese_add');
//디자이너 자격증 삭제 라우터
Route::post('designer/licenese_delete','DesignerController@licenese_delete');
//디자이너 찾기 라우터
Route::match(array('GET', 'POST'),'designer/search','DesignerController@designer_search');
//디자이너 INTRO 수정
Route::post('designer/intro_modify','DesignerController@intro_modify');
Route::post('designer/s_portfolio','DesignerController@s_portfolio');
//새로만들고 있는 디자이너 포트폴리오

// 디자이너 개인 페이지
Route::post('designer/skill_modify','DesignerController@skill_modify');
Route::post('designer/skill_delete','DesignerController@skill_delete');
Route::post('designer/portfolio_upload','DesignerController@portfolio_upload');

Route::post('designer/s_img','DesignerController@s_img');

Route::post('designer/LR_button','DesignerController@LR_button');

Route::post('designer/division','DesignerController@division');

Route::resource('designer','DesignerController');

// 계약 리스트
Route::get('contractList', 'WorkController@contractList');
// 계약 작성 페이지
Route::post('contractWrite', 'WorkController@contractWrite');
// 임시 계약 추가
Route::post('contractInsert', 'WorkController@contractInsert');
// 계약 보기
Route::post('contractView', 'WorkController@contractView');
// 계약 확인 
Route::post('contractAccept', 'WorkController@contractAccept');

// 스크린샷
Route::post('screenShot','ScreenShotController@index');