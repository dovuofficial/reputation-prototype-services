<?php

namespace App\Http\Requests;

use App\Models\Project;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('project_edit'),
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
            'name' => [
                'string',
                'min:1',
                'required',
            ],
            'image' => [
                'string',
            ],
            'price_kg' => [
                'numeric',
                'nullable',
            ],
            'verified_kg' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'collateral_risk' => [
                'string',
                'nullable',
            ],
            'staked_tokens' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ]
        ];
    }
}
