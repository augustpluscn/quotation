<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStrategyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('strategy_details', function (Blueprint $table) {
            $table->string('策略编号')->comment('策略编号');
            $table->string('序号')->comment('序号');

            $table->string('元素')->comment('元素')->nullable();
            $table->string('元素名称')->comment('元素名称')->nullable();
            $table->string('起')->comment('起')->nullable()->nullable();
            $table->string('讫')->comment('讫')->nullable()->nullable();
            $table->string('条件')->comment('条件')->nullable();
            $table->string('数值')->comment('数值')->nullable();

            $table->timestamps();
            $table->primary(['策略编号', '序号']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('strategy_details');
    }
}
