<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new view file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');

        if (File::exists($path)) {
            $this->error("View [$name] already exists!");
            return;
        }

        File::ensureDirectoryExists(dirname($path));
        File::put($path, "<!-- $name view -->");

        $this->info("View [$name] created successfully.");
    }
}
