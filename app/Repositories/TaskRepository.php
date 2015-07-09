<?php

namespace App\Repositories;

use App\Models\Task;
use Carbon\Carbon;

class TaskRepository
{
    /**
     * @param $item
     *
     * @param $searchKey
     *
     * @return tasks
     */
    public function getTaskWithPaginate($item, $searchKey)
    {
        if( ! $searchKey == '') {
            $field = strstr($searchKey, '@ ', true);
            $value = str_replace("@ ",'',strstr($searchKey, '@ '));
        }
        else {
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
     * @param $id
     *
     * @return task
     */
    public function find($id)
    {
        return Task::findOrFail($id);
    }

    /**
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
     * @param $id
     *
     * @return int
     */
    public function delete($id)
    {
        return Task::destroy($id);
    }
}
