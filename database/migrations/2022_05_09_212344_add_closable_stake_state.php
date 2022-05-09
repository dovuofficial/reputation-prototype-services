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
            $table->integer('surrendered_dov')->nullable();
            $table->boolean('is_closed')->default(0)->nullable();
        });
    }
};
