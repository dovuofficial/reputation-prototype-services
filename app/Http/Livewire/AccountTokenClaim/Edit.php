<?php

namespace App\Http\Livewire\AccountTokenClaim;

use App\Models\AccountTokenClaim;
use Livewire\Component;

class Edit extends Component
{
    public AccountTokenClaim $accountTokenClaim;

    public function mount(AccountTokenClaim $accountTokenClaim)
    {
        $this->accountTokenClaim = $accountTokenClaim;
    }

    public function render()
    {
        return view('livewire.account-token-claim.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->accountTokenClaim->save();

        return redirect()->route('admin.account-token-claims.index');
    }

    protected function rules(): array
    {
        return [
            'accountTokenClaim.hedera_account' => [
                'string',
                'required',
            ],
            'accountTokenClaim.amount' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
        ];
    }
}
