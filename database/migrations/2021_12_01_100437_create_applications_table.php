<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('code')->nullable();
            // $table->integer('company_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->string('category')->nullable();
            $table->date('dob')->nullable();
            $table->string('phone')->nullable();
            $table->string('altphone')->nullable();
            $table->string('nokphone')->nullable();
            $table->string('gender')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('social_media')->nullable();
            $table->string('salary')->nullable();
            $table->longText('address')->nullable();
            $table->longText('history')->nullable();
            $table->longText('qualification')->nullable();
            $table->longText('certification')->nullable();
            $table->longText('qualified')->nullable();
            $table->longText('referees')->nullable();

            $table->integer('status')->default(2); // 1 for approved , 0 for rejected , 2 for pending  
            $table->timestamps();
            // "name","email","position","category","dob","phone","altphone","nokphone",
            // "gender","marital_status","social_media",
            // "salary","address","history", "qualification",
            // "certification","qualified", "referees",
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications');
    }
}
