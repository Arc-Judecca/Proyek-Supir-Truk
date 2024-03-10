<?php

namespace Database\Seeders;

use App\Models\Truck;
use Illuminate\Database\Seeder;

class TruckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $truck = new Truck();
        $truck->year = 2000;
        $truck->name = 'Vardenis Pavardenis';
        $truck->owners_count = 1;
        $truck->comments = 'truck1';
        $truck->truckmaker_id = 1;
        $truck->save();

        $truck2 = new Truck();
        $truck2->year = 1999;
        $truck2->name = 'Vardenis Pavardenis2';
        $truck2->owners_count = 4;
        $truck2->comments = 'truck2';
        $truck2->truckmaker_id = 4;
        $truck2->save();

        $truck3 = new Truck();
        $truck3->year = 2008;
        $truck3->name = 'Vardenis Pavardenis3';
        $truck3->owners_count = 1;
        $truck3->comments = 'truck3';
        $truck3->truckmaker_id = 3;
        $truck3->save();

        $truck4 = new Truck();
        $truck4->year = 1995;
        $truck4->name = 'Vardenis Pavardenis4';
        $truck4->owners_count = 2;
        $truck4->comments = 'truck4';
        $truck4->truckmaker_id = 2;
        $truck4->save();
    }
}
