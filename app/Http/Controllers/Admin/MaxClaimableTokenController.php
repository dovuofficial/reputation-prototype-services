<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MaxClaimableToken;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaxClaimableTokenController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('max_claimable_token_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.max-claimable-token.index');
    }

    public function create()
    {
        abort_if(Gate::denies('max_claimable_token_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.max-claimable-token.create');
    }

    public function edit(MaxClaimableToken $maxClaimableToken)
    {
        abort_if(Gate::denies('max_claimable_token_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.max-claimable-token.edit', compact('maxClaimableToken'));
    }

    public function show(MaxClaimableToken $maxClaimableToken)
    {
        abort_if(Gate::denies('max_claimable_token_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.max-claimable-token.show', compact('maxClaimableToken'));
    }
}
