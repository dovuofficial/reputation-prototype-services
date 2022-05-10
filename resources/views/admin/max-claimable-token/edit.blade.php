@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.maxClaimableToken.title_singular') }}:
                    {{ trans('cruds.maxClaimableToken.fields.id') }}
                    {{ $maxClaimableToken->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('max-claimable-token.edit', [$maxClaimableToken])
        </div>
    </div>
</div>
@endsection