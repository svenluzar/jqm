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
class SwitchViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper implements \TYPO3\CMS\Fluid\Core\ViewHelper\Facets\ChildNodeAccessInterface {

	/**
	 * An array of \TYPO3\Fluid\Core\Parser\SyntaxTree\AbstractNode
	 * @var array
	 */
	private $childNodes = array();

	/**
	 * Setter for ChildNodes - as defined in ChildNodeAccessInterface
	 *
	 * @param array $childNodes Child nodes of this syntax tree node
	 * @return void
	 */
	public function setChildNodes(array $childNodes) {
		$this->childNodes = $childNodes;
	}

	/**
	 * @param mixed $expression
	 * @return string the rendered string
	 * @api
	 */
	public function render($expression) {
		
		$viewHelperVariableContainer = $this->renderingContext->getViewHelperVariableContainer();
		$viewHelperVariableContainer->addOrUpdate('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'switchExpression', $expression);
		$viewHelperVariableContainer->addOrUpdate('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'break', FALSE);
		$content = '';
		foreach ($this->childNodes as $childNode) {
			
			if ($childNode instanceof \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ViewHelperNode){
				
				if ($childNode->getViewHelperClassName() === 'TYPO3\T3flex\ViewHelpers\CaseViewHelper') {
					$content = $childNode->evaluate($this->renderingContext);
					if ($viewHelperVariableContainer->exists('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'break')
						&& $viewHelperVariableContainer->get('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'break') === TRUE) {
						break;
					}
				}
			}
		}
		if ($viewHelperVariableContainer->exists('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'switchExpression')) {
			$viewHelperVariableContainer->remove('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'switchExpression');
		}
		if ($viewHelperVariableContainer->exists('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'break')) {
			$viewHelperVariableContainer->remove('TYPO3\T3flex\ViewHelpers\SwitchViewHelper', 'break');
		}
		return $content;
	}
}
?>
