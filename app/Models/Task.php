<?php

namespace App\Models;

class Task extends Model
{
    protected $fillable = ['name', 'description', 'date', 'time'];

    protected $dates = ['date'];
}
