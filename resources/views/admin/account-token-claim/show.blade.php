@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.accountTokenClaim.title_singular') }}:
                    {{ trans('cruds.accountTokenClaim.fields.id') }}
                    {{ $accountTokenClaim->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.accountTokenClaim.fields.id') }}
                            </th>
                            <td>
                                {{ $accountTokenClaim->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.accountTokenClaim.fields.hedera_account') }}
                            </th>
                            <td>
                                {{ $accountTokenClaim->hedera_account }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.accountTokenClaim.fields.amount') }}
                            </th>
                            <td>
                                {{ $accountTokenClaim->amount }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('account_token_claim_edit')
                    <a href="{{ route('admin.account-token-claims.edit', $accountTokenClaim) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.account-token-claims.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection