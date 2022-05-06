<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\StakedTokensToProjectResource;
use App\Models\StakedTokensToProject;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StakedTokensToProjectApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staked_tokens_to_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StakedTokensToProjectResource(StakedTokensToProject::with(['project'])->get());
    }

    public function show(StakedTokensToProject $stakedTokensToProject)
    {
        abort_if(Gate::denies('staked_tokens_to_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StakedTokensToProjectResource($stakedTokensToProject->load(['project']));
    }
}
