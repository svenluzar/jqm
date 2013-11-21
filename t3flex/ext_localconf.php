<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}


\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
		'TYPO3.' . $_EXTKEY,
		'PhotoSwipe',
		array(
				'PhotoSwipe' => 'list, show',

		),
		// non-cacheable actions
		array(
				'PhotoSwipe' => '',

		),
		// change list plugin to a content element 
		Tx_Extbase_Utility_Extension::PLUGIN_TYPE_CONTENT_ELEMENT
);


?>