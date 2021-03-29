<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class CoursePageController extends Controller
{
    public function course(Request $request, $coursePage)
    {

        $posts=DB::table('course')->where('id', '=', $coursePage+1)->get();
        echo $posts;
        return view(
            'course',
            [   
                'courseID' => $coursePage,
                'name' => '課程名稱',
                'records' => [
                    [
                        'id' => '0',
                        'text' => '這是第1堂',
                        
                    ],
                    [
                        'id' => '1',
                        'text' => '這是第2堂',
                    ],
                    [
                        'id' => '2',
                        'text' => '這是第3堂',
                    ],
                    [
                        'id' => '3',
                        'text' => '這是第4堂',
                    ],
                    [
                        'id' => '4',
                        'text' => '這是第5堂',
                    ],
                    [
                        'id' => '5',
                        'text' => '這是第6堂',
                    ],
                    [
                        'id' => '6',
                        'text' => '這是第7堂',
                    ],
                    [
                        'id' => '7',
                        'text' => '這是第8堂',
                    ],
                    [
                        'id' => '8',
                        'text' => '這是第9堂',
                    ],
                    [
                        'id' => '9',
                        'text' => '這是第10堂',
                    ],
                    [
                        'id' => '10',
                        'text' => '這是第11堂',
                    ],
                    [
                        'id' => '11',
                        'text' => '這是第12堂',
                    ],
                    [
                        'id' => '12',
                        'text' => '這是第13堂',
                    ],
                    [
                        'id' => '13',
                        'text' => '這是第14堂',
                    ],
                    [
                        'id' => '14',
                        'text' => '這是第15堂',
                    ],
                ],
            ]
        );
        
    }
                
}