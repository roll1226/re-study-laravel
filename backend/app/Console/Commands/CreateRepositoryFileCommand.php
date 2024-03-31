<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepositoryFileCommand extends Command
{
    const REPOSITORIES_PATH = 'app/Repositories/';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {repositoryName : The name of repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Repository File';

    /**
     * @var string
     */
    private $fileName;

    /**
     * @var string
     */
    private $dirName;

    /**
     * @var string
     */
    private $repositoryFileName;

    /**
     * @var string
     */
    private $interfaceFileName;

    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->fileName = $this->argument('repositoryName');

        if (is_null($this->fileName)) {
            return $this->error('Repository Name invalid');
        }
        $this->dirName = $this->ask('new directory name. or use directory name');

        if (is_null($this->dirName)) {
            return $this->error('Directory required!');
        }

        if (!$this->isExistDirectory()) {
            $this->createDirectory();
        }

        $this->repositoryFileName = self::REPOSITORIES_PATH . $this->dirName . '/' . $this->fileName . 'Repository.php';
        $this->interfaceFileName = self::REPOSITORIES_PATH . $this->dirName . '/' . $this->fileName . 'RepositoryInterface.php';
        if ($this->isExistFiles()) {
            $this->error('already exist');
            return;
        }

        $this->createRepositoryFile();
        $this->createInterFaceFile();
        $this->info('Successfully Create Repository File');
    }

    /**
     * Create Repository File
     * @return void
     */
    private function createRepositoryFile(): void
    {
        $content = "<?php\n\nnamespace App\\Repositories\\$this->dirName;\n\nclass $this->fileName" . "Repository implements $this->fileName" . "Interface\n{\n}\n";
        file_put_contents($this->repositoryFileName, $content);
    }

    /**
     * Create Interface File
     * @return void
     */
    private function createInterFaceFile(): void
    {
        $content = "<?php\n\nnamespace App\\Repositories\\$this->dirName;\n\ninterface $this->fileName" . "RepositoryInterface\n{\n}\n";
        file_put_contents($this->interfaceFileName, $content);
    }

    /**
     * Check Exist Same File
     * @return bool
     */
    private function isExistFiles(): bool
    {
        return file_exists($this->repositoryFileName) && file_exists($this->interfaceFileName);
    }

    /**
     * Check Exist Directory
     * @return bool
     */
    private function isExistDirectory(): bool
    {
        return file_exists(self::REPOSITORIES_PATH . $this->dirName);
    }

    /**
     * Create Given Name Directory
     * @return void
     */
    private function createDirectory(): void
    {
        mkdir(self::REPOSITORIES_PATH . $this->dirName, 0755, true);
    }
}
