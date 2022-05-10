<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccountTokenClaimRequest;
use App\Http\Requests\UpdateAccountTokenClaimRequest;
use App\Http\Resources\Admin\AccountTokenClaimResource;
use App\Models\AccountTokenClaim;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountTokenClaimApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_token_claim_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AccountTokenClaimResource(AccountTokenClaim::all());
    }

    public function store(StoreAccountTokenClaimRequest $request)
    {
        $accountTokenClaim = AccountTokenClaim::create($request->validated());

        return (new AccountTokenClaimResource($accountTokenClaim))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show($id)
    {
        abort_if(Gate::denies('account_token_claim_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $claimed = AccountTokenClaim::where('hedera_account', $id)->get();

        if (!$claimed->isEmpty()) {
            return new AccountTokenClaimResource($claimed);
        }

        return response(null, Response::HTTP_NOT_FOUND);
    }

    public function update(UpdateAccountTokenClaimRequest $request, $hedera_account)
    {
        AccountTokenClaim::where('hedera_account', $hedera_account)->update($request->validated());

        return (new AccountTokenClaimResource([]))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
