<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // add profession , home address , state , status, is_complete, image , gender
            $table->string('profession')->nullable();
            $table->longText('home_address')->nullable();
            $table->string('state')->nullable();
            $table->string('gender')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('is_complete')->default(false);
            $table->string('image')->default('undraw_profile.svg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // drop the columns profession , home address , state , status, is_complete , gender , image
            $table->dropColumn([
                'profession','home_address','state','status','is_complete','gender','image'
            ]);
        });
    }
}
