<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->index();
            $table->string('item_code')->nullable()->index();
            $table->string('parent_code')->nullable()->index();
            $table->text('description')->nullable();
            $table->string('size')->nullable();
            $table->string('family')->nullable();
            $table->string('color')->nullable();
            $table->string('colors')->nullable();
            $table->string('material')->nullable();
            $table->string('capacity')->nullable();
            $table->string('batteries')->nullable();
            $table->string('printing')->nullable();
            $table->string('printing_area')->nullable();
            $table->decimal('nw')->nullable();
            $table->decimal('gw')->nullable();
            $table->decimal('height')->nullable();
            $table->decimal('width')->nullable();
            $table->decimal('length')->nullable();
            $table->decimal('count_box')->nullable();
            $table->string('img')->nullable();
            $table->decimal('existences')->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('products');
    }
}
