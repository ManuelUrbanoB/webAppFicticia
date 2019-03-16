<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name_one');
            $table->string('last_name_two');
            $table->string('cc_user',30)->unique();
            $table->date('born_date');
            $table->char('gender',1);
            $table->date('entry_date');
            $table->integer('employee_number');
            $table->string('role');
            $table->integer('number_boss')->nullable();
            $table->string('zone');
            $table->string('municipality');
            $table->string('department');
            $table->integer('sales')->nullable();
            $table->string('email', 130)->unique();
            $table->text('url_img');
            $table->string('cel_phone',30);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
