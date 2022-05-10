@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.maxClaimableToken.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('max_claimable_token_create')
                    <a class="btn btn-indigo" href="{{ route('admin.max-claimable-tokens.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.maxClaimableToken.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('max-claimable-token.index')

    </div>
</div>
@endsection