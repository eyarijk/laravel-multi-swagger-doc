<?php

return [
    [
        'name' => 'cat',
        'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false),
        'annotations' => [
            base_path('app/Http/Controllers/Cat'),
        ],
        'excludes' => [],
    ],
    [
        'name' => 'cow',
        'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false),
        'annotations' => [
            base_path('app/Http/Controllers/Cow'),
        ],
        'excludes' => [],
    ],
    [
        'name' => 'pet',
        'generate_yaml_copy' => env('L5_SWAGGER_GENERATE_YAML_COPY', false),
        'annotations' => [
            base_path('app/Http/Controllers/Pet'),
        ],
        'excludes' => [],
    ],
];
