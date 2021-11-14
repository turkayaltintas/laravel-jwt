<?php

namespace App\Console\Commands;

use App\Models\V1\Car;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CronCars extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'car:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Automatic new car model add';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $url = 'https://static.novassets.com/automobile.json';
        $json = file_get_contents($url);
        $automobile = json_decode($json, true);
        foreach ($automobile["RECORDS"] as $auto) {
            $car = Car::find($auto["id"]);
            if(!isset($car)) {
                Car::create([
                    'url' => $auto["url"],
                    'brand' => $auto["brand"],
                    'model' => $auto["model"],
                    'year' => $auto["year"],
                    'option' => $auto["option"],
                    'engine_cylinders' => $auto["engine_cylinders"],
                    'engine_displacement' => $auto["engine_displacement"],
                    'engine_power' => $auto["engine_power"],
                    'engine_torque' => $auto["engine_torque"],
                    'engine_fuel_system' => $auto["engine_fuel_system"],
                    'engine_fuel' => $auto["engine_fuel"]
                ]);
            }
        }
        $this->info('Successfully sent daily quote to everyone.');
    }
}
