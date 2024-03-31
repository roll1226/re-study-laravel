<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateServiceFileCommand extends Command
{
    const SERVICES_PATH = 'app/Services/';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {serviceName : The name of service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Service File';

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
    private $serviceFileName;

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
        $this->fileName = $this->argument('serviceName');

        if (is_null($this->fileName)) {
            return $this->error('Service Name invalid');
        }
        $this->dirName = $this->ask('new directory name. or use directory name');

        if (is_null($this->dirName)) {
            return $this->error('Directory required!');
        }

        if (!$this->isExistDirectory()) {
            $this->createDirectory();
        }

        $this->serviceFileName = self::SERVICES_PATH . $this->dirName . '/' . $this->fileName . 'Service.php';
        $this->interfaceFileName = self::SERVICES_PATH . $this->dirName . '/' . $this->fileName . 'ServiceInterface.php';
        if ($this->isExistFiles()) {
            $this->error('already exist');
            return;
        }

        $this->createServiceFile();
        $this->createInterFaceFile();
        $this->info('Successfully Create Service File');
    }

    /**
     * Create Service File
     * @return void
     */
    private function createServiceFile(): void
    {
        $content = "<?php\n\nnamespace App\\Services\\$this->dirName;\n\nclass $this->fileName" . "Service implements $this->fileName" . "Interface\n{\n}\n";
        file_put_contents($this->serviceFileName, $content);
    }

    /**
     * Create Interface File
     * @return void
     */
    private function createInterFaceFile(): void
    {
        $content = "<?php\n\nnamespace App\\Services\\$this->dirName;\n\ninterface $this->fileName" . "ServiceInterface\n{\n}\n";
        file_put_contents($this->interfaceFileName, $content);
    }

    /**
     * Check Exist Same File
     * @return bool
     */
    private function isExistFiles(): bool
    {
        return file_exists($this->serviceFileName) && file_exists($this->interfaceFileName);
    }

    /**
     * Check Exist Directory
     * @return bool
     */
    private function isExistDirectory(): bool
    {
        return file_exists(self::SERVICES_PATH . $this->dirName);
    }

    /**
     * Create Given Name Directory
     * @return void
     */
    private function createDirectory(): void
    {
        mkdir(self::SERVICES_PATH . $this->dirName, 0755, true);
    }
}
