<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsaBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OSA_BOARD', function (Blueprint $table) {
            $table->increments('BOARD_SN')->comment('主鍵 (自動流水號)');
            $table->string('BOARD_KIND')->comment('留言類別');
            $table->string('BOARD_PETNAME', 200)->comment('暱稱');
            $table->string('BOARD_ACC', 10)->comment('帳號 (系統代入)');
            $table->string('BOARD_EMAIL', 100)->comment('使用者自填mail');
            $table->string('BOARD_TITLE')->nullable()->comment('留言主題');
            $table->string('BOARD_CONTENT')->comment('留言內容');
            $table->string('BOARD_IP', 20)->comment('留言ip (系統代入)');
            $table->string('BOARD_PSN')->comment('父留言的主鍵 (回覆留言用)');
            $table->string('BOARD_DEL', 1)->comment('刪除註記');
            $table->timestamp('BOARD_TIME')->comment('留言時間 (系統代入)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('osa_board');
    }
}
