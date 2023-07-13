<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Finder\Finder;

class ViltCrudCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'vilt:crud';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all files needed for a CRUD operation optimized for VILT';

    /**
     * Configure the command.
     *
     * @return void
     */
    protected function configure()
    {
        parent::configure();

        $this->addArgument('name', InputArgument::REQUIRED, 'The name of the model');
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->option('admin')) {
            $this->createCrudFiles('Admin');
        }

        if ($this->option('private')) {
            $this->createCrudFiles('Private');
        }

        if ($this->option('public')) {
            $this->createCrudFiles('Public');
        }
    }

    /**
     * Create all files needed for a CRUD operation.
     *
     * @param  string  $directory
     * @return void
     */
    protected function createCrudFiles($directory)
    {
        $name = $this->argument('name');

        // Create the model
        $this->call('make:model', [
            'name' => $name,
        ]);

        // Create the factory
        $this->call('make:factory', [
            'name' => $name.'Factory',
            '--model' => $name,
        ]);

        // Create the migration
        $this->call('make:migration', [
            'name' => 'create_'.Str::plural(Str::snake($name)).'_table',
            '--create' => Str::plural(Str::snake($name)),
        ]);

        // Create the controller
        $this->makeController($directory);

        // Create Vue CRUD files
        $this->makeViews($directory);

        // // Add the routes to the corresponding route file name (admin, private or public):
        // $this->call('make:crud-routes', [
        //     'name' => $name,
        //     '--stub' => $this->getStub('routes.stub'),
        // ]);
    }

    /**
     * Find the path to a custom stub.
     *
     * @param  string  $stubName
     * @return string
     *
     * @throws \Exception
     */
    protected function getStub($stubName)
    {
        $customStubsPath = base_path('stubs');

        $finder = new Finder();
        $files = $finder->files()->in($customStubsPath)->name($stubName);

        foreach ($files as $file) {
            return $file->getRealPath();
        }

        throw new \Exception("Custom stub file '{$stubName}' not found.");
    }

    protected function makeController($directory)
    {
        $name = $this->argument('name');
        $stub = File::get($this->getStub('controller.vilt.stub'));

        $replacements = [
            '{{namespace}}' => 'App\Http\Controllers\\'.$directory,
            '{{directory}}' => $directory,
            '{{model}}' => $name,
            '{{modelLower}}' => Str::lower($name),
            '{{modelLowerPluralized}}' => Str::plural(Str::lower($name)),
        ];

        $content = str_replace(
            array_keys($replacements),
            array_values($replacements),
            $stub
        );

        $path = app_path('Http/Controllers/'.$directory.'/'.$name.'Controller.php');

        File::put($path, $content);
    }

    protected function makeViews($directory)
    {
        $name = $this->argument('name');

        $files = [
            'Index' => 'index.vilt.stub',
            'Create' => 'create.vilt.stub',
            'Edit' => 'edit.vilt.stub',
            'Show' => 'show.vilt.stub',
        ];

        $replacements = [
            '{{directory}}' => $directory,
            '{{model}}' => $name,
            '{{modelLower}}' => Str::lower($name),
            '{{modelLowerPluralized}}' => Str::plural(Str::lower($name)),
        ];

        foreach ($files as $file => $stub) {
            $content = str_replace(
                array_keys($replacements),
                array_values($replacements),
                File::get($this->getStub($stub))
            );

            $path = resource_path('js/Pages/'.$directory.'/'.Str::plural($name).'/'.$file.'.vue');

            if (! File::isDirectory(dirname($path))) {
                File::makeDirectory(dirname($path), 0755, true);
            }

            if(File::put($path, $content)) {
                $this->components->info(sprintf('Page [%s] created successfully.', $path));
            } else {
                $this->components->error(sprintf('Page [%s] could not be created.', $path));
            }
        }
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['admin', null, InputOption::VALUE_NONE, 'Create all the files needed for an admin CRUD operation'],
            ['private', null, InputOption::VALUE_NONE, 'Create all the files needed for a private CRUD operation'],
            ['public', null, InputOption::VALUE_NONE, 'Create all the files needed for a public CRUD operation'],
        ];
    }
}
