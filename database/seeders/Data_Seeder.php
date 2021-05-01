<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Scrum\RoleModel;
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
                'email' =>'marce1396@gmail.com',
                'password'=> '$2y$10$EF9TL6IQyXBsBL09W8DKT..6VGej57A4OYMvB7MTn/iyDBFr8k/eW',//asdfasdf
                'speciality' => 'Systems Analyst', 
                'id_number'=>'1234'
            ],
            [
                'name'=> 'Maria Ordoñez',
                'email' =>'maria@gmai.com',
                'password'=> '$2y$10$EF9TL6IQyXBsBL09W8DKT..6VGej57A4OYMvB7MTn/iyDBFr8k/eW',//asdfasdf
                'speciality' => 'Systems Analyst', 
                'id_number'=>'2345'
            ],

            [
                'name'=> 'Daniel Jojoa',
                'email' =>'daniel@gmai.com',
                'speciality' => 'Systems Analyst', 
                'password'=> '$2y$10$EF9TL6IQyXBsBL09W8DKT..6VGej57A4OYMvB7MTn/iyDBFr8k/eW',//asdfasdf
                'id_number'=>'3456'
                
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

        
        $teams =[
            [
                'name' => 'Team 1'
            ],

            [
                'name' => 'Team 2'
            ],
           
        ];
        DB::table('team')->insert($teams);

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

        $users =[
            [
                'id_number'=>'968266',
                'name'=> 'Marcela Guerrero',
                'email' =>'marce1396@gmail.com',
                'password'=> '$2y$10$EF9TL6IQyXBsBL09W8DKT..6VGej57A4OYMvB7MTn/iyDBFr8k/eW',//asdfasdf
                'speciality' => 'Systems Analyst', 
            ],

            [
                'id_number'=> '108498762',
                'name' => 'Armando Salazar',
                'email'=>'armando@gmail.com',
                'speciality' => 'System Engineer',
                'password'=> sha1('asdf'),
            ],

            [
                'id_number'=> '1096521233',
                'name' => 'Gerson Lazaro Carillo',
                'email'=>'gerson@gmail.com',
                'speciality' => 'Backend Developer',
                'password'=> sha1('asdf'),
            ],

            [
                'id_number'=> '1087594096',
                'name' => 'Leonora Madrigal',
                'email'=>'leonora@gmail.com',
                'speciality' => 'Desarrollador Frontend',
                'password'=> sha1('asdf'),
            ],

            [
                'id_number'=> '109636662',
                'name' => 'Lucia Fernandez',
                'email'=>'lucia@gmail.com',
                'speciality' => 'Backend Developer',
                'password'=> sha1('asdf'),   
            ],

            [
                'id_number'=> '1233621210',
                'name' => 'Juanito Gomez',
                'email'=>'juanito@gmail.com',
                'speciality' => 'Desarrollador Frontend',
                'password'=> sha1('asdf'),
            ],

            [
                'id_number'=>'1234',
                'name'=> 'Admin',
                'email' =>'admin@gmail.com',
                'password'=> '$2y$10$EF9TL6IQyXBsBL09W8DKT..6VGej57A4OYMvB7MTn/iyDBFr8k/eW',//asdfasdf
                'speciality' => 'Super User', 
            ],
           
        ];
        DB::table('users')->insert($users);

        $teams_users =[
            [
                'team_id' => 1,
                'user_id' => 1, 
            ],

            [
                'team_id' => 1,
                'user_id' => 2,
           ],

            [
                'team_id' => 1,
                'user_id' => 3, 
            ],

            [
                'team_id' => 1,
                'user_id' => 4, 
            ],

            [
                'team_id' => 2,
                'user_id' => 1, 
            ],

            [
                'team_id' => 2,
                'user_id' => 2, 
            ],

            [
                'team_id' => 2,
                'user_id' => 5, 
            ],

            [
                'team_id' => 2,
                'user_id' => 6, 
            ], 
        ];
        DB::table('user_team')->insert($teams_users);
       
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
                'duration'=> 4,
                'project_id'=> 2,
            ],
           
        ];
        DB::table('sprint')->insert($sprints);

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


        $user_sprint =[
            // PROYECTO A - SPRINT 1
            [
                'sprint_id' => 1,
                'user_id' => 1, 
                'assigned_hours' => 10,
                'total_assigned_hours' => 40
            ],

            [
                'sprint_id' => 1,
                'user_id' => 2, 
                'assigned_hours' => 12,
                'total_assigned_hours' => 48
            ],

            [
                'sprint_id' => 1,
                'user_id' => 3, 
                'assigned_hours' => 20,
                'total_assigned_hours' => 80
                
            ],

            [
                'sprint_id' => 1,
                'user_id' => 4, 
                'assigned_hours' => 15,
                'total_assigned_hours' => 60
            ],

           // PROYECTO A - SPRINT 2

            [
                'sprint_id' => 2,
                'user_id' => 1, 
                'assigned_hours' => 12,
                'total_assigned_hours' => 48
                
            ],
            [
                'sprint_id' => 2,
                'user_id' => 2, 
                'assigned_hours' => 50,
                'total_assigned_hours' => 200
            ],
            [
                'sprint_id' => 2,
                'user_id' => 3, 
                'assigned_hours' => 30,
                'total_assigned_hours' => 120
                
            ],
            [
                'sprint_id' => 2,
                'user_id' => 4, 
                'assigned_hours' => 20,
                'total_assigned_hours' => 80
                
            ],

            // PROYECTO B - SPRINT 1
            [
                'sprint_id' => 3,
                'user_id' => 1, 
                'assigned_hours' => 7,
                'total_assigned_hours' => 28
            ],
            [
                'sprint_id' => 3,
                'user_id' => 2, 
                'assigned_hours' => 15,
                'total_assigned_hours' => 60
            ],
            [
                'sprint_id' => 3,
                'user_id' => 5, 
                'assigned_hours' => 30,
                'total_assigned_hours' => 120
            ],
            [
                'sprint_id' => 3,
                'user_id' => 6, 
                'assigned_hours' => 20,
                'total_assigned_hours' => 80
            ],
           
        ];
        DB::table('user_sprint')->insert($user_sprint);
        
        
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

        $user_task =[
             // TEAM 1 PROYECTO 1
            [
                'user_id' => 1,
                'task_id' => 1
            ],
            [
                'user_id' => 2,
                'task_id' => 2
            ],
            [
                'user_id' => 3,
                'task_id' => 3
            ],
            [
                'user_id' => 4,
                'task_id' => 4
            ],
            [
                'user_id' => 1,
                'task_id' => 5
            ],
            // Otra Historia Sprint 1
            [
                'user_id' => 1,
                'task_id' => 6
            ],
            [
                'user_id' => 1,
                'task_id' => 7
            ],
            [
                'user_id' => 2,
                'task_id' => 8
            ],
            [
                'user_id' => 3,
                'task_id' => 9
            ],
            [
                'user_id' => 4,
                'task_id' => 10
            ],

            // Sprint 2 H1
            [
                'user_id' => 1,
                'task_id' => 11
            ],[
                'user_id' => 1,
                'task_id' => 12
            ],
            [
                'user_id' => 3,
                'task_id' => 13
            ],
            [
                'user_id' => 2,
                'task_id' => 14
            ],
            [
                'user_id' => 4,
                'task_id' => 15
            ],

            // TEAM 2 PROYECTO 2
            [
                'user_id' => 1,
                'task_id' => 16
            ],
            [
                'user_id' => 2,
                'task_id' => 17
            ],
            [
                'user_id' => 6,
                'task_id' => 18
            ],
            [
                'user_id' => 5,
                'task_id' => 19
            ],
            [
                'user_id' => 5,
                'task_id' => 20
            ],
        ];

        DB::table('user_task')->insert($user_task);
        $admin = RoleModel::create(['name' => 'Product Owner']);
        $admin = RoleModel::create(['name' => 'Scrum Master']);
        $admin = RoleModel::create(['name' => 'Developer']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'publish articles']);
        Permission::create(['name' => 'unpublish articles']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Developer Team Member']);


        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        $user=User::where('id_number','1234')->get()->first();
        $user->assignRole('super-admin');

        $users_project = [
            [
                'team_id' => 1,
                'user_id' => 1, 
                'project_id'=> 1,
                'role_id'=> 1,
            ],

            [
                'team_id' => 1,
                'user_id' => 2,
                'project_id'=> 1, 
                'role_id'=> 2,
            ],

            [
                'team_id' => 1,
                'user_id' => 3, 
                'project_id'=> 1,
                'role_id'=> 3,
            ],

            [
                'team_id' => 1,
                'user_id' => 4, 
                'project_id'=> 1,
                'role_id'=> 3,
            ],

            [
                'team_id' => 2,
                'user_id' => 1, 
                'project_id'=> 2,
                'role_id'=> 3,
            ],

            [
                'team_id' => 2,
                'user_id' => 2, 
                'project_id'=> 2,
                'role_id'=> 3,
            ],

            [
                'team_id' => 2,
                'user_id' => 5, 
                'project_id'=> 2,
                'role_id'=> 2,
            ],

            [
                'team_id' => 2,
                'user_id' => 6, 
                'project_id'=> 2,
                'role_id'=> 1,
            ], 
        ];
        DB::table('user_project')->insert($users_project);
  
    }
}




       

        /*
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
        */

        /*
        $members_role =[
            [
                'user_id' => 1,
                'role_id'=> 1,
                'team_id'=> 1,
            ],

            [
                'user_id' => 2,
                'role_id'=> 2,
                'team_id'=> 1,
            ],

            [
                'user_id' => 3,
                'role_id'=> 3,
                'team_id'=> 1,
            ],

            [
                'user_id' => 4,
                'role_id'=> 3,
                'team_id'=> 1,
            ],

            [
                'user_id' => 1,
                'role_id'=> 1,
                'team_id'=> 2,
            ],

            [
                'user_id' => 2,
                'role_id'=> 2,
                'team_id'=> 2,
            ],

            [
                'user_id' => 5,
                'role_id'=> 3,
                'team_id'=> 2,
            ],

            [
                'user_id' => 6,
                'role_id'=> 3,
                'team_id'=> 2,
            ],

        ];
        DB::table('member_role')->insert($members_role);

        */