<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaoInsuranceProposalsTable extends Migration
{
    public function up()
    {
        Schema::create('dao_insurance_proposals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description');
            $table->integer('percentage');
            $table->boolean('has_liquidated')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
