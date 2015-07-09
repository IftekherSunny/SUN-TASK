<?php

namespace App\Http\Controllers;

use App\Models\Task;

class ResetController extends Controller
{
    public function databaseReset($key)
    {
        if(env('APP_DATA_RESET_KEY') == $key) {
            Task::truncate();
            return "Database Reset";
        }
        return redirect('/');
    }
}