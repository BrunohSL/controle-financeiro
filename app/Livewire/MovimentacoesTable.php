<?php

namespace App\Livewire;

use App\Models\Income;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder as QueryBuilder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class MovimentacoesTable extends PowerGridComponent
{
    public string $tableName = 'movimentacoes-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Income::query();
        // $incomes = DB::table('incomes')
        //     ->select(
        //         'id',
        //         'account_id',
        //         'value',
        //         'date',
        //         DB::raw("'income' as type")
        //     );

        // // Despesa
        // $payments = DB::table('payments')
        //     ->select(
        //         'id',
        //         'account_id',
        //         'value',
        //         'date',
        //         DB::raw("'payment' as type")
        //     );

        // $union = $incomes->unionAll($payments);

        // // $movimentacoes = array_merge($incomes, $payments);

        // // dd($movimentacoes);

        // return DB::query()->fromSub($union, 'movimentacoes');
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('account_id')
            ->add('value')
            ->add('date_formatted', fn (Income $model) => Carbon::parse($model->date)->format('d/m/Y'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id')
                ->sortable()
                ->searchable(),

            Column::make('Account id', 'account_id')
                ->sortable()
                ->searchable(),

            Column::make('Value', 'value')
                ->sortable()
                ->searchable(),

            Column::make('Date', 'date_formatted', 'date')
                ->sortable(),

            Column::action('Action')
        ];
    }

    public function filters(): array
    {
        return [
            Filter::datepicker('date'),
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Income $row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('pg-btn-white dark:ring-pg-primary-600 dark:border-pg-primary-600 dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
