<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InjectLocations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'injectlocation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed All the location data';

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
     * @return mixed
     */
    public function handle()
    {
        
        $sql1 = Storage::disk('local')->get('database/location_province.sql');
        $sql2 = Storage::disk('local')->get('database/location_city.sql');
        $sql3 = Storage::disk('local')->get('database/location_district.sql');
        $sql4 = Storage::disk('local')->get('database/location_village.sql');
        DB::unprepared($sql1);
        DB::unprepared($sql2);
        DB::unprepared($sql3);
        DB::unprepared($sql4);
    }
}
