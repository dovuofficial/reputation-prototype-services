<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image');
            $table->decimal('price_kg', 15, 2)->nullable();
            $table->integer('verified_kg')->nullable();
            $table->string('collateral_risk')->nullable();
            $table->integer('staked_tokens')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
