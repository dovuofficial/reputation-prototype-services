<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('staked_tokens_to_project_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="StakedTokensToProject" format="csv" />
                <livewire:excel-export model="StakedTokensToProject" format="xlsx" />
                <livewire:excel-export model="StakedTokensToProject" format="pdf" />
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
                            {{ trans('cruds.stakedTokensToProject.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.project') }}
                            @include('components.table.sort', ['field' => 'project.name'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.hedera_account') }}
                            @include('components.table.sort', ['field' => 'hedera_account'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.dov_staked') }}
                            @include('components.table.sort', ['field' => 'dov_staked'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.surrendered_dov') }}
                            @include('components.table.sort', ['field' => 'surrendered_dov'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.is_closed') }}
                            @include('components.table.sort', ['field' => 'is_closed'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.number_days') }}
                            @include('components.table.sort', ['field' => 'number_days'])
                        </th>
                        <th>
                            {{ trans('cruds.stakedTokensToProject.fields.stake_ends_at') }}
                            @include('components.table.sort', ['field' => 'stake_ends_at'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($stakedTokensToProjects as $stakedTokensToProject)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $stakedTokensToProject->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $stakedTokensToProject->id }}
                            </td>
                            <td>
                                @if($stakedTokensToProject->project)
                                    <span class="badge badge-relationship">{{ $stakedTokensToProject->project->name ?? '' }}</span>
                                @endif
                            </td>
                            <td>
                                {{ $stakedTokensToProject->hedera_account }}
                            </td>
                            <td>
                                {{ $stakedTokensToProject->dov_staked }}
                            </td>
                            <td>
                                {{ $stakedTokensToProject->surrendered_dov }}
                            </td>
                            <td>
                                <input class="disabled:opacity-50 disabled:cursor-not-allowed" type="checkbox" disabled {{ $stakedTokensToProject->is_closed ? 'checked' : '' }}>
                            </td>
                            <td>
                                {{ $stakedTokensToProject->number_days }}
                            </td>
                            <td>
                                {{ $stakedTokensToProject->stake_ends_at }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('staked_tokens_to_project_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.staked-tokens-to-projects.show', $stakedTokensToProject) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('staked_tokens_to_project_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.staked-tokens-to-projects.edit', $stakedTokensToProject) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('staked_tokens_to_project_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $stakedTokensToProject->id }})" wire:loading.attr="disabled">
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
            {{ $stakedTokensToProjects->links() }}
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