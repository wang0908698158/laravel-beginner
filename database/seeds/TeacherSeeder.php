<?php

use App\Models\Teacher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fixture = $this->teacherInit();
        foreach ($fixture as $teacherName) {
            Teacher::create([
                'teacherName' => $teacherName,
            ]);

        }
    }

    private function teacherInit()
    {
        return [
            'techer 1',
            'techer 2',
            'techer 3',
            'techer 4',
            'techer 5',
            'techer 6',
            'techer 7',
            'techer 8',
            'techer 9',
            'techer 10',
            'techer 11',
            'techer 12',
            'techer 13',
            'techer 14',
            'techer 15',
        ];
    }
}
