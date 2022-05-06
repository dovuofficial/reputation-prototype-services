<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStakedTokensToProjectRequest;
use App\Http\Requests\UpdateStakedTokensToProjectRequest;
use App\Http\Resources\Admin\StakedTokensToProjectResource;
use App\Models\StakedTokensToProject;
use Gate;
use Illuminate\Http\Response;

class StakedTokensToProjectApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staked_tokens_to_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new StakedTokensToProjectResource(StakedTokensToProject::all());
    }

    public function store(StoreStakedTokensToProjectRequest $request)
    {
        $stakedTokensToProject = StakedTokensToProject::create($request->validated());

        return (new StakedTokensToProjectResource($stakedTokensToProject))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($account_id)
    {
        abort_if(Gate::denies('staked_tokens_to_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stakedTokensToProject = StakedTokensToProject::with(['project'])->where('hedera_account', $account_id)->get();

        return new StakedTokensToProjectResource($stakedTokensToProject);
    }

    public function showProjectStake($account_id, $project)
    {
        abort_if(Gate::denies('staked_tokens_to_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stakedTokensToProject = StakedTokensToProject::with(['project'])
            ->where('hedera_account', $account_id)
            ->where('project_id', $project)
            ->get();


        return new StakedTokensToProjectResource($stakedTokensToProject->load(['project']));
    }

    public function update(UpdateStakedTokensToProjectRequest $request, StakedTokensToProject $stakedTokensToProject)
    {
        $stakedTokensToProject->update($request->validated());

        return (new StakedTokensToProjectResource($stakedTokensToProject))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
