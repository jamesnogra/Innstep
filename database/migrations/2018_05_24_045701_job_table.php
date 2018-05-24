<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            $table->string('category')->nullable();
            $table->string('type')->nullable();
            $table->string('salary')->nullable();
            $table->boolean('show_salary')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('house_street')->nullable();
            $table->string('zip_code')->nullable();
            $table->text('full_detail')->nullable();
            $table->string('logo_banner')->nullable();
            $table->string('banner')->nullable();
            $table->string('website')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
