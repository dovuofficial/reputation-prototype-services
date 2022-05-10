@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.accountTokenClaim.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('account_token_claim_create')
                    <a class="btn btn-indigo" href="{{ route('admin.account-token-claims.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.accountTokenClaim.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('account-token-claim.index')

    </div>
</div>
@endsection