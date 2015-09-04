<?php

namespace App\Repositories;

use Carbon\Carbon;
use App\Models\Task;

class TaskRepository
{
    /**
     * To get tasks with pagination
     *
     * @param $item
     *
     * @param $searchKey
     *
     * @return tasks
     */
    public function getTaskWithPaginate($item = 5, $searchKey = '')
    {
        if( ! $searchKey == '') {
            $field = strstr($searchKey, '@ ', true);
            $value = str_replace("@ ",'',strstr($searchKey, '@ '));
        } else {
            $field = '';
            $value = '';
        }

        if($field == 'date') {
            $value = Carbon::parse($value);
        }

        return Task::where($field, 'LIKE', "%{$value}%")
                    ->orderBy('date', 'asc')
                    ->paginate($item);
    }

    /**
     * To find tasks with given id
     *
     * @param $id
     *
     * @return task
     */
    public function find($id)
    {
        return Task::findOrFail($id);
    }

    /**
     * To create task
     *
     * @param $task
     *
     * @return static
     */
    public function create($task)
    {
        return Task::Create([
            'name'          => $task['name'],
            'description'   => $task['description'],
            'date'          => Carbon::parse($task['date']),
            'time'          => $task['time']
        ]);
    }

    /**
     * To update task
     *
     * @param $task
     *
     * @return mixed
     */
    public function update($task)
    {
        return Task::whereId($task['id'])->update([
            'name'          => $task['name'],
            'description'   => $task['description'],
            'date'          => Carbon::parse($task['date']),
            'time'          => $task['time']
        ]);
    }

    /**
     * To delete task
     *
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return Task::destroy($id);
    }
}
