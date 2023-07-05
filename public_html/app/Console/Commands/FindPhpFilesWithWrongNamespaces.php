<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FindPhpFilesWithWrongNamespaces extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check_namespaces';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Encontrar errores de namespace';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $countErrors = 0;
        $testCountErrors = 0;

        $path = realpath("app");
        $pathTest = realpath("tests");

        $basePath = str_replace('/', "\\", substr($path, -(strpos($path, "app")+ 3), (strpos($path, "app"))));
        $basePathTest = str_replace(
            '/',
            "\\",
            substr($pathTest, -(strpos($pathTest, "tests")+ 5), (strpos($pathTest, "tests")))
        );

        $countErrors = $this->scanDir($path, $countErrors, $basePath);
        $countTestErrors = $this->scanDirTest($pathTest, $testCountErrors, $basePathTest);

        if (!$countErrors && !$countTestErrors) {
            $this->info("El sistema no tiene errores de namespaces :D");
            return 0;
        }
        $this->info("$countErrors archivos encontrados en app con errores");
        $this->info("$countTestErrors archivos encontrados en tests con errores");
        return 1;
    }

    private function scanDir($path, $countErrors, $basePath)
    {
        $files = scandir($path);
        $files = array_diff(scandir($path), ['.', '..']);
        $files = array_filter($files, function ($file) {
            return $file !== '.DS_Store';
        });
        foreach ($files as $file) {
            if (!isset(pathinfo($file)['extension'])) {
                $pathGlobal = "$path/$file";

                $countErrors = $this->scanDir($pathGlobal, $countErrors, $basePath);
                continue;
            }

            if (pathinfo($file)['extension'] !== 'php') {
                continue;
            }

            $realPath = "$path";
            $fileContent = file_get_contents($realPath . "/$file");
            preg_match('#^namespace\s+(.+?);$#sm', $fileContent, $matches);

            $expectedNamespace = str_replace("/", "\\", $realPath);

            if (!isset($matches[0])) {
                $countErrors++;
                $this->error("Este archivo no tiene namespace: $file");
                continue;
            }

            $namespace = str_replace(';', '', substr($matches[0], 10));
            $namespace = str_replace('app', 'App', $namespace);
            $expectedNamespace = str_replace($basePath, '', $expectedNamespace);
            $expectedNamespace = str_replace('app', 'App', $expectedNamespace);

            if ($namespace !== $expectedNamespace) {
                $countErrors++;
                $fileMessage = "Este archivo no cuenta con un namespace valido: $file";
                $this->error("$fileMessage, namespace esperado: $expectedNamespace, namespace del archivo: $namespace");
            }
        }
        return $countErrors;
    }

    private function scanDirTest($path, $countErrors, $basePath)
    {
        $files = scandir($path);
        $files = array_diff(scandir($path), ['.', '..']);
        $files = array_filter($files, function ($file) {
            return $file !== '.DS_Store';
        });
        foreach ($files as $file) {
            if (!isset(pathinfo($file)['extension'])) {
                $pathGlobal = "$path/$file";

                $countErrors = $this->scanDirTest($pathGlobal, $countErrors, $basePath);
                continue;
            }

            if (pathinfo($file)['extension'] !== 'php') {
                continue;
            }

            $realPath = "$path";
            $fileContent = file_get_contents($realPath . "/$file");
            preg_match('#^namespace\s+(.+?);$#sm', $fileContent, $matches);

            $expectedNamespace = str_replace("/", "\\", $realPath);

            if (!isset($matches[0])) {
                $countErrors++;
                $this->error("Este archivo no tiene namespace: $file, $expectedNamespace");
                continue;
            }

            $namespace = str_replace(';', '', substr($matches[0], 10));
            $namespace = str_replace('tests', 'Tests', $namespace);
            $expectedNamespace = str_replace($basePath, '', $expectedNamespace);
            $expectedNamespace = str_replace('tests', 'Tests', $expectedNamespace);

            if ($namespace !== $expectedNamespace) {
                $countErrors++;
                $this->error("Este archivo no cuenta con un namespace valido: $file");
                $this->error("Namespace esperado: $expectedNamespace, namespace del archivo: $namespace");
            }
        }
        return $countErrors;
    }
}
