@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.stakedTokensToProject.title_singular') }}:
                    {{ trans('cruds.stakedTokensToProject.fields.id') }}
                    {{ $stakedTokensToProject->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('staked-tokens-to-project.edit', [$stakedTokensToProject])
        </div>
    </div>
</div>
@endsection