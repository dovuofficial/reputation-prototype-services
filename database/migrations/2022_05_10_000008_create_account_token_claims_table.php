<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountTokenClaimsTable extends Migration
{
    public function up()
    {
        Schema::create('account_token_claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hedera_account');
            $table->integer('amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
