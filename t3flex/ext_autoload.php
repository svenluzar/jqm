<?php

$extensionPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3flex');
$extensionClassesPath = \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('t3flex') . 'Classes/';

return array(
	'TYPO3\T3flex\ViewHelpers\SwitchViewHelper' => $extensionClassesPath . '/ViewHelpers/SwitchViewHelper.php',
	'TYPO3\T3flex\ViewHelpers\CaseViewHelper' => $extensionClassesPath . '/ViewHelpers/CaseViewHelper.php',
);

?>