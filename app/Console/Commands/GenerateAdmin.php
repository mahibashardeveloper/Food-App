<?php

namespace App\Console\Commands;

use App\Models\Admins;
use Illuminate\Console\Command;

class GenerateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Generate:Admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for generating new Admin';

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
        $admin = array(
            'company_name' => 'Redishketch',
            'first_name' => 'Mahi Bashar',
            'last_name' => 'Akash',
            'phone_number' => '01645820007',
            'email' => 'mahibashar2023@gmail.com',
            'password' => bcrypt('123123'),
        );
        Admins::insert([$admin]);
        print_r(PHP_EOL.PHP_EOL);
        print_r("Admin Email : ".$admin['email'].PHP_EOL);
        print_r("Admin password : 123123".PHP_EOL.PHP_EOL);
    }
}
