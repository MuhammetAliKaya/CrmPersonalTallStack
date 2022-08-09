<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Customers;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class CustomerTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Customers>
     */
    public function datasource(): Builder
    {
        return Customers::query()
            ->join('images', function ($images) {
                $images->on('customers.id', '=', 'images.imageableId')->where('images.imageableType', '=', 'App\Models\Customers');
            })
            ->join('responsibles', function ($responsibles) {
                $responsibles->on('customers.id', '=', 'responsibles.reponsibleId');
            })
            ->join('users', function ($users) {
                $users->on('responsibles.reponsibleById', '=', 'users.id');
            })
            ->select([
                'Customers.id',
                'customers.name',
                'images.url',
                'responsibles.reponsibleId'
            ]);
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('image', function (Customers $cust) {
                return  '<img src="' . ($cust->image()->first()->url) . '" class="w-10 rounded shadow-lg">';
            })
            ->addColumn('id')
            ->addColumn('name')
            ->addColumn('responsibles', function (Customers $cust) {
                return $cust->responsible()->where('reponsibleId', $cust->id)->first()->reponsibleById;
            })
            ->addColumn('usersName', function (Customers $cust) {
                return User::whereId($cust->responsible()->where('reponsibleId', $cust->id)->first()->reponsibleById)->first()->name;
            });
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Image', 'image')
                ->searchable()
                ->sortable(),
            Column::make(__('reponsibleById'), 'responsibles', 'responsibles.reponsibleById')
                ->searchable()
                ->sortable(),
            Column::make(__('reponsibleByName'), 'usersName', 'users.name')
                ->searchable()
                ->makeInputText('users.name')
                ->sortable(),
            Column::make('Id', 'id')
                ->searchable()
                ->makeInputText('customers.id')
                ->sortable(),
            Column::make('Name', 'name', 'customers.name')
                ->searchable()
                ->makeInputText('customers.name')
                ->sortable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Customers Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('customers.edit', ['customers' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('customers.destroy', ['customers' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Customers Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($customers) => $customers->id === 1)
                ->hide(),
        ];
    }
    */
}