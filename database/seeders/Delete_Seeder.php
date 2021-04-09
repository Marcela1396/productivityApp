<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Delete_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ddone')->truncate();
        DB::table('member')->truncate();
        DB::table('role')->truncate();
        DB::table('team')->truncate();
        DB::table('sprint')->truncate();
        DB::table('project')->truncate();
        
        
       
        
        
    }
}
