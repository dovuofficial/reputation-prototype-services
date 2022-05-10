<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDaoInsuranceProposalsTable extends Migration
{
    public function up()
    {
        Schema::table('dao_insurance_proposals', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_6565203')->references('id')->on('projects');
        });
    }
}
