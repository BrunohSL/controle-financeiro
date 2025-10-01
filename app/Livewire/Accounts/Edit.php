<?php

namespace App\Livewire\Accounts;

use App\Models\Account;
use App\Models\Bank;
use Livewire\Component;

class Edit extends Component
{
    public $account = null;
    public $name = '';
    public $bankId = null;
    public $banks = [];
    public $selectedBank = '';
    public $accountId = '';
    public $accountNumber = '';
    public $branchNumber = '';
    public $balance = 0;

    public function mount()
    {
        $this->banks = Bank::orderBy('name')->get();
        $this->account = Account::find($this->accountId);
    }

    public function save()
    {
        $this->validate([
            'name' => 'required|string|max:50',
            'selectedBank' => 'required|exists:banks,id',
            'accountNumber' => 'required|string|max:20',
            'branchNumber' => 'required|string|max:10',
            'balance' => 'required|numeric|min:0',
        ]);

        $this->account->update([
            'name' => $this->name,
            'bank_id' => $this->selectedBank,
            'number' => $this->accountNumber,
            'branch' => $this->branchNumber,
            'opening_balance' => $this->balance,
        ]);

        session()->flash('message', 'Conta bancária editada com sucesso!');
        $this->dispatch('account-edited');
    }

    public function render()
    {
        return view('livewire.accounts.edit');
    }
}

