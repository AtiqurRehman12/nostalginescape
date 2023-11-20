<?php

namespace Modules\Info\Console\Commands;

use Illuminate\Console\Command;

class InfoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:InfoCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Info Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
