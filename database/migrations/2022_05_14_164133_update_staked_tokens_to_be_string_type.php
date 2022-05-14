<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('staked_tokens_to_projects', function (Blueprint $table) {
            $table->string('dov_staked')->change();
            $table->string('surrendered_dov')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('staked_tokens_to_projects', function (Blueprint $table) {
            $table->integer('dov_staked')->change();
            $table->integer('surrendered_dov')->change();

        });
    }
};
