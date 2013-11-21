<?php
namespace TYPO3\T3flex\ViewHelpers;

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License, either version 3   *
 *  of the License, or (at your option) any later version.                *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */


/**
 * This view helper implements an switch condition.
 *
 * @api
 */
class CaseViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {

	/**
	 * @param mixed $case
	 * @return string the rendered string
	 * @api
	 */
	public function render($case) {
		
		$viewHelperVariableContainer = $this->renderingContext->getViewHelperVariableContainer();
		$switchExpression = NULL;
		if ($viewHelperVariableContainer->exists('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'switchExpression')) {
			$switchExpression = $viewHelperVariableContainer->get('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'switchExpression');
		}
		if ($switchExpression === $case) {
			$viewHelperVariableContainer->addOrUpdate('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'break', TRUE);
			return $this->renderChildren();
		}
	}
}
?>
