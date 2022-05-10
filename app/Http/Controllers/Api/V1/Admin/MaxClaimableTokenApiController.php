<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMaxClaimableTokenRequest;
use App\Http\Requests\UpdateMaxClaimableTokenRequest;
use App\Http\Resources\Admin\MaxClaimableTokenResource;
use App\Models\MaxClaimableToken;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MaxClaimableTokenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('max_claimable_token_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaxClaimableTokenResource(MaxClaimableToken::all());
    }

    public function store(StoreMaxClaimableTokenRequest $request)
    {
        $maxClaimableToken = MaxClaimableToken::create($request->validated());

        return (new MaxClaimableTokenResource($maxClaimableToken))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MaxClaimableToken $maxClaimableToken)
    {
        abort_if(Gate::denies('max_claimable_token_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MaxClaimableTokenResource($maxClaimableToken);
    }

    public function update(UpdateMaxClaimableTokenRequest $request, MaxClaimableToken $maxClaimableToken)
    {
        $maxClaimableToken->update($request->validated());

        return (new MaxClaimableTokenResource($maxClaimableToken))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
