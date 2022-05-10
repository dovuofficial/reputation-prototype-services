<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;

class Edit extends Component
{
    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project.edit');
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
        ];
    }
}
