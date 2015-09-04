<?php

namespace App\Http\Controllers;

use App\Models\Task;

class ResetController extends Controller
{
    /**
     * To reset database
     *
     * @param $key
     *
     * @return \Laravel\Lumen\Http\Redirector
     */
    public function databaseReset($key)
    {
        if(env('APP_DATA_RESET_KEY') == $key) {
            Task::truncate();

            return redirect('/');
        }

        return redirect('/');
    }
}