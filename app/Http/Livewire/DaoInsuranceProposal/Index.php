<?php

namespace App\Http\Livewire\DaoInsuranceProposal;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\DaoInsuranceProposal;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy            = 'id';
        $this->sortDirection     = 'desc';
        $this->perPage           = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable         = (new DaoInsuranceProposal())->orderable;
    }

    public function render()
    {
        $query = DaoInsuranceProposal::with(['project'])->advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $daoInsuranceProposals = $query->paginate($this->perPage);

        return view('livewire.dao-insurance-proposal.index', compact('daoInsuranceProposals', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('dao_insurance_proposal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        DaoInsuranceProposal::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(DaoInsuranceProposal $daoInsuranceProposal)
    {
        abort_if(Gate::denies('dao_insurance_proposal_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $daoInsuranceProposal->delete();
    }
}
