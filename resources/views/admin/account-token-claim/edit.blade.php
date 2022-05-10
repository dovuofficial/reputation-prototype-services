@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.accountTokenClaim.title_singular') }}:
                    {{ trans('cruds.accountTokenClaim.fields.id') }}
                    {{ $accountTokenClaim->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('account-token-claim.edit', [$accountTokenClaim])
        </div>
    </div>
</div>
@endsection