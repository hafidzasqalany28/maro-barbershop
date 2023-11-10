<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->unsignedBigInteger('user_id'); // Tambahkan kolom 'user_id'
            $table->timestamps();
        });

        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users'); // Tambahkan foreign key constraint
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
