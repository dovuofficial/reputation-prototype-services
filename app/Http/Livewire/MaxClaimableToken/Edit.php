<?php

namespace App\Http\Livewire\MaxClaimableToken;

use App\Models\MaxClaimableToken;
use Livewire\Component;

class Edit extends Component
{
    public MaxClaimableToken $maxClaimableToken;

    public function mount(MaxClaimableToken $maxClaimableToken)
    {
        $this->maxClaimableToken = $maxClaimableToken;
    }

    public function render()
    {
        return view('livewire.max-claimable-token.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->maxClaimableToken->save();

        return redirect()->route('admin.max-claimable-tokens.index');
    }

    protected function rules(): array
    {
        return [
            'maxClaimableToken.max_tokens' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'required',
            ],
        ];
    }
}
