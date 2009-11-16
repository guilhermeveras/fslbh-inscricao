<?php

require_once dirname(__FILE__).'/../lib/confirmacaoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/confirmacaoGeneratorHelper.class.php';

/**
 * confirmacao actions.
 *
 * @package    sf_sandbox
 * @subpackage confirmacao
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class confirmacaoActions extends autoConfirmacaoActions
{
  protected function AdjustFilters()
  {
  		$filtros = $this->getFilters();
		
		$filtros['validado'] = 1;
  	
  		$this->setFilters($filtros);
  }
	
  public function executeIndex(sfWebRequest $request)
  {
		$this->AdjustFilters();

		parent::executeIndex($request);
  }
}
