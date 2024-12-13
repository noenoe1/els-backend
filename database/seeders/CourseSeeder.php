<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                'category' => 'University Pathway',
                'name' => 'Certified Intensive English Programme(CIEP)',
                'description' => '',
                'photo' => ''
            ],
            [
                'category' => 'Career and Workplace',
                'name' => 'Communicative English Programme(CEP)',
                'description' => '',
                'photo' => ''
            ],
            [
                'category' => 'Special Programmes',
                'name' => 'Student Mobility Programme',
                'description' => '',
                'photo' => ''
            ]
            
        ];

        foreach($data as $key => $value) {
            Course::create($value);
        }
    }
}
