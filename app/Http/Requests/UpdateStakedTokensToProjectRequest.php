<?php

namespace App\Http\Requests;

use App\Models\StakedTokensToProject;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStakedTokensToProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('staked_tokens_to_project_edit'),
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
            'dov_staked' => [
                'string',
                'required',
            ],
            'surrendered_dov' => [
                'string',
                'nullable',
            ],
            'is_closed' => [
                'boolean',
                'nullable'
            ],
            'stake_ends_at' => [
                'string',
                'nullable',
            ],
            'number_days' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
