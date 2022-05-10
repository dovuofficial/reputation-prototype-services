<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStakedTokensToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('staked_tokens_to_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('project_id')->nullable();
            $table->foreign('project_id', 'project_fk_6548657')->references('id')->on('projects');
        });
    }
}
