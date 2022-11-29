<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_orders', function (Blueprint $table) {
//            $table->id();
            $table->increments('id');

            $table->integer('quantity');
            $table->string('material');
            $table->string('print_colors');
            $table->string('unit_price');        
            $table->string('observations')->nullable();         
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')
            ->references('id')
            ->on('clients')
            ->onDelete('set null');
            $table->timestamp('delivery_date')->nullable();         
            $table->timestamps();
            $table->string('status');        

            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_orders');
    }
}
