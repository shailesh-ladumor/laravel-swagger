<?php

namespace Ladumor\LaravelSwagger\commands;

use Illuminate\Console\Command;

class GenerateSwagger extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'laravel-swagger:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the assets swagger for your laravel application.';

    public $composer;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->composer = app()['composer'];
    }

    public function handle()
    {
        $resourceDir = resource_path('views/swagger');

        $viewFile = file_get_contents(__DIR__ . './../../templates/index.stub');
        $swaggerTitle = $this->askTitleChangeQuestion();
        $viewFile = str_replace('$TITLE', $swaggerTitle, $viewFile);

        $this->createFile($resourceDir . DIRECTORY_SEPARATOR, 'index.blade.php', $viewFile);
        $this->info('Swagger View file is published.');

        $publicDir = public_path('swagger');
        $swaggerYamlFile = file_get_contents(__DIR__ . './../../templates/swagger.stub');
        $swaggerYamlFile = str_replace('$TITLE', $swaggerTitle, $swaggerYamlFile);

        $this->createFile($publicDir . DIRECTORY_SEPARATOR, 'swagger.yaml', $swaggerYamlFile);
        $this->info('swagger.yaml file is published.');

        $this->info('<fg=yellow>Generating autoload files!... </>');
        $this->composer->dumpOptimized();
    }

    private function askTitleChangeQuestion()
    {
        $title = 'API\'s Swagger Doc | ' . config('app.name');
        $fieldInputStr = $this->ask('The Swagger title is <fg=blue> "' . $title . '"</>, Are you want to change Swagger title?', 'Y/N');

        if (strtolower($fieldInputStr) === 'y' || strtolower($fieldInputStr) === 'yes') {
            $title = $this->askTitle();
        }

        return $title;
    }

    /**
     * Ask Swagger Docs title
     *
     * @return string
     */
    private function askTitle()
    {
        $title = $this->ask('Please specify swagger doc\'s title:', '');
        if (empty($title)) {
            $title = $this->askTitle();
        }

        return ucwords($title);
    }

    /**
     * @param $path
     * @param $fileName
     * @param $contents
     */
    public static function createFile($path, $fileName, $contents)
    {
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        $path = $path . $fileName;

        file_put_contents($path, $contents);
    }
}
