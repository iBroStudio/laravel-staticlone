<?php

namespace IBroStudio\StatiClone\Commands;

use Illuminate\Console\Command;

class StatiCloneCommand extends Command
{
    public $signature = 'laravel-staticlone';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
