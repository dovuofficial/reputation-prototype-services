<?php

namespace App\Http\Livewire\AccountTokenClaim;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\AccountTokenClaim;
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
        $this->orderable         = (new AccountTokenClaim())->orderable;
    }

    public function render()
    {
        $query = AccountTokenClaim::advancedFilter([
            's'               => $this->search ?: null,
            'order_column'    => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $accountTokenClaims = $query->paginate($this->perPage);

        return view('livewire.account-token-claim.index', compact('accountTokenClaims', 'query'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('account_token_claim_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        AccountTokenClaim::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(AccountTokenClaim $accountTokenClaim)
    {
        abort_if(Gate::denies('account_token_claim_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $accountTokenClaim->delete();
    }
}
