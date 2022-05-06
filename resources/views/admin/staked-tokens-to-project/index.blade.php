@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.stakedTokensToProject.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('staked_tokens_to_project_create')
                    <a class="btn btn-indigo" href="{{ route('admin.staked-tokens-to-projects.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.stakedTokensToProject.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('staked-tokens-to-project.index')

    </div>
</div>
@endsection