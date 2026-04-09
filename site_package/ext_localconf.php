<?php

defined('TYPO3') or die('Access denied.');

// Add default RTE configuration
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['site_package'] = 'EXT:site_package/Configuration/RTE/Default.yaml';

// $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['container']['register'] = array_merge(
//     $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['container']['register'] ?? [],
//     [
//         'heroSlider' => 'Configuration/Containers/HeroSlider.yaml'
//     ]
// );

call_user_func(function () {
    $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['container']['register']['heroSlider']
        = 'EXT:site_package/Configuration/Containers/HeroSlider.yaml';
});