<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Osa_boardkind extends Model
{
    protected $table = 'OSA_BOARDKIND';
    protected $primaryKey = 'KIND_SN';
    public $timestamps = false;
    protected $fillable = [
        'KIND_SN',       //主鍵 (自動流水號)
        'KIND_DESC',     //留言類別名稱
    ];
}