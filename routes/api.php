<?php

use App\Http\Controllers\Api\V1\Admin\AccountTokenClaimApiController;
use App\Http\Controllers\Api\V1\Admin\MaxClaimableTokenApiController;
use App\Http\Controllers\Api\V1\Admin\ProjectApiController;
use App\Http\Controllers\Auth\GenerateTokenController;
use App\Http\Controllers\Api\V1\Admin\StakedTokensToProjectApiController;
use App\Http\Controllers\Api\V1\Admin\OwnerContractInformation;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {

    Route::get('owner', OwnerContractInformation::class);
    // Projects
    Route::apiResource('projects', ProjectApiController::class, ['only' => ['index', 'show', 'store', 'update', 'destroy']]);

    Route::apiResource('staked', StakedTokensToProjectApiController::class, ['only' => ['index', 'show', 'store', 'update']]);

    Route::get('staked/{id}/project/{project}', [StakedTokensToProjectApiController::class, 'showProjectStake'])->name('projectStake');

    Route::get('staked/project/{project}', [StakedTokensToProjectApiController::class, 'showStakesForProject'])->name('allProjectStakes');

    // Max Claimable Tokens
    Route::apiResource('max-claimable-tokens', MaxClaimableTokenApiController::class, ['only' => ['index', 'show', 'update']]);

    // Account Token Claim
    Route::apiResource('account-token-claims', AccountTokenClaimApiController::class, ['only' => ['show', 'store', 'update']]);
});

Route::post('/sanctum/token', GenerateTokenController::class);

