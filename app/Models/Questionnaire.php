<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;

class Questionnaire extends Model
{
    use HasFactory;

    //enable arrays to be stored as JSON
    protected $casts = [
        'questions' => AsArrayObject::class,
        'answers' => AsArrayObject::class,
    ];
}
