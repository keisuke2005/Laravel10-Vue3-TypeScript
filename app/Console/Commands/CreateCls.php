<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateCls extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:cls {name} {--i|interface} {--r|repository} {--s|service}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $service = $this->option('service');
        $repository = $this->option('repository');
        $interface = $this->option('interface');
        
        $dir = 'Services';
        $type = 'Service';
        if($repository)
        {
            $dir = 'Repositories';
            $type = 'Repository';
        }

        if($interface)
        {
            $dir .= '/Interfaces';
            $type .= 'Interface';
        }

        $directory = app_path($dir);  // app/Services
        $filePath = "{$directory}/{$name}{$type}.php";

        $template = match ($type) {
            'Service' => $this->serviceTemplate($name),
            'Repository' => $this->repositoryTemplate($name),
            'ServiceInterface' => $this->serviceInterfaceTemplate($name),
            'RepositoryInterface' => $this->repositoryInterfaceTemplate($name),
            default => $this->serviceTemplate($name),
        };

        // Servicesディレクトリがない場合は作成
        if (! File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // ファイルが既に存在する場合はエラーメッセージを表示
        if (File::exists($filePath)) {
            $this->error("The {$type} class already exists: {$filePath}");
            return;
        }
           
        // ファイル作成
        File::put($filePath, $template);

        $this->info("{$type} class created: {$filePath}");
    }

    private function serviceTemplate(string $name)
    {
        $if = 'App\\Services\\Interfaces\\'.$name.'ServiceInterface';
        return <<<EOL
<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;
use {$if};

readonly class {$name}Service implements {$name}ServiceInterface
{
    public function __construct(
    
    )
    {

    }
    /**
     * example
     */
    public function example():array
    {
        return [

        ];
    }
}      
EOL;
    }

    private function repositoryTemplate(string $name)
    {
        $model = 'App\\Models\\'.$name;
        $if = 'App\\Repositories\\Interfaces\\'.$name.'RepositoryInterface';
        return <<<EOL
<?php

namespace App\Repositories;

use {$if};
use {$model};
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

readonly class {$name}Repository implements {$name}RepositoryInterface
{
    public function find():Collection
    {
        return ;
    }
}
EOL;
    }

    private function serviceInterfaceTemplate(string $name)
    {
        return <<<EOL
<?php

namespace App\Services\Interfaces;

use Illuminate\Http\RedirectResponse;

interface {$name}ServiceInterface
{
    public function example():array;
}
EOL;
    }

    private function repositoryInterfaceTemplate(string $name)
    {
        $model = 'App\\Models\\'.$name;
        return <<<EOL
<?php

namespace App\Repositories\Interfaces;

use {$model};
use Illuminate\Database\Eloquent\Collection;

interface {$name}RepositoryInterface
{
    public function find():Collection;
}
EOL;
    }
}