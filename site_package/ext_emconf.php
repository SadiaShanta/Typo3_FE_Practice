<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Site Package',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'bootstrap_package' => '15.0.0-15.99.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Reea\\SitePackage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Calin',
    'author_email' => 'calin@reea.net',
    'author_company' => 'Reea',
    'version' => '1.0.0',
];
