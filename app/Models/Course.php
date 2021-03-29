<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'course';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'outline',
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'outline' => '',
    ];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'student_course',
            'course_id',
            'student_id'
        );
    }

    /*public function teacher()
    {
        return $this->belongsTo(
            Teacher::class,
            'outline'
        );
    }*/

    /*public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher', 'outline');
    }*/

    public function teacher()
    {
        return $this->belongsTo(
            Teacher::class,
            'id',
        );
    }
}
