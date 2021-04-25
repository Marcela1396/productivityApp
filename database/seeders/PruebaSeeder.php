<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $teams =[
            [
                'name' => 'Team 1'
            ],

            [
                'name' => 'Team 2'
            ],
           
        ];
        DB::table('team')->insert($teams);

        
        $roles =[
            [
                'name' => 'Product Owner'
            ],

            [
                'name' => 'Scrum Master'
            ],

            [
                'name' => 'Developer'
            ],
           
        ];
        DB::table('role')->insert($roles);

       
        $members =[
            [
                'id_number'=> '1085329741',
                'name' => 'Marcela Guerrero',
                'email'=>'marce123@gmail.com',
                'speciality' => 'Systems Analyst',  
            ],

            [
                'id_number'=> '108498762',
                'name' => 'Armando Salazar',
                'email'=>'armando@gmail.com',
                'speciality' => 'System Engineer',
            ],

            [
                'id_number'=> '1096521233',
                'name' => 'Gerson Lazaro Carillo',
                'email'=>'gerson@gmail.com',
                'speciality' => 'Backend Developer',
            ],

            [
                'id_number'=> '1087594096',
                'name' => 'Leonora Madrigal',
                'email'=>'leonora@gmail.com',
                'speciality' => 'Desarrollador Frontend',
            ],

            [
                'id_number'=> '109636662',
                'name' => 'Lucia Fernandez',
                'email'=>'lucia@gmail.com',
                'speciality' => 'Backend Developer',
                
            ],

            [
                'id_number'=> '1233621210',
                'name' => 'Juanito Gomez',
                'email'=>'juanito@gmail.com',
                'speciality' => 'Desarrollador Frontend',
            ],
           
        ];
        DB::table('member')->insert($members);

        $teams_members =[
            [
                'team_id' => 1,
                'member_id' => 1, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 1,
                'member_id' => 2,
                'role_id'=> 1, 
            ],

            [
                'team_id' => 1,
                'member_id' => 3, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 1,
                'member_id' => 4, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 2,
                'member_id' => 1, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 2,
                'member_id' => 2, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 2,
                'member_id' => 5, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 2,
                'member_id' => 6, 
                'role_id'=> 3,
            ],

        ];
        DB::table('member_team')->insert($teams_members);
    }
}
