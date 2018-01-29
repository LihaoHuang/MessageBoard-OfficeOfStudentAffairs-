<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
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
        $option = "";
        if (!is_null($board_kind)) $option = " AND board_kind = " . $board_kind;
        $messages = DB::select("select * from osa_board inner join osa_boardkind on osa_board.board_kind = osa_boardkind.KIND_SN where BOARD_PSN = 0 " . $option);
        $response = [];
        foreach ($messages as $key=>$message){
            if ($message->BOARD_PSN == 0)
                $response[$key] = DB::select("select * from osa_board where BOARD_PSN = $message->BOARD_SN");
        }

//        dd($option, $messages, $response);
        return view('index', ['message' => $messages, 'response' => $response]);
    }
}
