<?php

namespace BybitApi\Commands;

use Illuminate\Console\Command;

class BybitApiCommand extends Command
{
    public $signature = 'bybitapi';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
