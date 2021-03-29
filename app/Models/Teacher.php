<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Teacher extends Model
{
    //
    protected $table = 'teacher';

    protected $fillable = [
        'id',
        'teacherName',
    ];

    /*public function course()
    {
        return $this->hasOne(
            Course::class,
            'outline'
        );
    }*/

    /*public function course()
    {
        return $this->hasOne('App\Models\Course');
    }*/

    public function course()
    {
        return $this->hasOne(
            Course::class,
            'id',
        );
    }
}
