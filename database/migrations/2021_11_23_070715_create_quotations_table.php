<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->string('单号');
            $table->date('日期')->nullable();
            $table->string('类型')->nullable();
            $table->string('客户')->nullable();
            $table->string('报价模板');
            $table->string('说明')->nullable();
            $table->string('公式')->nullable();
            $table->decimal('数量')->nullable();
            $table->decimal('单价')->nullable();
            $table->decimal('金额')->nullable();
            $table->decimal('报价人')->nullable();
            $table->timestamps();
            $table->primary('单号');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
