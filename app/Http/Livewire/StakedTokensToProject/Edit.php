<?php

namespace App\Http\Livewire\StakedTokensToProject;

use App\Models\Project;
use App\Models\StakedTokensToProject;
use Livewire\Component;

class Edit extends Component
{
    public array $listsForFields = [];

    public StakedTokensToProject $stakedTokensToProject;

    public function mount(StakedTokensToProject $stakedTokensToProject)
    {
        $this->stakedTokensToProject = $stakedTokensToProject;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.staked-tokens-to-project.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->stakedTokensToProject->save();

        return redirect()->route('admin.staked-tokens-to-projects.index');
    }

    protected function rules(): array
    {
        return [
            'stakedTokensToProject.project_id' => [
                'integer',
                'exists:projects,id',
                'required',
            ],
            'stakedTokensToProject.hedera_account' => [
                'string',
                'required',
            ],
            'stakedTokensToProject.dov_staked' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project'] = Project::pluck('name', 'id')->toArray();
    }
}
