<?php

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
});

Route::post('/sanctum/token', GenerateTokenController::class);
