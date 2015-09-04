<?php

namespace App\Http\Controllers;

use App\Repositories\TaskRepository;
use App\Transformer\TaskTransformer;
use Illuminate\Support\Facades\Request;

class TaskController extends Controller
{
    /**
     * @var TaskTransformer
     */
    protected $taskTransformer;

    /**
     * @var TaskRepository
     */
    protected $taskRepo;

    /**
     * Create a new task controller instance
     *
     * @param TaskTransformer $taskTransformer
     * @param TaskRepository  $taskRepo
     */
    public function __construct(TaskTransformer $taskTransformer, TaskRepository $taskRepo)
    {
        $this->taskTransformer = $taskTransformer;

        $this->taskRepo = $taskRepo;
    }

    /**
     * To fetch all tasks
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index()
    {
        $item = Request::get('item') ?: 5;

        $searchKey = Request::get('searchKey') ?: '';

        $tasks = $this->taskRepo->getTaskWithPaginate($item, $searchKey);

        return $this->responseWithPaginate($this->taskTransformer->transformCollection($tasks->all()), $tasks);

    }

    /**
     * To fetch a single task that associated with the given id
     *
     * @param task $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        $task = $this->taskRepo->find($id);

        return $this->response($this->taskTransformer->transform($task));
    }

    /**
     * To save a task
     *
     * @return \Laravel\Lumen\Http\ResponseFactory
     */
    public function store()
    {
        if ($this->isEmpty('create')) {

            $task = $this->taskRepo->create(\Request::all());

            if ($task) {
                return $this->responseCreate('Task');
            }
            else {
                return $this->responseBad('Whoops! There were some problems with your input.');
            }

        }

        return $this->responseBad('Please, provides all the input correctly.');

    }

    /**
     * To update a task
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update()
    {
        if ($this->isEmpty('update')) {
            $task = $this->taskRepo->update(\Request::all());

            if ($task) {
                return $this->responseUpdate('Task');
            }
            else {
                return $this->responseBad('Whoops! There were some problems with your input.');
            }
        }

        return $this->responseBad('Please, provides all the input correctly.');

    }

    /**
     * To delete a task
     *
     * @param task $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        $success = $this->taskRepo->delete($id);

        if ($success) {
            return $this->responseDelete('Task');
        }

        return $this->responseBad('Whoops! There were some problems with your input.');
    }

    /**
     * @param $from
     *
     * @return bool
     */
    private function isEmpty($from)
    {
        if($from == 'create')
            return (!empty(Request::get('name')) &&
                    !empty(Request::get('description')) &&
                    !empty(Request::get('date')) &&
                    !empty(Request::get('time'))
                    );
        if($from == 'update')
            return (!empty(Request::get('id')) &&
                    !empty(Request::get('name')) &&
                    !empty(Request::get('description')) &&
                    !empty(Request::get('date')) &&
                    !empty(Request::get('time'))
                );
    }
}
