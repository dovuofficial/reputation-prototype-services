<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('account_token_claim_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="AccountTokenClaim" format="csv" />
                <livewire:excel-export model="AccountTokenClaim" format="xlsx" />
                <livewire:excel-export model="AccountTokenClaim" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.accountTokenClaim.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.accountTokenClaim.fields.hedera_account') }}
                            @include('components.table.sort', ['field' => 'hedera_account'])
                        </th>
                        <th>
                            {{ trans('cruds.accountTokenClaim.fields.amount') }}
                            @include('components.table.sort', ['field' => 'amount'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($accountTokenClaims as $accountTokenClaim)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $accountTokenClaim->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $accountTokenClaim->id }}
                            </td>
                            <td>
                                {{ $accountTokenClaim->hedera_account }}
                            </td>
                            <td>
                                {{ $accountTokenClaim->amount }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('account_token_claim_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.account-token-claims.show', $accountTokenClaim) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('account_token_claim_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.account-token-claims.edit', $accountTokenClaim) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('account_token_claim_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $accountTokenClaim->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $accountTokenClaims->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush