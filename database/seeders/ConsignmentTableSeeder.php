<?php

namespace Database\Seeders;

use App\Models\Consignment;
use Illuminate\Database\Seeder;

class ConsignmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $consignment_data = [
          'company' => 'Abc Company',
          'contact' => '02134550989',
          'city' => 'Karachi',
          'country' => 'Pakistan',
        ];
        $consignment = Consignment::create($consignment_data);
        $consignment->addresses()->createMany([
            [
                'address' => 'Town 1 some street'
            ],
            [
                'address' => 'Town 2 some street'
            ], [
                'address' => 'Town 3 some street'
            ],
        ]);
    }
}
