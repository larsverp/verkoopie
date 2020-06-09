<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class makeLarsAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->where('email', 'larsverp2803@gmail.com')->update(['isAdmin' => true]);
    }
}
