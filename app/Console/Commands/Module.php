<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Inspiring;

class Module extends Command
{
    use DispatchesJobs;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:add {uri}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add a new module';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->dispatch(new \App\Jobs\InsertModule($this->argument('uri')));
    }
}
