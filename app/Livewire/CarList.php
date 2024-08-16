<?php

namespace App\Livewire;

use App\Models\Car;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\Layout\View;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CarList extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public Collection $cars;

    public function mount()
    {
        $this->cars = Car::all();
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Car::query())
            ->contentGrid([
                'md' => 3,
                'xl' => 4,
            ])
            ->recordClasses(['!ring-0 !shadow-none'])
            ->columns([View::make('cars.table.row-content')]);
    }

    public function render()
    {
        return view('livewire.car-list');
    }
}
