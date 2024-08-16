<?php

use App\Livewire\CarList;
use App\Models\Brand;
use App\Models\Car;
use Livewire\Livewire;

it('render the car list component', function () {
    Livewire::test(CarList::class)->assertOk();
});

it('shows brand, model and year', function () {
    Car::factory()
        ->for(Brand::factory()->create(['name' => 'Mazda']))
        ->create([
            'model' => 'MX-5',
            'year' => 2005,
        ]);

    Car::factory()
        ->for(Brand::factory()->create(['name' => 'Nissan']))
        ->create([
            'model' => 'Tiida',
            'year' => 2018,
        ]);

    Car::factory()
        ->for(Brand::factory()->create(['name' => 'Ford']))
        ->create([
            'model' => 'Mustang',
            'year' => 2012,
        ]);

    Livewire::test(CarList::class)
        ->assertOk()
        ->assertSeeText(['Mazda', 'MX-5', '2005', 'Nissan', 'Tiida', '2018', 'Ford', 'Mustang', '2012']);
});

it('shows a list of car images', function () {
    Car::factory()
        ->for(Brand::factory()->create(['name' => 'Mazda']))
        ->create([
            'model' => 'RX-7',
            'images' => ['image1.jpg', 'image2.jpg', 'image3.jpg'],
        ]);

    Livewire::test(CarList::class)
        ->assertOk()
        ->assertSeeText(['image1.jpg', 'image2.jpg', 'image3.jpg']);
});
