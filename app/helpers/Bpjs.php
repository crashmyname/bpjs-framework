<?php
namespace Helpers;

class Bpjs
{
    protected $migrationLogFile = 'database/migrations/.migrated.json';
    protected $commands = [
        'make:model' => 'createModel',
        'make:controller' => 'createController',
        'make:import' => 'createImport',
        'make:export' => 'createExport',
        'make:migration' => 'createMigration',
        'db:migrate' => 'runMigrations',
        'db:rollback' => 'rollbackMigration',
        'serve' => 'Serve',
        // Tambahkan perintah lainnya di sini
    ];

    public function run($argv)
    {
        $command = $argv[1] ?? null;
        $argument = $argv[2] ?? null;
        $options = array_slice($argv, 3);

        // Cek apakah perintah dikenali
        if ($command && isset($this->commands[$command])) {
            $method = $this->commands[$command];
            $this->$method($argument, $options);
        } else {
            echo "Perintah tidak ditemukan!\n";
        }
    }

    protected function createModel($name)
    {
        if (!$name) {
            echo "Nama model harus diberikan!\n";
            return;
        }
        $modelTemplate = "<?php\n\nnamespace App\Models;\nuse Helpers\BaseModel;\n\nclass $name extends BaseModel\n{\n    // Model logic here\n}\n";
        $filePath = "app/Models/{$name}.php";
        if (file_exists($filePath)) {
            echo "Model $name sudah ada!\n";
        } else {
            file_put_contents($filePath, $modelTemplate);
            echo "Model $name berhasil dibuat!\n";
        }
    }

    protected function createImport($name)
    {
        if(!$name){
            echo "Nama import harus diberikan!\n";
            return;
        }
        $modalTemplate = "<?php\n\nnamespace App\Import;\n\nclass $name\n{\n    // Import logic here\n}\n";
        $filePath = "app/Import/{$name}.php";
        if(file_exists($filePath)){
            echo "Import $name sudah ada!\n";
        } else {
            file_put_contents($filePath, $modalTemplate);
            echo "import $name berhasil dibuat!\n";
        }
    }

    protected function createExport($name)
    {
        if(!$name){
            echo "Nama export harus diberikan!\n";
            return;
        }
        $modalTemplate = "<?php\n\nnamespace App\Export;\n\nclass $name\n{\n    // Export logic here\n}\n";
        $filePath = "app/Export/{$name}.php";
        if(file_exists($filePath)){
            echo "Export $name sudah ada!\n";
        } else {
            file_put_contents($filePath, $modalTemplate);
            echo "Export $name berhasil dibuat!\n";
        }
    }

    protected function createController($name, $options = [])
    {
        if (!$name) {
            echo "Nama controller harus diberikan!\n";
            return;
        }

        // Pisahkan namespace dan nama file
        $pathParts = explode('/', $name);
        $className = array_pop($pathParts);
        $namespace = 'App\\Controllers';
        if (!empty($pathParts)) {
            $namespace .= '\\' . implode('\\', $pathParts);
        }
        $directory = 'app/Controllers/' . implode('/', $pathParts);

        // Pastikan folder target ada
        if (!is_dir($directory)) {
            mkdir($directory, 0777, true); // Buat folder secara rekursif
        }

        $isResource = in_array('--resource', $options);
        $controllerTemplate = "<?php\n\nnamespace {$namespace};\n\nuse Helpers\BaseController;\nuse Helpers\Request;\nuse Helpers\Validator;\nuse Helpers\View;\nuse Helpers\CSRFToken;\n\nclass {$className} extends BaseController\n{\n";
        if ($isResource) {
            $controllerTemplate .= "    public function index()\n    {\n        // Tampilkan semua resource\n    }\n\n";
            $controllerTemplate .= "    public function show(\$id)\n    {\n        // Tampilkan resource dengan ID: \$id\n    }\n\n";
            $controllerTemplate .= "    public function store(Request \$request)\n    {\n        // Simpan resource baru\n    }\n\n";
            $controllerTemplate .= "    public function update(Request \$request, \$id)\n    {\n        // Update resource dengan ID: \$id\n    }\n\n";
            $controllerTemplate .= "    public function destroy(\$id)\n    {\n        // Hapus resource dengan ID: \$id\n    }\n";
        } else {
            $controllerTemplate .= "    // Controller logic here\n";
        }
        $controllerTemplate .= "}\n";

        $filePath = "{$directory}/{$className}.php";

        if (file_exists($filePath)) {
            echo "Controller $name sudah ada!\n";
        } else {
            file_put_contents($filePath, $controllerTemplate);
            echo "Controller {$name} berhasil dibuat di {$filePath}!\n";
        }
    }

    protected function createMigration($name)
    {
        if (!$name) {
            echo "Nama migration harus diberikan!\n";
            return;
        }

        $timestamp = date('Y_m_d_His');
        $fileName = "{$timestamp}_{$name}.php";
        $filePath = "database/migrations/{$fileName}";

        // Pastikan direktori ada
        if (!is_dir('database/migrations')) {
            mkdir('database/migrations', 0777, true);
        }

        if (preg_match('/create_(.*?)_table/', $fileName, $matches)) {
            $table = $matches[1];
            echo $table;
        }

        // Template migration
        $className = str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
        $migrationTemplate = "<?php\n\n";
        $migrationTemplate .= "use PDO;\n\n";
        $migrationTemplate .= "use Helpers\SchemaBuilder;\n\n";
        $migrationTemplate .= "class {$className}\n";
        $migrationTemplate .= "{\n";
        $migrationTemplate .= "    public function up(PDO \$pdo)\n";
        $migrationTemplate .= "    {\n";
        $migrationTemplate .= "        \$table = new SchemaBuilder('$table');\n";
        $migrationTemplate .= "        \$sql = \$table->id()\n";
        $migrationTemplate .= "        ->timestamp('created_at')->default('CURRENT_TIMESTAMP')\n";
        $migrationTemplate .= "        ->buildCreateSQL();\n";
        $migrationTemplate .= "        \$pdo->exec(\$sql);\n";
        $migrationTemplate .= "    }\n\n";
        $migrationTemplate .= "    public function down(PDO \$pdo)\n";
        $migrationTemplate .= "    {\n";
        $migrationTemplate .= "        \$table = new SchemaBuilder('$table');\n";
        $migrationTemplate .= "        \$pdo->exec(\$table->buildDropSQL());\n";
        $migrationTemplate .= "    }\n";
        $migrationTemplate .= "}\n";

        file_put_contents($filePath, $migrationTemplate);
        echo "Migration $fileName berhasil dibuat!\n";
    }
    protected function runMigrations()
    {
        $migrationPath = 'database/migrations';
        if (!is_dir($migrationPath)) {
            echo "Folder migration tidak ditemukan.\n";
            return;
        }

        $files = scandir($migrationPath);
        
        $pdo = new \PDO(env('DB_CONNECTION','mysql').':host='.env('DB_HOST','127.0.0.1').';dbname='.env('DB_DATABASE'),env('DB_USERNAME'), env('DB_PASSWORD'));

        foreach ($files as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                require_once "$migrationPath/$file";
                $className = $this->getClassNameFromFile($file);
                if (class_exists($className)) {
                    $migration = new $className();
                    if (method_exists($migration, 'up')) {
                        $migration->up($pdo);
                        $this->logMigration($file);
                        echo "Migration $file berhasil dijalankan.\n";
                    }
                }
            }
        }
    }

    protected function getClassNameFromFile($file)
    {
        $name = pathinfo($file, PATHINFO_FILENAME);
        $name = preg_replace('/^\d+_/', '', $name); // hapus timestamp
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $name)));
    }

    protected function logMigration($file)
    {
        $data = $this->getMigrationLog();
        $data[] = $file;
        file_put_contents($this->migrationLogFile, json_encode($data));
    }

    protected function removeLastMigration()
    {
        $data = $this->getMigrationLog();
        array_pop($data);
        file_put_contents($this->migrationLogFile, json_encode($data));
    }

    protected function getMigrationLog()
    {
        if (!file_exists($this->migrationLogFile)) {
            return [];
        }
        return json_decode(file_get_contents($this->migrationLogFile), true);
    }

    protected function rollbackMigration()
    {
        $migrated = $this->getMigrationLog();
        if (empty($migrated)) {
            echo "Tidak ada migrasi yang bisa di-rollback.\n";
            return;
        }

        $lastFile = array_pop($migrated);
        $path = "database/migrations/$lastFile";

        if (!file_exists($path)) {
            echo "File migration $lastFile tidak ditemukan.\n";
            return;
        }

        require_once $path;
        $className = $this->getClassNameFromFile($lastFile);

        $pdo = new \PDO(env('DB_CONNECTION','mysql').':host='.env('DB_HOST','127.0.0.1').';dbname='.env('DB_DATABASE'),env('DB_USERNAME'), env('DB_PASSWORD'));

        if (class_exists($className)) {
            $migration = new $className();
            if (method_exists($migration, 'down')) {
                $migration->down($pdo);
                $this->removeLastMigration();
                echo "Rollback $lastFile berhasil.\n";
            } else {
                echo "Method down() tidak ditemukan di $className.\n";
            }
        } else {
            echo "Class $className tidak ditemukan dalam $lastFile.\n";
        }
    }

    protected function Serve()
    {
        $host = '127.0.0.1';
        $port = '8000';

        global $argv;
        foreach ($argv as $arg) {
            if (strpos($arg, '--host=') !== false) {
                $host = substr($arg, 7);
            }
            if (strpos($arg, '--port=') !== false) {
                $port = substr($arg, 7);
            }
        }
        if (!filter_var($host, FILTER_VALIDATE_IP)) {
            echo "Error: Invalid host address provided: $host\n";
            exit(1); // Exit with error
        }

        // Validate port (must be numeric and within range)
        if (!is_numeric($port) || (int) $port < 1024 || (int) $port > 65535) {
            echo "Error: Invalid port number provided: $port\n";
            exit(1); // Exit with error
        }

        echo "Starting development server on http://{$host}:{$port}\n";
        exec("php -S {$host}:{$port}");
    }
}
