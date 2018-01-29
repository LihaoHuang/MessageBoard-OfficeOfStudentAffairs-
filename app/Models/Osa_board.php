<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Osa_board extends Model
{
    protected $table = 'OSA_BOARD';
    protected $primaryKey = 'BOARD_SN';
    public $timestamps = false;
    protected $fillable = [
        'BOARD_SN',       //主鍵 (自動流水號)
        'BOARD_KIND',     //留言類別
        'BOARD_PETNAME',  //暱稱
        'BOARD_ACC',      //帳號 (系統代入)
        'BOARD_EMAIL',    //使用者自填mail
        'BOARD_TITLE',    //留言主題
        'BOARD_CONTENT',  //留言內容
        'BOARD_IP',       //留言ip (系統代入)
        'BOARD_PSN',      //父留言的主鍵 (回覆留言用)
        'BOARD_DEL',      //刪除註記
        'BOARD_TIME',     //留言時間 (系統代入)
    ];
}