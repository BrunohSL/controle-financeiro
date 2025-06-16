<?php

namespace App\Livewire;

use App\Models\Account;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\Rule;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class AccountTable extends PowerGridComponent
{
    public string $tableName = 'account-table';
    protected $listeners = ['account-created' => '$refresh'];

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showToggleColumns()
                ->showSoftDeletes()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Account::query();
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('name_lower', fn (Account $model) => strtolower(e($model->name)))
            ->add('created_at')
            ->add('created_at_formatted', fn (Account $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable(),

            Column::make('Name', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Created at', 'created_at')
                ->hidden(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable()
                ->searchable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('name'),
            Filter::datepicker('created_at_formatted', 'created_at'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        // $account = Account::findOrFail($rowId);

        // $accountData = [
        //     'accountId' => $account->id,
        //     'name' => $account->name,
        //     'bank_id' => $account->bank_id,
        //     'number' => $account->number,
        //     'branch' => $account->branch,
        //     'opening_balance' => $account->opening_balance,
        // ];

        $this->dispatch('edit-account', ['accountId' => $rowId]);
        // $this->dispatch('edit-account', $accountData);
    }

    public function actions(Account $row): array
    {
        return [
            Button::add('edit')
                ->slot('Editar')
                ->id()
                ->class(
                    'pg-btn-white
                    dark:ring-pg-primary-600
                    dark:border-pg-primary-600
                    dark:hover:bg-pg-primary-700
                    dark:ring-offset-pg-primary-800
                    dark:text-pg-primary-300
                    dark:bg-pg-primary-700'
                )
                ->dispatch('edit', ['rowId' => $row->id])
                // ->dispatch('edit-account', ['accountId' => $row->id])
        ];
    }

    // public function actionRules(Account $row): array
    // {
    //    return [
    //         // Hide button edit for ID 1
    //         Rule::button('edit')
    //             ->when(fn($row) => $row->id === 1)
    //             ->hide(),
    //     ];
    // }
}
