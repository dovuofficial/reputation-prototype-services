<?php

use App\Http\Controllers\Api\V1\Admin\ProjectApiController;
use App\Http\Controllers\Api\V1\Admin\StakedTokensToProjectApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Projects
    Route::apiResource('projects', ProjectApiController::class, ['only' => ['index', 'show', 'store', 'update']]);

    // Staked Tokens To Project
    Route::apiResource('staked-tokens-to-projects', StakedTokensToProjectApiController::class, ['only' => ['index', 'show', 'store', 'update']]);
});
