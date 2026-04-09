<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
defined('TYPO3') || die();

$GLOBALS['TCA']['tt_content']['types']['heroSlider']['showitem'] = '
    --palette--;;general, --palette--;;headers, bodytext, assets, --div--;Access, hidden, starttime, endtime
';


(static function (): void {
    /**
     * Register Slider Scroll Horizontal container
     */
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                'slider_scroll_horizontal',
                'LLL:EXT:site_package/Resources/Private/Language/locallang_be.xlf:slider_scroll_horizontal.title',
                'LLL:EXT:site_package/Resources/Private/Language/locallang_be.xlf:slider_scroll_horizontal.description',
                [
                    [
                        [
                            'name' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_be.xlf:slider_scroll_horizontal.slides',
                            'colPos' => 101
                        ],
                    ]
                ]
            )
        )
        ->setIcon('container-elements-slider')
        ->setSaveAndCloseInNewContentElementWizard(true)
    );

    /**
     * Add flexForm 
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
        '*',
        'FILE:EXT:site_package/Configuration/FlexForms/SliderScrollHorizontal.xml',
        'slider_scroll_horizontal'
    );


    /**
     * Register Page Container With Background
     */
    \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
        (
            new \B13\Container\Tca\ContainerConfiguration(
                'page_container_background_image',
                'LLL:EXT:site_package/Resources/Private/Language/locallang_be.xlf:page_container_background_image.title',
                'LLL:EXT:site_package/Resources/Private/Language/locallang_be.xlf:page_container_background_image.description',
                [
                    [
                        [
                            'name' => 'LLL:EXT:site_package/Resources/Private/Language/locallang_be.xlf:page_container_background_image.content',
                            'colPos' => 101
                        ],
                    ]
                ]
            )
        )
        ->setIcon('container-elements-div')
        ->setSaveAndCloseInNewContentElementWizard(true)
    );
})();

