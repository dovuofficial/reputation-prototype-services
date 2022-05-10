@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.stakedTokensToProject.title_singular') }}:
                    {{ trans('cruds.stakedTokensToProject.fields.id') }}
                    {{ $stakedTokensToProject->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.id') }}
                            </th>
                            <td>
                                {{ $stakedTokensToProject->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.project') }}
                            </th>
                            <td>
                                @if($stakedTokensToProject->project)
                                    <span class="badge badge-relationship">{{ $stakedTokensToProject->project->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.hedera_account') }}
                            </th>
                            <td>
                                {{ $stakedTokensToProject->hedera_account }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.dov_staked') }}
                            </th>
                            <td>
                                {{ $stakedTokensToProject->dov_staked }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.surrendered_dov') }}
                            </th>
                            <td>
                                {{ $stakedTokensToProject->surrendered_dov }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.is_closed') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $stakedTokensToProject->is_closed ? 'checked' : '' }}>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.number_days') }}
                            </th>
                            <td>
                                {{ $stakedTokensToProject->number_days }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.stakedTokensToProject.fields.stake_ends_at') }}
                            </th>
                            <td>
                                {{ $stakedTokensToProject->stake_ends_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('staked_tokens_to_project_edit')
                    <a href="{{ route('admin.staked-tokens-to-projects.edit', $stakedTokensToProject) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.staked-tokens-to-projects.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection