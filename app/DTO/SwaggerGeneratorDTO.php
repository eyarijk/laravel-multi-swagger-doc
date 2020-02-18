<?php

namespace App\DTO;

class SwaggerGeneratorDTO
{
    /**
     * @var array
     */
    private $annotationsDir;

    /**
     * @var string
     */
    private $docDir;

    /**
     * @var string
     */
    private $docsFile;

    /**
     * @var string
     */
    private $yamlDocsFile;

    /**
     * @var array
     */
    private $excludedDirs;

    /**
     * @var array
     */
    private $constants;

    /**
     * @var bool
     */
    private $yamlCopyRequired;

    /**
     * SwaggerGeneratorDTO constructor.
     * @param array $annotationsDir
     * @param string $docDir
     * @param string $docsFile
     * @param string $yamlDocsFile
     * @param array $excludedDirs
     * @param array $constants
     * @param bool $yamlCopyRequired
     */
    public function __construct(
        array $annotationsDir,
        string $docDir,
        string $docsFile,
        string $yamlDocsFile,
        array $excludedDirs = [],
        array $constants = [],
        bool $yamlCopyRequired = false
    )
    {
        $this->annotationsDir = $annotationsDir;
        $this->docDir = $docDir;
        $this->docsFile = $docsFile;
        $this->yamlDocsFile = $yamlDocsFile;
        $this->excludedDirs = $excludedDirs;
        $this->constants = $constants;
        $this->yamlCopyRequired = $yamlCopyRequired;
    }

    /**
     * @return array
     */
    public function getAnnotationsDir(): array
    {
        return $this->annotationsDir;
    }

    /**
     * @return string
     */
    public function getDocDir(): string
    {
        return $this->docDir;
    }

    /**
     * @return string
     */
    public function getDocsFile(): string
    {
        return $this->docsFile;
    }

    /**
     * @return string
     */
    public function getYamlDocsFile(): string
    {
        return $this->yamlDocsFile;
    }

    /**
     * @return array
     */
    public function getExcludedDirs(): array
    {
        return $this->excludedDirs;
    }

    /**
     * @return array
     */
    public function getConstants(): array
    {
        return $this->constants;
    }

    /**
     * @return bool
     */
    public function isYamlCopyRequired(): bool
    {
        return $this->yamlCopyRequired;
    }
}
