<?php

class TaskTest extends ApiTester
{
    /** @test */
    public function it_fetches_all_tasks()
    {
        // arrange
        factory(App\Models\Task::class, 3)->create();

        // act
        $this->getJson('/api/v1/tasks');

        // assert
        $this->assertResponseOk();
    }

    /** @test */
    public function it_fetches_all_tasks_by_a_given_search_key()
    {
        // arrange
        factory(App\Models\Task::class, 3)->create([
            'name'          => 'My Task',
            'description'   => 'My Task Description'
        ]);

        // act
        $data = $this->getJson('/api/v1/tasks?searchKey=name@ My Task')->data;

        // assert
        $this->assertEquals(3, count($data));
    }

    /** @test */
    public function it_fetches_a_single_task()
    {
        // arrange
        factory(App\Models\Task::class, 3)->create([
            'name'          => 'My Task',
            'description'   => 'My Task Description'
        ]);

        // act
        $task = $this->getJson('/api/v1/tasks/1')->data;

        // assert
        $this->assertObjectHasAttributes($task, ['name', 'description']);

        $this->assertResponseOk();
    }

    /** @test */
    public function it_saves_a_task()
    {
        // arrange
        $task = array_merge(factory(App\Models\Task::class)->make([
                'name'       =>  'My Task'
            ])->toArray(),
            ['_token' => csrf_token()]
        );

        // act
        $this->post('/api/v1/tasks', $task);

        // assert
        $this->seeInDatabase('tasks', [
            'id'    => 1,
            'name'  => 'My Task'
        ]);

        $this->seeJson([
            'message' => 'Task has been created successfully.'
        ]);

        $this->seeStatusCode(201);
    }

    /** @test */
    public function it_gives_error_response_when_you_try_to_save_a_task_without_fill_up_all_input()
    {
        // arrange
        $task = array_merge(factory(App\Models\Task::class)->make([
            'name'       =>  null
        ])->toArray(),
            ['_token' => csrf_token()]
        );

        // act
        $this->post('/api/v1/tasks', $task);

        // assert
        $this->seeJson([
            'error' => 'Please, provides all the input correctly.'
        ]);

        $this->seeStatusCode(400);
    }

    /** @test */
    public function it_updates_a_task()
    {
        // arrange
        factory(App\Models\Task::class)->create([
            'name'          => 'My Task',
            'description'   => 'My Task Description'
        ]);

        $task = array_merge(factory(App\Models\Task::class)->make([
            'id'            => 1,
            'name'          => 'My Task 1',
            'description'   => 'My Task Description 1',
            'date'          => \Carbon\Carbon::now(),
            'time'          => '10 : 30 : AM'
        ])->toArray(),
            ['_token' => csrf_token()]
        );

        // act
        $this->post('/api/v1/tasks/update', $task);

        // assert
        $this->seeInDatabase('tasks', [
            'id'    => 1,
            'name'  => 'My Task 1'
        ]);

        $this->seeJson([
            'message' => 'Task has been updated successfully.'
        ]);

        $this->assertResponseOk();
    }

    /** @test */
    public function it_gives_error_response_when_you_try_to_update_a_task_without_fill_up_all_input()
    {
        // arrange
        factory(App\Models\Task::class)->create([
            'name'          => 'My Task',
            'description'   => 'My Task Description'
        ]);

        $task = array_merge(factory(App\Models\Task::class)->make([
            'name'          => null,
            'description'   => 'My Task Description 1'
        ])->toArray(),
            ['_token' => csrf_token()]
        );

        // act
        $this->post('/api/v1/tasks/update', $task);

        // assert
        $this->seeJson([
            'error' => 'Please, provides all the input correctly.'
        ]);

        $this->seeStatusCode(400);
    }

    /** @test */
    public function it_deletes_a_task()
    {
        // arrange
        factory(App\Models\Task::class)->create([
            'name'          => 'My Task',
            'description'   => 'My Task Description'
        ]);

        // act
        $this->delete('/api/v1/tasks/1', ['_token' => csrf_token()]);

        // assert
        $this->notSeeInDatabase('tasks', [
            'id'    => 1,
            'name'  => 'My Task'
        ]);

        $this->seeJson([
            'message' => 'Task has been deleted successfully.'
        ]);

        $this->assertResponseOk();
    }

    /** @test */
    public function it_gives_error_response_when_you_try_to_delete_a_task_with_invalid_id()
    {
        // arrange
        factory(App\Models\Task::class)->create([
            'name'          => 'My Task',
            'description'   => 'My Task Description'
        ]);

        // act
        $this->delete('/api/v1/tasks/x', ['_token' => csrf_token()]);

        // assert
        $this->seeJson([
            'error' => 'Whoops! There were some problems with your input.'
        ]);

        $this->seeStatusCode(400);
    }
}
