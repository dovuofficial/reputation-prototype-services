<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StakedTokensToProject;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StakedTokensToProjectController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('staked_tokens_to_project_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.staked-tokens-to-project.index');
    }

    public function show(StakedTokensToProject $stakedTokensToProject)
    {
        abort_if(Gate::denies('staked_tokens_to_project_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stakedTokensToProject->load('project');

        return view('admin.staked-tokens-to-project.show', compact('stakedTokensToProject'));
    }
}
