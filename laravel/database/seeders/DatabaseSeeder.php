<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Tạo dữ liệu test
        // for ($i=0; $i <100 ; $i++) { 
            
        // }
        $dataStudentSeed = [
            [
                'name'=>'BUI QUYNH NINH',
                'address'=>'', // có thể bỏ trống vì đã dùng nullable
                'time_start'=> '2022-07-01',
                'email'=>'ninhbqph@fpt.edu.vn',
                'password'=> Hash::make('123456'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],
            // [
            //     'name'=>'BUI QUYNH NINH',
            //     'address'=>'', // có thể bỏ trống vì đã dùng nullable
            //     'time_start'=> '2022-07-02',
            //     'created_at'=> date('Y-m-d H:i:s'),
            //     'updated_at'=> date('Y-m-d H:i:s')
            // ],
        ];

        $dataProductSeed = [];
        // Insert vào bảng Students

        for ($i=1; $i <= 20 ; $i++) { 
            // $dataStudentSeed['name'].$i;
            array_push($dataStudentSeed, [
                'name'=>'BUI QUYNH NINH' .$i,
                'address'=>'', // có thể bỏ trống vì đã dùng nullable
                'time_start'=> '2022-07-01',
                'email'=>'ninhbqph13349@fpt.edu.vn',
                'password'=> Hash::make('123456'),
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],);
        }
        DB::table('students')->insert($dataStudentSeed);

        for ($i=1; $i <= 50 ; $i++) { 
            // $dataStudentSeed['name'].$i;
            array_push($dataStudentSeed, [
                'name'=>'san pham ' .$i,
                'image'=>'', // có thể bỏ trống vì đã dùng nullable
                'quantity'=> '1000',
                'date'=>'2022-07-19',
                'created_at'=> date('Y-m-d H:i:s'),
                'updated_at'=> date('Y-m-d H:i:s')
            ],);
        }        
        DB::table('product')->insert($dataProductSeed);

    }
}
