<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CustomCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'custom:hello';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'write a Hello World for test';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Hello World!');
    }
}
