<?php

use App\Http\Controllers\Api\V1\Admin\AccountTokenClaimApiController;
use App\Http\Controllers\Api\V1\Admin\MaxClaimableTokenApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectApiController;
use App\Http\Controllers\Api\V1\Admin\StakedTokensToProjectApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Projects
    Route::apiResource('projects', ProjectApiController::class, ['only' => ['index', 'show', 'store', 'update']]);

    // Staked Tokens To Project
    Route::apiResource('staked-tokens-to-projects', StakedTokensToProjectApiController::class, ['only' => ['index', 'show', 'store', 'update']]);

    // Max Claimable Tokens
    Route::apiResource('max-claimable-tokens', MaxClaimableTokenApiController::class, ['only' => ['index', 'show', 'store', 'update']]);

    // Account Token Claim
    Route::apiResource('account-token-claims', AccountTokenClaimApiController::class, ['only' => ['index', 'show', 'store', 'update']]);
});
