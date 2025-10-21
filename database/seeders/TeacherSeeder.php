<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::create([
            'teachername'=>'King',
            'gender'=>'Male',
            'dateofbirth'=>'2025-07-07',
            'salary'=>500,
            'subject'=>'COC',
            'phoneNumber'=>'11111111',
            'group'=>'Fighter',
        ]);
        Teacher::create([
            'teachername'=>'Queen',
            'gender'=>'Female',
            'dateofbirth'=>'2025-06-06',
            'salary'=>1000,
            'subject'=>'COC',
            'phoneNumber'=>'22222222',
            'group'=>'Marksmen',
        ]);
        Teacher::create([
            'teachername'=>'Warden',
            'gender'=>'Male',
            'dateofbirth'=>'2025-05-05',
            'salary'=>1500,
            'subject'=>'COC',
            'phoneNumber'=>'33333333',
            'group'=>'Mage',
        ]);
    }
}
