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
                'name' => 'Sprint #1PA',
                'description'=> 'First Sprint',
                'start_date'=>'2021-04-03',
                'duration'=> 4,
                'project_id'=> 1,
            ],

            [
                'name' => 'Sprint #2PA',
                'description'=> 'Second Sprint',
                'start_date'=>'2021-05-03',
                'duration'=> 4,
                'project_id'=> 1
            ],

            [
                'name' => 'Sprint #1PB ',
                'description'=> 'First Sprint',
                'start_date'=>'2021-04-03',
                'duration'=> 6,
                'project_id'=> 2,
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
                'role_id'=> 2, 
            ],

            [
                'team_id' => 1,
                'member_id' => 3, 
                'role_id'=> 3,
            ],

            [
                'team_id' => 1,
                'member_id' => 4, 
                'role_id'=> 3,
            ],

            [
                'team_id' => 2,
                'member_id' => 1, 
                'role_id'=> 1,
            ],

            [
                'team_id' => 2,
                'member_id' => 2, 
                'role_id'=> 2,
            ],

            [
                'team_id' => 2,
                'member_id' => 5, 
                'role_id'=> 3,
            ],

            [
                'team_id' => 2,
                'member_id' => 6, 
                'role_id'=> 3,
            ],

           
        ];
        DB::table('member_team')->insert($teams_members);

        /*
        $members_role =[
            [
                'member_id' => 1,
                'role_id'=> 1,
                'team_id'=> 1,
            ],

            [
                'member_id' => 2,
                'role_id'=> 2,
                'team_id'=> 1,
            ],

            [
                'member_id' => 3,
                'role_id'=> 3,
                'team_id'=> 1,
            ],

            [
                'member_id' => 4,
                'role_id'=> 3,
                'team_id'=> 1,
            ],

            [
                'member_id' => 1,
                'role_id'=> 1,
                'team_id'=> 2,
            ],

            [
                'member_id' => 2,
                'role_id'=> 2,
                'team_id'=> 2,
            ],

            [
                'member_id' => 5,
                'role_id'=> 3,
                'team_id'=> 2,
            ],

            [
                'member_id' => 6,
                'role_id'=> 3,
                'team_id'=> 2,
            ],

        ];
        DB::table('member_role')->insert($members_role);

        */
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


        
        $sprint_members =[
            // PROYECTO A - SPRINT 1
            [
                'sprint_id' => 1,
                'member_id' => 1, 
                'assigned_hours' => 10
            ],

            [
                'sprint_id' => 1,
                'member_id' => 2, 
                'assigned_hours' => 12
            ],

            [
                'sprint_id' => 1,
                'member_id' => 3, 
                'assigned_hours' => 20
            ],

            [
                'sprint_id' => 1,
                'member_id' => 4, 
                'assigned_hours' => 15
            ],

           // PROYECTO A - SPRINT 2

            [
                'sprint_id' => 2,
                'member_id' => 1, 
                'assigned_hours' => 12
            ],
            [
                'sprint_id' => 2,
                'member_id' => 2, 
                'assigned_hours' => 5
            ],
            [
                'sprint_id' => 2,
                'member_id' => 3, 
                'assigned_hours' => 3
            ],
            [
                'sprint_id' => 2,
                'member_id' => 4, 
                'assigned_hours' => 20
            ],

            // PROYECTO A - SPRINT 3
            [
                'sprint_id' => 3,
                'member_id' => 1, 
                'assigned_hours' => 7
            ],
            [
                'sprint_id' => 3,
                'member_id' => 2, 
                'assigned_hours' => 15
            ],
            [
                'sprint_id' => 3,
                'member_id' => 5, 
                'assigned_hours' => 30
            ],
            [
                'sprint_id' => 3,
                'member_id' => 6, 
                'assigned_hours' => 20
            ],
           
        ];
        DB::table('member_sprint')->insert($sprint_members);
        
        
        $stories= [
            [
                'name' => "User Story 1.1 PA", 
                'priority'=> 3,
                'sprint_id'=> 1, 
            ],  

            [
                'name' => "User Story 1.2 PA", 
                'priority'=> 4,
                'sprint_id'=> 1, 
            ],  

            [
                'name' => "User Story 2.1 PA", 
                'priority'=> 5,
                'sprint_id'=> 2,
            ], 

            [
                'name' => "User Story 1.1 PB", 
                'priority'=> 3,
                'sprint_id'=> 3,
            ], 

        ];
        DB::table('user_story')->insert($stories);

        $tasks = [
            // PROYECTO A - SPRINT 1 - HISTORIA 1
            [
                'dod_id' => 1,
                'user_story_id' => 1,
            ],  
            [
                'dod_id' => 2,
                'user_story_id' => 1,
            ],
            [
                'dod_id' => 3,
                'user_story_id' => 1,
            ],
            [
                'dod_id' => 4,
                'user_story_id' => 1,
            ],
            [
                'dod_id' => 5,
                'user_story_id' => 1,
            ],

             // PROYECTO A - SPRINT 1 - HISTORIA 2
            [
                'dod_id' => 1,
                'user_story_id' => 2,
            ],  
            [
                'dod_id' => 2,
                'user_story_id' => 2,
            ],
            [
                'dod_id' => 3,
                'user_story_id' => 2,
            ],
            [
                'dod_id' => 4,
                'user_story_id' => 2,
            ],
            [
                'dod_id' => 5,
                'user_story_id' => 2,
            ],

             // PROYECTO A - SPRINT 2 - HISTORIA 1

            [
                'dod_id' => 1,
                'user_story_id' => 3,
            ],  
            [
                'dod_id' => 2,
                'user_story_id' => 3,
            ],
            [
                'dod_id' => 3,
                'user_story_id' => 3,
            ],
            [
                'dod_id' => 4,
                'user_story_id' => 3,
            ],
            [
                'dod_id' => 5,
                'user_story_id' => 3,
            ],

            // PROYECTO B - SPRINT 1 - HISTORIA 1
            [
                'dod_id' => 6,
                'user_story_id' => 4,
            ],  
            [
                'dod_id' => 7,
                'user_story_id' => 4,
            ],
            [
                'dod_id' => 8,
                'user_story_id' => 4,
            ],
            [
                'dod_id' => 9,
                'user_story_id' => 4,
            ],
            [
                'dod_id' => 10,
                'user_story_id' => 4,
            ],
        ];
        DB::table('task')->insert($tasks);

        $member_task =[
             // TEAM 1 PROYECTO 1
            [
                'member_id' => 1,
                'task_id' => 1
            ],
            [
                'member_id' => 2,
                'task_id' => 2
            ],
            [
                'member_id' => 3,
                'task_id' => 3
            ],
            [
                'member_id' => 4,
                'task_id' => 4
            ],
            [
                'member_id' => 1,
                'task_id' => 5
            ],
            // Otra Historia Sprint 1
            [
                'member_id' => 1,
                'task_id' => 6
            ],
            [
                'member_id' => 1,
                'task_id' => 7
            ],
            [
                'member_id' => 2,
                'task_id' => 8
            ],
            [
                'member_id' => 3,
                'task_id' => 9
            ],
            [
                'member_id' => 4,
                'task_id' => 10
            ],

            // Sprint 2 H1
            [
                'member_id' => 1,
                'task_id' => 11
            ],[
                'member_id' => 1,
                'task_id' => 12
            ],
            [
                'member_id' => 3,
                'task_id' => 13
            ],
            [
                'member_id' => 2,
                'task_id' => 14
            ],
            [
                'member_id' => 4,
                'task_id' => 15
            ],

            // TEAM 2 PROYECTO 2
            [
                'member_id' => 1,
                'task_id' => 16
            ],
            [
                'member_id' => 2,
                'task_id' => 17
            ],
            [
                'member_id' => 6,
                'task_id' => 18
            ],
            [
                'member_id' => 5,
                'task_id' => 19
            ],
            [
                'member_id' => 5,
                'task_id' => 20
            ],
        ];

        DB::table('member_task')->insert($member_task);

        
    }
}
