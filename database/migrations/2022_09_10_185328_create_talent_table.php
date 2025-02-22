<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('talent', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('race_id')->unsigned();
            $table->string('country');
            $table->string('gender');
            $table->string('artistic_name')->nullable();
            $table->string('address')->nullable();
            $table->string('tutor_name')->nullable();
            $table->string('dob');
            $table->string('age');
            $table->string('phone');
            $table->string('email');
            $table->string('instagram');
            $table->string('height')->nullable();
            $table->string('bust')->nullable();
            $table->string('waist')->nullable();
            $table->string('hips')->nullable();
            $table->string('weight')->nullable();
            $table->integer('eye_color_id')->nullable()->unsigned();
            $table->integer('hair_color_id')->nullable()->unsigned();
            $table->string('shoulders')->nullable();
            $table->string('number_of_shoes')->nullable();
            $table->string('cpf')->nullable();
            $table->string('rg')->nullable();
            $table->string('drt')->nullable();
            $table->string('pix')->nullable();
            $table->string('bank')->nullable();
            $table->string('agency')->nullable();
            $table->string('accountnumber')->nullable();
            $table->string('file_path')->nullable();
            $table->string('file_name');
            $table->integer('category_id')->unsigned();
            
            $table->foreign('race_id')
                ->references('id')
                ->on('races')
                ->onDelete('cascade');

            $table->foreign('eye_color_id')
                ->references('id')
                ->on('eye_colors')
                ->onDelete('cascade');

            $table->foreign('hair_color_id')
                ->references('id')
                ->on('hair_colors')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('talent_categoaries')
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
        Schema::dropIfExists('talent');
    }
}
