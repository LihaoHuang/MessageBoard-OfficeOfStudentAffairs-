<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use App\Models\Osa_board;
use App\Models\Osa_boardkind;

class MessageBoardController extends Controller
{
    protected $osa_board, $osa_boardkind;

    public function __construct(Osa_board $osa_board, Osa_boardkind $osa_boardkind)
    {
        date_default_timezone_set('Asia/Taipei');
        $this->osa_board = $osa_board;
        $this->osa_boardkind = $osa_boardkind;
    }

    public function index($board_kind = null){
        //查找所有主流言
        $option = "";
        if (!is_null($board_kind)) $option = " AND board_kind = " . $board_kind;
        $all_messages = DB::select("select * from osa_board inner join osa_boardkind on osa_board.board_kind = osa_boardkind.KIND_SN where BOARD_PSN = 0 " . $option . " order by BOARD_SN DESC");

        //沒有頁數時，則瀏覽第一頁
        if(!Session::has('page')){
            Session::put('page', "1");
        }

        //頁數超過筆數時，則瀏覽最後一頁
        if((Session::get('page')-1)*10 > count($all_messages)){
            Session::put('page', Session::get('page')-1);
        }

        //篩選該頁數留言
        $messages = [];
        if(Session::get('page')*10 <= count($all_messages)){
            for ($i=(Session::get('page')*10-9)-1; $i<Session::get('page')*10; $i++){
                array_push($messages, $all_messages[$i]);
            }
        }else{
            for ($i=(Session::get('page')*10-9)-1; $i<count($all_messages); $i++){
                array_push($messages, $all_messages[$i]);
            }
        }

//        dd($all_messages, $messages);
        //查找主流言之回覆內容
        $response = [];
        foreach ($messages as $key=>$message){
            if ($message->BOARD_PSN == 0)
                $response[$key] = DB::select("select * from osa_board where BOARD_PSN =" . $message->BOARD_SN);
        }

        //查找留言類型
        $boardkind = DB::select("select * from osa_boardkind");

        //查找主流言總數
        $message_num = DB::table('osa_board')->whereRaw("BOARD_PSN = '0' " . $option . "")->count();

        return view('index', compact("messages", "response", "boardkind", "board_kind", "message_num"));
    }

    public function page($page){
        if ($page<=0) $page = 1;
        Session::put('page', $page);

        return redirect()->route('index');;
    }

    public function board_notice(){
        $boardkind = DB::select("select * from osa_boardkind");

        return view('board_notice', ['boardkind' => $boardkind]);
    }

    public function message(Request $request){
        $rules = ['MessageCaptcha' => 'required|captcha'];
        $validator = Validator::make(Input::all() , $rules);

        if ($validator->fails())
        {
            $message = "";
            $errors = $validator->messages()->messages()['MessageCaptcha'][0];
            if ($errors == "validation.captcha") {
                $message = "驗證碼輸入錯誤，請重新輸入!!";
            }
            else if ($errors == "The captcha field is required.") {
                $message = "驗證碼為空，請重新輸入!!";
            }
            else {
                $message = "留言回覆錯誤(M001)，請聯絡相關問題!!";
            }

            return redirect()->route('index')->with('message', $message);
        }
        else
        {
            $input = $request->all();  //get all post data
            $MessageData = [
                'BOARD_KIND'    => $input["MessageType"],
                'BOARD_PETNAME' => $input["MessageName"],
                'BOARD_ACC'     => Session::get('per'),
                'BOARD_EMAIL'   => $input["MessageEmail"],
                'BOARD_TITLE'   => $input["MessageTitle"],
                'BOARD_CONTENT' => $input["MessageText"],
                'BOARD_IP'      => $request->ip(),
                'BOARD_PSN'     => "0",
                'BOARD_DEL'     => "0",
                'BOARD_TIME'    => date("Y-m-d H:i:s",strtotime('now'))
            ];
            $message = $this->osa_board->create($MessageData) ? "留言成功!" : "留言發生錯誤(101)，請連絡相關單位!" ;

            Session::put('page', "1");
            return redirect()->route('index')->with('message', $message);
        }
    }

    public function response(Request $request){
        $rules = ['ResponseCaptcha' => 'required|captcha'];
        $validator = Validator::make(Input::all() , $rules);

        if ($validator->fails())
        {
            $message = "";
            $errors = $validator->messages()->messages()['ResponseCaptcha'][0];
            if ($errors == "validation.captcha") {
                $message = "驗證碼輸入錯誤，請重新輸入!!";
            }
            else if ($errors == "The captcha field is required.") {
                $message = "驗證碼為空，請重新輸入!!";
            }
            else {
                $message = "留言回覆錯誤(R001)，請聯絡相關問題!!";
            }

            return redirect()->route('index')->with('message', $message);
        }
        else
        {
            $input = $request->all();  //get all post data
            $MessageData = [
                'BOARD_KIND'    => $input["ResponseType"],
                'BOARD_PETNAME' => $input["ResponseName"],
                'BOARD_ACC'     => Session::get('per'),
                'BOARD_EMAIL'   => $input["ResponseEmail"],
                'BOARD_CONTENT' => $input["ResponseText"],
                'BOARD_IP'      => $request->ip(),
                'BOARD_PSN'     => $input["ResponseID"],
                'BOARD_DEL'     => "0",
                'BOARD_TIME'    => date("Y-m-d H:i:s",strtotime('now'))
            ];
            $message = $this->osa_board->create($MessageData) ? "留言成功!" : "留言發生錯誤(101)，請連絡相關單位!" ;

            return redirect()->route('index')->with('message', $message);
        }
    }

    public function delete(Request $request, $delete_id){
        $result = $this->osa_board->where('BOARD_SN', '=' , $delete_id)
            ->update(array(
                'BOARD_DEL' => "1",
            ));
        if($result){
            $message = "刪除成功!";
        }else{
            $message = "刪除失敗(D001)，請連絡相關單位!!";
        }

        return redirect()->route('index')->with('message', $message);
    }
}
