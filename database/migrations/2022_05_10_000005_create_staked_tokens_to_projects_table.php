<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStakedTokensToProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('staked_tokens_to_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hedera_account');
            $table->integer('dov_staked');
            $table->integer('surrendered_dov')->nullable();
            $table->boolean('is_closed')->default(0)->nullable();
            $table->integer('number_days')->nullable();
            $table->string('stake_ends_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
