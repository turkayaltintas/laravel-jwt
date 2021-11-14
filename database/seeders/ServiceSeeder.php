<?php

namespace Database\Seeders;

use App\Models\V1\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paint = Service::create(
            [
                'name' => 'Paint Protection',
                'description' => 'The primary purpose of the paint protection process is to protect the color and shine of your vehicle and to provide a high level of protection against external effects that may occur over time.',
                'price' => '850'
            ]
        );
        $ceramic = Service::create(
            [
                'name' => 'Ceramic Coating',
                'description' => 'Auto ceramic coating application is applied to prevent scratches, cracks and spills in the car paint that can occur on the outer body part of the vehicle; It is a protection method that protects the paint and makes the vehicle look like the first day for a longer time.',
                'price' => '1200'
            ]
        );
        $wash = Service::create(
            [
                'name' => 'Car Wash',
                'description' => 'The area of ​​your vehicle that is most affected by environmental conditions is the outer surfaces. Dirt and dust accumulated on the vehicle over time cause the car to look old, as well as drying out over time, making it difficult to clean.',
                'price' => '100'
            ]
        );
        $cleaning = Service::create(
            [
                'name' => 'Detailed Interior Cleaning',
                'description' => 'It is very important to clean the interior of the cars where time is spent frequently during the day. Dust and bacteria accumulate in the vehicle over time.',
                'price' => '550'
            ]
        );
    }
}
