<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaoInsuranceProposal;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DaoInsuranceProposalController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('dao_insurance_proposal_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dao-insurance-proposal.index');
    }

    public function create()
    {
        abort_if(Gate::denies('dao_insurance_proposal_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dao-insurance-proposal.create');
    }

    public function edit(DaoInsuranceProposal $daoInsuranceProposal)
    {
        abort_if(Gate::denies('dao_insurance_proposal_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dao-insurance-proposal.edit', compact('daoInsuranceProposal'));
    }

    public function show(DaoInsuranceProposal $daoInsuranceProposal)
    {
        abort_if(Gate::denies('dao_insurance_proposal_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $daoInsuranceProposal->load('project');

        return view('admin.dao-insurance-proposal.show', compact('daoInsuranceProposal'));
    }
}
