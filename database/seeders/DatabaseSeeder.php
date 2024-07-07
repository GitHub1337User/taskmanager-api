<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\Task;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
       
        Status::create([
            'name'=>'Активно'
        ]);
        Status::create([
            'name'=>'Закрыто'
        ]);
        for($i=0;$i!=10;$i++){
        Task::create([
            'title'=>'Task '.$i,
            'describe'=>'Describe '.$i,
            'status_id'=>rand(1,2),
            'expire_date'=>now(),
        ]);
    }
    }
}
