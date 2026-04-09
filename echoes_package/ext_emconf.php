<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Echoes Package',
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
            'ReeaDigitalLimited\\EchoesPackage\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Sadia Jahan Shanta',
    'author_email' => 'sadia@reeadigital.com',
    'author_company' => 'Reea Digital Limited',
    'version' => '1.0.0',
];
