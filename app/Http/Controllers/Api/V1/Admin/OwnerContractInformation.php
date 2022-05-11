<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\ContractOwnerInformationResource;
use Illuminate\Http\Request;

class OwnerContractInformation extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ContractOwnerInformationResource
     */
    public function __invoke(Request $request)
    {
        $owner = config('app.contract_owner');
        $contract_id = config('app.contract_id');
        $token_id = config('app.token_id');
        $mirrornode = config('app.hedera_mirrornode');

        $response = Http::get($mirrornode . '/balances?account.id=' . $contract_id);
        $tokens = collect($response['balances'][0]['tokens']);

        $token = $tokens->filter(fn($t) => $t['token_id'] == $token_id)->first();

        return new ContractOwnerInformationResource([
            'owner' => $owner,
            'token_id' => $token_id,
            'treasury_balance' => $token['balance']
        ]);
    }
}
