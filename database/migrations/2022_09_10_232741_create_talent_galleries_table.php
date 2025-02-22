<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talent_galleries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('talent_id')->unsigned();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();

            $table->foreign('talent_id')
                ->references('id')
                ->on('talent')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talent_galleries');
    }
}
