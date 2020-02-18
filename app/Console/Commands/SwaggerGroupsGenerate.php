<?php

namespace App\Console\Commands;

use App\Components\SwaggerGeneratorComponent;
use App\DTO\SwaggerGeneratorDTO;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class SwaggerGroupsGenerate extends Command
{
    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * SwaggerGroupsGenerate constructor.
     * @param Filesystem $filesystem
     */
    public function __construct(Filesystem $filesystem)
    {
        parent::__construct();
        $this->filesystem = $filesystem;
    }

    /**
     * @var string
     */
    protected $signature = 'swagger:groups:generate';

    /**
     * @var string
     */
    protected $description = 'Swagger groups generate';

    public function handle(): void
    {
        $this->info('Regenerating docs');

        $groups = config('swagger-groups');
        $docsDir = config('l5-swagger.paths.docs');
        $constants = config('l5-swagger.constants');

        $this->filesystem->cleanDirectory($docsDir);

        foreach ($groups as $group) {
            $name = $group['name'];

            $this->info("Generate {$name}");

            $generatorDTO = new SwaggerGeneratorDTO(
                $group['annotations'],
                $docsDir,
                "{$name}-api-docs.json",
                "{$name}-api-docs.yaml",
                $group['excludes'],
                $constants,
                $group['generate_yaml_copy']
            );

            SwaggerGeneratorComponent::generateDocsByDTO($generatorDTO);
        }

        $this->info('Generated docs');
    }
}
