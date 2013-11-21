<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

// add constants and setup typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'T3Flex');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript/PhotoSwipe', 'T3Flex PhotoSwipe');

// add default page TSconfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT:source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/pageTSconfig.txt">');

// add default user TSconfig
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('<INCLUDE_TYPOSCRIPT:source="FILE:EXT:' . $_EXTKEY . '/Configuration/TypoScript/userTSconfig.txt">');

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
		$_EXTKEY,
		'PhotoSwipe',
		'PhotoSwipe'
);

$extensionName = strtolower(\TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY));

$pluginName = strtolower('PhotoSwipe');
$pluginSignature = $extensionName.'_'.$pluginName;

// add flexform for custom type content element plugin
$TCA['tt_content']['types'][$pluginSignature]['showitem']='CType;;4;button;1-1-1, pi_flexform;;;;1-1-1'; // new!
$TCA['tt_content']['types'][$pluginSignature]['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
$TCA['tt_content']['types'][$pluginSignature]['subtypes_excludelist'][$pluginSignature] = 'layout,select_key,pages';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue('*', 'FILE:EXT:'.$_EXTKEY . '/Configuration/FlexForms/PhotoSwipe.xml', $pluginSignature);


// Found: http://blog.mues-schrewe.de/2010/06/30/typo3-neuer-typ-fur-externe-url/
// add tel to protocol for external pages
$TCA['pages']['columns']['urltype']['config']['items']['5']['0'] = 'tel:';
$TCA['pages']['columns']['urltype']['config']['items']['5']['1'] = '5';
$TCA['pages_language_overlay']['columns']['urltype']['config']['items']['5']['0'] = 'tel:';
$TCA['pages_language_overlay']['columns']['urltype']['config']['items']['5']['1'] = '5';

// add sms to protocol for external pages
$TCA['pages']['columns']['urltype']['config']['items']['6']['0'] = 'sms:';
$TCA['pages']['columns']['urltype']['config']['items']['6']['1'] = '6';
$TCA['pages_language_overlay']['columns']['urltype']['config']['items']['6']['0'] = 'sms:';
$TCA['pages_language_overlay']['columns']['urltype']['config']['items']['6']['1'] = '6';


?>