@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.daoInsuranceProposal.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('dao_insurance_proposal_create')
                    <a class="btn btn-indigo" href="{{ route('admin.dao-insurance-proposals.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.daoInsuranceProposal.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('dao-insurance-proposal.index')

    </div>
</div>
@endsection