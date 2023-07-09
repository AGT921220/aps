<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {

            $table->increments('id');
            $table->string('code');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('description');


            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')
            ->references('id')
            ->on('products')
            ->onDelete('set null');


            $table->integer('quotation_id')->unsigned()->nullable();
            $table->foreign('quotation_id')
            ->references('id')
            ->on('quotations')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotation_details');
    }
}
