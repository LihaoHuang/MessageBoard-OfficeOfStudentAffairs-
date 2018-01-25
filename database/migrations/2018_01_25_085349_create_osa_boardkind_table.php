<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOsaBoardkindTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('OSA_BOARDKIND', function (Blueprint $table) {
            $table->increments('KIND_SN')->comment('主鍵 (自動流水號)');
            $table->string('KIND_DESC', 200)->comment('留言類別名稱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('OSA_BOARDKIND');
    }
}
