<?php

namespace App\Http\Requests;

use App\Models\AccountTokenClaim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAccountTokenClaimRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('account_token_claim_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'hedera_account' => [
                'string',
                'required',
            ],
            'amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
