<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_items', function (Blueprint $table) {
            $table->string('报价单号')->comment('报价单号');
            $table->string('序号')->comment('序号');
            $table->string('成本编号');
            $table->string('成本名称');
            $table->string('公式')->comment('公式');
            $table->string('说明')->comment('说明');
            $table->string('金额');

            $table->timestamps();
            $table->primary(['报价单号', '序号']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_items');
    }
}
