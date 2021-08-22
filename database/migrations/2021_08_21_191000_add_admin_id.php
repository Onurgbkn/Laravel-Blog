<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->unsignedBigInteger('adminId')->nullable()->unsigned();
            $table->foreign('adminId')->references('id')->on('admins')->onDelete('cascade');
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->unsignedBigInteger('adminId')->nullable()->unsigned();
            $table->foreign('adminId')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
