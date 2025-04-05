<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use ReflectionClass;
use ReflectionMethod;
use Illuminate\Filesystem\Filesystem;

class GenerateControllerMethods extends Command
{
    protected $signature = 'generate:controller-methods';
    protected $description = 'Menambahkan metode yang hilang di dalam controller berdasarkan route yang terdaftar';

    public function handle()
    {
        $routes = Route::getRoutes();
        $controllers = [];

        foreach ($routes as $route) {
            $action = $route->getAction();

            if (isset($action['controller'])) {
                [$controller, $method] = explode('@', class_basename($action['controller']) . '@' . $action['uses']);

                if (!isset($controllers[$controller])) {
                    $controllers[$controller] = [];
                }

                $controllers[$controller][] = $method;
            }
        }

        $filesystem = new Filesystem();

        foreach ($controllers as $controller => $methods) {
            $controllerClass = "App\\Http\\Controllers\\$controller";

            if (!class_exists($controllerClass)) {
                $this->warn("Controller $controller tidak ditemukan. Lewati...");
                continue;
            }

            $reflection = new ReflectionClass($controllerClass);
            $existingMethods = array_map(fn($method) => $method->getName(), $reflection->getMethods(ReflectionMethod::IS_PUBLIC));

            $filePath = $reflection->getFileName();
            $fileContent = $filesystem->get($filePath);

            $newMethods = [];
            foreach ($methods as $method) {
                if (!in_array($method, $existingMethods)) {
                    $newMethods[] = $this->generateMethodStub($method);
                }
            }

            if (!empty($newMethods)) {
                $fileContent = rtrim($fileContent, "}\n") . "\n\n" . implode("\n\n", $newMethods) . "\n}\n";
                $filesystem->put($filePath, $fileContent);
                $this->info("Metode baru ditambahkan ke $controller");
            } else {
                $this->info("Tidak ada metode baru untuk $controller");
            }
        }

        $this->info("Proses selesai.");
    }

    protected function generateMethodStub($method)
    {
        return <<<PHP
    public function $method()
    {
        // TODO: Implementasi metode $method
    }
PHP;
    }
}
