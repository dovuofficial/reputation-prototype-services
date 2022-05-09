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
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'surrendered_dov' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'is_closed' => [
                'boolean',
                'nullable',
            ]
        ];
    }
}
