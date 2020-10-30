<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('item_sizes')) {
            Schema::create('item_sizes', function (Blueprint $table) {
                $table->id();
                $table->timestamps();
                $table->text('size');
                $table->unsignedBigInteger('item_id');
                $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade')->onUpdate('cascade');

                $table->engine = 'InnoDB';
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_sizes');
    }
}
