<?php

namespace App\Http\Requests;

use App\Models\MaxClaimableToken;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaxClaimableTokenRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('max_claimable_token_create'),
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
            'max_tokens' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
