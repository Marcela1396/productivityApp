<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class Data_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $users = [
            [
                'name'=> 'Marcela Guerrero',
                'email' =>'marce1396@gmai.com',
                'password'=> '$2y$10$XYBAL0r31dN/xVOOtfkSYO4izzoLTU/n1nCq8rvu3VjYk8bFLDoCC',
            ],
            [
                'name'=> 'Maria Ordoñez',
                'email' =>'maria@gmai.com',
                'password'=> '$2y$10$XYBAL0r31dN/xVOOtfkSYO4izzoLTU/n1nCq8rvu3VjYk8bFLDoCC',
            ],

            [
                'name'=> 'Juan Lopez',
                'email' =>'juab@gmai.com',
                'password'=> '$2y$10$XYBAL0r31dN/xVOOtfkSYO4izzoLTU/n1nCq8rvu3VjYk8bFLDoCC',
                
            ],
        ];

        DB::table('users')->insert($users);
        */
        $projects =[
            [
                'name' => 'Sapiens Nariño University',
                'description'=> 'Proyecto Sistema Integrado de Servicios Educativos Universidad de Nariño',
                'start_date'=>'2021-04-02',
                'sprint_quantity'=>3,
                'duration'=> 12,
            ],

            [
                'name' => 'La Merced Restaurant Information System',
                'description'=> 'Sistema Web para la gestión de servicios del Restaurante la Merced',
                'start_date'=>'2021-02-07',
                'sprint_quantity'=>2,
                'duration'=>8,
            ],

        ];
        DB::table('project')->insert($projects);

        
        $sprints =[
            [
                'name' => 'Sprint #1',
                'description'=> 'First Sprint',
                'start_date'=>'2021-04-03',
                'duration'=> 4,
                'project_id'=> 1,
            ],

            [
                'name' => 'Sprint #2',
                'description'=> 'Second Sprint',
                'start_date'=>'2021-05-03',
                'duration'=> 4,
                'project_id'=> 1
            ],

            [
                'name' => 'Sprint #3',
                'description'=> 'Third Sprint',
                'start_date'=>'2021-06-03',
                'duration'=> 4,
                'project_id'=> 1
            ],

            [
                'name' => 'Sprint #1A ',
                'description'=> 'First Sprint',
                'start_date'=>'2021-04-03',
                'duration'=> 6,
                'project_id'=> 2,
            ],

            [
                'name' => 'Sprint #2A',
                'description'=> 'Second Sprint',
                'start_date'=>'2021-05-03',
                'duration'=> 6,
                'project_id'=> 2
            ],
           
        ];
        DB::table('sprint')->insert($sprints);

        
        $teams =[
            [
                'name' => 'Team 1'
            ],

            [
                'name' => 'Team 2'
            ],

            [
                'name' => 'Team 3'
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
                'role_id'=> 1,
            ],

            [
                'id_number'=> '108498762',
                'name' => 'Armando Salazar',
                'email'=>'armando@gmail.com',
                'speciality' => 'System Engineer',
                'role_id'=> 2,
            ],

            [
                'id_number'=> '1096521233',
                'name' => 'Gerson Lazaro Carillo',
                'email'=>'gerson@gmail.com',
                'speciality' => 'Backend Developer',
                'role_id'=> 3,
            ],

            [
                'id_number'=> '1087594096',
                'name' => 'Leonora Madrigal',
                'email'=>'leonora@gmail.com',
                'speciality' => 'Desarrollador Frontend',
                'role_id'=> 3,
            ],

            [
                'id_number'=> '109636662',
                'name' => 'Lucia Fernandez',
                'email'=>'lucia@gmail.com',
                'speciality' => 'Backend Developer',
                'role_id'=> 3,
            ],

            [
                'id_number'=> '1233621210',
                'name' => 'Juanito Gomez',
                'email'=>'juanito@gmail.com',
                'speciality' => 'Desarrollador Frontend',
                'role_id'=> 3,
            ],
           
        ];
        DB::table('member')->insert($members);

        
        $ddone =[
            [
                'name' => 'Especificación de historias de usuario',
                'project_id' =>1,
            ],

            [
                'name' => 'Realizar el prototipo de Interfaz de Usuario',
                'project_id' =>1,
            ],

            [
                'name' => 'Diseñar e implementar el modelo de datos',
                'project_id' =>1,
            ],

            [
                'name' => 'Codificación de la historia de usuario',
                'project_id'=>1,
            ],

            [
                'name' => 'Elaborar y ejecutar escenarios de pruebas ',
                'project_id' =>1,
            ],

            [
                'name' => 'Especificación de historias de usuario',
                'project_id' =>2,
            ],

            [
                'name' => 'Realizar el prototipo de Interfaz de Usuario',
                'project_id' =>2,
            ],

            [
                'name' => 'Diseñar e implementar el modelo de datos',
                'project_id' =>2,
            ],

            [
                'name' => 'Codificación de la historia de usuario',
                'project_id'=>2,
            ],

            [
                'name' => 'Elaborar y ejecutar escenarios de pruebas ',
                'project_id' =>2,
            ],
        ];
        DB::table('definition_of_done')->insert($ddone);


        $teams_members =[
            [
                'team_id' => 1,
                'member_id' => 1, 
            ],

            [
                'team_id' => 1,
                'member_id' => 2, 
            ],

            [
                'team_id' => 1,
                'member_id' => 3, 
            ],

            [
                'team_id' => 1,
                'member_id' => 4, 
            ],

            [
                'team_id' => 2,
                'member_id' => 1, 
            ],

            [
                'team_id' => 2,
                'member_id' => 2, 
            ],

            [
                'team_id' => 2,
                'member_id' => 5, 
            ],

            [
                'team_id' => 2,
                'member_id' => 6, 
            ],

           
        ];
        DB::table('member_team')->insert($teams_members);

        
        $project_team =[
            [
                'project_id' => 1, 
                'team_id' => 1,
                
            ],  
            [
                'project_id' => 2, 
                'team_id' => 2,
                
            ],  
        ];
        DB::table('project_team')->insert($project_team);
        
        $stories= [
            [
                'name' => "User Story 1.1", 
                'priority'=> 3,
                'sprint_id'=> 1, 
            ],  

            [
                'name' => "User Story 1.2", 
                'priority'=> 4,
                'sprint_id'=> 1, 
            ], 

            [
                'name' => "User Story 1.3", 
                'priority'=> 5,
                'sprint_id'=> 1, 
            ], 

            [
                'name' => "User Story 2.1", 
                'priority'=> 5,
                'sprint_id'=> 2,
            ], 

            [
                'name' => "User Story 2.2", 
                'priority'=> 5,
                'sprint_id'=> 2, 
            ], 

        ];
        DB::table('user_story')->insert($stories);
        

        /*
        $sprint_members =[
            [
                'sprint_id' => 1,
                'member_id' => 1, 
            ],

            [
                'sprint_id' => 1,
                'member_id' => 2, 
            ],

            [
                'sprint_id' => 1,
                'member_id' => 3, 
            ],

            [
                'sprint_id' => 1,
                'member_id' => 4, 
            ],
           
        ];
        DB::table('team_has_member')->insert($teams_members);
        */
    }
}