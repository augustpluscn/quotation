<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elements', function (Blueprint $table) {
            $table->string('编号')->comment('编号');
            $table->string('名称')->comment('名称');
            $table->integer('显示')->default(1)->comment('显示');
            $table->integer('类型')->default(1)->comment('类型(1.输入框,2.字典)');
            $table->string('来源')->nullable()->comment('来源');
            $table->string('默认值')->nullable()->comment('默认值');
            $table->integer('排序')->default(999)->comment('排序');

            $table->timestamps();
            $table->primary('编号');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elements');
    }
}
