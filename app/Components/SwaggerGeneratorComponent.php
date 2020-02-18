<?php

namespace App\Components;

use App\DTO\SwaggerGeneratorDTO;
use Illuminate\Support\Facades\Storage;
use L5Swagger\Exceptions\L5SwaggerException;
use L5Swagger\Generator;

class SwaggerGeneratorComponent extends Generator
{
    /**
     * @param SwaggerGeneratorDTO $swaggerGeneratorDTO
     */
    public static function generateDocsByDTO(SwaggerGeneratorDTO $swaggerGeneratorDTO): void
    {
        $generator = new static();

        $generator->annotationsDir = $swaggerGeneratorDTO->getAnnotationsDir();
        $generator->docDir = $swaggerGeneratorDTO->getDocDir();
        $generator->docsFile = $generator->docDir . DIRECTORY_SEPARATOR . $swaggerGeneratorDTO->getDocsFile();
        $generator->yamlDocsFile = $generator->docDir . DIRECTORY_SEPARATOR . $swaggerGeneratorDTO->getYamlDocsFile();
        $generator->excludedDirs = $swaggerGeneratorDTO->getExcludedDirs();
        $generator->constants = $swaggerGeneratorDTO->getConstants();
        $generator->yamlCopyRequired = $swaggerGeneratorDTO->isYamlCopyRequired();

        $generator->prepareDirectory()
            ->defineConstants()
            ->scanFilesForDocumentation()
            ->populateServers()
            ->saveJson()
            ->makeYamlCopy()
        ;
    }

    /**
     * Check directory structure and permissions.
     *
     * @return self
     * @throws L5SwaggerException
     */
    protected function prepareDirectory(): self
    {
        if (Storage::exists($this->docDir) && !is_writable($this->docDir)) {
            throw new L5SwaggerException('Documentation storage directory is not writable');
        }

        if (!Storage::exists($this->docDir)) {
            Storage::makeDirectory($this->docDir);
        }

        return $this;
    }
}
