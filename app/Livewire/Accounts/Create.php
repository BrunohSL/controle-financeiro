<?php

namespace App\Livewire\Accounts;

use App\Models\Account;
use Livewire\Component;
use App\Models\Bank;

class Create extends Component
{
    public $name = '';
    public $banks = [];
    public $selectedBank = null;
    public $accountNumber = '';
    public $branchNumber = '';
    public $balance = 0;

    public function mount()
    {
        $this->banks = Bank::orderBy('name')->get();
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

        Account::create([
            'name' => $this->name,
            'bank_id' => $this->selectedBank,
            'number' => $this->accountNumber,
            'branch' => $this->branchNumber,
            'opening_balance' => $this->balance,
        ]);

        session()->flash('message', 'Conta bancária cadastrada com sucesso!');
        $this->dispatch('account-created');
    }

    public function render()
    {
        return view('livewire.accounts.create');
    }
}

