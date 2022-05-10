<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project                  = $project;
        $this->project->image           = 'https://cataas.com/cat';
        $this->project->price_kg        = '30';
        $this->project->verified_kg     = '0';
        $this->project->collateral_risk = '0';
        $this->project->staked_tokens   = '0';
    }

    public function render()
    {
        return view('livewire.project.create');
    }

    public function submit()
    {
        $this->validate();

        $this->project->save();

        return redirect()->route('admin.projects.index');
    }

    protected function rules(): array
    {
        return [
            'project.name' => [
                'string',
                'min:1',
                'required',
            ],
            'project.image' => [
                'string',
                'required',
            ],
            'project.price_kg' => [
                'numeric',
                'nullable',
            ],
            'project.verified_kg' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'project.collateral_risk' => [
                'string',
                'nullable',
            ],
            'project.staked_tokens' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'project.unlock_at' => [
                'string',
                'nullable',
            ],
            'project.days_remaining' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
