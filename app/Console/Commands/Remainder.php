<?php namespace App\Console\Commands;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;

class Remainder extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'sun-task:remainder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "To send remaining task through email";

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {
        $tasks = Task::where('date', '>=', Carbon::parse(date('d-m-Y')))
                    ->where('date', '<=', Carbon::parse(date('d-m-Y'))->addDay(7))
                    ->orderBy('date', 'asc')
                    ->get();

        \Mail::send('emails.remainder', ['tasks' => $tasks], function ($m)  {
            $m->to(env('REMAINDER_EMAIL'), env('REMAINDER_NAME'))->subject('[SUN TASK] Your Task Reminder.');
        });
    }

}
