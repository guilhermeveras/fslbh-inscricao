<?php

require_once dirname(__FILE__).'/../lib/aprovadoGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/aprovadoGeneratorHelper.class.php';

/**
 * aprovado actions.
 *
 * @package    sf_sandbox
 * @subpackage aprovado
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class aprovadoActions extends autoAprovadoActions
{
	
  protected function AdjustFilters()
  {
  		$filtros = $this->getFilters();
		
		$filtros['aprovado'] = 1;
  	
  		$this->setFilters($filtros);
  }
  
  public function executeIndex(sfWebRequest $request)
  {
		$this->AdjustFilters();

		parent::executeIndex($request);
  }
  
  public function executeListVer(sfWebRequest $request)
  {
	    $trabalho = $this->getRoute()->getObject();
	    
	    $file = new FileReader(sfConfig::get('sf_upload_dir')."/submissoes/".$trabalho->getArquivo());
	    
	    if ($file->fileExists())
	    {
	    	$file->getFile();
	    } else {
	    	$this->getUser()->setFlash('notice', 'Arquivo não encontrado.');
	    	
	    	$this->redirect('@trabalho');
	    }
		
		return sfView::NONE;	    
  }
}
