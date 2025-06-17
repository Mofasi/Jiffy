<?php
declare(strict_types=1);

namespace App\Console;

/**
 * CLI Command Handler
 * 
 * Routes commands to appropriate handlers
 */
class Kernel {
    private array $commands = [
        'make:controller' => 'handleMakeController',
        'make:model' => 'handleMakeModel',
        'make:view' => 'handleMakeView',
        'make:migration' => 'handleMakeMigration',
        'serve' => 'handleServe',
        'tailwind:watch' => 'handleTailwindWatch',
        'db:migrate' => 'handleDbMigrate',
        'key:generate' => 'handleKeyGenerate',
        'route:list' => 'handleRouteList',
        'optimize' => 'handleOptimize',
        'storage:link' => 'handleStorageLink',
        '--version' => 'handleVersion',
        '--help' => 'handleHelp',
        '-h' => 'handleHelp'
    ];

    public function handle(array $argv): void {
        $command = $argv[1] ?? '--help';
        
        if (isset($this->commands[$command])) {
            $method = $this->commands[$command];
            $this->$method(array_slice($argv, 2));
        } else {
            echo "\033[31mError:\033[0m Command \"$command\" not found\n\n";
            $this->handleHelp();
            exit(1);
        }
    }

    private function handleHelp(): void {
        echo "\033[34mJiffy CLI Tool\033[0m - Project Management Commands\n\n";
        echo "\033[32mUsage:\033[0m\n  jiffy <command> [options]\n\n";
        echo "\033[32mAvailable commands:\033[0m\n";
        
        $commands = [
            'make:controller <name>' => 'Create a new controller',
            'make:model <name>' => 'Create a new model',
            'make:view <name>' => 'Create a new view',
            'make:migration <name>' => 'Create a database migration',
            'serve [port]' => 'Start development server',
            'tailwind:watch' => 'Watch for CSS changes',
            'db:migrate' => 'Run database migrations',
            'key:generate' => 'Generate new app key',
            'route:list' => 'List all registered routes',
            'optimize' => 'Optimize for production',
            'storage:link' => 'Create storage link'
        ];
        
        foreach ($commands as $cmd => $desc) {
            echo "  \033[33m" . str_pad($cmd, 25) . "\033[0m $desc\n";
        }
    }

    private function handleVersion(): void {
        echo "Jiffy Framework 1.0.0\n";
    }

    private function handleServe(array $args): void {
        $port = $args[0] ?? '8000';
        echo "\033[34mJiffy development server started\033[0m\n";
        echo "http://localhost:$port\n";
        passthru("php -S localhost:$port -t public");
    }

    // Other handlers will be implemented in subsequent batches
}
