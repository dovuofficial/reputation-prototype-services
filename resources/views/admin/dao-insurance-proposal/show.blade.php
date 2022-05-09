@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.daoInsuranceProposal.title_singular') }}:
                    {{ trans('cruds.daoInsuranceProposal.fields.id') }}
                    {{ $daoInsuranceProposal->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.daoInsuranceProposal.fields.id') }}
                            </th>
                            <td>
                                {{ $daoInsuranceProposal->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.daoInsuranceProposal.fields.project') }}
                            </th>
                            <td>
                                @if($daoInsuranceProposal->project)
                                    <span class="badge badge-relationship">{{ $daoInsuranceProposal->project->name ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.daoInsuranceProposal.fields.description') }}
                            </th>
                            <td>
                                {{ $daoInsuranceProposal->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.daoInsuranceProposal.fields.percentage') }}
                            </th>
                            <td>
                                {{ $daoInsuranceProposal->percentage }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.daoInsuranceProposal.fields.has_liquidated') }}
                            </th>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $daoInsuranceProposal->has_liquidated ? 'checked' : '' }}>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('dao_insurance_proposal_edit')
                    <a href="{{ route('admin.dao-insurance-proposals.edit', $daoInsuranceProposal) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.dao-insurance-proposals.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection