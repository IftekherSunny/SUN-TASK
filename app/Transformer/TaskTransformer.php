<?php

namespace App\Transformer;

class TaskTransformer extends Transformer
{
    /**
     * To transform task
     *
     * @param $task
     *
     * @return array
     */
    public function transform($task)
    {
        return [
            'id'            => $task['id'],
            'name'          => $task['name'],
            'description'   => $task['description'],
            'date'          => $task['date']->format('d-m-Y'),
            'time'          => $task['time']
        ];
    }
}
//date("h : i : A", strtotime($task['time']))