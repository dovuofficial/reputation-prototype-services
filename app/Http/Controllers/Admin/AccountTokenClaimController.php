<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountTokenClaim;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AccountTokenClaimController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('account_token_claim_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-token-claim.index');
    }

    public function create()
    {
        abort_if(Gate::denies('account_token_claim_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-token-claim.create');
    }

    public function edit(AccountTokenClaim $accountTokenClaim)
    {
        abort_if(Gate::denies('account_token_claim_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-token-claim.edit', compact('accountTokenClaim'));
    }

    public function show(AccountTokenClaim $accountTokenClaim)
    {
        abort_if(Gate::denies('account_token_claim_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.account-token-claim.show', compact('accountTokenClaim'));
    }
}
