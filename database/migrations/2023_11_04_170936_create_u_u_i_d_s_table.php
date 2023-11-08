<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('u_u_i_d_s', function (Blueprint $table) {
            $table->increments('id');
            $table->text('uuid');
            $table->boolean('del');
            $table->timestamp('created');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('u_u_i_d_s');
    }
};
