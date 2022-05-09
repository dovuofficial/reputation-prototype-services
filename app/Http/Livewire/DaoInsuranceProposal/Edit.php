<?php

namespace App\Http\Livewire\DaoInsuranceProposal;

use App\Models\DaoInsuranceProposal;
use App\Models\Project;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public DaoInsuranceProposal $daoInsuranceProposal;

    public function mount(DaoInsuranceProposal $daoInsuranceProposal)
    {
        $this->daoInsuranceProposal = $daoInsuranceProposal;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.dao-insurance-proposal.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->daoInsuranceProposal->save();

        return redirect()->route('admin.dao-insurance-proposals.index');
    }

    protected function rules(): array
    {
        return [
            'daoInsuranceProposal.project_id' => [
                'integer',
                'exists:projects,id',
                'required',
            ],
            'daoInsuranceProposal.description' => [
                'string',
                'min:1',
                'required',
            ],
            'daoInsuranceProposal.percentage' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
            'daoInsuranceProposal.has_liquidated' => [
                'boolean',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project'] = Project::pluck('name', 'id')->toArray();
    }
}
